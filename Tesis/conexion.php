<?php
$conexion = mysqli_connect("localhost", "root", "", "tess");

if (!$conexion) {
  die("Error de conexión: " . mysqli_connect_error());
}
?>