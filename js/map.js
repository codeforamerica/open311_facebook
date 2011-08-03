//<![CDATA[

var geocoder;
var map;
var marker;
var lat = CITY_LAT;
var long = CITY_LONG;
var city = CITY_NAME + ', ' + STATE_ABBR;

// A function to create the marker and set up the event window function 
function createMarker(latlng, name, html) {
    	$('.map_help').html('Drag marker to move it');
	$('#lat').val(latlng.lat());
	$('#long').val(latlng.lng());
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        draggable: true,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });

    google.maps.event.addListener(marker, "dragend", function() {
		$('#lat').val(marker.getPosition().lat());
		$('#long').val(marker.getPosition().lng());
		codeLatLng(marker.getPosition());
  	});
    google.maps.event.trigger(marker, 'click');   
	codeLatLng(marker.getPosition());
    return marker;
}

 

function initialize() {
  // create the map
 geocoder = new google.maps.Geocoder();
  var myOptions = {
    zoom: 12,
    center: new google.maps.LatLng(lat,long),
    mapTypeControl: true,
/*     mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}, */
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map_canvas"),
                                myOptions);

  google.maps.event.addListener(map, 'click', function(event) {
	//call function to create marker
         if (marker) {
            marker.setMap(null);
            marker = null;
         }
	 marker = createMarker(event.latLng, "name");
  });
  

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
        marker = new google.maps.Marker({
            map: map,
         	draggable: true,
           	position: results[0].geometry.location
        });
		$('#lat').val(marker.getPosition().lat());
		$('#long').val(marker.getPosition().lng());
		map.setZoom(18);
    	$('.map_help').html('Drag marker to move it');
    	$('#email input').focus();
    	
    	    google.maps.event.addListener(marker, "dragend", function() {
		$('#lat').val(marker.getPosition().lat());
		$('#long').val(marker.getPosition().lng());
		codeLatLng(marker.getPosition());
  	});
  	
  	
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
  
  function codeLatLng(latlng){
  	// http://code.google.com/apis/maps/documentation/javascript/services.html#ReverseGeocoding
	    geocoder.geocode({'latLng': latlng}, function(results, status) {
	      if (status == google.maps.GeocoderStatus.OK) {
	        if (results[1]) {
	          $('#address_string').val(results[0].formatted_address);
	        }
	      } 
	    });
  }


//]]>