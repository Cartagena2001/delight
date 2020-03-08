<?php
require_once('../../core/helpers/templateCliente.php');
Page::headerTemplate('Principal');
?>
<div class="row container-fluid mb-3">
    <div class="container text-center">
    <div class="container col-lg-6 mt-5">
        <form>
        <h3 class="text-center">¿Tienes alguna duda?</h3>
        <div class="form-group">
            <label for="exampleFormControlInput1">Titulo</label>
            <input type="email" class="form-control">
        </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Asunto</label>
                <textarea class="form-control" rows="8"></textarea>
            </div>
            <div class="mb-5">
            <button type="button" class="btn btn-info">Enviar</button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
<?php
Page::footerTemplate();
?>
