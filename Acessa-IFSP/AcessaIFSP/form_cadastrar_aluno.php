<?php
require_once('ConectaBD.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <script src="bootstrap/js/jquery.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" >
        <script src="bootstrap/js/bootstrap.min.js" ></script>
    </head>
    <body>
        <form role="form" action="cadastrar_aluno.php" method="post">
            <div class="form-group">
                <label for="prontuario">Prontuario</label>
                <input type="number" name="prontuario" id="prontuario" min="1" max="999999999" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required />
            </div>			
            <div class="form-group">
                <label for="curso">Curso</label>
                <input type="text" name="curso" id="curso" class="form-control" required />
            </div>	
            <div class="form-group">
                <label for="end">Endereço</label>
                <input type="text" name="end" id="end" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="numeric" name="telefone" id="telefone" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="text" name="foto" id="foto" class="form-control" required />
            </div>

            <button type="submit" class="btn btn-default">Submit</button>			
        </form>
    </body>
</html>