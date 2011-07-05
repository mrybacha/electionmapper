<?php $ridingrow = $riding->row();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="election maps, election mapping, election results, federal election, realtime, google maps, election canada, <?php echo $ridingrow->edname.', '.$year?>" /> 
<meta name="description" content="Mapping Canadian federal election results for <?php echo $ridingrow->edname.' ('.$year?>) in real-time on a polling division level." />
<title>Map of Results - <?php echo $ridingrow->edname." (".$year?>)</title>
<link rel="stylesheet" href="/css/styles.css" type="text/css" />
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
	  // scaleControl: true,
	  streetViewControl: true,
	  mapTypeControlOptions: {  
		style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR  
	} 
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
	// VIEWPORT SIZE
	var viewportheight;
	// the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
	if (typeof window.innerWidth != 'undefined') {
		viewportheight = window.innerHeight
	} else if (typeof document.documentElement != 'undefined') {
		// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
		viewportheight = document.documentElement.clientHeight
	} else {
		// older versions of IE
		viewportheight = document.getElementsByTagName('body')[0].clientHeight
	}
 
	// SET MAP DIV SIZE
	var mapdiv = document.getElementById('map_canvas');
	mapdiv.style.height=(viewportheight-20)+'px';
	
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

<body class="small-header" onload="loadKml()">
	<div id="wrapper">
		<div id="sitename">
			<h1><a href="/">Election<strong>Mapper</strong></a></h1>
		</div>
       <div id="nav">
			<ul>
				<li><a href="/"><span>Home</span></a></li>
				<li><a href="/election/intro/<?php echo $year ."/". $ridingrow->fednum;?>"><span>Riding Intro</span></a></li>
                <li><a href="/election/results/<?php echo $year ."/". $ridingrow->fednum;?>"><span>Results</span></a></li>
				<li class="selected"><a href="/election/map/<?php echo $year ."/". $ridingrow->fednum;?>"><span>Map of Results</span></a></li>
				<li><a href="/maps/"><span>Electoral Maps</span></a></li>
				<li><a href="/election/about"><span>About</span></a></li>
			</ul>
		</div>

		<div id="header" class="clear">
			<?php echo "<h2>".$ridingrow->fednum." - ".$ridingrow->edname." (". $year .")</h2>"; ?>
		</div>
		<div id="body" class="clear">
			<div id="content">
              <h2>Map of Results</h2>

				<h3>Historical Election Results in <?php echo $year; ?></h3>
				<p><b>Click a poll division on the map below to view the results</b> | <a href="#map">Map Full Height</a> | <a href="http://www.electionmapper.ca/election/map/<?php echo $year."/".$ridingrow->fednum;?>/full" target="_blank">Map Full Screen</a></p>
				
				<a name="map"></a><div id="shell" style="position:relative"><div id="map_canvas" style="width:960px;z-index:0;"></div>
   <div id="search" style="position:absolute;top:4px;right:270px;border:1px solid #000000;background-color:white;padding:1px;font-size:10px;z-index:1;"> 
    <input id="address" type="text" value="Enter Address and City" onfocus="this.value=''" onblur="if (!this.value){this.value='Enter Address and City'}" size="26" /> 
    <input type="button" value="Search" onclick="codeAddress()" /> 
  </div> 
   <div id="dropdown" style="position:absolute;top:4px;right:110px;border:1px solid #000000;background-color:white;padding:1px;font-size:10px;"> 
   <select name="NavSelect" onchange="fetchKmlFromInput(this);"> 
   <optgroup label="Select Overlay">
<option value="http://www.electionmapper.ca/election/map/<?php echo $year."/".$ridingrow->fednum."/kml/".time();?>" selected="selected">Election Results</option> 
<option value="http://www.electionmapper.ca/election/map/<?php echo $year."/".$ridingrow->fednum."/kml2/".time();?>">Voter Turnout</option>
<option value="http://www.electionmapper.ca/election/map/<?php echo $year."/".$ridingrow->fednum."/kml3/".time();?>">Conservative Polls</option>
</optgroup>
</select></div>
 </div> 
				<p><a href="/election/intro/<?php echo $year ."/". $ridingrow->fednum;?>">back</a></p>
			</div>
		</div>
	</div>
	<?php $this->load->view('footer_view'); ?>