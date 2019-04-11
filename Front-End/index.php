<?php
$url = file_get_contents('http://localhost:8000/api/aluno');
$alunos = json_decode($url);

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
  	<title>Desafio Grupo Ceuma</title>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Olá, mundo!</title>
  </head>
  <body>
    <div class="modal-dialog text-center">
    	<div class="col-sm-12 main-section">
    		<div class="modal-content">
    			<div class="col-12 user-img">
    				<img src="images/perfil.png">
    				<h2 class="font-weight-bold text-light my-2">Desenvolvedor Ceuma</h2>
    			</div>

    			<form class="col-12">
    				 <div class="form-group">
    				 	<label for="exampleInputEmail1" class=""><i  class="fas fa-user"></i> Username</label>
    				 	<input type="text" name="" class="form-control" >    				 	
    				 </div>
    				 <div class="form-group">
    				 	<label for="exampleInputEmail1" class=""><i class="fas fa-lock"></i> Password</label>
    				 	<input type="password" name="" class="form-control">    				 	
    				 </div>
    				<button type="submit" class="btn"><i class="fas fa-sign-in-alt"> Login</i></button>
    				<div class="col-12 forgot">
    					<a href="#">Criar nova conta</a><br>
    					<a href="#">Esqueceu sua senha?</a>
    				</div>
    			</form>
    		</div>    		
    	</div>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
