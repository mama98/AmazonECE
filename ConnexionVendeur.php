<?php
session_start();

$_SESSION['more_pics'] = false;

$Pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$Email = isset($_POST["email"])? $_POST["email"] : "";
$Mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";

$erreur = "";

include("php_functions.php");

if($Pseudo == "") {
  $erreur .= "Le champ Pseudo est vide.<br>";
}
if($Email == "") {
  $erreur .= "Le champ Email est vide.<br>";
}
if($Mdp == "") {
  $erreur .= "Le champ Mot de passe est vide.<br>";
}

if($erreur == "") {
  define('DB_SERVER', 'localhost');
  define('DB_PASS', '');
  define('DB_USER', 'root');

  //Identifier le nom de la base
  $database = "amazonece3";

  //conecter l'utilisateur dans BDD
  $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
  $db_found = mysqli_select_db($db_handle, $database);

  //si le BDD existe, faire le traitement
  if($db_found){

    $sql = "SELECT login_utilisateur, email_utilisateur, mdp_utilisateur, id_utilisateur FROM Utilisateur, Vendeur WHERE id_utilisateur=id_vendeur AND login_utilisateur='$Pseudo' AND email_utilisateur='$Email' AND mdp_utilisateur='$Mdp' ";
    $result = mysqli_query($db_handle, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if($row['id_utilisateur']==1){
        alert_and_redirect("La connexion a échoué ! Connectez vous en tant qu\'admin.", "ConnexionAdmin.html");
      } else if ($Pseudo == $row['login_utilisateur']
      && $Email == $row['email_utilisateur']
      && $Mdp == $row['mdp_utilisateur']) {

        $id_global=$row['id_utilisateur'];
        $_SESSION['id_global']=$id_global;

        alert_and_redirect("Connexion réussie !", "VendeurMenu.php");
      } else {
        alert_and_redirect("La connexion a échoué.", "ConnexionVendeur.html");
      }
    } else {
      alert_and_redirect("Veuillez créer un compte."  , "Vendeur.html");
    }
  } else { alert("Database non trouvée");}

  mysqli_close($db_handle);
}
else {
  echo "Erreur : $erreur";

}
echo "<BR><form><button class='button' formaction='ConnexionVendeur.html' type='submit' >Retour à la connexion</button></form>";
?>
