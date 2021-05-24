<?php
    include "../../startup/starter.php";
    if($_SESSION['Ecode'] != 0 || isset($_SESSION['Ecode']) == false){
		header("Location: login.php");
		exit;
	}
	
?>

<?php

     echo $_GET['postazione'];

     $call ="SELECT dataRil, ".$_SESSION['dato']." AS valore
     FROM campionamento
     WHERE postazione = '".$_GET['postazione']."' AND DAY(dataRil) = (
     SELECT MAX(DAY(dataRil))
     FROM campionamento
     WHERE postazione = '".$_GET['postazione']."'
     )
     ORDER BY dataRil ASC";

     if($rs = $cn->qr($call)){
        //echo "\n".$call;
        $giorno = "";
        $valore = "";
        while($rw = $rs->fetch_assoc()){
          //echo "\n".$rw['dataRil'];
          $giorno = $giorno."\"".$rw['dataRil']."\",";
          $valore = $valore.$rw['valore'].",";
          //echo $giorno;
          //echo "\n\n";
          //echo "////////////////////////////";
        }
        $giorno[strlen($giorno)-1] = " ";
        $valore[strlen($valore)-1] = " ";
        //echo $valore;
        //echo "sassss".$giorno;
     }
     else{
       echo "<p>Errore</p>";
     }

?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <canvas id="grafico"></canvas>

	 <script>
        new Chart(document.getElementById("grafico"), {
  type: 'line',
  data: {
    labels: [<?php echo $giorno; ?>],
    datasets: [{ 
        data: [<?php echo $valore; ?>],
        label: "<?php echo $_SESSION['dato']; ?>",
        borderColor: "#3e95cd",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    },
    scales: {
            xAxes: [{
                ticks: {
                    autoSkip: false,
                    maxRotation: 90,
                    minRotation: 90
                }
            }]
        }
  }
});

	 </script>

<?php
    include "../../html/close.html";
?>