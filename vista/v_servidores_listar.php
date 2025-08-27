<!-- Begin Page Content -->
<div class="container-fluid">
    <style>
        .center {
            text-align: center;
            justify-content: center;
        }
    </style>

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800 mb-0">Credenciales Servidores</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>
    </div>
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
                            <th class="table-secondary center">Modelo</th>
                            <th class="table-secondary center">Procesador</th>
                            <th class="table-secondary center">Cant. Procesador</th>
                            <th class="table-secondary center">Cant. CPU</th>
                            <th class="table-secondary center">RAM</th>
                            <th class="table-secondary center">Total</th>
                            <th class="table-secondary center">Físico</th>
                            <th class="table-secondary center">Lógico</th>
                            <th class="table-secondary center">NOMBRE DE EQUIPO</th>
                            <th class="table-secondary center">IP</th>
                            <th class="table-secondary center">Tipo Servidor</th>
                            <th class="table-secondary center">Usuario</th>
                            <th class="table-secondary center">Contraseña</th>
                            <th class="table-secondary center">Origen</th>
                            <th class="table-secondary center">SO</th>
                            <th class="table-secondary center">Utilidad</th>
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
                        ?>
                            <tr>
                                <td class="center"><?php echo $n; ?></td>
                                <td class="center">
                                    <span style="color:rgb(0, 0, 0); font-size: 14px;">
                                        <?php echo date("d/m/Y H:i", strtotime($value['fecha_creacion'])); ?>
                                    </span><br>
                                    <strong style="color:rgb(0, 0, 0);">Por: <?php echo $value["usuario_creacion"]; ?></strong>
                                </td>
                                <td class="center"><?php echo $value['modelo_servidor']; ?></td>
                                <td class="center"><?php echo $value['procesador']; ?></td>
                                <td class="center"><?php echo $value['cant_procesador']; ?></td>
                                <td class="center"><?php echo $value['cant_cpu']; ?></td>
                                <td class="center"><?php echo $value['ram']; ?></td>
                                <td class="center"><?php echo $value['total']; ?></td>
                                <td class="center"><?php echo $value['fisico']; ?></td>
                                <td class="center"><?php echo $value['logico']; ?></td>
                                <td class="center"><?php echo $value['nombre_equipo']; ?></td>
                                <td class="center"><?php echo $value['ip']; ?></td>
                                <td class="center"><?php echo $value['tipo_servidor']; ?></td>
                                 <td class="center"><?php echo $value['nombre_usuario']; ?></td>
                                <td class="center"><?php echo $value['contrasena']; ?></td>
                                <td class="center"><?php echo $value['origen']; ?></td>
                                <td class="center"><?php echo $value['so']; ?></td>
                                <td class="center"><?php echo $value['utilidad']; ?></td>
                                <td class="center">
                                    <?php if (!empty($value['fecha_modificacion'])): ?>
                                        <span style="color:rgb(0, 0, 0); font-size: 14px;">
                                            <?php echo date("d/m/Y H:i", strtotime($value['fecha_modificacion'])); ?>
                                        </span><br>
                                        <strong style="color:rgb(0, 0, 0);">Por: <?php echo $value['usuario_modificacion']; ?></strong>
                                    <?php endif; ?>
                                </td>
                                <td class="center">
                                    <button type="button" class="btn btn-sm btn-warning bi bi-pencil-square"
                                        data-bs-toggle="modal" data-bs-target="#modal<?php echo $id_credencial; ?>"></button>
                                </td>
                                <td class="center">
                                    <button class="btn btn-danger btnEliminar bi bi-trash3"onclick="confirmarEliminacion(<?php echo $id_credencial; ?>)"></button>
                                </td>
                            </tr>

                            <!-- Modal Editar -->
                            <div class="modal fade" id="modal<?php echo $id_credencial; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <form action="servidores.php" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Credenciales</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_credencial" value="<?php echo $id_credencial; ?>">

                                                <div class="row">
                                                    
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Modelo Servidor</label>
                                                        <input type="text" name="modelo_servidor" value="<?php echo $value['modelo_servidor']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Procesador</label>
                                                        <input type="text" name="procesador" value="<?php echo $value['procesador']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Cantidad Procesador</label>
                                                        <input type="text" name="cant_procesador" value="<?php echo $value['cant_procesador']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Cantidad CPU</label>
                                                        <input type="text" name="cant_cpu" value="<?php echo $value['cant_cpu']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">RAM</label>
                                                        <input type="text" name="ram" value="<?php echo $value['ram']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Total</label>
                                                        <input type="text" name="total" value="<?php echo $value['total']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Físico</label>
                                                        <input type="text" name="fisico" value="<?php echo $value['fisico']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Lógico</label>
                                                        <input type="text" name="logico" value="<?php echo $value['logico']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Nombre Equipo</label>
                                                        <input type="text" name="nombre_equipo" value="<?php echo $value['nombre_equipo']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">IP</label>
                                                        <input type="text" name="ip" value="<?php echo $value['ip']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Tipo Servidor</label>
                                                        <input type="text" name="tipo_servidor" value="<?php echo $value['tipo_servidor']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Usuario</label>
                                                        <input type="text" name="nombre_usuario" value="<?php echo $value['nombre_usuario']; ?>" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Contraseña</label>
                                                        <input type="text" name="contrasena" value="<?php echo $value['contrasena']; ?>" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Origen</label>
                                                        <input type="text" name="origen" value="<?php echo $value['origen']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">SO</label>
                                                        <input type="text" name="so" value="<?php echo $value['so']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Utilidad</label>
                                                        <input type="text" name="utilidad" value="<?php echo $value['utilidad']; ?>" class="form-control">
                                                    </div>
                                                    
                                                    
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
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="servidores_registrar.php" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Credenciales</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Modelo Servidor</label>
                                                <input type="text" name="modelo_servidor" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Procesador</label>
                                                <input type="text" name="procesador" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Cantidad Procesador</label>
                                                <input type="text" name="cant_procesador" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Cantidad CPU</label>
                                                <input type="text" name="cant_cpu" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">RAM</label>
                                                <input type="text" name="ram" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Total</label>
                                                <input type="text" name="total" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Físico</label>
                                                <input type="text" name="fisico" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Lógico</label>
                                                <input type="text" name="logico" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Nombre Equipo</label>
                                                <input type="text" name="nombre_equipo" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">IP</label>
                                                <input type="text" name="ip" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Tipo Servidor</label>
                                                <input type="text" name="tipo_servidor" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Usuario</label>
                                                <input type="text" name="nombre_usuario" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Contraseña</label>
                                                <input type="text" name="contrasena" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Origen</label>
                                                <input type="text" name="origen" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">SO</label>
                                                <input type="text" name="so" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Utilidad</label>
                                                <input type="text" name="utilidad" class="form-control">
                                            </div>
                                            
                                           
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" name="registrar" class="btn btn-primary">Agregar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- FIN MODAL AGREGAR -->

                </table>

            </div>
        </div>
    </div>
<script>
    function confirmarEliminacion(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
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
                form.action = 'servidores.php';

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

</div>
