
 <!--MODAL DE AGREGAR INCIDENCIAS-->
<div class="card-header" style="background: #fafafa;">
        <span class="me-3"></span>
        <i class="fa fa-file-alt me-2 h5"></i><span class="h5">Editar</span>                 
</div>
 <div class="card mb-4">
    <div class="card-body" style="background: #fafafa;">
        <form action="parqueInformaticoEditar.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                     <input type="hidden" name="id_equipo" value="<?php echo $id_equipo; ?>">
                    <label for="formGroupExampleInput"  class="form-label">Tipo de producto</label>
                    <input type="text" name="tipo_producto" value="<?php echo $Tipo_producto; ?>" class="form-control"  aria-label="TIPO DE PRODUCTO" required="required">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">NSG</label>
                    <input type="text" name="nsg" value="<?php echo $nsg; ?>" class="form-control"  aria-label="NSG" required="required">
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Descripción</label>
                    <input type="text" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control" aria-label="DESCRIPCION" required="required">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">IP (10.64.xx.xx)</label>
                    <input type="text" name="ip" value="<?php echo $ip; ?>" class="form-control" aria-label="IP" required="required">
                </div>
                <div class="col-md-6">
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

                
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Responsable</label>
                    <input type="text" name="responsable" value="<?php echo $responsable; ?>" class="form-control" aria-label="RESPONSABLE" required="required">
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Antivirus instalado</label>    
                    <select class="form-select form-control" id="antivirus_instalado" name="antivirus_instalado" aria-label="Default select example">
                    <option value="1" <?php echo $ai1 ?> >SI</option>
                    <option value="0" <?php echo $ai0 ?> >NO</option>

                    </select>

                    <br>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Antivirus actualizado</label>    
                    <select class="form-select form-control" id="antivirus_activo" name="antivirus_activo" aria-label="Default select example">
                        <option value="1" <?php echo $aac1 ?> >SI</option>
                        <option value="0" <?php echo $aac0 ?> >NO</option>
                    </select>
                </div>
                <div class="col-md-12 text-center">
                    <label for="formGroupExampleInput" class="form-label">Nombre de Equipo</label> 
                    <input type="text" name="nombre_equipo" value="<?php echo $NomEquipo; ?>" class="col-md-5 form-control" aria-label="NOMBRE EQUIPO" required="required" style="margin: auto; text-align: center; padding-left: 0; padding-right: 0;">
                    <br>
                </div>
                <div class="col-md-12">
                    <button type="submit" name="actualizar" class="btn btn-secondary" style="justify-content: center; text-align: center; display: flex; align-items: center; margin: auto; width: 100px; height: 50px; padding: 0;">ACTUALIZAR</button>
                </div>                   
            </div>
        </form>
    </div>
</div>
