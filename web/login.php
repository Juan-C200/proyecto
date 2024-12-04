<?php
    include_once '../lib/helpers.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>geovisor</title>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 bg-dark text-white">

    <div class="container">
        <div class="row justify-content-center">

                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <div class="box1 form-control p-5 mt-1 border rounded-3">
                        
                        
                        <h2 class="text-center text-white mb-4">Inicio Sesion</h2>    
                        <form action="<?php echo getUrl("Usuarios", "Usuarios", "login", false, "ajax"); ?>" method="post">

                            <div class="input-group mb-4">

                                <span class="input-group-text bg-transparent border-0"><i class="fas fa-user pb-3"></i></span>
                                <input type="text" class="primer-input form-control mb-3" name ="email" placeholder="Correo">
                            </div>        
                            
                            <div class="input-group mb-4">
                                <span class="input-group-text bg-transparent border-0"><i class="fas fa-lock"></i></span>
                                <input type="password" class="primer-input form-control" name="password" placeholder="Contraseña" id="clave" name="clave">
                                <span class="input-group-text bg-transparent" id="t-password" style="cursor: pointer;">
                                    <i class="fas fa-eye" id="eye-icon"></i>
                                </span>
                                
                            </div>
                            <?php
                                if(isset($_SESSION['errores'])){
                                    echo "<p>".$_SESSION['errores']."</p>";
                                }

                                unset($_SESSION['errores']);
                                    
                            ?>

                            <div class="text-center">
                                <input type="submit" value="Acceder" class="btn btn-acceder-submit mt-3"><br><br>
                                <a href="<?php echo getUrl("Usuarios", "Usuarios", "getCreate", false, "ajax");?>" target="_self" class="text-white">¿Ya tienes cuenta?      <b>Registrarse</a>
                            </div>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>
     
    <script>
    // Función para alternar la visibilidad de la contraseña
    $('#t-password').click(function() {
        
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
    </script>
    
</body>
</html>