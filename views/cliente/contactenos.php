<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
<div class="row">
    <div class="container col-lg-6 mt-5">
        <form>
        <h3 class="text-center">¿Tienes alguna duda?</h3>
        <div class="form-group ml-3 mb-4">
            <label for="exampleFormControlInput1">Titulo</label>
            <input type="email" class="form-control">
        </div>
            <div class="form-group ml-3 mb-4">
                <label for="exampleFormControlTextarea1">Asunto</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
        </form>
            <div class="container mb-3">
                <div class="row">
                    <div class="col text-center">
            <button type="button" class="btn btn-info">Enviar</button>
            </div>    
                </div>
                    </div>
    </div>
</div>


<?php
Page::footerTemplate();
?>
