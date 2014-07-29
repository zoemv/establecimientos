$(function() {
	var latitud = $('input[name=latitud]').val() ? $('input[name=latitud]').val() : 19.401440;
	var longitud = $('input[name=longitud]').val() ? $('input[name=longitud]').val() : -99.271468;
	$('input[name=latitud]').val(latitud);
	$('input[name=longitud]').val(longitud);
	function initialize() {
		mapOptions = {
			zoom : 12,
			center : new google.maps.LatLng(latitud, longitud),
		};
		var map = new google.maps.Map(document.getElementById('mapa'),
				mapOptions);

		var marker = new google.maps.Marker({
			position : map.getCenter(),
			map : map,
			draggable : true
		});
		google.maps.event.addListener(marker, 'dragend', function() {
			var position = marker.getPosition();
			latitud = position['k'];
			longitud = position['B'];
			$('input[name=latitud]').val(latitud);
			$('input[name=longitud]').val(longitud);
		});
	}
	initialize();
});
