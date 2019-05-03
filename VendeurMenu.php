<?php
 session_start();
 $_SESSION['more_pics'] = false;

 $id= $_SESSION["id_global"];

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

	$sql = "SELECT nom_utilisateur FROM Utilisateur, Vendeur WHERE id_vendeur='$id' AND id_utilisateur=id_vendeur ";

	$result = mysqli_query($db_handle, $sql);
	while($row = mysqli_fetch_assoc($result))
	{
		$nom=$row['nom_utilisateur'];
	}
} //end if
// si la bDD existe pas

else{
	echo "Database not found";
}
// fermer la connection
mysqli_close($db_handle);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu de Vente</title>
	<meta charset="utf-8">
</head>
<body>
	<h3>Bonjour <?php echo $nom; ?></h3>

	<form action="VendeurItemChoix.php" method="post">
		<div>Mettre en vente un article:</div>
		<div><input type="submit" value="Choisir article"/></div>
	</form>

	<form action="VendeurListe.php" method="post">
		<div>Voir votre liste d'articles mis en vente: </div>
		<div><input type="submit" value="Votre liste"/></div>
	</form>

	<div id="errordiv"></div>
</body>
</html>
