$(function() {
	var refreshed = localStorage.getItem('refreshed');
	if (!refreshed || refreshed != (new Date).toDateString()) {
		dds.refresh(1);
	}
	$('.datepicker').datepicker({'dateFormat':'mm/dd/yy', 'maxDate':new Date(), 'yearRange':'-100'});
	$('.onchange-new :input').live({change:dds.change});
	$('.ac-label').live({keydown:function(e) {
		var el = $(this);
		if (e.which == 27) {
			el.val('');
			$('#' + el.attr('rel')).val('');
			return;
		}
		if ([38,40].indexOf(e.which) == -1 && e.shiftKey == false) {
			el.autocomplete('option', 'open');
		}
		if (el.attr('rel') && e.which > 31 && ([37,38,39,40].indexOf(e.which) == -1 || e.shiftKey == true)) {
			$('#' + el.attr('rel')).val(null);
		}
	}, blur:function() {
		var el = $(this), rel = el.attr('rel') ? $('#' + el.attr('rel')) : $();
		el.removeClass('ui-state-error');
		if (!el.val() && el.hasClass('required')) {
			el.addClass('ui-state-error');
			return;
		} else if (!el.val() || !el.attr('rel')) {
			return;
		} else if (el.val() && !rel.val()) {
			el.addClass('ui-state-error');
			return;
		}
	}});
	var msg = localStorage.getItem('msg');
	if (!!msg) {
		$('#msg').text(msg).addClass('ui-state-highlight').prepend($('<span class="ui-icon ui-icon-info"></span>'));
		localStorage.removeItem('msg');
	}
	if (typeof(mainFunc) == 'function') {
		mainFunc();
	}
});

