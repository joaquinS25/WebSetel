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
                                            $n=0;
                                            foreach($parque as $hey => $value)
                                            {
                                                $n++;
                                                $id_equipo = $value['id_equipo'];
                                                $tipo_articulo = $value['tipo_articulo'];
                                                $nsg = $value['nsg'];
                                                $descripcion = $value['descripcion'];
                                                $nombre_equipo = $value["nombre_equipo"];
                                                $ip = $value["ip"];
                                                $nombre_seccion = $value["nombre_seccion"];
                                                $responsable = $value["responsable"];
                                                $antivirus_instalado = $value["antivirus_instalado"];
                                                $antivirus_activo = $value["antivirus_activo"];
                                                $nombre_equipo = $value["nombre_equipo"];
                                                
                                                ?>
                                                <tr>
                                                    <td class="center"><?php echo $n; ?></td>
                                                    <td class="center"><?php echo $tipo_articulo; ?></td>
                                                    <td class="center"><?php echo $nsg; ?></td>
                                                    <td class="center"><?php echo $descripcion;?></td>
                                                    <td class="center"><?php echo $nombre_equipo; ?></td>
                                                    <td class="center"><?php echo $ip; ?></td>
                                                    <td class="center"><?php echo $nombre_seccion; ?></td>
                                                    <td class="center"><?php echo $responsable; ?></td>
                                                    <td class="center"><?php echo $antivirus_instalado; ?></td>
                                                    <td class="center"><?php echo $antivirus_activo; ?></td>
                                                    
                                                    <form action="ParqueInformatico.php" method="post">
                                                    <td class="center">
                                                        <button name="editar" type="submit" value="<?php echo $id_equipo; ?>" class="text-dark btn btn-sm btn-warning bi bi-pencil-square"></button>
                                                    </td>
                                                    <td class="center">
                                                        <button name="eliminar" type="submit"  value="<?php echo $id_equipo; ?>" class="text-dark btn btn-sm btn-danger bi bi-trash3" onclick="return confirm('Estas seguro de eliminar?');"></button>
                                                    </td>
                                                    </form>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>

                    </div>
                   