<?php

include_once '../model/Usuarios/UsuariosModel.php';

class UsuariosController{

    public function getUsuarios(){
        $obj = new UsuariosModel();
        $sql = "SELECT * FROM usuarios u
                JOIN roles r ON r.rol_id = u.rol_id
                JOIN estados e ON e.estado_id = u.estado_id";
        $result = $obj->consult($sql);

        $usuarios = pg_fetch_all($result);


        include_once '../view/usuarios/consult.php';
    }

    public function postUpdateStatus(){
        $obj = new UsuariosModel();

        $usuarioId=$_POST['user'];
        $estadoId=$_POST['id'];

        if($estadoId == 1){
            $statusToModify = 2;
        }elseif($estadoId == 2){
            $statusToModify = 1;
        }

        $sql="UPDATE usuarios SET estado_id=$statusToModify WHERE estado_id=$usuarioId";

        $ejecutar=$obj->update($sql);

        if($ejecutar){

            $sql = "SELECT * FROM usuarios u
                JOIN roles r ON r.rol_id = u.rol_id
                JOIN estados e ON e.estado_id = u.estado_id";
            
            $usuarios=$obj->consult($sql);

            include_once "../view/usuarios/buscar.php";
        }else{
            echo "No se pudo actualizar el estado";
        }

    }
}
?>

