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
        <h1 class="h3 text-gray-800 mb-0">COMPUTADORAS DONADAS POR OTROS DEPARTAMENTOS Y ASIGNADAS A USUARIOS DE LA OEE</h1>
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
                            <th class="table-secondary center">DEPARTAMAENTO</th>
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
                            $usuarioSoporte = $value["usuario"];
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
                                        <strong style="color:rgb(0, 0, 0);">Por: <?php echo $value['actualizado_por']; ?></strong>
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
                                        <form action="ComputadorasDonadas.php" method="post">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Computadoras Donadas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <input type="hidden" name="IdCompDonadas" value="<?php echo $IdCompDonadas; ?>">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="id_credencial">
                                                        <label for="formGroupExampleInput" class="form-label">ENCARGADO</label>
                                                        <input type="text" name="EncCompDonadas" value="<?php echo $EncCompDonadas; ?>" class="form-control" aria-label="ENCARGADO" required="required">
                                                        <br>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">NSG</label>
                                                        <input type="text" name="NSGCompDonadas" value="<?php echo $NSGCompDonadas; ?>" class="form-control" aria-label="NSG" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">DEPARTAMENTO</label>
                                                        <input type="text" name="DepCompDonadas" value="<?php echo $DepCompDonadas; ?>" class="form-control" aria-label="DEPARTAMENTO" required="required">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">PROBLEMA</label>
                                                        <input type="text" name="ProbCompDonadas" value="<?php echo $ProbCompDonadas; ?>" class="form-control" aria-label="PROBLEMA" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">TIPO DE ESTADIA</label>
                                                        <!--input type="text" name="EstadiaCompDonadas" class="form-control" aria-label="TIPO DE ESTADIA" required="required"-->
                                                        <select class="form-select" name="EstadiaCompDonadas" required>
                                                            <?php foreach (['ENTREGADO', 'INTERNADO'] as $tipo) {
                                                                $sel = ($tipo == $EstadiaCompDonadas) ? 'selected' : '';
                                                                echo "<option value='$tipo' $sel>$tipo</option>";
                                                            } ?>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">USUARIO ASIGNADO</label>
                                                        <input type="text" name="UsuAsigCompDonadas" value="<?php echo $UsuAsigCompDonadas; ?>" class="form-control" aria-label="USUARIO ASIGNADO" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">DESCRIPCION</label>
                                                        <input type="text" name="DescCompDonadas" value="<?php echo $DescCompDonadas; ?>" class="form-control" aria-label="DESCRIPCION" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">PROCESADOR</label>
                                                        <input type="text" name="ProcCompDonadas" value="<?php echo $ProcCompDonadas; ?>" class="form-control" aria-label="PROCESADOR" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">GENERACION</label>
                                                        <input type="text" name="GenCompDonadas" value="<?php echo $GenCompDonadas; ?>" class="form-control" aria-label="GENERACION" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">RAM</label>
                                                        <input type="text" name="RAMCompDonadas" value="<?php echo $RAMCompDonadas; ?>" class="form-control" aria-label="RAM" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">DISCO DURO</label>
                                                        <input type="text" name="DiscoDuroCompDonadas" value="<?php echo $DiscoDuroCompDonadas; ?>" class="form-control" aria-label="DISCO DURO" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formGroupExampleInput" class="form-label">MODELO</label>
                                                        <input type="text" name="ModCompDonadas" value="<?php echo $ModCompDonadas; ?>" class="form-control" aria-label="MODELO" required="required">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="formGroupExampleInput" class="form-label">OBSERVACIONES</label>
                                                        <textarea name="OBSCompDonadas" class="form-control" aria-label="OBSERVACIONES" required="required"><?php echo htmlspecialchars($OBSCompDonadas); ?></textarea>

                                                        </textarea>

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
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="ComputadorasDonadas_registrar.php" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Computadora Internada</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <input type="hidden" name="id_credencial">
                                                <label for="formGroupExampleInput" class="form-label">NSG</label>
                                                <input type="text" name="NSG_compInter" class="form-control" aria-label="NSG" required="required">
                                                <br>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">USUARIO RESPONSABLE</label>
                                                <input type="text" name="resp_compInter" class="form-control" aria-label="USUARIO RESPONSABLE" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">DEPARTAMENTO</label>
                                                <input type="text" name="seccion" class="form-control" aria-label="DEPARTAMENTO" required="required">
                                                <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">PROBLEMA</label>
                                                <input type="text" name="probl_compInter" class="form-control" aria-label="PROBLEMA" required="required">
                                            </div>
                                           
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">COMPONENTES</label>
                                                <input type="text" name="compo_compInter" class="form-control" aria-label="USUARIO ASIGNADO" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">ENTREGA</label>
                                                <input type="text" name="entrega_compInter" class="form-control" aria-label="DESCRIPCION" required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" name="registrar" value="<?php echo $id_compInter; ?>" class="btn btn-primary">Agregar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL AGREGAR -->
                    </tbody>
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
                    fetch("modelo/ComputadoraDonadas_eliminar.php", {
                            method: "POST",
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `IdCompDonadas=${id}` // <- CORRECTO
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === "SI") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Eliminado',
                                    text: 'La computadora donada ha sido eliminado correctamente',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No se pudo eliminar la computadora donada'
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