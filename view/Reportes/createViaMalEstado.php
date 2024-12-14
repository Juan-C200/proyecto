<!-- formulario -->
<div class="formularios mb-5">
    <form action="<?php echo getUrl("Reportes", "ViaMalEstado", "postCreate", false,"ajax");?>" method="POST" class="form-control p-4 formularios" enctype="multipart/form-data">

        <small class="text-warning">Complete los datos del formulario</small>

        <div class="mt-1">

            <div class="row mt-4 p-1">
                <div class="col-md-4 p-2 mb-4">
                    <label for="tipo_daño" class="form-label">Tipo de daño*</label>
                    <select name="tipo_daño" class="form-control" id="">
                        <option value="">Seleccione...</option>
                        <?php 
                            
                            foreach($tipos_daños as $tipo_daño){
                                if(isset($_SESSION['values']['Tipo de daño']) &&
                                    $_SESSION['values']['Tipo de daño'] == $tipo_daño['tipo_dano_id']){
                                    $selected="selected";
                                }else{
                                    $selected="";
                                }
                                
                                echo "<option value='".$tipo_daño['tipo_dano_id']."' ".$selected.">".$tipo_daño['tipo_dano_nombre']."</option>";
                            }    
                        
                        ?>
                        
                    </select>
                    <?php
                        if (isset($_SESSION['errores']['Tipo de daño'])) {
                            echo "<p class=' text-danger'>" . $_SESSION['errores']['Tipo de daño'] . "</p>";
                        }
                    ?>
                </div>
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
                        <textarea name="descripcion" rows="5" class="mt-3" cols="70" value="" ><?php echo isset($_SESSION['values']['Descripción']) ? htmlspecialchars($_SESSION['values']['Descripción']) : '';?></textarea>
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
<!-- finErrores -->
<!-- finFormulario -->
             