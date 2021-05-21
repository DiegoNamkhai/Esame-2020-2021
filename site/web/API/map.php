<?php
include "../../sql/database.php";
session_start();
if($_SESSION['Ecode'] != 0 || isset($_SESSION['Ecode']) == false){
    header("Location: login.php");
    exit;
}
$cn = new database(); 

$json = file_get_contents('php://input');
$data = json_decode($json);
header('Content-Type: application/json');
class app{

}
$obj=new app;
$postazione = $data->postazione;//tipo di elemento rilevato
$elemento = $data->elemento;
$call = "SELECT ".$elemento." 
FROM `campionamento` 
WHERE postazione = '".$postazione."' AND dataRil = (
	SELECT MAX(dataRil)
	FROM campionamento
    WHERE postazione = '".$postazione."'
)";

if($rs = $cn->qr($call)){
    $rs = $rs->fetch_assoc()[$elemento];
    if($rs == NULL)$obj->valore = "noValue";
    else $obj->valore = $rs;
    
}
else $obj->valore = "Errore Database";
echo json_encode($obj);