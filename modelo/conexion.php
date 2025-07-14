<?php
date_default_timezone_set('America/Lima');
$con = mysqli_connect("localhost", "root", "", "setel", "3306");

// Establecer zona horaria en MySQL también
mysqli_query($con, "SET time_zone = '-05:00'");
?>
