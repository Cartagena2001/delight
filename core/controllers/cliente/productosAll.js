const API_PRODUCTOSALL = '../../core/api/cliente/productosAll.php?action=';

$( document ).ready(function() {
    let params = new URLSearchParams( location.search );

    const ID = params.get( 'id' );
    const NAME = params.get( 'nombre' );
    LeerTodosProductos(ID, NAME);
    LeertodaslasCategorias();
});

function LeerTodosProductos( id, categoria )
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOSALL + 'leerTodosProductosPorCat',
        data: { id_categoria: id },
        type: 'post'
        
    })
    .done(function( response ){
        if(response.status){
            let content = '';
            response.dataset.forEach(function(row){
                content +=`
                <div class="card mb-5 mt-4 ml-3 border-0" style="max-width: 350px; ">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="../../resources/img/categorias/${row.imagen}" class="card-img mt-4" alt="producto">
                        </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">${row.nombre_p}</h5>
                                <p class="card-text">${row.descripcion}</p>
                                <a href="viewProducto.php?id=${row.id_producto}" class="btn" style="background-color: #138496;color:white;">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            });
            $( '#title' ).text( `Categoría: ${categoria}` );
            $( '#productoAll' ).html( content );
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

function LeertodaslasCategorias(){
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOSALL + 'LeerCategorias',
        
    })
    .done(function(response){
        if( response.status){
            let content = '';
            let url = ''; 

            response.dataset.forEach(function( row ){

                url = `productosCat.php?id=${row.id_categoria}&nombre=${row.nombre}`;
    
                content +=`
                <div class="card mt-3 ml-5 mb-4" style="width: 18rem;">
                    <img src="../../resources/img/categorias/${row.imagen}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">${row.nombre}</h5>
                            <p class="card-text">${row.descripcion}</p>
                            <a href="${url}" class="btn" style="background-color: #138496;color:white;">Ir a categoria</a>
                        </div>
                </div>
                `;
    
            });
            $( '#categoriaProductos' ).html( content );
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

$( '#search-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_PRODUCTOSALL, this );
});
