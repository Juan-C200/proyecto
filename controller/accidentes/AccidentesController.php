<?php

include_once '../model/Accidente/AccidenteModel.php';

class AccidentesController{
  
    public function getCreate(){

        $obj=new AccidenteModel();
        
        $sql = "SELECT usu_id, usu_nombre1, usu_apellido1 FROM usuarios";
        $result=$obj->consult($sql);
        $usuario = pg_fetch_all($result);

        $sql="SELECT * FROM tipo_choque"; 
        $result=$obj->consult($sql);
        $tipo_choque = pg_fetch_all($result);
    
        include_once '../view/accidentes/AccidentesForm.php';
    }

    function postCreate(){
        $obj = new AccidenteModel();
        $validacion = true;
        
        $id=$obj->autoIncrement("solicitud_accidente","solicitud_accidente_id");

        $usu_id=$_SESSION['usu_id'];

        $lugar_accidente = $_POST['lugar_accidente'] ?? '';
        $gravedad = $_POST['gravedad'] ?? '';

        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        $clase_accidente = $_POST['clase_accidente'] ?? '';//define si es atropellamiento etc.
        $choque_con = $_POST['choque_con'] ?? '';//guarda con que objeto fue el choque
        $caracteristica_lugar = $_POST['caracteristica_lugar'] ?? '';
        $caracteristica_vias = $_POST['caracteristica_vias'] ?? '';
        $datos_vehiculo = $_POST['datos_vehiculo'] ?? '';
        $hipotesis = $_POST['hipotesis'] ?? '';//hipotesis de por que se dio el accidente
        $num_victimas = $_POST['victimas_accidente'] ?? '';
        $detalle_involucrados = $_POST['detalle_involucrados'];

        $observacion = "Observaciones: ".$caracteristica_lugar.", ".$caracteristica_vias.", ".$datos_vehiculo.", ".$choque_con;
        /*
        validarCampo($lugar_accidente, 'Lugar accidente', 'letras');
        validarCampo($gravedad, 'Gravedad', 'letras');
        validarCampo($campo1, 'Numero de placa #1', 'no');
        validarCampo($campo2, 'Numero de placa #2', 'no');
        validarCampo($campo3, 'Numero de placa #3', 'no');
        validarCampo($campo4, 'Numero de placa #4', 'no');
        validarCampo($campo5, 'Numero de placa #5', 'no');
        validarCampo($clase_accidente, 'Numero de placa #2', 'no');
        validarCampo($choque_con, 'Numero de placa #2', 'no');
        validarCampo($caracteristica_lugar, 'Numero de placa #2', 'no');
        validarCampo($datos_vehiculo, 'Descripción', 'no');
        validarCampo($hipotesis, 'Descripción', 'no');
        validarCampo($victimas_accidente, 'Descripción', 'no');
        validarCampo($num_documento, 'Descripción', 'no');
        validarCampo($primer_nombre, 'Descripción', 'no');
        validarCampo($primer_apellido, 'Descripción', 'no');
        validarCampo($telefono, 'Descripción', 'no');
        */

        if (!empty($_SESSION['errores'])) {
            $validacion = false;
        }

        if ($validacion) {
            
            $sql = "INSERT INTO solicitud_accidente (soli_accidente_id, soli_accidente_direccion,        
                soli_accidente_lugar,soli_accidente_gravedad,soli_accidente_num_victimas,soli_accidente_involucrados,soli_accidente_clase,soli_accidente_observacion,soli_accidente_hipotesis,soli_accidente_imagen,soli_accidente_usu_remitente,soli_accidente_estado) 
                VALUES ($id, '$direccion','$lugar_accidente','$gravedad','$num_victimas',$detalle_involucrados,$clase_accidente,$observacion,$hipotesis,'$ruta',$usu_id,3)";

            $ejecutar = $obj->insert($sql);
    
            if ($ejecutar) {

                unset($_SESSION['errores']);
                unset($_SESSION['values']);
                
                echo "se registro el reporte";
                redirect(getUrl("accidente", "Accidentes", "getCreate"));
                
                
            } else {
                redirect(getUrl("accidente", "Accidentes", "getCreate"));
                
            }
        } else {
            
            redirect(getUrl("accidente", "Accidentes", "getCreate"));

        }






    }
}    