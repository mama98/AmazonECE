<?php

    $NomUtil = isset($_POST["NomUtil"])? $_POST["NomUtil"] : "";
    $PrenomUtil = isset($_POST["PrenomUtil"])? $_POST["PrenomUtil"] : "";
    $MailUtil = isset($_POST["MailUtil"])? $_POST["MailUtil"] : "";
    $PseudoUtil = isset($_POST["PseudoUtil"])? $_POST["PseudoUtil"] : "";
    $MdpUtil = isset($_POST["MdpUtil"])? $_POST["MdpUtil"] : "";


    $erreur = "";

    if($NomUtil == "") {
        $erreur .= "Le champ Nom est vide.<br>";
    }
    if($PrenomUtil == "") {
        $erreur .= "Le champ Premon est vide.<br>";
    }
    if($MailUtil == "") {
        $erreur .= "Le champ Mail est vide.<br>";
    }
    if($PseudoUtil == "") {
        $erreur .= "Le champ Pseudo est vide.<br>";
    }
    if($MdpUtil == "") {
        $erreur .= "Le champ Mot de passe est vide.<br>";
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

            $sql = "INSERT INTO utilisateur(prenom_utilisateur, nom_utilisateur, email_utilisateur, login_utilisateur, mdp_utilisateur) VALUES('$PrenomUtil', '$NomUtil', '$MailUtil', '$PseudoUtil', '$MdpUtil')";
            $result = mysqli_query($db_handle, $sql);

            $id_util = "SELECT id_utilisateur from utilisateur WHERE login_utilisateur='$PseudoUtil'";
            $result1 = mysqli_query($db_handle, $id_util);

            $sql_id = "INSERT INTO acheteur(id_acheteur) VALUES ($result1)";

            $sql1 = "SELECT * FROM utilisateur where login_utilisateur='$PseudoUtil'";
            
            $result3 = mysqli_query($db_handle, $sql1);

            while($data = mysqli_fetch_assoc($result3)){

                echo "Nom : ".$data['nom_utilisateur'].'<br>';
                echo "Prenom : ".$data['prenom_utilisateur'].'<br>';
                echo "Mail : ".$data['email_utilisateur'].'<br>';
                echo "Pseudo : ".$data['login_utilisateur'].'<br><br>';
                
            }
        } else{ echo "Database not found";}

        mysqli_close($db_handle);

    }
    else {
        echo "Erreur : $erreur";

    }

    echo "<BR><form><button class='button' formaction='utilTest.php' type='submit' >Return to the menu</button></form>";

?>