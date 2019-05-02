 <?php
 session_start();
 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
    $Pseudo = isset($_POST["Pseudo"])? $_POST["Pseudo"] : "";
    $Mdp = isset($_POST["Mdp"])? $_POST["Mdp"] : "";
    
    $erreur = "";

    
    if($Pseudo == "") {
        $erreur .= "Le champ Pseudo est vide.<br>";
    }
    if($Mdp == "") {
        $erreur .= "Le champ Mot de passe est vide.<br>";
    }

    if($erreur == "") {
        $_SESSION["login_utilisateur"]=$Pseudo;
        define('DB_SERVER', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');

        //Identifier le nom de la base
        $database = "amazonece2";

        //conecter l'utilisateur dans BDD
        $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        $db_found = mysqli_select_db($db_handle, $database);

        //si le BDD existe, faire le traitement
        if($db_found){

            $sql_user = "SELECT * FROM utilisateur";
            $found=0;
            $result = mysqli_query($db_handle, $sql_user);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        if ($Pseudo==$row["login_utilisateur"]){
                            $found=1;
                            $_SESSION['id'] = $row["id_utilisateur"];
                            $MdpSession = $row["mdp_utilisateur"];
                        }
                        
                    }
                }
                if ($found==0){
                        echo "Votre pseudo n'est pas enregistré. Veillez créer un compte pour vous connecter.";
                        echo "<form action='newUtil.php' method='POST'\>";
                        echo "<BR><BR><input class='button' type='submit' value='Créer un compte'\>";
                        echo "</form></div>";
                }	
                else {

                    if ($Mdp==$MdpSession){
                        include "mainAcheteur.php";
                    }
                    else {
                        echo "Mot de passe incorrect.";
                        echo "<form action='mainUtil.php' method='POST'\>";
                        echo "<BR><input class='button' type='submit' value='Retour'\>";
                        echo "</form></div>";
                    }
                    
                }
            

        } else{ echo "Database not found";}

        mysqli_close($db_handle);

    }
    else {
        echo "Erreur : $erreur";

    }

    echo "<BR><form><button class='button' formaction='mainUtil.php' type='submit' >Return to the menu</button></form>";


 
 ?>
        
        