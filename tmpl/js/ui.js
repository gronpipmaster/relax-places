$(function() {
	var map
	var geocoder
	loadScript()
})

// http://maps.google.com/?ll=54.853885,83.125134&spn=0.059489,0.154324&z=13&vpsrc=6
function initialize() {
	geocoder = new google.maps.Geocoder()
	var myLatlng = new google.maps.LatLng(54.853885,83.125134)
	var myOptions = {
		zoom: 10,
		center: myLatlng,
		disableDoubleClickZoom: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	map = new google.maps.Map(document.getElementById('map_canvas'), myOptions)
	
	google.maps.event.addListener(map, 'dblclick', function(event) {
		placeMarker(event.latLng)
// 		latLngInputAdd(event.latLng)
// 		submitForm()
	})
}

function placeMarker(location) {
	var marker = new google.maps.Marker({
		position: location,
		map: map
	})
	// 	console.log('1')
}

function latLngInputAdd(location){
// 	var lat = $('input.latitude')
// 	var long = $('input.longitude')
// 	
// 	arr = $.map(location, function (data) {
// 		return data
// 	})
// 	
// 	lat.val(arr[0])
// 	long.val(arr[1])
}

function codeAddress() {
	var address = $('input.search').val();
	geocoder.geocode( { 'address': address},function(results, status) {
		
		if (status == google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
				map: map,
				position: results[0].geometry.location
				
			})
			latLngInputAdd(results[0].geometry.location)
			
		} else {
			
			console.log('Geocode was not successful for the following reason: ' + status);
			
		}
		
	})
	
}

function loadScript() {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'http://maps.google.com/maps/api/js?sensor=false&region=RU&callback=initialize';
	document.body.appendChild(script);
}