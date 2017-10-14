<?php

$NewsTrackers = $_POST['NewsTrackers'];
Attach($NewsTrackers);

function Attach($NewsTrackers) {
	$Status = '0';
	$N = '1';
	
	while($Status == '0') {
		$filename = '../Trackers/Attachments/Attachment'.$N.'.txt';
		
		if (file_exists($filename)) {
			$N = $N + '1';
			$Status = '0';

		} else {
			$NewFile = fopen($filename, 'a');
			$escreve = fwrite($NewFile, $NewsTrackers);
			fclose($NewFile);
			
			$Status = '1';

			$NameAttachment = 'Attachment'.$N.'.txt';
			require_once('../Trackers/Core.php');
			exit;
			
		}
	}
	
	exit;
}

exit;
?>