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

$(document).ready(function() {

  $('#archivoProducto').on('change',function(e){
      //get the file name
      var fileName = e.target.files[0].name;
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })
   
});
// graficos
new Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'GraficoLienal',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
      { year: '2016', value: 20 },
      { year: '2017', value: 10 },
      { year: '2018', value: 5 },
      { year: '2019', value: 15 },
      { year: '2020', value: 50 }
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'year',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Value'],
    resize: true,
    lineColors: ['#03A6A6']
  });


new Morris.Donut({
    element: 'GraficoPastel',
    data: [
      {label: "Download Sales", value: 12},
      {label: "In-Store Sales", value: 30},
      {label: "Mail-Order Sales", value: 20}
    ],
    resize: true,
    labelColor:"#03658C",
    colors: ['rgb(3, 166, 166)', 'rgb(3, 101, 140)', 'rgb(8, 128, 128)']
  });