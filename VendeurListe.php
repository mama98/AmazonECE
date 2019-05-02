<?php
 session_start();

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

	$sql = "SELECT categorie FROM Items WHERE numero_vendeur='$id' ";

	$result = mysqli_query($db_handle, $sql);

	while($row = mysqli_fetch_assoc($result))
	{
		$cat=$row['categorie'];
		if($cat==1)
		{
				$sql = "SELECT * FROM Items, Livres WHERE id_livre=id_item ";
			    $result = mysqli_query($db_handle, $sql);
				while($data = mysqli_fetch_assoc($result))
				{
					echo "Nom de l'article:" .$data['nom_item']. '<br>';
					echo "Description:" .$data['description_item']. '<br>';
					echo "Quantite:" .$data['quantite']. '<br>';
					echo "Prix:" .$data['prix_item']. '<br>';
					echo "Auteur du livre:" .$data['auteur']. '<br>';
					echo "Annee de Parution:" .$data['annee']. '<br>';
					echo "Edition du livre:" .$data['edition']. '<br>'.'<br>';
				} // end line

		}

		if($cat==2)
		{
				$sql = "SELECT * FROM Items, Musique WHERE id_musique=id_item ";
			    $result = mysqli_query($db_handle, $sql);
				while($data = mysqli_fetch_assoc($result))
				{
					echo "Nom de l'article:" .$data['nom_item']. '<br>';
					echo "Description:" .$data['description_item']. '<br>';
					echo "Quantite:" .$data['quantite']. '<br>';
					echo "Prix:" .$data['prix_item']. '<br>';
					echo "Auteur de la musique:" .$data['auteur']. '<br>';
					echo "Annee de Parution:" .$data['annee']. '<br>';
					echo "Genre:" .$data['type']. '<br>'.'<br>';
				} // end line

		}

		if($cat==3)
		{
				$sql = "SELECT * FROM Items, Vetements WHERE id_vetement=id_item ";
			    $result = mysqli_query($db_handle, $sql);
				while($data = mysqli_fetch_assoc($result))
				{
					echo "Nom de l'article:" .$data['nom_item']. '<br>';
					echo "Description:" .$data['description_item']. '<br>';
					echo "Quantite:" .$data['quantite']. '<br>';
					echo "Prix:" .$data['prix_item']. '<br>';
					echo "Taille:" .$data['taille']. '<br>';
					echo "Couleur:" .$data['couleur']. '<br>';
					echo "Sexe:" .$data['sexe']. '<br>'.'<br>';
				} // end line

		}

		if($cat==4)
		{
				$sql = "SELECT * FROM Items, Sports_Loisirs WHERE id_sportsLoisirs=id_item ";
			    $result = mysqli_query($db_handle, $sql);
				while($data = mysqli_fetch_assoc($result))
				{

					echo "Nom de l'article:" .$data['nom_item']. '<br>';
					echo "Description:" .$data['description_item']. '<br>';
					echo "Quantite:" .$data['quantite']. '<br>';
					echo "Prix:" .$data['prix_item']. '<br>';			

				 if($data['typeSport']==""){
					echo "Type de Loisirs:" .$data['typeLoisirs']. '<br>';			
					}

				else{
					echo "Type de Sport:" .$data['typeSport']. '<br>'.'<br>';			
					}

				} // end line

		}
	}

} //end if
// si la bDD existe pas

else{
	echo "Database not found";
}
// fermer la connection
mysqli_close($db_handle);
?>
