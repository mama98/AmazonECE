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
				<div>Nom de l'auteur:</div>
				<div><input type="text" name="nom_livres"/></div>

				<div>Année de Parution:</div>
				<div><input type="text" name="annee_livres"/></div>

				<div>Edition:</div>
				<div><input type="text" name="edition_livres"/></div>
		</div>

		<div id="Musique" style="display:none">
				<div>Nom de l'auteur:</div>
				<div><input type="text" name="nom_musique"/></div>

				<div>Année de Parution:</div>
				<div><input type="text" name="annee_musique"/></div>

				<div>Genre de musique:</div>
				<div><input type="text" name="type_musique"/></div>
		</div>

		<div id="Vetements" style="display:none">
				<div>Taille:( séparer les tailles par des virgules )</div> 
				<div><input type="text" name="taille"/></div>

				<div>Couleur:( séparer les couleurs par des virgules )</div>
				<div><input type="text" name="couleur"/></div>

				<div>Sexe:</div>
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
				  </div> 
		</div>


		<div id="Sports_Loisirs" style="display:none">
			<div>Choisissez entre les deux:</div>
				<div><button type="button" onclick="myFunctionSport()">Sports</button></div> <br>
				<div><button type="button" onclick="myFunctionLoisirs()">Loisirs</button></div>

			<br>
				
				<div id="sport" style="display:none">Type de sports:
					<input type="text" name="type_sport"/></div>

					<div id="loisirs" style="display:none">Type de loisirs:
						<input type="text" name="type_loisir"/></div>
		</div>



		<div id="Description" style="display:none" >
		 		<div>Nom de l'article:</div>
				<div><input type="text" name="nom_article"/></div>
			
				<div>Description de l'article:</div>
				<div><input type="text" name="description_article"/></div>

				<div>Quantité à vendre:</div>
				<div><input type="text" name="quantite_article"/></div>

				<div>Prix:</div>
				<div><input type="text" name="prix_article"/></div>
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