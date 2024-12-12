<?php
    include_once '../model/PQRS/PQRSModel.php';

    class PQRSController {
        public function getCreate (){
            $obj = new PQRSModel();
            $sql = 'SELECT * FROM public."tipo_PQRS"';
            $result = $obj->consult($sql);
            $tiposPQRS = pg_fetch_all($result);
            $sql = 'SELECT * FROM public."servicios"';
            $result = $obj->consult($sql);
            $servicios = pg_fetch_all($result);

            include_once '../view/PQRS/create.php';
        }
        public function postCreate (){
            $obj = new PQRSModel();
            $id = $obj->autoIncrement('public."PQRS"',"PQRS_id");
            $tipoPQRS = $_POST['tipoPQRS'];
            $servicio = $_POST['servicio'];
            $asunto = $_POST['asunto'];
            $desc = $_POST['desc'];
            $estado = 3; 
            $remitente = $_SESSION['usu_id'];
            echo "Los datos enviados son: $tipoPQRS"." ".$servicio." ".$asunto." ".$desc;

            $sql = "INSERT INTO PQRS(
	            pqrs_id, pqrs_asunto, pqrs_tipo, pqrs_estado, pqrs_desc, pqrs_remitente, pqrs_servicio)
	            VALUES ($id,'$asunto', $tipoPQRS,$estado,'$desc',$remitente,$servicio)";
            $ejecutar = $obj->insert($sql);
            if($ejecutar){
                echo "Registro exitoso";
            }
            
        }
    }
?>