dds = {
	count: 0,
	load:function(task, key, data, opts) {	
		var ret = null;
		data = data || {};
		opts = typeof(opts) == 'object' ? opts : {};
		if (!opts.clear && typeof(localStorage) !== 'undefined') {
			ret = $.parseJSON(localStorage.getItem(key) || '{}');
			if (!$.isEmptyObject(ret) || typeof(ret) == 'number' || typeof(ret) == 'boolean') {
				return ret;
			}
		}
		data.ajax = task;
		$.ajax({url:'./', data:data, dataType:'json',  async:false, success:function(result, status, xhr) {
			ret = result;
			if (typeof(localStorage) !== 'undefined') {
				localStorage.setItem(key, xhr.responseText);
				var keys = localStorage.getItem('_keys') || '';
				keys += (!keys ? '_keys,' : ',') + key;
				localStorage.setItem('_keys', keys);
			}
		}, error:function(xhr, status, error) {
			console.log("failed to load " + task);
			alert(xhr.responseText);
		}});
		return ret;
	},
	refresh:function(soft) {
		var keys = localStorage.getItem('_keys');
		if (!keys) {
			return false;
		}
		keys = keys.split(',');
		for (var i in keys) {
			localStorage.removeItem(keys[i]);
		}
		if (!soft && !!mainFunc) {
			mainFunc();
		}
	},
	loadConsumers:function(clear) {
		return dds.load('loadConsumers', 'consumers', null, {clear:!!clear});
	},
	loadPlacementStatus:function() {
		return {1:{'id':1, 'name':'Placed'}, 2:{'id':2, 'name':'Seperated'}};
		return dds.load('loadPlacements', 'placements');
	},
	loadEmployers:function() {
		return ['Acme Inc.', "ICI"];
	},
	loadIndustries:function() {
		return dds.load('loadIndustries', 'industries');
	},
	loadRegions:function() {
		return dds.load('loadRegions', 'regions');
	},
	loadAreaOffices:function() {
		return dds.load('loadAreaOffices', 'offices');
	},
	addAutoComplete:function(id, data, key, value) {
		var el = id instanceof jQuery ? id : $(id), swap = !!value;
		if (el.size() == 0) {
			console.error("Cannot add auto-complete to " + el.selector);
			return;
		}
		if (typeof(data) != 'object') {
			data = null;
		}
		id = el.attr('id');
		
		if (swap) {
			el.after('<input type="hidden" id="' + id + '" name="' + el.attr('name') + '" rel="' + id + 'ac" value="">')
				.attr({'name': null, 'rel': id, 'id': id + 'ac'})
				.addClass('ac-label');
		} else {
			el.addClass('ac-label');
		}
		if (el.attr('rel') && el.val()) {
			$('#' + el.attr('rel')).val(el.val());
		}
		el.autocomplete({
			source:[],
			minLength:0,
			select:function(e, ui) {
				var rel = el.val(ui.item.label).change().attr('rel');
				if (!!rel) {
					$('#' + rel).val(ui.item.value);
					return false;
				}
			}
		});
		if (!!data) {
			dds.updateAutoCompleteItems(el, data, key, value);
		} else {
			dds.updateAutoCompleteItems(el);
		}
	},
	updateAutoCompleteItems:function(el, data, key, value) {
		if (el.size() == 0) {
			console.error("Cannot update ", el.selector);
			return;
		}
		if (!el.hasClass('ac-label')) {
			el = $('#' + el.attr('rel'), el.parent());
		}
		var parts = el.attr('id').match(/([a-z]+)(\d+)?(ac)?/i), items = [], base = '', nan, lastnan = 1, selector = '[id^="', i, j, label;
		for (i = 0; i < parts.length; i++) {
			if (i != 0 && !!parts[i]) {
				nan = isNaN(parseInt(parts[i], 10));
				selector += (!lastnan ? '"][id$="' : '') + (nan ? parts[i] : '');
				base += !nan ? 1 : parts[i];
				lastnan = nan;
			}
		}
		selector += '"]';
		base = $('#' + base);
		if (!key && base.data('ac-key')) {
			key = base.data('ac-key');
			value = base.data('ac-value');
		} else if (!!key) {
			base.data({'ac-key':key, 'ac-value':value});
		}
		if (!data && !base.data('ac-data')) {
			console.error("No data provided for", el.selector)
			return;
		} else if (!data && base.data('ac-data')) {
			//console.log("got data for", el.attr('id'), selector, 'from ', base.selector, base.data('ac-data'));
			items = base.data('ac-data');
		} else if (typeof(data.push) == 'function') {
			items = data;
			base.data('ac-data', items);
		} else if (!!key) {
			if (typeof(key.push) != 'function') {
				key = [key];
			}
			for (i in data) {
				if (!!data[i][key] || !!data[i][value]) {
					label = '';
					for (j in key) {
						label += typeof(data[i][key[j]]) != 'undefined' ? data[i][key[j]] : key[j];
					}
					items.push(value ? {'label':label, 'value':data[i][value]} : label);
				}
			}
			base.data('ac-data', items);
		}
		
		for (i in items) {
			if (!!items[i].value && el.val() == items[i].value) {
				el.val(items[i].value);
				break;
			}
		}
		$(selector).autocomplete('option', 'source', function(request, response) {
			var term = request.term.toLowerCase(), opts = [];
			for (var i in items) {
				if ((typeof(items[i]) == 'string' && items[i].toLowerCase().indexOf(term) > -1) || (typeof(items[i]) == 'object' && 'label' in items[i] && items[i].label.toLowerCase().indexOf(term) > -1)) {
					opts.push(items[i]);
				}
			}
			response(opts);
		}).autocomplete('option', 'focus', function(e, ui) {
			$(this).val(ui.item.label);
			e.stopPropagation();
			return false;
		});
	},
	dump:function(o, p) {
		if (typeof(o) == 'object') {
			for (var i in o) {
				if (confirm(p + i + "\n" + o[i])) {
					if (typeof(o[i]) == 'object') {
						dds.dump(o, p + '.' + i + '.');
					}
				} else {
					break;
				}
			}
		} else {
			alert(p + "\n" + o);
		}
	},
	change:function(e) {
		var elm = $(this).removeClass('ui-state-error'),
			parent = elm.closest('tr,li').removeClass('blank'),
			container = parent.parent(),
			num = parent.siblings().size(),
			row = parent.clone().addClass('blank');
		if (container.find('.blank').size() > 0) {
			return;
		}
		container.append(row);
		row.find(':input, input[type="hidden"]').each(function(i) {
			var el = $(this), parts;
			if (el.hasClass('oncreate-empty')) {
				el.children().remove();
			}
			if (el.hasClass('oncreate-disable')) {
				el.attr('disabled', 'disabled');
			}
			if (!!this.id) {
				parts = this.id.match(/^([a-z]+)([0-9]+)([a-z]+)?$/i);
				this.id = parts[1] + ++parts[2] + (!!parts[3] ? parts[3] : '');
			}
			if (!!this.name) {
				parts = this.name.match(/([a-z]+)\[([0-9]+)\]\[([a-z]+)\]/i);
				this.name = parts[1] + '[' + ++parts[2] + '][' + parts[3] + ']';
			}
			if (!!el.attr('rel')) {
				parts = el.attr('rel').match(/([a-z]+)(\d+)(ac)?/i);
				el.attr('rel', parts[1] + parts[2] + (!!parts[3] ? parts[3] : ''));
			}
			if (el.hasClass('ac-label')) {
				dds.addAutoComplete(el);
			}
			if (el.hasClass('datepicker')) {
				el.datepicker();
			}
			if ('type' in this && ['checkbox', 'radio'].indexOf(this.type) > -1) {
				this.checked = false;
			} else {
				el.val('');
			}
		});
	},
	'save':function(form, task, redirectURL, reload, bitwise) {
		form = form instanceof jQuery ? form : $(form);
		if (form.size() == 0 || form.find(':input').size() == 0) {
			console.error('Nothing to save for selector ' + form.selector);
			return;
		}
		bitwise = bitwise || [];
		reload = typeof(reload) == 'string' && reload in dds ? dds[reload] : [];
		reload = typeof(reload.push) == 'undefined' ? [reload] : reload;
		var data = form.append('<input type="hidden" name="ajax" value="' + task + '" />').serialize();
		console.log('./?' + data);
		$.ajax({'url':'./', data:data, dataType:'json', type:'POST', success:function(result, xhr) {
			if ('msg' in result) {
				$('<div>' + result.msg + '</div>').dialog().delay(5000).fadeOut();
				for (var i in reload) {
					reload[i](true);
				}
				$('<form/>', {action:redirectURL, method:'get'}).appendTo('body').submit();
			} else {
				$('<div><p class="ui-state-alert">' + result.error + '</p>').dialog({
					buttons:{
						OK:function() {
							$(this).dialog('close');
						}
					}
				})
			}
		}})
	}
};

