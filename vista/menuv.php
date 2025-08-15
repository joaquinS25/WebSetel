<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-text mx-3">SETEL - OEE</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Principal -->
<li class="nav-item active">
    <a class="nav-link" href="inicio.php">
        <i class="fas fa-sliders-h"></i>
        <span>Principal</span></a>
</li>

<!-- Rayita para dividir -->
<hr class="sidebar-divider">
<!--CSS-->
<style>
    .depe_hover:hover{
        background-color: #007bff !important;
    }
</style>
<div class="sidebar-heading">
    Informática
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree1"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-desktop"></i>
        <span>Parque Informático</span>
    </a>
    <div id="collapseThree1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header text-secondary-subtle">Dependencias</h6>
            <a class="collapse-item text-white depe_hover" href="ParqueInformatico.php">Lista</a>
        </div>
    </div>

    <?php if ($_SESSION['rol'] === 'ADMINISTRADOR'): ?>
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-user"></i>
        <span>Usuarios</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <!--div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header text-secondary-subtle">Registrar</h6>
            <a class="collapse-item text-white depe_hover" href="usuario_registrar.php">Registrar Usuarios</a>
        </div-->
        <div class="bg-dark py-2 collapse-inner rounded">
            <h6 class="collapse-header text-secondary-subtle">Mostrar Usuarios</h6>
            <a class="collapse-item text-white depe_hover" href="usuario_listar.php">Listar Usuarios</a>
        </div>
        
    </div>
    <?php endif; ?>
</li>


<!-- Menú para mantenimiento y stock de inventario -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
       
        <i class="fas fa-tools"></i>
        <span>Soporte Técnico</span>
    </a>

    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-dark py-2 collapse-inner rounded">
        <h6 class="collapse-header text-secondary-subtle">Mantenimiento</h6>
            <a class="collapse-item depe_hover text-white" href="servidores.php">Credenciales de Servidores</a>
            <a class="collapse-item depe_hover text-white" href="mantenimiento.php">Listar Mantenimiento</a>
            <a class="collapse-item depe_hover text-white" href="Incidencia.php"> Lista de Incidencias</a>
            <a class="collapse-item depe_hover text-white" href="ComputadorasDonadas.php"> Computadoras Donadas</a>
            
            
            
            
            
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>