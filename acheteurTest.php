<?php

    $Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
    $Prenom = isset($_POST["Prenom"])? $_POST["Prenom"] : "";
    $Adresse1 = isset($_POST["Adresse1"])? $_POST["Adresse1"] : "";
    $Adresse2 = isset($_POST["Adresse2"])? $_POST["Adresse2"] : "";
    $Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";
    $CodeP = isset($_POST["CodeP"])? $_POST["CodeP"] : "";
    $Pays = isset($_POST["Pays"])? $_POST["Pays"] : "";
    $NumTel = isset($_POST["NumTel"])? $_POST["NumTel"] : "";
    $TypeCarte = isset($_POST["TypeCarte"])? $_POST["TypeCarte"] : "";
    $NumCarte = isset($_POST["NumCarte"])? $_POST["NumCarte"] : "";
    $NomCarte = isset($_POST["NomCarte"])? $_POST["NomCarte"] : "";
    $DateMois = isset($_POST["DateMois"])? $_POST["DateMois"] : "";
    $DateAnnee = isset($_POST["DateAnnee"])? $_POST["DateAnnee"] : "";
    $CodeSecu = isset($_POST["CodeSecu"])? $_POST["CodeSecu"] : "";    


    $erreur = "";

    
    if($Nom == "") {
        $erreur .= "Le champ Nom est vide.<br>";
    }
    if($Prenom == "") {
        $erreur .= "Le champ Premon est vide.<br>";
    }
    if($Adresse1 == "") {
        $erreur .= "Le champ Adresse 1 est vide.<br>";
    }
    if($Ville == "") {
        $erreur .= "Le champ Ville est vide.<br>";
    }
    if($CodeP == "") {
        $erreur .= "Le champ Code Postal est vide.<br>";
    }
    if($Pays == "") {
        $erreur .= "Le champ Pays est vide.<br>";
    }
    if($NumTel == "") {
        $erreur .= "Le champ Site web est vide.<br>";
    }
    if($TypeCarte == "") {
        $erreur .= "Le champ Type de carte est vide.<br>";
    }
    if($NumCarte == "") {
        $erreur .= "Le champ Numéro de la Carte est vide.<br>";
    }
    if($NomCarte == "") {
        $erreur .= "Le champ Nom de la Carte est vide.<br>";
    }
    if($DateMois == "") {
        $erreur .= "Le champ DateMois est vide.<br>";
    }
    if($DateAnnee == "") {
        $erreur .= "Le champ DateAnnee est vide.<br>";
    }
    if($CodeSecu == "") {
        $erreur .= "Le champ Site web est vide.<br>";
    }

    if($erreur == "") {
        define('DB_SERVER', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');

        //Identifier le nom de la base
        $database = "amazonece3";

        //conecter l'utilisateur dans BDD
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        $db_found = mysqli_select_db($db_handle, $database);

        //si le BDD existe, faire le traitement
        if($db_found){

            $sql = "INSERT INTO acheteur(id_acheteur, nom_acheteur, prenom_acheteur, adresseL1_acheteur, adresseL2_acheteur, ville, codePostal, pays, numTel, typeCarte, numCarte, nomCarte, dateMois, dateAnnee, codeSecurite) VALUES (2,'$Nom', '$Prenom', '$Adresse1', '$Adresse2', '$Ville','$CodeP', '$Pays', '$NumTel', '$TypeCarte', '$NumCarte', '$NomCarte', '$DateMois',' $DateAnnee', '$CodeSecu')";
            $result = mysqli_query($db_handle, $sql);

            $sql1 = "select * FROM acheteur";
            
            $result = mysqli_query($db_handle, $sql1);

            while($data = mysqli_fetch_assoc($result)){
                echo "Nom : ".$data['nom_acheteur'].'<br>';
                echo "Prenom : ".$data['prenom_acheteur'].'<br>';
                echo "Adresse 1 : ".$data['adresseL1_acheteur'].'<br>';
                echo "Adresse 2 : ".$data['adresseL2_acheteur'].'<br><br>';
                echo "Ville : ".$data['ville'].'<br>';
                echo "Code Postal : ".$data['codePostal'].'<br>';
                echo "Pays : ".$data['pays'].'<br>';
                echo "Numéro de téléphone : ".$data['numTel'].'<br>';
                echo "Type de carte : ".$data['typeCarte'].'<br>';
                echo "Numéro de carte : ".$data['numCarte'].'<br>';
                echo "Nom de carte : ".$data['nomCarte'].'<br>';
                echo "Date d'expiration :";
                echo "Mois : ".$data['dateMois'].'<br>';
                echo "Année : ".$data['dateAnnee'].'<br>';
                echo "Code de sécurité : ".$data['codeSecurite'].'<br>';
                
            }

            echo "Vérifiez que les informations sont correctes. Voulez vous finaliser la commande ?<br>";
            echo "<BR><form><button class='button' formaction='main.php' type='submit' >Passer la commande</button></form>";
            echo "<form><button class='button' formaction='main.php' type='submit' >Retour</button></form>";

        } else{ echo "Database not found";}

        mysqli_close($db_handle);

    }
    else {
        echo "Erreur : $erreur";

    }

    echo "<BR><form><button class='button' formaction='main.php' type='submit' >Return to the menu</button></form>";

?>