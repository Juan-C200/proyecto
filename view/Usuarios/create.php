<?php
    if(!isset($_SESSION['auth'])){
        include_once "../view/partials/head.php";
    }

?>



    <div class="container pt-5">

        <form action="<?php echo getUrl("Usuarios", "Usuarios", "postCreate",false,"ajax"); ?> " method="POST" id="registroForm">
            <div class="row justify-content-center">
                <h3 class="text-center  mb-1 mt-1">Registrar Usuario</h3>

                <p ><b>Los campos especificados con (*) son campos obligatorios.</p>

                <div class="boxDatos row border rounded-3 p-4">
                    <h4>Datos de identificación</h4>

                    <div class="col-md-3 p-2">
                        <label for="tipoDocumento" class="form-label text-white">Tipo de Documento*</label>
                        <select type="text" class="form-control inputDatos " id="tipoDocumento"
                            name="tipo_documento">
                            <option value="">Seleccione...</option>
                            <?php 
                                foreach($tipos_documentos as $tipo_documento){
                                    if(isset($_SESSION['values']['Tipo de documento']) &&
                                     $_SESSION['values']['Tipo de documento'] == $tipo_documento['tipo_docu_id']){
                                        $selected = "selected";
                                    }else{
                                        $selected = "";
                                    }
                                    echo "<option value='".$tipo_documento['tipo_docu_id']."' ".$selected." >".$tipo_documento['tipo_docu_codigo']." - ".$tipo_documento['tipo_docu_nombre']."</option>";
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
                        <label for="numeroDocumento" class="form-label text-white">Numero de documento*</label>
                        <input type="text" class="form-control inputDatos" id="numeroDocumento"
                            name="numero_documento"
                            value="<?php echo isset($_SESSION['values']['Numero de documento']) ? htmlspecialchars($_SESSION['values']['Numero de documento']) : '';?>" required>

                        <?php
                            if (isset($_SESSION['errores']['Numero de documento'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Numero de documento'] . "</p>";
                            }
                        ?>

                    </div>

                    <div class="col-md-3 p-2">
                        <label for="primer_nombre" class="form-label text-white">Primer nombre*</label>
                        <input type="text" class="form-control inputDatos" id="primer_nombre"
                            name="primer_nombre"
                            value="<?php echo isset($_SESSION['values']['Primer nombre']) ? htmlspecialchars($_SESSION['values']['Primer nombre']) : ''; ?>" required>

                        <?php
                            if (isset($_SESSION['errores']['Primer nombre'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Primer nombre'] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="col-md-3 p-2">
                        <label for="segundo_nombre" class="form-label text-white">Segundo nombre</label>
                        <input type="text" class="form-control inputDatos" id="segundo_nombre"
                            name="segundo_nombre"
                            value="<?php echo isset($_SESSION['values']['Segundo nombre']) ? htmlspecialchars($_SESSION['values']['Segundo nombre']) : ''; ?>">
                        
                        <?php
                            if (isset($_SESSION['errores']['Segundo nombre'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Segundo nombre'] . "</p>";
                            }
                        ?>

                    </div>

                    <div class="col-md-3 p-2">
                        <label for="primer_apellido" class="form-label text-white">Primer apellido*</label>
                        <input type="text" class="form-control inputDatos " id="primer_apellido"
                            name="primer_apellido"
                            value="<?php echo isset($_SESSION['values']['Primer apellido']) ? htmlspecialchars($_SESSION['values']['Primer apellido']) : ''; ?>" required>
                        
                        <?php
                            if (isset($_SESSION['errores']['Primer apellido'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Primer apellido'] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="col-md-3 p-2">
                        <label for="segundo_apellido" class="form-label text-white col-md-8">Segundo apellido</label>
                        <input type="text" class="form-control inputDatos " id="segundo_apellido"
                            name="segundo_apellido"
                            value="<?php echo isset($_SESSION['values']['Segundo apellido']) ? htmlspecialchars($_SESSION['values']['Segundo apellido']) : ''; ?>">
                        
                        <?php
                            if (isset($_SESSION['errores']['Segundo apellido'])) {
                                echo "<p class=' text-danger'>" . $_SESSION['errores']['Segundo apellido'] . "</p>";
                            }
                        ?>
                    </div>

                    <div class="col-md-3 p-2">
                        <label for="segundo_apellido" class="form-label text-white">Genero*</label>
                        <select type="text" class="form-control inputDatos " id="genero"
                            name="sexo">

                        <option value="">Seleccione...</option>
                        <?php 
                            $generos =array("Masculino","Femenino");
                            
                            foreach($generos as $genero){
                                if(isset($_SESSION['values']['Genero']) &&
                                    $_SESSION['values']['Genero'] == $genero){
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
                            if($_SESSION['rol_nombre'] == "Administrador"){                            
                    ?>  
                                <div class="col-md-3 p-2">
                                    <label for="rol" class="form-label text-white">Rol*</label>
                                    <select type="text" class="form-control inputDatos "
                                        name="rol_id">
                                    <?php 
                                        foreach($roles as $rol){
                                            if(isset($_SESSION['values']['Rol']) &&
                                                $_SESSION['values']['Rol'] == $rol){
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

                <div class="row mt-3 ms-0">
                    <div class="boxDatos row col-md-7 border  rounded-3 p-4 ">
                        <h4>Datos de contacto</h4>

                        <div class="col-md-6">
                            <label for="correo" class="form-label text-white">Correo*</label>
                            <input type="email" class="form-control inputDatos " id="correo" name="correo"
                                value="<?php echo isset($_SESSION['values']['Correo']) ? htmlspecialchars($_SESSION['values']['Correo']) : ''; ?>" required>

                            <?php
                                if (isset($_SESSION['errores']['Correo'])) {
                                    echo "<p class=' text-danger'>" . $_SESSION['errores']['Correo'] . "</p>";
                                }
                            ?>
                            
                        </div>

                        <div class="col-md-6">
                            <label for="celular" class="form-label text-white col-md-8">Celular*</label>
                            <input type="text" class="form-control inputDatos " id="celular"
                                name="celular"
                                value="<?php echo isset($_SESSION['values']['Celular']) ? htmlspecialchars($_SESSION['values']['Celular']) : ''; ?>" required>
                            
                            <?php
                                if (isset($_SESSION['errores']['Celular'])) {
                                    echo "<p class=' text-danger'>" . $_SESSION['errores']['Celular'] . "</p>";
                                }
                            ?>
                        </div>

                        <div class="col">
                            <div class="row">
                                <h5 for="" class="form-label text-white pt-4">Dirección</h5>

                                <div class="col-md-4 p-2">
                                    <label for="" class="form-label text-white">Tipo de vía*</label>
                                    <select name="campo1" class="form-control inputDatos " id="">
                                        <option value="">Seleccione...</option>
                                        <?php 
                                            $tipos_vias = array("Calle","Carrera","Avenida","Transversal","Circular","Diagonal");

                                            foreach($tipos_vias as $tipo_via){
                                                if(isset($_SESSION['values']['Tipo de vía']) &&
                                                    $_SESSION['values']['Tipo de vía'] == $tipo_via){
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
                                    <label for="" class="form-label text-white">Nombre o número de vía*</label>
                                    <input type="text" name="campo2" class="form-control inputDatos "
                                    value="<?php echo isset($_SESSION['values']['Nombre o numero de vía']) ? htmlspecialchars($_SESSION['values']['Nombre o numero de vía']) : ''; ?>" required>
                                    <?php
                                        if (isset($_SESSION['errores']['Nombre o numero de vía'])) {
                                            echo "<p class=' text-danger'>" . $_SESSION['errores']['Nombre o numero de vía'] . "</p>";
                                        }
                                    ?>
                                </div>

                                <div class="col-md-4 p-2">
                                    <label for="" class="form-label text-white">Prefijo o cuadrante</label>
                                    <select name="campo3" class="form-control inputDatos " id="">
                                        <option value="">Seleccione...</option>
                                        <?php 
                                            $prefijos = array("Norte","Sur","Este","Oeste");


                                            foreach($prefijos as $prefijo){
                                                if(isset($_SESSION['values']['Prefijo o cuadrante']) &&
                                                    $_SESSION['values']['Prefijo o cuadrante'] == $prefijo){
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
                                    <input type="text" name="campo4" class="form-control inputDatos "
                                    value="<?php echo isset($_SESSION['values']['Numero de placa #1']) ? htmlspecialchars($_SESSION['values']['Numero de placa #1']) : ''; ?>" required>
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
                                    <input type="text" name="campo5" class="form-control inputDatos "
                                    value="<?php echo isset($_SESSION['values']['Numero de placa #2']) ? htmlspecialchars($_SESSION['values']['Numero de placa #2']) : ''; ?>" required>
                                    <?php
                                        if (isset($_SESSION['errores']['Numero de placa #2'])) {
                                            echo "<p class=' text-danger'>" . $_SESSION['errores']['Numero de placa #2'] . "</p>";
                                        }
                                    ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="boxDatos col-md-5  border rounded-3 ms-4 p-4">
                        <h4>Datos de seguridad</h4>

                        <div class="col-md-12 p-2">


                            <label for="clave" class="form-label text-white">Contraseña*</label>
                            <div class="input-group">
                                <input type="password" class="form-control inputDatos" id="clave"
                                    name="contraseña" placeholder="Contraseña"
                                    value="<?php echo isset($_SESSION['values']['Contraseña']) ? htmlspecialchars($_SESSION['values']['Contraseña']) : ''; ?>" required><br>
                                <span class="input-group-text bg-transparent border-0" id="toggle-password"
                                    style="cursor: pointer;">
                                    <i class="fas fa-eye text-white" id="eye-icon"></i>
                                </span><br>
                                
                            </div>
                            <?php
                                if (isset($_SESSION['errores']['Contraseña'])) {
                                    echo "<p class=' text-danger'>" . $_SESSION['errores']['Contraseña'] . "</p>";
                                }
                            ?>

                        </div>

                        <div class="col-md-12 p-2">
                            <label for="clave2" class="form-label text-white ">Confirmar Contraseña*</label>

                            <div class="input-group">
                                <input type="password" class="form-control inputDatos" id="conf_clave"
                                    name="confContraseña" placeholder="Confirmar contraseña"
                                    value="<?php echo isset($_SESSION['values']['Confirmar contraseña']) ? htmlspecialchars($_SESSION['values']['Confirmar contraseña']) : ''; ?>" required>
                                <span class="input-group-text bg-transparent border-0" id="toggle-password2"
                                    style="cursor: pointer;">
                                    <i class="fas fa-eye text-white" id="eye-icon2"></i>
                                </span>
                                
                            </div>
                            <?php
                                    if (isset($_SESSION['errores']['Confirmar contraseña'])) {
                                        echo "<p class=' text-danger'>" . $_SESSION['errores']['Confirmar contraseña'] . "</p>";
                                    }

                            unset($_SESSION['errores']);
                            unset($_SESSION['values']);
                            ?>

                        </div>
                    </div>
                </div>


            </div>
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" class="btn btn-primary" value="Registrar"></input>
            </div>

        </form>
    </div>

    <?php
    if(!isset($_SESSION['auth'])){
        include_once "../view/partials/footer.php";
    }

    ?>
    <script>
        // Función para alternar la visibilidad de la contraseña
    $('#toggle-password').click(function() {
        
        var passwordField = $('#clave');
        var icon = $('#eye-icon');
        
        if (passwordField.attr('type') === 'password') {
            passwordField.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordField.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

        $('#toggle-password2').click(function() {
            var passwordField2 = $('#conf_clave');
            var icon2 = $('#eye-icon2');

            if (passwordField2.attr('type') === 'password') {
                passwordField2.attr('type', 'text');
                icon2.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField2.attr('type', 'password');
                icon2.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    </script>
    



</html>