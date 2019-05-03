<?php
session_start();
include("php_functions.php");

$_SESSION['more_pics'] = false;

$Pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$Email = isset($_POST["email"])? $_POST["email"] : "";
$Mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";

$erreur = "";


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
  define('DB_USER', 'root');
  define('DB_PASS', '');

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
      $id_global=$row["id_utilisateur"];
      $_SESSION['id_global']=$id_global;

      alert($id_global);

      if ($id_global == 1
          && $row['login_utilisateur'] == 'admin'
          && $row['mdp_utilisateur'] == 'admin'
          && $row['email_utilisateur'] == 'admin'){
            header("Location:AdminMenu.php");
            exit();
      }

      header("Location:VendeurMenu.php");
      exit();
    } else{
      echo "La connexion a échouée. Veuillez resaisir vos informations ou créer un compte:";
      echo "<form action='Vendeur.html' method='POST'\>";
      echo "<BR><BR><input class='button' type='submit' value='Créer un compte'\>";
      echo "</form></div>";
    }
  } else { echo "Database non trouvée";}

  mysqli_close($db_handle);

}
else {
  echo "Erreur : $erreur";

}
echo "<BR><form><button class='button' formaction='ConnexionVendeur.html' type='submit' >Retour à la connexion</button></form>";
?>
