<html>
<head>
<title>Achats</title>
    
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


<?php
session_start();

    $id_item=$_GET['arg'];

    $Quantite = isset($_POST["Quantite"])? $_POST["Quantite"] : "";

    $erreur = "";

    if( ($Quantite == "") || ($Quantite == 0) || ($Quantite<0) ) {
        $erreur .= "Veillez entrer une quantité.<br>";
    }
    
    if($erreur == "") {

        define('DB_SERVER', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');

        //Identifier le NomUtil de la base
        $database = "amazonece2";

        //conecter l'utilisateur dans BDD
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        $db_found = mysqli_select_db($db_handle, $database);

        //si le BDD existe, faire le traitement
        if($db_found){

            $sql1 = "SELECT quantite FROM items where id_item='$id_item'";
            $result1 = mysqli_query($db_handle, $sql1);
            while($data = mysqli_fetch_assoc($result1)){

                if ($Quantite>$data['quantite']) {
                    alert('Quantité insuffisante');
                    
                }
                else {
                    $sql = "INSERT INTO panier(id_acheteur, id_item, quantite_voulu) VALUES ('".$_SESSION['id']."', '$id_item', '$Quantite')";
                    $result = mysqli_query($db_handle, $sql);
                    header("Location:acceuilAcheteur.php");
                }

            }
              

        } else{ echo "Database not found";}

        mysqli_close($db_handle);

    }
    else {
        echo "Erreur : $erreur";
        echo "<BR><form><button class='button' formaction='accueilAcheteur.php' type='submit' >Retour</button></form>";
    }


?>

    
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
