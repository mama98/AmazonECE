<?php
include ("php_functions.php");
session_start();

    $id_item=$_GET['arg'];

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

            $sql1 = "SELECT quantite FROM items where id_item='$id_item'";
            $result1 = mysqli_query($db_handle, $sql1);
            while($data = mysqli_fetch_assoc($result1)){

                if ($Quantite>$data['quantite']) {
                    alert('Quantité insuffisante');
                    
                }
                else {
                    $sql = "INSERT INTO panier(id_acheteur, id_item, quantite_voulu) VALUES ('".$_SESSION['id']."', '$id_item', '$Quantite')";
                    $result = mysqli_query($db_handle, $sql);
                    header("Location:acceuilAcheteur.php");
                }

            }

            
            

        } else{ echo "Database not found";}

        mysqli_close($db_handle);

    }
    else {
        echo "Erreur : $erreur";

    }

    echo "<BR><form><button class='button' formaction='acceuilAcheteur.php' type='submit' >Retour</button></form>";

?>
