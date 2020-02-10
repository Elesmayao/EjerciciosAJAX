
<?php
// retrasamos 2 segundos la ejecución de esta página PHP.
$servername = "localhost";
$database = "moviles";
$username = "root";
$password = "";
$conn = mysqli_connect ($servername, $username, $password, $database);
// Cabecera para indicar que vamos a enviar datos JSON y que no haga caché de los datos.
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');
$marca = $_POST["marca"];

$sql = "SELECT * FROM movil WHERE marca LIKE '%$marca%'";

$result = mysqli_query($conn, $sql);

$listaMovil = array();
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $listaMovil[] = $row;
}

if(sizeof($listaMovil)==0){
    echo json_encode($listaMovil);
}else{
    echo json_encode($listaMovil);
}