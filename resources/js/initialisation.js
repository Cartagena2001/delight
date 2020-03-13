// slidebar
$(document).ready(function() {

    $("#menu-toggle").click(function(e) {
     e.preventDefault();
     $("#wrapper").toggleClass("toggled");
    })

 });


// datatables
$(document).ready(function() {
    $('#TbClientes').DataTable();
} );

$(document).ready(function() {
    $('#Tbpedidos').DataTable();
} );

$(document).ready(function() {
    $('#Tbproductos').DataTable();
} );

$(document).ready(function() {
    $('#TbClientes').DataTable();
} );