<html>
<head>
<link rel="stylesheet" type="text/css" href="css/compte.css" >
</head>
<body>
<?php
session_start();

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

            $sql = "SELECT * FROM utilisateur WHERE id_utilisateur= '".$_SESSION['id']."' ";
            $result = mysqli_query($db_handle, $sql);

            while($data = mysqli_fetch_assoc($result)){

                echo "<center><div class='box'>Mon Compte <br><br>"; 
                echo "Nom : ".$data['nom_utilisateur'].'<br>';
                echo "Prenom : ".$data['prenom_utilisateur'].'<br>';
                echo "Mail : ".$data['email_utilisateur'].'<br>';
                echo "Pseudo : ".$data['login_utilisateur'].'<br><br>';         
                echo '<form action="acceuilAcheteur.php" method="post" enctype="multipart/form-data">' ;
                echo ' <button class="buttonSub3" type="submit" >Retour menu</button>';
                echo '</form></div></center>';     

            }
            

        } else{ echo "Database not found";}

        mysqli_close($db_handle);

?>
</body>
</html>