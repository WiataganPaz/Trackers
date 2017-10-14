<?php
// Inicia o Core
VerificarEntrada($NameAttachment, $NameUpload);

// Verificar se a entrada e importar ou anexar
function VerificarEntrada($NameAttachment, $NameUpload) {
	
	if($NameAttachment != '') {
		
		$Contribution = 'Attachment';
		$NameContribution = $NameAttachment;
		
		VersaoAtual($Contribution, $NameContribution);
		exit;
	} else if($NameUpload != '') {
		
		$Contribution = 'Upload';
		$NameContribution = $NameUpload;
		
		VersaoAtual($Contribution, $NameContribution);
		exit;
	} else {
		
		echo 'ERRO!Entrada!';
		exit;
	}
	
	exit;
}

// Verifica a versão atual
function VersaoAtual($Contribution, $NameContribution) {

	$V = '1';
	$DirDatabase = '../Trackers/Downloads/';
	$StatusWhile = '0';
	
	while($StatusWhile == '0') {
		
		$NameDatabase = 'Trackers_'.$V.'.txt';
		$FileDatabase = ''.$DirDatabase.''.$NameDatabase.'';
		
		if(file_exists($FileDatabase)) {
			
			$V = $V + '1';
			$StatusWhile= '0';
		} else {
			
			$VersaoAtual = $V - '1';
			$NameDatabase = 'Trackers_'.$VersaoAtual.'.txt';
			$FileDatabase = ''.$DirDatabase.''.$NameDatabase.'';
			$StatusWhile = '1';		
			
			CriarTemporarios($Contribution, $NameContribution, $FileDatabase, $DirDatabase, $NameDatabase, $V);
			exit;
		}
	}
	
	exit;
}

// Cria os arquvios temporários
function CriarTemporarios($Contribution, $NameContribution, $FileDatabase, $DirDatabase, $NameDatabase, $V) {

	$DirContribution = '../Trackers/'.$Contribution.'s/';
	$FileContribution = ''.$DirContribution.''.$NameContribution.'';
	
	$ContentFileDatabase = file_get_contents($FileDatabase);
	$ContentFileContribution = file_get_contents($FileContribution);
	$ContentFull = $ContentFileDatabase . $ContentFileContribution;
	
	$TempFileContent = ''.$DirDatabase.'Trackers_'.$V.'.txt.tmp';
	$TempTempFileContent = $TempFileContent.'.tmp';


	if (file_exists($TempFileContent)) {
		unlink($TempFileContent);
		unlink($TempTempFileContent);
	}
		
	file_put_contents($TempFileContent, $ContentFull, $V);
	copy($TempFileContent, $TempTempFileContent);
	
	unlink($FileContribution);
	
	RemoverLimpar($TempFileContent, $TempTempFileContent, $V);
	exit;
}

// Remover as linhas duplicadas e brancas
function RemoverLimpar($TempFileContent, $TempTempFileContent, $V) {
	
	// Remove linhas duplicadas
	$list = file($TempTempFileContent);
	$list = array_unique($list);
	unlink($TempTempFileContent);
	file_put_contents($TempTempFileContent , implode('', $list));
	
	// Linhas Brancas
	$lines = file($TempTempFileContent ,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); 
	$fp = fopen($TempTempFileContent, 'w'); 
	fwrite($fp, implode(PHP_EOL, $lines)); 
	fclose($fp);
	
	AdicionarLinhas($TempFileContent, $TempTempFileContent, $V);
	exit;
}

// Adicionar linhas em branco
function AdicionarLinhas($TempFileContent, $TempTempFileContent, $V) {
	
	unlink($TempFileContent);
	
	$ponteiro = fopen($TempTempFileContent,"r");
	while (!feof ($ponteiro)) {
		$linha = fgets($ponteiro,4096);
		$texto = $linha."\r\n";
		$texto = $texto."\r\n";
		$dado = fopen($TempFileContent, "a");
		fwrite($dado, $texto);
		fclose($dado);  
	}
	fclose ($ponteiro);
	
	$DelLineFinal = file($TempFileContent);
	$LinhaFinal = count($DelLineFinal);
	unset($DelLineFinal[$LinhaFinal]);
	file_put_contents($TempFileContent, $DelLineFinal);

	$DelLineFinal = file($TempFileContent);
	$LinhaFinal = count($DelLineFinal);
	unset($DelLineFinal[$LinhaFinal]);
	file_put_contents($TempFileContent, $DelLineFinal);
	
	
	RemoverTemporarios($TempFileContent, $TempTempFileContent, $V);
	exit;
}

// Deleta arquvios temporários
function RemoverTemporarios($TempFileContent, $TempTempFileContent, $V) {
	
	unlink($TempTempFileContent);
	
	RenomearTemporarios($TempFileContent, $V);
	exit;
}

// Renomear o arquivo temporario
function RenomearTemporarios($TempFileContent, $V) {
	
	$Tmp = substr($TempFileContent, 0, -4);
	rename($TempFileContent, $Tmp);
	$TempFileContent = $Tmp;
	
	ComprimirFile($TempFileContent, $V);
	exit;
}

// Comprimir o arquivo
function ComprimirFile($TempFileContent, $V) {

	$NameZipTmp = substr($TempFileContent, 0, -4);
	$NameZipTmp = ''.$NameZipTmp.'.zip';
	
	$zip = new ZipArchive();
	if( $zip->open( $NameZipTmp , ZipArchive::CREATE )  === true){    
		$zip->addFile($TempFileContent, 'Trackers_'.$V.'.txt');
		$zip->close();
	}
	if(file_exists($NameZipTmp)) {
		
		$NoDelZip = 'Trackers_'.$V.'.txt';
		$NoDelTxt = 'Trackers_'.$V.'.zip';
		
		//DeletarObsoletos($NoDelZip, $NoDelTxt);
		echo "<p>Ok!</p>";
		exit;
	} else {
		
		echo "Erro!Zipar!";
		exit;
	}
	
	exit;
}

// Deleta os arquvios já obsoletos
function DeletarObsoletos($NoDelZip, $NoDelTxt) {
	$DelDirFiles = '../Trackers/Downloads/';
	$DelDh = opendir($DelDirFiles);

	while (false !== ($DelFileName = readdir($DelDh))) {
	
		$DelExt = strtolower(end(explode(".", $DelFileName)));
		if(($DelExt == 'zip')||($DelExt == 'txt')) {
			
			if(($DelFileName == $NoDelZip)||($DelFileName == $NoDelTxt)) {
				//echo $DelFileName;
			} else{
				//unlink(''.$DelDirFiles.''.$DelFileName.'');
			}
			
		}
	}
	exit;
}
exit;
?>