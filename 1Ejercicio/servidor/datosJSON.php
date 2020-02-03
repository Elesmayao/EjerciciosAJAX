<?php
// retrasamos 2 segundos la ejecución de esta página PHP.
$servername = "localhost";
$username = "root";
$password = "";
$database = "moviles";
$conn = mysqli_connect ($servername, $username, $password, $database);

// Cabecera para indicar que vamos a enviar datos JSON y que no haga caché de los datos.
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

$sql = "SELECT * FROM movil";

$result = mysqli_query($conn, $sql);

$listaMoviles = array();
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $listaMoviles[] = $row;
}

if(sizeof($listaMoviles)==0){
    echo json_encode($listaMoviles);
}else{
    echo json_encode($listaMoviles);
}