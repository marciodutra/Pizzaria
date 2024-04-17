<?php 

require_once "../../lib/dompdf/autoload.inc.php";

use Dompdf\Dompdf;


function file_get_contents_curl($url){
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);

	$dados = curl_exec($ch);
	curl_close($ch);

	return $dados;

}

$html = file_get_contents("http://localhost/Pizzaria/views/teste/comprovantePDF.php");

// instanciamos um objeto da classe do DOMPDF.

$pdf = new DOMPDF();

// definimos o tamanho do papel e a orientaçao.

$pdf->set_paper(array(0,0,104,250));

//carregar o conteúdo do html.

$pdf->load_html(utf8_decode($html));

//redenrizar a página.
$pdf->render();

//Enviamos o pdf para o navegador.
$pdf->stream('relatorioproduto.pdf');
