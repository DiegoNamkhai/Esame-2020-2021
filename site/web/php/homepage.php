<?php
    include "../../startup/starter.php";
	$_SESSION['dato'] = "NO2";
?>
<link rel="stylesheet" href="../css/homepage.css">
<div id="choose">
	<select class="form-select"  onchange="leggiValue()" id="elemento">
		<option value="One" >One</option>
		<option value="Two">Two</option>
		<option value="Three">Three</option>
	</select>
</div>
<div id="mapid" style="width: 100%; height:200px;overflow: hidden;
        padding: 40%; /* 16:9*/
		margin-top:0%;
        position: relative;"></div>
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
	
	function leggiValue() {
		var x = document.getElementById("elemento").value;
		console.log(x)
	}
	
	//mymap.on('click', onMapClick);



</script>

<?php
    include "../../html/close.html";
?>