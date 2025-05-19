<div class="card-header" style="background: #fafafa;">
        <span class="me-3"></span>
        <i class="fa fa-file-alt me-2 h5"></i><span class="h5">Edicion de Usuarios</span>                 
        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>Edicion de Usuarios                   
        </div>
        <div class="card-body">
            <form action="usuarioEditar.php" method="post"  enctype="multipart/form-data">
                <div class="row g-3">
                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                    <div class="col-md-5">
                        <input type="text" name="nombre" value="<?php echo $nom_usuario; ?>" class="form-control" placeholder="Nombre" aria-label="Nombre" required="required">
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="apellido" value="<?php echo $ape_usuario; ?>" class="form-control" placeholder="Apellido" aria-label="Apellido" required="required">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="usuario" value="<?php echo $user_usuario; ?>" class="form-control" placeholder="Usuario" aria-label="Usuario" required="required">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="contrasena" value="<?php echo $pass_usuario; ?>" class="form-control" placeholder="Contraseña" aria-label="Contraseña" required="required">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>

                    </div>
                </div>
            </form>
           
        </div>
    </div>
</div>