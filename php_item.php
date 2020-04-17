<!DOCTYPE html>
<html>
<head>
	<title>Amazonia :: Items</title>
	<meta charset="utf-8">
	<!--BOOTSTRAP-->
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
	<link rel= "stylesheet"
	href= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
 	<script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
 	</script>
 	<script type="text/javascript">
 		function encherir(){
 			var mess = prompt("Saisissez votre enchère :");
 			
 		}
 	</script>
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
 			<a href="html_index.php"><div class="col-md-3" style="height:100px; background-color:#3B5565;"><h1 class="logo">amazonia</h1></div></a>
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
			<!--CONTENU DE LA PAGE-->
			<div class="col-md-9" id="contenu">
				<?php

					if(isset($_GET['err'])){
            			$error = $_GET['err'];
            			if($error==1){
                			echo "<p style='color:red'>Veuillez proposer une meilleure offre</p>";
            			}
            			if($error==2){
            				echo "<p style='color:red'>OK</p>";
            			}
                	}

					$database = "amazonia";

					$db_handle = mysqli_connect('localhost', 'root', '');
					$db_found = mysqli_select_db($db_handle, $database);

					if ($db_found) {
						$sql="SELECT * FROM item WHERE id=". $_GET['id'];
						$result = mysqli_query($db_handle, $sql); 
						
						while ($data = mysqli_fetch_assoc($result)) {
							echo '<div class="col-md-6" style="margin-top:20px;"><img src="' . $data["photo"] . '" style = "width:350px; height:350px;"></div>';
							echo '<div class="col-md-3" style="margin-top:20px;"><h4><u>'.$data['nom'].'</u></h4><br>';
							echo '<p>'.$data['description'].'</p>';
							echo '<p>Mis en vente le '.$data['date'].'</p><br>';
							echo '<p>Prix de base :</p>'.$data['prixbase'].'€<br><br>';
							echo '<p>Prix actuel :</p>'.$data['prixcourant'].'€<br><br>';
							if ($data['id_achat']==1){
								echo '<form><input type="submit" onclick="encherir()" name="encherir" value="Enchérir"></form></div>';
							}

							if ($data['id_achat']==2){
								echo '<form action="html_panier.php" method="post"><input type="submit" name="valider" value="Ajouter au panier"></form></div>';
							}

							if ($data['id_achat']==3){
								echo '<input type="submit" name="valider" value="Faire une offre"></div>';
							}

						}
						
					} else {
						echo "Database not found";
					}
					//fermer la connexion
					mysqli_close($db_handle);
				?>
			</div>
		</div>

		<!--FOOTER A COMPLETER-->
		<div class="row">
 			<div class="col-md-12" style="height:75px; background-color:#3B5565; text-align: center;">
 				<br>
 				<p class="menu">Contact : <a href="mailto:serviceclient@amazon.fr" class="menu">serviceclient@amazon.fr</a></p>
 			</div>
		</div>
	</div>
</body>
</html>