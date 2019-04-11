<?php 

$url       = 'http://localhost:8000/api/curso';
$cabecalho = array('Content-Type: application/json', 'Accept: application/json');
$campos    = json_encode(array(
				'nome_curso'=> $_POST['nome_curso'],
				'data_cadastro'=> $_POST['data_cadastro'],
				'carga_horaria'=> $_POST['carga_horaria']
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
header("location: ../../Cursos.php");


?>