<?php
	$classe = isset($_POST["classe"]) ? $_POST["classe"] : "";
	$id = isset($_POST["id"]) ? $_POST["id"] : "";
	$mail = isset($_POST["mail"]) ? $_POST["mail"] : "";
	$pw = isset($_POST["pw"]) ? $_POST["pw"] : "";

	$err = 0;
	if($classe == ""){
		header('Location: http://127.0.0.1/html_compte.php?err=1');
		exit;
	}
	elseif($id == ""){
		header('Location: http://127.0.0.1/html_compte.php?err=2');
		exit;
	}
	elseif($mail == ""){
		header('Location: http://127.0.0.1/html_compte.php?err=9');
		exit;
	}
	elseif($pw == ""){
		header('Location: http://127.0.0.1/html_compte.php?err=3');
		exit;
	}

	session_start();

	$database = "amazonia";

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if($_POST["connexion"]){
		if($db_found){
			/* ON TESTE SI LE PSEUDO EST DANS LA BASE DE DONNEES */
			if($classe == "acheteur"){
				$sql = "SELECT * FROM acheteur WHERE pseudo = '$id' AND email = '$mail' AND password = '$pw'";
				$result = mysqli_query($db_handle, $sql);
				if(mysqli_num_rows($result) == 0){
					header('Location: http://127.0.0.1/html_compte.php?err=4');
					exit;
				} 
				else {
					$_SESSION['Auth'] = array(
						'pseudo' => $id,
						'email' => $mail,
						'password' => $pw
					);
					header('Location: http://127.0.0.1/html_pageperso.php');
				}
			}
			if($classe == "vendeur"){
				$sql = "SELECT * FROM vendeur WHERE pseudo = '$id' AND email = '$mail' AND password = '$pw'";
				$result = mysqli_query($db_handle, $sql);
				if(mysqli_num_rows($result) == 0){
					header('Location: http://127.0.0.1/html_compte.php?err=4');
					exit;
				}
				else {
					$_SESSION['Auth'] = array(
						'pseudo' => $id,
						'email' => $mail,
						'password' => $pw
					);
					header('Location: http://127.0.0.1/html_pageperso.php');
				}
			}
		}
		else{
			echo "Database not found";
		}
	}
	mysqli_close($db_handle);
?>