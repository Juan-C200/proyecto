<?php

include_once '../model/SeñalVial/SeñalVialModel.php';


class SeñalNuevaController{

    public function getCreate(){

        $obj=new SeñalVialModel();
        
        $sql = "SELECT usu_id, usu_nombre1, usu_apellido1 FROM usuarios";  
        $result=$obj->consult($sql);
        $usuario = pg_fetch_all($result);

        include_once '../view/formulariosSeñal/nuevaSeñalForm.php';
    }

    function postCreate() {
        $obj=new SeñalVialModel();
        $validacion=true;
        $id = $obj->autoIncrement("solicitud_senalizaciones_nuevas", "soli_senalizacion_nueva_id");

        

        $usu_id=$_SESSION['usu_id'];

        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        $señal_img = $_FILES['foto']['name'];
        $ruta = "assets/img/$señal_img";

        move_uploaded_file($_FILES['foto']['tmp_name'],$ruta);//metodo que recibe 2 parametros la ubicacion del archivo y a donde lo enviaremos

        $sql = "INSERT INTO solicitud_senalizaciones_nuevas (soli_senalizacion_nueva_id ,soli_senalizacion_nueva_tipo,        
        soli_senalizacion_nueva_desc,soli_senalizacion_nueva_remitente,soli_senalizacion_nueva_direccion,
        soli_senalizacion_nueva_imagen,soli_senalizacion_nueva_estado) 
        VALUES ($id, 1,NULL,$usu_id,'$direccion','$ruta',3)";

        if(empty($campo2) || empty($campo4) || empty($campo5)){
          $_SESSION['errores']['direccion']="el campo direccion es obligatorio";
           $validacion=false;
        }

        if ($validacion) {
            unset($_SESSION['errores']);
            $ejecutar = $obj->insert($sql);
    
            if ($ejecutar) {
                echo "se registro la solicitud de nueva señal";
                
            } else {
                echo "no se registro la solicitud de nueva señal";
            }
        } else {
            echo "faltan campos";
            if(!isset($_SESSION['auth'])){
                redirect(getUrl("SeñalizacionVial", "SeñalNueva", "getCreate",false,"ajax"));
                

            }else{
                redirect(getUrl("SeñalizacionVial", "SeñalNueva", "getCreate"));

            }

        }


    }
}


?>