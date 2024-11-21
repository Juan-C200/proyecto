<?php
    include_once "../view/partials/head.php";
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

    function validarCampoLetras($input){
        $patron="/^[a-zA-Z\s]+$/";
        return preg_match($patron,$input) === 1;
    }
    function validarCampoNumeros($input){
        $patron="/^[0-9]+$/";
        return preg_match($patron,$input) === 1;
    }

    function validarCorreo($input) {
        $patron = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        return preg_match($patron, $input) === 1;
    }
    
    function validarContrasena($input){
        $patron="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@$!%*?&])[A-Za-z\\d@$!%*?&]{8,20}$/";
        return preg_match($patron,$input) === 1;
    }

?>