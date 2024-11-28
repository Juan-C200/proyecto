<?php

include_once '../model/Usuarios/UsuariosModel.php';

class UsuariosController{

    public function getUsuarios(){
        $obj = new UsuariosModel();
        $sql = "SELECT * FROM usuarios u
                JOIN roles r ON r.rol_id = u.usu_rol
                JOIN estados e ON e.est_id = u.usu_estado
                JOIN tipo_documento tp ON tp.tipo_docu_id = u.usu_tipo_docu ORDER BY usu_id";
        $result = $obj->consult($sql);

        $usuarios = pg_fetch_all($result);


        include_once '../view/usuarios/consult.php';
    }

    public function getUpdate(){
        $obj = new UsuariosModel();

        $usu_id= $_GET['usu_id'];

        $sql = "SELECT * FROM usuarios u
                JOIN roles r ON r.rol_id = u.usu_rol
                JOIN estados e ON e.est_id = u.usu_estado 
                JOIN tipo_documento tp ON tp.tipo_docu_id = u.usu_tipo_docu WHERE u.usu_id=$usu_id";
        $result=$obj->consult($sql);
        $usuarios = pg_fetch_all($result);

        $sql = "SELECT * FROM tipo_documento";
        $result=$obj->consult($sql);
        $tipos_documentos = pg_fetch_all($result);

        $sql = "SELECT * FROM estados";  
        $result=$obj->consult($sql);
        $estados = pg_fetch_all($result);

        $sql = "SELECT * FROM roles";  
        $result=$obj->consult($sql);
        $roles = pg_fetch_all($result);

        include_once '../view/Usuarios/update.php';

    }

    function validatePassword(){
        
        $contraseña = $_POST['password'];
        
        if(password_verify($contraseña, $_SESSION['usu_contrasena'])){
            echo "correcta";
        }else{
            echo "no"; 
        }

    }

    function postUpdate() {
        unset($_SESSION['errores']);
        
        
        $obj=new UsuariosModel();
    
        $id = $_POST['id'];
        $tipo_documento = $_POST['tipo_documento'] ?? '';
        $numero_documento = $_POST['numero_documento'] ?? '';
        $primer_nombre = $_POST['primer_nombre'] ?? '';
        $segundo_nombre = $_POST['segundo_nombre'] ?? '';
        $primer_apellido = $_POST['primer_apellido'] ?? '';
        $segundo_apellido = $_POST['segundo_apellido'] ?? '';
        $sexo = $_POST['sexo'] ?? '';
        $correo= $_POST['correo'] ?? '';
        $celular= $_POST['celular'] ?? '';
        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        //esto lo puede modificar solo el administrador
        $rol_id = $_POST['rol_id'] ?? '';
        $est_id = $_POST['est_id'] ?? '';

        
        if($_SESSION['rol_nombre'] == "Administrador"){
            if(empty($rol_id)){
                $rol_id = $_SESSION['usu_rol'];
                $est_id = $_SESSION['usu_estado'];
            }
        }else{
            $rol_id = $_SESSION['usu_rol'];
            $est_id = $_SESSION['usu_estado'];
        }

        $validacion = true;
        
        // Validación de cada campo
        validarCampo($tipo_documento, 'Tipo de documento', 'numeros');
        validarCampo($numero_documento, 'Numero de documento', 'numeros');
        validarCampo($primer_nombre, 'Primer nombre', 'letras');
        validarCampo($primer_apellido, 'Primer apellido', 'letras');
        validarCampo($sexo, 'Genero', 'letras');
        validarCampo($correo, 'Correo', 'correo');
        validarCampo($celular, 'Celular', 'numeros');
        validarCampo($campo1, 'Tipo de vía', 'letras');
        validarCampo($campo2, 'Nombre o numero de vía', 'no');
        validarCampo($campo4, 'Numero de placa #1', 'no');
        validarCampo($campo5, 'Numero de placa #2', 'no');

        // Validaciónes opcionales
        if (!empty($segundo_nombre)) {
            validarCampo($segundo_nombre, 'Segundo nombre', 'letras');
        }
        if (!empty($segundo_apellido)) {
            validarCampo($segundo_apellido, 'Segundo apellido', 'letras');
        }
        if (!empty($campo3)) {
            validarCampo($campo3, 'Prefijo o cuadrante', 'letras');
        } 

        // Si hay errores no deja avanzar
        if (!empty($_SESSION['errores'])) {
            $validacion = false;
        }

        // Si todo es válido, insertar en la base de datos
        if ($validacion) {
            
            
            $sql = "UPDATE usuarios SET usu_nombre1 = '$primer_nombre', usu_nombre2 = '$segundo_nombre', usu_apellido1 = '$primer_apellido', usu_apellido2 = '$segundo_apellido', usu_genero = '$sexo', usu_telefono = '$celular', usu_correo = '$correo', usu_tipo_docu = $tipo_documento, usu_numero_docu = '$numero_documento', usu_direccion = '$direccion', usu_rol = $rol_id, usu_estado = $est_id WHERE usu_id = $id";
            $ejecutar = $obj->update($sql);
    
            if ($ejecutar) {
                unset($_SESSION['errores']);
                unset($_SESSION['values']);
                redirect(getUrl("Usuarios","Usuarios","getUpdate",array("usu_id"=>$id)));
                
            } else {
                redirect(getUrl("Usuarios","Usuarios","getUpdate",array("usu_id"=>$id)));
            }
        } else {
            redirect(getUrl("Usuarios","Usuarios","getUpdate",array("usu_id"=>$id)));
            
        }
         
    }


