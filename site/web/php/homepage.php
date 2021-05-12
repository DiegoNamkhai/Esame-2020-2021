<?php
    include "../../startup/starter.php";

?>

<div id="mapid" style="width: 600px; height: 400px;"></div>
<script>

	var mymap = L.map('mapid').setView([51.505, -0.09], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(mymap);

	L.marker([51.5, -0.09]).addTo(mymap)
		.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

	L.circle([51.508, -0.11], 500, {
		fillColor: '#f03',
		fillOpacity: 0.5
	}).addTo(mymap).bindPopup("12");

	L.polygon([
		[51.509, -0.08],
		[51.503, -0.06],
		[51.51, -0.047]
	]).addTo(mymap).bindTooltip("I am a polygon.");

    var textLatLng = [51.5, -0.09];  
        var myTextLabel = L.marker(textLatLng, {
            icon: L.divIcon({
                className: 'text-labels',   // Set class for CSS styling
                html: '<script><?php 
				
				$string= file_get_contents('../../js/sketch.js');
				$string = str_replace("\n", '', $string);
				$string = str_replace(" ", '', $string);
				$string = str_replace("{", '\{', $string);
				$string = str_replace("}", '\}', $string);
				$string = str_replace("'", "\\'", $string);	
				echo $string;

				?><script>',
            }),
            zIndexOffset: 1000     // Make appear above other map features
        }).addTo(mymap);

	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(mymap);
	}

	mymap.on('click', onMapClick);

</script>

<?php
    include "../../html/close.html";
?>