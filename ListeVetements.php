<?php

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

      $sql = "SELECT * FROM Items, Vetements WHERE categorie=3 AND id_item=id_vetement";
      $result = mysqli_query($db_handle, $sql);

      while($data = mysqli_fetch_assoc($result)){
        $plist = $data['photo_list'];
        if (is_null($plist)) { $plist = "default.png";}
        $p_array = explode(',', $plist);
        $video = $data['video_name'];
        $video_split = explode('.', $video);
        $video_type = end($video_split);
                $id_item=$data['id_item'];

        echo "<div class='Vetements'>Nom de l'article:" .$data['nom_item']. '<br>';
        echo "Description:" .$data['description_item']. '<br>';
        echo "Quantite:" .$data['quantite']. '<br>';
        echo "Prix:" .$data['prix_item']. '<br>';
        echo "Taille:" .$data['taille']. '<br>';
        echo "Couleur:" .$data['couleur']. '<br>';
        echo "Sexe:" .$data['sexe']. '<br>'.'<br>';
        echo "</div>";
       // end line

    foreach ($p_array as $value) {
      echo "<img src=\"images_items/$value\" style=\"width: 160px; height: 160px;\">";
    }

    unset($value);
    
    if (!is_null($video)) {
      echo '<video width = "160" height="160" controls>';
      echo '  <source src="videos_items/' . $video .'" type="video/' . $video_type .'">';
      echo '</video>';
      echo '<form action="ajoutPanier.php?arg='.$id_item.'" method="post" enctype="multipart/form-data">' ;
      echo ' <input type="submit" value="Ajouter au panier" />';
      echo '</form>';
    }
  }
  echo "<BR><form><button class='button' formaction='VendeurMenu.php' type='submit' >Retour au menu</button></form>";

} else{
  echo "Database not found";
}
// fermer la connection
mysqli_close($db_handle);
?>
