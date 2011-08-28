$(function() {
	var map
	var geocoder
	loadScript()
	autoComplit()

	$('.sidebar').click(function(){
		clearData()
		return false
	})

	$('#searchNearBy').submit(function(){
// 		.ajaxSubmit()
		$(this).ajaxSubmit({
// 			beforeSubmit: clearData(),
			success:   function(data){console.log(data)}
		})
		return false
	})
	actionFocusFields()
	
})

function actionFocusFields(){

	var form = $('.form')
	var what = new FocusFielsd( form.find( 'input[name="what"]' )[0], 'Где' ),
		radius = new FocusFielsd( form.find( 'input[name="radius"]' )[0], 'Радиус' )
}

function tmplFormSend(location){

	arr = $.map(location, function (data) {
		return data
	})
	
// 	lat.val(arr[0])
// 	long.val(arr[1])
	$('.map').append(
		'<form action="'+ baseurl + '/index.php" name="send" id="send" class="form">' +
			'<a href="#">x</a><br>' +
			'<input type="hidden" name="r" value="places/addPlace"/>' +
			'<input type="hidden" name="lon" value="'+ arr[0] +'"/>' +
			'<input type="hidden" name="lat" value="'+ arr[1] +'"/>' +
			'<input type="hidden" name="use_id" value="1"/>' +
// 			'<label><b>Title</b>' +
				'<input type="text" name="title" class="title text"/>' +
// 			'</label>' +
// 			'<label><b>Desc</b>' +
				'<textarea name="desc" class="desc"></textarea>' +
// 			'</label>' +
			'<input type="submit" value="Send" class="submit"/>' +
		'</form>'
	)
	$('#send a').click(function(){
		dethFormSend()
		return false
	})
	var title = new FocusFielsd( $('#send').find( 'input[name="title"]' )[0], 'Название' ),
	comment = new FocusFielsd( $('#send').find( 'textarea[name="desc"]' )[0], 'Комментарий' )
}

function dethFormSend(){
	$('#send').remove()
}


function clearData(){
	$('.result li').remove()
	$('.result').hide()
}

function processClickData(item){
	
	item.click(function(){
		console.log($(this))
// 		placeMarker()
		var lat = $(this).attr('lat')
		var lon = $(this).attr('lon')
		map.setCenter(new google.maps.LatLng(lon , lat), 3);        
		map.setZoom(15);        
		$('#searchNearBy input[name="lat"]').val(lat)
		$('#searchNearBy input[name="lon"]').val(lon)
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
// 		var lat = response[i]['lat']
// 		var lon = response[i]['lon']
		var point = response[i]['centroid'].replace('POINT(', '').replace(')', '').split(' ')

		container.append('<li><a href="#" lat="'+ point[0] +'" lon="'+ point[1] +'">' + name + '</a></li>')
	}
	processClickData($('.result li a'))
}

function autoComplit(){

	var form = $('#search')
	var what = $('#what')

	what.keypress(function(event){
		var value = $(this).val()
		console.log(event)
		if(value.length > 2){
			console.log(value)
			form.ajaxSubmit({
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
// 	console.log(location)
	var marker = new google.maps.Marker({
		position: location,
		map: map
	})
	tmplFormSend(location)
	
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

// focusfields
function FocusFielsd ( element, text ) {
	if ( !element )
		return
		var obj = this
		obj.field = element
		obj.text = text
		if ( obj.field.value == 0 ) {
			obj.field.value = text
			obj.field.realvalue = false
		}
		if ( obj.field.value != obj.text ) {
			obj.field.className += ' focus'
			obj.field.realvalue = true
		}
		
		obj.field.onfocus = function () {
			if ( this.value == obj.text ) {
				this.value = ''
				this.realvalue = false
			}
			if ( this.value != obj.text ) {
				this.className = this.className.replace( 'focus', '' ) + ' focus'
				this.realvalue = true
			}
		}
		
		obj.field.onblur =  function () {
			if ( this.value != '' ) {
				this.realvalue = true
				return
			}
			this.realvalue = false
			this.className = this.className.replace( 'focus', '' )
			this.value = obj.text
		}
		
}