<!-- Begin Page Content -->
<div class="container-fluid">
    <style>
        .center {
            text-align: center;
            justify-content: center;
        }
    </style>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mantenimientos</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-borderless" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-secondary center">#</th>
                            <th class="table-secondary center">Fecha de Creación /<br> Creador</th>
                            <th class="table-secondary center">Responsable</th>
                            <th class="table-secondary center">Equipo</th>
                            <th class="table-secondary center">IP</th>
                            <th class="table-secondary center">Sección</th>
                            <th class="table-secondary center">Tipo</th>
                            <th class="table-secondary center">Fecha</th>
                            <th class="table-secondary center">Observaciones</th>
                            <th class="table-secondary center">Modificado</th>
                            <th class="table-secondary center">Editar</th>
                            <th class="table-secondary center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 0;
                        foreach ($mantenimientos as $value) {
                            $n++;
                            $id_mantenimiento = $value['id_mantenimiento'];
                            $nombre_responsable = $value['nombre_responsable'];
                            $nombre_equipo = $value['nombre_equipo'];
                            $ip = $value['ip'];
                            $nombre_seccion = $value['nombre_seccion'];
                            $tipo = $value['tipo'];
                            $fecha_realizacion = $value['fecha_realizacion'];
                            $observaciones = $value['observaciones'];
                            $fecha_creacion = $value['fecha_creacion'];
                            $fecha_modificacion = $value['fecha_modificacion'];
                            $usuario_creador = $value['usuario_creador'];
                            $usuario_modificador = $value['usuario_modificador'];

                            $id_modal = "#modal" . $id_mantenimiento;
                            $modal = "modal" . $id_mantenimiento;
                        ?>
                            <tr>
                                <td class="center"><?php echo $n; ?></td>
                                <td class="center">
                                    <?php echo $fecha_creacion; ?><br>
                                    <strong>Por: <?php echo $usuario_creador; ?></strong>
                                </td>
                                <td class="center"><?php echo $nombre_responsable; ?></td>
                                <td class="center"><?php echo $nombre_equipo; ?></td>
                                <td class="center"><?php echo $ip; ?></td>
                                <td class="center"><?php echo $nombre_seccion; ?></td>
                                <td class="center"><?php echo $tipo; ?></td>
                                <td class="center"><?php echo $fecha_realizacion; ?></td>
                                <td class="center"><?php echo $observaciones; ?></td>

                                <td class="center">
                                    <?php if (!empty($value['fecha_modificacion'])): ?>
                                        <span style="color:rgb(0, 0, 0); font-size: 14px;">
                                            <?php echo date("d/m/Y H:i", strtotime($value['fecha_modificacion'])); ?>
                                        </span><br>
                                        <strong style="color:rgb(0, 0, 0);">Por: <?php echo $value['usuario_modificador']; ?></strong>
                                    <?php endif; ?>
                                </td>
                                <td class="center">
                                    <button type="button" class="btn btn-sm btn-warning bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="<?php echo $id_modal; ?>"></button>
                                </td>
                                <form action="mantenimiento.php" method="post">
                                    <td class="center">
                                        <button type="button" class="btn btn-sm btn-danger bi bi-trash3" onclick="confirmarEliminacion(<?php echo $id_mantenimiento; ?>)"></button>
                                    </td>
                                </form>
                            </tr>

                            <!-- Modal Editar -->
                            <div class="modal fade" id="<?php echo $modal; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="mantenimiento.php" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Mantenimiento</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_mantenimiento" value="<?php echo $id_mantenimiento; ?>">

                                                <div class="mb-3">
                                                    <label class="form-label">Responsable</label>
                                                    <input type="text" name="nombre_responsable" value="<?php echo $nombre_responsable; ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Nombre del Equipo</label>
                                                    <input type="text" name="nombre_equipo" value="<?php echo $nombre_equipo; ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">IP</label>
                                                    <input type="text" name="ip" value="<?php echo $ip; ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Sección</label>
                                                    <select class="form-select" name="id_seccion" required>
                                                        <?php
                                                        require_once("modelo/m_mantenimiento.php");
                                                        $secciones = ListarSecciones();
                                                        foreach ($secciones as $seccion) {
                                                            $selected = $seccion['nombre_seccion'] == $nombre_seccion ? 'selected' : '';
                                                            echo "<option value='{$seccion['id_seccion']}' $selected>{$seccion['nombre_seccion']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Tipo</label>
                                                    <input type="text" name="tipo" value="<?php echo $tipo; ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Fecha de Realización</label>
                                                    <input type="date" name="fecha_realizacion" value="<?php echo $fecha_realizacion; ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Observaciones</label>
                                                    <textarea name="observaciones" class="form-control" rows="3" required><?php echo $observaciones; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="actualizar" value="<?php echo $id_mantenimiento; ?>" class="btn btn-primary">Actualizar</button>
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
                form.action = 'mantenimiento.php';

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