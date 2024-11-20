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
        echo $usuarioId;

        $sql="UPDATE usuarios SET estado_id=$statusToModify WHERE usuario_id=$usuarioId";

        $ejecutar=$obj->update($sql);

        if($ejecutar){

            $sql = "SELECT * FROM usuarios u
                JOIN roles r ON r.rol_id = u.rol_id
                JOIN estados e ON e.estado_id = u.estado_id";
            
            $result=$obj->consult($sql);

            $usuarios = pg_fetch_all($result);

            include_once "../view/usuarios/buscar.php";
        }else{
            echo "No se pudo actualizar el estado";
        }

    }

    public function getCreate(){

        include_once "../view/usuarios/create.php";
    }

    function postCreate() {
    
       
            unset($_SESSION['errores']);
        
        
        $obj=new UsuariosModel();
    
        $id=$obj->autoIncrement("usuarios","usuario_id");
        $tipo_documento = $_POST['tipo_documento'] ?? '';
        $numero_documento = $_POST['numero_documento'] ?? '';
        $primer_nombre = $_POST['primer_nombre'] ?? '';
        $segundo_nombre = $_POST['segundo_nombre'] ?? '';
        $primer_apellido = $_POST['primer_apellido'] ?? '';
        $segundo_apellido = $_POST['segundo_apellido'] ?? '';
        $sexo = $_POST['sexo'] ?? '';
        $correo= $_POST['correo'] ?? '';
        $telefono= $_POST['telefono'] ?? '';
        $direccion= $_POST['direccion'] ?? '';
        $contraseña= $_POST['contraseña'] ?? '';
        $confContraseña = $_POST['confContraseña'] ?? '';
        
        
        $validacion = true;
        $_SESSION['errores']=[];
        
    
        // Validación de cada campo
        if (empty($tipo_documento)) {
            $_SESSION['errores']['tipo_documento'] = "El campo 'tipo de documento' es requerido.";
            $validacion = false;
        }else if (validarCampoNumeros($tipo_documento)) {
            $_SESSION['errores']['tipo_documento'] = "El campo 'tipo de documento' solo debe contener letras.";
            $validacion = false;
        }
    
        if (empty($numero_documento)) {
            $_SESSION['errores']['numero_documento'] = "El campo 'numero_documento' es requerido.";
            $validacion = false;
        }else if (validarCampoNumeros($numero_documento) == false) {
            $_SESSION['errores']['numero_documento'] = "El campo 'numero_documento' solo debe contener numeros.";
            $validacion = false;
        }
    
        if (empty($primer_nombre)) {
            $_SESSION['errores']['primer_nombre'] = "El campo 'primer_nombre' es requerido.";
            $validacion = false;
        }else if (validarCampoLetras($primer_nombre) == false) {
            $_SESSION['errores']['primer_nombre'] = "El campo 'primer_nombre' debe contener solo letras.";
            $validacion = false;
        }
    
        if (empty($primer_apellido)) {
            $_SESSION['errores']['primer_apellido'] = "El campo 'primer_apellido' es requerido";
            $validacion = false;
        }else if (validarCampoLetras($primer_apellido) == false) {
            $_SESSION['errores']['primer_apellido'] = "El campo 'primer_apellido' debe contener solo letras";
            $validacion = false;
        }

        if (empty($sexo)) {
            $_SESSION['errores']['sexo'] = "El campo 'sexo' es requerido";
            $validacion = false;
        }else if (validarCampoLetras($sexo) == false) {
            $_SESSION['errores']['sexo'] = "El campo 'sexo' debe contener solo letras";
            $validacion = false;
        }
    
        if (empty($correo)) {
            $_SESSION['errores']['correo'] = "El campo 'correo' es requerido.";
            $validacion = false;
        }else if (validarCorreo($correo) == false) {
            $_SESSION['errores']['correo'] = "El campo 'correo' no tiene un formato válido.";
            $validacion = false;
        }
    
        if (empty($telefono)) {
            $_SESSION['errores']['telefono'] = "El campo 'telefono' es requerido.";
            $validacion = false;
        }
    
        if (empty($contraseña)) {
            $_SESSION['errores']['contraseña'] = "El campo 'contraseña' es requerido.";
            $validacion = false;
        }else if (validarContrasena($contraseña) == false) {
            $_SESSION['errores']['contraseña'] = "La contraseña debe contener al menos un número, una mayúscula, un carácter especial y tener entre 8 y 12 caracteres.";
            $validacion = false;
        }
    
        if (empty($confContraseña)) {
            $_SESSION['errores']['confContraseña'] = "El campo de confirmación de contraseña es requerido.";
            $validacion = false;
        }

        if ($contraseña !== $confContraseña) {
            $_SESSION['errores']['confClave'] = "La confirmación de la clave no coincide";
            $validacion = false;
        }

        // Validación de caracteres en los campos opcionales
    
        if ($segundo_nombre != null && validarCampoLetras($segundo_nombre ) == false) {
            $_SESSION['errores']['segundo_nombre'] = "El campo 'segundo_nombre' debe contener solo letras.";
            $validacion = false;
        }
    
        if ($segundo_apellido != null && validarCampoLetras($segundo_nombre ) == false) {
            $_SESSION['errores']['segundo_apellido'] = "El campo 'segundo_apellido' debe contener solo letras.";
            $validacion = false;
        }
    
        
    
        // Si todo es válido, insertar en la base de datos
        if ($validacion) {
            // Limpiar errores previos
            unset($_SESSION['errores']);
            
            // Cifrar la contraseña
            $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    
            // SQL para insertar usuario
            $sql = "INSERT INTO usuarios (usuario_id, tipo_documento, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, sexo, correo, telefono, direccion, contraseña, estado_id, rol_id)
                    VALUES ($id,'$tipo_documento', '$numero_documento', '$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$sexo', '$correo', '$telefono', '$direccion', '$hash', 1, 1)";
    
            // Ejecutar SQL
            $ejecutar = $obj->insert($sql);
    
            if ($ejecutar) {
                unset($_SESSION['errores']); 
                echo "Se registro el usuario";
                redirect('login.php');
            } else {
                echo "Error al insertar el usuario";
            }
        } else {
            echo "no se inserto";
            include_once '../view/usuarios/create.php';
        }
         
    }

    public function login(){

        $obj = new UsuariosModel();
        $email = $_POST['email'];
        $contraseña = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE correo='$email'";

        $result = $obj->consult($sql);

        $usuario = pg_fetch_all($result);

        $hash = password_hash($contraseña, PASSWORD_DEFAULT);


        if (count($usuario)>0){
            foreach($usuario as $usu){
                if(password_verify($contraseña, $usu['contraseña'])){
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

