<?php
    session_start();
    function redirect($url){
        echo "<script type='text/javascript'>"
        ."window.location.href='$url'"
        ."</script>";
    }
    function dd($var){
        echo "<pre>";
        die(print_r($var));
    }
    function getUrl($modulo, $controlador, $funcion,$parametros=false,$pagina=false){
        if($pagina==false){
            $pagina="index";
        }
    
        $url= "$pagina.php?modulo=$modulo&controlador=$controlador&funcion=$funcion";
        if ($parametros != false) {
            foreach ($parametros as $key => $value) {
                $url.="&$key=$value";
            }
        }
        return $url;
    }
    function resolve(){
        $modulo=ucwords($_GET['modulo']);
        $controlador=ucwords($_GET['controlador']);
        $funcion=$_GET['funcion'];
        
    
        if(is_dir("../controller/$modulo")){
            if (file_exists("../controller/$modulo/".$controlador."Controller.php")){
                    include_once "../controller/$modulo/".$controlador."Controller.php";
                    $nombreClase = $controlador."Controller";
                    $objClase = new $nombreClase();
                        if(method_exists($objClase,$funcion)){
                            $objClase->$funcion();
                        }else{
                            echo "La funcion especificada no existe";
                        }
            }else{
            echo "El modulo especificado no existe";
            }
        }
    }
    function validarCampoLetras($input){
        $patron="/^[a-zA-Z\s]+$/";
        return preg_match($patron,$input)===1;
    }
    function validarNumeros($input){
        $patron="/^[0-9]+$/";
        return preg_match($patron,$input)===1;
    }
    function validarCorreo($input){
        $patron="/^([a-zA-Z0-9_.-]+)@([a-zA-Z]+)\.([a-zA-Z]{2,})$/";
        return preg_match($patron,$input) == 1;
    }
    function validarContraseba($input){
        $patron="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[.*_@-]).{8,}$/";
        return preg_match($patron,$input) == 1;
    }
    function validaciones($letras,$numeros,$correo, $contrasena){
       $pat[0]="/^[a-zA-Z\s]+$/";
       $pat[1]="/^[0-9]+$/";
       $pat[2]="/^([a-zA-Z0-9_.-]+)@([a-zA-Z]+)\.([a-zA-Z]{2,})$/";
       $pat[3]="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[.*_@-]).{8,}$/";

       $validar= preg_match($pat[0],$letras) ==1;
       $validar= preg_match($pat[1],$numeros) ==1;
       $validar= preg_match($pat[2],$correo) ==1;
       $validar= preg_match($pat[3],$contrasena) ==1;
       return $validar;
       
    }

?>