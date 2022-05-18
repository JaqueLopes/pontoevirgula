<?php

$dir = './arquivos/';

$arquivoNome = 'termosdeuso.pdf';
$arquivoLocal = $dir.$arquivoNome;

if (!file_exists($arquivoLocal)) {
	echo "arquivo não encontrado";
	exit;
	
}



header('Content-Disposition: attachment; filename="'.$arquivoNome.'"');
header('Content-Type: application/octet-stream');
header('Content-Length: ' . filesize($arquivoLocal));

readfile ($arquivoLocal);

?>