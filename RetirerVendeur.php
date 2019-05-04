<?php
session_start();
include("php_functions.php");

$_SESSION['more_pics'] = false;

$Pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$Email = isset($_POST["email"])? $_POST["email"] : "";
$Nom = isset($_POST["nom"])? $_POST["nom"] : "";

$erreur = "";

if($Pseudo == "") {
  $erreur .= "Le champ Pseudo est vide.<br>";
}
if($Email == "") {
  $erreur .= "Le champ Email est vide.<br>";
}
if($Nom == "") {
  $erreur .= "Le champ Nom est vide.<br>";
}

if ($Pseudo == 'admin' && $Email == 'admin' && $Nom = 'admin') {
  alert_and_redirect("Vous ne pouvez pas supprimer le compte administrateur",
  "RetirerVendeur.html");
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
    $query_id = mysqli_query($db_handle,
    "SELECT id_utilisateur
    FROM Utilisateur
    WHERE login_utilisateur='$Pseudo'
    AND email_utilisateur='$Email'
    AND nom_utilisateur='$Nom'");

    if(mysqli_num_rows($query_id) == 0) {
      echo "Cet utilisateur n'existe pas !";
    }

    $row_id = $query_id->fetch_assoc();
    $id = $row_id['id_utilisateur'];

    $query_item = mysqli_query($db_handle, "SELECT id_item, categorie
      FROM Items
      WHERE numero_vendeur=$id");

      if (!$query_item) {
        alert("Cet utilisateur ne possede aucun objet !");
      } else {

        while ($row_item = $query_item->fetch_assoc()) {
          $id_item = $row_item['id_item'];
          $cat = $row_item['categorie'];

          switch($cat) {
            case 1:
            $db = 'Livres';
            $db_id = 'id_livre';
            break;
            case 2:
            $db = 'Musique';
            $db_id = 'id_musique';
            break;
            case 3:
            $db = 'Vetements';
            $db_id = 'id_vetement';
            break;
            case 4:
            $db = 'Sports_Loisirs';
            $db_id = 'id_sportsLoisirs';
            break;
          }

          $sql_del_specific =
          "DELETE FROM $db WHERE $db_id = $id_item;";
          $exec_sql_del_specific = mysqli_query($db_handle, $sql_del_specific)
          or die(mysqli_error($db_handle));

          $sql_del_items = "DELETE FROM Items WHERE id_item = $id_item;";
          $exec_sql_del_items = mysqli_query($db_handle, $sql_del_items)
          or die(mysqli_error($db_handle));

        }
        $sql_vendeur = "DELETE FROM Vendeur WHERE id_vendeur=$id;";
        $result_vendeur = mysqli_query($db_handle, $sql_vendeur)
        or die(mysqli_error($db_handle));
        $sql_user = "DELETE FROM Utilisateur WHERE id_utilisateur='$id';";
        $result_user = mysqli_query($db_handle, $sql_user)
        or die(mysqli_error($db_handle));

        alert_and_redirect("Utilisateur supprimé correctement.", "AdminMenu.php");
      }

    } else { echo "Database non trouvée";}

    mysqli_close($db_handle);

  } else {
    echo "Erreur : $erreur";

  }
  echo "<BR><form><button class='button' formaction='RetirerVendeur.html' type='submit' >Retour</button></form>";
  ?>
