<?php

$pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
$call = "SELECT password 
         FROM utente 
         WHERE email = '".$_POST['email']."'";
if($rs = $cn->fl(call)['password']){
    if($rs == $pw){
        $_SESSION['errore'] = "";
        header("Location: homepage.php");
        exit;

    }
    else{
        $_SESSION['errore'] = "password sbagliata";
        $_SESSION['Ecode'] = 1;
        header("Location: signing.php");
        exit;

    }
}
else{
    $_SESSION['errore'] = "login non andato a buon fine";
    $_SESSION['Ecode'] = 2;
    header("Location: signing.php");
    exit;
}