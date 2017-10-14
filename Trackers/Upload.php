<?php

$erro = null;

if (isset($_FILES['UploadNameFile'])) {

    $extensoes = array(".txt");
    $caminho = "Uploads/";
    $nome = $_FILES['UploadNameFile']['name'];
    $temp = $_FILES['UploadNameFile']['tmp_name'];

    if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
		echo '<p>Error!Extensao!</p>';
	}

    if (!$erro) {

        $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");

        if (!move_uploaded_file($temp, $caminho . $nomeAleatorio)) {
			
            echo '<p>Error!Anexar!</p>';
			exit;
		} else{
			
			$NameUpload = $nomeAleatorio;
			require_once('../Trackers/Core.php');
			exit;
		}
    }
}
exit
?>