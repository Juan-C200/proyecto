<?php 
                                
    foreach($usuarios as $usu){
?>
<body class="bg-dark pb-5" >

    <div class="container pt-5" id="container">

        <form action="<?php echo getUrl("Usuarios", "Usuarios", "postUpdate"); ?> " method="POST" id="form_update">
            <input type="hidden" name="id" value=<?php echo $usu["usu_id"] ?>>
            <div class="row justify-content-center">
                <h3 class="text-center text-white mb-1 mt-1">Editar perfil</h3>

                <p class="text-white"><b>Los campos especificados con (*) son campos obligatorios.</p>

                <div class="boxDatos row border rounded-3 p-4">
                    <h4>Datos de identificación</h4>

                    <div class="col-md-3 p-2">
                        <label for="tipoDocumento" class="form-label text-white">Tipo Documento*</label>
                        <select type="text" class="form-control boxDatos rounded-5" id="tipoDocumento"
                            name="tipo_documento">
                            <option value="">Seleccione...</option>
                            <?php 
                                
                                foreach($tipos_documentos as $tipo_documento){
                                    if($usu['usu_tipo_docu'] == $tipo_documento['tipo_docu_id']){
                                        $selected="selected";
                                    }else{
                                        $selected="";
                                    }
                                    
                                    echo "<option value='".$tipo_documento['tipo_docu_id']."' ".$selected.">".$tipo_documento['tipo_docu_nombre']."</option>";
                                }    
                            ?>
                            
                        </select>

                        <?php
                        if (isset($_SESSION['errores']['tipo_documento'])) {
                            echo "<p class=' text-danger'>" . $_SESSION['errores']['tipo_documento'] . "</p>";
                        }
                        ?>
                    </div>

                    <div class="col-md-3 p-2">
                        <label for="numeroDocumento" class="form-label text-white">Numero Documento*</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="numeroDocumento"
                            name="numero_documento"
                            value="<?php echo $usu['usu_numero_docu']; ?>">

                        <?php
                        if (isset($_SESSION['errores']['numero_documento'])) {
                            echo "<p class='text-danger'>" . $_SESSION['errores']['numero_documento'] . "</p>";
                        }
                        ?>

                    </div>

                    <div class="col-md-3 p-2">
                        <label for="primer_nombre" class="form-label text-white">Primer Nombre*</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="primer_nombre"
                            name="primer_nombre"
                            value="<?php echo $usu['usu_nombre1']; ?>">

                        <?php
                        if (isset($_SESSION['errores']['primer_nombre'])) {
                            echo "<p class='text-danger'>" . $_SESSION['errores']['primer_nombre'] . "</p>";
                        }
                        ?>
                    </div>

                    <div class="col-md-3 p-2">
                        <label for="segundo_nombre" class="form-label text-white">Segundo Nombre</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="segundo_nombre"
                            name="segundo_nombre"
                            value="<?php echo $usu['usu_nombre2']; ?>">
                        <?php
                        if (isset($_SESSION['errores']['segundo_nombre'])) {
                            echo "<p class='text-danger'>" . $_SESSION['errores']['segundo_nombre'] . "</p>";
                        }
                        ?>

                    </div>

                    <div class="col-md-3 p-2">
                        <label for="primer_apellido" class="form-label text-white">Primer Apellido*</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="primer_apellido"
                            name="primer_apellido"
                            value="<?php echo $usu['usu_apellido1']; ?>">
                        <?php
                        if (isset($_SESSION['errores']['primer_apellido'])) {
                            echo "<p class='text-danger'>" . $_SESSION['errores']['primer_apellido'] . "</p>";
                        }
                        ?>

                    </div>

                    <div class="col-md-3 p-2">
                        <label for="segundo_apellido" class="form-label text-white col-md-8">Segundo Apellido</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="segundo_apellido"
                            name="segundo_apellido"
                            value="<?php echo $usu['usu_apellido2'];?>">
                        <?php
                        if (isset($_SESSION['errores']['segundo_apellido'])) {
                            echo "<p class='error text-danger'>" . $_SESSION['errores']['segundo_apellido'] . "</p>";
                        }
                        ?>

                    </div>

                    <div class="col-md-3 p-2">
                        <label for="segundo_apellido" class="form-label text-white">Genero*</label>
                        <select type="text" class="form-control boxDatos rounded-5" id="genero"
                            name="sexo">
                        <option value="">Seleccione...</option>

                        <?php 
                            $generos =array("Masculino","Femenino");
                            $id = 0;
                            foreach($generos as $genero){
                                if($usu['usu_genero'] == $genero){
                                    $selected="selected";
                                }else{
                                    $selected="";
                                }
                                $id++;
                                echo "<option value='".$genero."' ".$selected.">".$genero."</option>";
                            }    
                        
                        ?>
                        </select>
                        <?php
                        if (isset($_SESSION['errores']['sexo'])) {
                            echo "<p class='text-danger'>" . $_SESSION['errores']['sexo'] . "</p>";
                        }
                        ?>

                    </div>

                    <?php
                        if (isset($_SESSION['auth'])) {
                            if($_SESSION['rol_nombre'] == "Administrador"){
                                
                    ?>  

                                <div class="col-md-3 p-2">
                                    <label for="rol" class="form-label text-white">Rol*</label>
                                    <select type="text" class="form-control boxDatos rounded-5"
                                        name="rol_id">
                                    <?php 
                                        foreach($roles as $rol){
                                            if($usu['usu_rol'] == $tipo_documento['rol_id']){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            echo "<option value='".$rol['rol_id']."' ".$selected.">".$rol['rol_nombre']."</option>";
                                        }    
                                    ?>
                                    </select>
                                </div>

                                <div class="col-md-3 p-2">
                                    <label for="estado" class="form-label text-white">Estado*</label>
                                    <select type="text" class="form-control boxDatos rounded-5"
                                        name="est_id">
                                    <?php 
                                        foreach($estados as $estado){
                                            if($usu['usu_estado'] == $tipo_documento['est_id']){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            echo "<option value='".$estado['est_id']."' ".$selected.">".$estado['est_nombre']."</option>";
                                        }    
                                    ?>
                                    </select>
                                </div>

                    <?php     
                            }
                        }
                    ?>

                </div>

                
                <div class="boxDatos row border rounded-3 p-4 mt-4">
                    <h4>Datos de contacto</h4>

                    <div class="col-md-6">
                        <label for="correo" class="form-label text-white col-md-6">Correo*</label>
                        <input type="email" class="form-control boxDatos rounded-5" id="correo" name="correo"
                            value="<?php echo $usu['usu_correo'];?>">

                        <?php
                        if (isset($_SESSION['errores']['correo'])) {
                            echo "<p class='text-danger'>" . $_SESSION['errores']['correo'] . "</p>";
                        }
                        ?>
                    </div>

                    <div class="col-md-6">
                        <label for="telefono" class="form-label text-white col-md-8">Telefono o Celular*</label>
                        <input type="text" class="form-control boxDatos rounded-5" id="telefono"
                            name="telefono"
                            value="<?php echo $usu['usu_telefono'];?>">
                        <?php
                        if (isset($_SESSION['errores']['telefono'])) {
                            echo "<p class='text-danger'>" . $_SESSION['errores']['telefono'] . "</p>";
                        }
                        ?>

                    </div>

                    <div class="col">
                        <div class="row">
                            <h5 for="" class="form-label text-white pt-4">Dirección</h5>

                            <div class="col-md-4 p-2">
                                <label for="" class="form-label text-white">Tipo de vía*</label>
                                <select name="campo1" class="form-control boxDatos rounded-5" >
                                    <option value="">Seleccione...</option>

                                    <?php 
                                        $tipos_via = array("Calle","Carrera","Avenida","Transversal","Circular","Diagonal");

                                        $direccion =explode(" ",$usu['usu_direccion']);


                                        //sacar el primer numero de placa
                                        $posicion = count($direccion) - 3;
                                        $num_placa1 = $direccion[$posicion];

                                        //sacar el segundo numero de placa
                                        $posicion = count($direccion) - 1;
                                        $num_placa2 = $direccion[$posicion];
                                        
                                        
                                        for($i = 0; $i < count($tipos_via); $i++){
                                            if($direccion[0] == $tipos_via[$i]){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            
                                            echo "<option value='".$tipos_via[$i]."' ".$selected.">".$tipos_via[$i]."</option>";
                                        }    
                                    
                                    ?>
                                </select>
                            </div>
                            
                            <div class="col-md-4 p-2">
                                <label for="" class="form-label text-white">Nombre o número de vía*</label>
                                <input type="text" value="<?php echo $direccion[1];?>" name="campo2" class="form-control boxDatos rounded-5">
                            </div>

                            <div class="col-md-4 p-2">
                                <label for="" class="form-label text-white">Prefijo o cuadrante</label>
                                <select name="campo3" class="form-control boxDatos rounded-5" id="prefijo">
                                    <option value="">Seleccione...</option>

                                    <?php 
                                        echo var_dump($direccion);
                                        $prefijos = array("Norte","Sur","Este","Oeste");

                                        for($i = 0; $i < count($prefijos); $i++){
                                            if($direccion[2] == $prefijos[$i]){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            
                                            echo "<option value='".$prefijos[$i]."' ".$selected.">".$prefijos[$i]."</option>";
                                        }    
                                    
                                    ?>

                                </select>
                            </div>

                            <label for="" class="form-label text-white">Número de placa*</label>

                            <div class="col-md-1">
                                <h4 for="" class="form-label text-white m-1">#</h4>
                            </div>

                            <div class="col-md-3">
                                <input type="text" value="<?php echo $num_placa1;?>" name="campo4" class="form-control boxDatos rounded-5">
                            </div>

                            <div class="col-md-1">
                                <h4 for="" class="form-label text-white m-1">-</h4>
                            </div>

                            <div class="col-md-3">
                                <input type="text" value="<?php echo $num_placa2;?>" name="campo5" class="form-control boxDatos rounded-5">
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="button" class="btn btn-primary" id="boton_editar" value="Editar">Editar</button>
            </div>
        
    </div>
    
    
<?php 
                            
    }
?>

<!-- Modal -->
<div class="modal d-none" id="modal">
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
                    data-url="<?php echo getUrl("Usuarios", "Usuarios", "validatePassword"); ?>">
                    
                </div>
            </div>
        </form>
    </div>
    
</div>


   
    <script>
        // Función para alternar la visibilidad de la contraseña
        $('#toggle-password').click(function() {
            // Alternar entre tipo password y text
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

</body>

</html>