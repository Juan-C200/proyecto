<body>
   <form action="<?php echo getUrl("PQRS", "PQRS", "postCreate", null, "ajax"); ?>"  method="POST">
        <div class="row">
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
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 md-12">
                <h2>Informacion del tipo de PQRS</h2>
            </div>
            <div class="row mt-4">


                <div class="col-4 md-12">

                    <label for="" class="form-label">Asunto</label>
                    <input type="text" class="form-control" name="asunto">

                </div>
                <div class="col-8 md-12">
                    <label for="" class="form-label">Descripcion</label>
                    <textarea name="desc" id="" class="form-control" style="height: 150px"></textarea>
                </div>

            </div>
            <div class="row mt-4">

                <input type="submit" value="Enviar" class="btn btn-primary">


            </div>
        </div>


    </form>
</body>