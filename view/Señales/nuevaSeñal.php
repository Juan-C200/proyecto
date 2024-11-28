<?php
  $imagenesV = [
   ["ruta" => "../../web/assets/img/pare.png", "nombre" => "alto"],
   ["ruta" => "../../web/assets/img/limite-velocidad.png", "nombre" => "velocidad maxima"],
   ["ruta" => "../../web/assets/img/ceda-el-paso.png", "nombre" => "ceda el paso"],
   ["ruta" => "../../web/assets/img/girar.png", "nombre" => "prohibido girar"],
   ["ruta" => "../../web/assets/img/prohibido-estacionar.png", "nombre" => "prohibido estacionar"],
   ["ruta" => "../../web/assets/img/pare.png", "nombre" => "prohibido el paso"],
   ["ruta" => "../../web/assets/img/ceda-el-paso.png", "nombre" => "hospital"],
   ["ruta" => "../../web/assets/img/limite-velocidad.png", "nombre" => "zona escolar"],
   ["ruta" => "../../web/assets/img/girar.png", "nombre" => "paradero autobus"],
   ["ruta" => "../../web/assets/img/prohibido-estacionar.png", "nombre" => "direccion unica"],
   ["ruta" => "../../web/assets/img/pare.png", "nombre" => "calle sin salida"],
   ["ruta" => "../../web/assets/img/ceda-el-paso.png", "nombre" => "curva peligrosa"],
   ["ruta" => "../../web/assets/img/limite-velocidad.png", "nombre" => "reduccion de carril"],
   ["ruta" => "../../web/assets/img/girar.png", "nombre" => "pendiente pronunciada"],
   ["ruta" => "../../web/assets/img/prohibido-estacionar.png", "nombre" => "cruce de peatones"]
   
];

 $imagenesH=[
   ["ruta" => "../../web/assets/img/limite-velocidad.png", "nombre" => "lineas continuas"],
   ["ruta" => "../../web/assets/img/girar.png", "nombre" => "lineas discontinuas"],
   ["ruta" => "../../web/assets/img/prohibido-estacionar.png", "nombre" => "lineas paso peaton"]
 ];
 ?>


<body clas="bg-dark">
    

