<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conexion = new mysqli('localhost', 'root', '', 'descubre_cuenca');
$conexion->set_charset('utf8mb4');
?>