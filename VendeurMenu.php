<?php
session_start();

$_SESSION['more_pics'] = false;
$id = $_SESSION['id_global'];

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

      $sql = "SELECT photo_vendeur, fond_vendeur FROM Vendeur WHERE id_vendeur='$id' ";

      $result = mysqli_query($db_handle, $sql);

      if ($result) {
        $row = $result->fetch_assoc();

        $profil = $row['photo_vendeur'];
        $fond = $row['fond_vendeur'];

        //TODO Changer pour que ce soit joli sur la frontend
      }
} else{
  echo "Database not found";
}
mysqli_close($db_handle);
?>
<!DOCTYPE html>
<html>
<head>
<style> 

body 
  {  background-image: url(images_fond/<?php echo $fond; ?>);
     background-color: #cccccc;
  }

    #content {
    position: relative;
}

#content img {
    position: absolute;
    top: 40px;
    right: 80px;
}

.btn-two {
    color: white;   
    text-decoration: none;
    margin: 9px;
    padding: 15px 25px;
    display: inline-block;
    border: 1px solid rgba(0,0,0,0.21);
    border-bottom-color: rgba(0,0,0,0.34);
    text-shadow:0 1px 0 rgba(0,0,0,0.15);
    box-shadow: 0 1px 0 rgba(255,255,255,0.34) inset, 
                      0 2px 0 -1px rgba(0,0,0,0.13), 
                      0 3px 0 -1px rgba(0,0,0,0.08), 
                      0 3px 13px -1px rgba(0,0,0,0.21);
}

.btn-two:active {
    top: 1px;
    border-color: rgba(0,0,0,0.34) rgba(0,0,0,0.21) rgba(0,0,0,0.21);
    box-shadow: 0 1px 0 rgba(255,255,255,0.89),0 1px rgba(0,0,0,0.05) inset;
    position: relative;
}

.btn-two.block,  {
  display: block;
  width: 60%;
  margin-left: auto;
  margin-right: auto;
  text-align: center;
}

.color .blue   {background: #6698cb;}
.btn-two.blue     {background-color: #7fb1bf;}

</style>
  <title>Menu de Vente</title>
  <meta charset="utf-8">
</head>
<body>
  <div id="content">
  <h2>Bonjour <?php echo $nom; ?></h2>

    <a href="VendeurItemChoix.php" class="btn-two blue block">Mettre en vente un article</a>

    <div><h3>Voir votre liste d'articles mis en vente: </h3></div>
    <a href="VendeurListe.php" class="btn-two blue block">Liste d'articles</a>


    <img src="<?php echo 'images_profil/'.$profil ;?>" alt="Avatar" style=" width: 160px; height: 160px; border-radius: 50%;\">

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
      </div>
      </body>
      </html>
