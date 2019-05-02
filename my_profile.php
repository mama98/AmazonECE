<?php
session_start();
//echo "<img src="

function alert($alert_msg) {
  echo "<script type=\"text/javascript\">";
  echo "alert('". $alert_msg ."');";
  echo "</script>";
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

  $id = $_SESSION['id_global'];
  $sql = "SELECT photo_vendeur, fond_vendeur FROM Vendeur WHERE id_vendeur = '$id'";
	$result = mysqli_query($db_handle, $sql) or die($db_handle->error);
  /*
  while ($row = $result->fetch_assoc()){
    foreach ($row as $value) alert($value); //Display image instead.
  }
  */
} else {
  alert("Erreur lors de la connection a la base de donnees");
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Profil Vendeur</title>
  <meta charset="utf-8">
</head>
<body>
  <h2>Modifer la photo de profil</h2>
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
  <h2>Modifer la photo de fond</h2>
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
  <form action="ConnexionVendeur.html" method="post"><input type="submit" name="ButtonConnexion" value="Connectez vous à présent"></td>
 </form>
  </body>
  </html>
