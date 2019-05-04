<?php
session_start();

    $id_item=$_GET['id_item'];
    $Quantite = isset($_POST["Quantite"])? $_POST["Quantite"] : "";

    $erreur = "";

    if( ($Quantite == "") || ($Quantite == 0) ) {
        $erreur .= "Veuillez choisir une quantité.<br>";
    }
    
    if($erreur == "") {

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

            $sql = "INSERT INTO panier(id_acheteur, id_item, quantite_voulu) VALUES ('".$_SESSION['id']."', '$id_item', '$Quantite')";
            $result = mysqli_query($db_handle, $sql_login);

            /*$sql1 = "SELECT * FROM panier where id_acheteur= '".$_SESSION['id']."' AND id_item = '$id_item'";
            
            $result1 = mysqli_query($db_handle, $sql1);

            while($data = mysqli_fetch_assoc($result1)){
                
            }*/ //Affichage des items dans un autre fichier panier.php
              

        } else{ echo "Database not found";}

        mysqli_close($db_handle);

    }
    else {
        echo "Erreur : $erreur";

    }

    echo "<BR><form><button class='button' formaction='newUtil.php' type='submit' >Retour</button></form>";

?>