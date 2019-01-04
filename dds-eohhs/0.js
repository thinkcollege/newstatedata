if (!Array.prototype.indexOf) {
     function indexOf (searchElement /*, fromIndex */ ) {
        "use strict";
		
	
		
        if (this == null) {
            throw new TypeError();
        }
        var t = Object(this);
        var len = t.length >>> 0;
        if (len === 0) {
            return -1;
        }
        var n = 0;
        if (arguments.length > 0) {
            n = Number(arguments[1]);
            if (n != n) { // shortcut for verifying if it's NaN
                n = 0;
            } else if (n != 0 && n != Infinity && n != -Infinity) {
                n = (n > 0 || -1) * Math.floor(Math.abs(n));
            }
        }
        if (n >= len) {
            return -1;
        }
        var k = n >= 0 ? n : Math.max(len - Math.abs(n), 0);
        for (; k < len; k++) {
            if (k in t && t[k] === searchElement) {
                return k;
            }
        }
        return -1;
    }
}

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
	//		console.log("failed to load " + task);
			alert(xhr.responseText);
		}});
		return ret || [];
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
		if (soft == 2) {
			form = $('<form action="./" method="get" />');
			$('body').append(form);
			form.submit();
			return;
		} else if (!soft && !!mainFunc) {
			mainFunc();
		}
	},
	loadConsumers:function(clear) {
		return dds.load('loadConsumers', 'consumers', null, {clear:!!clear});
	},
	loadPlacementStatus:function() {
		return {1:{'id':1, 'name':'Employed'}, 2:{'id':2, 'name':'Separated'}};
		return dds.load('loadPlacements', 'placements');
	},
	loadEmployers:function() {
		return dds.load('loadEmployers', 'emps');
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
			row = parent.clone(true, true).addClass('blank').data('index', parent.siblings().size() + 1);
		if (container.find('.blank').size() > 0) {
			return;
		}
		container.append(row.find(':input, input[type="hidden"]').each(function(i) {
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
		}).end().find('.onchange-remove').remove().end());
	},
	'save':function(form, task, redirectURL, reload, bitwise) {
		var isObj = typeof(form) == 'object', isJQuery = form instanceof jQuery, data = isObj && !isJQuery ? form : null;
		form = isObj ? (isJQuery ? form : $('<form/>', {action:'', method:'get""'})) : $(form);
		if (form.size() == 0 || (!isObj && form.find(':input').size() == 0)) {
			console.error('Nothing to save for selector ' + form.selector);
			return;
		}
		bitwise = bitwise || [];
		reload = typeof(reload) == 'string' && reload in dds ? dds[reload] : [];
		reload = typeof(reload.push) == 'undefined' ? [reload] : reload;
		if (isJQuery || !isObj) {
			data = form.append('<input type="hidden" name="ajax" value="' + task + '" />').serialize();
		} else {
			data.ajax = task;
			data = $.param(data);
		}
	//	console.log('./?' + data);
		$.ajax({'url':'./', data:data, dataType:'json', type:'POST', success:function(result, xhr) {
			if ('msg' in result) {
				if (!result.msg) {
					return;
				}
				$('<div>' + result.msg + '</div>').dialog().closest('.ui-dialog').delay(5000).fadeOut();
				for (var i in reload) {
					reload[i](true);
				}
				if (typeof(redirectURL) == 'string') {
					$('<form/>', {action:redirectURL, method:'get'}).appendTo('body').submit();
				} else if (typeof(redirectURL) == 'function') {
					redirectURL(result);
				}
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
		$('#actions #save').button('option', 'icons', {primary:'ui-icon-save'}).click(dds.eohis.savePlacements);
		$('#actions #refresh').button('option', 'icons', {primary:'ui-icon-refresh'}).click(function(e) { 
			dds.refresh(2);
		});
		$('#actions #add-placement-button').button().click(dds.eohis.editPlacement);
		$('#actions #add-consumer-btn').click(function(e) { $('#add-consumer').dialog('open'); });
		var cons = {};
		$.each(dds.loadConsumers(), function(i) {
			if (this.status ^ 1) {
				cons[i] = this;
			}
		});
		dds.addAutoComplete('#add-placement #consumerId', cons, ['lname', ', ', 'fname', ' (', 'dob', ')'], 'id');
		var addPlacement = $('#add-placement'), region = $('#regionId', addPlacement);
		$.each(dds.loadRegions(), function(i, r) {
			region.append($('<option value="' + r.id + '">' + r.name + '</option>'));
		});
		region.bind('change',function() {
			var el = $(this), areaOffice = $('#areaOfficeId', addPlacement).children().remove().end();
			if (el.val()) {
				areaOffice.attr('disabled', null).removeClass('ui-state-disabled').append($('<option></option>'));
				$.each(dds.loadAreaOffices()[el.val()], function(i, ao) {
					areaOffice.append($('<option value="' + ao.id + '">' + ao.name + '</option>'));
				});
			} else {
				areaOffice.attr('disabled', 'disabled').addClass('ui-state-disabled').val('');
			}
		});
		dds.addAutoComplete('#add-placement #employer', dds.loadEmployers());
		var neo = $('#new tbody'), existing = $('<tbody/>').addClass('ui-widget-content'), separated = $('<tbody/>').addClass('ui-widget-content'), all = $('<tbody/>').addClass('ui-widget-content'),
			status = $('#add-placement #status'), d = new Date(), month = d.getMonth() - (d.getMonth() % 3) + 1, quarterStart = d.getFullYear() + '-' + ((month < 10 ? '0' : '') + month)  + '-02', verificationRequired = false;
		$.each(dds.loadPlacementStatus(), function(i, s) {
			status.append($('<option/>', {text:s.name, value:s.id}));
		});
		$('#entry :button').button();
		$.each(dds.loadConsumers(), function(i, person) {
			var nConsumer = $('<tbody/>'), eConsumer = $('<tbody/>'), sConsumer = $('<tbody/>'), aConsumer = $('<tbody/>');
			$.each(person.placements, function(j, placement) {
				var notes = '';
				$.each(placement.notes, function(i, n) {
					notes += n.note + '<br>';
				});
				if (!placement.verifiedStatus) {
					nConsumer.append($('<tr>').append(
						$('<td>' + person.lname + ', ' + person.fname + ' (' + person.dob + ')</td>'),
						quarterStart > placement.lastVerified
							? $('<td/>', {'class':'nonclickable'}).append(
								$('<label/>').append(
									$('<span class="ui-helper-hidden-accessible">Verify Status </span>'),
									$('<input type="hidden" id="p' + j + 'id" name="u[' + j + '][id]" class="placement-id" value="' + placement.id + '" />'),
									status.clone().attr({'id':'p' + j + 'verifiedStatus', 'name':'u[' + j + '][verifiedStatus]', 'class':'verified-status'}).children().remove(':not([value="' + placement.status + '"])').end().prepend($('<option/>'))
								)
							)
							: $('<td/>', {text:dds.loadPlacementStatus()[placement.status].name})
						,
						$('<td/>', {text:placement.region}),
						$('<td/>', {text:placement.areaOffice}),
						$('<td/>', {text:placement.employer}),
						$('<td/>', {text:placement.start}),
						$('<td/>', {text:placement.title}),
						$('<td/>', {text:placement.healthCare == 2 ? 'Yes' : 'No'}),
						$('<td/>', {text:placement.hours}),
						$('<td/>', {text:placement.wage}),
						$('<td>', {html:notes})
					).addClass('clickable').data({pid:placement.id, cid:person.id}));
				} else if (placement.verifiedStatus == 1) {
					verificationRequired = verificationRequired || quarterStart > placement.lastVerified;
					eConsumer.append($('<tr>').append(
						$('<td>' + person.lname + ', ' + person.fname + ' (' + person.dob + ')</td>'),
						quarterStart > placement.lastVerified
							? $('<td/>', {'class':'nonclickable'}).append(
								$('<label/>').append(
									$('<span class="ui-helper-hidden-accessible">Verify Status </span>'),
									$('<input type="hidden" id="p' + j + 'id" class="placement-id" name="u[' + j + '][id]" value="' + placement.id + '">'),
									status.clone()
										.attr({'id':'p' + j + 'verifiedStatus', 'name':'u[' + j + '][verifiedStatus]', 'class':'verified-status'})
										.children()
											.remove(':not([value="' + placement.status + '"], [value="' + (placement.status + 1) + '"])')
										.end()
										.prepend($('<option/>'))
								)
							)
							: $('<td/>', {text:dds.loadPlacementStatus()[placement.status].name}),
						$("<td/>", {text:placement.employer}),
						$('<td/>', {text:placement.start}),
						$('<td/>', {text:placement.end}),
						$('<td/>', {text:dds.loadPlacementStatus()[placement.status].name}),
						$('<td/>', {html:notes})
					).addClass('clickable').data({pid:placement.id, cid:person.id}));
				} else if (placement.verifiedStatus == 2) {
					sConsumer.append($('<tr>').append(
						$('<td>' + person.lname + ', ' + person.fname + ' (' + person.dob + ')</td>'),
						$('<td/>', {text:placement.region}),
						$('<td/>', {text:placement.areaOffice}),
						$("<td>", {text:placement.employer}),
						$('<td/>', {text:placement.start}),
						$('<td/>', {text:placement.end}),
						$('<td/>', {text:placement.title}),
						$('<td/>', {html:notes})
					));
				}
				aConsumer.append(
					$('<tr/>').append(
						$('<td>' + person.lname + ', ' + person.fname + ' (' + person.dob + ')</td>'),
						$('<td/>', {text:placement.region}),
						$('<td/>', {text:placement.areaOffice}),
						$('<td/>', {text:placement.start}),
						$('<td/>', {text:placement.employer}),
						$('<td/>', {text:placement.title}),
						$('<td/>', {text:placement.hours}),
						$('<td/>', {text:placement.wage}),
						$('<td/>', {text:placement.healthCare == 2 ? 'Yes' : 'No'}),
						$('<td/>', {text:!placement.status ? 'New' : dds.loadPlacementStatus()[placement.status].name}),
						$('<td/>', {text:placement.end}),
						$('<td/>', {text:placement.separationReason}),
						$('<td/>', {html:notes})
					)
				);
			});
			if (nConsumer.children().size() > 0) {
				neo.append(
					nConsumer.children().data({'name':person.lname + ', ' + person.fname, 'dob':person.dob})
				);
				neo.closest('table').css('display', 'block');
			}
			if (eConsumer.children().size() > 0) {
				existing.append(eConsumer.children().data({'name':person.lname + ', ' + person.fname, 'dob':person.dob}));
			}
			if (sConsumer.children().size() > 0) {
				separated.append(sConsumer.children());
			}
			if (aConsumer.children().size() > 0) {
				all.append(aConsumer.children().data({'name':person.lname + ', ' + person.fname, 'dob':person.dob}));
			}
		});
		if (neo.children().size() > 1) {
			$('#entry #new-tab').append(' (' + neo.children().size() + ')');
		}
		if (existing.children().size() > 0) {
			$('#existing').append(
				$('<table>', {'border':0, 'cellspacing':0, 'cellpadding':0, 'class':'table-autosort table-autofilter'}).append(
					$('<thead>', {'class':'ui-widget-header'}).append(
						$('<tr>').append(
							$('<th class="table-sortable:alphanumeric">Consumer<br/><input type="text" onkeyup="Table.filter(this, this);" value=""/></th>'),
							$('<th class="table-sortable:alpha">Verified Status<br><select onchange="Table.filter(this,this);"><option value="">All</option><option>Verified</option><option>Unverified</option></select></th>'),
							$('<th class="table-sortable:alphanumeric">Employer<br><input type="text" onkeyup="Table.filter(this,this);" value=""/></th>'),
							$('<th class="table-sortable:date">Start Date</th>'),
							$('<th class="table-sortable:date">End Date</th>'),
							$('<th>Status</th>'),
							$('<th>Notes</th>')
						)
					),
					existing
				)
			);
			$('#existing-tab').append(' (' + existing.children().size() + ')');
		} else {
			$('#existing').append($('<p/>', {'class':'ui-state-highlight', 'text':'No existing job placements to update.'}));
		}
		if (separated.children().size() > 0) {
			$('#separated').append(
				$('<table>', {'border':0, 'cellspacing':0, 'cellpadding':0, 'class':'table-autosort table-autofilter'}).append(
					$('<thead>', {'class':'ui-widget-header'}).append(
						$('<tr>').append(
							$('<th class="table-sortable:alphanumeric">Consumer<br/><input type="text" onkeyup="Table.filter(this, this);" value=""/></th>'),
							$('<th class="table-sortable:alphanumeric table-filterable">Region</th>'),
							$('<th class="table-sortable:alphanumeric table-filterable">Area Office</th>'),
							$('<th class="table-sortable:alphanumeric">Employer<br><input type="text" onkeyup="Table.filter(this, this);" value=""/></th>'),
							$('<th class="table-sortable:date">Start Date</th>'),
							$('<th class="table-sortable:date">End Date</th>'),
							$('<th>Job Title</th>'),
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
				$('<table>', {'border':0, 'cellspacing':0, 'cellpadding':0, 'class':'table-autosort table-autofilter'}).append(
					$('<thead>', {'class':'ui-widget-header'}).append(
						$('<tr>').append(
							$('<th class="table-sortable:alphanumeric">Consumer<br/><input type="text" onkeyup="Table.filter(this, this);" value=""/></th>'),
							$('<th class="table-sortable:alphanumeric table-filterable">Region</th>'),
							$('<th class="table-sortable:alphanumeric table-filterable">Area Office</th>'),
							$('<th class="table-sortable:date">Start Date</th>'),
							$('<th class="table-sortable:alphanumeric">Employer<br/><input type="text" onkeyup="Table.filter(this,this);" value=""/></th>'),
							$('<th>Job Title</th>'),
							$('<th>Hours / Week</th>'),
							$('<th>Hourly Wages</th>'),
							$('<th class="table-sortable:alphanumeric table-filterable">Eligible for<br>Health Insurance?</th>'),
							$('<th class="table-sortable:alphanumeric table-filterable">Status</th>'),
							$('<th class="table-sortable:date">End Date</th>'),
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
		if (verificationRequired) {
			$('#actions').append(
				$('<input type="button" value="Validate Placements"/>').button().click(function(e) {
					$('<div title="Saving Placements">Saving verified placements please wait...</div>').dialog({modal:true});
		//			console.log('./?ajax=verifyPlacements&' + $('#entry .placement-id, #entry .verified-status').serialize()); 
					$.ajax({url:'./', data:'ajax=verifyPlacements&' + $('#entry .placement-id, #entry .verified-status').serialize(), dataType:'json', type:'POST', success:function(result, xhr) {
						if (result.error) {
							$('<div title="Error Verifying Placements" class="ui-state-error">' + result.error + '</div>').dialong({
								modal:true,
								buttons:{
									OK:function() {
										$(this).dialog('close');
									}
								}
							});
						} else {
							dds.refresh();
							$('<form/>', {action:'./', method:'get'}).submit();
						}
					}})
				})
			);
		}
		$('#add-consumer').dialog({
			modal:true,
			autoOpen:false,
			buttons:{
				'Save':function() {
					var consumer = {}, form = $('#consumer', this), reqs = {
						fname:'Please provide a first name.',
						lname:'Please provide a last name.',
						dob:'Please provide a date of birth.'
					};
					$('#msg', this).remove();
					$(':input', form).each(function(i) {
						var el = $(this);
						if (el.val()) {
							if (this.type == 'radio' || this.type == 'checkbox') {
								consumer[this.id] = this.checked ? 1 : 0;
							} else {
								consumer[this.id] = el.val();
							}
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
								dds.updateAutoCompleteItems($('#add-placement #consumerId'), dds.loadConsumers(true));
							} else {
								form.before($('<p id="msg" class="ui-state-error"><span class="ui-icon ui-icon-alert"></span> Unable to save consumer.  ' + result.error + "\n" + xhr.responseText + '</p>'));
							}
						},
						error:function(xhr, status, error) {
							form.before($('<p id="msg" class="ui-state-error"><span class="ui-icon ui-icon-alert"></span> Unable to save consumer.<br/>' + xhr.responseText + '</p>'));
						}
					});
					return false;
				}
			}
		}).find('#dob').datepicker('option', {
			'changeMonth':true,
			'changeYear':true,
			'defaultDate':new Date((new Date()).getFullYear() - 15, (new Date()).getMonth(), (new Date).getDate()),
			'yearRange':'-120'
		});
		$('#add-placement').dialog({
			modal:true,
			autoOpen:false,
			buttons: {
				Save:function(e) {
					var form = $(this), missing = false;
					$('#msg', form).remove();
					$('.required', form).each(function() {
						if (!$(this).val()) {
							$(this).focus();
							form.prepend($("<p/>", {'class':'ui-state-highlight', id:'msg', text:"A required field (" + this.id + ") is missing!"}));
							missing = true;
							return false;
						}
					});
					if (!!missing) {
						return;
					}
					var obj = {};
					$(':input', form).each(function() {
						if (!!this.type && (this.type == 'checkbox' || this.type == 'radio') && this.checked) {
							var key = this.id.match(/([a-z]+)(\d+)/i);
							if (!(key[1] in obj)) {
								obj[key[1]] = 0;
							}
							obj[key[1]] += this.value;
						} else {
							obj[this.id] = this.value;
						}
					});
					obj.id = obj.id.length > 0 ? parseInt(obj.id, 10) : null;
					dds.save(obj.id > 0 ? {u:[obj]} : {c:[obj]}, obj.id > 0 ? 'updatePlacements' : 'addPlacements', function(result) {
						var person = dds.loadConsumers(true)[obj.consumerId], placement = person.placements[result.pids[0]], index = null, found = false,
							name = person.lname + ', ' + person.fname + ' (' + person.dob + ')', notes = '', firstRow = null, cols = 0,
							row = $('<tr>').append(
								!placement.verifiedStatus ? $('<td/>', {text:placement.region}) : $(),
								!placement.verifiedStatus ? $('<td/>', {text:placement.areaOffice}) : $(),
								$('<td/>', {text:placement.employer}),
								$('<td/>', {text:placement.start}),
								placement.verifiedStatus > 0 ? $('<td/>', {text:placement.end}) : $(),
								placement.verifiedStatus > 0 ? $('<td/>', {text:dds.loadPlacementStatus()[placement.status].name}) : $(),
 								!placement.verifiedStatus ? $('<td/>', {text:placement.title}) : $(),
								!placement.verifiedStatus ? $('<td/>', {text:placement.healthCare == 2 ? 'Yes' : 'No'}) : $(),
								!placement.verifiedStatus ? $('<td/>', {text:placement.hours}) : $(),
								!placement.verifiedStatus ? $('<td/>', {text:placement.wage}) : $()
							).addClass('clickable').data({pid:placement.id, cid:person.id, name:person.lname + ', ' + person.fname + ' (' + person.dob + ')'});
							$.each(placement.notes, function(i, note) {
								notes += note.note + '<br>';
							});
							row.append($('<td/>', {html:notes}));
			//				console.log(placement, row);
							rows = $((!placement.verifiedStatus ? '#new' : '#existing') + ' tbody tr').each(function(i) {
								var el = $(this);
								cols = el.children().size();
								if (el.data('cid') == person.id) {
									found |= el.data('pid') == placement.id;
									if (!found || el.data('pid') == placement.id) {
										index = i;
									}
								} else if (found && el.data('name') == name) {
									return false;
								}
							});
						row.prepend(
							$('<td/>', {text:name}),
							$('<td/>', {text:placement.id > 0 ? 'Edited' : 'New'})
						);
						if (found) {
							$(rows.get(index)).replaceWith(row);
						} else {
							rows.parent().append(row);
						}
						form.dialog('close');
					});
				},
				Delete:function(e) {
					var form = $(this), id = $('#id', form);
					if (id.val()) {
						dds.save({u:[{id:id.val(),'delete':1}]}, 'updatePlacements', function(result) {
							$('#tabs tr').each(function(i) {
								if ($(this).data('pid') == id.val()) {
									$(this).remove();
								}
							});
							form.dialog('close');
							$.each(dds.loadConsumers(), function(i) {
								if (id.val() in this.placements) {
									delete this.placements[id.val()];
									return false;
								}
							});
						});
					}
				}
			},
			close:function() {
				$(this).find('#consumer-static').remove();
			}
		});
		$('#edit-consumers-btn').click(function() {
			$('#edit-consumers').dialog('open');
		})
		$('#edit-consumers').dialog({
			modal:true,
			autoOpen:false,
			buttons: {
				Close:function() {
					$(this).dialog('close');
				}
			
			},
			open:function() {
				var form = $(this), list = $('#consumers', this);
				list.children().remove();
				$.each(dds.loadConsumers(), function() {
					(function(c) {
						list.append($('<li/>').append(
							$('<a href="#">' + c.lname + ', ' + c.fname + ' (' + c.dob + ')</a>').on('click', function() {
								$('#add-consumer :input').each(function() {
									if (this.type == 'radio' || this.type == 'checkbox') {
										this.checked = this.id in c && c[this.id] == this.value;
									} else {
										this.value = this.id in c ? c[this.id] : '';
									}
								});
								$('#add-consumer').dialog('open');
								list.data('cid', $(this).closest('li').data('cid'));
								return false;
							})
						).data('cid', c.id));
					})(this);
				});
				$('#add-consumer').on('dialogclose', function() {
		//			console.log('updating consumers', list.data('cid'), list);
					cons = dds.loadConsumers(true);
					list.children().each(function() {
						if ($(this).data('cid') == list.data('cid')) {
							id = list.data('cid');
							$('a', this).text(cons[id].lname + ', ' + cons[id].fname + ' (' + cons[id].dob + ')');
						}
					});
					list.data('cid', null);
				});
			},
			close:function() {
				var cons = {};
				$.each(dds.loadConsumers(true), function(i) {
					if (this.status ^ 1) {
						cons[i] = this;
					}
				});
				dds.updateAutoCompleteItems($('#add-placement #consumerId'), cons, ['lname', ', ', 'fname', ' (', 'dob', ')'], 'id');
			}
		}).on('click', ':checkbox', function() {
			var id = this.value, c = id in dds.loadConsumers() ? dds.loadConsumers()[id] : {};
			dds.save({id:id, status:c.status ^ 1, _quiet:1}, 'saveConsumer', function() {});
		});
	},
	editPlacement:function(e) {
		var el = $(this), row = el.closest('tr'), form = $('#add-placement'), people = dds.loadConsumers(), cid = row.data('cid'), pid = row.data('pid'), person = cid in people ? people[cid] : {};
		$('#consumerIdac').removeClass('ui-helper-hidden');
		var placement = person && !!pid && pid in person.placements ? person.placements[pid] : {};
		$(':input', form).each(function() {
			if (this.id == 'notes') {
				return;
			}
			this.disabled = placement.verifiedStatus > 0 && this.id != 'status' && this.id != 'end';
			this.readOnly = placement.verifiedStatus > 0 && this.id != 'status' && this.id != 'end';
			if (!!this.type && this.type == 'checkbox' || this.type == 'radio') {
				var id = this.id.match(/^([a-z]+)(\d+)/i);
				this.checked = 1 in id && id[1] in placement && placement[id[1]] == id[2];
				$(this).change();
			} else {
				$(this).val(this.id in placement ? placement[this.id] : '').change();
			}
		});
		if ('id' in placement) {
			$('#consumerIdac', form).val(row.data('name')).addClass('ui-helper-hidden').before($('<span/>', {id:"consumer-static", text:row.data('name')}));
			$('#consumerId', form).val(person.id);
		}
		if ('notes' in placement) {
			var notes = '';
			$.each(placement.notes, function(i, note) {
				notes = '<br>' + note.note + notes;
			});
			$('#notes', form).next().remove().end().after($('<div/>', {html:notes}));
		} else {
			$('#notes', form).next().remove();
		}
		form.dialog('open');
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
		//		console.log('./?ajax=updatePlacements&' + update.serialize());
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

/**
 * Copyright (c)2005-2009 Matt Kruse (javascripttoolbox.com)
 * 
 * Dual licensed under the MIT and GPL licenses. 
 * This basically means you can use this code however you want for
 * free, but don't claim to have written it yourself!
 * Donations always accepted: http://www.JavascriptToolbox.com/donate/
 * 
 * Please do not link to the .js files on javascripttoolbox.com from
 * your site. Copy the files locally to your server instead.
 * 
 */
/**
 * Sort Functions
 */
var Sort = (function(){
	var sort = {};
	// Default alpha-numeric sort
	// --------------------------
	sort.alphanumeric = function(a,b) {
		return (a==b)?0:(a<b)?-1:1;
	};
	sort['default'] = sort.alphanumeric; // IE chokes on sort.default

	// This conversion is generalized to work for either a decimal separator of , or .
	sort.numeric_converter = function(separator) {
		return function(val) {
			if (typeof(val)=="string") {
				val = parseFloat(val.replace(/^[^\d\.]*([\d., ]+).*/g,"$1").replace(new RegExp("[^\\\d"+separator+"]","g"),'').replace(/,/,'.')) || 0;
 			}
			return val || 0;
		};
	};

	// Numeric Sort	
	// ------------
	sort.numeric = function(a,b) {
		return sort.numeric.convert(a)-sort.numeric.convert(b);
	};
	sort.numeric.convert = sort.numeric_converter(".");

	// Numeric Sort	- comma decimal separator
	// --------------------------------------
	sort.numeric_comma = function(a,b) {
		return sort.numeric_comma.convert(a)-sort.numeric_comma.convert(b);
	};
	sort.numeric_comma.convert = sort.numeric_converter(",");

	// Case-insensitive Sort
	// ---------------------
	sort.ignorecase = function(a,b) {
		return sort.alphanumeric(sort.ignorecase.convert(a),sort.ignorecase.convert(b));
	};
	sort.ignorecase.convert = function(val) {
		if (val==null) { return ""; }
		return (""+val).toLowerCase();
	};

	// Currency Sort
	// -------------
	sort.currency = sort.numeric; // Just treat it as numeric!
	sort.currency_comma = sort.numeric_comma;

	// Date sort
	// ---------
	sort.date = function(a,b) {
		return sort.numeric(sort.date.convert(a),sort.date.convert(b));
	};
	// Convert 2-digit years to 4
	sort.date.fixYear=function(yr) {
		yr = +yr;
		if (yr<50) { yr += 2000; }
		else if (yr<100) { yr += 1900; }
		return yr;
	};
	sort.date.formats = [
		// YY[YY]-MM-DD
		{ re:/(\d{2,4})-(\d{1,2})-(\d{1,2})/ , f:function(x){ return (new Date(sort.date.fixYear(x[1]),+x[2],+x[3])).getTime(); } }
		// MM/DD/YY[YY] or MM-DD-YY[YY]
		,{ re:/(\d{1,2})[\/-](\d{1,2})[\/-](\d{2,4})/ , f:function(x){ return (new Date(sort.date.fixYear(x[3]),+x[1],+x[2])).getTime(); } }
		// Any catch-all format that new Date() can handle. This is not reliable except for long formats, for example: 31 Jan 2000 01:23:45 GMT
		,{ re:/(.*\d{4}.*\d+:\d+\d+.*)/, f:function(x){ var d=new Date(x[1]); if(d){return d.getTime();} } }
	];
	sort.date.convert = function(val) {
		var m,v, f = sort.date.formats;
		for (var i=0,L=f.length; i<L; i++) {
			if (m=val.match(f[i].re)) {
				v=f[i].f(m);
				if (typeof(v)!="undefined") { return v; }
			}
		}
		return 9999999999999; // So non-parsed dates will be last, not first
	};

	return sort;
})();

/**
 * The main Table namespace
 */
var Table = (function(){

	/**
	 * Determine if a reference is defined
	 */
	function def(o) {return (typeof o!="undefined");};

	/**
	 * Determine if an object or class string contains a given class.
	 */
	function hasClass(o,name) {
		return new RegExp("(^|\\s)"+name+"(\\s|$)").test(o.className);
	};

	/**
	 * Add a class to an object
	 */
	function addClass(o,name) {
		var c = o.className || "";
		if (def(c) && !hasClass(o,name)) {
			o.className += (c?" ":"") + name;
		}
	};

	/**
	 * Remove a class from an object
	 */
	function removeClass(o,name) {
		var c = o.className || "";
		o.className = c.replace(new RegExp("(^|\\s)"+name+"(\\s|$)"),"$1");
	};

	/**
	 * For classes that match a given substring, return the rest
	 */
	function classValue(o,prefix) {
		var c = o.className;
		if (c.match(new RegExp("(^|\\s)"+prefix+"([^ ]+)"))) {
			return RegExp.$2;
		}
		return null;
	};

	/**
	 * Return true if an object is hidden.
	 * This uses the "russian doll" technique to unwrap itself to the most efficient
	 * function after the first pass. This avoids repeated feature detection that 
	 * would always fall into the same block of code.
	 */
	 function isHidden(o) {
		if (window.getComputedStyle) {
			var cs = window.getComputedStyle;
			return (isHidden = function(o) {
				return 'none'==cs(o,null).getPropertyValue('display');
			})(o);
		}
		else if (window.currentStyle) {
			return(isHidden = function(o) {
				return 'none'==o.currentStyle['display'];
			})(o);
		}
		return (isHidden = function(o) {
			return 'none'==o.style['display'];
		})(o);
	};

	/**
	 * Get a parent element by tag name, or the original element if it is of the tag type
	 */
	function getParent(o,a,b) {
		if (o!=null && o.nodeName) {
			if (o.nodeName==a || (b && o.nodeName==b)) {
				return o;
			}
			while (o=o.parentNode) {
				if (o.nodeName && (o.nodeName==a || (b && o.nodeName==b))) {
					return o;
				}
			}
		}
		return null;
	};

	/**
	 * Utility function to copy properties from one object to another
 	*/
	function copy(o1,o2) {
		for (var i=2;i<arguments.length; i++) {
			var a = arguments[i];
			if (def(o1[a])) {
				o2[a] = o1[a];
			}
		}
	}

	// The table object itself
	var table = {
		//Class names used in the code
		AutoStripeClassName:"table-autostripe",
		StripeClassNamePrefix:"table-stripeclass:",

		AutoSortClassName:"table-autosort",
		AutoSortColumnPrefix:"table-autosort:",
		AutoSortTitle:"Click to sort",
		SortedAscendingClassName:"table-sorted-asc",
		SortedDescendingClassName:"table-sorted-desc",
		SortableClassName:"table-sortable",
		SortableColumnPrefix:"table-sortable:",
		NoSortClassName:"table-nosort",

		AutoFilterClassName:"table-autofilter",
		FilteredClassName:"table-filtered",
		FilterableClassName:"table-filterable",
		FilteredRowcountPrefix:"table-filtered-rowcount:",
		RowcountPrefix:"table-rowcount:",
		FilterAllLabel:"Filter: All",

		AutoPageSizePrefix:"table-autopage:",
		AutoPageJumpPrefix:"table-page:",
		PageNumberPrefix:"table-page-number:",
		PageCountPrefix:"table-page-count:"
	};

	/**
	 * A place to store misc table information, rather than in the table objects themselves
	 */
	table.tabledata = {};

	/**
	 * Resolve a table given an element reference, and make sure it has a unique ID
	 */
	table.uniqueId=1;
	table.resolve = function(o,args) {
		if (o!=null && o.nodeName && o.nodeName!="TABLE") {
			o = getParent(o,"TABLE");
		}
		if (o==null) { return null; }
		if (!o.id) {
			var id = null;
			do { var id = "TABLE_"+(table.uniqueId++); } 
				while (document.getElementById(id)!=null);
			o.id = id;
		}
		this.tabledata[o.id] = this.tabledata[o.id] || {};
		if (args) {
			copy(args,this.tabledata[o.id],"stripeclass","ignorehiddenrows","useinnertext","sorttype","col","desc","page","pagesize");
		}
		return o;
	};


	/**
	 * Run a function against each cell in a table header or footer, usually 
	 * to add or remove css classes based on sorting, filtering, etc.
	 */
	table.processTableCells = function(t, type, func, arg) {
		t = this.resolve(t);
		if (t==null) { return; }
		if (type!="TFOOT") {
			this.processCells(t.tHead, func, arg);
		}
		if (type!="THEAD") {
			this.processCells(t.tFoot, func, arg);
		}
	};

	/**
	 * Internal method used to process an arbitrary collection of cells.
	 * Referenced by processTableCells.
	 * It's done this way to avoid getElementsByTagName() which would also return nested table cells.
	 */
	table.processCells = function(section,func,arg) {
		if (section!=null) {
			if (section.rows && section.rows.length && section.rows.length>0) { 
				var rows = section.rows;
				for (var j=0,L2=rows.length; j<L2; j++) { 
					var row = rows[j];
					if (row.cells && row.cells.length && row.cells.length>0) {
						var cells = row.cells;
						for (var k=0,L3=cells.length; k<L3; k++) {
							var cellsK = cells[k];
							func.call(this,cellsK,arg);
						}
					}
				}
			}
		}
	};

	/**
	 * Get the cellIndex value for a cell. This is only needed because of a Safari
	 * bug that causes cellIndex to exist but always be 0.
	 * Rather than feature-detecting each time it is called, the function will
	 * re-write itself the first time it is called.
	 */
	table.getCellIndex = function(td) {
		var tr = td.parentNode;
		var cells = tr.cells;
		if (cells && cells.length) {
			if (cells.length>1 && cells[cells.length-1].cellIndex>0) {
				// Define the new function, overwrite the one we're running now, and then run the new one
				(this.getCellIndex = function(td) {
					return td.cellIndex;
				})(td);
			}
			// Safari will always go through this slower block every time. Oh well.
			for (var i=0,L=cells.length; i<L; i++) {
				if (tr.cells[i]==td) {
					return i;
				}
			}
		}
		return 0;
	};

	/**
	 * A map of node names and how to convert them into their "value" for sorting, filtering, etc.
	 * These are put here so it is extensible.
	 */
	table.nodeValue = {
		'INPUT':function(node) { 
			if (def(node.value) && node.type && ((node.type!="checkbox" && node.type!="radio") || node.checked)) {
				return node.value;
			}
			return "";
		},
		'SELECT':function(node) {
			if (node.selectedIndex>=0 && node.options) {
				// Sort select elements by the visible text
				return node.options[node.selectedIndex].text;
			}
			return "";
		},
		'IMG':function(node) {
			return node.name || "";
		}
	};

	/**
 	 * Get the text value of a cell. Only use innerText if explicitly told to, because 
	 * otherwise we want to be able to handle sorting on inputs and other types
	 */
	table.getCellValue = function(td,useInnerText) {
		if (useInnerText && def(td.innerText)) {
			return td.innerText;
		}
		if (!td.childNodes) { 
			return ""; 
		}
		var childNodes=td.childNodes;
		var ret = "";
		for (var i=0,L=childNodes.length; i<L; i++) {
			var node = childNodes[i];
			var type = node.nodeType;
			// In order to get realistic sort results, we need to treat some elements in a special way.
			// These behaviors are defined in the nodeValue() object, keyed by node name
			if (type==1) {
				var nname = node.nodeName;
				if (this.nodeValue[nname]) {
					ret += this.nodeValue[nname](node);
				}
				else {
					ret += this.getCellValue(node);
				}
			}
			else if (type==3) {
				if (def(node.innerText)) {
					ret += node.innerText;
				}
				else if (def(node.nodeValue)) {
					ret += node.nodeValue;
				}
			}
		}
		return ret;
	};

	/**
	 * Consider colspan and rowspan values in table header cells to calculate the actual cellIndex
	 * of a given cell. This is necessary because if the first cell in row 0 has a rowspan of 2, 
	 * then the first cell in row 1 will have a cellIndex of 0 rather than 1, even though it really
	 * starts in the second column rather than the first.
	 * See: http://www.javascripttoolbox.com/temp/table_cellindex.html
	 */
	table.tableHeaderIndexes = {};
	table.getActualCellIndex = function(tableCellObj) {
		if (!def(tableCellObj.cellIndex)) { return null; }
		var tableObj = getParent(tableCellObj,"TABLE");
		var cellCoordinates = tableCellObj.parentNode.rowIndex+"-"+this.getCellIndex(tableCellObj);

		// If it has already been computed, return the answer from the lookup table
		if (def(this.tableHeaderIndexes[tableObj.id])) {
			return this.tableHeaderIndexes[tableObj.id][cellCoordinates];      
		} 

		var matrix = [];
		this.tableHeaderIndexes[tableObj.id] = {};
		var thead = getParent(tableCellObj,"THEAD");
		var trs = thead.getElementsByTagName('TR');

		// Loop thru every tr and every cell in the tr, building up a 2-d array "grid" that gets
		// populated with an "x" for each space that a cell takes up. If the first cell is colspan
		// 2, it will fill in values [0] and [1] in the first array, so that the second cell will
		// find the first empty cell in the first row (which will be [2]) and know that this is
		// where it sits, rather than its internal .cellIndex value of [1].
		for (var i=0; i<trs.length; i++) {
			var cells = trs[i].cells;
			for (var j=0; j<cells.length; j++) {
				var c = cells[j];
				var rowIndex = c.parentNode.rowIndex;
				var cellId = rowIndex+"-"+this.getCellIndex(c);
				var rowSpan = c.rowSpan || 1;
				var colSpan = c.colSpan || 1;
				var firstAvailCol;
				if(!def(matrix[rowIndex])) { 
					matrix[rowIndex] = []; 
				}
				var m = matrix[rowIndex];
				// Find first available column in the first row
				for (var k=0; k<m.length+1; k++) {
					if (!def(m[k])) {
						firstAvailCol = k;
						break;
					}
				}
				this.tableHeaderIndexes[tableObj.id][cellId] = firstAvailCol;
				for (var k=rowIndex; k<rowIndex+rowSpan; k++) {
					if(!def(matrix[k])) { 
						matrix[k] = []; 
					}
					var matrixrow = matrix[k];
					for (var l=firstAvailCol; l<firstAvailCol+colSpan; l++) {
						matrixrow[l] = "x";
					}
				}
			}
		}
		// Store the map so future lookups are fast.
		return this.tableHeaderIndexes[tableObj.id][cellCoordinates];
	};

	/**
	 * Sort all rows in each TBODY (tbodies are sorted independent of each other)
	 */
	table.sort = function(o,args) {
		var t, tdata, sortconvert=null;
		// Allow for a simple passing of sort type as second parameter
		if (typeof(args)=="function") {
			args={sorttype:args};
		}
		args = args || {};

		// If no col is specified, deduce it from the object sent in
		if (!def(args.col)) { 
			args.col = this.getActualCellIndex(o) || 0; 
		}
		// If no sort type is specified, default to the default sort
		args.sorttype = args.sorttype || Sort['default'];

		// Resolve the table
		t = this.resolve(o,args);
		tdata = this.tabledata[t.id];

		// If we are sorting on the same column as last time, flip the sort direction
		if (def(tdata.lastcol) && tdata.lastcol==tdata.col && def(tdata.lastdesc)) {
			tdata.desc = !tdata.lastdesc;
		}
		else {
			tdata.desc = !!args.desc;
		}

		// Store the last sorted column so clicking again will reverse the sort order
		tdata.lastcol=tdata.col;
		tdata.lastdesc=!!tdata.desc;

		// If a sort conversion function exists, pre-convert cell values and then use a plain alphanumeric sort
		var sorttype = tdata.sorttype;
		if (typeof(sorttype.convert)=="function") {
			sortconvert=tdata.sorttype.convert;
			sorttype=Sort.alphanumeric;
		}

		// Loop through all THEADs and remove sorted class names, then re-add them for the col
		// that is being sorted
		this.processTableCells(t,"THEAD",
			function(cell) {
				if (hasClass(cell,this.SortableClassName)) {
					removeClass(cell,this.SortedAscendingClassName);
					removeClass(cell,this.SortedDescendingClassName);
					// If the computed colIndex of the cell equals the sorted colIndex, flag it as sorted
					if (tdata.col==table.getActualCellIndex(cell) && (classValue(cell,table.SortableClassName))) {
						addClass(cell,tdata.desc?this.SortedAscendingClassName:this.SortedDescendingClassName);
					}
				}
			}
		);

		// Sort each tbody independently
		var bodies = t.tBodies;
		if (bodies==null || bodies.length==0) { return; }

		// Define a new sort function to be called to consider descending or not
		var newSortFunc = (tdata.desc)?
			function(a,b){return sorttype(b[0],a[0]);}
			:function(a,b){return sorttype(a[0],b[0]);};

		var useinnertext=!!tdata.useinnertext;
		var col = tdata.col;

		for (var i=0,L=bodies.length; i<L; i++) {
			var tb = bodies[i], tbrows = tb.rows, rows = [];

			// Allow tbodies to request that they not be sorted
			if(!hasClass(tb,table.NoSortClassName)) {
				// Create a separate array which will store the converted values and refs to the
				// actual rows. This is the array that will be sorted.
				var cRow, cRowIndex=0;
				if (cRow=tbrows[cRowIndex]){
					// Funky loop style because it's considerably faster in IE
					do {
						if (rowCells = cRow.cells) {
							var cellValue = (col<rowCells.length)?this.getCellValue(rowCells[col],useinnertext):null;
							if (sortconvert) cellValue = sortconvert(cellValue);
							rows[cRowIndex] = [cellValue,tbrows[cRowIndex]];
						}
					} while (cRow=tbrows[++cRowIndex])
				}

				// Do the actual sorting
				rows.sort(newSortFunc);

				// Move the rows to the correctly sorted order. Appending an existing DOM object just moves it!
				cRowIndex=0;
				var displayedCount=0;
				var f=[removeClass,addClass];
				if (cRow=rows[cRowIndex]){
					do { 
						tb.appendChild(cRow[1]); 
					} while (cRow=rows[++cRowIndex])
				}
			}
		}

		// If paging is enabled on the table, then we need to re-page because the order of rows has changed!
		if (tdata.pagesize) {
			this.page(t); // This will internally do the striping
		}
		else {
			// Re-stripe if a class name was supplied
			if (tdata.stripeclass) {
				this.stripe(t,tdata.stripeclass,!!tdata.ignorehiddenrows);
			}
		}
	};

	/**
	* Apply a filter to rows in a table and hide those that do not match.
	*/
	table.filter = function(o,filters,args) {
		var cell;
		args = args || {};

		var t = this.resolve(o,args);
		var tdata = this.tabledata[t.id];

		// If new filters were passed in, apply them to the table's list of filters
		if (!filters) {
			// If a null or blank value was sent in for 'filters' then that means reset the table to no filters
			tdata.filters = null;
		}
		else {
			// Allow for passing a select list in as the filter, since this is common design
			if (filters.nodeName=="SELECT" && filters.type=="select-one" && filters.selectedIndex>-1) {
				filters={ 'filter':filters.options[filters.selectedIndex].value };
			}
			// Also allow for a regular input
			if (filters.nodeName=="INPUT" && filters.type=="text") {
				filters={ 'filter':"/"+filters.value+"/" };
			}
			// Force filters to be an array
			if (typeof(filters)=="object" && !filters.length) {
				filters = [filters];
			}

			// Convert regular expression strings to RegExp objects and function strings to function objects
			for (var i=0,L=filters.length; i<L; i++) {
				var filter = filters[i];
				if (typeof(filter.filter)=="string") {
					// If a filter string is like "/expr/" then turn it into a Regex
					if (filter.filter.match(/^\/(.*)\/$/)) {
						filter.filter = new RegExp(RegExp.$1, 'i');
						filter.filter.regex=true;
					}
					// If filter string is like "function (x) { ... }" then turn it into a function
					else if (filter.filter.match(/^function\s*\(([^\)]*)\)\s*\{(.*)}\s*$/)) {
						filter.filter = Function(RegExp.$1,RegExp.$2);
					}
				}
				// If some non-table object was passed in rather than a 'col' value, resolve it 
				// and assign it's column index to the filter if it doesn't have one. This way, 
				// passing in a cell reference or a select object etc instead of a table object 
				// will automatically set the correct column to filter.
				if (filter && !def(filter.col) && (cell=getParent(o,"TD","TH"))) {
					filter.col = this.getCellIndex(cell);
				}

				// Apply the passed-in filters to the existing list of filters for the table, removing those that have a filter of null or ""
				if ((!filter || !filter.filter) && tdata.filters) {
					delete tdata.filters[filter.col];
				}
				else {
					tdata.filters = tdata.filters || {};
					tdata.filters[filter.col] = filter.filter;
				}
			}
			// If no more filters are left, then make sure to empty out the filters object
			for (var j in tdata.filters) { var keep = true; }
			if (!keep) {
				tdata.filters = null;
			}
		}		
		// Everything's been setup, so now scrape the table rows
		return table.scrape(o);
	};

	/**
	 * "Page" a table by showing only a subset of the rows
	 */
	table.page = function(t,page,args) {
		args = args || {};
		if (def(page)) { args.page = page; }
		return table.scrape(t,args);
	};

	/**
	 * Jump forward or back any number of pages
	 */
	table.pageJump = function(t,count,args) {
		t = this.resolve(t,args);
		return this.page(t,(table.tabledata[t.id].page||0)+count,args);
	};

	/**
	 * Go to the next page of a paged table
	 */	
	table.pageNext = function(t,args) {
		return this.pageJump(t,1,args);
	};

	/**
	 * Go to the previous page of a paged table
	 */	
	table.pagePrevious = function(t,args) {
		return this.pageJump(t,-1,args);
	};

	/**
	* Scrape a table to either hide or show each row based on filters and paging
	*/
	table.scrape = function(o,args) {
		var col,cell,filterList,filterReset=false,filter;
		var page,pagesize,pagestart,pageend;
		var unfilteredrows=[],unfilteredrowcount=0,totalrows=0;
		var t,tdata,row,hideRow;
		args = args || {};

		// Resolve the table object
		t = this.resolve(o,args);
		tdata = this.tabledata[t.id];

		// Setup for Paging
		var page = tdata.page;
		if (def(page)) {
			// Don't let the page go before the beginning
			if (page<0) { tdata.page=page=0; }
			pagesize = tdata.pagesize || 25; // 25=arbitrary default
			pagestart = page*pagesize+1;
			pageend = pagestart + pagesize - 1;
		}

		// Scrape each row of each tbody
		var bodies = t.tBodies;
		if (bodies==null || bodies.length==0) { return; }
		for (var i=0,L=bodies.length; i<L; i++) {
			var tb = bodies[i];
			for (var j=0,L2=tb.rows.length; j<L2; j++) {
				row = tb.rows[j];
				hideRow = false;

				// Test if filters will hide the row
				if (tdata.filters && row.cells) {
					var cells = row.cells;
					var cellsLength = cells.length;
					// Test each filter
					for (col in tdata.filters) {
						if (!hideRow) {
							filter = tdata.filters[col];
							if (filter && col<cellsLength) {
								var val = this.getCellValue(cells[col]);
								if (filter.regex && val.search) {
									hideRow=(val.search(filter)<0);
								}
								else if (typeof(filter)=="function") {
									hideRow=!filter(val,cells[col]);
								}
								else {
									hideRow = (val!=filter);
								}
							}
						}
					}
				}

				// Keep track of the total rows scanned and the total runs _not_ filtered out
				totalrows++;
				if (!hideRow) {
					unfilteredrowcount++;
					if (def(page)) {
						// Temporarily keep an array of unfiltered rows in case the page we're on goes past
						// the last page and we need to back up. Don't want to filter again!
						unfilteredrows.push(row);
						if (unfilteredrowcount<pagestart || unfilteredrowcount>pageend) {
							hideRow = true;
						}
					}
				}

				row.style.display = hideRow?"none":"";
			}
		}

		if (def(page)) {
			// Check to see if filtering has put us past the requested page index. If it has, 
			// then go back to the last page and show it.
			if (pagestart>=unfilteredrowcount) {
				pagestart = unfilteredrowcount-(unfilteredrowcount%pagesize);
				tdata.page = page = pagestart/pagesize;
				for (var i=pagestart,L=unfilteredrows.length; i<L; i++) {
					unfilteredrows[i].style.display="";
				}
			}
		}

		// Loop through all THEADs and add/remove filtered class names
		this.processTableCells(t,"THEAD",
			function(c) {
				((tdata.filters && def(tdata.filters[table.getCellIndex(c)]) && hasClass(c,table.FilterableClassName))?addClass:removeClass)(c,table.FilteredClassName);
			}
		);

		// Stripe the table if necessary
		if (tdata.stripeclass) {
			this.stripe(t);
		}

		// Calculate some values to be returned for info and updating purposes
		var pagecount = Math.floor(unfilteredrowcount/pagesize)+1;
		if (def(page)) {
			// Update the page number/total containers if they exist
			if (tdata.container_number) {
				tdata.container_number.innerHTML = page+1;
			}
			if (tdata.container_count) {
				tdata.container_count.innerHTML = pagecount;
			}
		}

		// Update the row count containers if they exist
		if (tdata.container_filtered_count) {
			tdata.container_filtered_count.innerHTML = unfilteredrowcount;
		}
		if (tdata.container_all_count) {
			tdata.container_all_count.innerHTML = totalrows;
		}
		return { 'data':tdata, 'unfilteredcount':unfilteredrowcount, 'total':totalrows, 'pagecount':pagecount, 'page':page, 'pagesize':pagesize };
	};

	/**
	 * Shade alternate rows, aka Stripe the table.
	 */
	table.stripe = function(t,className,args) { 
		args = args || {};
		args.stripeclass = className;

		t = this.resolve(t,args);
		var tdata = this.tabledata[t.id];

		var bodies = t.tBodies;
		if (bodies==null || bodies.length==0) { 
			return; 
		}

		className = tdata.stripeclass;
		// Cache a shorter, quicker reference to either the remove or add class methods
		var f=[removeClass,addClass];
		for (var i=0,L=bodies.length; i<L; i++) {
			var tb = bodies[i], tbrows = tb.rows, cRowIndex=0, cRow, displayedCount=0;
			if (cRow=tbrows[cRowIndex]){
				// The ignorehiddenrows test is pulled out of the loop for a slight speed increase.
				// Makes a bigger difference in FF than in IE.
				// In this case, speed always wins over brevity!
				if (tdata.ignoreHiddenRows) {
					do {
						f[displayedCount++%2](cRow,className);
					} while (cRow=tbrows[++cRowIndex])
				}
				else {
					do {
						if (!isHidden(cRow)) {
							f[displayedCount++%2](cRow,className);
						}
					} while (cRow=tbrows[++cRowIndex])
				}
			}
		}
	};

	/**
	 * Build up a list of unique values in a table column
	 */
	table.getUniqueColValues = function(t,col) {
		var values={}, bodies = this.resolve(t).tBodies;
		for (var i=0,L=bodies.length; i<L; i++) {
			var tbody = bodies[i];
			for (var r=0,L2=tbody.rows.length; r<L2; r++) {
				values[this.getCellValue(tbody.rows[r].cells[col])] = true;
			}
		}
		var valArray = [];
		for (var val in values) {
			valArray.push(val);
		}
		return valArray.sort();
	};

	/**
	 * Scan the document on load and add sorting, filtering, paging etc ability automatically
	 * based on existence of class names on the table and cells.
	 */
	table.auto = function(args) {
		var cells = [], tables = document.getElementsByTagName("TABLE");
		var val,tdata;
		if (tables!=null) {
			for (var i=0,L=tables.length; i<L; i++) {
				var t = table.resolve(tables[i]);
				tdata = table.tabledata[t.id];
				if (val=classValue(t,table.StripeClassNamePrefix)) {
					tdata.stripeclass=val;
				}
				// Do auto-filter if necessary
				if (hasClass(t,table.AutoFilterClassName)) {
					table.autofilter(t);
				}
				// Do auto-page if necessary
				if (val = classValue(t,table.AutoPageSizePrefix)) {
					table.autopage(t,{'pagesize':+val});
				}
				// Do auto-sort if necessary
				if ((val = classValue(t,table.AutoSortColumnPrefix)) || (hasClass(t,table.AutoSortClassName))) {
					table.autosort(t,{'col':(val==null)?null:+val});
				}
				// Do auto-stripe if necessary
				if (tdata.stripeclass && hasClass(t,table.AutoStripeClassName)) {
					table.stripe(t);
				}
			}
		}
	};

	/**
	 * Add sorting functionality to a table header cell
	 */
	table.autosort = function(t,args) {
		t = this.resolve(t,args);
		var tdata = this.tabledata[t.id];
		this.processTableCells(t, "THEAD", function(c) {
			var type = classValue(c,table.SortableColumnPrefix);
			if (type!=null) {
				type = type || "default";
				c.title =c.title || table.AutoSortTitle;
				addClass(c,table.SortableClassName);
				c.onclick = Function("","Table.sort(this,{'sorttype':Sort['"+type+"']})");
				// If we are going to auto sort on a column, we need to keep track of what kind of sort it will be
				if (args.col!=null) {
					if (args.col==table.getActualCellIndex(c)) {
						tdata.sorttype=Sort['"+type+"'];
					}
				}
			}
		} );
		if (args.col!=null) {
			table.sort(t,args);
		}
	};

	/**
	 * Add paging functionality to a table 
	 */
	table.autopage = function(t,args) {
		t = this.resolve(t,args);
		var tdata = this.tabledata[t.id];
		if (tdata.pagesize) {
			this.processTableCells(t, "THEAD,TFOOT", function(c) {
				var type = classValue(c,table.AutoPageJumpPrefix);
				if (type=="next") { type = 1; }
				else if (type=="previous") { type = -1; }
				if (type!=null) {
					c.onclick = Function("","Table.pageJump(this,"+type+")");
				}
			} );
			if (val = classValue(t,table.PageNumberPrefix)) {
				tdata.container_number = document.getElementById(val);
			}
			if (val = classValue(t,table.PageCountPrefix)) {
				tdata.container_count = document.getElementById(val);
			}
			return table.page(t,0,args);
		}
	};

	/**
	 * A util function to cancel bubbling of clicks on filter dropdowns
	 */
	table.cancelBubble = function(e) {
		e = e || window.event;
		if (typeof(e.stopPropagation)=="function") { e.stopPropagation(); } 
		if (def(e.cancelBubble)) { e.cancelBubble = true; }
	};

	/**
	 * Auto-filter a table
	 */
	table.autofilter = function(t,args) {
		args = args || {};
		t = this.resolve(t,args);
		var tdata = this.tabledata[t.id],val;
		table.processTableCells(t, "THEAD", function(cell) {
			if (hasClass(cell,table.FilterableClassName)) {
				var cellIndex = table.getCellIndex(cell);
				var colValues = table.getUniqueColValues(t,cellIndex);
				if (colValues.length>0) {
					if (typeof(args.insert)=="function") {
						func.insert(cell,colValues);
					}
					else {
						var sel = '<select onchange="Table.filter(this,this)" onclick="Table.cancelBubble(event)" class="'+table.AutoFilterClassName+'"><option value="">'+table.FilterAllLabel+'</option>';
						for (var i=0; i<colValues.length; i++) {
							sel += '<option value="'+colValues[i]+'">'+colValues[i]+'</option>';
						}
						sel += '</select>';
						cell.innerHTML += "<br>"+sel;
					}
				}
			}
		});
		if (val = classValue(t,table.FilteredRowcountPrefix)) {
			tdata.container_filtered_count = document.getElementById(val);
		}
		if (val = classValue(t,table.RowcountPrefix)) {
			tdata.container_all_count = document.getElementById(val);
		}
	};

	/**
	 * Attach the auto event so it happens on load.
	 * use jQuery's ready() function if available
	 */
	if (typeof(jQuery)!="undefined") {
		jQuery(table.auto);
	}
	else if (window.addEventListener) {
		window.addEventListener( "load", table.auto, false );
	}
	else if (window.attachEvent) {
		window.attachEvent( "onload", table.auto );
	}

	return table;
})();


$(function() {
	var refreshed = localStorage.getItem('refreshed');
	if (!refreshed || refreshed != (new Date).toDateString()) {
		dds.refresh(1);
	}
	$('.datepicker').datepicker({'dateFormat':'mm/dd/yy', 'maxDate':new Date(), 'yearRange':'-100'});
	$('.ac-label').live({keydown:function(e) {
		var el = $(this);
		if (e.which == 27) {
			el.val('');
			$('#' + el.attr('rel')).val('');
			return;
		}
		
		if (!Array.prototype.indexOf)
		{
		  Array.prototype.indexOf = function(elt /*, from*/)
		  {
		    var len = this.length >>> 0;

		    var from = Number(arguments[1]) || 0;
		    from = (from < 0)
		         ? Math.ceil(from)
		         : Math.floor(from);
		    if (from < 0)
		      from += len;

		    for (; from < len; from++)
		    {
		      if (from in this &&
		          this[from] === elt)
		        return from;
		    }
		    return -1;
		  };
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
	$('tr.clickable td').live({
		mouseover:function(e) {
			var el = $(this);
			if (!el.hasClass('nonclickable')) {
				el.parent().addClass('active ui-state-hover');
			}
		},
		mouseout:function(e) {
			$(this).parent().removeClass('active ui-state-hover');
		}
	});
	$(document).on('click', 'th.table-sortable', function(e) {
		var cls = $(this).hasClass('ui-state-active') ? 'ui-state-active' : ($(this).hasClass('ui-state-highlight') ? 'ui-state-highlight' : '');
		$(this).removeClass(cls).addClass(cls != 'ui-state-active' ? 'ui-state-active' : 'ui-state-highlight').siblings('.table-sortable').removeClass('ui-state-active ui-state-highlight');
	});
	$('tr.clickable td:not(.nonclickable)').live('click', dds.eohis.editPlacement);
	if (typeof(mainFunc) == 'function') {
		mainFunc();
	}
	$(document).on('keydown', 'thead', function(e) {
		if (e.which == 13 || e.which == 10) {
			e.stopPropagation();
			return false;
		}
	});
});