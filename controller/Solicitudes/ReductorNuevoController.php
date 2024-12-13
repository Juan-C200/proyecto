<?php

include_once '../model/Solicitudes/ReductorNuevoModel.php';


class ReductorNuevoController{

    public function getCreate(){

        $obj=new ReductorNuevoModel();
        
        $sql = "SELECT * FROM tipo_reductores WHERE tipo_reductor_categoria = 'Estructural'";  
        $result=$obj->consult($sql);
        $reductores_estructurales = pg_fetch_all($result);

        $sql = "SELECT * FROM tipo_reductores WHERE tipo_reductor_categoria = 'Modular'";  
        $result=$obj->consult($sql);
        $reductores_modulares = pg_fetch_all($result);

        $sql = "SELECT * FROM tipo_reductores WHERE tipo_reductor_categoria = 'Señalizacion'";  
        $result=$obj->consult($sql);
        $reductores_señalizacion = pg_fetch_all($result);

        include_once '../view/Solicitudes/createReductor.php';
    }

    

    function postCreate() {
        $obj=new ReductorNuevoModel();
        
        $id = $obj->autoIncrement("solicitud_reductores_nuevos", "soli_reductor_nvo_id");

        $usu_id=$_SESSION['usu_id'];

        $tipo_reductor = $_POST['tipo_reductor'] ?? '';
        

        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        $descripcion = $_POST['descripcion'] ?? '';
        $img = $_FILES['foto']['name'];

        var_dump($img);

        $ruta = "assets/img/reductoresNuevos/$img";

        $validacion=true;

        validarCampo($tipo_reductor, 'Tipo de reductor', 'numeros');
        validarCampo($campo1, 'Tipo de vía', 'letras');
        validarCampo($campo2, 'Nombre o numero de vía', 'no');
        validarCampo($campo4, 'Numero de placa #1', 'no');
        validarCampo($campo5, 'Numero de placa #2', 'no');
        validarCampo($img, 'Adjuntar imagen de la señal en mal estado', 'no');

        // Validaciónes opcionales
        if (!empty($campo3)) {
            validarCampo($campo3, 'Prefijo o cuadrante', 'letras');
        } 
        if (!empty($descripcion)) {
            validarCampo($descripcion, 'Descripción', 'no');
        } 

        // Si hay errores no deja avanzar
        if (!empty($_SESSION['errores'])) {
            $validacion = false;
        }


        
        if ($validacion) {
            
            
            $sql = "INSERT INTO solicitud_reductores_nuevos (soli_reductor_nvo_id, soli_reductor_nvo_reductor_tipo,        
                soli_reductor_nvo_desc, soli_reductor_nvo_remitente,
                soli_reductor_nvo_direccion, soli_reductor_nvo_imagen, soli_reductor_nvo_estado) 
                VALUES ($id, $tipo_reductor,'$descripcion',$usu_id,'$direccion','$ruta',3)";

            $ejecutar = $obj->insert($sql);
    
            if ($ejecutar) {

                move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);//metodo que recibe 2 parametros la ubicacion del archivo y a donde lo enviaremos

                unset($_SESSION['errores']);
                unset($_SESSION['values']);
                
                echo "Se registro exitosamente";
                
                
                
            } else {
                echo "no se registro el reporte";
                
            }
        } else {
            
            echo "no se registro el reporte";
            
            
        }

        $this->getCreate();
    }
}


?>