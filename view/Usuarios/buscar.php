<?php
                foreach($usuarios as $usu){
                    echo "<tr>";
                        echo "<td>".$usu['usu_id']."</td>";
                        echo "<td>".$usu['tipo_docu_codigo']." - ".$usu['tipo_docu_nombre']."</td>";
                        echo "<td>".$usu['usu_numero_docu']."</td>";
                        echo "<td>".$usu['usu_nombre1']." ".$usu['usu_nombre2']."</td>";
                        echo "<td>".$usu['usu_apellido1']." ".$usu['usu_apellido2']."</td>";
                        echo "<td>".$usu['usu_genero']."</td>";
                        echo "<td>".$usu['usu_correo']."</td>";
                        echo "<td>".$usu['usu_telefono']."</td>";
                        echo "<td>".$usu['usu_direccion']."</td>";
                        
                        $clase="";
                        $texto="";
                        if($usu['usu_estado'] == 1){
                            $clase = "btn btn-danger";
                            $texto = "Inhablitar";
                        }elseif($usu['usu_estado'] == 2){
                            $clase = "btn btn-success";
                            $texto = "Habilitar";
                        }
                        echo "<td>";
                            if(!empty($clase))echo "<button type='button' class='$clase' id='cambiar_estado' 
                            data-url='".getUrl("Usuarios", "Usuarios", "postUpdateStatus", false, "ajax")."' 
                            data-id = '".$usu['usu_estado']."' 
                            data-user='".$usu['usu_id']."'>$texto</button>";
                            
                        echo "</td>";
                        
                        
                        echo "<td>"
                            ."<a href='".getUrl("Usuarios","Usuarios","getUpdate",array("usu_id"=>$usu['usu_id']))."'>"
                                ."<button class='btn btn-primary'>Editar</button>"
                            ."</a>"
                            ."</td>";
                        // echo "<td>"
                        //     ."<a href='".getUrl("Usuarios","Usuarios","getDelete",array("usuario_id"=>$usu['usuario_id']))."'>"
                        //         ."<button class='btn btn-danger'>Eliminar</button>"
                        //     ."</a>"
                        //     ."</td>";
                        
                    echo "</tr>";
                }
            ?>