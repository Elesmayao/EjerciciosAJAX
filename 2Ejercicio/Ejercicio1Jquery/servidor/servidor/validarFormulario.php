<?php
require_once "./validarServidor.php";

$errores = array();
$errores["marca"] = array();
$errores["modelo"] = array();
$errores["ram"] = array();
$errores["camara"] = array();


if(isset($_POST["marca"])){
    $errores["marca"] = validarMarca(trim($_POST["marca"]));
}
if(isset($_POST["modelo"])){
    $errores["modelo"] = validarModelo(trim($_POST["modelo"]));
}
if(isset($_POST["ram"])){
    $errores["ram"] = validarRam(trim($_POST["ram"]));
}
if(isset($_POST["camara"])){
    $errores["camara"] = validarCamara(trim($_POST["camara"]));
}


echo json_encode($errores);