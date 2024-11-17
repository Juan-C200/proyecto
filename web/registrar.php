<?php

require_once '../controller/acceso/ValidacionController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validacionController = new ValidacionController();
    $validacionController->checkForm();
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/registrar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>geovisor</title>
</head>
<body>
    
    <div class="container">
   
    <form action="" method="POST" id="registroForm">
       <div class="row justify-content-center">
         <h3 class="text-center text-white mb-1 mt-1">Registro Usuario</h3>
         
              <p class="text-white"><b>Los campos especificados con(*) son campos obligatorios</p>
         
          <div class="boxDatos row border rounded-3">
             <h4>Datos de indentificacion</h4>
             
             <div class="col-md-6 p-2">
                 <label for="tipoDocumento" class="form-label text-white col-md-4">Tipo Documento*</label>
                 <input type="text" class="form-control boxDatos mb-3 rounded-5" id="tipoDocumento" name="tipo_documento" value="<?php echo isset($_POST['tipo_documento']) ? htmlspecialchars($_POST['tipo_documento']) : ''; ?>">

                 <?php if (isset($_SESSION['errores']['usuarioTD'])): ?>
                     <p class="error text-danger"><?php echo $_SESSION['errores']['usuarioTD']; ?></p>
                 <?php endif; ?>
             </div>
          
             <div class="col-md-6 p-2">
                 <label for="numeroDocumento" class="form-label text-white col-md-4">Numero Documento*</label>
                 <input type="text" class="form-control boxDatos mb-3 rounded-5" id="numeroDocumento" name="numero_documento" value="<?php echo isset($_POST['numero_documento']) ? htmlspecialchars($_POST['numero_documento']) : ''; ?>">
                 
                 <?php if (isset($_SESSION['errores']['usuarioND'])): ?>
                     <p class="error text-danger"><?php echo $_SESSION['errores']['usuarioND']; ?></p>
                 <?php endif; ?>
             </div>
          
             <div class="col-md-3 p-2">
                 <label for="primer_nombre" class="form-label text-white col-md-6">Primer Nombre*</label>
                 <input type="text" class="form-control boxDatos mb-3 rounded-5" id="primer_nombre" name="primer_nombre" value="<?php echo isset($_POST['primer_nombre']) ? htmlspecialchars($_POST['primer_nombre']) : ''; ?>">
                 
                 <?php if (isset($_SESSION['errores']['Nombre1'])): ?>
                     <p class="error text-danger"><?php echo $_SESSION['errores']['Nombre1']; ?></p>
                 <?php endif; ?>
             </div>
          
             <div class="col-md-3 p-2">
                 <label for="segundo_nombre" class="form-label text-white col-md-6">Segundo Nombre</label>
                 <input type="text" class="form-control boxDatos mb-3 rounded-5" id="segundo_nombre" name="segundo_nombre" value="<?php echo isset($_POST['segundo_nombre']) ? htmlspecialchars($_POST['segundo_nombre']) : ''; ?>">
                 
                 <?php if (isset($_SESSION['errores']['Nombre2'])): ?>
                     <p class="error text-danger"><?php echo $_SESSION['errores']['Nombre2']; ?></p>
                 <?php endif; ?>
             </div>
          
             <div class="col-md-3 p-2">
                 <label for="primer_apellido" class="form-label text-white col-md-6">Primer Apellido*</label>
                 <input type="text" class="form-control boxDatos mb-3 rounded-5" id="primer_apellido" name="primer_apellido" value="<?php echo isset($_POST['primer_apellido']) ? htmlspecialchars($_POST['primer_apellido']) : ''; ?>">
                 
                 <?php if (isset($_SESSION['errores']['Apellido1'])): ?>
                     <p class="error text-danger"><?php echo $_SESSION['errores']['Apellido1']; ?></p>
                 <?php endif; ?>
             </div>
          
             <div class="col-md-3 p-2">
                 <label for="segundo_apellido" class="form-label text-white col-md-6">Segundo Apellido</label>
                 <input type="text" class="form-control boxDatos mb-3 rounded-5" id="segundo_apellido" name="segundo_apellido" value="<?php echo isset($_POST['segundo_apellido']) ? htmlspecialchars($_POST['segundo_apellido']) : ''; ?>">
                 
                 <?php if (isset($_SESSION['errores']['Apellido2'])): ?>
                     <p class="error text-danger"><?php echo $_SESSION['errores']['Apellido2']; ?></p>
                 <?php endif; ?>
             </div>
        </div>

        <div class="row mt-1 ms-0">
            <div class="boxDatos row col-md-7 border  rounded-3">
                 <h4>Datos de contacto</h4>
                 
                 <div class="col-md-6">
                     <label for="correo" class="form-label text-white col-md-6">Correo*</label>
                     <input type="email" class="form-control boxDatos mb-3 rounded-5" id="correo" name="correo" value="<?php echo isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : ''; ?>">
                     
                     <?php if (isset($_SESSION['errores']['correo'])): ?>
                         <p class="error text-danger"><?php echo $_SESSION['errores']['correo']; ?></p>
                     <?php endif; ?>
                 </div>

                 <div class="col-md-6">
                     <label for="telefono" class="form-label text-white col-md-6">Telefono o Celular*</label>
                     <input type="text" class="form-control boxDatos mb-3 rounded-5" id="telefono" name="telefono" value="<?php echo isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : ''; ?>">
                     
                     <?php if (isset($_SESSION['errores']['telefono'])): ?>
                         <p class="error text-danger"><?php echo $_SESSION['errores']['telefono']; ?></p>
                     <?php endif; ?>
                 </div>

                 <div class="col">
                     <div class="row">
                         <label for="" class="form-label text-white col-md-12">Direccion*</label>
                         <label for="" class="form-label text-white col-md-1">crra</label>
                         <input type="text" class="boxDatos col-md-1 mb-3 rounded-2" placeholder="13">
                         <input type="text" class="boxDatos ms-1 col-md-1 mb-3 rounded-2" placeholder="B">
                         <input type="text" class="boxDatos ms-1 col-md-1 mb-3 rounded-2" placeholder="bis">
                         <label for="" class="form-label text-white col-md-1">#</label>
                         <input type="text" class="boxDatos col-md-1 mb-3 rounded-2" placeholder="72">
                         <input type="text" class="boxDatos  col-md-1 mb-3 rounded-2" placeholder="A">
                         <label for="" class="form-label text-white col-md-1">-</label>
                         <input type="text" class="boxDatos col-md-1 mb-3 rounded-2" placeholder="104">
                         <input type="text" class="form-control boxDatos mb-3 rounded-5" placeholder="">
                      </div>
                  </div>
              </div>
            
             <div class="boxDatos col-md-5  border rounded-3 ms-4">
                 <h4>Datos de seguridad</h4>
            
                 <div class="col-md-10 p-2">
                     <label for="clave" class="form-label text-white col-md-5">Contraseña*</label>
                     <div class="input-group">
                    <input type="password" class="form-control boxDatos mb-3 rounded-5" id="clave" name="clave" placeholder="Contraseña">
                    <span class="input-group-text bg-transparent border-0" id="toggle-password" style="cursor: pointer;">
                        <i class="fas fa-eye" id="eye-icon"></i>
                    </span>
                </div>
                     <?php if (isset($_SESSION['errores']['clave'])): ?>
                         <p class="error text-danger"><?php echo $_SESSION['errores']['clave']; ?></p>
                     <?php endif; ?>
                 </div>
            
                 <div class="col-md-12 p-2">
                     <label for="clave2" class="form-label text-white col-md-5">Confirmar Contraseña*</label>
                    
                     <div class="input-group">
                    <input type="password" class="form-control boxDatos mb-3 rounded-5" id="conf_clave" name="confClave" placeholder="Confirmar contraseña">
                    <span class="input-group-text bg-transparent border-0" id="toggle-password2" style="cursor: pointer;">
                        <i class="fas fa-eye" id="eye-icon2"></i>
                    </span>
                </div>
                     <?php if (isset($_SESSION['errores']['clave2'])): ?>
                         <p class="error text-danger"><?php echo $_SESSION['errores']['clave2']; ?></p>
                     <?php endif; ?>
                 </div>
              </div>
          </div>

          <div class="d-flex justify-content-center mt-3">
              <button type="submit" class="btn btn-outline-success text-center">Registrar</button>
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