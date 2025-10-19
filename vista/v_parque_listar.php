<!-- Begin Page Content -->
<div class="container-fluid">
    <style>
        .center { text-align: center; justify-content: center; }
        .nowrap { white-space: nowrap; }
    </style>

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-2 text-gray-800">Parque Informático</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarParque">Agregar</button>
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
                            <th class="table-secondary center">Fecha Creación / Creador</th>
                            <th class="table-secondary center">Sección</th>
                            <th class="table-secondary center">Grado</th>
                            <th class="table-secondary center">Responsable</th>
                            <th class="table-secondary center">CIP / DNI</th>
                            <th class="table-secondary center">Cargo o fuera de cargos</th>
                            <th class="table-secondary center">NSG</th>
                            <th class="table-secondary center">Descripción del artículo</th>
                            <!--th class="table-secondary center">Marca</th>
                            <th class="table-secondary center">Procesador</th>
                            <th class="table-secondary center">Generación</th>
                            <th class="table-secondary center">RAM</th>
                            <th class="table-secondary center">SSD</th>
                            <th class="table-secondary center">HDD</th-->
                            <th class="table-secondary center">SO</th>
                            <th class="table-secondary center">Antivirus</th>
                            <th class="table-secondary center">Situación</th>
                            <th class="table-secondary center">IP</th>
                            <!--th class="table-secondary center">Chasqui</th>
                            <th class="table-secondary center">MAC</th>
                            <th class="table-secondary center">Nombre de equipo</th-->
                            <th class="table-secondary center">Origen</th>
                            <th class="table-secondary center">Última Modificación</th>
                            <th class="table-secondary center">Editar</th>
                            <th class="table-secondary center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 0;
                        foreach ($parque as $value) {
                            $n++;
                            $id_equipo      = $value['id_equipo'];
                            $id_seccion     = $value['id_seccion'];
                            $seccion        = $value['seccion'];
                            $grado          = $value['grado'];
                            $responsable    = $value['responsable'];
                            $cip_dni        = $value['cip_dni'];
                            $cargo          = $value['cargo_fuera'];
                            $nsg            = $value['nsg'];
                            $descripcion    = $value['descripcion'];
                            $marca          = $value['marca'];
                            $procesador     = $value['procesador'];
                            $generacion     = $value['generacion'];
                            $ram            = $value['ram'];
                            $ssd            = $value['ssd'];
                            $hdd            = $value['hdd'];
                            $so             = $value['so'];
                            $antivirus      = $value['antivirus'];
                            $situacion      = $value['situacion'];
                            $ip             = $value['ip'];
                            $chasqui        = $value['chasqui'];
                            $mac            = $value['mac'];
                            $nombre_equipo  = $value['nombre_equipo'];
                            $origen         = $value['origen'];

                            // nuevos campos
                            $fecha_creacion     = $value['fecha_creacion'];
                            $creador            = $value['creador'];
                            $fecha_modificacion = $value['fecha_modificacion'];
                            $modificador        = $value['modificador'];

                            $id_modal = "#modal" . $id_equipo;
                            $modal    = "modal" . $id_equipo;
                            $id_modal_detalle  = "modalDetalle" . $id_equipo;
                        ?>
                            <tr>
                                <td class="center"><?php echo $n; ?></td>
                                <td class="center">
                                    <?php
                                    if (!empty($fecha_creacion)) {
                                        echo $fecha_creacion . "<br><b>Por: " . (!empty($creador) ? $creador : '—') . "</b>";
                                    } else {
                                        echo "—";
                                    }
                                    ?>
                                </td>
                                <td class="center"><?php echo $seccion; ?></td>
                                <td class="center"><?php echo $grado; ?></td>
                                <td class="center"><?php echo $responsable; ?></td>
                                <td class="center nowrap"><?php echo $cip_dni; ?></td>
                                <td class="center"><?php echo $cargo; ?></td>
                                <td class="center"><?php echo $nsg; ?></td>
                                <td class="center"><?php echo $descripcion; ?></td>
                                <!--td class="center"><?php echo $marca; ?></td>
                                <td class="center"><?php echo $procesador; ?></td>
                                <td class="center"><?php echo $generacion; ?></td>
                                <td class="center"><?php echo $ram; ?></td>
                                <td class="center"><?php echo $ssd; ?></td>
                                <td class="center"><?php echo $hdd; ?></td-->
                                <td class="center"><?php echo $so; ?></td>
                                <td class="center"><?php echo $antivirus; ?></td>
                                <td class="center"><?php echo $situacion; ?></td>
                                <td class="center nowrap"><?php echo $ip; ?></td>
                                <!--td class="center"><?php echo $chasqui; ?></td>
                                <td class="center nowrap"><?php echo $mac; ?></td>
                                <td class="center"><?php echo $nombre_equipo; ?></td-->
                                <td class="center"><?php echo $origen; ?></td>
                                <td class="center">
                                    <?php
                                    if (!empty($fecha_modificacion)) {
                                        echo $fecha_modificacion . "<br><b>Por: " . (!empty($modificador) ? $modificador : '—') . "</b>";
                                    } else {
                                        echo "—";
                                    }
                                    ?>
                                </td>
                                <td class="center">
                                    <button type="button" class="btn btn-sm btn-warning bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="<?php echo $id_modal; ?>"></button>
                                </td>
                               <td class="center">
                                    <button type="button" class="btn btn-sm btn-info text-white bi bi-eye-fill" data-bs-toggle="modal" data-bs-target="#<?php echo $id_modal_detalle; ?>"></button>
                                    <button type="button" class="text-dark btn btn-sm btn-danger bi bi-trash3" onclick="confirmarEliminacion(<?php echo $id_equipo; ?>)"></button>
                                </td>
                            </tr>
                            
                            <!-- MODAL DETALLE -->
                            <div class="modal fade" id="<?php echo $id_modal_detalle; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info text-white">
                                            <h5 class="modal-title">Detalles del Equipo (ID: <?php echo $id_equipo; ?>)</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-md-6"><label class="form-label fw-bold">Sección:</label> <p><?php echo $seccion; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Grado:</label> <p><?php echo $grado; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Responsable:</label> <p><?php echo $responsable; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">CIP/DNI:</label> <p><?php echo $cip_dni; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Cargo o fuera de cargos:</label> <p><?php echo $cargo; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">NSG:</label> <p><?php echo $nsg; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Descripción del artículo:</label> <p><?php echo $descripcion; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Marca:</label> <p><?php echo $marca; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Procesador:</label> <p><?php echo $procesador; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Generación:</label> <p><?php echo $generacion; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">RAM:</label> <p><?php echo $ram; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">SSD:</label> <p><?php echo $ssd; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">HDD:</label> <p><?php echo $hdd; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Sistema Operativo:</label> <p><?php echo $so; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Antivirus:</label> <p><?php echo $antivirus; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Situación:</label> <p><?php echo $situacion; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">IP:</label> <p><?php echo $ip; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Chasqui:</label> <p><?php echo $chasqui; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">MAC:</label> <p><?php echo $mac; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Nombre de equipo:</label> <p><?php echo $nombre_equipo; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Origen:</label> <p><?php echo $origen; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Fecha Creación:</label> <p><?php echo $fecha_creacion . " (" . $creador . ")"; ?></p></div>
                                                <div class="col-md-6"><label class="form-label fw-bold">Última Modificación:</label> <p><?php echo $fecha_modificacion . " (" . $modificador . ")"; ?></p></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- MODAL EDITAR -->
                            <div class="modal fade" id="<?php echo $modal; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <form action="ParqueInformatico.php" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Registro</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id_equipo" value="<?php echo $id_equipo; ?>">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Sección</label>
                                                        <select name="id_seccion" class="form-control" required>
                                                            <option value="">Seleccione...</option>
                                                            <?php foreach ($secciones as $s) { ?>
                                                                <option value="<?php echo $s['id_seccion']; ?>" <?php if ($s['nombre_seccion'] == $seccion) echo "selected"; ?>>
                                                                    <?php echo $s['nombre_seccion']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tipo de Artículo</label>
                                                        <input type="text" name="tipo_articulo" value="<?php echo $value['tipo_articulo']; ?>" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6"><label class="form-label">Grado</label><input type="text" name="grado" value="<?php echo $grado; ?>" class="form-control" required></div>
                                                    <div class="col-md-6"><label class="form-label">Responsable</label><input type="text" name="responsable" value="<?php echo $responsable; ?>" class="form-control" required></div>
                                                    <div class="col-md-6"><label class="form-label">CIP/DNI</label><input type="text" name="cip_dni" value="<?php echo $cip_dni; ?>" class="form-control" required></div>
                                                    <div class="col-md-6"><label class="form-label">Cargo</label><input type="text" name="cargo_fuera" value="<?php echo $cargo; ?>" class="form-control" required></div>
                                                    <div class="col-md-6"><label class="form-label">NSG</label><input type="text" name="nsg" value="<?php echo $nsg; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">Descripción</label><input type="text" name="descripcion_articulo" value="<?php echo $descripcion; ?>" class="form-control" required></div>
                                                    <div class="col-md-6"><label class="form-label">Marca</label><input type="text" name="marca" value="<?php echo $marca; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">Procesador</label><input type="text" name="procesador" value="<?php echo $procesador; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">Generación</label><input type="text" name="generacion" value="<?php echo $generacion; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">RAM</label><input type="text" name="ram" value="<?php echo $ram; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">SSD</label><input type="text" name="ssd" value="<?php echo $ssd; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">HDD</label><input type="text" name="hdd" value="<?php echo $hdd; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">SO</label><input type="text" name="so" value="<?php echo $so; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">Antivirus</label><input type="text" name="antivirus" value="<?php echo $antivirus; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">Situación</label><input type="text" name="situacion" value="<?php echo $situacion; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">IP</label><input type="text" name="ip" value="<?php echo $ip; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">Chasqui</label><input type="text" name="chasqui" value="<?php echo $chasqui; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">MAC</label><input type="text" name="mac" value="<?php echo $mac; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">Nombre Equipo</label><input type="text" name="nombre_equipo" value="<?php echo $nombre_equipo; ?>" class="form-control"></div>
                                                    <div class="col-md-6"><label class="form-label">Origen</label><input type="text" name="origen" value="<?php echo $origen; ?>" class="form-control"></div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" name="actualizar" value="1" class="btn btn-primary">Actualizar</button>
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

<!-- Modal Agregar Parque Informático -->
<div class="modal fade" id="modalAgregarParque" tabindex="-1" aria-labelledby="modalAgregarParqueLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalAgregarParqueLabel">Agregar Registro al Parque Informático</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <form id="formAgregarParque" method="POST" action="ParqueInformatico.php">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Sección</label>
                            <select name="id_seccion" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <?php foreach ($secciones as $s) { ?>
                                    <option value="<?php echo $s['id_seccion']; ?>">
                                        <?php echo $s['nombre_seccion']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tipo de Artículo</label>
                            <input type="text" class="form-control" name="tipo_articulo" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Grado</label>
                            <input type="text" class="form-control" name="grado" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Responsable</label>
                            <input type="text" class="form-control" name="responsable" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">CIP / DNI</label>
                            <input type="text" class="form-control" name="cip_dni" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Cargo o fuera de cargos</label>
                            <input type="text" class="form-control" name="cargo_fuera" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">NSG</label>
                            <input type="text" class="form-control" name="nsg">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Descripción del artículo</label>
                            <input type="text" class="form-control" name="descripcion_articulo" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Marca</label>
                            <input type="text" class="form-control" name="marca">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Procesador</label>
                            <input type="text" class="form-control" name="procesador">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Generación</label>
                            <input type="text" class="form-control" name="generacion">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">RAM</label>
                            <input type="text" class="form-control" name="ram">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">SSD</label>
                            <input type="text" class="form-control" name="ssd">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">HDD</label>
                            <input type="text" class="form-control" name="hdd">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Sistema Operativo</label>
                            <input type="text" class="form-control" name="so">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Antivirus</label>
                            <input type="text" class="form-control" name="antivirus">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Situación</label>
                            <input type="text" class="form-control" name="situacion">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">IP</label>
                            <input type="text" class="form-control" name="ip">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Chasqui</label>
                            <input type="text" class="form-control" name="chasqui">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">MAC</label>
                            <input type="text" class="form-control" name="mac">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nombre de Equipo</label>
                            <input type="text" class="form-control" name="nombre_equipo">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Origen</label>
                            <input type="text" class="form-control" name="origen">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="registrar" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
