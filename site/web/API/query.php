<?php
include "../../sql/database.php";
session_start();
$cn = new database(); 

$json = file_get_contents('php://input');
$data = json_decode($json);
header('Content-Type: application/json');
class app{

}
$obj=new app;
$dato = $data->dato;//tipo di elemento rilevato
$postazione = $data->postazione;
$call = "SELECT valore
FROM campionamento
where dato = '".$dato."'
AND dataRil = (SELECT DATE_FORMAT(CURRENT_TIMESTAMP, '%Y-%m-%d %H'))
AND postazione = '".$postazione."'";

if($rs = $cn->qr($call)){
    $rs = $rs->fetch_assoc()['valore'];
    if($rs == NULL)$obj->valore = "noValue";
    else $obj->valore = $rs;
    
}
else $obj->valore = "Errore Database";
echo json_encode($obj);




