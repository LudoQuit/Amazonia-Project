<?php
if (empty($_POST['delete']))
{
	header('Location:php_listeacheteur.php');
	exit;
} else {
	$connect = mysqli_connect("localhost","root",""); 
	mysqli_select_db($connect,'amazonia');
	foreach ($_POST['delete'] as $valeur) {
		$sql = "DELETE FROM acheteur WHERE id = '$valeur'";
		$req = mysqli_query($connect, $sql); 
	}
header('Location:php_listeacheteur.php');
mysqli_close($connect);
}
?>