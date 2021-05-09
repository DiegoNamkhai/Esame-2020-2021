<?php

$call = "SELECT email FROM utente WHERE email = '".$_POST['email']."'";
//$cn->fl($call)['ID']=="" ---> entra nell'if solo se l'email non è stata inserita
if($cn->fl($call)['email']==""){
    //hashing password;
    $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $call = "INSERT INTO `utente` (`email`, `password`, `nome`, `cognome`, `ruolo`) 
            VALUES ('".$_POST['email']."', '".$pw."', '".$_POST['nome']."', '".$_POST['cognome']."', 'cittadino')";
}
else{
    $_SESSION['errore'] = "email già inserita, cambiare email";
    $_SESSION['Ecode'] = 1;
    header("Location: signing.php");
    exit;
}