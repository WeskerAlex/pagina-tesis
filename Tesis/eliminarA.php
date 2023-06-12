<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el registro de la base de datos
    $sql = "DELETE FROM admins WHERE ID='$id'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script lenguage='JavaScript'>
        alert('Registro eliminado');
        location.assign('admin.php');
        </script>";
    } else {
        echo "<script lenguage='JavaScript'>
        alert('Error al eliminar el registro');
        location.assign('admin.php');
        </script>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>