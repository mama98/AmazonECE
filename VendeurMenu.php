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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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

  .photo_profil
  {
    position: absolute;
    top: 200px;
    right: 80px;
  }

  .titre1{
    color: #555555; font-family: Bahnschrift; font-size: 30px; font-weight: 700; text-transform: uppercase;
  }
   .titre2{
color: #555555; font-family: 'Raleway', sans-serif; font-size: 12pt; font-weight: 300;  }

    .photo_fond{
    position: absolute;
    top: 400px;
    right: 80px;
  }
    .container {
      position: relative;
      margin:10px;
    }
    .logo {
      display:block;
      position: relative;
      margin-left: auto;
      margin-right: auto;
      float:left;
      padding: 1em;
    }
    .titre{
      float:left;
    }
    .button_vente{
      float:bottom;
    }

    #content img {
      position: absolute;
      top: 40px;
      right: 80px;
    }

    .btn-two {
      color: #555555;   
      text-decoration: none;
      margin: 15px;
      padding: 15px 25px;
      border: 1px solid rgba(0,0,0,0.21);
      border-bottom-color: rgba(0,0,0,0.34);
      text-shadow:0 1px 0 rgba(0,0,0,0.15);
      box-shadow: 0 1px 0 rgba(255,255,255,0.34) inset, 
      0 2px 0 -1px rgba(0,0,0,0.13), 
      0 3px 0 -1px rgba(0,0,0,0.08), 
      0 3px 13px -1px rgba(0,0,0,0.21);
      position:left;
      display: block;
      width: 40%;
      margin-left: 150px;
      text-align: center;
    }

    .btn-two:active {
      top: 1px;
      border-color: rgba(0,0,0,0.34) rgba(0,0,0,0.21) rgba(0,0,0,0.21);
      box-shadow: 0 1px 0 rgba(255,255,255,0.89),0 1px rgba(0,0,0,0.05) inset;
      position: relative;
    }


    .btn-two.blue     {background-color: #bcbfc4;}

</style>
  <title>Menu de Vente</title>
  <meta charset="utf-8">
</head>
<body>
  <div id="content">
  <p style="color: #555555; font-family: Palatino; font-style: italic; font-size: 40px; font-weight: 700;">Bienvenue sur votre page de vente <?php echo $nom; ?></p>
  <img src="<?php echo 'images_profil/'.$profil ;?>" alt="Avatar" style=" width: 160px; height: 160px; border-radius: 50%;\">

  <div class="container"><br><br>

    <div class="logo">
      <span style="font-size: 7em; color: Mediumslateblue;">
        <i class="fas fa-plus-circle"></i></span></div>

        <p class="titre1">Vendre un article :<p>
          <p class="titre2">Pour ajouter un article, cliquer sur le lien ci-dessous</p>
          <a href="VendeurItemChoix.php" class="btn-two blue block">Mettre en vente un article</a><br><br><br>

          <div class="logo">
            <span style="font-size: 7em; color: Mediumslateblue;">
              <i class="fas fa-donate"></i></span></div>

              <p class="titre1">Votre liste d'articles :<p>
                <p class="titre2">Vous pouvez vérifier le status de vos articles mis en vente mais aussi les supprimer si besoin. </p> <br>
                <a href="VendeurListe.php" class="btn-two blue block">Liste de vos articles</a>

    </div>
    <div class="photo_profil">
     <div class="logo"> <span style="font-size: 2em; color: Mediumslateblue;">
        <i class="fas fa-cogs"></i></span></div>
      <h3>Modifer la photo de profil</h3>
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
    </div>
      <div class="photo_fond">
      <div class="logo"><span style="font-size: 2em; color: Mediumslateblue;">
        <i class="fas fa-cogs"></i></span></div>
        <h3>Modifer la photo de fond</h3>
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
      </div>
        <div id="errordiv"></div>
      </div>
      </body>
      </html>
