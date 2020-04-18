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
	<title>Admin :: Acheteurs</title>
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
			<!--CONTENU-->
			<div class="col-md-9" id="contenu">
				<h1 class="entete">Supprimer des acheteurs</h1>
				<div class="cadre">
					<form action="php_choixadmin.php" method="POST">
					<table class="table" style="margin-top: 10px;">
						<tr style="background-color: #3B5565;">
							<td align="center">
								<input style="border:3px solid #3B5565; border-radius: 3px;background-color: white;color: #3B5565; width: 180px; padding: 0px"  type="submit" name="vendeur" value="Liste vendeurs">
							</td>
							<td align="center">
								<input style="border:3px solid #3B5565; border-radius: 3px;background-color: white;color: #3B5565; width: 180px; padding: 0px"  type="submit" name="acheteur" value="Acheteurs">
							</td>
							<td align="center">
								<input style="border:3px solid #3B5565; border-radius: 3px;background-color: white;color: #3B5565; width: 180px; padding: 0px;"  type="submit" name="item" value="Items">
							</td>
						</tr>
					</table>
					</form>
					<br>
					<form  action="php_suppacheteur.php" method="POST">
					<table class="table">
						<tr>
    				        <th>id</th>
    				        <th>email</th>
    				        <th>pseudo</th>
    				        <th>mot de passe</th>
    				        <th>supprimer</th>
						</tr>
						<?php
							$connect = mysqli_connect('localhost','root','');
							mysqli_select_db( $connect,'amazonia');
							$acheteur = "SELECT * FROM acheteur";
							$result = mysqli_query($connect, $acheteur) or exit ('Erreur SQL !'.$acheteur.'<br>'.			mysqli_error());;
		
							while ($ligne = mysqli_fetch_array($result)){
								echo"<tr><td>".$ligne['id']."</td>";
								echo"<td>".$ligne['email']."</td>";
								echo"<td>".$ligne['pseudo']."</td>";
								echo"<td>".$ligne['password']."</td>";
								echo"<td><input type='checkbox' name='delete[]' value='".$ligne['id']."'></td>";
								echo "</tr>";
							}
								mysqli_close($connect);
						?>
					</table>
					<input type="submit" name="supp" value="Supprimer">
					</form>
					<br>
				</div>
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