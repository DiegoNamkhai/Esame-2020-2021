<?php

class database{
    protected $servername = "127.0.0.1";//ip del server
    protected $username = "root";//username utente
    protected $password = "";//password utente
    protected $dbname = "sensoristica_esame";//nome del database a cui si accede
    protected $connection;

    public function __construct(){
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function fl($query){
        $result = $this->connection->query($query) or die($this->connection->error);
        return $result->fetch_assoc();
    }

    public function qr($query){
        return $this->connection->query($query);
    }

    public function getConn(){
        return $this->connection;
    }
}