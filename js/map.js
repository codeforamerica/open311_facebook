//<![CDATA[

var geocoder;
var map;
var marker;
var lat = CITY_LAT;
var long = CITY_LONG;
var city = CITY_NAME + ', ' + STATE_ABBR;

var infowindow = new google.maps.InfoWindow(
  { 
    size: new google.maps.Size(150,50)
  });

// A function to create the marker and set up the event window function 
function createMarker(latlng, name, html) {
	$('#lat').val(latlng.lat());
	$('#long').val(latlng.lng());
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
        });
    google.maps.event.trigger(marker, 'click');    
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
 
  google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
        });

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
            position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
    

//]]>