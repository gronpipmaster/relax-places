$(function() {
	var map
	var geocoder
	loadScript()
	autoComplit()

	$('.sidebar').click(function(){
		clearData()
		return false
	})
})

function clearData(){
	$('.result li').remove()
}

function processClickData(item){
	
	item.click(function(){
		console.log($(this))
		placeMarker(new google.maps.LatLng($(this).attr('lat') , $(this).attr('lon')))
		$('.result').hide()
		return false
	})
}

function processJson(data){
	var response = $(data['result'])
	console.log(data['result'])
	var container = $('.result')
	if(response.length > 0){
		container.show()
	}
	for(var i=0;i<response.length;i++){
		var name = response[i]['name']
		var lat = response[i]['lat']
		var lon = response[i]['lon']
		var point = response[i]['centroid'].replace('POINT(', '').replace(')', '').split(' ')

		container.append('<li><a href="#" lat="'+ point[1] +'" lon="'+ point[0] +'">' + name + '</a></li>')
	}
	processClickData($('.result li a'))
}

function autoComplit(){
// 	$('#search')
	var form = $('#search')
	var what = $('#what')


// 	form.submit(function(){return false})
	what.keypress(function(){
		var value = $(this).val()
		if(value.length > 2){
			console.log(value)
			form.ajaxForm({
// 				target:        '#output',
				// dataType identifies the expected content type of the server response
// 				dataType:  'json',
				// success identifies the function to invoke when the server response
				// has been received
				beforeSubmit: clearData(),
				success:   processJson
			}) 
		}
	})
	
}

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
	console.log(location)
	var marker = new google.maps.Marker({
		position: location,
		map: map
	})
	map.setCenter(location, 10);
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