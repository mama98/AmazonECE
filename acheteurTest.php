<html>
<head>
<title>Commande</title>
    
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

    $Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
    $Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
    $Adresse1 = isset($_POST["Adresse1"])? $_POST["Adresse1"] : "";
    $Adresse2 = isset($_POST["Adresse2"])? $_POST["Adresse2"] : "";
    $Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";
    $CodeP = isset($_POST["CodeP"])? $_POST["CodeP"] : "";
    $Pays = isset($_POST["Pays"])? $_POST["Pays"] : "";
    $NumTel = isset($_POST["NumTel"])? $_POST["NumTel"] : "";
    $TypeCarte = isset($_POST["TypeCarte"])? $_POST["TypeCarte"] : "";
    $NumCarte = isset($_POST["NumCarte"])? $_POST["NumCarte"] : "";
    $NomCarte = isset($_POST["NomCarte"])? $_POST["NomCarte"] : "";
    $DateMois = isset($_POST["DateMois"])? $_POST["DateMois"] : "";
    $DateAnnee = isset($_POST["DateAnnee"])? $_POST["DateAnnee"] : "";
    $CodeSecu = isset($_POST["CodeSecu"])? $_POST["CodeSecu"] : "";    


    $erreur = "";

    
    if($Nom == "") {
        $erreur .= "Le champ Nom est vide.<br>";
    }
    if($Prenom == "") {
        $erreur .= "Le champ Premon est vide.<br>";
    }
    if($Adresse1 == "") {
        $erreur .= "Le champ Adresse 1 est vide.<br>";
    }
    if($Ville == "") {
        $erreur .= "Le champ Ville est vide.<br>";
    }
    if($CodeP == "") {
        $erreur .= "Le champ Code Postal est vide.<br>";
    }
    if($Pays == "") {
        $erreur .= "Le champ Pays est vide.<br>";
    }
    if($NumTel == "") {
        $erreur .= "Le champ Site web est vide.<br>";
    }
    if($TypeCarte == "") {
        $erreur .= "Le champ Type de carte est vide.<br>";
    }
    if($NumCarte == "") {
        $erreur .= "Le champ Numéro de la Carte est vide.<br>";
    }
    if($NomCarte == "") {
        $erreur .= "Le champ Nom de la Carte est vide.<br>";
    }
    if($DateMois == "") {
        $erreur .= "Le champ DateMois est vide.<br>";
    }
    if($DateAnnee == "") {
        $erreur .= "Le champ DateAnnee est vide.<br>";
    }
    if($CodeSecu == "") {
        $erreur .= "Le champ Site web est vide.<br>";
    }

    if($erreur == "") {
        define('DB_SERVER', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');

        //Identifier le nom de la base
        $database = "amazonece3";

        //conecter l'utilisateur dans BDD
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        $db_found = mysqli_select_db($db_handle, $database);

        //si le BDD existe, faire le traitement
        if($db_found){

            $sql = "INSERT INTO acheteur(id_acheteur, nom_acheteur, prenom_acheteur, adresseL1_acheteur, adresseL2_acheteur, ville, codePostal, pays,
             numTel, typeCarte, numCarte, nomCarte, dateMois, dateAnnee, codeSecurite) 
             VALUES ('".$_SESSION['id']."', '$Nom', '$Prenom', '$Adresse1', '$Adresse2', '$Ville','$CodeP', '$Pays',
              '$NumTel', '$TypeCarte', '$NumCarte', '$NomCarte', '$DateMois',' $DateAnnee', '$CodeSecu')";
            $result = mysqli_query($db_handle, $sql);

            $sql1 = "SELECT * FROM acheteur where id_acheteur= '".$_SESSION['id']."' ";
            
            $result = mysqli_query($db_handle, $sql1);

            while($data = mysqli_fetch_assoc($result)){
                echo "Nom : ".$data['nom_acheteur'].'<br>';
                echo "Prenom : ".$data['prenom_acheteur'].'<br>';
                echo "Adresse 1 : ".$data['adresseL1_acheteur'].'<br>';
                echo "Adresse 2 : ".$data['adresseL2_acheteur'].'<br><br>';
                echo "Ville : ".$data['ville'].'<br>';
                echo "Code Postal : ".$data['codePostal'].'<br>';
                echo "Pays : ".$data['pays'].'<br>';
                echo "Numéro de téléphone : ".$data['numTel'].'<br>';
                echo "Type de carte : ".$data['typeCarte'].'<br>';
                echo "Numéro de carte : ".$data['numCarte'].'<br>';
                echo "Nom de carte : ".$data['nomCarte'].'<br>';
                echo "Date d'expiration :";
                echo "Mois : ".$data['dateMois'].'<br>';
                echo "Année : ".$data['dateAnnee'].'<br>';
                echo "Code de sécurité : ".$data['codeSecurite'].'<br>';
                
            }

            echo "<br>Vérifiez que les informations sont correctes. Voulez vous finaliser la commande ?<br>";
            echo "<BR><form><button class='button' formaction='validationCommande.php' type='submit' >Valider</button></form>";


        } else{ echo "Database not found";}

        mysqli_close($db_handle);

    }
    else {
        echo "Erreur : $erreur";
        echo "<BR><form><button class='button' formaction='mainAcheteur.php' type='submit' >Retour</button></form>";

    }

    echo "<BR><form><button class='button' formaction='acceuilAcheteur.php' type='submit' >Retour au menu principal</button></form>";

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
