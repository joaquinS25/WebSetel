<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cerrando sesión...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
Swal.fire({
    icon: 'success',
    title: 'Sesión cerrada correctamente',
    text: 'Serás redirigido al inicio.',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true
}).then(() => {
    window.location.href = 'index.php';
});
</script>
</body>
</html>
