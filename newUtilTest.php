<html>
<head>
<title>Nouveau compte</title>

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

include("php_functions.php");

$nom = isset($_POST["NomUtil"])? $_POST["NomUtil"] : "";
$prenom = isset($_POST["PrenomUtil"])? $_POST["PrenomUtil"] : "";
$mail = isset($_POST["MailUtil"])? $_POST["MailUtil"] : "";
$pseudo = isset($_POST["PseudoUtil"])? $_POST["PseudoUtil"] : "";
$mdp = isset($_POST["MdpUtil"])? $_POST["MdpUtil"] : "";
$addr1 = isset($_POST["Addresse1"])? $_POST["Addresse1"] : "";
$addr2 = isset($_POST["Addresse2"])? $_POST["Addresse2"] : "";
$ville = isset($_POST["Ville"])? $_POST["Ville"] : "";
$code_pos = isset($_POST["CodeP"])? $_POST["CodeP"] : "";
$pays = isset($_POST["Pays"])? $_POST["Pays"] : "";
$num_tel = isset($_POST["NumTel"])? $_POST["NumTel"] : "";
$type_carte = isset($_POST["TypeCarte"])? $_POST["TypeCarte"] : "";
$num_carte = isset($_POST["NumCarte"])? $_POST["NumCarte"] : "";
$nom_carte = isset($_POST["NomCarte"])? $_POST["NomCarte"] : "";
$mois = isset($_POST["DateMois"])? $_POST["DateMois"] : "";
$annee = isset($_POST["DateAnnee"])? $_POST["DateAnnee"] : "";
$code_sec = isset($_POST["CodeSecu"])? $_POST["CodeSecu"] : "";


$_SESSION["login_utilisateur"]=$pseudo;
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

  $sql_login = "SELECT login_utilisateur, email_utilisateur FROM Utilisateur WHERE login_utilisateur='$pseudo' AND email_utilisateur='$mail'";
//FIXME
  $result2 = mysqli_query($db_handle, $sql_login) or die(mysqli_error($db_handle));
  if (mysqli_num_rows($result2) != 0) { //FIXME
    alert_and_redirect("Cet email et ce pseudo sont deja pris !", "mainUtil.php");
  } else {
    $sql_user = "INSERT INTO Utilisateur(prenom_utilisateur, nom_utilisateur, email_utilisateur, login_utilisateur, mdp_utilisateur)
                  VALUES('$prenom', '$nom', '$mail', '$pseudo', '$mdp')";
    $result_user = mysqli_query($db_handle, $sql_user) or die(mysqli_error($db_handle));

    $id_ach = $db_handle->insert_id;
    $sql_ach = "INSERT INTO Acheteur(id_acheteur, nom_acheteur, prenom_acheteur, adresseL1_acheteur, adresseL2_acheteur, ville, codePostal, pays, numTel, typeCarte, numCarte, nomCarte, dateMois, dateAnnee, codeSecurite)
      VALUES ('$id_ach', '$nom', '$prenom', '$addr1', '$addr2', '$ville', '$code_pos', '$pays', '$num_tel', '$type_carte', '$num_carte', '$nom_carte', '$mois', '$annee', '$code_sec')";
        $result_ach = mysqli_query($db_handle, $sql_ach) or die(mysqli_error($db_handle));

    if ($result_ach) {
      alert_and_redirect("Votre compte a bien été créé !", "mainUtil.php");
    } else {
      alert_and_redirect("Une erreur est survenue", "mainUtil.php");
    }
  }

} else{ echo "Database not found";}

mysqli_close($db_handle);
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
