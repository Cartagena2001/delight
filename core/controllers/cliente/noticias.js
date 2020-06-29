const API_NOTICIAS = '../../core/api/cliente/noticias.php?action=';

$( document ).ready(function() {
    leerNoticias();
});

function leerNoticias(){
    $.ajax({
        dataType: 'json',
        url: API_NOTICIAS + 'leerNoticias',
    })
    .done(function(response){
        if(response.status){
            let content = '';

            response.dataset.forEach(function( row ){
                
                content +=`
                <div class="card mb-3 mt-5" style="max-width: 740px;">
                    <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="../../resources/img/noticias/${row.imagen}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">${row.titulo}</h5>
                                <p class="card-text">${row.descripcion}</p>
                                <p class="card-text"><small class="text-muted">${row.fecha_pub}</small></p>
                            </div>
                            </div>
                    </div>
                </div>
                `;

            });
            $( '#noticias' ).html( content );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}
