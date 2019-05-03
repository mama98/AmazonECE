<?php

$arg=$_GET['arg'];
$cat=$_GET['cat'];
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

//identifier le nom de la base de donnee

$database ="amazonece3";

//connecter l'utilisateur dans BDD

$db_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found= mysqli_select_db($db_handle, $database);

//si la BDD existe, faire le traitement 
if($db_found){

		if($cat==1)
		{
			$sql = "DELETE FROM Livres WHERE id_livre='$arg'";

			$result = mysqli_query($db_handle, $sql);

			$sql2= "DELETE FROM Items WHERE id_item='$arg'";

			$result2 = mysqli_query($db_handle, $sql2);

		}
		if($cat==2)
		{
			$sql = "DELETE FROM Musique WHERE id_musique='$arg'";

			$result = mysqli_query($db_handle, $sql);

			$sql2= "DELETE FROM Items WHERE id_item='$arg'";

			$result2 = mysqli_query($db_handle, $sql2);
		}
		if($cat==3)
		{
			$sql = "DELETE FROM Vetements WHERE id_vetement='$arg'";

			$result = mysqli_query($db_handle, $sql);

			$sql2= "DELETE FROM Items WHERE id_item='$arg'";

			$result2 = mysqli_query($db_handle, $sql2);
		}
		if($cat==4)
		{
			$sql = "DELETE FROM Sports_Loisirs WHERE id_sportsLoisirs='$arg'";

			$result = mysqli_query($db_handle, $sql);

			$sql2= "DELETE FROM Items WHERE id_item='$arg'";

			$result2 = mysqli_query($db_handle, $sql2);
		}

		mysqli_close($db_handle);
		header("Location:VendeurListe.php");
		exit();
} //end if
// si la bDD existe pas

else{
	echo "Database not found";
}
// fermer la connection
?>
