



<body class="pb-5">


<form action="<?php echo getUrl("Señales", "SeñalMalEstado", "postCreate");?>" method="POST" class="form-control p-4" enctype="multipart/form-data">

    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text mb-1 mt-2">Reportar señal</h3>
            
            <div class="row mt-2 mb-2 p-4">
                <div class="col-md-3 border rounded p-4 text-center">Señal en mal estado</div>
            </div>
            
            <p class="text mt-1">Debe completar los datos del formulario para reportar una señal en mal estado</p>
            
            <p class="text">Para ver el tipo de señal oprima una de las 2 opciones</p>
            
            <div class="row mt-2">
                <button type="button" class="btn btn-primary col-md-3 border-1 rounded-1 boton_cambiar_tipo_señal" data-panel="panel_señal_vertical" id="boton_panel_señal_vertical">Señales Verticales</button>
                <button type="button" class="btn btn-ligth col-md-3 ms-2 border-1 rounded-1 boton_cambiar_tipo_señal" data-panel="panel_señal_horizontal" id="boton_panel_señal_horizontal">Señales Horizontales</button>
            </div>
            
            <div class="box p-3 border rounded-3">
                <div class=" p-1 col-md-12" id="panel_señal_vertical">
                    <h5>Señales Verticales</h5>                    
                    <div class="row gap-2">
                        <?php
                            // Iteramos sobre el array y generamos un botón por cada imagen
                            foreach ($señales_verticales as $señal) {
                                // Verificar si la ruta de la imagen existe
                               
                                    echo '<button type="button" class="btn btn-success image-button col-md-2" name="tipo_señal"  value="'.$señal['tipo_senalizacion_id'].'">';
                                    echo '<img src="' . $señal['tipo_senalizacion_ruta_img'] . '" alt="' . $señal['tipo_senalizacion_nombre'] . '" class="col-md-3">';
                                    echo '<p>' . $señal['tipo_senalizacion_nombre'] . '</p>';
                                    echo '</button>';
                                
                            }
                        ?>
                        
                    </div>

                </div>
                <div class="cajaSeñales2 p-1 col-md-12 d-none" id="panel_señal_horizontal">
                    <h5>
                      Señales Horizontales
                    </h5>
                    <div class="row gap-2">
                        <?php
                            // Iteramos sobre el array y generamos un botón por cada imagen
                            foreach ($señales_horizontales as $señal    ) {
                                // Verificar si la ruta de la imagen existe
                                echo '<button type="button" class="btn btn-success image-button col-md-2" name="tipo_señal"  value="'.$señal['tipo_senalizacion_id'].'">';
                                    echo '<img src="' . $señal['tipo_senalizacion_ruta_img'] . '" alt="' . $señal['tipo_senalizacion_nombre'] . '" class="col-md-3">';
                                    echo '<p>' . $señal['tipo_senalizacion_nombre'] . '</p>';
                                    echo '</button>';
                            }
                        ?>
                        
                    </div>
                    <input type="hidden" name="tipo_señal" id="tipo_señal_seleccionada" required>
                    
                </div>
                <?php
                    if (isset($_SESSION['errores']['Tipo de señal'])) {
                        echo "<p class=' text-danger'>" . $_SESSION['errores']['Tipo de señal'] . "</p>";
                    }
                ?>
            </div>
            
                
        </div>

        <div class="mt-1">

            <div class="col-md-3 p-1">
                <small class="text-warning">Complete los datos del formulario</small>
                <label for="tipo_daño" class="form-label"><b>Tipo de daño</b></label>
                <select type="text" class="form-control rounded-3" id="tipo_daño" name="tipo_daño">
                    <option value="">Seleccione...</option>
                    <?php 
                        foreach($tipos_daños as $tipo_daño){
                            if(isset($_SESSION['values']['Tipo de daño']) &&
                                     $_SESSION['values']['Tipo de daño'] == $tipo_daño['tipo_dano_id']){
                                $selected = "selected";
                            }else{
                                $selected = "";
                            }
                            echo "<option value='".$tipo_daño['tipo_dano_id']."'>".$tipo_daño['tipo_dano_nombre']."</option>";
                        }    
                    ?>
                </select>
                <?php
                    if (isset($_SESSION['errores']['Tipo de daño'])) {
                        echo "<p class=' text-danger'>" . $_SESSION['errores']['Tipo de daño'] . "</p>";
                    }
                ?>
            </div> 

            <div class="col-md-3 p-1">
                <label for="" class="form-label col-md-1 mt-2"><b>Descripcion</b></label>
                    <div class="col-md-12">
                        <textarea name="descripcion" rows="10" class="mt-3" cols="50" value="<?php echo isset($_SESSION['values']['Descripción']) ? htmlspecialchars($_SESSION['values']['Descripción']) : '';?>" required>Escribe una breve descripcion</textarea>
                    </div>
                <?php
                    if (isset($_SESSION['errores']['Descripción'])) {
                        echo "<p class=' text-danger'>" . $_SESSION['errores']['Descripción'] . "</p>";
                    }
                ?>
                
            </div> 
                
            <div class="row mt-4 p-1">
                <h7 for="direccion" class="form-label"><b>Dirección</b></h7>
                <div class="col-md-4 p-2">
                    <label for="" class="form-label">Tipo de vía*</label>
                    <select name="campo1" class="form-control" id="">
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
                    <label for="" class="form-label">Nombre o número de vía*</label>
                    <input type="text" name="campo2" class="form-control"
                    value="<?php echo isset($_SESSION['values']['Nombre o numero de vía']) ? htmlspecialchars($_SESSION['values']['Nombre o numero de vía']) : ''; ?>" required>
                    <?php
                        if (isset($_SESSION['errores']['Nombre o numero de vía'])) {
                            echo "<p class=' text-danger'>" . $_SESSION['errores']['Nombre o numero de vía'] . "</p>";
                        }
                    ?>
                </div>

                <div class="col-md-4 p-2">
                    <label for="" class="form-label">Prefijo o cuadrante</label>
                    <select name="campo3" class="form-control" id="">
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

                <label for="" class="form-label">Número de placa*</label>

                <div class="col-md-1">
                    <h5 for="" class="form-label m-1">#</h5>
                </div>

                <div class="col-md-3">
                    <input type="text" name="campo4" class="form-control"
                    value="<?php echo isset($_SESSION['values']['Numero de placa #1']) ? htmlspecialchars($_SESSION['values']['Numero de placa #1']) : ''; ?>" required>
                    <?php
                        if (isset($_SESSION['errores']['Numero de placa #1'])) {
                            echo "<p class=' text-danger'>" . $_SESSION['errores']['Numero de placa #1'] . "</p>";
                        }
                    ?>
                </div>

                <div class="col-md-1">
                    <h5 for="" class="form-label m-1">-</h5>
                </div>

                <div class="col-md-3">
                    <input type="text" name="campo5" class="form-control"
                    value="<?php echo isset($_SESSION['values']['Numero de placa #2']) ? htmlspecialchars($_SESSION['values']['Numero de placa #2']) : ''; ?>" required>
                    <?php
                        if (isset($_SESSION['errores']['Numero de placa #2'])) {
                            echo "<p class=' text-danger'>" . $_SESSION['errores']['Numero de placa #2'] . "</p>";
                        }
                    ?>
                </div>
            </div>
            
        </div> 
        <div class="row mt-4 p-1">
            <div class="col-md-12 mt-3">
                <h7 for="foto" class="form-label"><b>Adjuntar imagen de la señal en mal estado</b></h7><br>
                <input type="file" class="mt-3" id="foto" name="foto" accept=".jpg,.jpeg,.png" required>
                <?php
                    if (isset($_SESSION['errores']['Adjuntar imagen de la señal en mal estado'])) {
                        echo "<p class=' text-danger'>" . $_SESSION['errores']['Adjuntar imagen de la señal en mal estado'] . "</p>";
                    }
                ?>
            </div>
            <div class="col-md-12 mt-3">
                <input type="submit" value="Enviar" class="btn btn-primary mt-3">
            </div>
        </div>   
    </div>                   
                       
                        
</form>
</body>
          