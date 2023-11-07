window.onload = loader;
var y = null, a = null, p = null, y = null;



function getNextGeo(e) { var y = $('#y').val();
	var b = $(e ? (e.srcElement ? e.srcElement : e.target) : window.event.srcElement).attr('id') == 'r', s = b ? a : p;
	s.load('ajax.php?y=' + y + '&r=' + r.val().replace(' ', '+') + (!b ? '&ao=' + a.val().replace(' ', '+') : ''));
	b && a.change();
}


function loader() {
	y = $('#y').first();
	r = $('#r').first();
	a = $('#ao').first();
	p = $('#p').first();
	var url = 'ajax_y.php?y=' + $('#y').val();
	if(document.getElementById('p')) document.getElementById('p').innerHTML = "";
	$('#p').load(url);
	$('#y').change(function() {
		var newurl = 'ajax_y.php?y=' + $('#y').val();
		if(document.getElementById('p')) document.getElementById('p').innerHTML = "";
		$('#p').load(newurl);
	});



	if (r !== null) {
		r.change(getNextGeo);
		r.change();
	}
	a !== null && a.change(getNextGeo);
}
