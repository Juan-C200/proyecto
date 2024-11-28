<div class="mt 3">
    <h3 class ="display-4">Consultar señales en mal estado</h3>
</div>
<div class="mt 3">
    <div class="col-md-2 mt-3" >
        <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar por nombre o por correo"
        data-url='<?php echo getUrl("Usuarios", "Usuarios","buscar",false,"ajax");?>'>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Señalización</th>
                <th>Categoria</th>
                <th>Solicitante</th>
                <th>Estado</th>
                <th>Tipo de daño</th>
                <th>Editar</th>
                <!-- <th>Eliminar</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($solicitud_senalizaciones_mal_estado as $solicitudes){
                    echo "<tr>";
                        echo "<td>".$solicitudes['soli_senalizacion_mal_est_id']."</td>";
                        echo "<td>".$solicitudes['tipo_senalizacion_nombre']." - ".$solicitudes['tipo_senalizacion_orientacion']."</td>";
                        echo "<td>".$solicitudes['tipo_senalizacion_categoria']."</td>";
                        echo "<td>".$solicitudes['usu_nombre1']."</td>";
                        echo "<td>".$solicitudes['est_nombre']."</td>";
                        echo "<td>".$solicitudes['tipo_dano_nombre']."</td>";

                        echo "<td>"
                            ."<a href='".getUrl("Usuarios","Usuarios","getUpdate",array("soli_senalizacion_mal_est_id"=>$solicitudes['soli_senalizacion_mal_est_id']))."'>"
                                ."<button class='btn btn-primary'>Editar</button>"
                            ."</a>"
                            ."</td>";

                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>