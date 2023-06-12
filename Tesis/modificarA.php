<?php
include("conexion.php");

if (isset($_POST['enviar'])) {
    // Obtener los valores del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $ap = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE admins SET Nombre='$nombre', Apellidos='$ap', Correo='$correo', Contraseña='$contrasena' WHERE ID='$id'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "<script lenguage='JavaScript'>
        alert('Registro actualizado');
        location.assign('admin.php');
        </script>";
    } else {
        echo "<script lenguage='JavaScript'>
        alert('El registro no se actualizo');
        location.assign('admin.php');
        </script>". mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM admins WHERE ID='$id'";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $nombre = $fila["Nombre"];
    $ap = $fila["Apellidos"];
    $correo = $fila["Correo"];
    $contrasena = $fila["Contraseña"];

    mysqli_close($conexion);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar admins</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            margin-bottom: 20px;
        }

        /* Estilos del formulario */
        form {
            max-width: 400px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"],
        a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
        }
        a {
            background-color: #f2f2f2;
            color: #4CAF50;
            border: 1px solid #ccc;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #e8e8e8;
        }
    </style>
</head>
<body>
    <h1>Modificar admins</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>

        <label>Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo $ap; ?>"><br>

        <label>Correo:</label>
        <input type="text" name="correo" value="<?php echo $correo; ?>"><br>

        <label>Contraseña:</label>
        <input type="password" name="contrasena" value="<?php echo $contrasena; ?>"><br>

        <input type="submit" name="enviar" value="Actualizar">
        <a href="admin.php">Regresar</a>
    </form>
</body>
</html>
<?php
}
?>