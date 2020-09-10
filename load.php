<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

if(!isset($_SESSION))
	session_start();

ob_start();
$file = explode("/", $_POST['data']);
require_once ($file[2]);

$html = ob_get_clean();
$html = str_replace('<button type="submit" class="btn btn-success">Generar informe</button>', " ", $html);

if($html !== false)
{
	$_SESSION['success'] = "El documento fue generado con éxito.";

	$dompdf->loadHtml($html);
	$dompdf->setPaper('A4', 'landscape');
	$dompdf->render();
	
	$name = 'FicheroEjemplo.pdf';
	$pdf = $dompdf->stream($name);
	file_put_contents($name, $dompdf->output());
}