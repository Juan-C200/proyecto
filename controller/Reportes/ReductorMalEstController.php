<?php

include_once '../model/Reportes/ReportesModel.php';

class ReductorMalEstController{
  
    public function getCreate(){

        $obj=new ReportesModel();
        
        $sql = "SELECT usu_id, usu_nombre1, usu_apellido1 FROM usuarios";
        $result=$obj->consult($sql);
        $usuario = pg_fetch_all($result);

        $sql="SELECT * FROM tipo_reductores WHERE tipo_reductor_categoria='estructural'"; 
        $result=$obj->consult($sql);
        $reductores_estructurales = pg_fetch_all($result);
        
        $sql="SELECT * FROM tipo_reductores WHERE tipo_reductor_categoria='modular'"; 
        $result=$obj->consult($sql);
        $reductores_modulares = pg_fetch_all($result);

        $sql="SELECT * FROM tipo_reductores WHERE tipo_reductor_categoria='reductor señalizacion'"; 
        $result=$obj->consult($sql);
        $reductores_señalizacion = pg_fetch_all($result);
    
        include_once '../view/Reportes/PanelReportes.php';
    }

    function postCreate() {
        $obj=new ReportesModel();
        $validacion=true;
        $id = $obj->autoIncrement("solicitud_reductores_mal_estado", "soli_reductor_mal_est_id");

        $usu_id=$_SESSION['usu_id'];
        $tipo_daño=$_POST['tipo_daño'] ?? '';
        $tipo_reductor = $_POST['tipo_reductor'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        $señal_img = $_FILES['foto']['name'];
        $ruta = "assets/img/$señal_img";

        validarCampo($tipo_daño, 'Tipo de daño', 'numeros');
        validarCampo($tipo_señal, 'Tipo de señal', 'letras');
        validarCampo($descripcion, 'Descripción', 'letras');
        validarCampo($campo1, 'Tipo de vía', 'letras');
        validarCampo($campo2, 'Nombre o numero de vía', 'no');
        validarCampo($campo4, 'Numero de placa #1', 'no');
        validarCampo($campo5, 'Numero de placa #2', 'no');
        validarCampo($señal_img, 'Adjuntar imagen de la señal en mal estado', 'no');

        // Si hay errores no deja avanzar
        if (!empty($_SESSION['errores'])) {
            $validacion = false;
        }

        //metodo que recibe 2 parametros la ubicacion del archivo y a donde lo enviaremos
        move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);

        if ($validacion) {

            $sql = "INSERT INTO solicitud_reductor_mal_Estado (soli_reductor_mal_est_id, soli_reductor_mal_est_tipo,        
                soli_reductor_mal_est_descripcion, soli_reductor_mal_est_tipo_dano, soli_reductor_mal_est_remitente,
                soli_reductor_mal_est_direccion, soli_reductor_mal_est_imagen, soli_reductor_mal_est_estado) 
                VALUES ($id, $tipo_reductor,'$descripcion',$tipo_daño,$usu_id,'$direccion','$ruta',3)";

            $ejecutar = $obj->insert($sql);
    
            if ($ejecutar) {

                //metodo que recibe 2 parametros la ubicacion del archivo y a donde lo enviaremos
                move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);

                unset($_SESSION['errores']);
                unset($_SESSION['values']);
                
                echo "Se registro exitosamente";
                
                
                
            } else {
                echo "no se registro el reporte";
                redirect(getUrl("Reportes", "ReductorMalEstado", "getCreate"));
            }
        } else {
            
            echo "no se registro el reporte";
            redirect(getUrl("Reportes", "ReductorMalEstado", "getCreate"));
            
        }

            
        }

    }



?>