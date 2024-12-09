<body style="background-color:#f2f4f7;">
    
<div class="mb-2 p-4">
<h1 class="mt-3 mb-3">Reporte de accidente</h1>
    <form action="" class=" bg-transparent" method="post">
        <div class="row border rounded-3 p-4 bg-white">

            <div class="col-md-5">
                <label for="lugar_accidente"><b>Lugar del accidente</b></label>
                <input type="text" class="form-control rounded-3" id="lugar_accidente" name="lugar_accidente">
                <small class="text-warning">ingrese el barrio donde se presento el accidente</small>
            </div>

            <div class="col-md-5">
                <label for="gravedad"><b>Gravedad</b></label>
                <select type="text" class="form-control rounded-3" id="gravedad" name="gravedad">
                    <option value="">Seleccione...</option>
                    <option value="">Fallecidos</option>
                    <option value="">Heridos</option>
                    <option value="">Fallecidos y heridos</option>
                    <option value="">Solo daños</option>
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

        </div>

        <div>

        <div class="row mt-2 border p-4 bg-white border rounded-3">
            <div class="col-md-5">
                <label for="clase_accidente"><b>Clase de accidente</b></label>
                <select name="clase_accidente" class="form-control rounded-3" id="clase_accidente">
                    <?php

                    ?>

                </select>
            </div>

            <div class="col-md-5">
                <label for="choque_con"><b>Choque con</b></label>
                <select name="choque_con" class="form-control rounded-3" id="choque_con">
                    <option value="">Seleccione...</option>
                    <option value="">Vehiculo estacionado</option>
                    <option value="">Semaforo</option>
                    <option value="">Arbol</option>
                    <option value="">Poste</option>
                    <option value="">Inmueble</option>
                    <option value="">Muro</option>
                    <option value="">Caseta</option>
                    <option value="">Tarima</option>
                    <option value="">Otro</option>
                </select>
            </div>

          <div class="row mt-4">
            <div class="col-md-4">
                <label for="caracteristica_lugar" class="mt-3"><b>Caracterisitica del lugar</b></label>
                <div class="col-md-6">
                    <textarea name="caracteristica_lugar" rows="5" class="mt-3" cols="30" value="" required>aqui va el sector, condicion del clima etc</textarea>
                </div>
                
            </div>

            <div class="col-md-4">
                <label for="caracteristica_vias" class="mt-3"><b>Caracterisitica de la via</b></label>
                <div class="col-md-6">
                    <textarea name="caracteristica_vias" rows="5" class="mt-3 " cols="30" value="" required>describa la condicion de la via</textarea>
                </div>
                
            </div>

            <div class="col-md-4">
                <label for="datos_vehiculo" class="mt-3"><b>Datos de Vehiculo(s)</b></label>
                <div class="col-md-6">
                    <textarea name="datos_vehiculo" rows="5" class="mt-3 " cols="30" value="" required>describa la condicion de la via</textarea>
                </div>
                
            </div>
          </div>
        </div>  

        <div class="row mt-2 border p-4 justify-content-center bg-white border rounded-3">
            <div class="col-md-4">
                    <label for="hipotesis" class=""><b>Hipotesis</b></label>
                    <select name="hipotesis" class="form-control rounded-3" id="">
                        <option value="">Seleccione...</option>
                        <option value="">Pasarse semaforo en rojo</option>
                        <option value="">Exceso de velocidad</option>
                        <option value="">Embriaguez</option>
                        <option value="">Vehiculo defectuoso</option>
                    </select>     
            </div>

            <div class="col-md-4">
               <label for="victimas_accidente"><b>Numero de victimas</b></label> 
                <select name="victimas_accidente" class="form-control rounded-3" id="">
                    <option value="">Seleccione...</option>
                    <option value="">sin victimas</option>
                    <option value="">Entre 1 - 3</option>
                    <option value="">4 o más</option>
                </select> 
            </div>

            <div class="col-md-4">
               <label for="detalle_involucrados"><b>Detalle involucrados</b></label> 
                <select name="detalle_involucrados" class="form-control rounded-3" id="">
                    <option value="">Seleccione...</option>
                    <option value="">carro-carro</option>
                    <option value="">carro-moto</option>
                    <option value="">carro-persona</option>
                </select> 
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
            </div> 

        </div>    

        <div class="d-flex justify-content-center mt-3">
                <input type="submit" class="btn btn-primary" value="Enviar"></input>
        </div>

    </form>
</body>
    








