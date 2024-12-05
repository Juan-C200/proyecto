<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-menu-cheesburger"></i>
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
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#accidentes" aria-expanded="false" aria-controls="auth">
                <i class="lni lni-car-4"></i>
                <span>Accidentes</span>
            </a>
            <ul id="accidentes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Reportar accidentes</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#señales"
                aria-expanded="false" aria-controls="auth">
                <i class="lni lni-sign-post-left"></i>
                <span>Solicitar</span>
            </a>
            <ul id="señales" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="<?php echo getUrl("Solicitudes", "Solicitudes", "getCreate");?>" class="sidebar-link">Solicitar</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#reductores" aria-expanded="false" aria-controls="auth">
                <i class="lni lni-bridge-3"></i>
                <span>Reductores</span>
            </a>
            <ul id="reductores" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Solicitar nuevo</a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Reportar daños</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#vias"
                aria-expanded="false" aria-controls="auth">
                <i class="lni lni-road-1"></i>
                <span>Vias</span>
            </a>
            <ul id="vias" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Reportar daños</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi"
                aria-expanded="false" aria-controls="multi">
                <i class="lni lni-bar-chart-4"></i>
                <span>Reportes</span>
            </a>
            <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two"
                        aria-expanded="false" aria-controls="multi-two">
                        Generar reportes
                    </a>
                    <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Reportes de accidentes</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Reportes de solicitudes</a>
                        </li>

                    </ul>
                </li>
            </ul>
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