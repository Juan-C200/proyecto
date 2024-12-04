<!-- Navbar -->
<nav class="navbar navbar-expand-lg  px-3" id="nav">
  <a class="navbar-brand" href="#">SIGARV</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
    <!-- Mensaje de bienvenida -->
    <span class="navbar-text">
      Bienvenid@ <?php echo $_SESSION['usu_nombre1'].' '.$_SESSION['usu_nombre2'].' '.$_SESSION['usu_apellido1'].' '.$_SESSION['usu_apellido2']; ?>
    </span>
    <!--rol -->
    <span class="navbar-text">
      <?php if($_SESSION['usu_rol']==1){
          if($_SESSION['usu_genero']=="Masculino"){
              echo "Administrador";
          }else{
            echo "Administradora";
          }
      }else if($_SESSION['usu_rol']==2){
          if($_SESSION['usu_genero']=="Masculino"){
              echo "Funcionario";
          }else{
            echo "Funcionaria";
          }
      }else{
        
          echo "Ciudadano";
        
      }
            
      ?>
    </span>
    <!-- búsqueda -->
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
  </div>
</nav>