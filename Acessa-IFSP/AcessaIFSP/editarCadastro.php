<!DOCTYPE html>
<?php
require_once('navBar.php');
require_once('ConectaBD.php');

$pront = $_POST['pront'];
$sql = "SELECT * from aluno WHERE nome LIKE '%$pront%' or prontuario = '$pront'";
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
        <?php
        foreach ($dbh->query($sql) as $linha):
            ?>
            <div class="container">
                <h2>Acessa IFSP - Editar Cadastro de Aluno </h2>
                <form class="form-horizontal" role="form" name="Cadastro" action="atualizarCadastro.php" method="post" enctype="multipart/form-data" > 
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Nome:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nome" value="<?php echo $linha['nome'] ?>"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Prontuario:</label>
                        <div class="col-sm-10">          
                            <input class="form-control" type="number" name="pront" value="<?php echo $linha['prontuario'] ?>" readonly="readonly">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Curso:</label>
                        <div class="col-sm-10">          
                            <input class="form-control" type="text" name="curso" value="<?php echo $linha['curso'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Endereço:</label>
                        <div class="col-sm-10">          
                            <input class="form-control" type="text" name="end" value="<?php echo $linha['endereco'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Cidade:</label>
                        <div class="col-sm-10">          
                            <input class="form-control" type="text" name="cid" value="<?php echo $linha['cidade'] ?>">
                        </div>
                    </div>      

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Estado:</label>
                        <div class="col-sm-10">          
                            <input class="form-control" type="text" name="estado" value="<?php echo $linha['estado'] ?>">
                        </div>
                    </div>   

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Telefone Fixo:</label>
                        <div class="col-sm-10">          
                            <input class="form-control" type="text" name="telFX" value="<?php echo $linha['telefone'] ?>">
                        </div>
                    </div>         

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">E-Mail:</label>
                        <div class="col-sm-10">          
                            <input class="form-control" type="text" name="mail" value="<?php echo $linha['email'] ?>">
                        </div>
                    </div> 
					
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Cartão:</label>
						<div class="col-sm-10">          
                        <input class="form-control" type="text" name="cartao" value="<?php echo $linha['cartao'] ?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Foto:</label>
						<div class="col-sm-10">          
                        <input class="form-control" type="file" name="foto" >
						</div>
					</div> 

                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
        endforeach;
        ?>
    </body>
</html>



