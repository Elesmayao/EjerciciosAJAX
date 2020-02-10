<?php

function validarMarca($marca){
    $errores = array();
    if($marca !== "") {

        if (strlen($marca) < 1) {
            $errores[] = "La marca debe tener al menos 1 caracteres";
        }
        if (!preg_match("/^[A-Z]*$/",$marca)) {
            $errores[] = "La marca sólo puede contener letras mayúsculas";
        }
    }else{
        $errores[] = "Debes de rellenar el campo";
    }
    return $errores;
}

function validarModelo($modelo){
    $errores = array();
    if($modelo !== "") {
       
        if (strlen($modelo) < 1) {
            $errores[] = "El modelo debe tener al menos 1 caracteres";
        }
        if (!preg_match("/^[A-Z]*$/",$modelo)) {
            $errores[] = "EL modelo sólo puede contener letras mayúsculas";
        }
    }else{
        $errores[] = "Debes de rellenar el campo";
    }
    
    
    return $errores;
}

function validarRam($ram){
    $errores = array();
    if (!is_numeric($ram)) {
        $errores[] = "La RAM debe ser un número";
    }else{
        $errores[] = "Debes de rellenar el campo";
    }
    return $errores;
}


function validarCamara($camara){
    $errores = array();
    if($camara !== "") {
        if (!is_numeric($camara)) {
            $errores[] = "Introducir solo números";
        }
        
    }else{
        $errores[] = "Debe seleccionar un número de megapixeles";
    }
    return $errores;
}