<!-- Begin Page Content -->
<div class="container-fluid">
    <style>.center { text-align: center; }</style>
    <h1 class="h3 mb-2 text-gray-800">Incidencias</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de incidencias</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center table-secondary">
                            <th>#</th>
                            <th>Sección</th>
                            <th>Nombre Afectado</th>
                            <th>Problema</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Culminación</th>
                            <th>Observaciones</th>
                            <th>Soporte</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 0;
                        foreach ($incidencias as $inc) {
                            $n++;
                            $id = $inc['id_incidencia'];
                            ?>
                            <tr class="text-center">
                                <td><?= $n ?></td>
                                <td><?= $inc['nombre_seccion'] ?></td>
                                <td><?= $inc['nombre_afectado'] ?></td>
                                <td><?= $inc['problema'] ?></td>
                                <td><?= $inc['tipo'] ?></td>
                                <td><?= $inc['estado'] ?></td>
                                <td><?= $inc['fecha_inicio'] ?></td>
                                <td><?= $inc['fecha_culminacion'] ?></td>
                                <td><?= $inc['observaciones'] ?></td>
                                <td><?= $inc['usuario'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#modal<?= $id ?>"></button>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-sm bi bi-trash3" onclick="confirmarEliminacion(<?= $id ?>)"></button>
                                </td>
                            </tr>

                            <!-- Modal Editar -->
                            <div class="modal fade" id="modal<?= $id ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="Incidencia.php" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Incidencia</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_incidencia" value="<?= $id ?>">

                                                <div class="mb-2">
                                                    <label>Sección</label>
                                                    <select class="form-select" name="id_seccion" required>
                                                        <?php
                                                        require_once("modelo/m_incidencias.php");
                                                        $secciones = ListarSecciones();
                                                        foreach ($secciones as $sec) {
                                                            $selected = $sec['id_seccion'] == $inc['id_seccion'] ? 'selected' : '';
                                                            echo "<option value='{$sec['id_seccion']}' $selected>{$sec['nombre_seccion']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="mb-2">
                                                    <label>Nombre Afectado</label>
                                                    <input type="text" name="nombre_afectado" value="<?= $inc['nombre_afectado'] ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-2">
                                                    <label>Problema</label>
                                                    <input type="text" name="problema" value="<?= $inc['problema'] ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-2">
                                                    <label>Tipo</label>
                                                    <select name="tipo" class="form-select" required>
                                                        <?php foreach (['hardware', 'software', 'red', 'otro'] as $tipo) {
                                                            $sel = ($inc['tipo'] == $tipo) ? 'selected' : '';
                                                            echo "<option value='$tipo' $sel>$tipo</option>";
                                                        } ?>
                                                    </select>
                                                </div>

                                                <div class="mb-2">
                                                    <label>Estado</label>
                                                    <select name="estado" class="form-select" required>
                                                        <?php foreach (['pendiente', 'en proceso', 'resuelto'] as $est) {
                                                            $sel = ($inc['estado'] == $est) ? 'selected' : '';
                                                            echo "<option value='$est' $sel>$est</option>";
                                                        } ?>
                                                    </select>
                                                </div>

                                                <div class="mb-2">
                                                    <label>Fecha Inicio</label>
                                                    <input type="date" name="fecha_inicio" value="<?= $inc['fecha_inicio'] ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-2">
                                                    <label>Fecha Culminación</label>
                                                    <input type="date" name="fecha_culminacion" value="<?= $inc['fecha_culminacion'] ?>" class="form-control">
                                                </div>

                                                <div class="mb-2">
                                                    <label>Observaciones</label>
                                                    <textarea name="observaciones" class="form-control"><?= $inc['observaciones'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="actualizar" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert para eliminar -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmarEliminacion(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'Incidencia.php';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'eliminar';
                input.value = id;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
