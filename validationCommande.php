<?php
session_start();
        
        $id_item=$_GET['arg'];
        $Quant=$_GET['quant'];

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

            

            $sql1 = "UPDATE items SET quantite = 'quantite - $Quant' where id_item = '$id_item'";
            $result1 = mysqli_query($db_handle, $sql1);

            while($data = mysqli_fetch_assoc($result)){

                if ($data['quantite']==0){
                    $sql_delete = "DELETE FROM items WHERE id_item = '$id_item'";
                    $result = mysqli_query($db_handle, $sql_delete);
                }

            }

            $sql = "DELETE FROM panier WHERE id_acheteur= '".$_SESSION['id']."' AND id_item = '$id_item'";
            $result = mysqli_query($db_handle, $sql);

            while($data = mysqli_fetch_assoc($result)){

                echo "Votre commande a bien été enregistrée !"              
                echo "<BR><form><button class='button' formaction='ListeLivre.php' type='submit' >Retour aux achats</button></form>";

            }
              

        } else{ echo "Database not found";}

        mysqli_close($db_handle);
    
        

?>