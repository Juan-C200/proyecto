<body>
   <form action="<?php echo getUrl("PQRS", "PQRS", "postCreate", null, "ajax"); ?>"  method="POST">
        <div class="row border rounded-3 bg-white mt-4 pb-4">
            <div class="col-12 md-12 mt-4">
                <h2>Informacion del PQRS</h2>
            </div>
            <div class="col-12 md-6 mt-4">

                <select class="form-control" name="tipoPQRS" id="tpPQRS">
                    <option value="">Seleccione un tipo de PQRS...</option>
                    <?php
                    foreach ($tiposPQRS as $PQRS) {
                        echo "<option value='".$PQRS['tipo_PQRS_id']."'>".$PQRS['tipo_PQRS_nombre']."</option>";
                    }
                    ?>
                </select>
                <?php
                    if(isset($_SESSION['errores']['Tipo_PQRS'])){
                        echo "<p class='text-danger'>".$_SESSION['errores']['Tipo_PQRS']. "</p>";
                    }
                ?>
            </div>
            <div class="col-12 md-6 mt-4">


                <select class="form-control" name="servicio" id="service">
                    <option value="">Seleccione un servicio...</option>
                    <?php
                    foreach ($servicios as $servicio) {
                        echo "<option value='".$servicio['servicio_id']."'>".$servicio['servicio_nombre']."</option>";
                    }
                    ?>
                </select>
                <?php
                    if(isset($_SESSION['errores']['servicios'])){
                        echo "<p class='text-danger'>".$_SESSION['errores']['servicios']. "</p>";
                    }
                ?>
            </div>
        </div>
        <div class="row border rounded-3 bg-white mt-4 p-3">
            <div class="col-12 md-12">
                <h2>Informacion del tipo de PQRS</h2>
            </div>
            <div class="row mt-4">


                <div class="col-4 md-12">

                    <label for="" class="form-label">Asunto</label>
                    <input type="text" class="form-control" name="asunto">
                    <?php
                        if(isset($_SESSION['errores']['asunto'])){
                            echo "<p class='text-danger'>".$_SESSION['errores']['asunto']. "</p>";
                        }
                     ?>

                </div>
                <div class="col-8 md-12">
                    <label for="" class="form-label">Descripcion</label>
                    <textarea name="desc" id="" class="form-control" style="height: 150px"></textarea>
                    <?php
                        if(isset($_SESSION['errores']['descripcion'])){
                            echo "<p class='text-danger'>".$_SESSION['errores']['descripcion']. "</p>";
                        }
                    ?>
                </div>

            </div>
            <div class="row mt-4">

                <input type="submit" value="Enviar" class="btn btn-primary">
              

            </div>
        </div>


    </form>
</body>