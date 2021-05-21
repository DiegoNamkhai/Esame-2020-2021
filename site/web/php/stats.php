<?php
    include "../../startup/starter.php";
    if($_SESSION['Ecode'] != 0 || isset($_SESSION['Ecode']) == false){
		header("Location: login.php");
		exit;
	}
	if(!(isset($_SESSION['dato'])) || $_SESSION['dato']==""){
		$_SESSION['dato'] = "BENZENE";
	 }
	
?>

<?php

     echo $_GET['postazione'];

?>

<?php
    include "../../html/close.html";
?>