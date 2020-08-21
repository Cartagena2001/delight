// slidebar
$(document).ready(function() {

    $("#menu-toggle").click(function(e) {
     e.preventDefault();
     $("#wrapper").toggleClass("toggled");
    })

 });



$(document).ready(function() {

  $('#archivoProducto').on('change',function(e){
      //get the file name
      var fileName = e.target.files[0].name;
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })
   
});

$(document).ready(function() {

  $('#archivoCategoria').on('change',function(e){
      //get the file name
      var fileName = e.target.files[0].name;
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })
   
});


$(document).ready(function() {

  $('#archivoNoticia').on('change',function(e){
      //get the file name
      var fileName = e.target.files[0].name;
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })
   
});
