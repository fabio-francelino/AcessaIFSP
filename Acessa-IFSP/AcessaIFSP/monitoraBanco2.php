<?php
require_once('ConectaBD.php');
?>

<!DOCTYPE html>
<html lang="en">
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
            <h2>Acessa IFSP</h2>

                                    <?php
                        $banco = $dbh->query("select a.prontuario from aluno as a WHERE a.cartao = (SELECT cartao from registro
                                       ORDER BY id DESC LIMIT 1)");

                        if (is_bool($banco->fetchColumn())) {
                            echo "<p><c><font face=\"Verdana\" color=\"#FF0000\">Não cadastrado!</font></c></p>";
                        } else {
                            foreach ($dbh->query("select a.foto, a.prontuario, a.nome,a.curso, r.hora, a.cartao
									   from aluno as a inner join registro as r on a.prontuario = r.prontuario
                                       ORDER BY r.id DESC LIMIT 1") as $linha) {
                                 
                                $avatar = "{$linha['foto']}";
                                echo "<img width=\"350px\" height=\"350px\" src=\"$avatar\" />";
                                 

		                     }
                        }
                        ?>                     

                    <?php
                        $banco = $dbh->query("select a.prontuario from aluno as a WHERE a.cartao = (SELECT cartao from registro
                                       ORDER BY id DESC LIMIT 1)");

                        if (is_bool($banco->fetchColumn())) {
                            echo "<p><c><font face=\"Verdana\" color=\"#FF0000\">Não cadastrado!</font></c></p>";
                        } else {
                            foreach ($dbh->query("select a.foto, a.prontuario, a.nome,a.curso, r.hora, a.cartao
									   from aluno as a inner join registro as r on a.prontuario = r.prontuario
                                       ORDER BY r.id DESC LIMIT 1") as $linha) {

                                echo "<td>";
                                echo "<h1>{$linha['nome']}</h1>";
                                echo "</td>";

                                echo "<td>";
                                echo "<h2>{$linha['prontuario']}</h2>";
                                echo "</td>";

		                     }
                        }
                        ?>                     
        </div>

    </body>
</html>