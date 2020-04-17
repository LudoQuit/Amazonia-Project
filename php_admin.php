<?php

	//on récupére les données du site
	$idadmin = isset($_POST["idadmin"])? $_POST["idadmin"] : "";
	$mailadmin = isset($_POST["mailadmin"])? $_POST["mailadmin"] : "";
	$pwadmin = isset($_POST["pwadmin"])? $_POST["pwadmin"] : "";

	$err = 0;
	if($idadmin == ""){
		header('Location: http://127.0.0.1/html_admin.php?err=1');
		exit;
	}
	elseif($mailadmin == ""){
		header('Location: http://127.0.0.1/html_admin.php?err=2');
		exit;
	}
	elseif($pwadmin == ""){
		header('Location: http://127.0.0.1/html_admin.php?err=3');
		exit;
	}
	
	session_start();

	//quand le bouton est appuyé
	if(isset($_POST["connexion"])){
		//connexion à la bdd
		$connect = mysqli_connect("localhost","root","","amazonia"); 
		if(!$connect){
			echo"Erreur de connexion à la base de données.";
		} else {
			$requete = mysqli_query($connect, "SELECT * FROM admin WHERE pseudo = '$idadmin' AND email = '$mailadmin' AND password = '$pwadmin'");
			if(mysqli_num_rows($requete) == 0){
				header('Location: http://127.0.0.1/html_admin.php?err=4');
				exit;
			} else {
				echo"Vous êtes bien connecté ! ";
				$_SESSION['Auth'] = array(
					'pseudo' => $idadmin,
					'email' => $mailadmin,
					'password' => $pwadmin
				);
			}
		}
	}
?>

