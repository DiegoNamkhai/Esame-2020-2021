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
$_SESSION['dato'] = $data->dato;

echo json_encode($_SESSION['dato']);
