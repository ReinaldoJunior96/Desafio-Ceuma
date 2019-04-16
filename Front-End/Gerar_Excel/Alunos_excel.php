<?php
$url_alunos = 'http://localhost:8000/api/alunos/cursos';
$cabecalho = array('Content-Type: application/json', 'Accept: application/json');
$ch_alunos = curl_init();
curl_setopt($ch_alunos, CURLOPT_URL, $url_alunos);
curl_setopt($ch_alunos, CURLOPT_HTTPHEADER, $cabecalho);
curl_setopt($ch_alunos, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch_alunos, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_alunos, CURLOPT_POST, true);
curl_setopt($ch_alunos, CURLOPT_CUSTOMREQUEST, 'GET');
$resposta_alunos = curl_exec($ch_alunos);
$alunos = json_decode($resposta_alunos);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Contato</title>
    <head>
<body>
<?php
// Definimos o nome do arquivo que será exportado
$arquivo = 'Relatorio.xls';

// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<td colspan="8">Lista de cursos e alunos CEUMA</tr>';
$html .= '</tr>';


$html .= '<tr>';
$html .= '<td><b>ID</b></td>';
$html .= '<td><b>Nome</b></td>';
$html .= '<td><b>CPF</b></td>';
$html .= '<td><b>Endereço</b></td>';
$html .= '<td><b>CEP</b></td>';
$html .= '<td><b>E-mail</b></td>';
$html .= '<td><b>Telefone</b></td>';
$html .= '<td><b>Curso</b></td>';
$html .= '</tr>';

foreach ($alunos as $value) {
    $html .= '<tr>';
    $html .= '<td>' . $value->id . '</td>';
    $html .= '<td>' . $value->nome_aluno . '</td>';
    $html .= '<td>' . $value->CPF . '</td>';
    $html .= '<td>' . $value->endereco . '</td>';
    $html .= '<td>' . $value->CEP . '</td>';
    $html .= '<td>' . $value->email . '</td>';
    $html .= '<td>' . $value->telefone . '</td>';
    $html .= '<td>' . $value->nome_curso . '</td>';
    $html .= '</tr>';
}
// Configurações header para forçar o download
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
header("Content-Description: PHP Generated Data");
// Envia o conteúdo do arquivo
echo $html;
exit; ?>
</body>
</html>