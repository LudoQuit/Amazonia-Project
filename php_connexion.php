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

	$database = "amazonia";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if($_POST["connexion"]){
		if($db_found){
			/* ON TESTE SI LE PSEUDO EST DANS LA BASE DE DONNEES */
			if($classe == "acheteur"){
				$sql = "SELECT * FROM acheteur";
			}
			if($classe == "vendeur"){
				$sql = "SELECT * FROM vendeur";
			}
			if ($id != "") {
				$sql .= " WHERE pseudo LIKE '$id'";
			}
			$result = mysqli_query($db_handle, $sql);
			if (mysqli_num_rows($result) == 0) {
				/* PAREIL AVEC LE MAIL*/
				if($classe == "acheteur"){
					$sql = "SELECT * FROM acheteur";
				}
				if($classe == "vendeur"){
					$sql = "SELECT * FROM vendeur";
				}
				if ($id != "") {
					$sql .= " WHERE mail LIKE '$id'";
				}
				$result = mysqli_query($db_handle, $sql);
				if (mysqli_num_rows($result) == 0) {
					header('Location: http://127.0.0.1/html_inscription.php?err=4');
					exit;
				}
				else{
					/* VERIFIER MDP (err=5) PUIS CONNEXION AVEC LE MAIL */
				}
			}
			else{
				/* VERIFIER MDP (err=5) PUIS CONNEXION AVEC LE PSEUDO */
			}
		} 
		else{
			echo "Database not found";
		}
	}
	mysqli_close($db_handle);
?>