<?php



$call = "SELECT postazione, lngt, lttd
         FROM postazione, (SELECT DISTINCT postazione FROM campionamento WHERE dato = '".$_SESSION['dato']."' GROUP BY postazione) AS post
         WHERE nomeP = post.postazione";
if($rs = $cn->qr($call)){
    //echo "<script>";

    while($rw = $rs->fetch_assoc()){
        echo "textLatLng = [".$rw['lngt'].", ".$rw['lttd']."];"
        ?>
        var myTextLabel<?php echo str_replace( '-', '', $rw['postazione']); ?> = L.marker(textLatLng, {
            icon: L.divIcon({
                className: '<?php echo "text-labels-".$rw['postazione']."";?>',   // Set class for CSS styling
                html: '<div id="<?php echo $rw['postazione']; ?>"></div>',
            }),
            zIndexOffset: 1000     // Make appear above other map features
        }).addTo(mymap);

	
	myTextLabel<?php echo str_replace( '-', '', $rw['postazione']); ?>.on('click', onMapClick);

    new p5(sketch, '<?php echo $rw['postazione']; ?>');
    <?php
    }

    //echo "</script>";
}
else{
    echo "<p>Errore Creazione Mappa</p>";
}