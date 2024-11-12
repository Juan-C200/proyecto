<?php
class Connection {
    private $host;
    private $user;
    private $pass;
    private $database;
    private $port;
    private $link;


function __construct(){
    $this->setConnect(); 
    $this->connect();
}
private function setConnect(){
    require_once 'conf.php';

    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->port = $port;
    $this->database = $database;

}

private function connect(){
    $this->link=pg_connect($this->host,$this->user,$this->pass,$this->database);
    if($this->link){
        //echo"Conexion exitosa <br>";
    }else{
        die(pg_error($this->link));
    }
    
}

public function getConnect(){
    return $this->link;
}
public function close(){
    pg_close($this->link);
}
}



?>