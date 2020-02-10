<?php
// Cabecera para indicar que vamos a enviar datos JSON y que no haga caché de los datos.
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');
// retrasamos 2 segundos la ejecución de esta página PHP.
$servername = "localhost";
$database = "moviles";
$username = "root";
$password = "";
$conn = mysqli_connect ($servername, $username, $password, $database);

$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$ram = $_POST["ram"];
$camara = $_POST["camara"];

$sql = "INSERT INTO movil (marca,modelo,ram,camara) VALUES ('$marca','$modelo','$ram','$camara');";


if (mysqli_query($conn, $sql)) {
    echo ("Has añadido un nuevo movil");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);