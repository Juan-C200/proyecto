<body class="bg-dark pb-5">

    <div class="container pt-5">

        <form action="<?php echo getUrl("Usuarios", "Usuarios", "postCreate"); ?> " method="POST" id="registroForm">
            <div class="row justify-content-center">
                <h3 class="text-center text-white mb-1 mt-1">Registrar Usuario</h3>

                <p class="text-white"><b>Los campos especificados con (*) son campos obligatorios.</p>

                <div class="boxDatos row border rounded-3 p-4">
                    <h4>Datos de identificación</h4>

                    <div class="col-md-3 p-2">
                        <label for="tipoDocumento" class="form-label text-white">Tipo Documento*</label>
                        <select type="text" class="form-control boxDatos rounded-5" id="tipoDocumento"
                            name="tipo_documento">
                            <option value="">Seleccione...</option>
                            <option value="Cedula de ciudadania">Cedula de ciudadania</option>
                            <option value="Cedula de extranjeria">Cedula de extranjeria</option>
                            <option value="Pasaporte">Pasaporte</option>
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
                            value="<?php echo isset($_POST['numero_documento']) ? htmlspecialchars($_POST['numero_documento']) : ''; ?>">

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
                            value="<?php echo isset($_POST['primer_nombre']) ? htmlspecialchars($_POST['primer_nombre']) : ''; ?>">

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
                            value="<?php echo isset($_POST['segundo_nombre']) ? htmlspecialchars($_POST['segundo_nombre']) : ''; ?>">
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
                            value="<?php echo isset($_POST['primer_apellido']) ? htmlspecialchars($_POST['primer_apellido']) : ''; ?>">
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
                            value="<?php echo isset($_POST['segundo_apellido']) ? htmlspecialchars($_POST['segundo_apellido']) : ''; ?>">
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
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        </select>
                        <?php
                        if (isset($_SESSION['errores']['sexo'])) {
                            echo "<p class='text-danger'>" . $_SESSION['errores']['sexo'] . "</p>";
                        }
                        ?>

                    </div>
                </div>

                <div class="row mt-3 ms-0">
                    <div class="boxDatos row col-md-7 border  rounded-3 p-4 ">
                        <h4>Datos de contacto</h4>

                        <div class="col-md-6">
                            <label for="correo" class="form-label text-white col-md-6">Correo*</label>
                            <input type="email" class="form-control boxDatos rounded-5" id="correo" name="correo"
                                value="<?php echo isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : ''; ?>">

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
                                value="<?php echo isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : ''; ?>">
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
                                    <select name="campo1" class="form-control boxDatos rounded-5" id="">
                                        <option value="">Seleccione...</option>
                                        <option value="Calle">Calle</option>
                                        <option value="Carrera">Carrera</option>
                                        <option value="Avenida">Avenida</option>
                                        <option value="Transversal">Transversal</option>
                                        <option value="Circular">Circular</option>
                                        <option value="Diagonal">Diagonal</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-4 p-2">
                                    <label for="" class="form-label text-white">Nombre o número de vía*</label>
                                    <input type="text" name="campo2" class="form-control boxDatos rounded-5">
                                </div>

                                <div class="col-md-4 p-2">
                                    <label for="" class="form-label text-white">Prefijo o cuadrante</label>
                                    <select name="campo3" class="form-control boxDatos rounded-5" id="">
                                        <option value="">Seleccione...</option>
                                        <option value="Calle ">Norte</option>
                                        <option value="Carrera ">Sur</option>
                                        <option value="Avenida ">Este</option>
                                        <option value="Transversal ">Oeste</option>
                                    </select>
                                </div>

                                <label for="" class="form-label text-white">Número de placa*</label>

                                <div class="col-md-1">
                                    <h4 for="" class="form-label text-white m-1">#</h4>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" name="campo4" class="form-control boxDatos rounded-5">
                                </div>

                                <div class="col-md-1">
                                    <h4 for="" class="form-label text-white m-1">-</h4>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" name="campo5" class="form-control boxDatos rounded-5">
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="boxDatos col-md-5  border rounded-3 ms-4 p-4">
                        <h4>Datos de seguridad</h4>

                        <div class="col-md-12 p-2">


                            <label for="clave" class="form-label text-white">Contraseña*</label>
                            <div class="input-group">
                                <input type="password" class="form-control boxDatos rounded-5 " id="clave"
                                    name="contraseña" placeholder="Contraseña"></input><br>
                                <span class="input-group-text bg-transparent border-0" id="toggle-password2"
                                    style="cursor: pointer;">
                                    <i class="fas fa-eye text-white" id="eye-icon2"></i>
                                </span><br>
                                <?php
                                if (isset($_SESSION['errores']['contraseña'])) {
                                    echo "<p class='text-danger'>" . $_SESSION['errores']['contraseña'] . "</p>";
                                }
                                ?>
                            </div>

                        </div>

                        <div class="col-md-12 p-2">
                            <label for="clave2" class="form-label text-white ">Confirmar Contraseña*</label>

                            <div class="input-group">
                                <input type="password" class="form-control boxDatos rounded-5" id="conf_clave"
                                    name="confContraseña" placeholder="Confirmar contraseña">
                                <span class="input-group-text bg-transparent border-0" id="toggle-password2"
                                    style="cursor: pointer;">
                                    <i class="fas fa-eye text-white" id="eye-icon2"></i>
                                </span>
                                <?php
                                if (isset($_SESSION['errores']['confContraseña'])) {
                                    echo "<p class='text-danger'>" . $_SESSION['errores']['confContraseña'] . "</p>";
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" class="btn btn-success" value="Registrar"></input>
            </div>

        </form>
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