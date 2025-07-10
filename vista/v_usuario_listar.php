<!-- Begin Page Content -->
<div class="container-fluid">
    <style>
        .center {
            text-align: center;
            justify-content: center;
        }
    </style>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">LISTA DE USUARIOS DE SOPORTE</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-borderless " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-secondary center">ID</th>
                            <th class="table-secondary center">NOMBRE</th>
                            <th class="table-secondary center">APELLIDO</th>
                            <th class="table-secondary center">USUARIO</th>
                            <th class="table-secondary center">CONTRASEÑA</th>
                            <th class="table-secondary center">Editar</th>
                            <th class="table-secondary center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 0;
                        foreach ($usuario as $hey => $value) {
                            $n++;
                            $id_usuario = $value['id_soporte'];
                            $nombre = $value['nombre'];
                            $apellido = $value['apellido'];
                            $usuario = $value['usuario'];
                            $contrasena = $value["contrasena"];

                            $id_modal = "#modal" . $id_usuario;
                            $modal = "modal" . $id_usuario;
                        ?>
                            <tr>
                                <td class="center"><?php echo $n; ?></td>
                                <td class="center"><?php echo $nombre; ?></td>
                                <td class="center"><?php echo $apellido; ?></td>
                                <td class="center"><?php echo $usuario; ?></td>
                                <td class="center"><?php echo $contrasena; ?></td>


                                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                                <td class="center">
                                    <!--button name="editar" type="submit" value="<?php echo $id_usuario; ?>" class="text-dark btn btn-sm btn-warning bi bi-pencil-square"></button-->
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="<?php echo $id_modal;  ?>">Editar</button>
                                </td>


                                <td class="center">
                                    <form action="usuario_listar.php" method="post">
                                        <input type="hidden" name="eliminar" value="<?php echo $id_usuario; ?>">
                                        <button name="eliminar" type="submit" value="<?php echo $id_usuario; ?>" class="text-dark btn btn-sm btn-danger bi bi-trash3" onclick="return confirm('Estas seguro de eliminar?');"></button>
                                    </form>
                                </td>



                            </tr>

                            <!--MODAL-->
                            <div class="modal fade" id="<?php echo $modal;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="usuarioEditar.php" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuario Soporte</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Nombres:</label>
                                                    <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">Apellidos:</label>
                                                    <input type="text" name="apellido" value="<?php echo $apellido; ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">USUARIO:</label>
                                                    <input type="text" name="usuario" value="<?php echo $usuario; ?>" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">CONTRASEÑA:</label>
                                                    <input type="text" name="contrasena" value="<?php echo $contrasena; ?>" class="form-control" required>
                                                </div>


                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="actualizar" value="<?php echo $id_cliente; ?>" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--MODAL-->

                        <?php } ?>
                    </tbody>
                    <!-- MODAL AGREGAR -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="usuario_registrar.php" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Credenciales</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="nombre" class="form-control" placeholder="Nombres" aria-label="Nombres" required="required">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="apellido" class="form-control" placeholder="Apellido" aria-label="Apellido" required="required">
                                            </div>
                                        </div>
                                        <br>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" name="usuario" class="form-control" placeholder="Usuario" aria-label="Usuario" required="required">
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" aria-label="Contraseña" required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <button type="submit" name="registrar" class="btn btn-primary">Regisrar</button>

                                            </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
                <div class="pt-3">
                    
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button>
                </div>
            </div>
        </div>
    </div>

</div>