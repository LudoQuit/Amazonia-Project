<?php
session_start();
require('php_auth.php');
if(Auth::isLogged()){

} else{
	header('Location:html_admin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Liste des vendeurs d'amazonia</title>
</head>
<body>
	<?php
	$connect = mysqli_connect("localhost","root","","amazonia");
	$vendeurs = "SELECT * FROM vendeur";
	$resultat = $connect->query($vendeurs);
	while ($ligne = $resultat->fetch_assoc()){
		echo $ligne['id'].' '.$ligne['nom'].' '.$ligne['prenom'].' ';
		echo $ligne['email'].' '.$ligne['pseudo'].' '.$ligne['password'].' <br>';
	}
    ?>
	<a href="php_logout.php">Se déconnecter</a>
</body>
</html>
