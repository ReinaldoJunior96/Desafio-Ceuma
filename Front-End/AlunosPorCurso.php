<?php
@ob_start();
session_start();
if ((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    unset($_SESSION['code_user']);
    header('location:index.php');
}

$url_aluCursos = 'http://localhost:8000/api/curso/alunos/' . $_GET['curso'];
$url_cursos = 'http://localhost:8000/api/curso/' . $_GET['curso'];
$cabecalho = array('Content-Type: application/json', 'Accept: application/json');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url_aluCursos);
curl_setopt($ch, CURLOPT_HTTPHEADER, $cabecalho);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$resposta_aluCursos = curl_exec($ch);
$alucursos = json_decode($resposta_aluCursos);


$url_cursos = 'http://localhost:8000/api/curso/' . $_GET['curso'];
$ch_cursos = curl_init();
curl_setopt($ch_cursos, CURLOPT_URL, $url_cursos);
curl_setopt($ch_cursos, CURLOPT_HTTPHEADER, $cabecalho);
curl_setopt($ch_cursos, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch_cursos, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_cursos, CURLOPT_POST, true);
curl_setopt($ch_cursos, CURLOPT_CUSTOMREQUEST, 'GET');
$resposta_cursos = curl_exec($ch_cursos);
$cursos = json_decode($resposta_cursos);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Desafio Grupo Ceuma</title>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand text-dark font-weight-bold" href="Menu.php">
            <!-- <img src="images/perfil.png" width="30" height="30" class="d-inline-block align-top img-icon" alt=""> -->
            Desafio Ceuma
        </a>
        <button class="navbar-toggler corbotao" type="button" data-toggle="collapse" data-target="#textoNavbar"
                aria-controls="textoNavbar" aria-expanded="false" aria-label="Alterna navegação">
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
        <div class="container my-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Usuário <strong><?= $_SESSION['usuario'] ?></strong>, bem-vindo(a)
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="float-right" aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>
    </div> -->
<div class="container bg-form rounded-bottom">
    <?php foreach ($cursos as $curso) {
        echo "<h2 class='titulocrud'>Alunos do curso de " . $curso->nome_curso . "</h2>";
    } ?>

    <?php foreach ($alucursos as $alucurso) { ?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item topo text-light font-weight-bold rounded"><?php echo $alucurso->nome_aluno ?></li>
            <li class="list-group-item">CPF: <?php echo $alucurso->CPF ?></li>
            <li class="list-group-item">Endereço: <?php echo $alucurso->endereco ?></li>
            <li class="list-group-item">CEP: <?php echo $alucurso->CEP ?></li>
            <li class="list-group-item">E-mail: <?php echo $alucurso->email ?></li>
            <li class="list-group-item">Contato: <?php echo $alucurso->telefone ?></li>
        </ul>
    <?php } ?>
</div>
<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>
