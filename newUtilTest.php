<?php
session_start();

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
        $_SESSION["login_utilisateur"]=$PseudoUtil;
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

            $sql_login = "SELECT login_utilisateur, email_utilisateur FROM utilisateur";
            $found=0;
            
            $result2 = mysqli_query($db_handle, $sql_login);
                if (mysqli_num_rows($result2) > 0) {
                    while($row = mysqli_fetch_assoc($result2)) 
                    {
                        if ( ($PseudoUtil==$row["login_utilisateur"]) || ($MailUtil==$row['email_utilisateur'])){
                            $found++;
                        }
                    }
                }
                if ($found>0){
                        echo "Oups ! Le pseudo ou l'email existent déjà... Veillez recommencer.";
                        echo "<form action='newUtil.php' method='POST'\>";
                        echo "<BR><input class='button' type='submit' value='Retour'\>";
                        echo "</form></div>";
                }	

                else {

                        $sql = "INSERT INTO utilisateur(prenom_utilisateur, nom_utilisateur, email_utilisateur, login_utilisateur, mdp_utilisateur) VALUES('$PrenomUtil', '$NomUtil', '$MailUtil', '$PseudoUtil', '$MdpUtil')";
                        $result = mysqli_query($db_handle, $sql);

                        //$id=$db_handle->insert_id;
                        //$_SESSION["id_utilisateur"]=$id;
                        

                        //$id_util = "SELECT id_utilisateur from utilisateur WHERE email_utilisateur='$MailUtil'";
                        //$result1 = mysqli_query($db_handle, $id_util);

                        //$sql_id = "INSERT INTO acheteur(id_acheteur) VALUES ('$id_util')";

                        $sql1 = "SELECT * FROM utilisateur where email_utilisateur='$MailUtil'";
                        
                        $result3 = mysqli_query($db_handle, $sql1);

                        while($data = mysqli_fetch_assoc($result3)){

                            echo "Nom : ".$data['nom_utilisateur'].'<br>';
                            echo "Prenom : ".$data['prenom_utilisateur'].'<br>';
                            echo "Mail : ".$data['email_utilisateur'].'<br>';
                            echo "Pseudo : ".$data['login_utilisateur'].'<br><br>';

                            /*echo "<form action='nmainUtil.php' method='POST'\>";
                            echo "<BR><input class='button' type='submit' value='Retour'\>";
                            echo "</form></div>";*/
                            
                        }

                    } 

        } else{ echo "Database not found";}

        mysqli_close($db_handle);

    }
    else {
        echo "Erreur : $erreur";

    }

    echo "<BR><form><button class='button' formaction='newUtil.php' type='submit' >Retour</button></form>";

?>