    public function postUpdateStatus(){
        $obj = new UsuariosModel();

        $usu_id=$_POST['user'];
        $est_id=$_POST['id'];

        if($est_id == 1){
            $statusToModify = 2;
        }elseif($est_id == 2){
            $statusToModify = 1;
        }
        

        $sql="UPDATE usuarios SET usu_estado=$statusToModify WHERE usu_id=$usu_id";

        $ejecutar=$obj->update($sql);

        if($ejecutar){

            $sql = "SELECT * FROM usuarios u
                JOIN roles r ON r.rol_id = u.usu_rol
                JOIN estados e ON e.est_id = u.usu_estado
                JOIN tipo_documento tp ON tp.tipo_docu_id = u.usu_tipo_docu ORDER BY usu_id";
            
            $result=$obj->consult($sql);

            $usuarios = pg_fetch_all($result);

            include_once "../view/Usuarios/consult.php";
            
        }else{
            echo "No se pudo actualizar el estado";
        }

    }

    public function buscar(){
        $obj = new UsuariosModel();
        $buscar = $_POST['buscar'];
        $sql = "SELECT * FROM usuarios u
                JOIN roles r ON r.rol_id = u.usu_rol
                JOIN estados e ON e.est_id = u.usu_estado
                JOIN tipo_documento tp ON tp.tipo_docu_id = u.usu_tipo_docu 
                WHERE u.usu_nombre1 LIKE '%$buscar%' OR u.usu_nombre2 LIKE '%$buscar%'
                OR u.usu_apellido1 LIKE '%$buscar%' OR u.usu_apellido2 LIKE '%$buscar%' ORDER BY usu_id";

        $result=$obj->consult($sql);

        $usuarios = pg_fetch_all($result);
        include_once "../view/Usuarios/consult.php";
    }


    public function getCreate(){

        $obj = new UsuariosModel();
        
        $sql = "SELECT * FROM tipo_documento";
        $result=$obj->consult($sql);
        $tipos_documentos = pg_fetch_all($result);

        $sql = "SELECT * FROM estados";  
        $result=$obj->consult($sql);
        $estados = pg_fetch_all($result);

        $sql = "SELECT * FROM roles";  
        $result=$obj->consult($sql);
        $roles = pg_fetch_all($result);

        include_once "../view/Usuarios/create.php";
    }

    function postCreate() {

        $obj=new UsuariosModel();
    
        $id=$obj->autoIncrement("usuarios","usu_id");
        $tipo_documento = $_POST['tipo_documento'] ?? '';
        $numero_documento = $_POST['numero_documento'] ?? '';
        $primer_nombre = $_POST['primer_nombre'] ?? '';
        $segundo_nombre = $_POST['segundo_nombre'] ?? '';
        $primer_apellido = $_POST['primer_apellido'] ?? '';
        $segundo_apellido = $_POST['segundo_apellido'] ?? '';
        $sexo = $_POST['sexo'] ?? '';
        $correo= $_POST['correo'] ?? '';
        $celular= $_POST['celular'] ?? '';
        $contraseña= $_POST['contraseña'] ?? '';
        $confContraseña = $_POST['confContraseña'] ?? '';
        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        $campo4 = $_POST['campo4'] ?? '';
        $campo5 = $_POST['campo5'] ?? '';

        $direccion = $campo1." ".$campo2." ".$campo3."# ".$campo4." - ".$campo5;

        //esto lo puede modificar solo el administrador
        $rol_id = $_POST['rol_id'] ?? '';
        $est_id = $_POST['est_id'] ?? '';

        if(empty($rol_id)){
            $rol_id = 3;
        }

        if(empty($est_id)){
            $est_id = 1;
        }

        $validacion = true;

        // Validación de cada campo
        validarCampo($tipo_documento, 'Tipo de documento', 'numeros');
        validarCampo($numero_documento, 'Numero de documento', 'numeros');
        validarCampo($primer_nombre, 'Primer nombre', 'letras');
        validarCampo($primer_apellido, 'Primer apellido', 'letras');
        validarCampo($sexo, 'Genero', 'letras');
        validarCampo($correo, 'Correo', 'correo');
        validarCampo($celular, 'Celular', 'numeros');
        validarCampo($campo1, 'Tipo de vía', 'letras');
        validarCampo($campo2, 'Nombre o numero de vía', 'no');
        validarCampo($campo4, 'Numero de placa #1', 'no');
        validarCampo($campo5, 'Numero de placa #2', 'no');
        validarCampo($contraseña, 'Contraseña', 'contraseña');

        if (!empty($confContraseña) && $contraseña !== $confContraseña) {
            $_SESSION['errores']['Confirmar contraseña'] = "La confirmación de la contraseña no coincide.";
        }
        
        // Validaciónes opcionales
        if (!empty($segundo_nombre)) {
            validarCampo($segundo_nombre, 'Segundo nombre', 'letras');
        }
        if (!empty($segundo_apellido)) {
            validarCampo($segundo_apellido, 'Segundo apellido', 'letras');
        }
        if (!empty($campo3)) {
            validarCampo($campo3, 'Prefijo o cuadrante', 'letras');
        } 


        // Si hay errores no deja avanzar
        if (!empty($_SESSION['errores'])) {
            $validacion = false;
        }
 
        // Si todo es válido, insertar en la base de datos
        if ($validacion) {

            // Cifrar la contraseña
            $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    
            $sql = "INSERT INTO usuarios (usu_id, usu_nombre1, usu_nombre2, usu_apellido1, usu_apellido2, usu_genero, usu_telefono, usu_correo, usu_tipo_docu, usu_numero_docu, usu_direccion, usu_contrasena, usu_rol, usu_estado)
                    VALUES ($id, '$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$sexo', '$celular', '$correo', $tipo_documento, '$numero_documento', '$direccion', '$hash', $rol_id, $est_id)";
    
            $ejecutar = $obj->insert($sql);
    
            if ($ejecutar) {

                unset($_SESSION['errores']);
                unset($_SESSION['values']);

                if(!isset($_SESSION['auth'])){
                    redirect(getUrl("Usuarios","Usuarios","getCreate",false,"ajax"));
                }else{
                    redirect(getUrl("Usuarios","Usuarios","getCreate"));
                }
                
            } else {
                if(!isset($_SESSION['auth'])){
                    redirect(getUrl("Usuarios","Usuarios","getCreate",false,"ajax"));
                }else{
                    redirect(getUrl("Usuarios","Usuarios","getCreate"));
                }
            }
        } else {
            if(!isset($_SESSION['auth'])){
                redirect(getUrl("Usuarios","Usuarios","getCreate",false,"ajax"));
            }else{
                redirect(getUrl("Usuarios","Usuarios","getCreate"));
            }
            
        }
         
    }

