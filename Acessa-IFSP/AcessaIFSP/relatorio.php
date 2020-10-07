<!DOCTYPE html>
<?php
require_once('navBar.php');
?>
<html>
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Relatório de Acesso </h2>
            <form class="form-horizontal" role="form" name="Cadastro" action="insereRelatorio.php" method="get" >


                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Insira a o Período:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="date" name="data_1"  placeholder="Insira Data de Início"/>

                        <input class="form-control" type="date" name="data_2"  placeholder="Insira Data de Fim"/>
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



