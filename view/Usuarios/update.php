<?php                              
    foreach($usuarios as $usu){
?>


    
    <div class="formularios mb-5" id="form">
    <!-- formulario -->
        <form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdate", false, "ajax"); ?> " class="formularios" method="POST" id="form_update">
            <input type="hidden" name="id" value=<?php echo $usu["usu_id"] ?>>
            <div class="row justify-content-center">
                <h3 class="text-center text mb-1 mt-1">Editar perfil</h3>

                <p class="text"><b>Los campos especificados con (*) son campos obligatorios.</p>

                <div class="boxDatos row border rounded-3 p-4">
                    <h4 class="text-white">Datos de identificación</h4>

                    <div class="col-md-3 p-2">
                        <label for="tipoDocumento" class="form-label text-white">Tipo documento*</label>
                        <select type="text" class="form-control boxDatos rounded-5" id="tipoDocumento"
                            name="tipo_documento">
                            <option value="">Seleccione...</option>
                            <?php 
                                
                                foreach($tipos_documentos as $tipo_documento){
                                    if(isset($_SESSION['values']['Tipo de documento']) &&
                                     $_SESSION['values']['Tipo de documento'] == $tipo_documento['tipo_docu_id']){

                                        $selected = "selected";
                                    }else if($usu['usu_tipo_docu'] == $tipo_documento['tipo_docu_id']){
                                        
                                        $selected="selected";
                                    }else{

                                        $selected="";
                                    }

                                    echo "<option value='".$tipo_documento['tipo_docu_id']."' ".$selected.">".$tipo_documento['tipo_docu_nombre']."</option>";
                                }    
                            ?>
                            
                        </select>

                        <?php
                            if (isset($_SESSION['errores']['Tipo de documento'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Tipo de documento'] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="col-md-3 p-2">
                        <label for="numeroDocumento" class="form-label text-white">Numero documento*</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="numeroDocumento"
                        name="numero_documento"
                        value="<?php  
                            if (isset($_SESSION['values']['Numero de documento'])) {
                                echo htmlspecialchars($_SESSION['values']['Numero de documento']);
                            } else if (isset($usu['usu_numero_docu'])) {
                                echo $usu['usu_numero_docu'];
                            } else {
                                echo '';
                            }
                        ?>" required>

                        <?php
                            if (isset($_SESSION['errores']['Numero de documento'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Numero de documento'] . "</p>";
                            }
                        ?>

                    </div>

                    <div class="col-md-3 p-2">
                        <label for="primer_nombre" class="form-label text-white">Primer nombre*</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="primer_nombre"
                            name="primer_nombre"
                            value="<?php  
                            if (isset($_SESSION['values']['Primer nombre'])) {
                                echo htmlspecialchars($_SESSION['values']['Primer nombre']);
                            } else if (isset($usu['usu_nombre1'])) {
                                echo $usu['usu_nombre1'];
                            } else {
                                echo '';
                            }
                        ?>" required>
                        <?php
                            if (isset($_SESSION['errores']['Primer nombre'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Primer nombre'] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="col-md-3 p-2">
                        <label for="segundo_nombre" class="form-label text-white">Segundo nombre</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="segundo_nombre"
                            name="segundo_nombre"
                            value="<?php  
                            if (isset($_SESSION['values']['Segundo nombre'])) {
                                echo htmlspecialchars($_SESSION['values']['Segundo nombre']);
                            } else if (isset($usu['usu_nombre2'])) {
                                echo $usu['usu_nombre2'];
                            } else {
                                echo '';
                            }
                        ?>">
                        <?php
                            if (isset($_SESSION['errores']['Segundo nombre'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Segundo nombre'] . "</p>";
                            }
                        ?>

                    </div>

                    <div class="col-md-3 p-2">
                        <label for="primer_apellido" class="form-label text-white">Primer apellido*</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="primer_apellido"
                            name="primer_apellido"
                            value="<?php  
                            if (isset($_SESSION['values']['Primer apellido'])) {
                                echo htmlspecialchars($_SESSION['values']['Primer apellido']);
                            } else if (isset($usu['usu_apellido1'])) {
                                echo $usu['usu_apellido1'];
                            } else {
                                echo '';
                            }
                        ?>" required>
                        <?php
                            if (isset($_SESSION['errores']['Primer apellido'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Primer apellido'] . "</p>";
                            }
                        ?>

                    </div>

                    <div class="col-md-3 p-2">
                        <label for="segundo_apellido" class="form-label text-white col-md-8">Segundo apellido</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="segundo_apellido"
                            name="segundo_apellido"
                            value="<?php  
                            if (isset($_SESSION['values']['Segundo apellido'])) {
                                echo htmlspecialchars($_SESSION['values']['Segundo apellido']);
                            } else if (isset($usu['usu_apellido2'])) {
                                echo $usu['usu_apellido2'];
                            } else {
                                echo '';
                            }
                        ?>">
                        <?php
                            if (isset($_SESSION['errores']['Segundo apellido'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Segundo apellido'] . "</p>";
                            }
                        ?>

                    </div>

                    <div class="col-md-3 p-2">
                        <label for="sexo" class="form-label text-white">Genero*</label>
                        <select type="text" class="form-control boxDatos rounded-5" id="genero"
                            name="sexo">
                        <option value="">Seleccione...</option>

                        <?php 
                            $generos =array("Masculino","Femenino");

                            foreach($generos as $genero){
                                
                                if(isset($_SESSION['values']['Genero']) &&
                                     $_SESSION['values']['Genero'] == $genero){

                                    $selected = "selected";
                                }else if($usu['usu_genero'] == $genero){
                                    
                                    $selected="selected";
                                }else{

                                    $selected="";
                                }   
                                
                                echo "<option value='".$genero."' ".$selected.">".$genero."</option>";
                            }    
                        
                        ?>
                        </select>
                        <?php
                            if (isset($_SESSION['errores']['Genero'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Genero'] . "</p>";
                            }
                        ?>

                    </div>

                    <?php
                        if (isset($_SESSION['auth'])) {
                            if($_SESSION['rol_nombre'] == "Administrador" && $_SESSION['usu_id'] != $usu['usu_id']){
                                
                    ?>      

                                <div class="col-md-3 p-2">
                                    <label for="rol_id" class="form-label text-white">Rol*</label>
                                    <select type="text" class="form-control boxDatos rounded-5"
                                        name="rol_id">
                                    <?php 
                                        foreach($roles as $rol){
                                            
                                            if(isset($_SESSION['values']['Rol']) &&
                                                $_SESSION['values']['Rol'] == $rol['rol_id']){

                                                $selected = "selected";
                                            }else if($usu['usu_rol'] == $rol['rol_id']){
                                                
                                                $selected="selected";
                                            }else{

                                                $selected="";
                                            }   
                                            echo "<option value='".$rol['rol_id']."' ".$selected.">".$rol['rol_nombre']."</option>";
                                        }    
                                    ?>
                                    </select>
                                </div>
                    <?php     
                                if (isset($_SESSION['errores']['Rol'])) {
                                    echo "<p class=' text-danger'>" . $_SESSION['errores']['Rol'] . "</p>";
                                }
                            }
                        }
                    ?>

                </div>

                
                <div class="boxDatos row border rounded-3 p-4 mt-4">
                    <h4 class="text-white">Datos de contacto</h4>

                    <div class="col-md-6">
                        <label for="correo" class="form-label text-white col-md-6">Correo*</label>
                        <input type="email" class="form-control boxDatos rounded-5" id="correo" name="correo"
                            value="<?php  
                            if (isset($_SESSION['values']['Correo'])) {
                                echo htmlspecialchars($_SESSION['values']['Correo']);
                            } else if (isset($usu['usu_correo'])) {
                                echo $usu['usu_correo'];
                            } else {
                                echo '';
                            }
                        ?>" required>

                        <?php
                            if (isset($_SESSION['errores']['Correo'])) {
                                echo "<p class='text-danger'>" . $_SESSION['errores']['Correo'] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="col-md-6">
                        <label for="celular" class="form-label text-white col-md-8">Celular*</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="celular"
                            name="celular"
                            value="<?php  
                            if (isset($_SESSION['values']['Celular'])) {
                                echo htmlspecialchars($_SESSION['values']['Celular']);
                            } else if (isset($usu['usu_telefono'])) {
                                echo $usu['usu_telefono'];
                            } else {
                                echo '';
                            }
                        ?>" required>
                        <?php
                            if (isset($_SESSION['errores']['Celular'])) {
                                echo "<p class='text-danger'>" . $_SESSION['errores']['Celular'] . "</p>";
                            }
                        ?>

                    </div>

                    <div class="col">
                        <div class="row">
                            <h5 for="" class="form-label text-white pt-4">Dirección</h5>

                            <div class="col-md-4 p-2">
                                <label for="campo1" class="form-label text-white">Tipo de vía*</label>
                                <select name="campo1" class="form-control boxDatos rounded-5" >
                                    <option value="">Seleccione...</option>

                                    <?php 
                                        $tipos_vias = array("Calle","Carrera","Avenida","Transversal","Circular","Diagonal");

                                        $direccion =explode(" ",$usu['usu_direccion']);


                                        //sacar el primer numero de placa
                                        $posicion = count($direccion) - 3;
                                        $num_placa1 = $direccion[$posicion];

                                        //sacar el segundo numero de placa
                                        $posicion = count($direccion) - 1;
                                        $num_placa2 = $direccion[$posicion];
                                        
                                        
                                        foreach($tipos_vias as $tipo_via){

                                            if(isset($_SESSION['values']['Tipo de vía']) &&
                                                $_SESSION['values']['Tipo de vía'] == $tipo_via){

                                                $selected = "selected";
                                            }else if($direccion[0] == $tipo_via){
                                                
                                                $selected="selected";
                                            }else{

                                                $selected="";
                                            }  
                                            
                                            echo "<option value='".$tipo_via."' ".$selected.">".$tipo_via."</option>";
                                        }    
                                    
                                    ?>
                                </select>
                                <?php
                                    if (isset($_SESSION['errores']['Tipo de vía'])) {
                                        echo "<p class=' text-danger'>" . $_SESSION['errores']['Tipo de vía'] . "</p>";
                                    }
                                ?>
                            </div>
                            
                            <div class="col-md-4 p-2">
                                <label for="campo2" class="form-label text-white">Nombre o número de vía*</label>
                                <input type="text" value="<?php  
                                    if (isset($_SESSION['values']['Nombre o numero de vía'])) {
                                        echo htmlspecialchars($_SESSION['values']['Nombre o numero de vía']);
                                    } else if (!empty($direccion[1])) {
                                        echo htmlspecialchars($direccion[1]);
                                    } else {
                                        echo '';
                                    }
                                ?>" name="campo2" class="form-control boxDatos rounded-5" required>
                                <?php
                                    if (isset($_SESSION['errores']['Nombre o numero de vía'])) {
                                        echo "<p class=' text-danger'>" . $_SESSION['errores']['Nombre o numero de vía'] . "</p>";
                                    }
                                ?>
                            </div>

                            <div class="col-md-4 p-2">
                                <label for="campo3" class="form-label text-white">Prefijo o cuadrante</label>
                                <select name="campo3" class="form-control boxDatos rounded-5" id="prefijo">
                                    <option value="">Seleccione...</option>

                                    <?php 
                                        $prefijos = array("Norte","Sur","Este","Oeste");

                                        foreach($prefijos as $prefijo){
                                            if(isset($_SESSION['values']['Prefijo o cuadrante']) &&
                                             $_SESSION['values']['Prefijo o cuadrante'] == $prefijo){

                                                $selected = "selected";
                                            }else if($direccion[2] == $prefijo){
                                                
                                                $selected="selected";
                                            }else{

                                                $selected="";
                                            }  
                                            
                                            echo "<option value='".$prefijo." ' ".$selected.">".$prefijo."</option>";
                                        }    
                                    
                                    ?>

                                </select>
                                <?php
                                    if (isset($_SESSION['errores']['Prefijo o cuadrante'])) {
                                        echo "<p class=' text-danger'>" . $_SESSION['errores']['Prefijo o cuadrante'] . "</p>";
                                    }
                                ?>
                            </div>

                            <label for="" class="form-label text-white">Número de placa*</label>

                            <div class="col-md-1">
                                <h4 for="" class="form-label text-white m-1">#</h4>
                            </div>

                            <div class="col-md-3">
                                <input type="text" value="<?php  
                                    if (isset($_SESSION['values']['Numero de placa #1'])) {
                                        echo htmlspecialchars($_SESSION['values']['Numero de placa #1']);
                                    } else if (!empty($num_placa1)) {
                                        echo htmlspecialchars($num_placa1);
                                    } else {
                                        echo '';
                                    }
                                ?>" name="campo4" class="form-control boxDatos rounded-5">
                                <?php
                                    if (isset($_SESSION['errores']['Numero de placa #1'])) {
                                        echo "<p class=' text-danger'>" . $_SESSION['errores']['Numero de placa #1'] . "</p>";
                                    }
                                ?>
                            </div>

                            <div class="col-md-1">
                                <h4 for="" class="form-label text-white m-1">-</h4>
                            </div>

                            <div class="col-md-3">
                                <input type="text" value="<?php  
                                    if (isset($_SESSION['values']['Numero de placa #2'])) {
                                        echo htmlspecialchars($_SESSION['values']['Numero de placa #2']);
                                    } else if (!empty($num_placa2)) {
                                        echo htmlspecialchars($num_placa2);
                                    } else {
                                        echo '';
                                    }
                                ?>" name="campo5" class="form-control boxDatos rounded-5">
                                <?php
                                    if (isset($_SESSION['errores']['Numero de placa #2'])) {
                                        echo "<p class=' text-danger'>" . $_SESSION['errores']['Numero de placa #2'] . "</p>";
                                    }
                                    unset($_SESSION['errores']);
                                    unset($_SESSION['values']);
                                ?>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12 mt-3">
                <input type="submit" value="Enviar" class="btn btn-primary mt-3">
            </div>
            </form>
        <!-- finFormulario -->
    </div>
    
    
<?php 
                            
    }
?>

<!-- Modal -->
<!-- <div class="modal d-none" id="modal">
    <div class="modal-dialog modal-dialog-centered ">
        
        
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5>Confirmar contraseña</h5>
                    <button type="button" class="btn-close" id="close"></button>
                </div>
                <div class="modal-body">
                    <p>Para confirmar que eres tú por favor ingresa tu contraseña.</p>
                    <label for="">Contraseña</label>
                    <input type="password" name="contraseña" id="contraseña" class="form-control boxDatos rounded-5">
                    <p class="d-none" id="error_contraseña">Contraseña incorrecta.</p>
                </div>
                
                <div class="modal-footer">
                    <input id="validate_password" class="btn btn-success" value="Enviar"  
                    data-url="<?php echo getUrl("Usuarios", "Usuarios", "validatePassword",false,"ajax"); ?>">
                    <?php
                        unset($_SESSION['errores']);
                        unset($_SESSION['values']);

                    ?>
                    
                </div>
            </div>
        </form>
    </div>
    
</div> -->


<!-- Modal -->
<div class="modal" id="modal_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close close"></button>
      </div>
      <div class="modal-body">
        mall
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary ">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal" id="modal_exitoso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close close"></button>
      </div>
      <div class="modal-body">
        Biennn
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary ">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


