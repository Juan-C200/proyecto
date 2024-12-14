<?php

include_once '../model/Reportes/ReductorMalEstadoModel.php';


class ReductorMalEstadoController{

    public function getCreate(){

        $obj=new ReductorMalEstadoModel();
        
        $sql = "SELECT * FROM tipo_reductores WHERE tipo_reductor_categoria = 'Estructural'";  
        $result=$obj->consult($sql);
        $reductores_estructurales = pg_fetch_all($result);

        $sql = "SELECT * FROM tipo_reductores WHERE tipo_reductor_categoria = 'Modular'";  
        $result=$obj->consult($sql);
        $reductores_modulares = pg_fetch_all($result);

        $sql = "SELECT * FROM tipo_reductores WHERE tipo_reductor_categoria = 'Señalizacion'";  
        $result=$obj->consult($sql);
        $reductores_señalizacion = pg_fetch_all($result);

        $sql = "SELECT * FROM tipo_dano WHERE tipo_dano_control = 'Señales'";  
        $result=$obj->consult($sql);
        $tipos_daños = pg_fetch_all($result);

        include_once '../view/Reportes/createReductorMalEstado.php';
    }

    

    function postCreate() {
        $obj=new ReductorMalEstadoModel();
        
        $id = $obj->autoIncrement("solicitud_reductores_mal_estado", "soli_reductor_mal_est_id");

        $usu_id=$_SESSION['usu_id'];

        $tipo_reductor = $_POST['tipo_reductor'] ?? '';
        $tipo_daño = $_POST['tipo_daño'] ?? '';
        

        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        $descripcion = $_POST['descripcion'] ?? '';
        $img = $_FILES['foto']['name'];

        $ruta = "assets/img/señalesNuevas/$img";

        $validacion=true;

        validarCampo($tipo_reductor, 'Tipo de reductor', 'numeros');
        validarCampo($tipo_daño, 'Tipo de daño', 'numeros');
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
            
            $sql = "INSERT INTO solicitud_reductores_mal_estado (soli_reductor_mal_est_id, soli_reductor_mal_est_reductor_tipo, soli_reductor_mal_est_desc, soli_reductor_mal_est_tipo_dano, 
                    soli_reductor_mal_est_remitente, soli_reductor_mal_est_direccion, soli_reductor_mal_est_imagen, soli_reductor_mal_est_estado) 
                    VALUES ($id, $tipo_reductor, '$descripcion', $tipo_daño, $usu_id, '$direccion', '$ruta',3 )";

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