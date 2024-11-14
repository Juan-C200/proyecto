<?php
    foreach($usuarios as $usu){
        echo "<tr>";
            echo "<td>".$usu['usuario_id']."</td>";
            echo "<td>".$usu['tipo_documento']."</td>";
            echo "<td>".$usu['numero_documento']."</td>";
            echo "<td>".$usu['primer_nombre']." ".$usu['segundo_nombre']."</td>";
            echo "<td>".$usu['primer_apellido']." ".$usu['segundo_apellido']."</td>";
            echo "<td>".$usu['correo']."</td>";
            echo "<td>".$usu['telefono']."</td>";
            echo "<td>".$usu['direccion']."</td>";
            
            $clase="";
            $texto="";
            if($usu['estado_id'] == 1){
                $clase = "btn btn-danger";
                $texto = "Inhablitar";
            }elseif($usu['estado_id'] == 2){
                $clase = "btn btn-success";
                $texto = "Habilitar";
            }
            echo "<td>";
                if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' 
                data-url='".getUrl("Usuarios", "Usuarios", "postUpdateStatus", false, "ajax")."' 
                data-id = '".$usu['estado_id']."' 
                data-user='".$usu['usuario_id']."'>$texto</button>";
                
            echo "</td>";
            
            
            echo "<td>"
                ."<a href='".getUrl("Usuarios","Usuarios","getUpdate",array("usuario_id"=>$usu['usuario_id']))."'>"
                    ."<button class='btn btn-primary'>Editar</button>"
                ."</a>"
                ."</td>";
            echo "<td>"
                ."<a href='".getUrl("Usuarios","Usuarios","getDelete",array("usuario_id"=>$usu['usuario_id']))."'>"
                    ."<button class='btn btn-danger'>Eliminar</button>"
                ."</a>"
                ."</td>";
            
        echo "</tr>";
    }
?>