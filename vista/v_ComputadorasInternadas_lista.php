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
        <h1 class="h3 text-gray-800 mb-0">COMPUTADORAS INTERNADAS</h1>
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
                            <th class="table-secondary center">NSG</th>
                            <th class="table-secondary center">USUARIO RESPONSABLE</th>
                            <th class="table-secondary center">DEPARTAMENTO</th>
                            <th class="table-secondary center">PROBLEMA</th>
                            <th class="table-secondary center">COMPONENTES</th>
                            <th class="table-secondary center">ENTREGA</th>
                            <th class="table-secondary center">Modificado</th>
                            <th class="table-secondary center">Editar</th>
                            <th class="table-secondary center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 0;

                        foreach ($computadorasInternadas as $value) {
                            $n++;
                            $id_compInter = $value['id_compInter'];
                            $NSG_compInter = $value['NSG_compInter'];
                            $resp_compInter = $value['resp_compInter'];
                            $nombre_seccion = $value['nombre_seccion'];
                            $seccion = $value['id_seccion'];
                            $probl_compInter = $value["probl_compInter"];
                            $compo_compInter = $value["compo_compInter"];
                            $entrega_compInter = $value["entrega_compInter"];
                            $usuarioSoporte = $value["usuario"]; // ✅ corregido
                            $id_modal = "#modal" . $id_compInter;
                            $modal = "modal" . $id_compInter;
                        ?>
                            <tr>
                                <td class="center"><?php echo $n; ?></td>
                                <td class="center">
                                    <span style="color:rgb(0, 0, 0); font-size: 14px;">
                                        <?php echo date("d/m/Y H:i", strtotime($value['fecha_creacion'])); ?>
                                    </span><br>
                                    <strong style="color:rgb(0, 0, 0);">Por: <?php echo $usuarioSoporte; ?></strong>
                                </td>
                                <td class="center"><?php echo $NSG_compInter; ?></td>
                                <td class="center"><?php echo $resp_compInter; ?></td>
                                <td class="center"><?php echo $nombre_seccion; ?></td>
                                <td class="center"><?php echo $probl_compInter; ?></td>
                                <td class="center"><?php echo $compo_compInter; ?></td>
                                <td class="center"><?php echo $entrega_compInter; ?></td>

                                <td class="center">
                                    <?php if (!empty($value['actualizado_el'])): ?>
                                        <span style="color:rgb(0, 0, 0); font-size: 14px;">
                                            <?php echo date("d/m/Y H:i", strtotime($value['actualizado_el'])); ?>
                                        </span><br>
                                        <strong style="color:rgb(0, 0, 0);">Por: <?php echo $value['usuario_modificador']; ?></strong> <!-- ✅ corregido -->
                                    <?php endif; ?>
                                </td>
                                <td class="center">
                                    <button type="button" class="btn btn-sm btn-warning bi bi-pencil-square"
                                        data-bs-toggle="modal" data-bs-target="<?php echo $id_modal; ?>"></button>
                                </td>
                                <td class="center">
                                    <button class="btn btn-danger btnEliminar bi bi-trash3"
                                        data-id="<?php echo $id_compInter; ?>"></button>
                                </td>
                            </tr>
                            <!-- Modal Editar -->
                            <div class="modal fade" id="<?php echo $modal; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="ComputadorasInternadas.php" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Computadoras Internadas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <input type="hidden" name="id_compInter" value="<?php echo $id_compInter; ?>">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="id_credencial">
                                                        <label for="formGroupExampleInput" class="form-label">NSG</label>
                                                        <input type="text" name="NSG_compInter" value="<?php echo $NSG_compInter; ?>" class="form-control" required>
                                                        <br>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">USUARIO RESPONSABLE</label>
                                                        <input type="text" name="resp_compInter" value="<?php echo $resp_compInter; ?>" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">DEPARTAMENTO</label>
                                                        <select class="form-select" name="id_seccion" required>
                                                            <?php
                                                            require_once("modelo/m_ComputadorasInternadas.php");
                                                            $secciones = ListarSecciones();
                                                            foreach ($secciones as $s) {
                                                                $selected = ($s['id_seccion'] == $seccion) ? "selected" : "";
                                                                echo "<option value='" . $s['id_seccion'] . "' $selected>" . htmlspecialchars($s['nombre_seccion']) . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">COMPONENTES</label>
                                                        <input type="text" name="compo_compInter" value="<?php echo $compo_compInter; ?>" class="form-control" required>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">ENTREGA</label>
                                                        <input type="text" name="entrega_compInter" value="<?php echo $entrega_compInter; ?>" class="form-control" >
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="formGroupExampleInput" class="form-label">PROBLEMA</label>
                                                        <textarea name="probl_compInter" class="form-control" required><?php echo htmlspecialchars($probl_compInter); ?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
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
                                <form action="ComputadorasInternadas_registrar.php" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Computadora Internada</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">NSG</label>
                                                <input type="text" name="NSG_compInter" class="form-control" required>
                                                <br>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">USUARIO RESPONSABLE</label>
                                                <input type="text" name="resp_compInter" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Departamento</label>
                                                <select class="form-select" name="id_seccion" required>
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    <?php
                                                    require_once("modelo/m_ComputadorasInternadas.php");
                                                    $secciones = ListarSecciones();
                                                    foreach ($secciones as $seccion) {
                                                        echo "<option value='{$seccion['id_seccion']}'>{$seccion['nombre_seccion']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">COMPONENTES</label>
                                                <input type="text" name="compo_compInter" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">ENTREGA</label>
                                                <input type="text" name="entrega_compInter" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">PROBLEMA</label>
                                                <textarea name="probl_compInter" class="form-control" required></textarea>
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
                    <!-- MODAL AGREGAR -->
                </table>
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
                    fetch("modelo/ComputadoraInternadas_eliminar.php", { // ✅ corregido
                            method: "POST",
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `id_compInter=${id}` // ✅ corregido
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === "SI") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Eliminado',
                                    text: 'La computadora internada ha sido eliminada correctamente',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No se pudo eliminar la computadora internada'
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
