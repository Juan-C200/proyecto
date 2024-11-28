<?php

include_once '../model/SeñalVial/SeñalVialModel.php';


class SeñalMalEstadoController{

    public function getCreate(){

        $obj=new SeñalVialModel();
        
        $sql = "SELECT * FROM tipo_dano";
        $result=$obj->consult($sql);
        $tipoDeDaño = pg_fetch_all($result);

        $sql = "SELECT usu_id, usu_nombre1, usu_apellido1 FROM usuarios";  
        $result=$obj->consult($sql);
        $usuario = pg_fetch_all($result);

        include_once '../view/formulariosSeñal/malEstSeñalForm.php';
    }

    function postCreate() {
        $obj=new SeñalVialModel();
        $validacion=true;
        $id = $obj->autoIncrement("solicitud_senalizaciones_mal_estado", "soli_senalizacion_mal_est_id");

        $usu_id=$_SESSION['usu_id'];

        $tipo_daño=$_POST['tipoDaño'];
    

        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        $señal_img = $_FILES['foto']['name'];
        $ruta = "assets/img/$señal_img";

        move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);//metodo que recibe 2 parametros la ubicacion del archivo y a donde lo enviaremos

        $sql = "INSERT INTO solicitud_senalizaciones_mal_estado (soli_senalizacion_mal_est_id ,soli_senalizacion_mal_est_tipo,        
        soli_senalizacion_mal_est_descripcion,soli_senalizacion_mal_est_tipo_dano,soli_senalizacion_mal_est_remitente_id,
     soli_senalizacion_mal_est_direccion,soli_senalizacion_mal_est_imagen,soli_senalizacion_mal_est_estado) 
    VALUES ($id, 1,NULL,$tipo_daño,$usu_id,'$direccion','$ruta',3)";

        if (empty($tipo_daño)) {
            $_SESSION['errores']['tipo_daño'] = "El campo 'tipo_daño' es requerido.";
            $validacion = false;
        }

        if(empty($campo2) || empty($campo4) || empty($campo5)){
            $_SESSION['errores']['direccion']="el campo direccion es obligatorio";
             $validacion=false;
          }

        if ($validacion) {
            
            unset($_SESSION['errores']);

            $ejecutar = $obj->insert($sql);
    
            if ($ejecutar) {

                unset($_SESSION['errores']);
                echo "se registro el reporte";
                
            } else {
                echo "no se registro el reporte";
            }
        } else {
            
            echo "faltan campos";
            if(!isset($_SESSION['auth'])){
                redirect(getUrl("SeñalizacionVial", "SeñalMalEstado", "getCreate",false,"ajax"));
            }else{
                redirect(getUrl("SeñalizacionVial", "SeñalMalEstado", "getCreate"));
            }
            
        }


    }








}


?>