<?php
session_start();
require("modelo/m_usuario.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SETEL 2025</title>
    <?php require("vista/estilos.php"); ?>
    <style>
        .hidden { display: none; }
        .containerr { max-width: 1600px; background: #fafafa; }
        .inputd:disabled { border: none; background: transparent; color: black; outline: none; }
        .posicion { margin-right: 16%; }
    </style>
</head>
<body>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const campos = [
        document.getElementById("nombreid"),
        document.getElementById("apellidoid"),
        document.getElementById("nombreuid"),
        document.getElementById("contraid")
    ];

    const editable = document.getElementById("editable");
    const cancelable = document.getElementById("cancelable");
    const guardable = document.getElementById("guardable");
    const regresable = document.getElementById("regresable");

    let valoresOriginales = campos.map(input => input.value);

    editable.addEventListener("click", function () {
        valoresOriginales = campos.map(input => input.value);
        campos.forEach(input => input.removeAttribute("readonly"));
        editable.classList.add("hidden");
        cancelable.classList.remove("hidden");
        guardable.classList.remove("hidden");
        regresable.classList.add("hidden");
    });

    guardable.addEventListener("click", function () {
        campos.forEach(input => input.setAttribute("readonly", true));
        editable.classList.remove("hidden");
        cancelable.classList.add("hidden");
        guardable.classList.add("hidden");
        regresable.classList.remove("hidden");
    });

    cancelable.addEventListener("click", function () {
        campos.forEach((input, index) => {
            input.value = valoresOriginales[index];
            input.setAttribute("readonly", true);
        });
        editable.classList.remove("hidden");
        cancelable.classList.add("hidden");
        guardable.classList.add("hidden");
        regresable.classList.remove("hidden");
    });
});
</script>

<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column" style="background-color: gray;">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-dark topbar static-top shadow justify-content-center">
                <div class="navbar-brand">
                    <h2 class="text-light">SETEL - OEE</h2>
                </div>
            </nav>
        </div>

        <div class="container containerr">
            <form action="perfil_editar.php" method="post">
                <div class="row mt-5 py-3">
                    <h2>Perfil</h2>
                </div>
                <hr>

                <!-- ID del usuario -->
                <input type="hidden" name="id_usuario" value="<?php echo isset($_SESSION['id_soporte']) ? $_SESSION['id_soporte'] : ''; ?>">
                <input type="hidden" name="id_rol" value="<?php echo $_SESSION['id_rol']; ?>">
                <!-- Nombres -->
                <div class="row">
                    <label for="nombreid">Nombres</label>
                </div>
                <div class="row col-3">
                    <input id="nombreid" type="text" name="nombre" class="editable form-control inputd" readonly 
                        value="<?php echo isset($_SESSION['nom_session']) ? $_SESSION['nom_session'] : ''; ?>">
                </div>

                <br><br>

                <!-- Apellidos -->
                <div class="row">
                    <label for="apellidoid">Apellidos</label>
                </div>
                <div class="row col-3">
                    <input class="editable form-control inputd" type="text" id="apellidoid" name="apellido" readonly 
                        value="<?php echo isset($_SESSION['ape_session']) ? $_SESSION['ape_session'] : ''; ?>">
                </div>

                <br><br>

                <!-- Usuario -->
                <div class="row">
                    <label for="nombreuid">Nombre de usuario</label>
                </div>
                <div class="row col-3">
                    <input class="editable form-control inputd" type="text" id="nombreuid" name="usuario" readonly 
                        value="<?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?>">
                </div>

                <br><br>

                <!-- Contraseña -->
                <div class="row">
                    <label for="contraid">Contraseña</label>
                </div>
                <div class="row col-3">
                    <input class="editable form-control inputd" type="password" id="contraid" name="contrasena" readonly 
                        value="<?php echo isset($_SESSION['contrasena']) ? $_SESSION['contrasena'] : ''; ?>">
                </div>

                <br>
                <div class="row py-4">
                    <div class="col-9"></div>
                    <div class="col-3 text-end">
                        <a type="button" class="btn btn-secondary me-5" id="editable">Editar</a>
                        <a href="inicio.php" class="btn btn-secondary" id="regresable">Regresar</a>
                        <a type="button" class="btn btn-secondary hidden" id="cancelable">Cancelar</a>
                        <button type="submit" name="actualizarPerfil" class="btn btn-secondary hidden" id="guardable">Guardar</button>
                    </div>
                </div>
            </form>
            <br><br><br><br><br>
        </div>

        <footer class="sticky-footer bg-white">
            <div class="my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Página protegida por derechos de autor 2025</span>
                </div>
            </div>
        </footer>
    </div>
</div>

<?php require("vista/scripts.php"); ?>
</body>
</html>
