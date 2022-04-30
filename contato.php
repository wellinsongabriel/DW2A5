<?php
require 'header.php';

?>
<!--$nomee = (!empty($_POST['nomee']) ? $_POST['nomee'] : '');
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, "mensagem", FILTER_SANITIZE_STRING);-->



<h1 class="text-center">Formulário para contato</h1><br><br>
<form action="destino-contato.php" method="POST">

    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" required>
        </div>
        <div class="form-group col-md-6">
            <label for="email">E-mail:</label>
            <input class="form-control" type="email" name="email" required>
        </div>
    </div>
    <div class="form-group">
        <label for="mensagem">Mensagem:</label><br>
        <textarea class="form-control" name="mensagem" id="" cols="100" rows="5"></textarea><br><br>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <button type="reset" class="btn btn-warning">Limpar</button>
</form>



<?php
require 'footer.php';
?>