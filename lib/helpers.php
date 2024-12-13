<?php
    
    session_start();
    function redirect($url) {
        echo "<script type='text/javascript'>"
        ."window.location.href = '$url'".
        "</script>";
    }
    
    function dd($var) {
        echo "<pre>";
        die(print_r($var));
    }

    function getUrl($modulo, $controlador, $funcion, $parametros = false, $pagina = false) {

        if($pagina == false) {
            $pagina = "index";
        }

        $url = "$pagina.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";

        if($parametros != false){
            foreach($parametros as $key => $value){
                $url .="&$key=$value";
            }
        }

        return $url;
    }

    function resolve(){
        //Recibe el modulo, controlador y funcion.
        $modulo = ucwords($_GET['modulo']); //Modulo recibido
        $controlador = ucwords($_GET['controlador']); //Controller recibido
        $funcion = $_GET['funcion']; //Funcion recibida

        //Comprueba si existe la ruta
        if (is_dir("../controller/".$modulo)) {

            //Comprueba si existe el archivo
            if(file_exists("../controller/".$modulo."/".$controlador."Controller.php")){

                include_once "../controller/".$modulo."/".$controlador."Controller.php"; //Se incluye el archivo
                $nombreClase = $controlador."Controller"; //Se asigna el nombre de la clase

                //Comprueba si existe la clase
                if(class_exists($nombreClase)){
                    //Se instancia un objeto, con el nombre de la clase
                    $objClass = new $nombreClase();

                    //Comprueba si existe el objeto
                    if(method_exists($objClass, $funcion)){
                        //El objeto utiliza la funcion
                        $objClass -> $funcion();
                    }else{
                        echo "No se encontró el objeto";
                    }
                }else{
                   echo "No se encontró la clase";
                }
            }else{
                echo "No se encontró el archivo";
            }

        }else{
            echo "No se encontró la carpeta";
        }
    }

    function validarCampo($campo, $nombre_campo, $tipo){
        if(!empty($campo)){
            $_SESSION['errores'][$nombre_campo] = "";
        }
        if (empty($campo)) {
            $_SESSION['errores'][$nombre_campo] = "El campo '$nombre_campo' es requerido.";
            
        }else{
            switch ($tipo) {
                case 'letras':
                    if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $campo)) {
                        $_SESSION['errores'][$nombre_campo] = "El campo '$nombre_campo' debe contener solo letras.";
                        
                    }
                    $_SESSION['values'][$nombre_campo] = $campo;
                    break;
                case 'numeros':
                    if (!preg_match("/^[0-9]+$/",$campo)) {
                        $_SESSION['errores'][$nombre_campo] = "El campo '$nombre_campo' solo debe contener números.";
                        
                    }
                    $_SESSION['values'][$nombre_campo] = $campo;
                    break;
                case 'correo':
                    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$campo)) {
                        $_SESSION['errores'][$nombre_campo] = "El campo '$nombre_campo' no tiene un formato válido.";
                        
                    }
                    $_SESSION['values'][$nombre_campo] = $campo;
                    break;
                case 'contraseña':
                    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@$!%*?&])[A-Za-z\\d@$!%*?&]{8,20}$/",$campo)) {
                        $_SESSION['errores'][$nombre_campo] = "El campo '$nombre_campo' debe tener entre 8, incluyendo al menos una letra mayúscula, una minúscula, un número y un carácter especial.";
                        
                    }
                    $_SESSION['values'][$nombre_campo] = $campo;
                    break;
                case 'asunto':
                    if(!preg_match("/^.{0,20}$/",$campo)){
                        $_SESSION['errores'][$nombre_campo] = "El campo '$nombre_campo' debe tener como maximo 20 caracteres";
                    }
                default:
                    $_SESSION['values'][$nombre_campo] = $campo;
                    break;
                
            }
        }

        

       
    }

?>