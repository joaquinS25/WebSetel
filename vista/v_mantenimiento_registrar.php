<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- FORMULARIO DE REGISTRO DE MANTENIMIENTO -->
<div class="card-header" style="background: #fafafa;">
    <i class="fa fa-tools me-2 h5"></i><span class="h5">Registro de Mantenimiento</span>                 
</div>

<div class="card mb-4">
    <div class="card-body" style="background: #fafafa;">
        <form action="MantenimientoRegistrar.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Dependencia (Sección)</label>
                    <select class="form-select" name="id_seccion" required>
                        <option value="">Seleccionar</option>
                        <?php
                            require_once("modelo/m_mantenimiento.php");
                            $secciones = ListarSecciones();
                            foreach ($secciones as $seccion) {
                                echo "<option value='{$seccion['id_seccion']}'>{$seccion['nombre_seccion']}</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Responsable</label>
                    <input type="text" name="nombre_responsable" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nombre del Equipo</label>
                    <input type="text" name="nombre_equipo" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Dirección IP</label>
                    <input type="text" name="ip" class="form-control" placeholder="10.64.xx.xx" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tipo de Mantenimiento</label>
                    <input type="text" name="tipo" class="form-control" placeholder="Ej: Correctivo, Preventivo" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Fecha de Realización</label>
                    <input type="date" name="fecha_realizacion" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Observaciones</label>
                    <textarea name="observaciones" class="form-control" rows="3" placeholder="Detalle de observaciones..." ></textarea>
                </div>

                <div class="col-md-12 text-center">
                    <br>
                    <button type="submit" name="registrar" class="btn btn-primary">
                        <i class="fa fa-save me-1"></i>Registrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
