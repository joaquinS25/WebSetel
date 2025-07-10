<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- FORMULARIO DE REGISTRO DE MANTENIMIENTO -->
<div class="card-header bg-light">
    <i class="fa fa-bug me-2"></i><span class="h5">Registrar Incidencia</span>
</div>

<div class="card mb-4">
    <div class="card-body bg-light">
        <form action="IncidenciaRegistrar.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label>Sección</label>
                    <select name="id_seccion" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <?php
                        require_once("modelo/m_incidencias.php");
                        $secciones = ListarSecciones();
                        foreach ($secciones as $sec) {
                            echo "<option value='{$sec['id_seccion']}'>{$sec['nombre_seccion']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Nombre Afectado</label>
                    <input type="text" name="nombre_afectado" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label>Problema</label>
                    <input type="text" name="problema" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label>Tipo</label>
                    <select name="tipo" class="form-select" required>
                        <option value="">Seleccionar</option>
                        <option value="hardware">Hardware</option>
                        <option value="software">Software</option>
                        <option value="red">Red</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Estado</label>
                    <select name="estado" class="form-select" required>
                        <option value="pendiente">Pendiente</option>
                        <option value="en proceso">En proceso</option>
                        <option value="resuelto">Resuelto</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label>Fecha Culminación</label>
                    <input type="date" name="fecha_culminacion" class="form-control">
                </div>

                <div class="col-md-12">
                    <label>Observaciones</label>
                    <textarea name="observaciones" class="form-control" rows="3"></textarea>
                </div>

                <div class="col-md-12 text-center mt-3">
                    <button type="submit" name="registrar" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i> Registrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
