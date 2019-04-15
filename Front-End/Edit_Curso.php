<?php
@ob_start();
    session_start();
    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){
      unset($_SESSION['usuario']);
      unset($_SESSION['senha']);
      unset($_SESSION['code_user']);
      header('location:index.php');
    }
$url_curso = file_get_contents('http://localhost:8000/api/curso/'.$_GET['id']);
$cursos = json_decode($url_curso);


// session_start();
// if((!isset ($_SESSION['cod_user']) == true)){
//   unset($_SESSION['login']);
//   unset($_SESSION['senha']);
//   header('location:index.php');
// }
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
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
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
<!-- <div class="container my-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Usuário <strong><?= $_SESSION['usuario']?></strong>, bem-vindo(a)
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="float-right" aria-hidden="true">&times;</span>
          </button>
        </div>
    </div> -->
<?php
foreach ($cursos as $curso){

?>
<div class="container bg-form rounded-bottom">
    <h2 class="titulocrud">Alterar Curso</h2>
    <form action="cURL/cURLCurso/PUT_Curso.php" method="POST">
        <input type="hidden" name="modulo" value="curso" class="form-control" id="inputEmail4">
        <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']?>" class="form-control" id="inputEmail4">
        <input type="hidden" name="id" value="<?php echo $curso->id ?>">
        <div class="form-row">
            <div class="form-group formcrud col-md-12">
                <label for="inputEmail4">Nome</label>
                <input type="text" name="nome_curso" class="form-control" id="inputEmail4" value="<?php echo $curso->nome_curso ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group formcrud col-sm-6">
                <label for="inputAddress2">Data Cadastro</label>
                <input type="date" name="data_cadastro" class="form-control" id="inputAddress2" value="<?php echo $curso->data_cadastro ?>">
            </div>
            <div class="form-group formcrud col-sm-6">
                <label for="inputAddress">Carga Horária</label>
                <input type="text" name="carga_horaria" class="form-control" id="inputAddress" value="<?php echo $curso->carga_horaria ?>">
            </div>
        </div>
        <button type="submit" class="btn text-light col-sm-2 mb-3">Editar</button>
    </form>
</div>
<?php
}
?>

<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
