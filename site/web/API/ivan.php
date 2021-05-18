<?php

header('Content-Type: application/json');

$fh = fopen("Classe_A_ per_nome_commerciale_16-11-2020.csv", "r");

$csvData = array();
$cont = 0;
while (($row = fgetcsv($fh, 0, ";")) !== FALSE) {
    $csvData[] = $row;
    $cont++;
}

echo json_encode($csvData);



?>
