<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="fi fi-br-menu-burger"></i>
        </button>
        
       
    </div>
    <!-- <div class="sidebar-logo">
        <img src="assets/img/logo-removebg.png" alt="">
    </div> -->
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="<?php echo getUrl("Usuarios", "Usuarios", "getPanelAdmin");?>" class="sidebar-link">
                <i class="lni lni-user-4"></i>
                <span>Perfil</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#usu"
                aria-expanded="false" aria-controls="auth">
                <i class="lni lni-user-multiple-4"></i>
                <span>Usuarios</span>
            </a>
            <ul id="usu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo getUrl("Usuarios", "Usuarios", "getCreate");?>" class="sidebar-link">Registrar</a>
                </li>
                <li class="sidebar-item">
                    <a href="<?php echo getUrl("Usuarios", "Usuarios", "getUsuarios");?>" class="sidebar-link">Consultar</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#reporte_accidente"
            aria-expanded="false" aria-controls="auth">
                
                <i class="lni lni-car-4"></i>
                <span>Reportar un accidente</span>

            </a>
            <ul id="reporte_accidente" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo getUrl("accidentes", "Accidentes", "getCreate");?>" class="sidebar-link">reportar accidente</a>
                </li>
            </ul>
            

        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#reportes"
                aria-expanded="false" aria-controls="auth">
                <i class="lni lni-user-multiple-4"></i>
                <span>Reportes</span>
            </a>
            <ul id="reportes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo getUrl("Reportes", "Reporte", "getCreate");?>" class="sidebar-link">Reportar</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#soli"
                aria-expanded="false" aria-controls="auth">
                <i class="lni lni-file-multiple"></i>
                <span>Solicitudes</span>
            </a>
            <ul id="soli" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo getUrl("Solicitudes", "Solicitud", "getCreate");?>" class="sidebar-link">Solicitar</a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">Consultar</a>
                </li>
            </ul>
        </li>
      
       
        
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="lni lni-bar-chart-4"></i>
                <span>Generar reportes</span>
            </a>
          
        </li>
        
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="lni lni-gear-1"></i>
                <span>Setting</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="<?php echo getUrl("Usuarios", "Usuarios", "logout");?>" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Cerrar sesion</span>
            </a>
        </li>
    </ul>
   
</aside>