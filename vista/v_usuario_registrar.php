<div class="card-header" style="background: #fafafa;">
        <span class="me-3"></span>
        <i class="fa fa-file-alt me-2 h5"></i><span class="h5">Registro de Usuarios</span>                 
        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>Registro de Usuarios                   
        </div>
        <div class="card-body">
            <form action="usuario_registrar.php" method="post"  enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-5">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombres" aria-label="Nombres" required="required">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" aria-label="Apellido" required="required">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="usuario" class="form-control" placeholder="Usuario" aria-label="Usuario" required="required">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="contrasena" class="form-control" placeholder="Contraseña" aria-label="Contraseña" required="required">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="registrar" class="btn btn-primary">Regisrar</button>

                    </div>
                </div>
            </form>
           
        </div>
    </div>
</div>