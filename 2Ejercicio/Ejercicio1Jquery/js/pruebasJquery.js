function funcionAjaxAsincronaLoad(){
    $("#resultadoAsincronoLoad").load("servidor/datosJSON.php");
}

function funcionAjaxAsincronaError(){
    $.ajax({
        url: "servidor/datosError.php",
        beforeSend:function(){alert("EMPIEZA LA PETICIÓN AJAX")}
    })  .done( escribirResultado("resultadoAsincronoError"))
        .fail(function(){{ $("#resultadoAsincronoError").html("SE HA PRODUCIDO UN ERROR EN LA PETICIÓN");}})
        .always(function(){alert("TERMINO LA PETICIÓN AJAX")});
}


function escribirResultado(respuesta){
    let resultado = document.getElementById("resultadoAsincronoJSON");
    resultado.innerHTML ="";
    var resultados = respuesta;
    let salida="<table border='1'><tr><th>MARCA</th><th>MODELO</th><th>RAM</th><th>CAMARA</th></tr>";

    for (let i=0; i < resultados.length; i++){
        let objeto = resultados[i];
        salida+="<tr><td>"+objeto.marca+"</td><td>"+
        objeto.modelo+"</td><td>"+objeto.ram+"</td><td>"+
        objeto.camara +"</td></tr>";
    }

    salida+="</table>";

    resultado.innerHTML=salida;
}

function realizarPeticion(funcionCallback){
    $.ajax({
        url: "servidor/ñdatosJSON.php",
        method: "POST",
        data: {marca: $('#marca').val()},
        dataType:'JSON',
        beforeSend:prepararLlamda
    })  .done(escribirResultado)
        .always(terminarLlamada);
}

function prepararLlamda(){
    alert("REALIZANDO PETICIÓN AJAX JQUERY");
    $("#spinner").show();
}

function terminarLlamada(){
    alert("HA TERMINADO LA PETICIÓN AJAX JQUERY");
    $("#spinner").hide();
}