<!-- Begin Page Content -->
<div class="container-fluid">
    <style>
        .center {
            text-align: center;
            justify-content: center;
        }
    </style>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>

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
                            <th class="table-secondary center">ID</th>
                            <th class="table-secondary center">Tipo de artículo</th>
                            <th class="table-secondary center">NSG</th>
                            <th class="table-secondary center">Descripción</th>
                            <th class="table-secondary center">Nombre de equipo</th>
                            <th class="table-secondary center">IP</th>
                            <th class="table-secondary center">Sección</th>
                            <th class="table-secondary center">Responsable</th>
                            <th class="table-secondary center">Antivirus Instalado</th>
                            <th class="table-secondary center">Antivirus Actualizado</th>
                            <th class="table-secondary center">Editar</th>
                            <th class="table-secondary center">Eliminar</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 0;
                        foreach ($parque as $hey => $value) {
                            $n++;
                            $id_equipo = $value['id_equipo'];
                            $tipo_articulo = $value['tipo_articulo'];
                            $nsg = $value['nsg'];
                            $descripcion = $value['descripcion'];
                            $nombre_equipo = $value['nombre_equipo'];
                            $ip = $value['ip'];
                            $nombre_seccion = $value['nombre_seccion'];
                            $responsable = $value['responsable'];
                            $antivirus_instalado = $value['antivirus_instalado'];
                            $antivirus_activo = $value['antivirus_activo'];
                            $id_seccion = $value['id_seccion']; // ← AÑADE ESTA LÍNEA
                            $nombre_equipo = $value['nombre_equipo'];
                            $id_modal = "#modal" . $id_equipo;
                            $modal = "modal" . $id_equipo;
                            // Aquí inicializamos los valores que necesitas en el formulario
                            $ai1 = $antivirus_instalado == "SI" ? "selected" : "";
                            $ai0 = $antivirus_instalado == "NO" ? "selected" : "";
                            $aac1 = $antivirus_activo == "SI" ? "selected" : "";
                            $aac0 = $antivirus_activo == "NO" ? "selected" : "";



                        ?>
                            <tr>
                                <td class="center"><?php echo $n; ?></td>
                                <td class="center"><?php echo $tipo_articulo; ?></td>
                                <td class="center"><?php echo $nsg; ?></td>
                                <td class="center"><?php echo $descripcion; ?></td>
                                <td class="center"><?php echo $nombre_equipo; ?></td>
                                <td class="center"><?php echo $ip; ?></td>
                                <td class="center"><?php echo $nombre_seccion; ?></td>
                                <td class="center"><?php echo $responsable; ?></td>
                                <td class="center"><?php echo $antivirus_instalado; ?></td>
                                <td class="center"><?php echo $antivirus_activo; ?></td>


                                <td class="center">
                                    <!--button name="editar" type="submit" value="<?php echo $id_equipo; ?>" class="text-dark btn btn-sm btn-warning bi bi-pencil-square"></button-->
                                    <button type="button" class="btn btn-sm btn-warning bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="<?php echo $id_modal;  ?>"></button>
                                </td>
                                <form action="ParqueInformatico.php" method="post">
                                    <td class="center">
                                        <!--button name="eliminar" type="submit"  value="<?php echo $id_equipo; ?>" class="text-dark btn btn-sm btn-danger bi bi-trash3" onclick="return confirm('Estas seguro de eliminar?');"></button-->
                                        <button type="button" class="text-dark btn btn-sm btn-danger bi bi-trash3" onclick="confirmarEliminacion(<?php echo $id_equipo; ?>)"></button>
                                    </td>
                                </form>
                            </tr>

                            <!--MODAL-->
                            <div class="modal fade" id="<?php echo $modal;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="ParqueInformatico.php" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Cliente</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="d-flex">
                                                    <div class="mb-3">
                                                        <input type="hidden" name="id_equipo" value="<?php echo $id_equipo; ?>">
                                                        <label for="formGroupExampleInput" class="form-label">Tipo de producto</label>
                                                        <input type="text" name="tipo_producto" value="<?php echo $tipo_articulo; ?>" class="form-control" aria-label="TIPO DE PRODUCTO" required="required">
                                                        <br>
                                                    </div>
                                                    <div class="mb-3 ms-3">
                                                        <label for="formGroupExampleInput" class="form-label">Dependencia</label>
                                                        <select class="form-select" name="seccion" aria-label="Default select example" id="formGroupExampleInput" required>
                                                            <!--option value="" class="bg-secondary">Seleccionar</option-->
                                                            <?php
                                                            require_once("modelo/m_parque.php");
                                                            $secciones = ListarSecciones();
                                                            foreach ($secciones as $seccion) {

                                                                $selected = (isset($id_seccion) && $seccion['id_seccion'] == $id_seccion) ? "selected" : "";
                                                                echo "<option value='" . $seccion['id_seccion'] . "' $selected>" . htmlspecialchars($seccion['nombre_seccion']) . "</option>";
                                                            }
                                                            ?>

                                                        </select>

                                                        <br>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">NSG</label>
                                                    <input type="text" name="nsg" value="<?php echo $nsg; ?>" class="form-control" aria-label="NSG" required="required">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">Descripción</label>
                                                    <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control" aria-label="DESCRIPCION" required="required">
                                                    <br>
                                                </div>




                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">Responsable</label>
                                                    <input type="text" name="responsable" value="<?php echo $responsable; ?>" class="form-control" aria-label="RESPONSABLE" required="required">
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="formGroupExampleInput" class="form-label">Antivirus instalado</label>
                                                        <select name="antivirus_instalado" class="form-control">
                                                            <option value="SI" <?= $ai1 ?>>Sí</option>
                                                            <option value="NO" <?= $ai0 ?>>No</option>
                                                        </select>

                                                        <br>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="formGroupExampleInput" class="form-label">Antivirus actualizado</label>
                                                        <select name="antivirus_activo" class="form-control">
                                                            <option value="SI" <?= $aac1 ?>>Sí</option>
                                                            <option value="NO" <?= $aac0 ?>>No</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="formGroupExampleInput" class="form-label">IP (10.64.xx.xx)</label>
                                                        <input type="text" name="ip" value="<?php echo $ip; ?>" class="form-control" aria-label="IP" required="required">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="formGroupExampleInput" class="form-label">Nombre de Equipo</label>
                                                        <input type="text" name="nombre_equipo" value="<?php echo $nombre_equipo; ?>" class="form-control" aria-label="NOMBRE EQUIPO" required="required">
                                                        <br>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="actualizar" value="<?php echo $id_equipo; ?>" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--MODAL-->

                        <?php
                        }
                        ?>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                        // Crear formulario y enviarlo por POST
                                        const form = document.createElement('form');
                                        form.method = 'POST';
                                        form.action = 'ParqueInformatico.php';

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

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>