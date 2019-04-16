<?php
$url_cursos = 'http://localhost:8000/api/curso';
$cabecalho = array('Content-Type: application/json', 'Accept: application/json');
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
$html .= '<td colspan="4">Lista de cursos - CEUMA</tr>';
$html .= '</tr>';


$html .= '<tr>';
$html .= '<td><b>ID</b></td>';
$html .= '<td><b>Curso</b></td>';
$html .= '<td><b>Data de Cadastro</b></td>';
$html .= '<td><b>Carga Horária</b></td>';
$html .= '</tr>';

foreach ($cursos as $value) {
    $html .= '<tr>';
    $html .= '<td>' . $value->id . '</td>';
    $html .= '<td>' . $value->nome_curso . '</td>';
    $html .= '<td>' . date('d/m/Y', strtotime($value->data_cadastro)) . '</td>';
    $html .= '<td>' . $value->carga_horaria . '</td>';
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