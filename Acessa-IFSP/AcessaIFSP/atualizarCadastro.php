<?php
header('Content-Type: text/html; charset=utf-8');

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


$uploaddir = 'img/avatar/';

$uploadfile = $uploaddir . $_FILES['foto']['name'];

if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
    //echo "Arquivo Enviado";
} else {
    //echo "Arquivo não enviado";
}
//fim upload de foto

$sql = "UPDATE aluno 
          SET nome  = '$nome', curso = '$curso', endereco = '$end',
		  cidade = '$cid', estado = '$estado', telefone = '$telFix', email = '$mail', foto = '$uploadfile', cartao = '$cartao'
          WHERE prontuario = $pront";
$total = $dbh->exec($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Listar</title>
        <meta charset="utf-8">
    </head>
    <body>

        <?php
        require_once('pesquisa.php');
        echo "<h3><c><font face=\"Verdana\" color=\"#FF0000\">Atualização Realizada!</font></c></h3>";
        ?>
    </body>
</html>