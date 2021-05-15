<?php



$call = "SELECT IDp, lngt, lttd 
         FROM postazione";
if($rs = $cn->qr($call)){
    //echo "<script>";

    while($rw = $rs->fetch_assoc()){
        echo "textLatLng = [".$rw['lngt'].", ".$rw['lttd']."];"
        ?>
        var myTextLabel<?php echo $rw['IDp']; ?> = L.marker(textLatLng, {
            icon: L.divIcon({
                className: '<?php echo "text-labels-".$rw['IDp']."";?>text-labels',   // Set class for CSS styling
                html: '<div id="<?php echo $rw['IDp']; ?>"></div>',
            }),
            zIndexOffset: 1000     // Make appear above other map features
        }).addTo(mymap);

	
	myTextLabel<?php echo $rw['IDp']; ?>.on('click', onMapClick);

    new p5(sketch, '<?php echo $rw['IDp']; ?>');
    <?php
    }

    //echo "</script>";
}
else{
    echo "<p>Errore Creazione Mappa</p>";
}