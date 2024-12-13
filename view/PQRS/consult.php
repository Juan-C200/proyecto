<div class="container table-container mt-5">
    <h2 class="text-center mb-4">Consultar PQRS</h2>
    <div class="row mb-3">
        <div class="col-md-8 mb-2">
            <input 
                type="text" 
                name="buscar" 
                id="buscar" 
                class="form-control" 
                placeholder="Buscar..."
                data-url='<?php echo getUrl("Usuarios", "Usuarios","buscar",false,"ajax");?>'
            >
        </div>
        <div class="col-md-4">
            <select name="filtro" id="filtro" class="form-control">
                <option value="">Filtrar por...</option>
                <option value="asunto">Asunto</option>
                <option value="tipoPQRS">Tipo de PQRS</option>
                <option value="servicio">Servicio</option>
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tipo de PQRS</th>
                    <th>Servicio</th>
                    <th>Asunto</th>
                    <th>Detallar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($pqrs as $data){
                        echo "<tr>";
                            echo "<td>".$data['pqrs_id']."</td>";
                            echo "<td>".$data['tipo_PQRS_nombre']."</td>";
                            echo "<td>".$data['servicio_nombre']."</td>";
                            echo "<td>".$data['pqrs_asunto']."</td>";
                            echo "<td>
                                    <a href='#'>
                                        <button class='btn-detalle'>Ver detalle</button>
                                    </a>
                                  </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>