<form action="<?php echo getUrl("SeñalizacionVial", "SeñalNueva", "postCreate");?>" method="POST" class="form-control p-4" enctype="multipart/form-data">

    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text mb-1 mt-2">Reportar señal</h3>
            
            <div class="row mt-2 mb-2 p-4">
                <div class="col-md-3 border rounded p-4 text-center ms-1">Nueva señal</div>
            </div>
            
            <p class="text-danger mt-1">Debe completar los datos del formulario para reportar una señal vial</p>
            
            <p class="text">Para ver el tipo de señal oprima una de las 2 opciones</p>
            
            <div class="row mt-2">
                <button type="button" class="btn btn-primary col-md-3 border-1 rounded-1 boton_cambiar_panel1" data-panel="panel_vertical">Señales Verticales</button>
                <button type="button" class="col-md-3 ms-2 border-1 rounded-1 boton_cambiar_panel1" data-panel="panel_horizontal">Señales Horizontales</button>
            </div>
            
            <div class="box p-3 border rounded-3">
                <div class="cajaSeñales3 p-1 col-md-12" id="panel_vertical">
                    <h5>Señales</h5>                    
                    <div class="row gap-2">
                        <?php
                            // Iteramos sobre el array y generamos un botón por cada imagen
                            foreach ($imagenesV as $imagen) {
                                // Verificar si la ruta de la imagen existe
                                if (file_exists($imagen['ruta'])) {
                                    echo '<button class="image-button col-md-2">';
                                    echo '<img src="' . $imagen['ruta'] . '" alt="' . $imagen['nombre'] . '" class="col-md-3">';
                                    echo '<p>' . $imagen['nombre'] . '</p>';
                                    echo '</button>';
                                } else {
                                    // Mostrar un mensaje si la imagen no se encuentra
                                    echo '<button class="image-button col-md-3">';
                                    echo '<img src="default-image.jpg" alt="Imagen no encontrada"">'; // Imagen predeterminada
                                    echo '<p>' . $imagen['nombre'] . '</p>';
                                    echo '</button>';
                                }
                            }
                        ?>
                    </div>
                    
                  

                    
                </div>
                <div class="cajaSeñales4 p-1 col-md-12 d-none" id="panel_horizontal">
                    <h5>
                      Señales
                    </h5>
                    <div class="row gap-2">
                        <?php
                            // Iteramos sobre el array y generamos un botón por cada imagen
                            foreach ($imagenesH as $imagenh) {
                                // Verificar si la ruta de la imagen existe
                                if (file_exists($imagenh['ruta'])) {
                                    echo '<button type="button" class="image-button col-md-2" name="tipo_Señal" value="' . $imagenh['nombre'] . '" id="btn_img">';
                                    echo '<img src="' . $imagenh['ruta'] . '" alt="' . $imagenh['nombre'] . '" class="col-md-3">';
                                    echo '<p>' . $imagenh['nombre'] . '</p>';
                                    echo '</button>';
                                } else {
                                    // Mostrar un mensaje si la imagen no se encuentra
                                    echo '<button type="button" class="image-button col-md-3">';
                                    echo '<img src="default-image.jpg" alt="Imagen no encontrada"">'; // Imagen predeterminada
                                    echo '<p>' . $imagenh['nombre'] . '</p>';
                                    echo '</button>';
                                }
                            }
                        ?>
                        
                    </div>
                    
                    
                    

                </div>
            </div>
            
        </div>

        <div class="mt-2">

                <div class="col-md-3 p-1 mt-2">
                <small class="text-warning">Complete los datos del formulario</small>
                    
                </div> 
                
                <div class="row mt-1 p-1">
                    <h7 for="direccion" class="form-label"><b>Dirección o ubicacion</b></h7>
                            <label for="" class="form-label col-md-2">Tipo de vía*
                                <div class="col-md-10">
                                    <select name="campo1" class="form-control boxDatos rounded-3" id="">
                                        <option value="">Seleccione...</option>
                                        <option value="Calle">Calle</option>
                                        <option value="Carrera">Carrera</option>
                                        <option value="Avenida">Avenida</option>
                                        <option value="Transversal">Transversal</option>
                                        <option value="Circular">Circular</option>
                                        <option value="Diagonal">Diagonal</option>
                                    </select>
                                </div>
                            </label>
                                
                                <label for="" class="form-label col-md-2">número de vía*
                                    <div class="col-md-4 ms-2">
                                        <input type="text" name="campo2" class="form-control rounded-3">
                                    </div>
                                </label>
                                

                                <label for="" class="form-label col-md-2">Prefijo o cuadrante
                                    <div class="col-md-12">
                                        <select name="campo3" class="form-control rounded-3" id="">
                                            <option value="">Seleccione...</option>
                                            <option value="Calle ">Norte</option>
                                            <option value="Carrera ">Sur</option>
                                            <option value="Avenida ">Este</option>
                                            <option value="Transversal ">Oeste</option>
                                        </select>
                                    </div>
                                </label>

                                <label for="" class="form-label col-md-2">Número de placa*
                                    <div class="col-md-1">
                                        <h4 for="" class="form-label m-1 ms-5">#</h4>
                                    </div>
                                </label>

                                <label for="" class="form-label col-md-1 text-white">t
                                    <div class="col-md-9">
                                        <input type="text" name="campo4" class="form-control rounded-3">
                                    </div>
                                </label>
                                
                                <label for="" class="form-label col-md-1 "><br>
                                    <div class="col-md-1">
                                        <label for="" class="ms-3">__</label>
                                    </div>
                                </label>

                                <label for="" class="form-label col-md-1 text-white">t 
                                    <div class="col-md-9">
                                        <input type="text" name="campo5" class="form-control rounded-3">
                                    </div>
                                </label>
                            </div>
                            
                            <div class="col-md-12">
                                    <input type="text" name="campo6" class="form-control rounded-3">
                            </div>
                            <?php
                                if (isset($_SESSION['errores']['direccion'])) {
                                    echo "<small class='text-danger'>" . $_SESSION['errores']['direccion'] . "</small>";
                                }
                            ?>

                            <div class="col-md-12 mt-3">
                            <label for="fotoReductor" class="col-md-12 text-primary mb-1">adjuntar imagen</label>
                                <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png" required>
                            </div>
                            <input type="submit" value="enviar" class="btn btn-primary mt-3">

                        
                        </div>
                        
                        
                    </div>    
                </form>
    </body>
