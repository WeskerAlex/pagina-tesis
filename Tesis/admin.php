<!DOCTYPE html>
<html>
<head>
    <title>ADMINISTRADOR</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f2f2f2;
        }

        .container {
            width: 80%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilos de la tabla */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }

        /* Estilos del formulario de búsqueda */
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 5px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        /* Estilos de los enlaces */
        a {
            text-decoration: none;
            color: #4CAF50;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
    <br>
    <h4>Empleados</h4>
<?php

if (isset($_GET["ID"])) {
    $id = $_GET["ID"];
  }
// Paso 1: Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tess");

if (!$conexion) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Paso 2: Consultar los registros de la base de datos
$query = "SELECT * FROM admins";
$resultado = mysqli_query($conexion, $query);

$sql = "DELETE FROM admins WHERE ID";
// Paso 3: Mostrar la tabla
echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nombre</th>";
echo "<th>Apellidos</th>";
echo "<th>Correo</th>";
echo "<th>Contraseña</th>";
echo "</tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila["ID"] . "</td>";
    echo "<td>" . $fila["Nombre"] . "</td>";
    echo "<td>" . $fila["Apellidos"] . "</td>";
    echo "<td>" . $fila["Correo"] . "</td>";
    echo "<td>" . $fila["Contraseña"] . "</td>";
    echo "<td>";
    echo "<a href='modificarA.php?id=" . $fila["ID"] . "'>Modificar</a>";
    echo "<td>";
    echo "<a href='eliminarA.php?id=" . $fila["ID"] . "'>Eliminar</a>";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";


// Paso 4: Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
<br>
<a href="agregarA.php">Agregar admin</a>
<br>
<h3>Clientes</h3>
<?php

if (isset($_GET["ID"])) {
    $id = $_GET["ID"];
  }
// Paso 1: Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "tess");

if (!$conexion) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Paso 2: Consultar los registros de la base de datos
$query = "SELECT * FROM clientes";
$resultado = mysqli_query($conexion, $query);

$sql = "DELETE FROM cliente WHERE ID";
// Paso 3: Mostrar la tabla
echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nombre</th>";
echo "<th>Telefono</th>";
echo "<th>Correo</th>";
echo "<th>Contraseña</th>";
echo "<th>Ciudad</th>";
echo "</tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila["ID"] . "</td>";
    echo "<td>" . $fila["Nombre"] . "</td>";
    echo "<td>" . $fila["Telefono"] . "</td>";
    echo "<td>" . $fila["Correo"] . "</td>";
    echo "<td>" . $fila["Contraseña"] . "</td>";
    echo "<td>" . $fila["Ciudad"] . "</td>";
    echo "<td>";
    echo "<a href='modificar.php?id=" . $fila["ID"] . "'>Modificar</a>";
    echo "<td>";
    echo "<a href='eliminar.php?id=" . $fila["ID"] . "'>Eliminar</a>";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";


// Paso 4: Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
<br>
<a href="inicio.html"> Salir </a>
</div>
</body>
</html>