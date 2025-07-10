<!-- Begin Page Content -->
<div class="container-fluid">
    <style>
        .center {
            text-align: center;
            justify-content: center;
        }
    </style>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Credenciales Servidores</h1>

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
                            <th class="table-secondary center">NOMBRE SERVIDOR</th>
                            <th class="table-secondary center">USUARIO</th>
                            <th class="table-secondary center">CONTRASEÑA</th>
                            <th class="table-secondary center">DESCRIPCIÓN</th>
                            <th class="table-secondary center">Modificado</th>
                            <th class="table-secondary center">Editar</th>
                            <th class="table-secondary center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 0;
                        foreach ($servidores as $value) {
                            $n++;
                            $id_credencial = $value['id_credencial'];
                            $nombre_credencial = $value['nombre_servidor'];
                            $usuario = $value['user'];
                            $contrasena = $value['contrasena'];
                            $descripcion = $value["descripcion"];
                            $usuarioSoporte = $value["usuario"];
                            $id_modal = "#modal" . $id_credencial;
                            $modal = "modal" . $id_credencial;
                        ?>
                            <tr>
                                <td class="center"><?php echo $n; ?></td>
                                <td class="center">
                                    <span style="color:rgb(0, 0, 0); font-size: 14px;">
                                        <?php echo date("d/m/Y H:i", strtotime($value['fecha_creacion'])); ?>
                                    </span><br>
                                    <strong style="color:rgb(0, 0, 0);">Por: <?php echo $usuarioSoporte; ?></strong>
                                </td>
                                <td class="center"><?php echo $nombre_credencial; ?></td>
                                <td class="center"><?php echo $usuario; ?></td>
                                <td class="center"><?php echo $contrasena; ?></td>
                                <td class="center"><?php echo $descripcion; ?></td>
                                <td class="center">
                                    <?php if (!empty($value['actualizado_el'])): ?>
                                        <span style="color:rgb(0, 0, 0); font-size: 14px;">
                                            <?php echo date("d/m/Y H:i", strtotime($value['actualizado_el'])); ?>
                                        </span><br>
                                        <strong style="color:rgb(0, 0, 0);">Por: <?php echo $value['actualizado_por']; ?></strong>
                                    <?php endif; ?>
                                </td>
                                <td class="center">
                                    <button type="button" class="btn btn-sm btn-warning bi bi-pencil-square"
                                        data-bs-toggle="modal" data-bs-target="<?php echo $id_modal; ?>"></button>
                                </td>
                                <td class="center">
                                    <button class="btn btn-danger btnEliminar bi bi-trash3"
                                        data-id="<?php echo $id_credencial; ?>"></button>
                                </td>
                            </tr>
                            <!-- Modal Editar -->
                            <div class="modal fade" id="<?php echo $modal; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="servidores.php" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Credenciales</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_credencial" value="<?php echo $id_credencial; ?>">
                                                <div class="mb-3">
                                                    <label class="form-label">Nombre de Servidor</label>
                                                    <input type="text" name="nombre_credencial" value="<?php echo $nombre_credencial; ?>" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Usuario de servidor</label>
                                                    <input type="text" name="usuario" value="<?php echo $usuario; ?>" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Contraseña del Servidor</label>
                                                    <input type="text" name="contrasena" value="<?php echo $contrasena; ?>" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Descripción</label>
                                                    <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="actualizar" value="<?php echo $id_credencial; ?>" class="btn btn-primary">Actualizar</button>
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
                                <form action="servidores_registrar.php" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Credenciales</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="hidden" name="id_credencial">
                                            <label for="formGroupExampleInput" class="form-label">Nombre de Servidor</label>
                                            <input type="text" name="nombre_servidor" class="form-control" aria-label="TIPO DE PRODUCTO" required="required">
                                            <br>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">USuario de servidor</label>
                                            <input type="text" name="user" class="form-control" aria-label="NSG" required="required">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Contraseña del Servidor</label>
                                            <input type="text" name="contrasena" class="form-control" aria-label="DESCRIPCION" required="required">
                                            <br>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Descripción</label>
                                            <input type="text" name="descripcion" class="form-control" aria-label="IP" required="required">
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
                    </tbody>
                </table>
                <div>
                    <br>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll(".btnEliminar").forEach(button => {
        button.addEventListener("click", function() {
            const id = this.getAttribute("data-id");

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("modelo/servidores_eliminar.php", {
                            method: "POST",
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id_credencial=${id}` // <- CORRECTO
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === "SI") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Eliminado',
                                    text: 'El servidor ha sido eliminado correctamente',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No se pudo eliminar el servidor'
                                });
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error al comunicarse con el servidor'
                            });
                        });
                }
            });
        });
    });
</script>