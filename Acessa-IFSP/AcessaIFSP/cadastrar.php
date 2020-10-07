<!DOCTYPE html>
<?php
header('Content-Type: text/html; charset=utf-8');
require_once('navBar.php');
require_once('ConectaBD.php');

$nome = $_POST['nome'];
$pront = $_POST['pront'];
$curso = $_POST['curso'];
$end = $_POST['end'];
$cid = $_POST['cid'];
$estado = $_POST['estado'];
$telFix = $_POST['telFX'];
$mail = $_POST['mail'];
$cartao = $_POST['cartao'];


//upload de foto
$uploaddir = 'img/avatar/';
$uploadfile = $uploaddir . $_FILES['foto']['name'];

    
if ($pront != '' && $nome != '') {

    $sth = $dbh->prepare('INSERT INTO aluno
		                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    try {
        $sth->execute([$pront, $nome, $curso, $end, $cid, $estado, $telFix, $mail, $uploadfile, $cartao]);
    } catch (PDOException $e) {

        echo "<h3><c><font face=\"Verdana\" color=\"#FF0000\"> Atenção!!!  </font></c></h3>";
        echo "<h3><c><font face=\"Verdana\" color=\"#FF0000\"> Prontuário já existente, refaça a operação!  </font></c></h3>";
    }
} else {
    echo "<h3><c><font face=\"Verdana\" color=\"#FF0000\">Não efetivado.</font></c></h3>";
    echo "<h3><c><font face=\"Verdana\" color=\"#FF0000\">Preencha os campos corretamente!</font></c></h3>";
}
?>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div class="container">
            <h2>Acessa IFSP - Cadastro Aluno </h2>
            <form class="form-horizontal" role="form" name="Cadastro" action="cadastra.php" method="post" >
            <button type="submit" class="btn btn-default">Novo Cadastro</button>
            <input type='button' value='Voltar' onclick='history.go(-1)' />
            </form>
        </div>

    </body>
</html>
