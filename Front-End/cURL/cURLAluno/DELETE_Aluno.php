<?php

$url       = 'http://localhost:8000/api/aluno/'.$_GET['id'];
$cabecalho = array('Content-Type: application/json', 'Accept: application/json');
$campos    = json_encode(array(
				'id' => $_GET['id']
			));

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            $url);
curl_setopt($ch, CURLOPT_HTTPHEADER,     $cabecalho);
curl_setopt($ch, CURLOPT_POSTFIELDS,     $campos);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST,           true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'DELETE');

$resposta = curl_exec($ch);

curl_close($ch);
header("location: ../../Alunos.php");



?>
