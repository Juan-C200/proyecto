<?php

include_once '../model/Reportes/ReportesModel.php';

class ReductorMalEstController{
  
    public function getCreate(){

        $obj=new ReportesModel();
        
        $sql = "SELECT usu_id, usu_nombre1, usu_apellido1 FROM usuarios";
        $result=$obj->consult($sql);
        $usuario = pg_fetch_all($result);

        $sql = "SELECT * FROM tipo_dano WHERE tipo_dano_control='vias'";
        $result=$obj->consult($sql);
        $tipos_daños = pg_fetch_all($result);
        

        include_once '../view/Reportes/PanelReportes.php';
    }

    function postCreate() {
        $obj=new ReportesModel();
        $validacion=true;
        $id = $obj->autoIncrement("solicitud_via_mal_estado", "soli_via_mal_est_id");

        $usu_id=$_SESSION['usu_id'];
        $tipo_daño=$_POST['tipo_daño'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        $via_img = $_FILES['foto']['name'];
        $ruta = "assets/img/viaMalEstado/$via_img";

        validarCampo($tipo_daño, 'Tipo de daño', 'letras');
        validarCampo($descripcion, 'Descripción', 'letras');
        validarCampo($campo1, 'Tipo de vía', 'letras');
        validarCampo($campo2, 'Nombre o numero de vía', 'no');
        validarCampo($campo4, 'Numero de placa #1', 'no');
        validarCampo($campo5, 'Numero de placa #2', 'no');
        validarCampo($via_img, 'Adjuntar imagen de la señal en mal estado', 'no');

        // Si hay errores no deja avanzar
        if (!empty($_SESSION['errores'])) {
            $validacion = false;
        }

        //metodo que recibe 2 parametros la ubicacion del archivo y a donde lo enviaremos
        move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);

        if ($validacion) {

            $sql = "INSERT INTO solicitud_reductor_mal_Estado (solicitud_via_mal_est_id,solicitud_via_mal_est_desc, solicitud_via_mal_est_tipo_dano, solicitud_via_mal_est_direccion,solicitud_via_mal_est_remitente, solicitud_via_mal_est_imagen, solicitud_via_mal_est_estado) 
            VALUES ($id,'$descripcion',$tipo_daño,'$direccion',$usu_id,'$ruta',3)";

            $ejecutar = $obj->insert($sql);
    
            if ($ejecutar) {

                //metodo que recibe 2 parametros la ubicacion del archivo y a donde lo enviaremos
                move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);

                unset($_SESSION['errores']);
                unset($_SESSION['values']);
                
                echo "Se registro exitosamente";
                
                
                
            } else {
                echo "no se registro el reporte";
                redirect(getUrl("Reportes", "ViaMalEstado", "getCreate"));
            }
        } else {
            
            echo "no se registro el reporte";
            redirect(getUrl("Reportes", "ViaMalEstado", "getCreate"));
            
        }

            
        }

    }



?>