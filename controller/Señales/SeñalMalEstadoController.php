<?php

include_once '../model/SeñalVial/SeñalVialModel.php';


class SeñalMalEstadoController{


    public function getSeñales(){
        $obj = new SeñalVialModel();
        $sql = "SELECT ssme.*, ts.*, u.*, td.*, e.* FROM solicitud_senalizaciones_mal_estado ssme 
                JOIN tipos_senalizacion ts ON ts.tipo_senalizacion_id =  ssme.soli_senalizacion_mal_est_tipo
                JOIN usuarios u ON u.usu_id = ssme.soli_senalizacion_mal_est_remitente_id
                JOIN tipo_dano td ON td.tipo_dano_id = ssme.soli_senalizacion_mal_est_tipo_dano
                JOIN estados e ON e.est_id = ssme.soli_senalizacion_mal_est_estado";
        $result = $obj->consult($sql);

        $solicitud_senalizaciones_mal_estado = pg_fetch_all($result);


        include_once '../view/Señales/consult.php';
    }


    public function getCreate(){

        $obj=new SeñalVialModel();
        
        $sql = "SELECT * FROM tipo_dano";
        $result=$obj->consult($sql);
        $tipos_daños = pg_fetch_all($result);

        $sql = "SELECT * FROM tipos_senalizacion WHERE tipo_senalizacion_orientacion = 'Vertical'";  
        $result=$obj->consult($sql);
        $señales_verticales = pg_fetch_all($result);

        $sql = "SELECT * FROM tipos_senalizacion WHERE tipo_senalizacion_orientacion = 'Horizontal'";  
        $result=$obj->consult($sql);
        $señales_horizontales = pg_fetch_all($result);

        $sql = "SELECT * FROM usuarios";  
        $result=$obj->consult($sql);
        $usuario = pg_fetch_all($result);

        include_once '../view/Señales/malEstado.php';
    }

    function postCreate() {
        $obj=new SeñalVialModel();
        
        $id = $obj->autoIncrement("solicitud_senalizaciones_mal_estado", "soli_senalizacion_mal_est_id");

        $usu_id=$_SESSION['usu_id'];

        $tipo_daño=$_POST['tipo_daño'] ?? '';
        $tipo_señal = $_POST['tipo_señal'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        $señal_img = $_FILES['foto']['name'];

        $ruta = "assets/img/señalesDañadas/$señal_img";

        validarCampo($tipo_daño, 'Tipo de daño', 'numeros');
        validarCampo($tipo_señal, 'Tipo de señal', 'letras');
        validarCampo($descripcion, 'Descripción', 'letras');
        validarCampo($campo1, 'Tipo de vía', 'letras');
        validarCampo($campo2, 'Nombre o numero de vía', 'no');
        validarCampo($campo4, 'Numero de placa #1', 'no');
        validarCampo($campo5, 'Numero de placa #2', 'no');
        validarCampo($señal_img, 'Adjuntar imagen de la señal en mal estado', 'no');

        // Validaciónes opcionales
        if (!empty($campo3)) {
            validarCampo($campo3, 'Prefijo o cuadrante', 'letras');
        } 

        // Si hay errores no deja avanzar
        if (!empty($_SESSION['errores'])) {
            $validacion = false;
        }

        move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);//metodo que recibe 2 parametros la ubicacion del archivo y a donde lo enviaremos

        $validacion=true;
        if ($validacion) {
            
            
            $sql = "INSERT INTO solicitud_senalizaciones_mal_estado (soli_senalizacion_mal_est_id ,soli_senalizacion_mal_est_tipo,        
                soli_senalizacion_mal_est_descripcion,soli_senalizacion_mal_est_tipo_dano,soli_senalizacion_mal_est_remitente_id,
                soli_senalizacion_mal_est_direccion,soli_senalizacion_mal_est_imagen,soli_senalizacion_mal_est_estado) 
                VALUES ($id, $tipo_señal,'$descripcion',$tipo_daño,$usu_id,'$direccion','$ruta',3)";

            $ejecutar = $obj->insert($sql);
    
            if ($ejecutar) {

                unset($_SESSION['errores']);
                unset($_SESSION['values']);
                
                echo "se registro el reporte";
                redirect(getUrl("Señales", "SeñalMalEstado", "getCreate"));
                
                
            } else {
                redirect(getUrl("Señales", "SeñalMalEstado", "getCreate"));
                
            }
        } else {
            
            redirect(getUrl("Señales", "SeñalMalEstado", "getCreate"));

        }

    }








}


?>