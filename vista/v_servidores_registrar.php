<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

 <!--MODAL DE AGREGAR INCIDENCIAS-->
<div class="card-header" style="background: #fafafa;">
        <span class="me-3"></span>
        <i class="fa fa-file-alt me-2 h5"></i><span class="h5">Registro de Servidores</span>                 
</div>
 <div class="card mb-4">
    <div class="card-body" style="background: #fafafa;">
        <form id="formServidor">
            <div class="row g-3">
                <!--input type="hidden" name="id_soporte" value="<?php echo $_SESSION['id_usuario']; ?>"-->
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">NOMBRE DEL SERVIDOR (IP)</label>
                    <input type="text" name="nombre_servidor" class="form-control"  aria-label="NOMBRE DEL SERVIDOR (IP)" required="required">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">USUARIO SERVIDOR</label>
                    <input type="text" name="user" class="form-control"  aria-label="USUARIO SERVIDOR" required="required">
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">CONTRASEÑA DEL SERVIDOR</label>
                    <input type="text" name="contrasena" class="form-control" aria-label="CONTRASEÑA DEL SERVIDOR" required="required">
                    <br>
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">DESCRIPCION</label>
                    <input type="text" name="descripcion" class="form-control" aria-label="DESCRIPCION" required="required">
                </div>
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">USUARIO SOPORTE QUIEN REGISTRA</label>
                    <input type="text" name="usuario" value="<?php  echo $_SESSION['usuario']; ?>" class="form-control" aria-label="RESPONSABLE" required="required">
                    <br>
                </div>
                <div class="col-md-12">
                    <button type="submit" name="registrar" class="btn btn-secondary" style="justify-content: center; text-align: center; display: flex; align-items: center; margin: auto; width: 100px; height: 50px; padding: 0;">Agregar</button>
                </div>                   
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById("formServidor").addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("modelo/servidores_guardar.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "SI") {
            Swal.fire({
                icon: 'success',
                title: 'Servidor registrado',
                text: 'El servidor ha sido registrado correctamente',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo registrar el servidor'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un problema en el servidor'
        });
    });
});
</script>
