<?php
require_once('navBar.php');
require_once('ConectaBD.php');

$pront = $_POST['pront'];	

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
        <th>Nome</th>
        <th>Prontuario</th>
        <th>Curso:</th>
		<th>Horário de Acesso:</th>
      </tr>
    </thead>
    <tbody>
    
 <?php
			if($pront != ''){
				$banco = $dbh->query("SELECT * from aluno WHERE nome LIKE '%$pront%' or prontuario = '$pront';");				
				 if (is_bool($banco->fetchColumn())) {
                            echo "<h3><c><font face=\"Verdana\" color=\"#FF0000\">Cadastro Inexistente!</font></c></h3>";
                        } else {
                     				$dbh->query("DELETE FROM `aluno` WHERE nome LIKE '%$pront%' or prontuario = '$pront';");
                                    $dbh->query("Select * FROM `aluno` WHERE prontuario = '$pront';");	
							        echo "<h3><c><font face=\"Verdana\" color=\"#FF0000\">Exclusão realizada com sucesso!</font></c></h3>";
						} 
                 }
			
?>                     
      
    </tbody>
  </table>

<form class="form-horizontal" role="form" name="Cadastro" action="busca.php" method="get" >
        <button type="submit" class="btn btn-default">Realizar nova busca</button>

</form>
</div>
</body>
</html>