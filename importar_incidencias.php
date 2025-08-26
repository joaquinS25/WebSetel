<?php

use Shuchkin\SimpleXLSX;

require_once "librerias/simplexlsx/SimpleXLSX.php"; // Asegúrate de que esté en tu proyecto
require_once "modelo/conexion.php"; // Tu conexión a MySQL

session_start();
$id_soporte = $_SESSION['id_soporte']; // Usuario logueado

if (isset($_FILES['archivo_excel']['tmp_name'])) {
    $xlsx = new SimpleXLSX($_FILES['archivo_excel']['tmp_name']);

    if ($xlsx->success()) {
        $rows = $xlsx->rows();

        // Saltamos la primera fila (encabezados)
        for ($i = 1; $i < count($rows); $i++) {
            $fila = $rows[$i];

            $usuarioSolicitante = $fila[0]; // Columna A
            $dependencia = strtoupper(trim($fila[1])); // Columna B
            $motivo = $fila[2]; // Columna C
            $servicio = $fila[3]; // Columna D
            $estado = $fila[4]; // Columna E
            $fechaExcel = $fila[5]; // Columna F

            // Convertir fecha de Excel dd/mm/yyyy a formato MySQL yyyy-mm-dd
            $fecha_inicio = DateTime::createFromFormat('d/m/Y', $fechaExcel);
            $fecha_inicio = $fecha_inicio ? $fecha_inicio->format('Y-m-d') : null;

            // Buscar id_seccion en tu tabla secciones
            $id_seccion = null;
            $stmt = $con->prepare("SELECT id_seccion FROM secciones WHERE UPPER(nombre_seccion) = ?");
            $stmt->bind_param("s", $dependencia);
            $stmt->execute();
            $stmt->bind_result($id_seccion);
            $stmt->fetch();
            $stmt->close();

            if ($id_seccion) {
                $sql = "INSERT INTO incidencias 
                        (id_seccion, nombre_afectado, problema, fecha_inicio, estado, observaciones, fecha_creacion, id_soporte_creacion)
                        VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("isssssi", $id_seccion, $usuarioSolicitante, $servicio, $fecha_inicio, $estado, $motivo, $id_soporte);
                $stmt->execute();
                $stmt->close();
            }
        }
        echo "✅ Importación completada";
    } else {
        echo "❌ Error al leer el archivo: " . $xlsx->error();
    }
}
?>
