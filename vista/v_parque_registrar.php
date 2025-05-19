
 <!--MODAL DE AGREGAR INCIDENCIAS-->
<div class="card-header" style="background: #fafafa;">
        <span class="me-3"></span>
        <i class="fa fa-file-alt me-2 h5"></i><span class="h5">Registro de Parque Informatico</span>                 
</div>
 <div class="card mb-4">
    <div class="card-body" style="background: #fafafa;">
        <form action="parqueInformaticoRegistrar.php" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Tipo de producto</label>
                    <input type="text" name="Tipo_producto" class="form-control"  aria-label="TIPO DE PRODUCTO" required="required">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">NSG</label>
                    <input type="text" name="nsg" class="form-control"  aria-label="NSG" required="required">
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" aria-label="DESCRIPCION" required="required">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">IP (10.64.xx.xx)</label>
                    <input type="text" name="ip" class="form-control" aria-label="IP" required="required">
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Dependencia</label>
                    <select class="form-select" name="seccion" aria-label="Default select example" id ="formGroupExampleInput" required oninvalid="this.setCustomValidity('Elija una dependencia.')" oninput="this.setCustomValidity('')">
                        <option value="" class="bg-secondary">Seleccionar</option>
                        <?php
                        require_once("modelo/m_parque.php");
                        $secciones = ListarSecciones(); // Llamar a la función
                        foreach ($secciones as $seccion) {
                            echo "<option value='{$seccion['id_seccion']}'>{$seccion['nombre_seccion']}</option>";
                        }
                    ?>
                    </select>
                    <br>
                </div>
                
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Responsable</label>
                    <input type="text" name="responsable" class="form-control" aria-label="RESPONSABLE" required="required">
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Antivirus instalado</label>    
                    <select class="form-select form-control" name="AntInst" aria-label="Default select example">
                        <option selected>Seleccionar</option>
                        <option item="1">Si</option>
                        <option item="2">No</option>
                    </select>
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Antivirus actualizado</label>    
                    <select class="form-select form-control" name="AntAct" aria-label="Default select example">
                        <option selected>Seleccionar</option>
                        <option item="1">Si</option>
                        <option item="2">No</option>
                        
                    </select>
                </div>
                <div class="col-md-12 text-center">
                    <label for="formGroupExampleInput" class="form-label">Nombre de Equipo</label> 
                    <input type="text" name="NomEquipo" class="col-md-5 form-control" aria-label="NOMBRE EQUIPO" required="required" style="margin: auto; text-align: center; padding-left: 0; padding-right: 0;">
                    <br>
                </div>
                

                <div class="col-md-12">
                    <button type="submit" name="registrar" class="btn btn-secondary" style="justify-content: center; text-align: center; display: flex; align-items: center; margin: auto; width: 100px; height: 50px; padding: 0;">Agregar</button>
                </div>                   
            </div>
        </form>
    </div>
</div>
