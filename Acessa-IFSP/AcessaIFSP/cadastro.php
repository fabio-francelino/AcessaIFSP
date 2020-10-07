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
            <h2>Acessa IFSP - Cadastro Aluno </h2>
            <form class="form-horizontal" role="form" name="Cadastro" action="cadastrar.php" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Nome:</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nome"  placeholder="Insira o Nome"/>
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Prontuário:</label>
                    <div class="col-sm-10">          
                        <input class="form-control" type="number" name="pront" min="1" max="999999999" placeholder="Insira o Prontuario">
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Endereço:</label>
                    <div class="col-sm-10">          
                        <input class="form-control" type="text" name="end" placeholder="Insira o Endereço">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Cidade:</label>
                    <div class="col-sm-10">          
                        <input class="form-control" type="text" name="cid" placeholder="Insira a Cidade">
                    </div>
                </div>      

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Estado:</label>
                    <div class="col-sm-10">          
                        <input class="form-control" type="text" name="estado" placeholder="Insira o Estado">
                    </div>
                </div>   
            
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Telefone:</label>
                    <div class="col-sm-10">          
                        <input class="form-control" type="text" name="telFX" placeholder="Insira o Telefone">
                    </div>
                </div>         

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">E-Mail:</label>
                    <div class="col-sm-10">          
                        <input class="form-control" type="text" name="mail" placeholder="Insira o E-mail">
                    </div>
                </div>                      

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Cartão:</label>
                    <div class="col-sm-10">          
                        <input class="form-control" type="text" name="cartao" placeholder="Insira o número do Cartão">
                    </div>
                </div>	

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Curso:</label>
                    <div class="col-sm-10">          
                            <select name="curso">
                               <option value=" "> </option>
                               <option value="ADS">Análise e Desenvolvimento de Sistemas</option>
                               <option value="Engenharia">Engenharia de Controle e Automação</option>
                               <option value="Matemática">Matemática</option>
                            </select>       
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
                        <button type="submit" class="btn btn-default">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>

    </body>
</html>



