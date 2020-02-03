<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "moviles";
$conn = mysqli_connect ($servername, $username, $password, $database);


header('Content-Type: text/xml');
header('Cache-Control: no-cache, must-revalidate');


$sql = "SELECT * FROM movil";
$result = mysqli_query($conn, $sql);

echo '<?xml version="1.0" encoding="utf-8"?>
<moviles>';
while($row = mysqli_fetch_array($result))
 {
    echo "<movil>";
    echo "<marca>" . $row['marca'] . "</marca>";
    echo "<modelo>" . $row['modelo'] . "</modelo>";
    echo "<ram>" . $row['ram'] . "</ram>";
    echo "<camara>" . $row['camara'] . "</camara>";
    echo "</movil>";
 }
echo "</moviles>";