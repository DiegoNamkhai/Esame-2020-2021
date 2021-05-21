<?php
    include "../../startup/starter.php";
	if($_SESSION['Ecode'] != 0 || isset($_SESSION['Ecode']) == false){
		header("Location: login.php");
		exit;
	}
	if(!(isset($_SESSION['dato'])) || $_SESSION['dato']==""){
		$_SESSION['dato'] = "BENZENE";
	 }
	
?>
<link rel="stylesheet" href="../css/homepage.css">
<div id="choose">
			<select class="form-select"  onchange="leggiValue()" id="elemento">
				<option selected><?php
				 echo "Selezionato ".$_SESSION['dato']."";
				 ?></option>
				<option value="NO2">NO2</option>
				<option value="O3">O3</option>
				<option value="CO">CO</option>
				<option value="SO2">SO2</option>
				<option value="H2S">H2S</option>
				<option value="BENZENE">BENZENE</option>
			</select>
</div>
<div id="mapid" style="width: 100%; height:200px;overflow: hidden;
        padding: 40%; /* 16:9*/
		margin-top:0%;
        position: relative;"></div>
<script>

	var mymap = L.map('mapid').setView([43.680000, 11.255488], 12);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);
	var textLatLng; 

	<?php //include "../../js/sketch.js"?>
	<?php include "create_icon.php"?>





	function onMapClick(e) {
		window.location.href = "stats.php/?postazione="+e['target']['dragging']['_marker']['_icon']['children']['0']['id'];
		//console.log(e);
		//console.log(e['target']['dragging']['_marker']['_icon']['classList'][1]);
		//console.log(e['target']['dragging']['_marker']['_icon']['children']['0']['id']);

	}

	function statistiche(valore) {
		window.location.href = "stats.php/?postazione="+valore;
	}
	
	function leggiValue() {
		var x = document.getElementById("elemento").value;
		console.log(x);
		//window.history.replaceState({}, '','homepage.php');

		fetch("../API/session_changer.php", {
			
			// Adding method type
			method: "POST",

			headers: {
				'Content-Type' : 'application/json'
			},
				
			// Adding body or contents to send
			body: JSON.stringify({
				dato:x
			}),
		})
			.then(response => {
				return response.json();
			})
			.then(sas =>{
				console.log(sas);
				//alert(sas['valore']);
				location.reload();
			})
	}
			
			
	</script>

<?php
    include "../../html/close.html";
?>