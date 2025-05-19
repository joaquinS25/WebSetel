<!-- Begin Page Content -->
<div class="container-fluid">
                        <style>
                            .center {
                                text-align: center;
                                justify-content: center;
                            }

                        </style>

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Parque Informático</h1>

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
                                            $n=0;
                                            foreach($usuario as $hey => $value)
                                            {
                                                $n++;
                                                $id_usuario = $value['id_usuario'];
                                                $nombre = $value['nombre'];
                                                $apellido = $value['apellido'];
                                                $usuario = $value['usuario'];
                                                $contrasena = $value["contrasena"];
                                                ?>
                                                <tr>
                                                    <td class="center"><?php echo $n; ?></td>
                                                    <td class="center"><?php echo $nombre; ?></td>
                                                    <td class="center"><?php echo $apellido; ?></td>
                                                    <td class="center"><?php echo $usuario;?></td>
                                                    <td class="center"><?php echo $contrasena; ?></td>

                                                    <form action="usuarioEditar.php" method="post">
                                                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">   
                                                    <td class="center">
                                                        <button name="editar" type="submit" value="<?php echo $id_usuario; ?>" class="text-dark btn btn-sm btn-warning bi bi-pencil-square"></button>
                                                    </td>
                                                    </form>
                                                    <form action="usuario_listar.php" method="post">
                                                        <td class="center">
                                                            <button name="eliminar" type="submit"  value="<?php echo $id_usuario; ?>" class="text-dark btn btn-sm btn-danger bi bi-trash3" onclick="return confirm('Estas seguro de eliminar?');"></button>
                                                        </td>
                                                    </form>
                                                   
                                                    
                                                </tr>

                                                <!--MODAL-->
                                                <div class="modal fade" id="<?php echo $modal;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form action="clientes_editar.php" method="post">
                                                            <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cliente</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Nombres:</label>
                                                                <input type="text" name="nom" value="<?php echo $nom_cliente; ?>" class="form-control" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Apellidos:</label>
                                                                <input type="text" name="ape" value="<?php echo $ape_cliente; ?>" class="form-control" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">DNI:</label>
                                                                <input type="text" name="dni" value="<?php echo $dni_cliente; ?>" class="form-control" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Celular:</label>
                                                                <input type="text" name="cel" value="<?php echo $cel_cliente; ?>" class="form-control" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Email:</label>
                                                                <input type="text" name="email" value="<?php echo $email_cliente; ?>" class="form-control" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Direccion:</label>
                                                                <input type="text" name="dir" value="<?php echo $dir_cliente; ?>" class="form-control" required>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" name="actualizar" value="<?php echo $id_cliente; ?>"  class="btn btn-primary">Actualizar</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--MODAL-->

                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>

                    </div>
                   