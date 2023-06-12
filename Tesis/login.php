<?php
// Paso 1: Recibir los datos del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["correo"];
  $pass = $_POST["pass"];

// Paso 2: Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tess");

if (!$conexion) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Paso 3: Verificar los datos de inicio de sesión
$sql = "SELECT * FROM clientes WHERE Correo = '$email' AND Contraseña = '$pass'";
$sqla = "SELECT * FROM admins WHERE Correo = '$email' AND Contraseña = '$pass'";
$result = $conexion->query($sql);
$resultA = $conexion->query($sqla);

  if ($result->num_rows > 0) {
    echo "<script lenguage='JavaScript'>
    alert('Bienvenido');
    location.assign('inicio.html');
    </script>";
} else if ($resultA->num_rows > 0) {
    echo "<script lenguage='JavaScript'>
    alert('Bienvenido Administrador');
    location.assign('admin.php');
    </script>";
} else {
    echo "<script lenguage='JavaScript'>
    alert('El correo o la contraseña son incorrectos');
    location.assign('login.html');
    </script>";
}
}
// Paso 4: Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>