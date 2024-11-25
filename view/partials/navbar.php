<nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Adso571</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tareas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo getUrl("Tareas", "Tareas", "getCreate");?>">Registrar</a></li>
            <li><a class="dropdown-item" href="<?php echo getUrl("Tareas", "Tareas", "getTareas");?>">Consultar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo getUrl("Usuarios", "Usuarios", "getCreate");?>">Registrar</a></li>
            <li><a class="dropdown-item" href="<?php echo getUrl("Usuarios", "Usuarios", "getUsuarios");?>">Consultar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Acceso
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo getUrl("Acceso", "Acceso", "getRegistrar");?>">Registrar</a></li>
            <li><a class="dropdown-item" href="<?php echo getUrl("Acceso", "Acceso", "getLogin");?>">Iniciar sesion</a></li>
          </ul>
        </li>
        <?php if(isset($_SESSION['auth'])){?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['usu_nombre1']?>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo getUrl("Usuarios", "Usuarios", "getPanelAdmin");?>">Panel Administrativo</a></li>             
                    <li><a class="dropdown-item" href="<?php echo getUrl("Usuarios", "Usuarios", "logout");?>">Cerrar sesion</a></li>            
                  </ul>
                </li>
        <?php }?>
      </ul>
    </div>
  </div>
</nav>