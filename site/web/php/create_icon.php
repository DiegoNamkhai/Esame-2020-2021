<?php
if($_SESSION['Ecode'] != 0 || isset($_SESSION['Ecode']) == false){
    header("Location: login.php");
    exit;
}


$call = "SELECT postazione, lngt, lttd
         FROM postazione, (SELECT DISTINCT postazione FROM campionamento WHERE ".$_SESSION['dato']." is NOT NULL GROUP BY postazione) AS post
         WHERE nomeP = post.postazione";
if($rs = $cn->qr($call)){
    //echo "<script>";
    $i=0;
    while($rw = $rs->fetch_assoc()){
        echo "textLatLng = [".$rw['lngt'].", ".$rw['lttd']."];"
        ?>
        var myTextLabel<?php echo str_replace( '-', '', $rw['postazione']); ?> = L.marker(textLatLng, {
            icon: L.divIcon({
                className: '<?php echo "text-labels-".$rw['postazione']."";?>',   // Set class for CSS styling
                html: '<div id="<?php echo $rw['postazione']; ?>" ></div>',
            }),
            zIndexOffset: 1000     // Make appear above other map features
        }).addTo(mymap);

	
	myTextLabel<?php echo str_replace( '-', '', $rw['postazione']); ?>.on('click', onMapClick);
    
    let sketch<?php echo $i ?> = function(p) {
        p.setup = function(){
            p.id = "<?php echo $rw['postazione']; ?>";
            p.testo = p.id;
            console.log(p.testo);
            p.ffont = p.windowWidth/140;
            p.textLen = p.ffont*p.testo.length;
            p.lunghezza = p.textLen+p.ffont/10;
            p.createCanvas(p.lunghezza, p.lunghezza);
            //p.background(255);
        }

        p.draw = function(){
            p.frameRate(0.50);
            fetch("../API/map.php", {
            
                // Adding method type
                method: "POST",

                headers: {
                    'Content-Type' : 'application/json'
                },
                    
                // Adding body or contents to send
                body: JSON.stringify({
                    postazione:"<?php echo $rw['postazione']; ?>",
                    elemento:"<?php echo $_SESSION['dato']; ?>"
                }),
                
            })
                .then(response => {
                    return response.json();
                })
                .then(sas =>{
                    console.log("sas valore" + sas['valore'] + " postazione" + p.id);
                    p.colore = 'rgba(255, 255, 255)';
                    if(sas['valore'] != "noValue"){
                        console.log("yes");
                        p.value = sas['valore'];
                        switch ('<?php echo $_SESSION['dato']; ?>') {
                        case 'NO2':
                            if(p.value <= 39 && p.value > 0){
                                p.colore = '#00ff00';
                            }
                            else if(p.value <= 79 && p.value >= 40){
                                p.colore = '#aaff00';
                            }
                            else if(p.value <= 119 && p.value >= 80){
                                p.colore = '#ddff00';
                            }
                            else if(p.value <= 159 && p.value >= 120){
                                p.colore = '#ffff66';
                            }
                            else if(p.value <= 200 && p.value >= 160){
                                p.colore = '#ffcc00';
                            }
                            else{
                                p.colore = '#dd0000';
                            }
                            break;
                        case 'O3':
                            if(p.value <= 35 && p.value > 0){
                                p.colore = '#00ff00';
                            }
                            else if(p.value <= 71 && p.value >= 36){
                                p.colore = '#aaff00';
                            }
                            else if(p.value <= 107 && p.value >=72 ){
                                p.colore = '#ddff00';
                            }
                            else if(p.value <= 143 && p.value >= 108){
                                p.colore = '#ffff66';
                            }
                            else if(p.value <= 180 && p.value >= 144){
                                p.colore = '#ffcc00';
                            }
                            else{
                                p.colore = '#dd0000';
                            }
                            break;
                        case 'CO':
                            if(p.value <= 1.9 && p.value > 0){
                                p.colore = '#00ff00';
                            }
                            else if(p.value <= 3.9 && p.value >= 2){
                                p.colore = '#aaff00';
                            }
                            else if(p.value <= 5.9 && p.value >= 4){
                                p.colore = '#ddff00';
                            }
                            else if(p.value <= 7.9 && p.value >= 6){
                                p.colore = '#ffff66';
                            }
                            else if(p.value <= 10 && p.value >= 8){
                                p.colore = '#ffcc00';
                            }
                            else{
                                p.colore = '#dd0000';
                            }
                            break;
                        case 'SO2':
                            if(p.value <= 69 && p.value > 0){
                                p.colore = '#00ff00';
                            }
                            else if(p.value <= 139 && p.value >= 70){
                                p.colore = '#aaff00';
                            }
                            else if(p.value <= 209 && p.value >= 140){
                                p.colore = '#ddff00';
                            }
                            else if(p.value <= 279 && p.value >= 210){
                                p.colore = '#ffff66';
                            }
                            else if(p.value <= 350 && p.value >= 280){
                                p.colore = '#ffcc00';
                            }
                            else{
                                p.colore = '#dd0000';
                            }
                            break;
                        case 'H2S':
                            if(p.value <= 29.9 && p.value > 0){
                                p.colore = '#00ff00';
                            }
                            else if(p.value <= 59.9 && p.value >= 30){
                                p.colore = '#aaff00';
                            }
                            else if(p.value <= 89.9 && p.value >= 60){
                                p.colore = '#ddff00';
                            }
                            else if(p.value <= 119.9 && p.value >= 90){
                                p.colore = '#ffff66';
                            }
                            else if(p.value <= 150 && p.value >= 120){
                                p.colore = '#ffcc00';
                            }
                            else{
                                p.colore = '#dd0000';
                            }
                            break;

                        case 'BENZENE':
                            if(p.value <= 0.9 && p.value > 0){
                                p.colore = '#00ff00';
                            }
                            else if(p.value <= 1.9 && p.value >= 1){
                                p.colore = '#aaff00';
                            }
                            else if(p.value <= 2.9 && p.value >= 2){
                                p.colore = '#ddff00';
                            }
                            else if(p.value <= 3.9 && p.value >= 3){
                                p.colore = '#ffff66';
                            }
                            else if(p.value <= 5 && p.value >= 4){
                                p.colore = '#ffcc00';
                            }
                            else{
                                p.colore = '#dd0000';
                            }
                            break;
                        }
                        console.log(p.colore);
                    }
                    

                p.stroke("#A5A5A5")
                p.strokeWeight(p.ffont/10);
                console.log("colore" + p.colore + " postazione " + p.id);
                p.fill(p.colore);
                p.circle(p.lunghezza/2, p.lunghezza/2, p.textLen*14/20)
                p.noStroke();
                p.fill(0);
                p.textSize(p.ffont);
                p.textAlign(p.CENTER, p.CENTER);
                p.text(p.testo, p.lunghezza/2, p.lunghezza/2-p.ffont/2);
                console.log(p.value);
                p.text(p.value + " µg/m³", p.lunghezza/2, p.lunghezza/2+p.ffont/2);
                p.textSize(32);
                    
            })
        }
    };
    new p5(sketch<?php echo $i ?>, '<?php echo $rw['postazione']; ?>');
    <?php
    $i++;
    }

    //echo "</script>";
}
else{
    echo "<p>Errore Creazione Mappa</p>";
}