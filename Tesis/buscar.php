<?php
if (isset($_POST['buscar'])) {
    // Obtener el valor de búsqueda
    $buscar = $_POST['buscar'];

    // Paso 1: Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "tess");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Paso 2: Consultar los registros de la base de datos
    $query = "SELECT * FROM clientes WHERE ID = '$buscar' OR Nombre LIKE '%$buscar%'";
    $resultado = mysqli_query($conexion, $query);

    // Paso 3: Mostrar los resultados de la búsqueda
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
        echo "</tr>";
    }

    echo "</table>";

    // Paso 4: Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>