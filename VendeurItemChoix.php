<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Informations sur l'article</title>
	<meta charset="utf-8">
			<script>
				//var cat = 0;
				//var scrip = "VendeurItem.php?cat="

				function myFunctionLivres() {
					document.mainForm.action = "VendeurItem.php?cat=1"
					var livres = document.getElementById("Livres");
					var musique = document.getElementById("Musique");
					var vetements = document.getElementById("Vetements");
					var sports_loisirs = document.getElementById("Sports_Loisirs");
					var loisir = document.getElementById("loisirs");
					var sport = document.getElementById("sport");
					var description = document.getElementById("Description");
					livres.style.display="block";
					musique.style.display="none";
					vetements.style.display="none";
					sports_loisirs.style.display="none";
					loisir.style.display="none";
					sport.style.display="none";
					description.style.display="block"
				}

				function myFunctionMusique() {
					document.mainForm.action = "VendeurItem.php?cat=2"
					var livres = document.getElementById("Livres");
					var musique = document.getElementById("Musique");
					var vetements = document.getElementById("Vetements");
					var sports_loisirs = document.getElementById("Sports_Loisirs");
					var loisir = document.getElementById("loisirs");
					var description = document.getElementById("Description");					
					var sport = document.getElementById("sport");
					livres.style.display="none";
					musique.style.display="block";
					vetements.style.display="none";
					sports_loisirs.style.display="none";
					loisir.style.display="none";
					sport.style.display="none";
					description.style.display="block"

				}

				function myFunctionVetements() {
					document.mainForm.action = "VendeurItem.php?cat=3"
					var livres = document.getElementById("Livres");
					var musique = document.getElementById("Musique");
					var vetements = document.getElementById("Vetements");
					var sports_loisirs = document.getElementById("Sports_Loisirs");
					var loisir = document.getElementById("loisirs");
					var sport = document.getElementById("sport");
					var description = document.getElementById("Description");
					livres.style.display="none";
					musique.style.display="none";
					vetements.style.display="block";
					sports_loisirs.style.display="none";
					loisir.style.display="none";
					sport.style.display="none";
					description.style.display="block"

				}

				function myFunctionSportsLoisirs() {
					document.mainForm.action = "VendeurItem.php?cat=4"
					var livres = document.getElementById("Livres");
					var musique = document.getElementById("Musique");
					var vetements = document.getElementById("Vetements");
					var sports_loisirs = document.getElementById("Sports_Loisirs");
					var description = document.getElementById("Description");
					livres.style.display="none";
					musique.style.display="none";
					vetements.style.display="none";
					sports_loisirs.style.display="block";
					description.style.display="block"

				}

				function myFunctionSport() {
					var loisir = document.getElementById("loisirs");
					var sport = document.getElementById("sport");
					loisir.style.display="none";
					sport.style.display="block";
				}

				function myFunctionLoisirs() {
					var loisir = document.getElementById("loisirs");
					var sport = document.getElementById("sport");
					loisir.style.display="block";
					sport.style.display="none";
				}

			</script>
</head>
<body>
	<h3>Informations sur l'article:</h3>
	<form name="mainForm" action="VendeurItem.php?cat=" method="post">

			<p>Choisissez la catégorie de votre article:<p><br>

			<div><button type="button" onclick="myFunctionLivres(); reset()">Livres</button></div> <br>
			<div><button type="button" onclick="myFunctionMusique(); reset()">Musique</button></div>  <br>
			<div><button type="button" onclick="myFunctionVetements(); reset()">Vêtements</button></div> <br>
			<div><button type="button" onclick="myFunctionSportsLoisirs(); reset()">Sports et Loisirs</button></div>  <br>

		<div id="Livres" style="display:none">
			<table>
				<tr>
				<td>Nom de l'auteur:</td>
				<td><input type="text" name="nom_livres"/></td>
				</tr>
				<tr>
				<td>Année de Parution:</td>
				<td><input type="text" name="annee_livres"/></td>
				</tr>
				<tr>
				<td>Edition:</td>
				<td><input type="text" name="edition_livres"/></td>
			</tr>
		</table>
		</div>

		<div id="Musique" style="display:none">
			<table>
				<tr>
				<td>Nom de l'auteur:</td>
				<td><input type="text" name="nom_musique"/></td>
				</tr>
				<tr>
				<td>Année de Parution:</td>
				<td><input type="text" name="annee_musique"/></td>
				</tr>
				<tr>
				<td>Genre de musique:</td>
				<td><input type="text" name="type_musique"/></td>
				</tr>
			</table>
		</div>

		<div id="Vetements" style="display:none">
			<table>
			<tr>
				<td>Taille:( séparer les tailles par des virgules )</td> 
				<td><input type="text" name="taille"/></td>
			</tr>
			<tr>
				<td>Couleur:( séparer les couleurs par des virgules )</td>
				<td><input type="text" name="couleur"/></td>
			</tr>
			<tr>
				<td>Sexe:</td>
				<td>
				  <div>
				    <input type="radio" id="choixhomme"
				     name="sexe" value="homme">
				    <label for="choixhomme">Homme</label>

				    <input type="radio" id="choixhomme"
				     name="sexe" value="femme">
				    <label for="choixfemme">Femme</label>

				    <input type="radio" id="choixhomme"
				     name="sexe" value="Non spécifié">
				    <label for="choixNAN">Non spécifié</label>		
				  </div> </td>
			</tr>
			</table>
		</div>


		<div id="Sports_Loisirs" style="display:none">
			<table>
				<tr>
					<td>Choisissez entre les deux:</td>
					<td><button type="button" onclick="myFunctionSport()">Sports</button></td>
					<td><button type="button" onclick="myFunctionLoisirs()">Loisirs</button></td>
				</tr>
			</table>
			<br>
				
				<div id="sport" style="display:none">Type de sports:
					<input type="text" name="type_sport"/></div>

					<div id="loisirs" style="display:none">Type de loisirs:
						<input type="text" name="type_loisir"/></div>
		</div>



		<div id="Description" style="display:none" >
			<table>
			<tr>
		 		<td>Nom de l'article:</td>
				<td><input type="text" name="nom_article"/></td>
			</tr>
			<tr>
				<td>Description de l'article:</td>
				<td><input type="text" name="description_article"/></td>
			</tr>
			<tr>
				<td>Quantité à vendre:</td>
				<td><input type="text" name="quantite_article"/></td>
			</tr>
			<tr>
				<td>Prix:</td>
				<td><input type="text" name="prix_article"/></td>
			</tr>
		</table>
		</div>

			<div> 
				<input type="submit" value="Valider et passer à l'étape suivante" /> 
			</div> <br>
			</form>
		    <form action='VendeurMenu.php' method='POST'><input class='button' type='submit' value='Retour'></form>

			<div id="errordiv">
			</div>
		</body>
		</html>