<?php
session_start();

$_SESSION['more_pics'] = false;
$id = $_SESSION['id_global'];

include("php_functions.php");

if ($id != 1) {
  alert_and_redirect("Vous ne pouvez pas acceder a ce menu",
                      "ConnexionVendeur.html");
}

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

//identifier le nom de la base de donnee
$database ="amazonece3";

//connecter l'utilisateur dans BDD
$db_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found= mysqli_select_db($db_handle, $database);

//si la BDD existe, faire le traitement
if($db_found){
  $sql = "SELECT nom_utilisateur FROM Utilisateur, Vendeur WHERE id_vendeur='$id' AND id_utilisateur=id_vendeur ";
  $result = mysqli_query($db_handle, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    $nom=$row['nom_utilisateur'];
  }
} else{
  echo "Database not found";
}
mysqli_close($db_handle);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Menu de Vente</title>
  <meta charset="utf-8">
</head>
<body>
  <h2>Bonjour <?php echo $nom; ?></h2>

  <form action="VendeurItemChoix.php" method="post">
    <div><h3>Mettre en vente un article:</h4></div>
    <div><input type="submit" value="Choisir article"/></div>
  </form>

  <form action="VendeurListe.php" method="post">
    <div><h3>Voir votre liste d'articles mis en vente: </h3></div>
    <div><input type="submit" value="Votre liste"/></div>
  </form>

  <form action="Vendeur.html" method="post">
    <div><input type="submit" value="Ajouter un vendeur"/></div>
  </form>

  <form action="RetirerVendeur.html" method="post">
    <div><input type="submit" value="Retirer un vendeur"/></div>
  </form>
    <?php
    //identifier le nom de la base de donnee
    $database ="amazonece3";

    //connecter l'utilisateur dans BDD
    $db_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found= mysqli_select_db($db_handle, $database);

    //si la BDD existe, faire le traitement
    if($db_found){

      $sql = "SELECT photo_vendeur, fond_vendeur FROM Vendeur WHERE id_vendeur='$id' ";

      $result = mysqli_query($db_handle, $sql);

      if ($result) {
        $row = $result->fetch_assoc();

        $profil = $row['photo_vendeur'];
        $fond = $row['fond_vendeur'];

        echo "<img src=\"images_profil/$profil\" style=\"width: 80px; height: 80px;\">";
        echo "<img src=\"images_fond/$fond\" style=\"width: 320px; height: 320px;\">";

        //TODO Changer pour que ce soit joli sur la frontend
      } else {
        die();
      }
    } else{
      echo "Database not found";
    }
    // fermer la connection
    mysqli_close($db_handle);
    ?>
    <div><h3>Modifer la photo de profil</h3></div>
    <form action="image.php?arg=profil" method="post" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Sélectionnez le fichier à télécharger:</td>
          <td><input type="file" name="fileToUpload"></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="buttonPic" value="Télécharger"></td>
          </tr>
        </table>
      </form>
      <div><h3>Modifer la photo de fond</h3></div>
      <form action="image.php?arg=fond" method="post" enctype="multipart/form-data">
        <table>
          <tr>
            <td>Sélectionnez le fichier à télécharger:</td>
            <td><input type="file" name="fileToUpload"></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <input type="submit" name="buttonPic" value="Télécharger"></td>
            </tr>
          </table>
        </form>
        <div id="errordiv"></div>
      </body>
      </html>
