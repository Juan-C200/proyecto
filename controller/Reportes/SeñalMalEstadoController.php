<?php

include_once '../model/Reportes/ReportesModel.php';

class SeñalMalEstadoController{
  
    public function getCreate(){

        $obj=new ReportesModel();

        $sql = "SELECT * FROM tipos_senalizacion WHERE tipo_senalizacion_orientacion = 'Vertical'";  
        $result=$obj->consult($sql);
        $señales_verticales = pg_fetch_all($result);

        $sql = "SELECT * FROM tipos_senalizacion WHERE tipo_senalizacion_orientacion = 'Horizontal'";  
        $result=$obj->consult($sql);
        $señales_horizontales = pg_fetch_all($result);

        $sql="SELECT tipo_dano_id, tipo_dano_nombre FROM tipo_dano"; 
        $result=$obj->consult($sql);
        $tipos_daños = pg_fetch_all($result);
    
        include_once '../view/Reportes/PanelReportes.php';
    }

    function postCreate() {
        $obj=new ReportesModel();
        
        $id = $obj->autoIncrement("solicitud_senalizaciones_mal_estado", "soli_senalizacion_mal_est_id");

        $usu_id=$_SESSION['usu_id'];

        
        $tipo_señal = $_POST['tipo_señal'] ?? '';
        
        $tipo_daño= $_POST['tipo_daño'] ?? '';

        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        $descripcion = $_POST['descripcion'] ?? '';
        $img = $_FILES['foto']['name'];

        var_dump($img);

        $ruta = "assets/img/señalesNuevas/$img";

        $validacion=true;

        validarCampo($tipo_señal, 'Tipo de señal', 'letras');
        validarCampo($tipo_daño, 'Tipo de daño', 'letras');
        validarCampo($campo1, 'Tipo de vía', 'letras');
        validarCampo($campo2, 'Nombre o numero de vía', 'no');
        validarCampo($campo4, 'Numero de placa #1', 'no');
        validarCampo($campo5, 'Numero de placa #2', 'no');
        validarCampo($descripcion, 'Descripción', 'no');
        validarCampo($img, 'Adjuntar imagen de la señal en mal estado', 'no');

        // Validaciónes opcionales
        if (!empty($campo3)) {
            validarCampo($campo3, 'Prefijo o cuadrante', 'letras');
        } 
        if (!empty($descripcion)) {
            validarCampo($descripcion, 'Descripción', 'letras');
        } 

        // Si hay errores no deja avanzar
        if (!empty($_SESSION['errores'])) {
            $validacion = false;
        }

        if ($validacion) {
            
            
            $sql = "INSERT INTO solicitud_senalizaciones_mal_estado (soli_senalizacion_mal_est_id, soli_senalizacion_mal_est_tipo,        
                soli_senalizacion_mal_est_descripcion, soli_senalizacion_mal_est_tipo_dano, soli_senalizacion_mal_est_remitente,
                soli_senalizacion_mal_est_direccion, soli_senalizacion_mal_est_imagen, soli_senalizacion_mal_est_estado) 
                VALUES ($id, $tipo_señal,'$descripcion',$tipo_daño,$usu_id,'$direccion','$ruta',3)";

            $ejecutar = $obj->insert($sql);
    
            if ($ejecutar) {

                //metodo que recibe 2 parametros la ubicacion del archivo y a donde lo enviaremos
                move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);

                unset($_SESSION['errores']);
                unset($_SESSION['values']);
                
                echo "Se registro exitosamente";
                
                
                
            } else {
                echo "no se registro el reporte";
                redirect(getUrl("Solicitudes", "SeñalNueva", "getCreate"));
            }
        } else {
            
            echo "no se registro el reporte";
            redirect(getUrl("Solicitudes", "SeñalNueva", "getCreate"));
            
        }

    }
}

?>