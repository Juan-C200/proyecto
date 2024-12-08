
<body class="pb-5">
    
        <div class="container" id="container">
            
            <div class="row mt-2 mb-2 p-4">
                <h1 class="text mb-1 mt-2">Solicitar</h1>
                <button class="categoria col-md-3 border rounded p-4 m-2 text-center btn btn-light" data-categoria="señal" data-formulario="formulario_señal">Señal nueva</button>
                <button class="categoria col-md-3 border rounded p-4 m-2 text-center btn btn-light" data-categoria="reductor" data-formulario="formulario_reductor">Reductor de velocidad nuevo</button>
            </div>
            <div class="formularios d-none mb-5" id="formulario_señal">
                <form action="<?php echo getUrl("Solicitudes", "SeñalNueva", "postCreate");?>" method="POST" class="form-control p-4" id="" enctype="multipart/form-data" data-formulario="formulario_señal">

                    <div class="row justify-content-center">
                        
                        <small class="text-warning">Complete los datos del formulario</small>
                        
                        
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
                                        
                                                echo '<button type="button" class="btn btn-light image-button col-md-2" name="tipo_señal"  value="'.$señal['tipo_senalizacion_id'].'">';
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
                                        foreach ($señales_horizontales as $señal) {
                                            // Verificar si la ruta de la imagen existe
                                            echo '<button type="button" class="btn btn-success image-button col-md-3" name="tipo_señal"  value="'.$señal['tipo_senalizacion_id'].'">';
                                                echo '<img src="' . $señal['tipo_senalizacion_ruta_img'] . '" alt="' . $señal['tipo_senalizacion_nombre'] . '" class="col-md-3">';
                                                echo '<p>' . $señal['tipo_senalizacion_nombre'] . '</p>';
                                                echo '</button>';
                                        }
                                    ?>
                                    
                                </div>
                                
                                
                            </div>
                            <?php
                                if (isset($_SESSION['errores']['Tipo de señal'])) {
                                    echo "<p class=' text-danger'>" . $_SESSION['errores']['Tipo de señal'] . "</p>";
                                }
                            ?>
                        </div>
                        <div class="">
                            <input type="hidden" name="tipo_señal" id="tipo_señal_seleccionada">
                        </div>
                        
                    </div>

                    <div class="mt-1">

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

                        <div class="col-md-3 p-1">
                            <label for="" class="form-label col-md-1 mt-2"><b>Descripcion</b></label>
                                <div class="col-md-12">
                                    <textarea name="descripcion" rows="5" class="mt-3" cols="70" value="" required><?php echo isset($_SESSION['values']['Descripción']) ? htmlspecialchars($_SESSION['values']['Descripción']) : '';?></textarea>
                                </div>
                            <?php
                                if (isset($_SESSION['errores']['Descripción'])) {
                                    echo "<p class=' text-danger'>" . $_SESSION['errores']['Descripción'] . "</p>";
                                }
                            ?>
                            
                        </div> 
                        <div class="col-md-12 mt-3">
                            <h7 for="foto" class="form-label"><b>Adjuntar imagen de la señal en mal estado</b></h7><br>
                            <input type="file" class="mt-3" id="foto" name="foto" accept=".jpg,.jpeg,.png" 
                            value="<?php echo isset($_SESSION['values']['Adjuntar imagen de la señal en mal estado']) ? htmlspecialchars($_SESSION['values']['Adjuntar imagen de la señal en mal estado']) : ''; ?>" required>
                            <?php
                                if (isset($_SESSION['errores']['Adjuntar imagen de la señal en mal estado'])) {
                                    echo "<p class=' text-danger'>" . $_SESSION['errores']['Adjuntar imagen de la señal en mal estado'] . "</p>";
                                }

                                unset($_SESSION['errores']);
                                unset($_SESSION['values']);
                            ?>
                        </div>
                                
                        <div class="col-md-12 mt-3">
                            <input type="submit" value="Enviar" class="btn btn-primary mt-3">
                        </div>
                </form>
                
            </div> 
            </div>

            <div class="formularios d-none" id="formulario_reductor">
                <form action="<?php echo getUrl("Solicitudes", "ReductorNuevo", "postCreate");?>" method="POST" class="form-control p-4" id="" enctype="multipart/form-data" data-formulario="formulario_reductor">

                    <div class="row justify-content-center">
                        
                        <small class="text-warning">Complete los datos del formulario</small>
                        
                        
                        <div class="row mt-2">
                            <button type="button" class="btn btn-primary col-md-3 border-1 rounded-1 boton_cambiar_tipo_reductor" data-panel="panel_reductor_estructural" id="boton_panel_reductor_estructural">Reductores estructurales</button>
                            <button type="button" class="btn btn-ligth col-md-3 ms-2 border-1 rounded-1 boton_cambiar_tipo_reductor" data-panel="panel_reductor_modular" id="boton_panel_reductor_modular">Reductores Modulares</button>
                            <button type="button" class="btn btn-ligth col-md-3 ms-2 border-1 rounded-1 boton_cambiar_tipo_reductor" data-panel="panel_reductor_señalizacion" id="boton_panel_reductor_señalizacion">Reductores de Señalizacion</button>
                        </div>
                        
                        <div class="box p-3 border rounded-3">
                            <div class=" p-1 col-md-12" id="panel_reductor_estructural">
                                <h5>Reductores estructurales</h5>                    
                                <div class="row gap-2">
                                    <?php
                                    
                                        // Iteramos sobre el array y generamos un botón por cada imagen
                                        foreach ($reductor_estructural as $reductor) {
                                            // Verificar si la ruta de la imagen existe
                                            echo '<button type="button" class="btn btn-light image-button col-md-2" name="tipo_reductor"  value="'.$reductor['tipo_reductor_id'].'">';
                                            echo '<img src="' . $reductor['tipo_reductor_ruta_img'] . '" alt="' . $reductor['tipo_reductor_nombre'] . '" class="col-md-3">';
                                            echo '<p>' . $reductor['tipo_reductor_nombre'] . '</p>';
                                            echo '</button>';      
                                        }
                                    ?>                                
                                </div>

                            </div>

                            <div class="cajaSeñales2 p-1 col-md-12 d-none" id="panel_reductor_modular">
                                <h5>Reductores modulares</h5>
                                
                                <div class="row gap-2">
                                <?php
                                        // Iteramos sobre el array y generamos un botón por cada imagen
                                        foreach ($reductor_modular as $reductor) {
                                            // Verificar si la ruta de la imagen existe
                                        
                                                echo '<button type="button" class="btn btn-light image-button col-md-2" name="tipo_reductor"  value="'.$reductor['tipo_reductor_id'].'">';
                                                echo '<img src="' . $reductor['tipo_reductor_ruta_img'] . '" alt="' . $reductor['tipo_reductor_nombre'] . '" class="col-md-3">';
                                                echo '<p>' . $reductor['tipo_reductor_nombre'] . '</p>';
                                                echo '</button>';   
                                        }
                                    ?> 
                                </div>
                                
                            
                            </div>

                            <?php
                                if (isset($_SESSION['errores']['Tipo de reductor'])) {
                                    echo "<p class=' text-danger'>" . $_SESSION['errores']['Tipo de reductor'] . "</p>";
                                }
                            ?>
                        </div>
                        
                        <input type="hidden" name="categoria_reductor" id="reductor_cat_seleccionada">
                        
                        
                    </div>

                    <div class="mt-1">

                        <div class="col-md-3 p-1">
                            <label for="tipo_daño" class="form-label mt-2"><b>Tipo de daño*</b></label>
                            <select type="text" class="form-control rounded-3" id="tipo_daño" name="tipo_daño">
                                <option value="">Seleccione...</option>
                                <option value="Masculino">Despintada</option>
                                <option value="Femenino">Vandalizada</option>
                                <option value="Femenino">Deformada</option>
                            </select>
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

                        <div class="col-md-3 p-1">
                            <label for="" class="form-label col-md-1 mt-2"><b>Descripcion</b></label>
                                <div class="col-md-12">
                                    <textarea name="descripcion" rows="5" class="mt-3" cols="70" value="" required><?php echo isset($_SESSION['values']['Descripción']) ? htmlspecialchars($_SESSION['values']['Descripción']) : '';?></textarea>
                                </div>
                            <?php
                                if (isset($_SESSION['errores']['Descripción'])) {
                                    echo "<p class=' text-danger'>" . $_SESSION['errores']['Descripción'] . "</p>";
                                }
                            ?>
                            
                        </div> 
                        <div class="col-md-12 mt-3">
                            <h7 for="foto" class="form-label"><b>Adjuntar imagen de la señal en mal estado</b></h7><br>
                            <input type="file" class="mt-3" id="foto" name="foto" accept=".jpg,.jpeg,.png" 
                            value="<?php echo isset($_SESSION['values']['Adjuntar imagen de la señal en mal estado']) ? htmlspecialchars($_SESSION['values']['Adjuntar imagen de la señal en mal estado']) : ''; ?>" required>
                            <?php
                                if (isset($_SESSION['errores']['Adjuntar imagen de la señal en mal estado'])) {
                                    echo "<p class=' text-danger'>" . $_SESSION['errores']['Adjuntar imagen de la señal en mal estado'] . "</p>";
                                }

                                unset($_SESSION['errores']);
                                unset($_SESSION['values']);
                            ?>
                        </div>
                                
                        <div class="col-md-12 mt-3">
                            <input type="submit" value="Enviar" class="btn btn-primary mt-3">
                        </div>
                    </div> 
                </form> 
            </div>  
        

        </div>           
                       
    </div>    
                    

      


    <div class="modal d-none" id="modal_solicitud_exitosa">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content text">
                <div class="modal-header">
                    <button type="button" class="btn-close close" id=""></button>
                </div>
                <div class="modal-body">
                
                    <h5>Solicitud exitosa</h5>
  
                </div>
            </div>
        </div>
    </div>

    <div class="modal d-none " id="modal_error">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content text">
                <div class="modal-header">
                    <h5>Error</h5>
                    <button type="button" class="btn-close close_error" id=""></button>
                </div>
                <div class="modal-body">
                    
                    <h5>Error</h5>
                    
                    
                </div>
            </div>
        </div>
    </div>
</body>
            