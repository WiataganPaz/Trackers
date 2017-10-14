<?php
define('URL_SITE', 'http://linkstring.comxa.com/Trackers/');
define('DIR_DOWNLOAD', '../Trackers/Downloads/');

VersaoAtual();

// Verifica a versão atual
function VersaoAtual() {

	$V = '1';
	$DirDatabase = '../Trackers/Downloads/';
	$StatusWhile = '0';
	
	while($StatusWhile == '0') {
		
		$NameDatabase = 'Trackers_'.$V.'.zip';
		$FileDatabase = ''.$DirDatabase.''.$NameDatabase.'';
		
		if(file_exists($FileDatabase)) {
			
			$V = $V + '1';
			$StatusWhile= '0';
		} else {
			
			$VersaoAtual = $V - '1';
			$NameDatabase = 'Trackers_'.$VersaoAtual.'.zip';
			$StatusWhile = '1';	
			
			$arquivo = $NameDatabase;
			Dowloand($arquivo);
			exit;
		}
	}
	
	exit;
}
function Dowloand($arquivo) {

// Retira caracteres especiais
$arquivo = filter_var($arquivo, FILTER_SANITIZE_STRING);
// Retira qualquer ocorrência de retorno de diretório que possa existir, deixando apenas o nome do arquivo
$arquivo = basename($arquivo);

// Aqui a gente só junta o diretório com o nome do arquivo
$caminho_download = DIR_DOWNLOAD . $arquivo;

// Verificação da existência do arquivo
if (!file_exists($caminho_download)) {
	//die('Erro!');
	echo '<meta http-equiv="refresh" content="0;URL='.URL_SITE.'">';
	exit;
}

header('Content-type: octet/stream');

// Indica o nome do arquivo como será "baixado". Você pode modificar e colocar qualquer nome de arquivo
header('Content-disposition: attachment; filename="'.$arquivo.'";'); 

// Indica ao navegador qual é o tamanho do arquivo
header('Content-Length: '.filesize($caminho_download));

// Busca todo o arquivo e joga o seu conteúdo para que possa ser baixado
readfile($caminho_download);

exit;
}

exit;
?>