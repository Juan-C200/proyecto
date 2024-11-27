<?php

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body class="">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center mb-1 mt-4">Reductores de velocidad</h3>
            
            <div class="row mt-2 mb-2 p-4">
                <div class="border rounded p-4 text-center"><h4>Reductor en mal estado</h4></div>
                
            </div>
            
            <p class="text">Para ver el tipo de señal oprima una de las opciones</p>
            
            <div class="row mt-2">
                <button type="button" class="btn-primary col-md-3 border-1 rounded-1 p-3">Reductor estructural</button>
                <button type="button" class="btn-primary col-md-3 ms-2 border-1 rounded-1 p-3">Reductor modular</button>
                <button type="button" class="btn-primary col-md-3 ms-2 border-1 rounded-1 p-3">Reductor de señalizacion</button>
            </div>
            
            <div class="p-2">
                <div class="cajaSeñales1 p-1 col-md-12">
                    <h5>
                        Reductores panel para imagenes
                    </h5>                    
                    
                </div>
                <div class="cajaSeñales2 p-1 col-md-12">
                    

                </div>
            </div>
            
        </div>

        <div class="mt-1">

            <form action="" method="POST" class="form-control p-3" enctype="multipart/form-data">
                    <div class="col-md-3 p-1">
                    <small class="text-warning">Complete los datos del formulario</small>
                    <label for="tipoDaño" class="form-label mt-2"><b>Tipo de reductor</b></label>
                        <select type="text" class="form-control rounded-3" id="tipoDaño" name="tipoDaño">
                            <option value="">Seleccione...</option>
                            <option value="Masculino">Resaltos</option>
                            <option value="Femenino">Tachas</option>
                            <option value="Femenino">Estoperoles</option>
                        </select>
                </div> 

                    <div class="col-md-3 p-1">
                    <label for="tipoDaño" class="form-label mt-2"><b>Tipo de daño*</b></label>
                        <select type="text" class="form-control rounded-3" id="tipoDaño" name="tipoDaño">
                            <option value="">Seleccione...</option>
                            <option value="Masculino">Despintada</option>
                            <option value="Femenino">Vandalizada</option>
                            <option value="Femenino">Deformada</option>
                        </select>
                </div> 
                
                <div class="row mt-4 p-1">
                    <h7 for="direccion" class="form-label"><b>Dirección o ubicacion*</b></h7>
                            <label for="" class="form-label col-md-2">
                                <div class="col-md-10">
                                    <select name="campo1" class="form-control boxDatos rounded-3" id="">
                                        <option value="">Seleccione...</option>
                                        <option value="Calle">Calle</option>
                                        <option value="Carrera">Carrera</option>
                                        <option value="Avenida">Avenida</option>
                                        <option value="Transversal">Transversal</option>
                                        <option value="Circular">Circular</option>
                                        <option value="Diagonal">Diagonal</option>
                                    </select>
                                </div>
                            </label>
                                
                                <label for="" class="form-label col-md-2">
                                    <div class="col-md-4 ms-2">
                                        <input type="text" name="campo2" class="form-control rounded-3">
                                    </div>
                                </label>
                                

                                <label for="" class="form-label col-md-2">
                                    <div class="col-md-12">
                                        <select name="campo3" class="form-control rounded-3" id="">
                                            <option value="">Seleccione...</option>
                                            <option value="Calle ">Norte</option>
                                            <option value="Carrera ">Sur</option>
                                            <option value="Avenida ">Este</option>
                                            <option value="Transversal ">Oeste</option>
                                        </select>
                                    </div>
                                </label>

                                <label for="" class="form-label col-md-1">
                                    <div class="col-md-1">
                                        <label for="" class="ms-3">#</label>
                                    </div>
                                </label>

                                <label for="" class="form-label col-md-1 text-white">
                                    <div class="col-md-9">
                                        <input type="text" name="campo4" class="form-control rounded-3">
                                    </div>
                                </label>
                                
                                <label for="" class="form-label col-md-1">
                                    <div class="col-md-1">
                                        <label for="" class="ms-3">__</label>
                                    </div>
                                </label>

                                <label for="" class="form-label col-md-1 text-white"> 
                                    <div class="col-md-9">
                                        <input type="text" name="campo5" class="form-control rounded-3">
                                    </div>
                                </label>
                            </div>
                            
                            <div class="col-md-12">
                                <input type="text" name="campo6" class="form-control border-black rounded-3" disabled>
                            </div>

                            <label for="" class="form-label col-md-1 mt-2"><b>Descripcion</b>
                            <div class="col-md-12">
                                <textarea name="textarea" rows="10" cols="50">escribe una breve descripcion</textarea>
                            </div>
                            </label>

                           

                            <div class="col-md-12 mt-3">
                                <label for="fotoReductor" class="col-md-12 text-primary mb-1">adjuntar imagen</label>
                                <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png" required>
                            </div>
            </form>
        </div>


    </div>    






</body>