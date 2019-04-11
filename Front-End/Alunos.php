<?php
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
    <nav class="navbar">
      <span class="navbar-brand mb-0 h1">Crud Alunos</span>
    </nav>
    <div class="container my-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Api Laravel!</strong> Conectada com sucesso
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="float-right" aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>
    <div class="container">
        <button type="button" class="btn col-sm-4 text-light" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Novo Aluno</button>
    </div>
    <div class="container my-3">
        <table class="table table-sm">
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
        <?php 
            foreach ($alunos as $aluno) {
                echo "
                    <tr>
                      <td>".$aluno->nome_aluno."</td>
                      <td>".$aluno->CPF."</td>
                      <td>".$aluno->email."</td>
                      <td><a href=''><i class='fas fa-user-edit'></i></a></td>
                      <td><a href=''><i class='fas fa-trash-alt'></i></a></td>
                    </tr>

                ";
            }
        ?>        
      </tbody>
    </table>
    </div>
    






    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <!-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nova mensagem</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> -->
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nome Completo</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">CPF</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Endereço</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">CEP</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">E-mail</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Telefone</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Curso</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <?php 
                        foreach ($cursos as $curso) {
                            echo "<option class='coroption' value=".$curso->id.">".$curso->nome."</option>";
                        }
                    ?>
                  
                </select>
              </div>
              
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Enviar</button>
          </div>
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
