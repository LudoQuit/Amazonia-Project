<?php
	$classe = isset($_POST["classe"]) ? $_POST["classe"] : "";
	$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
	$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
	$pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
	$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
	$pw = isset($_POST["pw"]) ? $_POST["pw"] : "";
	$pwbis = isset($_POST["pwbis"]) ? $_POST["pwbis"] : "";



	$err = 0;
	if($nom == ""){
		header('Location: http://127.0.0.1/html_inscription.php?err=8');
		exit;
	}
	if($prenom == ""){
		header('Location: http://127.0.0.1/html_inscription.php?err=9');
		exit;
	}
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

	session_start();

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
					$_SESSION['acheteur'] = array(
						'pseudo' => $pseudo,
						'email' => $mail,
						'password' => $pw
					);
					header('Location: http://127.0.0.1/html_pageperso.php');
				}
				if($classe == "vendeur"){
					$sql  = " INSERT INTO vendeur(nom, prenom, email, pseudo, password) VALUES ('$nom', '$prenom', '$mail', '$pseudo', '$pw')";
					$result = mysqli_query($db_handle, $sql);
					$_SESSION['vendeur'] = array(
						'pseudo' => $pseudo,
						'email' => $mail,
						'password' => $pw
					);
					header('Location: http://127.0.0.1/html_pageperso.php');
				}
				
			}

		} else{
			echo "Database not found";
		}
	}
	mysqli_close($db_handle);
?>