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
            $validacion = true;
            if(empty($tipoPQRS)){
                $_SESSION['errores']['Tipo_PQRS'] = "El campo tipo PQRS es necesario";
                $validacion = false;
            }else{
                $_SESSION['errores']['Tipo_PQRS'] = "";
            }
            
            
            $servicio = $_POST['servicio'];
            if(empty($servicio)){
                $_SESSION['errores']['servicios'] = "El campo tipo servicios es necesario";
                $validacion = false;
            }else{
                $_SESSION['errores']['servicios'] = "";
            }
            $asunto = $_POST['asunto'];
            if(empty($asunto)){
                $_SESSION['errores']['asunto'] = "El campo asunto es necesario";
                $validacion = false;
            }else{
                $_SESSION['errores']['asunto'] = "";
                
            }
            if(!preg_match("/^.{0,20}$/",$asunto)){
                $_SESSION['errores']['asunto'] = "El campo asunto debe tener como maximo 20 caracteres";
                $validacion = false;
            }
            $desc = $_POST['desc'];
            if(empty($desc)){
                $_SESSION['errores']['descripcion'] = "El campo descripcion es necesario";
                $validacion = false;
            }else{
                $_SESSION['errores']['descripcion'] = "";
            }
            $estado = 3; 
            $remitente = $_SESSION['usu_id'];
            $tabla = '"PQRS"';
           
            
            if($validacion){
                $sql = "INSERT INTO public.$tabla( pqrs_id, pqrs_asunto, pqrs_tipo, pqrs_estado, pqrs_desc, pqrs_remitente, pqrs_servicio) VALUES ($id,'$asunto',$tipoPQRS,$estado,'$desc',$remitente,$servicio)";
                $ejecutar = $obj->insert($sql);
                
                if($ejecutar){
                    
                    unset($_SESSION['errores']);
                    unset($_SESSION['values']);
                    redirect('index.php');
                }
            }else{
                redirect(getUrl("PQRS","PQRS","getCreate"));
               
                
            }
           
            
        }
        
        public function getPQRS(){
            $obj = new PQRSModel();
            $sql = 'SELECT 
                    pqrs.*, 
                    tp."tipo_PQRS_nombre", 
                    s.servicio_nombre 
                    FROM 
                    public."PQRS" pqrs
                    INNER JOIN 
                    public."tipo_PQRS" tp ON tp."tipo_PQRS_id" = pqrs."pqrs_tipo"
                    INNER JOIN 
                     public."servicios" s ON s."servicio_id" = pqrs."pqrs_servicio"';
                     
            $result = $obj->consult($sql);
            $pqrs = pg_fetch_all($result);
            include_once '../view/PQRS/consult.php';
        }
    }
?>