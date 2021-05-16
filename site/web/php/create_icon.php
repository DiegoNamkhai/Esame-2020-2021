<?php



$call = "SELECT nomeP, lngt, lttd 
         FROM postazione";
if($rs = $cn->qr($call)){
    //echo "<script>";

    while($rw = $rs->fetch_assoc()){
        echo "textLatLng = [".$rw['lngt'].", ".$rw['lttd']."];"
        ?>
        var myTextLabel<?php echo str_replace( '-', '', $rw['nomeP']); ?> = L.marker(textLatLng, {
            icon: L.divIcon({
                className: '<?php echo "text-labels-".$rw['nomeP']."";?>',   // Set class for CSS styling
                html: '<div id="<?php echo $rw['nomeP']; ?>"></div>',
            }),
            zIndexOffset: 1000     // Make appear above other map features
        }).addTo(mymap);

	
	myTextLabel<?php echo str_replace( '-', '', $rw['nomeP']); ?>.on('click', onMapClick);

    new p5(sketch, '<?php echo $rw['nomeP']; ?>');
    <?php
    }

    //echo "</script>";
}
else{
    echo "<p>Errore Creazione Mappa</p>";
}