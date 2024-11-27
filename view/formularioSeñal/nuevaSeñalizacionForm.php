<?php
    
   $imagenesV = [
    ["ruta" => "../../web/assets/img/pare.png", "nombre" => "pare"],
    ["ruta" => "../../web/assets/img/ceda-el-paso.png", "nombre" => "ceda el paso"],
    ["ruta" => "../../web/assets/img/limite-velocidad.png", "nombre" => "limite de velocidad"],
    ["ruta" => "../../web/assets/img/girar.png", "nombre" => "vuelta prohibida"],
    ["ruta" => "../../web/assets/img/prohibido-estacionar.png", "nombre" => "prohibido estacionar"]
];
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text mb-1 mt-4">Reportar señal</h3>
            
            <div class="row mt-2 mb-2 p-4">
                <div class="col-md-3 border rounded p-4 text-center ms-1">Nueva señal</div>
            </div>
            
            <p class="text mt-1">Debe completar los datos del formulario para reportar una señal vial</p>
            
            <p class="text">Para ver el tipo de señal oprima una de las 2 opciones</p>
            
            <div class="row mt-2">
                <button type="button" class="btn-danger col-md-3 border-1 rounded-1">Señales Verticales</button>
                <button type="button" class="col-md-3 ms-2 border-1 rounded-1">Señales Horizontales</button>
            </div>
            
            <div class="box p-3 border rounded-3">
                <div class="cajaSeñales1 p-1 col-md-12">
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
                <div class="cajaSeñales2 p-1 col-md-12">
                    <h5>
                      Señales
                    </h5>
                    
                    
                    

                </div>
            </div>
            
        </div>

        <div class="mt-1">

            <form action="" method="POST" class="form-control p-4" enctype="multipart/form-data">
                <div class="col-md-3 p-1">
                <small class="text-warning">Complete los datos del formulario</small>
                    <label for="tipoDaño" class="form-label"><b>Tipo de daño</b></label>
                        <select type="text" class="form-control rounded-3" id="tipoDaño" name="tipoDaño">
                            <option value="">Seleccione...</option>
                            <option value="Masculino">Despintada</option>
                            <option value="Femenino">Vandalizada</option>
                            <option value="Femenino">Deformada</option>
                        </select>
                </div> 
                
                <div class="row mt-4 p-1">
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

                            <div class="col-md-12 mt-3">
                            <label for="fotoReductor" class="col-md-12 text-primary mb-1">adjuntar imagen</label>
                                <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png" required>
                            </div>

                        
            </form>
        </div>


    </div>    
