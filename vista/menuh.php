<?php
session_start();

?>
<ul class="navbar-nav ml-auto">
     <!-- Mostrar el nombre del rol antes de la línea divisoria -->
    <li class="nav-item d-flex align-items-center">
        <span class="mr-2 d-none d-lg-inline text-light-600 small text-white" id="rol">
            <?php echo $_SESSION['rol']; ?>
        </span>
    </li>
    <div class="topbar-divider d-none d-sm-block"></div>
    <!--PERFIL DE USUARIO-->
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"

            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-light-600 small" id="name">
                <?php
                echo $_SESSION['nom_completo_session'] 
                ?> 
            </span>
            </span>
            <img class="img-profile rounded-circle"
                src="img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="perfil.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Perfil
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Configurar
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="cerrar_session.php">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Salir
            </a>
        </div>
    </li>
</ul>

</nav>