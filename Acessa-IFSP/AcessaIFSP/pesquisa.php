<!DOCTYPE html>
<?php
require_once('navBar.php');
?>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Busca Aluno </h2>
            <form class="form-horizontal" role="form" name="Cadastro" action="insereBusca.php" method="post" >


                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Buscar:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="var"  placeholder="Insira Nome ou Prontuario"/>
                    </div>
                </div>


                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Consultar</button>
                    </div>
                </div>
            </form>
        </div>

    </body>
</html>