dds.eohis = {
	loadDataEntry:function() {
		$('#tabs').tabs({'select':'#new'});
		dds.addAutoComplete('#new #consumerId1', dds.loadConsumers(), ['lname', ', ', 'fname', ' (', 'dob', ')'], 'id');
		var region = $('#new #regionId1');
		$.each(dds.loadRegions(), function(i, r) {
			region.append($('<option value="' + r.id + '">' + r.name + '</option>'));
		});
		$('#new [id^="regionId"]').live('change',function() {
			var el = $(this), areaOffice = el.closest('tr').find('[id^="areaOfficeId"]').attr('disabled', 'disabled').children().remove().end();
			if (el.val() ) {
				areaOffice.attr('disabled', null).append($('<option></option>'));
				$.each(dds.loadAreaOffices()[el.val()], function(i, ao) {
					areaOffice.append($('<option value="' + ao.id + '">' + ao.name + '</option>'));
				});
			}
		});
		
		dds.addAutoComplete('#new #employer1', dds.loadEmployers());
		dds.addAutoComplete('#new #industryId1', dds.loadIndustries(), 'name', 'id');
		var existing = $('<tbody/>').addClass('ui-widget-content'), separated = $('<tbody/>').addClass('ui-widget-content'), all = $('<tbody/>').addClass('ui-widget-content'), status = $('<select></select>'), now = new Date().valueOf();
		$.each(dds.loadPlacementStatus(), function(i, s) {
			status.append($('<option>', {text:s.name, value:s.id}));
		});
		$('#entry :button').button();
		$.each(dds.loadConsumers(), function(i, person) {
			var eConsumer = $('<tbody/>'), sConsumer = $('<tbody/>'), aConsumer = $('<tbody/>');
			$.each(person.placements, function(j, placement) {
				var start = new Date(placement.start).valueOf(), notes = '';
				$.each(placement.notes, function(i, n) {
					notes += n.note + '<br>';
				});
				if (!placement.verifiedStatus) {
					$('#new .blank :input[id]').val(function(i) {
						var el = $(this), parts = this.id.match(/^([a-z]+)/i), key = parts[1];
						if (key == 'notes') {
							return;
						} else if (this.type == 'checkbox' || this.type == 'radio') {
							this.checked = this.value == placement[key];
							return this.value;
						} else if (key == 'consumerId') {
							return el.hasClass('ac-label') ? person.lname + ', ' + person.fname + ' (' + person.dob + ')' : person.id;
						} else if (key == 'industryId') {
							return el.hasClass('ac-label') ? placement.industry : placement.industryId;
						} else if (key == 'regionId') {
							el.val(placement[key]).change();
							return placement[key];
						} else 	if (key in placement) {
							return placement[key];
						}
					}).change().find('[id^="notes"]').closest('td').prepend($().text(notes));
				} else if (placement.verifiedStatus == 1) {
					eConsumer.append($('<tr>').append(
						$("<td>", {text:placement.employer}).append(
							$('<input type="hidden" id="placement' + j + 'id" name="u[' + j + '][id]" value="' + placement.id + '">')
						),
						$('<td>', {text:placement.start}),
						$('<td>').append($('<input type="text" id="placement' + j + 'end" name="u[' + j + '][end]" class="datepicker" value="" size="10" />').datepicker().change(function() {
							var s = $(this);
							$('#update #placement' + j + 'status').attr('disabled', !!s.val() ? null : 'disabled');
						})),
						$('<td>').append(status.clone().attr({'id':'placement' + j + 'status', 'name':'u['+ j + '][status]'}).attr('disabled', 'disabled')),
						$('<td/>', {html:notes}).append($('<input type="text" id="placement' + j + 'notes" name="u[' + j + '][notes]" value="" />'))
					));
				} else if (placement.verfiedStatus == 2) {
					sConsumer.append($('<tr>').append(
						$("<td>", {text:placement.employer}).append(
							$('<input type="hidden" id="placement' + j + 'id" name="u[' + j + '][id]" value="' + placement.id + '">')
						),
						$('<td>', {text:placement.start}),
						$('<td>').append($('<input type="text" id="placement' + j + 'end" name="u[' + j + '][end]" class="datepicker" value="" size="10" />').datepicker().change(function() {
							var s = $(this);
							$('#update #placement' + j + 'status').attr('disabled', !!s.val() ? null : 'disabled');
						})),
						$('<td>').append(status.clone().attr({'id':'placement' + j + 'status', 'name':'u['+ j + '][status]'}).attr('disabled', 'disabled')),
						$('<td/>', {html:notes}).append($('<input type="text" id="placement' + j + 'notes" name="u[' + j + '][notes]" value="" />'))
					));
				}
				aConsumer.append(
					$('<tr/>').append(
						$('<td/>', {text:placement.region}),
						$('<td/>', {text:placement.areaOffice}),
						$('<td/>', {text:placement.start}),
						$('<td/>', {text:placement.employer}),
						$('<td/>', {text:placement.title}),
						$('<td/>', {text:placement.hours}),
						$('<td/>', {text:placement.wage}),
						$('<td/>', {text:placement.healthCare == 2 ? 'Yes' : 'No'}),
						$('<td/>', {text:!placement.status ? 'New' : (placement.status == 1 ? 'Employed' : 'Separated')}),
						$('<td/>', {text:placement.end}),
						$('<td/>', {text:placement.separationReason}),
						$('<td/>', {text:notes})
					)
				);
			});
			if (eConsumer.children().size() > 0) {
				existing.append(eConsumer.children().first().prepend(
					$('<td' + (eConsumer.children().size() > 1 ? ' rowspan="' + eConsumer.children().size() + '"' : '') + '>' + person.lname + ', ' + person.fname + ' (' + person.dob + ')</td>')
						.data({'name':person.lname + ', ' + person.fname, 'dob':person.dob})
				).end());
			}
			if (sConsumer.children().size() > 0) {
				separated.append(sConsumer.children().first().prepend(
					$('<td' + (sConsumer.children().size() > 1 ? ' rowspan="' + sConsumer.children().size() + '"' : '') + '>' + person.lname + ', ' + person.fname + ' (' + person.dob + ')</td>')
						.data({'name':person.lname + ', ' + person.fname, 'dob':person.dob})
				).end());
			}
			if (aConsumer.children().size() > 0) {
				all.append(aConsumer.children().first().prepend(
					$('<td' + (aConsumer.children().size() > 1 ? ' rowspan="' + aConsumer.children().size() + '"' : '') + '>' + person.lname + ', ' + person.fname + ' (' + person.dob + ')</td>')
						.data({'name':person.lname + ', ' + person.fname, 'dob':person.dob})
				).end());
			}
		});
		if (existing.children().size() > 0) {
			$('#existing').append(
				$('<table>', {'border':0, 'cellspacing':0, 'cellpadding':0}).append(
					$('<thead>', {'class':'ui-widget-header'}).append(
						$('<tr>').append(
							$('<th>Consumer</th>'),
							$('<th>Employer</th>'),
							$('<th>Start Date</th>'),
							$('<th>End Date</th>'),
							$('<th>Seperation Reason</th>'),
							$('<th>Notes</th>')
						)
					),
					existsing
				)
			);
			$('#existing-tab').append(' (' + existing.children().size() + ')');
		} else {
			$('#existing').append($('<p/>', {'class':'ui-state-highlight', 'text':'No existing job placements to update.'}));
		}
		if (separated.children().size() > 0) {
			$('#separated').append(
				$('<table>', {'border':0, 'cellspacing':0, 'cellpadding':0}).append(
					$('<thead>', {'class':'ui-widget-header'}).append(
						$('<tr>').append(
							$('<th>Consumer</th>'),
							$('<th>Employer</th>'),
							$('<th>Start Date</th>'),
							$('<th>End Date</th>'),
							$('<th>Seperation Reason</th>'),
							$('<th>Notes</th>')
						)
					),
					separated
				)
			);
			$('#separated-tab').append(' (' + separated.children().size() + ')');
		} else {
			$('#separated').append($('<p/>', {'class':'ui-state-highlight', 'text':'No separated job placements to update.'}));
		}
		if (all.children().size() > 0) {
			$('#all').append(
				$('<table>', {'border':0, 'cellspacing':0, 'cellpadding':0}).append(
					$('<thead>', {'class':'ui-widget-header'}).append(
						$('<tr>').append(
							$('<th>Consumer</th>'),
							$('<th>Region</th>'),
							$('<th>Area Office</th>'),
							$('<th>Start Date</th>'),
							$('<th>Employer</th>'),
							$('<th>Job Title</th>'),
							$('<th>Hours / Week</th>'),
							$('<th>Hourly Wages</th>'),
							$('<th>Eligible for<br>Health Insurance?'),
							$('<th>Status</th>'),
							$('<th>End Date</th>'),
							$('<th>Seperation Reason</th>'),
							$('<th>Notes</th>')
						)
					),
					all
				)
			);
			$('#all-tab').append(' (' + all.children().size() + ')');
		} else {
			$('#all').append($('<p/>', {'class':'ui-state-highlight', 'text':'No job existing placements to update.'}));
		}
		$('#tabs .datepicker').datepicker('option', {
			'minDate':new Date((new Date()).getFullYear(), (new Date()).getMonth() -1, 1),
			'maxDate':new Date((new Date()).getFullYear(), (new Date()).getMonth(), 0)
		});
		
		$('#add-consumer').dialog({
			modal:true,
			autoOpen:false,
			buttons:{
				'Add Consumer':function() {
					var consumer = {}, form = $('#consumer', this), reqs = {
						fname:'Please provide a first name.',
						lname:'Please provide a last name.',
						dob:'Please provide a date of birth.'
					};
					$('#msg', this).remove();
					$(':input', form).each(function(i) {
						var el = $(this);
						if (el.val()) {
							consumer[this.id] = el.val();
						}
						if (!el.val() && this.id in reqs) {
							form.before($('<p id="msg" class="ui-state-error"><span class="ui-icon ui-icon-alert"></span> ' + reqs[this.id] + '</p>'));
							el.addClass('ui-state-error').focus();
							return false;
						} else {
							delete reqs[this.id];
						}
					});
					for (var i in reqs) {
						return false;
					}
					consumer.ajax = 'saveConsumer';
					$.ajax({url:'./', data:consumer, type:'POST', dataType:'json', context:this, success:function(result, status, xhr) {
						if ('msg' in result) {
							$(this).dialog('close');
							$(':input', this).val(function(i) {
								if ('type' in this && ['checkbox', 'radio'].indexOf(this.type) > -1) {
									this.checked = false;
								} else {
									$(this).val(null);
								}
							})
							dds.updateAutoCompleteItems($('#new #consumerId1'), dds.loadConsumers(true));
							//dds.updateAutoCompleteItems($('#new #employer1'), dds.loadEmployers(true));
						} else {
							form.before($('<p id="msg" class="ui-state-error"><span class="ui-icon ui-icon-alert"></span> Unable to save consumer.  ' + result.error + "\n" + xhr.responseText + '</p>'));
						}
					},
					error:function(xhr, status, error) {
						form.before($('<p id="msg" class="ui-state-error"><span class="ui-icon ui-icon-alert"></span> Unable to save consumer.<br/>' + xhr.responseText + '</p>'));
					}});
					return false;
				}
			}
		}).find('#dob').datepicker('option', {
			'changeMonth':true,
			'changeYear':true,
			'defaultDate':new Date((new Date()).getFullYear() - 15, (new Date()).getMonth(), (new Date).getDate()),
			'yearRange':'-120'
		});
	},
	'savePlacements':function() {
		var neo = $('#new :input'), update = $('#update :input');
		$.ajax({url:'./', data:'ajax=addPlacements&' + neo.serialize(), dataType:'json', type:'POST', success:function(result, xhr) {
			if (result.error) {
				$('#tabs').tabs('select', '#new');
				$('<div title="Error Adding Placements"><p class="ui-state-alert">' + result.error + '</p></div>').dialog({
					modal:true,
					buttons:{
						OK:function() {
							$(this).dialog('close');
						}
					}
				});
			} else {
				$('#new').children().remove().end().append($('<p class="ui-state-highlight">These jobs placements have been successfully added. To add more correct the errors with the job placements to and click save.'));
				console.log('./?ajax=updatePlacements&' + update.serialize());
				$.ajax({url:'./', data:'ajax=updatePlacements&' + update.serialize(), dataType:'json', type:'POST', success:function(result, xhr) {
					if (result.error) {
						$('#update').focus();
						$('<div title="Error Updating Placements"><p class="ui-state-alert">' + result.error + '</p></div>').dialog({
							buttons:{
								OK:function() {
									$(this).dialog('close');
								}
							}
						});
					} else {
						localStorage.setItem('msg', result.success);
						dds.refresh();
						$('<form method="get" action="./" />').appendTo('body').submit(); 
					}
				}})
			}
		}});
	}
	
};