<?php

$url       = 'http://localhost:8000/api/aluno/'.$_POST['id'];
$cabecalho = array('Content-Type: application/json', 'Accept: application/json');
$campos    = json_encode(array(
				'nome_aluno'=> $_POST['nome_aluno'],
				'CPF'=> $_POST['CPF'],
				'endereco'=> $_POST['endereco'],
				'CEP'=>$_POST['CEP'],
				'email'=>$_POST['email'],
				'telefone'=>$_POST['telefone'],
				'curso_id'=>$_POST['curso_id']
			));

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            $url);
curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
curl_setopt($ch, CURLOPT_POSTFIELDS,     $campos);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST,           true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'PUT');

$resposta = curl_exec($ch);

curl_close($ch);
header("location: ../../Aluno.php");



?>
