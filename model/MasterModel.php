<?php
    
    include_once '../lib/conf/conection.php';

    Class MasterModel extends Conexion{

        public function insert($sql){
            $result = pg_query($this->getConnect(), $sql);
            if(!$result){
                echo pg_last_error($this->getConnect());
            }
            return $result;
        }
        public function consult($sql){
            $result = pg_query($this->getConnect(), $sql);

            return $result;
        }
        public function update($sql){
            $result = pg_query($this->getConnect(), $sql);

            return $result;
        }
        public function delete($sql){
            $result = pg_query($this->getConnect(), $sql);

            return $result;
        }

        public function autoIncrement($table, $field){

            $sql = "SELECT MAX($field) FROM $table";
            $result = pg_query($this->getConnect(), $sql);

            $resp= pg_fetch_row($result);

            return $resp[0] ? $resp[0] + 1 : 1;
            
        }
    
    }

?>