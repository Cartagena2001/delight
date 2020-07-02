const API_CLIENTES='../../core/api/cliente/contactenos.php?action=';
const API_CLIENTES = '../../core/api/admin/clientes.php?action=readAll';

$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_PEDIDOS );
});

function fillTable( dataset )
{
    let content = '';
    dataset.forEach(function( row ) {
        content += `
            <tr>
                <td>${row.titulo_asunto}</td>
                <td>${row.asunto}</td>
                <td>${row.idCliente}</td>
                <td>
                        
                    <a href="#" class="btn btn-warning" data-toggle="modal" onclick="openUpdateModal (${row.id_contactenos})"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" onclick="openDeleteDialog (${row.id_contactenos})"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-pedidos' ).html( content );
    // $( '.materialboxed' ).materialbox();
    // $( '.tooltipped' ).tooltip();
}

 // Evento para mostrar los resultados de una búsqueda.
$( '#search-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_CONTACTENOS, this );
});
