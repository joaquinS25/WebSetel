<!-- Begin Page Content -->
<div class="container-fluid">
    <style>
        .center {
            text-align: center;
        }
    </style>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800 mb-0">Incidencias</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>
    </div>
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
                            <th class="center">Fecha de Creación<br>/ Creador</th>
                            <th class="center">Sección</th>
                            <th class="center">Nombre Afectado</th>
                            <th class="center">Problema</th>
                            <th class="center">Tipo</th>
                            <th class="center">Estado</th>
                            <th class="center">Fecha Inicio</th>
                            <th class="center">Fecha Culminación</th>
                            <th class="center">Observaciones</th>
                            <th class="center">Fecha de Modificación<br>/ Modificado por</th>
                            <th class="center">Editar</th>
                            <th class="center">Eliminar</th>
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
                                <td class="center">
                                    <span style="font-size: 13px;"><?= date("d/m/Y H:i", strtotime($inc['fecha_creacion'])) ?></span><br>
                                    <strong>Por: <?= $inc['usuario_creador'] ?? '-' ?></strong>
                                </td>
                                <td><?= $inc['nombre_seccion'] ?></td>
                                <td><?= $inc['nombre_afectado'] ?></td>
                                <td><?= $inc['problema'] ?></td>
                                <td><?= $inc['tipo'] ?></td>
                                <td><?= $inc['estado'] ?></td>
                                <td><?= $inc['fecha_inicio'] ?></td>
                                <td><?= $inc['fecha_culminacion'] ?></td>
                                <td><?= $inc['observaciones'] ?></td>
                                <td class="center">
                                    <?php if (!empty($inc['fecha_modificacion'])): ?>
                                        <span style="font-size: 13px;"><?= date("d/m/Y H:i", strtotime($inc['fecha_modificacion'])) ?></span><br>
                                        <strong>Por: <?= $inc['usuario_modificador'] ?? '-' ?></strong>
                                    <?php else: ?>
                                        <span>-</span>
                                    <?php endif; ?>
                                </td>
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
                                                        <?php foreach (['Pendiente', 'En proceso', 'Resuelto'] as $est) {
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

                    <!-- MODAL AGREGAR -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="IncidenciaRegistrar.php" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Incidencia</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
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
                                        <div class="mb-3">
                                            <label>Nombre Afectado</label>
                                            <input type="text" name="nombre_afectado" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Problema</label>
                                            <input type="text" name="problema" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Tipo</label>
                                            <select name="tipo" class="form-select" required>
                                                <option value="">Seleccionar</option>
                                                <option value="hardware">Hardware</option>
                                                <option value="software">Software</option>
                                                <option value="red">Red</option>
                                                <option value="otro">Otro</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label>Estado</label>
                                            <select name="estado" class="form-select" required>
                                                <option value="pendiente">Pendiente</option>
                                                <option value="en proceso">En proceso</option>
                                                <option value="resuelto">Resuelto</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Fecha Inicio</label>
                                            <input type="date" name="fecha_inicio" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Fecha Culminación</label>
                                            <input type="date" name="fecha_culminacion" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Observaciones</label>
                                            <textarea name="observaciones" class="form-control" rows="3"></textarea>
                                        </div>
                                        <!--div class="mb-3">
                                                                <label for="formGroupExampleInput" class="form-label">Usuario Soporte</label>
                                                                <input type="text" name="usuario" value="<?php echo $_SESSION['usuario']; ?>" class="form-control" aria-label="RESPONSABLE" required="required">
                                                            </div-->
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" name="registrar" value="<?php echo $id_credencial; ?>" class="btn btn-primary">Agregar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL AGREGAR -->

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