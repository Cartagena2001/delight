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