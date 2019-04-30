<?php
 $nom = isset($_POST["nom"])?$_POST["nom"] : ""; //if then else
 $prenom = isset($_POST["prenom"])?$_POST["prenom"] : "";
 $email = isset($_POST["email"])?$_POST["email"] : "";
 $login = isset($_POST["login"])?$_POST["login"] : "";
 $mdp = isset($_POST["mdp"])?$_POST["mdp"] : "";
 $IBAN = isset($_POST["IBAN"])?$_POST["IBAN"] : "";
 $image_profil=isset($_FILES['image_profil']['tmp_name'])?$_FILES['image_profil']['tmp_name'] : "";
 $image_fond=isset($_FILES['image_fond']['tmp_name'])?$_FILES['image_fond']['tmp_name'] : "";

 $image_check = getimagesize($_FILES['image_profil']['tmp_name']);

     if($image_check==false)
       {
        echo 'Le fichier selectionné n\'est pas une image';
       }
       else
       {
        $image_profil2 = addslashes(file_get_contents($_FILES['image_profil']['tmp_name']));
       }

       $image_check = getimagesize($_FILES['image_fond']['tmp_name']);
       if($image_check==false)
       {
        echo 'Le fichier selectionné n\'est pas une image';
       }
       else
       {
        $image_fond2 = addslashes(file_get_contents($_FILES['image_fond']['tmp_name']));
       }
   
 $erreur = "";

 if($nom == "") {$erreur .= "Le champ nom est vide. <br>";}
 if($prenom == "") {$erreur .= " Le champ prenom est vide. <br>";}
 if($email == "") {$erreur .= "Le champ email est vide. <br>";}
 if($login== "") {$erreur .= "Le champ login est vide. <br>";} 
 if($mdp== "") {$erreur .= "Le champ mot de passe est vide. <br>";}
 if($image_profil== "") {$erreur .= "Le champ image de profil est vide. <br>";}
 if($image_fond== "") {$erreur .= "Le champ image de fond est vide. <br>";}
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

	$sql2= "INSERT INTO vendeur(id_vendeur, IBAN_vendeur, photo_vendeur, fond_vendeur) VALUES ('$id', '$IBAN','image_profil2','image_fond2')";
	$result = mysqli_query($db_handle, $sql2);

	$db = mysqli_connect("localhost","root","","amazonece3"); //keep your db name
	$sql = "SELECT * FROM vendeur WHERE id_vendeur = $id";
	$sth = $db->query($sql);
	$result=mysqli_fetch_array($sth);
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['photo_vendeur'] ).'"/>';} //end if
// si la bDD existe pas

else{
	echo "Database not found";
}
// fermer la connection
mysqli_close($db_handle); 
?>