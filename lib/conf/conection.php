<?php

class Conexion {
    private $host = 'localhost';
    private $port = '5433';
    private $dbname = 'geovisor';
    private $user = 'postgres';
    private $password = '12345';
    private $conn;

    public function __construct() {
        $this->connect();
    }



    private function connect() {
        $conn_string = "host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->password";
        $this->conn = pg_connect($conn_string);

        if (!$this->conn) {
            die("Error en la conexión: " . pg_last_error());
        }else{
        //echo "Conexion exitosa";

        }
    }

    public function getConnect() {
        return $this->conn;
    }

    public function close() {
        pg_close($this->conn);
    }
}



?>