<?php
session_start();

    $id_item=$_GET['id_item'];
    $Quantite = isset($_POST["Quantite"])? $_POST["Quantite"] : "";

    $erreur = "";

    if($Quantite == "") {
        $erreur .= "Le champ Quantite est vide.<br>";
    }
    
    if($erreur == "") {

        define('DB_SERVER', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');

        //Identifier le NomUtil de la base
        $database = "amazonece2";

        //conecter l'utilisateur dans BDD
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        $db_found = mysqli_select_db($db_handle, $database);

        //si le BDD existe, faire le traitement
        if($db_found){

            $sql = "INSERT INTO panier(id_acheteur, id_item, quantite_voulu) VALUES ('".$_SESSION['id']."', '$id_item', '$Quantite')";
            $result = mysqli_query($db_handle, $sql_login);

            $sql1 = "SELECT * FROM panier where id_acheteur= '".$_SESSION['id']."' AND id_item = '$id_item'";
            
            $result1 = mysqli_query($db_handle, $sql1);

            while($data = mysqli_fetch_assoc($result1)){
                //echo "Nom : ".$data['nom_acheteur'].'<br>';
                //echo "Prenom : ".$data['prenom_acheteur'].'<br>';
                //echo "Adresse 1 : ".$data['adresseL1_acheteur'].'<br>';
               
                
            }
              

        } else{ echo "Database not found";}

        mysqli_close($db_handle);

    }
    else {
        echo "Erreur : $erreur";

    }

    echo "<BR><form><button class='button' formaction='newUtil.php' type='submit' >Retour</button></form>";

?>