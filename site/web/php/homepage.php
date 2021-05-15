<?php
    include "../../startup/starter.php";

?>

<div id="mapid" style="width: 600px; height: 400px;"></div>
<script>

	var mymap = L.map('mapid').setView([43.773138, 11.255488], 12);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);
	var textLatLng;
	

	var textLatLng;
	<?php include "../../js/sketch.js"?>
	<?php include "create_icon.php"?>





	function onMapClick(e) {
		alert("cliccato");
		window.location.href = "http://www.w3schools.com";
	}

	
	//mymap.on('click', onMapClick);



</script>

<?php
    include "../../html/close.html";
?>