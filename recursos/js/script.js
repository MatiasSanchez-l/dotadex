$(document).on("click", ".botonModificar", function () {
    var miHeroeId = $(this).data('id');
    $(".modal-footer #botonModificar").val( miHeroeId );
});

$(document).on("click", ".botonEliminar", function () {
    var miHeroeId = $(this).data('id');
    $(".modal-footer #botonEliminar").val( miHeroeId );
});
