<?php
include_once '../model/Acceso/AccesoModel.php';
class AccesoController {
    public function login(){

        $obj = new AccesoModel();
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM usuarios WHERE usuarioEmail='$user'";

        $usuario = $obj -> consult($sql);

        $hash = password_hash($pass, PASSWORD_DEFAULT);


        if (mysqli_num_rows($usuario)>0){
            foreach($usuario as $usu){
                if(password_verify($pass, $usu['usuario_id'])){
                    $_SESSION['primer_nombre'] = $usu['primer_nombre'];
                    $_SESSION['segundo_nombre'] = $usu['segundo_nombre'];
                    $_SESSION['primer_apellido'] = $usu['primer_apellido'];
                    $_SESSION['segundo_apellido'] = $usu['segundo_apellido'];
                    $_SESSION['correo'] = $usu['correo'];
                    $_SESSION['telefono'] = $usu['telefono'];
                    $_SESSION['direccion'] = $usu['direccion'];
                    $_SESSION['auth'] = "ok";
                    redirect("index.php");
                } else {
                    $_SESSION['errores'] = "Usuario y/o contrasenia incorrecto";
                    redirect("login.php");
                    exit();
                }
            }    

        } else {
            $_SESSION['errores'] = "Usuario y/o contrasenia incorrecto";
            redirect("login.php");
            exit();
            
        }
    }

    public function logout(){
        session_destroy();
        redirect("login.php");
        
    }
}
?>