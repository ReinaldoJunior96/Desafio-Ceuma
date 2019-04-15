<?php
    @ob_start();
    session_start();
    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){
      unset($_SESSION['usuario']);
      unset($_SESSION['senha']);
      unset($_SESSION['code_user']);
      header('location:index.php');
    }
    $url_aluno = file_get_contents('http://localhost:8000/api/aluno');
    $url_curso = file_get_contents('http://localhost:8000/api/curso');
    $alunos = json_decode($url_aluno);
    $cursos = json_decode($url_curso);
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
    <div class="container bg-form rounded-bottom">
          
                <h2 class="titulocrud text-dark "><i class="fas fa-users mr-2" style="font-size: 1em;"></i>Cadastro Alunos </h2>

        <form action="cURL/cURLAluno/POST_Aluno.php" method="POST">
          
          <input type="hidden" name="modulo" value="aluno" class="form-control" id="inputEmail4">
          <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']?>" class="form-control" id="inputEmail4">
          <div class="form-row">
            <div class="form-group formcrud col-md-8">
              <label for="inputEmail4" class="text-dark">Nome Completo</label>
              <input type="text" name="nome_aluno" maxlength="100" class="form-control" id="inputEmail4" required="">
            </div>
            <div class="form-group formcrud col-md-4">
              <label for="inputPassword4" class="text-dark">CPF</label>
              <input maxlength="11" type="text" name="CPF" class="form-control" id="inputPassword4" required="" >
              <small id="passwordHelpBlock" class="form-text text-muted">
                Apenas números.
              </small>
            </div>
            
          </div>
          <div class="form-row">
            <div class="form-group formcrud col-sm-12">
                <label for="inputAddress" class="text-dark">Endereço</label>
                <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Av Jerônimo de Albuquerque, nº 0">
              </div>
          </div>
          <div class="form-row">
              <div class="form-group formcrud col-sm-8">
                <label for="inputAddress2" class="text-dark">CEP</label>
                <input type="text" maxlength="8" name="CEP" class="form-control" id="inputAddress2">
                <small id="passwordHelpBlock" class="form-text text-muted text-light">
                Apenas números.
              </small>
              </div>
              <div class="form-group formcrud col-sm-4">
                <label for="inputAddress2" class="text-dark">Curso</label>
                <select class="custom-select" name="curso_id" required="">
                <option selected>Selecione o curso</option>
                <?php 
                  foreach ($cursos as $curso) {
                    echo "<option value=".$curso->id.">".$curso->nome_curso."</option>";
                  }
                ?>
              </select>
              </div>
          </div>

          <div class="form-row ">
            <div class="form-group formcrud col-md-6">
              <label for="inputCity" class="text-dark">E-mail</label>
              <input type="email" maxlength="50" name="email" class="form-control" id="inputCity" required="">
            </div>
            <div class="form-group formcrud col-md-6">
              <label for="inputCity" class="text-dark">Telefone</label>
              <input type="text" name="telefone" maxlength="50"  class="form-control" id="inputCity" placeholder="(00)984758486" required="">
            </div>
          </div>

          <button type="submit" class="btn text-light col-sm-2 mb-2">Adicionar</button>
        </form>
        <table class="table table-sm ">
      <thead class="tablehead">
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">CPF</th>
          <th scope="col">E-mail</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <!-- <a href=""><button type="button" class="btn text-light float-right col-sm-2">Gerar Excel</button></a> -->
        <i class="fas fa-cog float-right my-2" data-toggle="dropdown"></i>       
          <div class="dropdown-menu">
            <a class="dropdown-item" href="Gerar_Excel/Alunos_excel.php">Gerar Excel</a>
            <a class="dropdown-item" href="#">Imprimir</a>
        <?php 
            foreach ($alunos as $aluno) {
                echo "
                    <tr>
                      <td>".$aluno->nome_aluno."</td>
                      <td>".$aluno->CPF."</td>
                      <td>".$aluno->email."</td>
                      <td><a href='Edit_Aluno.php?id=".$aluno->id."'><i class='fas fa-user-edit'></i></a></td>
                      <td><a href='cURL/cURLAluno/DELETE_Aluno.php?id=".$aluno->id."'><i class='fas fa-trash-alt'></i></a></td>
                    </tr>

                ";
            }
        ?>        
      </tbody>
    </table>
    </div>
    
        
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  
</html>
