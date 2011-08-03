//<![CDATA[

var geocoder;
var map;
var marker;
var lat = CITY_LAT;
var long = CITY_LONG;
var city = CITY_NAME + ', ' + STATE_ABBR;


function initialize() {
	// create the map
	geocoder = new google.maps.Geocoder();
	var myOptions = {
		zoom: 12,
		center: new google.maps.LatLng(lat,long),
		mapTypeControl: true,
		navigationControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

  	google.maps.event.addListener(map, 'click', function(event){createMarker(event.latLng);});
  

}

function updateForm(latlng){
	$('#lat').val(latlng.lat());
	$('#long').val(latlng.lng());
	
	// update address field
	geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
	    if (results[1]) {
	      $('#address_string').val(results[0].formatted_address);
	    }
	  } 
	});
}

function createMarker(latlng) {
	if (marker) return false;

	$('.map_help').html('Drag marker to move it');
	$('.map_help').css('font-weight', 700);
    
    marker = new google.maps.Marker({
        position: latlng,
        map: map,
        draggable: true
    });

    google.maps.event.addListener(marker, "dragend", function(){updateForm(marker.getPosition())});

	updateForm(latlng);
}

function codeAddress(address) {
	address += ' ' + city;
	geocoder.geocode( { 'address': address}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
	  	if (marker) {
	        marker.setMap(null);
	        marker = null;
	     }
	    map.setCenter(results[0].geometry.location);
		createMarker(results[0].geometry.location);
		map.setZoom(18);
		$('#email input').focus();
	  } else {
	    alert("Geocode was not successful for the following reason: " + status);
	  }
	});
}
 


//]]>