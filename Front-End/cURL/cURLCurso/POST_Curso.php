<?php 

$url       = 'http://localhost:8000/api/curso';
$cabecalho = array('Content-Type: application/json', 'Accept: application/json');
$campos    = json_encode(array(
				'nome_curso'=> $_POST['nome_curso'],
				'data_cadastro'=> $_POST['data_cadastro'],
				'carga_horaria'=> $_POST['carga_horaria'],
				'usuario'=> $_POST['usuario'],
				'modulo'=> $_POST['modulo']
			));

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            $url);
curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
curl_setopt($ch, CURLOPT_POSTFIELDS,     $campos);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST,           true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'POST');

$resposta = curl_exec($ch);
curl_close($ch);
header("Refresh: 1;url=../../Cursos.php");


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
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light rounded ">
      <div class="container">
        <a class="navbar-brand text-dark font-weight-bold" href="Menu.php" >
          <!-- <img src="images/perfil.png" width="30" height="30" class="d-inline-block align-top img-icon" alt=""> -->
          Desafio Ceuma
        </a>
        <button class="navbar-toggler corbotao" type="button" data-toggle="collapse" data-target="#textoNavbar" aria-controls="textoNavbar" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="textoNavbar">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-dark font-weight-bold" href="Alunos.php">Alunos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark font-weight-bold" href="Cursos.php">Cursos</a>
            </li>
          </ul>
          <span class="navbar-text text-light">
            <a href="Destruir.php" class="logout text-dark"><i class="fas fa-sign-out-alt"></i>Sair</a>
          </span>
        </div>
      </div>
    </nav>
    <div class="container my-2">        
        <?php 
	        if ($resposta == 1) {
	        	echo "
	        	<div class='alert alert-success alert-dismissible fade show' role='alert'>
	        	<strong>Operação realizada com sucesso,</strong> você será redirecionado em breve";
	        }else{
	        	echo "
	        	<div class='alert alert-danger alert-dismissible fade show' role='alert'>
	        	<strong>Falha ao realizar operação,</strong> você será redirecionado em breve";
	        }
        ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	<span class="float-right" aria-hidden="true">&times;</span>
        </button>
    </div>
    
        
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  
</html>