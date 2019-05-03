<?php
session_start();

$id= $_SESSION["id_global"];

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

  $sql = "SELECT categorie, id_item FROM Items WHERE numero_vendeur='$id' ";

  $result = mysqli_query($db_handle, $sql);

  while($row = mysqli_fetch_assoc($result)) {
    $cat = $row['categorie'];
    $id_item = $row['id_item'];

    //echo print_r($row). "<br>"; pour debugger le row entier
    if($cat==1){
      $sql1 = "SELECT * FROM Items, Livres WHERE id_livre='$id_item' AND numero_vendeur='$id' AND id_item='$id_item'";
      $result1 = mysqli_query($db_handle, $sql1);
      while($data1 = mysqli_fetch_assoc($result1)){
        echo "Nom de l'article:" .$data1['nom_item']. '<br>';
        echo "Description:" .$data1['description_item']. '<br>';
        echo "Quantite:" .$data1['quantite']. '<br>';
        echo "Prix:" .$data1['prix_item']. '<br>';
        echo "Auteur du livre:" .$data1['auteur']. '<br>';
        echo "Annee de Parution:" .$data1['annee']. '<br>';
        echo "Edition du livre:" .$data1['edition']. '<br>'.'<br>';
        echo '<form action="SupprimerItem.php?arg='.$id_item.'& cat='.$cat.'" method="post" enctype="multipart/form-data">' ;
        echo ' <input type="submit" value="Supprimer" />';
        echo '</form>';
      } // end line
    }

    if($cat==2){
      $sql2 = "SELECT * FROM Items, Musique WHERE id_musique='$id_item' AND numero_vendeur='$id' AND id_item='$id_item' ";
      $result2 = mysqli_query($db_handle, $sql2);
      while($data2 = mysqli_fetch_assoc($result2)){
        echo "Nom de l'article:" .$data2['nom_item']. '<br>';
        echo "Description:" .$data2['description_item']. '<br>';
        echo "Quantite:" .$data2['quantite']. '<br>';
        echo "Prix:" .$data2['prix_item']. '<br>';
        echo "Auteur de la musique:" .$data2['auteur']. '<br>';
        echo "Annee de Parution:" .$data2['annee']. '<br>';
        echo "Genre:" .$data2['type']. '<br>'.'<br>';
        echo '<form action="SupprimerItem.php?arg='.$id_item.'& cat='.$cat.'" method="post" enctype="multipart/form-data">' ;
        echo ' <input type="submit" value="Supprimer" />';
        echo '</form>';
      } // end line
    }

    if($cat==3){
      $sql3 = "SELECT * FROM Items, Vetements WHERE id_vetement='$id_item' AND numero_vendeur='$id' AND id_item='$id_item' ";
      $result3 = mysqli_query($db_handle, $sql3);
      while($data3 = mysqli_fetch_assoc($result3)){
        echo "Nom de l'article:" .$data3['nom_item']. '<br>';
        echo "Description:" .$data3['description_item']. '<br>';
        echo "Quantite:" .$data3['quantite']. '<br>';
        echo "Prix:" .$data3['prix_item']. '<br>';
        echo "Taille:" .$data3['taille']. '<br>';
        echo "Couleur:" .$data3['couleur']. '<br>';
        echo "Sexe:" .$data3['sexe']. '<br>'.'<br>';
        echo '<form action="SupprimerItem.php?arg='.$id_item.'& cat='.$cat.'" method="post" enctype="multipart/form-data">' ;
        echo ' <input type="submit" value="Supprimer" />';
        echo '</form>';
      } // end line
    }

    if($cat==4){
      $sql4 = "SELECT * FROM Items, Sports_Loisirs WHERE id_sportsLoisirs='$id_item' AND numero_vendeur='$id' AND id_item='$id_item'";
      $result4 = mysqli_query($db_handle, $sql4);
      while($data4 = mysqli_fetch_assoc($result4)){
        echo "Nom de l'article:" .$data4['nom_item']. '<br>';
        echo "Description:" .$data4['description_item']. '<br>';
        echo "Quantite:" .$data4['quantite']. '<br>';
        echo "Prix:" .$data4['prix_item']. '<br>';

        if($data4['typeSport']==""){
          echo "Type de Loisirs:" .$data4['typeLoisirs']. '<br>';
        } else {
          echo "Type de Sport:" .$data4['typeSport']. '<br>'.'<br>';
        }
        echo '<form action="SupprimerItem.php?arg='.$id_item.'& cat='.$cat.'" method="post" enctype="multipart/form-data">' ;
        echo ' <input type="submit" value="Supprimer" />';
        echo '</form>';
      }
    }
  }
      echo "<BR><form><button class='button' formaction='VendeurMenu.php' type='submit' >Retour au menu</button></form>";
} else{
  echo "Database not found";
}
// fermer la connection
mysqli_close($db_handle);
?>
