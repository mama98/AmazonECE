<?php
session_start();
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
          <input type="submit" name="buttonP" value="Télécharger"></td>
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
          <input type="submit" name="buttonF" value="Télécharger"></td>
        </tr>
      </table>
    </form>
  </body>
  </html>
