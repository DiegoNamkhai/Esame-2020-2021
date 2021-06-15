<?php
    include "../../startup/starter.php";
    if($_SESSION['Ecode'] != 0 || isset($_SESSION['Ecode']) == false){
		header("Location: login.php");
		exit;
	}
	
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php

     echo "<h3 class = \"text-center\">".$_GET['postazione']."</h3>";

     $call ="SELECT dataRil, ".$_SESSION['dato']." AS valore
     FROM campionamento
     WHERE postazione = '".$_GET['postazione']."' AND DAY(dataRil) = (
     SELECT DAY(MAX(dataRil))
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

     //SELECT avg(NO2) OVER(ORDER BY dataRil ROWS BETWEEN 2 PRECEDING AND CURRENT ROW ) FROM tab
     //DROP VIEW  IF EXISTS  tab;CREATE VIEW tab AS SELECT * FROM campionamentoWHERE WEEK(dataRil) IN (SELECT WEEK(MAX(dataRil))FROM campionamento
     //)
  
	





?>
  

  <canvas id="grafico"></canvas>
  <br>
  <h3 class="text-center">Inquinamento Firenze</h3>

	 <script>

        switch ('<?php echo $_SESSION['dato']; ?>') {
        case 'NO2':
            max = 180;
            break;
        case 'O3':
            max = 160;
            break;
        case 'CO':
            max = 10;
            break;
        case 'SO2':
            max = 300;
            break;
        case 'H2S':
            max = 140;
            break;

        case 'BENZENE':
            max = 5;
            break;
        }
        switch ('<?php echo $_GET['postazione']; ?>') {
        case 'FI-BASSI':
            colore = "#715148";
            break;
        case 'FI-BOBOLI':
            colore = "#A46E39";
            break;
        case 'FI-GRAMSCI':
            colore = "#D19247";
            break;
        case 'FI-MOSSE':
            colore = "#999DDD";
            break;
        case 'FI-SCANDICCI':
            colore = "#495737";
            break;

        case 'FI-SETTIGNANO':
            colore = "#6B7443";
            break;

        case 'FI-SIGNA':
            colore = "#A9C28C";
            break;
        }
        //console.log("ciao, <?php echo $_GET['postazione']; ?>");
        //console.log(colore);
        new Chart(document.getElementById("grafico"), {
  
  type: 'line',
  data: {
    labels: [<?php echo $giorno; ?>,],
    datasets: [{ 
        data: [<?php echo $valore; ?>],
        label: "<?php echo $_SESSION['dato']; ?>",
        borderColor: colore,
        fill: false,
      },
    ]
  },
  options: {
    title: {
      //display: true,
      //text: 'World population per region (in millions)'
    },   
    scales: 
    {
            xAxes: {
                ticks: {
                    autoSkip: false,
                    maxRotation: 30,
                    minRotation: 30
                }
            },
             y: {
              
                suggestedMin: 0,
                suggestedMax: max
            }
        }
  }
});
	</script>



<canvas id="o"></canvas>
<?php 
$call = "SELECT distinct dataRil
FROM campionamento
where WEEK(dataRil) IN (
SELECT WEEK(MAX(dataRil))
FROM campionamento
)
order by dataRil ASC";
if($rs = $cn->qr($call)){
 $day = "";;
 while($rw = $rs->fetch_assoc()){
   $day = $day."\"".$rw['dataRil']."\",";
 }
}
else{
  echo "<p>Errore nel trovare i giorni</p>";
}
//echo strlen($giorno);
//$day[strlen($giorno)-1] = " ";

?>
<script>

new Chart(document.getElementById("o"), {
  
  type: 'line',
  data: {
    labels: [<?php echo $day; ?>],
    datasets: [

      <?php

      $call = "SELECT DISTINCT postazione
      FROM campionamento
      WHERE ".$_SESSION['dato']." IS NOT NULL AND
      WEEK(dataRil) IN (SELECT WEEK(MAX(dataRil))
      FROM campionamento)
      GROUP BY postazione";
      
      if($rs = $cn->qr($call)){
        while($rw = $rs->fetch_assoc()){
          $call = "SELECT dataRil
          FROM campionamento
          where WEEK(dataRil) IN (
          SELECT WEEK(MAX(dataRil))
          FROM campionamento
          )";
          
          if($res = $cn->qr($call)){
            $valore = "";
            while($row = $res->fetch_assoc()){
              $call = "SELECT ".$_SESSION['dato']." AS elem
              FROM campionamento
              where dataRil = '".$row['dataRil']."'
              AND postazione = '".$rw['postazione']."'";
              if($result = $cn->qr($call)){
                //echo 'SI';
                //echo $call;
                if(mysqli_num_rows($result)==0){
                  //echo "sono null";
                  $valore = $valore."null".",";
                }
                else{
                  //echo "sono in else";
                  while($rowz = $result->fetch_assoc()){
                    //echo "dato ".$rowz['elem'];
                    $valore = $valore.$rowz['elem'].",";
                  }
                  
                }
                  
              }
              else{
                echo "Errore 2";
              }
            }
          }
          else{
            echo "Errore 3";
          }
          //echo "strlen -1 : ".strlen($valore)-1;
          $valore[(strlen($valore)-1)] = " ";
          switch ($rw['postazione']) {
            case 'FI-BASSI':
                $colore = "#715148";
                break;
            case 'FI-BOBOLI':
                $colore = "#A46E39";
                break;
            case 'FI-GRAMSCI':
                $colore = "#D19247";
                break;
            case 'FI-MOSSE':
                $colore = "#999DDD";
                break;
            case 'FI-SCANDICCI':
                $colore = "#495737";
                break;
            case 'FI-SETTIGNANO':
                $colore = "#6B7443";
                break;
            case 'FI-SIGNA':
                $colore = "#A9C28C";
                break;
            }
        echo "
        { 
          data: [".$valore."],
          label: \"".$rw['postazione']."\",
          borderColor: \"".$colore."\",
          fill: false
        },  
        ";
        }
        
      }
      else{
        echo "<p>Errore</p>";
      }

      ?>

      <?php

        $call = "SELECT AVG(".$_SESSION['dato'].") AS media, dataRil
        FROM campionamento
        WHERE NO2 IS NOT NULL
        AND WEEK(dataRil) IN (
        SELECT WEEK(MAX(dataRil))
        FROM campionamento
        )
        GROUP BY dataRil";
         $moment = array();
        if($rs = $cn->qr($call)){
            //$z = 0;
            while($rw = $rs->fetch_array()){
            //$z++;
          	array_push($moment, $rw['media']);
            $valore = "";
            for($i=1; $i<=count($moment); $i++){
              $somma = 0;
              for($j=0; $j<$i; $j++){
                $somma = $somma + $moment[$j];
              }
              $mediaMob = $somma/$j;
              $valore = $valore.$mediaMob.",";
            }
            }
            $valore[(strlen($valore)-1)] = " ";
            echo "
        { 
          data: [".$valore."],
          label: \"media mobile\",
          borderColor: \"#e63946\",
          fill: false,
          cubicInterpolationMode: 'default',
          tension: 0.2
        },  
        ";

        }
        else{
          echo "Errore query media mobile";
        }

      ?>


    ]
  },
  options: {
    title: {
      //display: true,
      //text: 'World population per region (in millions)'
    },   
    scales: 
    {
            xAxes: {
                ticks: {
                    autoSkip: false,
                    maxRotation: 80,
                    minRotation: 80
                }
            },
             y: {
              
                suggestedMin: 0,
                suggestedMax: max
            }
        }
  }
});

</script>


<?php
    include "../../html/close.html";
?>