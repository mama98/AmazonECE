<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

//identifier le nom de la base de donnee
$database ="amazonece3";

//connecter l'utilisateur dans BDD
$db_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found= mysqli_select_db($db_handle, $database);

$nb_livres = 0;
$nb_musique = 0;
$nb_vetements = 0;
$nb_sportsLoisirs = 0;

function afficher_item($data) {
    echo "<div>Nom de l'article:" .$data['nom_item']. '<br>';
    echo "Description:" .$data['description_item']. '<br>';
    echo "Quantite:" .$data['quantite']. '<br>';
    echo "Prix:" .$data['prix_item']. '<br>';
    echo "Nombre de ventes:" . $data['nb_vendu'] . '<br>' . '<br>';
    switch ($data['categorie']) {
      case 1:
        echo "Categorie: Livres <br>";
        break;
      case 2:
        echo "Categorie: Musiques <br>";
        break;
      case 3:
        echo "Categorie: Vetements <br>";
        break;
      case 4:
        echo "Categorie: Sports et Loisirs <br>";
        break;
    }
    echo "</div>";
}

//si la BDD existe, faire le traitement
if($db_found){
  $sql = "SELECT * FROM Items WHERE nb_vendu != 0 ORDER BY nb_vendu DESC";
  $result = mysqli_query($db_handle, $sql);

  while($data = mysqli_fetch_assoc($result)
  and $nb_livres < 4
  and $nb_musique < 4
  and $nb_vetements < 4
  and $nb_sportsLoisirs < 4){
    $plist = $data['photo_list'];
    if (is_null($plist)) { $plist = "default.png";}
    $p_array = explode(',', $plist);
    $video = $data['video_name'];
    $video_split = explode('.', $video);
    $video_type = end($video_split);
    $cat = $data['categorie'];

    if ($cat == 1 && $nb_livres < 4) {
      $nb_livres += 1;
      afficher_item($data);

    } else if ($cat == 2 && $nb_musique < 4) {
      $nb_musique += 1;
      afficher_item($data);
    } else if ($cat == 3 && $nb_vetements < 4) {
      $nb_vetements += 1;
      afficher_item($data);
    } else if ($cat == 4 && $nb_sportsLoisirs < 4) {
      $nb_sportsLoisirs += 1;
      afficher_item($data);
    }

    $id_item=$data['id_item'];

    foreach ($p_array as $value) {
      echo "<img src=\"images_items/$value\" style=\"width: 160px; height: 160px;\">";
    }

    unset($value);
    if(!is_null($video)) {
      echo '<video width = "160" height="160" controls>';
      echo '  <source src="videos_items/' . $video .'" type="video/' . $video_type .'">';
      echo '</video>';
    }
    echo '<form action="ajoutPanier.php?arg='.$id_item.'" method="post" enctype="multipart/form-data">' ;
    echo ' <input type="submit" value="Ajouter au panier" />';
    echo '</form>';
  }

  echo "<BR><form><button class='button' formaction='VendeurMenu.php' type='submit' >Retour au menu</button></form>";

} else{
  echo "Database not found";
}
// fermer la connection
mysqli_close($db_handle);

?>
