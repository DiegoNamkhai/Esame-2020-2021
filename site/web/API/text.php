<?php
    session_start();
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    header('Content-Type: application/json');
    if($data->crypt==true){
        echo json_encode(password_hash(($data->password), PASSWORD_DEFAULT));
    }
    else {
        echo json_encode(password_verify(($data->password), password_hash(($data->password), PASSWORD_DEFAULT)));
    }
    echo $_SESSION['dato'];
    
    