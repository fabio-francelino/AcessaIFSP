<?php
require_once('navBar.php');
require_once('ConectaBD.php');
$data_1 = $_GET['data_1'];
$data_2 = $_GET['data_2'];
//echo $data_1;
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
            <h2>AcessaIFSP</h2>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>foto</th>
                        <th>Nome</th>
                        <th>Prontuario</th>
                        <th>Curso:</th>
                        <th>Horário de Acesso:</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($data_2 >= $data_1) {
                        foreach ($dbh->query("SELECT a.prontuario, a.nome,a.curso, a.foto, r.hora FROM aluno as a INNER JOIN registro as r  
				WHERE r.hora>= '$data_1' AND r.hora<= '$data_2' and a.prontuario = r.prontuario ORDER BY r.hora DESC;") as $linha) {

                            echo '<tr>';
                            
                            echo "<td>";
                            $avatar = "{$linha['foto']}";
                            //echo "{$linha['foto']}";
                            echo "<img width=\"60px\" height=\"60px\" src=\"$avatar\" />";
                            echo "</td>";

                            echo "<td>";
                            echo "{$linha['nome']}";
                            echo "</td>";

                            echo "<td>";
                            echo "{$linha['prontuario']}";
                            echo "</td>";

                            echo "<td>";
                            echo "{$linha['curso']}";
                            echo "</td>";
                            echo "<td>";
                            echo "{$linha['hora']}";
                            echo "</td>";
                            echo '</tr>';
                        }
                    } else {
                        echo "<p><c><font face=\"Verdana\" color=\"#FF0000\">Data Inválida!</font></c></p>";
                    }
                    ?>                     

                </tbody>
            </table>
        </div>
        <form class="form-horizontal" role="form" name="Cadastro" action="relatorio.php" method="get" >
            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Realizar nova consulta</button>
                </div>
            </div>
        </form>

    </body>
</html>