    public function login(){

        $obj = new UsuariosModel();
        $email = $_POST['email'];
        $contraseña = $_POST['password'];

        $sql = "SELECT * FROM usuarios u
                JOIN roles r ON r.rol_id = u.usu_rol
                JOIN estados e ON e.est_id = u.usu_estado 
                JOIN tipo_documento tp ON tp.tipo_docu_id = u.usu_tipo_docu WHERE u.usu_correo='$email' AND u.usu_estado = 1";

        $result = $obj->consult($sql);

        $usuario = pg_fetch_all($result);

        $hash = password_hash($contraseña, PASSWORD_DEFAULT);


        if (count($usuario)>0){
            foreach($usuario as $usu){
                if(password_verify($contraseña, $usu['usu_contrasena'])){
                    $_SESSION['usu_id'] = $usu['usu_id'];
                    $_SESSION['usu_nombre1'] = $usu['usu_nombre1'];
                    $_SESSION['usu_nombre2'] = $usu['usu_nombre2'];
                    $_SESSION['usu_apellido1'] = $usu['usu_apellido1'];
                    $_SESSION['usu_apellido2'] = $usu['usu_apellido2'];
                    $_SESSION['usu_genero'] = $usu['usu_genero'];
                    $_SESSION['usu_telefono'] = $usu['usu_telefono'];
                    $_SESSION['usu_correo'] = $usu['usu_correo'];
                    $_SESSION['usu_tipo_docu'] = $usu['usu_tipo_docu'];
                    $_SESSION['tipo_docu_nombre'] = $usu['tipo_docu_nombre'];
                    $_SESSION['tipo_docu_codigo'] = $usu['tipo_docu_codigo'];
                    $_SESSION['usu_numero_docu'] = $usu['usu_numero_docu'];
                    $_SESSION['usu_direccion'] = $usu['usu_direccion'];
                    $_SESSION['usu_contrasena'] = $usu['usu_contrasena'];
                    $_SESSION['usu_rol'] = $usu['usu_rol'];
                    $_SESSION['rol_nombre'] = $usu['rol_nombre'];
                    $_SESSION['usu_estado'] = $usu['usu_estado'];
                    $_SESSION['est_nombre'] = $usu['est_nombre'];
                    $_SESSION['est_control'] = $usu['est_control'];
                    $_SESSION['auth'] = "ok";
                    unset($_SESSION['errores']);
                    redirect("index.php");
                } else {
                    $_SESSION['errores'] = "Contraseña incorrecta.";
                    redirect("login.php");
                    
                }
            }    

        } else {
            $_SESSION['errores'] = "Usuario y/o contraseña incorrecto.";
            redirect("login.php");
            
            
        }
    }

    public function logout(){
        session_destroy();
        redirect("login.php");
        
    }

    public function getPanelAdmin(){
        include_once '../view/Usuarios/panelAdmin.php';
        
    }


    

}
?>

