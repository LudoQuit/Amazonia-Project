<?php
	$classe = isset($_POST["classe"]) ? $_POST["classe"] : "";
	$pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
	$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
	$pw = isset($_POST["pw"]) ? $_POST["pw"] : "";
	$pwbis = isset($_POST["pwbis"]) ? $_POST["pwbis"] : "";



	$err = 0;
	if($classe == ""){
		header('Location: http://127.0.0.1/html_inscription.php?err=1');
		exit;
	}
	elseif($pseudo == ""){
		header('Location: http://127.0.0.1/html_inscription.php?err=2');
		exit;
	}
	elseif($mail == ""){
		header('Location: http://127.0.0.1/html_inscription.php?err=3');
		exit;
	}
	elseif($pw == ""){
		header('Location: http://127.0.0.1/html_inscription.php?err=4');
		exit;
	}
	elseif($pw != $pwbis){
		header('Location: http://127.0.0.1/html_inscription.php?err=5');
		exit;
	}



	$database = "amazonia";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if($_POST["inscription"]){
		if($db_found){
			/* ON TESTE SI L'ADRESSE MAIL EST DEJA DANS LA BASE DE DONNEES */
			if($classe == "acheteur"){
				$sql = "SELECT * FROM acheteur";
			}
			if($classe == "vendeur"){
				$sql = "SELECT * FROM vendeur";
			}
			if ($mail != "") {
				$sql .= " WHERE email LIKE '$mail'";
			}
			$result = mysqli_query($db_handle, $sql);
			if (mysqli_num_rows($result) != 0) {
				header('Location: http://127.0.0.1/html_inscription.php?err=6');
				exit;
			}
			/* ON TESTE SI LE PSEUDO EST DEJA DANS LA BASE DE DONNEES */
			if($classe == "acheteur"){
				$sql = "SELECT * FROM acheteur";
			}
			if($classe == "vendeur"){
				$sql = "SELECT * FROM vendeur";
			}
			if ($pseudo != "") {
				$sql .= " WHERE pseudo LIKE '$pseudo'";
			}
			$result = mysqli_query($db_handle, $sql);
			if (mysqli_num_rows($result) != 0) {
				header('Location: http://127.0.0.1/html_inscription.php?err=7');
				exit;
			} 
			/* SINON ON AJOUTE L'UTILISATEUR A LA BASE DE DONNEES */
			else{
				if($classe == "acheteur"){
					$sql  = " INSERT INTO acheteur(email, pseudo, password) VALUES ('$mail', '$pseudo', '$pw')";
					$result = mysqli_query($db_handle, $sql);
					/* SE CONNECTER AU COMPTE DE L'ACHETEUR*/
				}
				if($classe == "vendeur"){
					$sql  = " INSERT INTO vendeur(nom, prenom, email, pseudo, password) VALUES ('', '', '$mail', '$pseudo', '$pw')";
					$result = mysqli_query($db_handle, $sql);
					/* SE CONNECTER AU COMPTE DU VENDEUR*/
				}
				
			}

		} else{
			echo "Database not found";
		}
	}
	mysqli_close($db_handle);
?>