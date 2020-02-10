function validarMarca(){
    let inputMarca = $("#marca");

    $.ajax({
        url: './servidor/validarFormulario.php',
        method: 'POST',
        data: {marca: inputMarca.val()},
        dataType:'JSON',
        beforeSend:prepararLlamda,
        success: function(text){
            gestionarErrores(inputMarca, text.marca)
        }
    })  
        .always(terminarLlamada);
}

function validarModelo(){
    let inputModelo = $("#modelo");
    $.ajax({
        url: './servidor/validarFormulario.php',
        method: 'POST',
        data: {modelo: inputModelo.val()},
        dataType:'JSON',
        beforeSend:prepararLlamda,
        success: function(text){
            gestionarErrores(inputModelo, text.modelo)
        }
    })  
        .always(terminarLlamada);
}

function validarRam(){
    let inputRam = $("#ram");
    $.ajax({
        url: './servidor/validarFormulario.php',
        method: 'POST',
        data: {ram: inputRam.val()},
        dataType:'JSON',
        beforeSend:prepararLlamda,
        success: function(text){
            gestionarErrores(inputRam, text.ram)
        }
    })  
        .always(terminarLlamada);
}

function validarCamara(){
    let inputCamara = $("#camara");
    $.ajax({
        url: './servidor/validarFormulario.php',
        method: 'POST',
        data: {camara: inputCamara.val()},
        dataType:'JSON',
        beforeSend:prepararLlamda,
        success: function(text){
            gestionarErrores(inputCamara, text.camara)
        }
    })  
        .always(terminarLlamada);
}



function validarFormulario(){
    event.preventDefault();
    validacionFormularioAjax();
}

function validacionFormularioAjax(){
    
    let inputMarca = $("#marca");
    let inputModelo = $("#modelo");
    let inputRam = $("#ram");
    let inputCamara = $("#camara");

  
    $.ajax({
        url: './servidor/validarFormulario.php',
        method: 'POST',
        data: { marca: inputMarca.val(),
                modelo: inputModelo.val(),
                ram: inputRam.val(),
                camara: inputCamara.val()
            },
        dataType:'JSON',
        beforeSend:prepararLlamda,
        success: function(text){
            
            if( !gestionarErrores(inputMarca, text.marca) &&
                !gestionarErrores(inputModelo, text.modelo) &&
                !gestionarErrores(inputRam, text.ram) &&
                !gestionarErrores(inputCamara, text.camara)){
                    $.ajax({
                        url: './servidor/insert.php',
                        method: 'POST',
                        data: { marca: inputMarca.val(),
                            modelo: inputModelo.val(),
                            ram: inputRam.val(),
                            camara: inputCamara.val()
                        },
                        dataType:'JSON',
                        beforeSend:prepararLlamda,
                        
                    })  
                        .always(terminarLlamada);
                        $('#mostrarResultado').html('Se ha registrado correctamente.');   
                
            }
        }
    })  
        .always(terminarLlamada);
        
}



function gestionarErrores(input,errores){
    var hayErrores = false;
    let divErrores = input.next();
    divErrores.html("");
    input.removeClass("bg-success bg-danger");
    if (errores.length === 0) {
        input.addClass("bg-success");
    } else {
        hayErrores = true;
        input.addClass("bg-danger");
        for (let error of errores) {
            divErrores.append("<div>"+error+"</div>");
        }
    }
    input.parent().next().remove();
    return hayErrores;
}

function incluirSpinner(input){
    if(input.parent().next().length === 0){
        let spin = $(".spinner").first().clone(true);
        input.parent().after(spin);
        spin.show();
    }
}

function prepararLlamda(){
    $("#spinner").show();
    $("#modal").show();
}

function terminarLlamada(){
    $("#spinner").hide();
}