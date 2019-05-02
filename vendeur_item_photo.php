<?php
//SET $_SESSION['more_pics'] = false avant d'appeler cette page depuis
//vendeur_item.php !!! TODO
  session_start();
  if ($_SESSION['more_pics'] == false) {
    $_SESSION['nb_pic'] = 0;
  }
?>
<!DOCTYPE html>
<head>
  <title>Ajouter des photos</title>
  <meta charset="utf-8">
</head>
<body>
  <h2>Ajouter une photo</h2>
  <form action="item_image.php?arg=pic" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Sélectionnez la photo à ajouter</td>
        <td><input type="file" name="fileToUpload" value=""></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="buttonPic" value="Télécharger">
        </td>
      </tr>
    </table>
  </form>
  <h2>Ajouter une vidéo</h2>
  <form action="item_image.php?arg=vid" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Sélectionnez la photo à ajouter</td>
        <td><input type="file" name="fileToUpload" value=""></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="buttonPic" value="Télécharger">
        </td>
      </tr>
    </table>
  </form>

  <br><form><button class='button' formaction='VendeurMenu.php' type='submit' >Confirmer la vente</button></form>

</body>
