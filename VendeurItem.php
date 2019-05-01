<?php
 $nom = isset($_POST["nom"])?$_POST["nom"] : ""; //if then else
 $categorie = isset($_POST["categorie"])?$_POST["categorie"] : "";
 $description = isset($_POST["description"])?$_POST["description"] : "";
 $quantite = isset($_POST["quantite"])?$_POST["quantite"] : "";
 $prix = isset($_POST["prix"])?$_POST["prix"] : "";
 $erreur = "";
   
 if($nom == "") {$erreur .= "Le champ nom est vide. <br>";}
 if($categorie == "") {$erreur .= " Le champ categorie est vide. <br>";}
 if($description == "") {$erreur .= "Le champ description est vide. <br>";}
 if($quantite== "") {$erreur .= "Le champ quantite est vide. <br>";} 
 if($prix== "") {$erreur .= "Le champ prix est vide. <br>";}

 if ($erreur == "") {
 echo "Formulaire valide";
 }
 else {
 echo "Erreur : $erreur";
 }

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

	$sql = "INSERT INTO utilisateur( prenom_utilisateur, nom_utilisateur, email_utilisateur, login_utilisateur, mdp_utilisateur) VALUES ('$prenom','$nom', '$email','$login', '$mdp')";
	$result = mysqli_query($db_handle, $sql);

	$id = $db_handle->insert_id;
	echo $id;
  
  $temp_profil = explode(".", $image_profil);
  $temp_fond = explode(".", $image_fond);
  
  $image_profil2=$id. '.' . end($temp_profil);
  $image_fond2=$id. '.' . end($temp_fond);

  echo $image_profil2;
  echo $image_fond2;

	$sql2= "INSERT INTO vendeur(id_vendeur, IBAN_vendeur, photo_vendeur, fond_vendeur) VALUES ('$id', '$IBAN',NULL,NULL)";
	$result = mysqli_query($db_handle, $sql2);
}

// si la bDD existe pas

else{
	echo "Database not found";
}
// fermer la connection
mysqli_close($db_handle); 
?>