<?php
 session_start();
 $_SESSION['more_pics'] = false;

 $nom = isset($_POST["nom"])?$_POST["nom"] : ""; //if then else
 $prenom = isset($_POST["prenom"])?$_POST["prenom"] : "";
 $email = isset($_POST["email"])?$_POST["email"] : "";
 $login = isset($_POST["login"])?$_POST["login"] : "";
 $mdp = isset($_POST["mdp"])?$_POST["mdp"] : "";
 $IBAN = isset($_POST["IBAN"])?$_POST["IBAN"] : "";

 $erreur = "";
 if($nom == "") {$erreur .= "Le champ nom est vide. <br>";}
 if($prenom == "") {$erreur .= " Le champ prenom est vide. <br>";}
 if($email == "") {$erreur .= "Le champ email est vide. <br>";}
 if($login== "") {$erreur .= "Le champ login est vide. <br>";}
 if($mdp== "") {$erreur .= "Le champ mot de passe est vide. <br>";}
 if($IBAN == "") {$erreur .= "Le champ IBAN est vide. <br>";}

if ($erreur == "") {
	
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

//identifier le prenom de la base de donnee
$database ="amazonece3";

//connecter l'utilisateur dans BDD
$db_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
//$db_handle2= mysqli_connect(DB_SERVER, DB_USER, DB_PASS, $database);
$db_found= mysqli_select_db($db_handle, $database);
//si la BDD existe, faire le traitement
if($db_found){

	$sql = "INSERT INTO Utilisateur( prenom_utilisateur, nom_utilisateur, email_utilisateur, login_utilisateur, mdp_utilisateur) VALUES ('$prenom','$nom', '$email','$login', '$mdp')";
	$result = mysqli_query($db_handle, $sql);

	$id = $db_handle->insert_id;
  $_SESSION['id_global'] = $id;
	//echo $id;
  //Ajouter images par defaut a la place de NULL
	$sql2= "INSERT INTO Vendeur(id_vendeur, IBAN_vendeur, photo_vendeur, fond_vendeur) VALUES ('$id', '$IBAN', 'default.png', 'default.png')";
	$result = mysqli_query($db_handle, $sql2);

  header("Location:my_profile.php");
  exit();
}

// si la bDD existe pas

else{
	echo "Database not found";
}
// fermer la connection
mysqli_close($db_handle);
 }
 else {
 echo "Erreur : $erreur";
 }
?>
