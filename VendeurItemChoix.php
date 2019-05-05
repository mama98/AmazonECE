<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Informations sur l'article</title>
        <meta charset="utf-8"/>
        <!--to use reponsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <!--css-->
        <link rel='stylesheet' href="css/ConnexionVendeur.css">
        <!--js-->
			<script>
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
	    <!--TOP NAVBAR-->
    <section id="navbar">
    <nav class="top-bar">
      <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6  d-none d-sm-block ">
             <a class="navbar-brand" href="#"><img src="photos/1280px-Amazon_logo_plain.svg.png"></a>
        </div>
        <div class="col-sm-6  d-none d-sm-block ">
            <a class="contacter" href="#contact">Nous contacter</a>                       
        </div>
            
        <div class="col-xs-6  d-block d-sm-none ">
             <a class="navbar-brand" href="#"><img src="photos/XS-Amazon_logo_plain.svg%20(1).png"></a>
        </div>
        <div class="col-xs-6  d-block d-sm-none">
            <a class="contacter" href="#">Nous contacter</a>                       
        </div>
        </div>
      </div>
    </nav>   
    <!--TOP NAVBAR END-->

    <nav class="navbar navbar-expand-md navbar-inverse">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
    <i class="fas fa-bars fa-lg"></i>
    </button>
    </div>
      
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav mr-auto">
        <li class=""><a id="ventesflash" href="#">Ventes flash</a></li>
         <li class=""><a href="ConnexionVendeur.html">Vente</a></li>
        <li class=""><a href="ConnexionAdmin.html">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
</section>
  <!--NAVBAR PRINCIPALE END-->   
 <div id="logreg-forms" >
	<form class="form-signin" name="mainForm" action="VendeurItem.php?cat=" method="post">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Informations sur l'article:</h1>
			<p>Choisissez la catégorie de votre article:</p><br>

			<div><button class="btn btn-primary btn-block" type="button" onclick="myFunctionLivres(); reset()">Livres</button></div> <br>
			<div><button class="btn btn-primary btn-block" type="button" onclick="myFunctionMusique(); reset()">Musique</button></div>  <br>
			<div><button class="btn btn-primary btn-block" type="button" onclick="myFunctionVetements(); reset()">Vêtements</button></div> <br>
			<div><button class="btn btn-primary btn-block" type="button" onclick="myFunctionSportsLoisirs(); reset()">Sports et Loisirs</button></div>  <br>

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
				  <div><br>
				    <input type="radio" id="choixhomme"
				     name="sexe" value="homme">
				    <label for="choixhomme">Homme</label>

				    <input type="radio" id="choixhomme"
				     name="sexe" value="femme">
				    <label for="choixfemme">Femme</label> <br>

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
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i>Valider et passer a l'étape suivante</button>
			</div> <br>
			</form>
		    <form action='VendeurMenu.php' method='POST'><button class="btn btn-danger" type="submit"><i class="fas fa-arrow-left"></i>Retour</button></form>

</div>


<!--endpage-->
    <section id="endpage">
        
        <div class="container-fluid">
        
        <div class="col-xs-12" id="infos">
            <div class="heading">
                <h4>Informations:</h4>
                <ul>
                <li>Qui sommes nous?</li>
                <li>Tarifs et délais de livraison</li>
                <li>Retour produits</li>
                <li>Suivie de commande</li>
                </ul>
            </div>    
        </div>
        
        <div class="col-xs-12" id="contact">
                <div class="heading">
                    <h4>Nous contacter</h4>
                </div>
                <form role="form">
                 
                    <div id="personalinfo" class="col-sm-6 ">
                        <div class="form-group">
                            <label for="name" class="control-label">Nom:</label>
                            <input type="text" class="form-control" id="nom" placeholder=" Entrez votre nom"  required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Prenom:</label>
                            <input type="text" class="form-control" id="prenom" placeholder=" Entrez votre prenom"  required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Adresse Email:</label>
                            <input type="email" class="form-control" id="email" placeholder=" Entrez votre Email " required>
                        </div>  
                        
                        
                    </div>
                    <div id="textarea" class="col-sm-6 ">
                        <div class="form-group">
                            <label for ="message" class="control-label"> Message:</label>
                            <textarea  class="form-control" id="message" placeholder="Entrez votre message" maxlength="200" required></textarea>
                            <div id="textarea_feedback"></div>
                        </div>  
                    <button type="submit" class="btn btn-default submit" onclick="sendmessage();"><i class="fa fa-paper-plane" ></i>  Envoyer</button>
                    </div>
                 
                </form>
        </div>
        </div>
           
    </section>
    <!--endpage END-->

    <!-- FOOTER-->
       <footer class="text-center">
            <a href="#navbar">
                <span class="fas fa-chevron-up"></span>
            </a> 
           <h4>© ECE AMAZON</h4>
        </footer>
    <!-- FOOTER END -->
		</body>
		</html>