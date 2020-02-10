<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Ejemplo Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >

    <!-- Incluimos librería Bootstrap css-->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
          crossorigin="anonymous">


    <!-- Incluimos las librerís JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"
        ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous">

    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
            integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
            crossorigin="anonymous">
    </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/validacion.js" defer></script>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
<?php
$mostrarFormulario = true;
$errores = array();
$marca = "";
$modelo = "";
$ram = "";
$camara = "";

if(count($_POST) > 0){
    $marca = isset($_POST["marca"])?$_POST["marca"]:"";
    $modelo = isset($_POST["modelo"])?$_POST["modelo"]:"";
    $ram = isset($_POST["ram"])?$_POST["ram"]:"";
    $camara = isset($_POST["camara"])?$_POST["camara"]:"";
    require_once "./servidor/validarServidor.php";
    $errores["marca"] = validarMarca($marca);
    $errores["modelo"] = validarModelo($modelo, $marca);
    $errores["ram"] = validarRam($ram);
    $errores["camara"] = validarCAmara($camara);

    if(count($errores["marca"]) === 0 && count($errores["modelo"]) === 0 && count($errores["ram"]) === 0 
    && count($errores["camara"]) === 0){
        $mostrarFormulario = false;
        ?>
        <h1>DATOS DEL FORMULARIO</h1>
        Marca: <?php echo $marca ?>
        Modelo: <?php echo $modelo ?>
        Ram: <?php echo $ram ?>
        Camara: <?php echo $camara ?>
<?php
    }
}

if($mostrarFormulario){
?>
    <span class="spinner m-3">
        <div class="dot1"></div>
        <div class="dot2"></div>
    </span>
    <div class="container-fluid">
        <form id="formulario" method="POST" action="" onsubmit="validarFormulario()">
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="marca">Marca</label>
                    <input id="marca" class="form-control" value="<?php echo $marca?>" name="marca" onchange="validarMarca()" />
                    <div class="error bg-Annor">
                        <?php
                            if(isset($errores["marca"]) && count($errores["marca"]) > 0){
                                foreach($errores["marca"] as $error){
                                    echo "<div>".$error."</div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="modelo">Modelo</label>
                    <input id="modelo" class="form-control" value="<?php echo $modelo?>" name="modelo" onchange="validarModelo()"/>
                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["modelo"]) && count($errores["modelo"]) > 0){
                            foreach($errores["modelo"] as $error){
                                echo "<div>".$error."</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="ram">Ram</label>
                    <input id="ram" class="form-control" value="<?php echo $ram?>" name="ram" onchange="validarRam()"/>
                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["ram"]) && count($errores["ram"]) > 0){
                            foreach($errores["ram"] as $error){
                                echo "<div>".$error."</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="camara">Camara</label>
                    <input type="text" name="camara" id="camara" class="form-control" onchange="validarCamara()">
                    
                    <div class="error bg-danger">
                        <?php
                        if(isset($errores["camara"]) && count($errores["camara"]) > 0){
                            foreach($errores["camara"] as $error){
                                echo "<div>".$error."</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <button class="btn btn-success" >Enviar</button>

        </form>
        <div id="mostrarResultado"></div>
    </div>

    <div class="modal fade" id="modal" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">VALIDANDO</h5>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated w-100 bg-info" role="progressbar" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

</body>
</html>