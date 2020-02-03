<?php
// Cabecera para indicar que vamos a enviar datos JSON y que no haga caché de los datos.
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');
// retrasamos 2 segundos la ejecución de esta página PHP.
$servername = "localhost";
$username = "root";
$password = "";
$database = "moviles";
$conn = mysqli_connect ($servername, $username, $password, $database);

$ram=$_POST["ram"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];

$sql = "INSERT INTO `movil`( `marca`, `modelo`, `ram`) VALUES ('$marca','$modelo','$ram')";

$result = mysqli_query($conn, $sql);
