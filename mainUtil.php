<?php
session_start();
?>
<html>
<head>
<title>Connection client</title>

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
        <link rel='stylesheet' href="css/mainUtil.css">
        <!--js-->
         <script src="Js/mainUtil.js"></script>
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


<!--NAVBAR PRINCIPALE-->

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
        <li class=""><a href="#">Vente</a></li>
        <li class=""><a href="#">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
</section>
  <!--NAVBAR PRINCIPALE END-->

<!--login-->

    <div id="logreg-forms" >

        <form class="form-signin" action="utilTest.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Identifiez vous</h1>
            <input type="text" name="Pseudo" id="inputPseudo" class="form-control" placeholder="Pseudo" required="" autofocus="">
            <input type="password" name="Mdp" id="inputPassword" class="form-control" placeholder="Mot de passe" required="">

            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i>Se connecter</button>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn btn-primary btn-block" type="submit" id="btn-signup"><i class="fas fa-user-plus"></i> Créer un compte</button>
            </form>

            <form class="form-signup" action="newUtilTest.php" method="post"> <!-- TODO Change to new Utilisateur ?i mainAcheteur here-->
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Créer un compte</h1>
                <input type="text"  name="NomUtil" id="user-name" class="form-control" placeholder="Nom" required="" autofocus="">
                <input type="text"  name="PrenomUtil" id="user-surname" class="form-control" placeholder="Prénom" required autofocus="">
                <input type="email" name="MailUtil" id="user-email" class="form-control" placeholder="Email address" required autofocus="">
                <input type="text" name="PseudoUtil" id="user-pseudo" class="form-control" placeholder="Pseudo" required autofocus="">
                <input type="password" name="MdpUtil" id="user-pass" class="form-control" placeholder="Password" required autofocus="">
                <input type="text" name="Adresse1" class="form-control" placeholder="Addresse 1">
                <input type="text" name="Adresse2" class="form-control" placeholder="Addresse 2">
                <input type="text" name="Ville" class="form-control" placeholder="Ville">
                <input type="number" name="CodeP" class="form-control" placeholder="Code Postal">
                <input type="text" name="Pays" class="form-control" placeholder="Pays">
                <input type="number" name="NumTel" class="form-control" placeholder="Numéro de télephone">
                <input type="text" name="TypeCarte" class="form-control" placeholder="Type de Carte">
                <input type="number" name="NumCarte" class="form-control" placeholder="Numéro de Carte">
                <input type="text" name="NomCarte" class="form-control" placeholder="Nom de la Carte">
                <input type="number" name="DateMois" class="form-control" placeholder="Mois d'expiration">
                <input type="number" name="DateAnnee" class="form-control" placeholder="Année d'expiration">
                <input type="number" name="CodeSecu" class="form-control" placeholder="Code de Sécurité">

                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i></button>
                <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Retour</a>
            </form >
        <br>

    </div>
    <!--login END-->
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
