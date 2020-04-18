<?php

if (isset($_POST["vendeur"])){
	header('Location:php_listevendeur.php');
}
if (isset($_POST["acheteur"])){
	header('Location:php_listeacheteur.php');
}
if (isset($_POST["item"])){
	header('Location:php_listeitem.php');
}

?>