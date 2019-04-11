<?php 

$ch = curl_init('http://localhost:8000/api/aluno');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$dados = array(
	'nome_aluno'=> $_POST['nome_aluno'],
	'CPF'=> $_POST['CPF'],
	'endereco'=> $_POST['endereco'],
	'CEP'=>$_POST['CEP'],
	'email'=>$_POST['email'],
	'telefone'=>$_POST['telefone'],
	'curso_id'=>$_POST['curso_id']
	);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dados);
curl_exec($ch);
curl_close($ch);
header("location: ../Alunos.php");



?>