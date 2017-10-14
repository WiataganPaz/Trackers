<?php
define('URL_SITE', 'http://linkstring.comxa.com/Trackers/');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
    <title>Trackers</title>
   
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Aumente sua velocidade de dowloand Torrent e ajude seus amigos também.">
	
	<link rel="icon" href="<?php echo URL_SITE;?>Files/Img/favicon.png">
    <link rel="shortcut icon" href="<?php echo URL_SITE;?>Files/Img/favicon.png">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" async="" defer="defer" src="<?php echo URL_SITE;?>Files/Js/piwik_002.js"></script>
	<script type="text/javascript" async="" defer="defer" src="<?php echo URL_SITE;?>Files/Js/piwik.js"></script>
	<script type="text/javascript" src="<?php echo URL_SITE;?>Files/Js/main.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE;?>Files/Js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE;?>Files/Js/common.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE;?>Files/Js/Js.js"></script>
    <script type="text/javascript" src="<?php echo URL_SITE;?>Files/Js/Js2.js"></script>
	<script type="text/javascript" src="<?php echo URL_SITE;?>Files/Js/plupload.js"></script>
	
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:500&amp;subset=latin-ext" rel="stylesheet"> 
	<link href="<?php echo URL_SITE;?>Files/Css/jquery-ui-1.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL_SITE;?>Files/Css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL_SITE;?>Files/Css/Css.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL_SITE;?>Files/Css/Css2.css" rel="stylesheet" type="text/css">
    
	
</head>
<body class="adb">

	<div id="wrapper" class="width">

		<div id="header-wrapper">
			<div id="header">
				<div id="header-left">
				
					<a href="<?php echo URL_SITE;?>"><span id="Logo" class="ClassLogo">Trackers</span></a>
					
					<span id="Versao" class="ClassVersao">BETA</span>
					
					<div id="desc">Lista de Trackers Online. Ajude a aumentar nosso acervo de Trackers. Funcionais para todos os clientes Torrent, por meio do protocolo BitTorrent.</div>
					
					<ol>
						<li>Click em <b>Colar Minha Lista</b> ou <b>Importar Minha Lista</b> Para ajudar a aumentar a quantidade de Trackers e ajudar a todos os usuarios Torrent, assim como eu e você.</li>
						<li>Click em <b>Baixar Lista</b> para fazer o download de todos os dados coletados e assim turbinar seus downloads Torrents.</li>
					</ol>
					
				</div>
				<div class="clear"></div>
			</div>
		</div>


		<div id="switch-wrapper">
			<div id="switch" style="" class="ui-buttonset">
				<label id="ColarLista" for="pdf2doc-switch" class="ui-state-active ui-button ui-widget ui-state-default ui-button-text-only ui-corner-left" role="button">
					<span class="ui-button-text">Colar Minha Lista</span>
				</label>
				<label id="ImportarLista" for="pdf2docx-switch" class="ui-button ui-widget ui-state-default ui-button-text-only" role="button">
					<span class="ui-button-text">Importar Minha Lista</span>
				</label>
				<label id="BaixarLista" for="topdf-switch" class="ui-button ui-widget ui-state-default ui-button-text-only ui-corner-right" role="button">
					<span class="ui-button-text">Baixar Lista</span>
				</label>
			</div>
			<div class="clear"></div>
		</div>
	
	
		<div id="main">    
			<form class="FormUpload" action="<?php echo URL_SITE;?>Trackers/Upload.php" method="post" enctype="multipart/form-data">
		
				<input id="InputFile" class="InputHidden" type="file" name="UploadNameFile" value='' />
				<input id="InputSubmit" class="InputHidden" type="submit">
				
			</form>
			<div id="ButtonArquivoLimpar" class="ButtonArquivoLimpar" style="display: none;">
				<button id="BotaoArquivo" class="ButtonArquivo ButtonCss" role="button">
					<span class="ui-button-text">	
						<span class="ui-button-text">
							<span class="ui-button-text">Arquivo</span>
						</span>
					</span>
				</button>
				<button id="ButtonLimpar" class="ButtonLimpar ButtonCss" role="button">
					<span class="ui-button-text">	
						<span class="ui-button-text">
							<span class="ui-button-text">Limpar</span>
						</span>
					</span>
				</button>
			</div>
			
			<span id='NameFile' class="NameFileUpload"></span>
			
			<button id="ButtonUpload" class="ButtonUpload ButtonCss" role="button" style="display: none;">
				<span class="ui-button-text">	
					<span class="ui-button-text">
						<span id="UploadClassTexet" class="ui-button-text">Importar Trackers</span>
					</span>
				</span>
			</button>

			<div class="clear"></div>
   
			<div id="carousel-wrapper">
				<textarea id="AreaColar" class="AreaColar" name="textarea">Cole seus Trackers aqui!</textarea>
			</div>
			
			<div class="clear"></div>
			
			<button id="ButtonAnexar" class="ButtonAnexar ButtonCss ButtonOff" role="button">
				<span class="ui-button-text">	
					<span class="ui-button-text">
						<span class="ui-button-text">Anexar Trackers</span>
					</span>
				</span>
			</button>
					
			<button id="ButtonDownload" class="ButtonDownload ButtonCss" role="button" style="display: none;">
				<span class="ui-button-text">	
						<span class="ui-button-text">
							<span class="ui-button-text">Baixar Trackers</span>
						</span>
				</span>
			</button>

		</div>
		<div class="Status">
			<div class="StatusSuccess ClassStatus">Obrigado pela ajuda!</div>
			<div class="StatusFalha ClassStatus">Desculpe, ocorreu um erro.</div>
		</div>

		<footer id="footer">
			<div id="bottom">
		
				<p>© 2016-2017 <a href="http://linkstring.comxa.com/" target="_blank">LinkString</a> - Todos os Direitos Reservados.</p>
		
			</div>
		</footer>

	</div>

</body>
</html>