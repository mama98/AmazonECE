<?php
session_start();

        $id_item=$_GET['arg'];
        $id_global_acheteur=$_SESSION['id'];
        define('DB_SERVER', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');

        //Identifier le NomUtil de la base
        $database = "amazonece3";

        //conecter l'utilisateur dans BDD
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        $db_found = mysqli_select_db($db_handle, $database);

        //si le BDD existe, faire le traitement
        if($db_found){

            $sql = "SELECT categorie, photo_list, video_name FROM Items WHERE id_item = '$id_item'";
            $result = mysqli_query($db_handle, $sql);

            while($data = mysqli_fetch_assoc($result)){

                $cat = $row['categorie'];
                $plist = $row['photo_list'];
                if (is_null($plist)) { $plist = "default.png";}
                $p_array = explode(',', $plist);
                $video = $row['video_name'];
                $video_split = explode('.', $video);
                $video_type = end($video_split);

                //echo print_r($row). "<br>"; pour debugger le row entier
                if($cat==1){
                $sql1 = "SELECT * FROM Items, Livres, Acheteur a, Panier p WHERE 'a.id_item'='p.id_item'  AND 'a.id_acheteur'='p.id_acheteur' AND id_acheteur=$id_global_acheteur";
                $result1 = mysqli_query($db_handle, $sql1);
                while($data1 = mysqli_fetch_assoc($result1)){
                    echo "<div class='Livres'>Nom de l'article:" .$data1['nom_item']. '<br>';
                    echo "Description:" .$data1['description_item']. '<br>';
                    echo "Quantite:" .$data1['quantite']. '<br>';
                    echo "Prix:" .$data1['prix_item']. '<br>';
                    echo "Auteur du livre:" .$data1['auteur']. '<br>';
                    echo "Annee de Parution:" .$data1['annee']. '<br>';
                    echo "Edition du livre:" .$data1['edition']. '<br>'.'<br>';
                    echo "</div>";
                } // end line
                }

                if($cat==2){
                $sql2 = "SELECT * FROM Items, Musique, Acheteur a, Panier p  WHERE 'a.id_item'='p.id_item'  AND 'a.id_acheteur'='p.id_acheteur' AND id_acheteur=$id_global_acheteur ";
                $result2 = mysqli_query($db_handle, $sql2);
                while($data2 = mysqli_fetch_assoc($result2)){
                    echo "<div class='Musique'>Nom de l'article:" .$data2['nom_item']. '<br>';
                    echo "Description:" .$data2['description_item']. '<br>';
                    echo "Quantite:" .$data2['quantite']. '<br>';
                    echo "Prix:" .$data2['prix_item']. '<br>';
                    echo "Auteur de la musique:" .$data2['auteur']. '<br>';
                    echo "Annee de Parution:" .$data2['annee']. '<br>';
                    echo "Genre:" .$data2['type']. '<br>'.'<br>';
                    echo "</div>";
                } // end line
                }

                if($cat==3){
                $sql3 = "SELECT * FROM Items, Vetements, Acheteur a, Panier p  WHERE 'a.id_item'='p.id_item'  AND 'a.id_acheteur'='p.id_acheteur' AND id_acheteur=$id_global_acheteur ";
                $result3 = mysqli_query($db_handle, $sql3);
                while($data3 = mysqli_fetch_assoc($result3)){
                    echo "<div class='Vetements'>Nom de l'article:" .$data3['nom_item']. '<br>';
                    echo "Description:" .$data3['description_item']. '<br>';
                    echo "Quantite:" .$data3['quantite']. '<br>';
                    echo "Prix:" .$data3['prix_item']. '<br>';
                    echo "Taille:" .$data3['taille']. '<br>';
                    echo "Couleur:" .$data3['couleur']. '<br>';
                    echo "Sexe:" .$data3['sexe']. '<br>'.'<br>';
                    echo "</div>";
                } // end line
                }

                if($cat==4){
                $sql4 = "SELECT * FROM Items, Sports_Loisirs, Acheteur a, Panier p  WHERE 'a.id_item'='p.id_item'  AND 'a.id_acheteur'='p.id_acheteur' AND id_acheteur=$id_global_acheteur";
                $result4 = mysqli_query($db_handle, $sql4);
                while($data4 = mysqli_fetch_assoc($result4)){
                    echo "<div class='Sports_Loisirs'>Nom de l'article:" .$data4['nom_item']. '<br>';
                    echo "Description:" .$data4['description_item']. '<br>';
                    echo "Quantite:" .$data4['quantite']. '<br>';
                    echo "Prix:" .$data4['prix_item']. '<br>';

                    if($data4['typeSport']==""){
                    echo "Type de Loisirs:" .$data4['typeLoisirs']. '<br>';
                    } else {
                    echo "Type de Sport:" .$data4['typeSport']. '<br>'.'<br>';
                    }
                    echo "</div>";
                }
                }

                foreach ($p_array as $value) {
                echo "<img src=\"images_items/$value\" style=\"width: 160px; height: 160px;\">";
                }

                unset($value);
                echo '<video width = "160" height="160" controls>';
                echo '  <source src="videos_items/' . $video .'" type="video/' . $video_type .'">';
                echo '</video>';
                echo '<form action="mainUtil.php" method="post" enctype="multipart/form-data">' ;
                echo ' <input type="submit" value="Retour menu" />';
                echo '</form>';

            }
            

        } else{ echo "Database not found";}

        mysqli_close($db_handle);

?>