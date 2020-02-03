document.addEventListener("DOMContentLoaded", function() {
    let formularioAjax = document.getElementById("formulario");
    formularioAjax.addEventListener("submit", function(event) {
        event.preventDefault();
        peticionAsincrona();
    });
})

function funcionAjaxSincrona(){
    // para crear un objeto XHR lo podremos hacer con la siguiente llamada.
    miXHR = new objetoXHR();

    // Cargamos en el objeto con ID resultados el contenido
    // del fichero datos.txt empleando una petición AJAX.

    llamadaSincrona(document.getElementById("resultadoSincrono"),"servidor/datosXML.php");
}


function funcionAjaxAsincrona(){
    // para crear un objeto XHR lo podremos hacer con la siguiente llamada.
    miXHR = new objetoXHR();

    // Cargamos en el objeto con ID resultados el contenido
    // del fichero datos.txt empleando una petición AJAX.

    llamadaAsincrona("servidor/datos.php");
}



function escribirResultado(identificadorElemento){
    return function(textoMostrar){
        document.getElementById(identificadorElemento).innerHTML = "";
        document.getElementById(identificadorElemento).appendChild(document.createTextNode(textoMostrar));
    }
}

function funcionAjaxAsincronaGET(){
    llamadaAsincrona2("servidor/datosGET.php?nombre=pepito&apellido=flores","GET",null,"",escribirResultado("resultadoAsincronoGET"));
}


function funcionAjaxAsincronaPOST(){
    var datos = "nombre=Juanito&apellido=LOPEZ";
    llamadaAsincrona2("servidor/datosPOST.php","POST",datos,"",escribirResultado("resultadoAsincronoPOST"));
}

function funcionAjaxAsincronaXML(){
    
    llamadaAsincrona2("servidor/datosXML.php","GET",null,"XML",tratarResultadoXML);
}


function tratarResultadoXML(textoXMLRespuesta){
    let  datos=textoXMLRespuesta;

    // Tenemos que recorrer el fichero XML empleando los métodos del DOM
    let moviles = datos.documentElement.getElementsByTagName("movil");

    // En la variable salida compondremos el código HTML de la tabla a imprimir.
    let salida="<table border='1'><tr><th>MARCA</th><th>MODELO</th><th>RAM</th><th>CAMARA</th></tr>";

    // Hacemos un bucle para recorrer todos los elementos CD.
    for (let i=0;i<moviles.length;i++){
        salida+="<tr>";

        let marca =moviles[i].getElementsByTagName("marca");
        salida+="<td>" + marca[0].firstChild.nodeValue + "</td>";

        let modelo =moviles[i].getElementsByTagName("modelo");
        salida+="<td>" + modelo[0].firstChild.nodeValue + "</td>";

        let ram =moviles[i].getElementsByTagName("ram");
        salida+="<td>" + ram[0].firstChild.nodeValue + "</td>";

        let camara =moviles[i].getElementsByTagName("camara");
        salida+="<td>" + camara[0].firstChild.nodeValue + "</td>";

    // Cerramos la fila.
        salida+="</tr>";
    }

    // Cuando ya no hay más moviles cerramos la tabla.
    salida+="</table>";

    // Imprimimos la tabla dentro del contenedor resultados.
    document.getElementById("resultadoSincrono").innerHTML=salida;
}


function funcionAjaxAsincronaJSON(){
    llamadaAsincrona2("servidor/datosJSON.php","POST",null,"JSON",tratarResultadoJSON);
}

function tratarResultadoJSON(respuesta){
    var resultados= JSON.parse(respuesta)
    let salida="<table border='1'><tr><th>MARCA</th><th>MODELO</th><th>RAM</th><th>CAMARA</th></tr>";

    for (let i=0; i < resultados.length; i++){
        let objeto = resultados[i];
        salida+="<tr><td>"+objeto.marca+"</td><td>"+
        objeto.modelo+"</td><td>"+objeto.ram+"</td><td>"+
        objeto.camara +"</td></tr>";
    }

    salida+="</table>";

    document.getElementById("resultadoAsincronoJSON").innerHTML=salida;

}

function peticionAsincrona() {
    let ram = document.getElementById("ram").value;
    let marca = document.getElementById("marca").value;
    let modelo = document.getElementById("modelo").value;

    document.getElementById("spinner").style = "display:block";



    miXHR = new objetoXHR();

    miXHR.open("POST", "./servidor/insert.php", true);
    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    miXHR.onreadystatechange = comprobarEstadoPeticion2;

    let datos ="ram="+ram+"&marca="+marca+"&modelo="+modelo;
    miXHR.send(datos);
    document.getElementById("spinner").style = "display:none";
}