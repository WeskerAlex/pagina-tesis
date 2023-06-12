<?php
// Create connection
$conn = mysqli_connect ("localhost","root","","tess");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = htmlspecialchars($_POST['nombre']);
    $ap = htmlspecialchars($_POST['apellidos']);
    $email = htmlspecialchars($_POST['correo']);
    $pass = htmlspecialchars($_POST['contrasena']);

    // Prepare the SQL statement
    $sql= "INSERT INTO admins (Nombre, Apellidos, Correo, Contraseña) VALUES ('$name', '$ap', '$email', '$pass')";

    $errores=[];

    $query = "SELECT * FROM admins WHERE Correo = '$email'";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $errores[] = "El email ya está registrado.";
      }

    // Execute the statement
    if (!empty($errores)) {
        // Mostrar mensajes de error
        foreach ($errores as $error) {
          echo $error . "<br>";
        }
      } else {
        // No hay errores, insertar los datos en la base de datos

        if (mysqli_query($conn, $sql)) {
          echo "<script lenguage='JavaScript'>
            alert('Los datos se han insertados');
            location.assign('admin.php');
            </script>";
        } else {
            echo "<script lenguage='JavaScript'>
            alert('Error al insertar los datos');
            location.assign('admin.php');
            </script>";
        }
      }
}
  $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar</title>
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
        .btn{  
            border-radius: 4px;
            height: 40px;
            font-size: 13px;
            font-weight: 600;
            background-color: #f2f2f2;
            color: #4CAF50;
            transition: background-color 0.3s;
            letter-spacing: 1px;
        }
        .btn:hover{  
            background-color: #e8e8e8;
        }
    </style>
</head>
<body>
    <h1>Agregar</h1>
    <form action="" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value=""><br>

        <label>Apelldios:</label>
        <input type="text" name="apellidos" value=""><br>

        <label>Correo:</label>
        <input type="text" name="correo" value=""><br>

        <label>Contraseña:</label>
        <input type="password" name="contrasena" value="">
        <button type="submit" class="btn mt-4" name="send">Registrar</button>
        <a href="admin.php">Regresar</a>
    </form>
</body>
</html>