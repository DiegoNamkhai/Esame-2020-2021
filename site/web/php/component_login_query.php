<?php

$call = "SELECT password 
         FROM utente 
         WHERE email = '".$_POST['email']."'";
if($rs = $cn->fl($call)['password']){
    if(password_verify($_POST['password'],$rs)){
        $_SESSION['errore'] = "";
        $_SESSION['Ecode'] = 0;
        header("Location: homepage.php");
        exit;

    }
    else{
        $_SESSION['errore'] = "password sbagliata";
        $_SESSION['Ecode'] = 1;
        header("Location: login.php");
        exit;

    }
}
else{
    $_SESSION['errore'] = "non sei registrato, registrati!";
    $_SESSION['Ecode'] = 3;
    header("Location: signing.php");
    exit;
}