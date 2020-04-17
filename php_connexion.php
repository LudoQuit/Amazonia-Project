<?php
	$classe = isset($_POST["classe"]) ? $_POST["classe"] : "";
	$id = isset($_POST["id"]) ? $_POST["id"] : "";
	$pw = isset($_POST["pw"]) ? $_POST["pw"] : "";

	$err = 0;
	if($classe == ""){
		header('Location: http://127.0.0.1/html_inscription.php?err=1');
		exit;
	}
	elseif($id == ""){
		header('Location: http://127.0.0.1/html_inscription.php?err=2');
		exit;
	}
	elseif($pw == ""){
		header('Location: http://127.0.0.1/html_inscription.php?err=3');
		exit;
	}
?>