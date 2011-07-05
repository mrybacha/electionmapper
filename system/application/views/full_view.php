<?php $ridingrow = $riding->row();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="election maps, election mapping, election results, federal election, realtime, google maps, election canada, <?php echo $ridingrow->edname.', '.$year?>" /> 
<meta name="description" content="Mapping Canadian federal election results for <?php echo $ridingrow->edname.' ('.$year?>) in real-time on a polling division level." />
<title>Full Screen Map - <?php echo $ridingrow->edname." (".$year?>)</title>
<style type="text/css"> 
  html { height: 100% }
  body { height: 100%; margin: 0px; padding: 0px }
  #map_canvas { height: 100% }
</style> 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript"> 
var map;
var kml;
var kmlUrl;
var geocoder;
 
function init() {
  
	geocoder = new google.maps.Geocoder();
    var myLatlng = new google.maps.LatLng(<?php echo $ridingrow->latlng;?>);
    var myOptions = {
      zoom: <?php echo $ridingrow->zoom;?>,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
	  scaleControl: true,
	  streetViewControl: true,
	  mapTypeControlOptions: {  
		style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR  
	} 
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);	
}
 
function init2() {
  
    var myOptions = {
      zoom: map.getZoom(),
      center: map.getCenter(),
      mapTypeId: map.getMapTypeId(),
	  scaleControl: true,
	  streetViewControl: true,
	  mapTypeControlOptions: {  
		style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR  
	} 
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
}
 
function fetchKmlFromInput(selectobj) {
	init2();
	kmlUrl = selectobj.options[selectobj.selectedIndex].value;
	kml = new google.maps.KmlLayer(kmlUrl);
	kml.preserveViewport = true;
	kml.setMap(map);
}
 
function loadKml() {
	init();
	kml = new google.maps.KmlLayer('http://www.electionmapper.ca/election/map/<?php echo $year."/".$ridingrow->fednum."/kml/".time();?>');
	kml.preserveViewport = true;
	kml.setMap(map);
}
 
function codeAddress() {
    var address = document.getElementById("address").value;
    if (geocoder) {
      geocoder.geocode( { 'address': address, 'region': 'ca' }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
          });
        } else {
          alert("Geocode was not successful for the following reason: " + status);
        }
      });
    }
  }
 
 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19148467-1']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body onload="loadKml()">
<div id="map_canvas"></div>
   <div id="search" style="position:absolute;top:1px;right:270px;border:1px solid #000000;background-color:white;padding:1px;font-size:10px;z-index:1;"> 
    <input id="address" type="text" value="Enter Address and City" onfocus="this.value=''" onblur="if (!this.value){this.value='Enter Address and City'}" size="26" /> 
    <input type="button" value="Search" onclick="codeAddress()" /> 
  </div> 
   <div id="dropdown" style="position:absolute;top:2px;right:110px;border:1px solid #000000;background-color:white;padding:1px;font-size:10px;"> 
   <select name="NavSelect" onchange="fetchKmlFromInput(this);"> 
<optgroup label="Select Overlay">
<option value="http://www.electionmapper.ca/election/map/<?php echo $year."/".$ridingrow->fednum."/kml/".time();?>" selected="selected">Election Results</option> 
<option value="http://www.electionmapper.ca/election/map/<?php echo $year."/".$ridingrow->fednum."/kml2/".time();?>">Voter Turnout</option>
<option value="http://www.electionmapper.ca/election/map/<?php echo $year."/".$ridingrow->fednum."/kml3/".time();?>">Conservative Polls</option>
</optgroup>
</select></div>
</body> 
</html> 