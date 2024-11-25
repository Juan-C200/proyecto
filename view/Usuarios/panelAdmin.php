<body class="bg-dark pb-5">

    <div class="container pt-5">
        <h1 class="text-white text-center">!Hola, <?php echo $_SESSION['rol_nombre']." ".$_SESSION['usu_nombre1'];?>¡</h1>
    
        <div class="row mt-3 ms-0">
            <div class="boxDatos row col-md-6 border  rounded-3 p-4 ">
                <h1 class="text-white text-center">Consultar</h2>
            </div>
            
                <div class="boxDatos col-md-6  border rounded-3 ms-4 p-4 ">
                    <a href="<?php echo getUrl("Usuarios","Usuarios","getUpdate",array("usu_id"=>$_SESSION['usu_id'])); ?>">
                        <h1 class="text-white text-center">Editar Perfil</h2>
                    </a>
                </div>
            
        </div>
    </div>
</body>