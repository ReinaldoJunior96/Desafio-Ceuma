<?php 

$ch = curl_init('http://localhost:8000/api/curso');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$dados = array(
	'nome_curso'=> $_POST['nome_curso'],
	'data_cadastro'=> $_POST['data_cadastro'],
	'carga_horaria'=> $_POST['carga_horaria']
	);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
curl_exec($ch);
curl_close($ch);
header("location: ../Cursos.php");



?>