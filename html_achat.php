<?php
session_start();
require('php_auth.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Amazonia :: Acheter</title>
	<meta charset="utf-8">
	<!--BOOTSTRAP-->
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
	<link rel= "stylesheet"
	href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
 	<script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
 	<!--LIEN AVEC LA FEUILLE CSS-->
 	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container-fluid">
		<!--MESSAGE COVID-19-->
		<div class="row">
			<div class="col-md-12" style="height: 28px; background-color: #ECDC6D; color: #3B5565; text-align: center; font-size: 18px;">COVID-19 : Certains produits peuvent être temporairement indisponibles. Les délais de livraison peuvent être impactés.</div>
		</div>
		<!--MENU DU HAUT-->
		<div class="row">
			<!--LOGO DE AMAZONIA QUI RENVOIE A L'ACCEUIL-->
 			<a href="index.html"><div class="col-md-3" style="height:100px; background-color:#3B5565;"><h1 class="logo">amazonia</h1></div></a>
 			<!--RETOURNER A L'ACCEUIL-->
 			<div class="col-md-1" style="height:100px; background-color:#3B5565;">
				<h4 class="menu"><a class="clickmenu" href="html_index.php"><img src="accueil.gif" class="imgmenu" alt="accueil">Accueil</a></h4>
 			</div>
 			<!--FAIRE UN ACHAT-->
 			<div class="col-md-1" style="height:100px; background-color:#3B5565;">
				<h4 class="menu"><a class="clickmenu" href="html_achat.php"><img src="achat.gif" class="imgmenu" alt="achat">Acheter</a></h4>
 			</div>
 			<!--VENDRE UN PRODUIT-->
 			<div class="col-md-1" style="height:100px; background-color:#3B5565;">
				<h4 class="menu"><a class="clickmenu" href="html_vente.php"><img src="vente.gif" class="imgmenu" alt="vente">Vendre</a></h4>
 			</div>
 			<!--SE CONNECTER A SON COMPTE PERSO-->
 			<div class="col-md-1" style="height:100px; background-color:#3B5565;">
				<h4 class="menu"><a class="clickmenu" href="html_compte.php"><img src="compte.gif" class="imgmenu" alt="compte">Compte</a></h4>
 			</div>
 			<!--PANIER-->
 			<div class="col-md-1" style="height:100px; background-color:#3B5565;">
				<h4 class="menu"><a class="clickmenu" href="html_panier.php"><img src="panier.gif" class="imgmenu" alt="panier">Panier</a></h4>
 			</div>
 			<!--ESPACE QUI EST INUTILE-->
 			<div class="col-md-3" style="height:100px; background-color:#3B5565;"></div>
 			<!--ESPACE ADMINISTRATEUR DU SITE-->
 			<div class="col-md-1" style="height:100px; background-color:#3B5565;">
				<h4 class="menu"><a class="clickmenu" href="html_admin.php"><img src="admin.gif" class="imgmenu" alt="admin">Admin</a></h4>
 			</div>
		</div>

		<!--MENU DU COTE GAUCHE-->
		<div class="row">
			<div class="col-md-3" id="sommaire">
				<br>
				<form name="Filtre" action="" method="post"><table class="table">
					<!--LES CATEGORIES-->
					<tr style="background-color:#3B5565; color: white; font-weight: bold;"><td>Catégories :</td></tr>
					<tr style="background-color:white; color: #3B5565; font-weight: bold;">
						<td><input type="checkbox" name="categorie1" value="Feraille"> Féraille ou trésor<br><br>
						<input type="checkbox" name="categorie2" value="Musee"> Bon pour le Musée<br><br>
						<input type="checkbox" name="categorie3" value="Vip"> Accessoires VIP<br></td>
					</tr>
					<!--LES TYPES D'ACHATS DISPONIBLES SUR LE SITE-->
					<tr style="background-color:#3B5565; color: white; font-weight: bold;"><td>Achats :</td></tr>
					<tr style="background-color:white; color: #3B5565; font-weight: bold;">
						<td><input type="checkbox" name="achats1" value="Encheres"> Enchères<br><br>
						<input type="checkbox" name="achats2" value="Produits"> Achat immédiat<br><br>
						<input type="checkbox" name="achats3" value="Offre"> Meilleure offre<br></td>
					</tr>
					<!--bouton de filtre-->
					<tr><td align="right"><input type="button" name="filtrer" value="Filtrer"></td></tr>
				</table></form>
			</div>
			<!--CONTENU DU COTE DROIT-->
			<div class="col-md-9" id="contenu">
				<h1 class="entete">Acheter</h1>
				<div class="cadre">
				<br>
				<form method="post" action="php_achat.php"><table style="margin-left: -25px;" class="table">
					<tr>
						<td style="background-color: #3B5565;">
							<h4 class="entete" style="color: white; width: 100px;">Catégorie :</h4>
						</td>
						<td>
							<input style="border:1px solid #3B5565;background-color: #ccc;color: #3B5565; width: 180px;" class="btn btn-outline-secondary btn-lg" type="submit" name="tresor" value="Féraille ou trésor">
						</td>
						<td>
							<input style="border:1px solid #3B5565;background-color: #ccc;color: #3B5565; width: 180px;" class="btn btn-outline-secondary btn-lg" type="submit" name="musee" value="Bon pour le Musée"> 
						</td>
						<td>
							<input style="border:1px solid #3B5565;background-color: #ccc;color: #3B5565; width: 180px;" class="btn btn-outline-secondary btn-lg" type="submit" name="vip" value="Accessoires VIP"> 
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td style="background-color: #3B5565;">
							<h4 class="entete" style="color: white;">Achats :</h4>
						</td>
						<td>
							<input style="border:1px solid #3B5565;background-color: #ccc;color: #3B5565; width: 180px;" class="btn btn-outline-secondary btn-lg" type="submit" name="enchere" value="Enchères"> 
						</td>
						<td>
							<input style="border:1px solid #3B5565;background-color: #ccc;color: #3B5565; width: 180px;" class="btn btn-outline-secondary btn-lg" type="submit" name="achat" value="Achat immédiat"> 
						</td>
						<td>
							<input style="border:1px solid #3B5565;background-color: #ccc;color: #3B5565; width: 180px;" class="btn btn-outline-secondary btn-lg" type="submit" name="offre" value="Meilleure offre"> 
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td><td></td>
						<td align="center">
							<input style="border:1px solid #3B5565;background-color: #ccc;color: #3B5565; width: 180px;" class="btn btn-outline-secondary btn-lg" type="submit" name="tout" value="Tout voir"> 
						</td>
						<td></td>
					</tr>
				</table></form>
				</div>
			</div>

		<!--FOOTER A COMPLETER-->
		<div class="row">
 			<div class="col-md-12" style="height:75px; background-color:#3B5565; text-align: center;">
 				<br>
 				<p class="menu">Contact : <a href="mailto:serviceclient@amazonia.fr" class="menu">serviceclient@amazonia.fr</a></p>
 				<p class="menu"><?php 

 				if (!isset($_SESSION['Auth']) and !isset($_SESSION['vendeur']) and !isset($_SESSION['acheteur'])){
 					echo"Vous n'êtes pas connecté";

 				} elseif (isset($_SESSION['vendeur'])){
 					echo"Bonjour " .$_SESSION['vendeur']['pseudo']. " vous êtes connecté sur votre compte vendeur";
 					echo"<br><a href='php_logout.php'>Déconnexion</a>";
 				} elseif (isset($_SESSION['Auth'])){
 					echo"Bonjour " .$_SESSION['Auth']['pseudo']. " vous êtes connecté sur votre compte admin";
 					echo"<br><a href='php_logout.php'>Déconnexion</a>";
 				} elseif (isset($_SESSION['acheteur'])){
 					echo"Bonjour " .$_SESSION['acheteur']['pseudo']. " vous êtes connecté sur votre compte acheteur";
 					echo"<br><a href='php_logout.php'>Déconnexion</a>";
 				}
 				?>
 			</div>
		</div>
	</div>
</body>
</html>


