<?php

require_once '../lib/helpers.php';
//require_once '../model/Usuarios/UsuariosModel.php';  

class ValidacionController{

function checkForm() {
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        unset($_SESSION); // Limpia los errores antes de empezar
    }
    
    //$obj=new UsuariosModel();

    $usu_tipoDocumento = $_POST['tipo_documento'] ?? '';
    $usu_numDocumento = $_POST['numero_documento'] ?? '';
    $usu_nombre1 = $_POST['primer_nombre'] ?? '';
    $usu_nombre2 = $_POST['segundo_nombre'] ?? '';
    $usu_apellido1 = $_POST['primer_apellido'] ?? '';
    $usu_apellido2 = $_POST['segundo_apellido'] ?? '';
    $usu_correo= $_POST['correo'] ?? '';
    $usu_telefono= $_POST['telefono'] ?? '';
    $usu_direccion= $_POST['direccion'] ?? '';
    $usu_clave= $_POST['clave'] ?? '';
    $usu_confClave = $_POST['confClave'] ?? '';
    
    $validacion = true;
    

    // Validación de cada campo
    if (empty($usu_tipoDocumento)) {
        $_SESSION['errores']['usuarioTD'] = "El campo es requerido";
        $validacion = false;
    }else if (!validarCampoLetras($usu_tipoDocumento)) {
        $_SESSION['errores']['usuarioTD'] = "El campo solo debe contener letras";
        $validacion = false;
    }

    if (empty($usu_numDocumento)) {
        $_SESSION['errores']['usuarioND'] = "El campo  es requerido";
        $validacion = false;
    }else if (!validarCampoNumeros($usu_numDocumento)) {
        $_SESSION['errores']['usuarioND'] = "El número de documento debe ser válido.";
        $validacion = false;
    }

    if (empty($usu_nombre1)) {
        $_SESSION['errores']['Nombre1'] = "El campo es requerido";
        $validacion = false;
    }else if (!validarCampoLetras($usu_nombre1)) {
        $_SESSION['errores']['Nombre1'] = "El campo debe contener solo letras";
        $validacion = false;
    }

    if (empty($usu_apellido1)) {
        $_SESSION['errores']['Apellido1'] = "El campo es requerido";
        $validacion = false;
    }else if (!validarCampoLetras($usu_apellido1)) {
        $_SESSION['errores']['Apellido1'] = "El campo debe contener solo letras";
        $validacion = false;
    }

    if (empty($usu_correo)) {
        $_SESSION['errores']['correo'] = "El campo es requerido";
        $validacion = false;
    }else if (!validarCorreo($usu_correo)) {
        $_SESSION['errores']['correo'] = "El correo no tiene un formato válido";
        $validacion = false;
    }

    if (empty($usu_telefono)) {
        $_SESSION['errores']['telefono'] = "El campo es requerido";
        $validacion = false;
    }

    if (empty($usu_clave)) {
        $_SESSION['errores']['clave'] = "El campo es requerido";
        $validacion = false;
    }else if (!validarContrasena($usu_clave)) {
        $_SESSION['errores']['clave'] = "La contraseña debe contener al menos un número, una mayúscula, un carácter especial y tener entre 8 y 12 caracteres";
        $validacion = false;
    }

    if (empty($usu_confClave)) {
        $_SESSION['errores']['confClave'] = "El campo de confirmación de clave es requerido";
        $validacion = false;
    }

    // Validación de caracteres en los campos opcionales
    if(empty($usu_nombre2)){
        $_SESSION['errores']['Nombre2'] = "";
        $validacion = false;
    } 

    if(empty($usu_apellido2)){
        $_SESSION['errores']['Apellido2'] = "";
        $validacion = false;
    } 

    if (!validarCampoLetras($usu_nombre2)) {
        $_SESSION['errores']['Nombre2'] = "El campo debe contener solo letras";
        $validacion = false;
    }

    if (!validarCampoLetras($usu_apellido2)) {
        $_SESSION['errores']['Apellido2'] = "El campo debe contener solo letras";
        $validacion = false;
    }

    if ($usu_clave !== $usu_confClave) {
        $_SESSION['errores']['confClave'] = "La confirmación de la clave no coincide";
        $validacion = false;
    }

    // Si todo es válido, insertar en la base de datos
    if ($validacion) {
        // Limpiar errores previos
        unset($_SESSION['errores']);
        
        // Cifrar la contraseña
        /*$hash = password_hash($usu_clave, PASSWORD_DEFAULT);

        // SQL para insertar usuario
        $sql = "INSERT INTO usuarios (tipo_documento, numero_documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, correo, telefono, direccion, clave, estado, rol)
                VALUES ('$usu_tipoDocumento', '$usu_numDocumemto', '$usu_nombre1', '$usu_nombre2', '$usu_apellido1', '$usu_apellido2', '$usu_correo', '$usu_telefono', '$usu_direccion', '$hash', 2, 1)";

        // Ejecutar SQL
        $ejecutar = $obj->insert($sql);

        if ($ejecutar) {
            unset($_SESSION['errores']); 
            redirect('login.php');
        } else {
            echo "Error al insertar el usuario";
        }*/
    } else {
        
        redirect('registrar.php');
    }
     var_dump($_SESSION['errores']);
}

}
    ?>