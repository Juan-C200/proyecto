<div class="mt 3">
    <h3 class ="display-4">Consultar Usuario</h3>
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
                <th>Numero de documento</th>
                <th>
                    <button type='button' class='$clase' id='filtrar' 
                        data-url='<?php echo getUrl("Usuarios", "Usuarios", "getUsuarios", false, "ajax")?>' 
                        data-filtro='usu_nombre1' 
                        data-orden='<?php $orden ?>'>Nombre</button>
                </th>
                <th>
                    <a href="<?php echo getUrl("Usuarios","Usuarios","getUsuarios",array("filtro"=>"usu_apellido2")) ?>">
                        <button class='btn '>Apellido</button>
                    </a>
                </th>
                <th>Email</th>
                <th>Estado</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($usuarios as $usu){
                    echo "<tr>";
                        echo "<td>".$usu['usu_id']."</td>";
                        echo "<td>".$usu['tipo_docu_codigo']." ".$usu['usu_numero_docu']."</td>";
                        echo "<td>".$usu['usu_nombre1']." ".$usu['usu_nombre2']."</td>";
                        echo "<td>".$usu['usu_apellido1']." ".$usu['usu_apellido2']."</td>";
                        echo "<td>".$usu['usu_correo']."</td>";
                        
                        $clase="";
                        $texto="";
                        if($usu['usu_estado'] == 1){
                            $clase = "btn btn-danger";
                            $texto = "Inhablitar";
                        }elseif($usu['usu_estado'] == 2){
                            $clase = "btn btn-success";
                            $texto = "Habilitar";
                        }

                        
                        if($usu['usu_id'] == $_SESSION['usu_id']){
                            $disabled="disabled";
                        }else{
                            $disabled="";
                        }
                        echo "<td>";
                            if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' 
                            data-url='".getUrl("Usuarios", "Usuarios", "postUpdateStatus", false, "ajax")."' 
                            data-id = '".$usu['usu_estado']."' 
                            data-user='".$usu['usu_id']."' ".$disabled.">$texto</button>";
                            
                        echo "</td>";
                        
                        
                        echo "<td>"
                            ."<a href='".getUrl("Usuarios","Usuarios","getUpdate",array("usu_id"=>$usu['usu_id']))."'>"
                                ."<button class='btn btn-primary'>Editar</button>"
                            ."</a>"
                            ."</td>";
                        
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>