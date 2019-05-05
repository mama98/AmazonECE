<?php
session_start();
?>
<html>
<head>
<title>Passer la commande</title>
    
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
        <link rel='stylesheet' href="css/mainUtil.css">
        <!--js-->

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
      </ul>
    </div>
  </div>
</nav>
</section>


<div id='logreg-forms' >
    <form action="acheteurTest.php" method="post">
    <table>

        <tr>
            <td colspan="2" align="center">Entrez vos information pour la commande</td>
        </tr> 

        
        <tr>
            <td>
                <div><br>Nom :</div>
            </td>
            <td>
                <div><br><input type="text" name="Nom"></div>
            </td>
        </tr> 
        <tr>
            <td>Prenom :</td>
            <td><input type="text" name="Prenom"></td>
        </tr> 
        <tr>
            <td>Adresse 1 :</td>
            <td><input type="text" name="Adresse1"></td>
        </tr> 
        <tr>
            <td>Adresse 2 :</td>
            <td><input type="text" name="Adresse2"></td>
        </tr> 
        <tr>
            <td>Ville :</td>
            <td><input type="text" name="Ville"></td>
        </tr> 
        <tr>
            <td>Code postal :</td>
            <td><input type="number" name="CodeP"></td>
        </tr> 
        <tr>
            <td>Pays :</td>
            <td><input type="text" name="Pays"></td>
        </tr> 
        <tr>
            <td>Numéro de téléphone :</td>
            <td><input type="number" name="NumTel"></td>
        </tr> 

        
        <tr>
            <td>
                <div><br>Type de carte :</div>
            </td>
            <td>
                <div><br><input type="text" name="TypeCarte"></div>
            </td>
        </tr> 
        <tr>
            <td>Numéro de carte :</td>
            <td><input type="number" name="NumCarte"></td>
        </tr>
        <tr>
            <td>Nom de la carte :</td>
            <td><input type="text" name="NomCarte"></td>
        </tr>  
        <tr>
            <td>Date d'expiration :</td>
        </tr> 
        <tr>
            <td>Mois :</td>
            <td><input type="number" name="DateMois"></td>
        </tr> 
        <tr>
            <td>Année :</td>
            <td><input type="number" name="DateAnnee"></td>
        </tr> 
        <tr>
            <td>Code de sécurité :</td>
            <td><input type="number" name="CodeSecu"></td>
        </tr> 


        <tr>
            <td colspan="2" align="center">
                <div><br><button class="btn btn-primary btn-block" type="submit">Valider</button></div>
            </td>
        </tr> 
    </table>
    </form>
</div>

    
<!--Login END-->  
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
