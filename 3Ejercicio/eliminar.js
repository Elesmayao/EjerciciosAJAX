$(function () {
    $("button[data-accion='eliminar']").on("click", function (event) {
        let boton = $(event.target);
        mostrarModal(boton.attr("data-ideliminar"));
    });

    $("button[data-accion='confirmar-eliminar']").on("click", function (event) {
        let boton = $(event.target);
        eliminarmoviles(boton.attr("data-ideliminar"));
    });
});

function mostrarModal(idEliminar) {
    $("#botonConfirmarEliminar").attr("data-ideliminar", idEliminar);
    $("#modal").modal("show");
}

function eliminarmoviles(idEliminar) {
    let form = new FormData();
    form.append("id", idEliminar);
    fetch("eliminarmoviles.php", {
        method: "POST",
        body: form
    }).then(function () {
        $("#modal").modal("hide");
        $("tr[data-idmovil='" + idEliminar + "']").remove();
    });
}