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
                            <!--th class="table-secondary center">ENCARGADO</th-->
                            <th class="table-secondary center">NSG</th>
                            <th class="table-secondary center">DEPARTAMENTO</th>
                            <th class="table-secondary center">PROBLEMA</th>
                            <th class="table-secondary center">TIEMPO DE ESTADIA</th>
                            <th class="table-secondary center">USUARIO ASIGNADO</th>
                            <th class="table-secondary center">DESCRIPCION</th>
                            <!--th class="table-secondary center">PROCESADOR</th>
                            <th class="table-secondary center">GENERACION</th>
                            <th class="table-secondary center">RAM</th>
                            <th class="table-secondary center">DISCO DURO</th>
                            <th class="table-secondary center">MODELO</th-->
                            <th class="table-secondary center">OBSERVACIONES</th>
                            <th class="table-secondary center">Modificado</th>
                            <th class="table-secondary center">Editar</th>
                            <th class="table-secondary center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 0;

                        foreach ($computadorasDonadas as $value) {
                            $n++;
                            $IdCompDonadas = $value['IdCompDonadas'];
                            $EncCompDonadas = $value['EncCompDonadas'];
                            $NSGCompDonadas = $value['NSGCompDonadas'];
                            $DepCompDonadas = $value['DepCompDonadas'];
                            $ProbCompDonadas = $value["ProbCompDonadas"];
                            $EstadiaCompDonadas = $value["EstadiaCompDonadas"];
                            $UsuAsigCompDonadas = $value["UsuAsigCompDonadas"];
                            $DescCompDonadas = $value["DescCompDonadas"];
                            $ProcCompDonadas = $value["ProcCompDonadas"];
                            $GenCompDonadas = $value["GenCompDonadas"];
                            $RAMCompDonadas = $value["RAMCompDonadas"];
                            $DiscoDuroCompDonadas = $value["DiscoDuroCompDonadas"];
                            $ModCompDonadas = $value["ModCompDonadas"];
                            $OBSCompDonadas = $value["OBSCompDonadas"];
                            $usuarioSoporte = $value["usuario"];
                            $id_modal = "#modal" . $IdCompDonadas;
                            $modal = "modal" . $IdCompDonadas;
                        ?>
                            <tr>
                                <td class="center"><?php echo $n; ?></td>
                                <td class="center">
                                    <span style="color:rgb(0, 0, 0); font-size: 14px;">
                                        <?php echo date("d/m/Y H:i", strtotime($value['fecha_creacion'])); ?>
                                    </span><br>
                                    <strong style="color:rgb(0, 0, 0);">Por: <?php echo $usuarioSoporte; ?></strong>
                                </td>
                                <!--td class="center"><?php echo $EncCompDonadas; ?></td-->
                                <td class="center"><?php echo $NSGCompDonadas; ?></td>
                                <td class="center"><?php echo $DepCompDonadas; ?></td>
                                <td class="center"><?php echo $ProbCompDonadas; ?></td>
                                <td class="center"><?php echo $EstadiaCompDonadas; ?></td>
                                <td class="center"><?php echo $UsuAsigCompDonadas; ?></td>
                                <td class="center"><?php echo $DescCompDonadas; ?></td>
                                <!--td class="center"><?php echo $ProcCompDonadas; ?></td>
                                <td class="center"><?php echo $GenCompDonadas; ?></td>
                                <td class="center"><?php echo $RAMCompDonadas; ?></td>
                                <td class="center"><?php echo $DiscoDuroCompDonadas; ?></td>
                                <td class="center"><?php echo $ModCompDonadas; ?></td-->
                                <td class="center"><?php echo $OBSCompDonadas; ?></td>

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
                                        data-id="<?php echo $IdCompDonadas; ?>"></button>
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
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Computadora Donada</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <input type="hidden" name="id_credencial">
                                                <label for="formGroupExampleInput" class="form-label">ENCARGADO</label>
                                                <input type="text" name="EncCompDonadas" class="form-control" aria-label="ENCARGADO" required="required">
                                                <br>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">NSG</label>
                                                <input type="text" name="NSGCompDonadas" class="form-control" aria-label="NSG" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">DEPARTAMENTO</label>
                                                <input type="text" name="DepCompDonadas" class="form-control" aria-label="DEPARTAMENTO" required="required">
                                                <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">PROBLEMA</label>
                                                <input type="text" name="ProbCompDonadas" class="form-control" aria-label="PROBLEMA" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">TIPO DE ESTADIA</label>
                                                <!--input type="text" name="EstadiaCompDonadas" class="form-control" aria-label="TIPO DE ESTADIA" required="required"-->
                                                <select class="form-select" name="EstadiaCompDonadas" required>
                                                    <option value="" disabled selected>Seleccionar</option>
                                                    <option value="ENTREGADO">ENTREGADO</option>
                                                    <option value="INTERNADO">INTERNADO</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">USUARIO ASIGNADO</label>
                                                <input type="text" name="UsuAsigCompDonadas" class="form-control" aria-label="USUARIO ASIGNADO" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">DESCRIPCION</label>
                                                <input type="text" name="DescCompDonadas" class="form-control" aria-label="DESCRIPCION" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">PROCESADOR</label>
                                                <input type="text" name="ProcCompDonadas" class="form-control" aria-label="PROCESADOR" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">GENERACION</label>
                                                <input type="text" name="GenCompDonadas" class="form-control" aria-label="GENERACION" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">RAM</label>
                                                <input type="text" name="RAMCompDonadas" class="form-control" aria-label="RAM" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">DISCO DURO</label>
                                                <input type="text" name="DiscoDuroCompDonadas" class="form-control" aria-label="DISCO DURO" required="required">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="formGroupExampleInput" class="form-label">MODELO</label>
                                                <input type="text" name="ModCompDonadas" class="form-control" aria-label="MODELO" required="required">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="formGroupExampleInput" class="form-label">OBSERVACIONES</label>
                                                <textarea type="text" name="OBSCompDonadas" class="form-control" aria-label="OBSERVACIONES" required="required">
                                                    </textarea>

                                            </div>
                                        </div>
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