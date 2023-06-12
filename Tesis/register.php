<?php
// Create connection
$conn = mysqli_connect ("localhost","root","","tess");

    // Get form data
    $name = htmlspecialchars($_POST['nombre']);
    $phone = htmlspecialchars($_POST['tel']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);
    $city = htmlspecialchars($_POST['city']);

    // Prepare the SQL statement
    $sql= "INSERT INTO clientes (Nombre, Telefono, Correo, Contraseña, Ciudad) VALUES ('$name', '$phone', '$email', '$pass', '$city')";

    $errores=[];
    if(empty($name) && empty($phone) && empty($email) && empty($pass) && empty($city)){
        $errores[]= "<script lenguage='JavaScript'>
        alert('Completa todos los campos');
        location.assign('login.html');
        </script>";
    }

    $query = "SELECT * FROM clientes WHERE Correo = '$email'";
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
            location.assign('inicio.html');
            </script>";
        } else {
            echo "<script lenguage='JavaScript'>
            alert('Error al insertar los datos');
            location.assign('login.html');
            </script>";
        }
      }
  $conn->close();
?>