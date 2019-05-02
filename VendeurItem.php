<?php
session_start();

$cat = $_GET['cat'];
$id = $_SESSION['id_global'];
$_SESSION['more_pics'] = false;

function alert_success($alert_msg) {
	echo "<script type=\"text/javascript\">";
	echo "alert('". $alert_msg ."');";
	echo "location = \"vendeur_item_photo.php\"";
	echo "</script>";
}

function alert_error($alert_msg) {
	echo "<script type=\"text/javascript\">";
	echo "alert('". $alert_msg ."');";
	echo "location = \"VendeurItemChoix.php\"";
	echo "</script>";
}

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

$database ="amazonece3";

$nom_article = isset($_POST["nom_article"])?$_POST["nom_article"] : ""; //if then else
$description_article = isset($_POST["description_article"])?$_POST["description_article"] : ""; //if then else
$quantite_article = isset($_POST["quantite_article"])?$_POST["quantite_article"] : ""; //if then else
$prix_article = isset($_POST["prix_article"])?$_POST["prix_article"] : ""; //if then else
$erreur = "";

if($nom_article == "") {$erreur .= "Le champ nom est vide. <br>";}
if($description_article == "") {$erreur .= " Le champ description est vide. <br>";}
if($quantite_article == "") {$erreur .= "Le champ quantite est vide. <br>";}
if($prix_article == "") {$erreur .= "Le champ prix est vide. <br>";}

if($cat==1)
{
	$nom_livres = isset($_POST["nom_livres"])?$_POST["nom_livres"] : ""; //if then else
	$annee_livres = isset($_POST["annee_livres"])?$_POST["annee_livres"] : "";
	$edition_livres = isset($_POST["edition_livres"])?$_POST["edition_livres"] : "";
	$erreur = "";

	if($nom_livres == "") {$erreur .= "Le champ nom du livre est vide. <br>";}
	if($annee_livres == "") {$erreur .= " Le champ annee de parution est vide. <br>";}
	if($edition_livres == "") {$erreur .= "Le champ edition du livre est vide. <br>";}

	if ($erreur == "") {
		//connecter l'utilisateur dans BDD

		$db_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
		//$db_handle2= mysqli_connect(DB_SERVER, DB_USER, DB_PASS, $database);
		$db_found= mysqli_select_db($db_handle, $database);
		//si la BDD existe, faire le traitement
		if($db_found){

			$sql = "INSERT INTO Items(nom_item, prix_item, categorie, numero_vendeur, quantite, description_item) VALUES ('$nom_article','$prix_article', '$cat', '$id', '$quantite_article', '$description_article')";
			$result = mysqli_query($db_handle, $sql);

			$id_item = $db_handle->insert_id;
			$_SESSION['id_item'] = $id_item;

			$sql2= "INSERT INTO Livres(id_livre, auteur, annee, edition) VALUES ('$id_item', '$nom_livres','$annee_livres', '$edition_livres')";
			$result = mysqli_query($db_handle, $sql2);

			if ($result) {
				alert_success("Offre créée avec succès !");
			} else {
				echo "L'ajout de l'objet à la base de données a échoué. Avez vous entré les données correctement ?";
			}
		}

		// si la bDD existe pas

		else{
			alert_error("Base de données non trouvée !");
		}
		// fermer la connection
		mysqli_close($db_handle);
	}

	else {
		alert_error("Erreur : $erreur");
	}
}

if($cat==2)
{
	$nom_musique = isset($_POST["nom_musique"])?$_POST["nom_musique"] : ""; //if then else
	$annee_musique = isset($_POST["annee_musique"])?$_POST["annee_musique"] : "";
	$type_musique = isset($_POST["type_musique"])?$_POST["type_musique"] : "";
	$erreur = "";

	if($nom_musique == "") {$erreur .= "Le champ Auteur de la musique est vide. <br>";}
	if($annee_musique == "") {$erreur .= " Le champ annee musique est vide. <br>";}
	if($type_musique == "") {$erreur .= "Le champ type de musique est vide. <br>";}

	if ($erreur == "") {
		//connecter l'utilisateur dans BDD

		$db_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
		//$db_handle2= mysqli_connect(DB_SERVER, DB_USER, DB_PASS, $database);
		$db_found= mysqli_select_db($db_handle, $database);
		//si la BDD existe, faire le traitement
		if($db_found){

			$sql = "INSERT INTO Items( nom_item, prix_item, categorie, numero_vendeur, quantite, description_item) VALUES ('$nom_article','$prix_article', '$cat','$id', '$quantite_article', '$description_article')";
			$result = mysqli_query($db_handle, $sql);

			$id_item = $db_handle->insert_id;

			$sql2= "INSERT INTO Musique(id_musique, auteur, annee, type) VALUES ('$id_item', '$nom_musique','$annee_musique', '$type_musique')";
			$result = mysqli_query($db_handle, $sql2);

			if ($result) {
				alert_success("Offre créée avec succès !");
			} else {
				echo "L'ajout de l'objet à la base de données a échoué. Avez vous entré les données correctement ?";
			}
		}

		// si la bDD existe pas

		else{
			alert_error("Base de données non trouvée !");
		}
		// fermer la connection
		mysqli_close($db_handle);
	}

	else {
		alert_error("Erreur : $erreur");
	}
}

if($cat==3)
{
	$taille = isset($_POST["taille"])?$_POST["taille"] : ""; //if then else
	$couleur = isset($_POST["couleur"])?$_POST["couleur"] : "";
	$sexe = isset($_POST["sexe"])?$_POST["sexe"] : "";
	$erreur = "";

	if($taille == "") {$erreur .= "Le champ taille est vide. <br>";}
	if($couleur == "") {$erreur .= " Le champ couleur est vide. <br>";}
	if($sexe == "") {$erreur .= "Le champ sexe est vide. <br>";}

	if ($erreur == "") {
		//connecter l'utilisateur dans BDD

		$db_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
		//$db_handle2= mysqli_connect(DB_SERVER, DB_USER, DB_PASS, $database);
		$db_found= mysqli_select_db($db_handle, $database);
		//si la BDD existe, faire le traitement
		if($db_found){

			$sql = "INSERT INTO Items( nom_item, prix_item, categorie, numero_vendeur, quantite, description_item) VALUES ('$nom_article','$prix_article', '$cat','$id', '$quantite_article', '$description_article')";
			$result = mysqli_query($db_handle, $sql);

			$id_item = $db_handle->insert_id;

			$sql2= "INSERT INTO Vetements(id_vetement, taille, couleur, sexe) VALUES ('$id_item', '$taille','$couleur', '$sexe')";
			$result = mysqli_query($db_handle, $sql2);

			if ($result) {
				alert_success("Offre créée avec succès !");
			} else {
				echo "L'ajout de l'objet à la base de données a échoué. Avez vous entré les données correctement ?";
			}

		}

		// si la bDD existe pas

		else{
			alert_error("Base de données non trouvée !");
		}
		// fermer la connection
		mysqli_close($db_handle);
	}

	else {
		alert_error("Erreur : $erreur");
	}
}

if($cat==4)
{
	$type_sport = isset($_POST["type_sport"])?$_POST["type_sport"] : ""; //if then else
	$type_loisir = isset($_POST["type_loisir"])?$_POST["type_loisir"] : ""; //if then else
	$erreur = "";

	if($type_sport == "" && $type_loisir == "") {$erreur .= "Le champ type de sport ou loisirs est vide. <br>";}

	if ($erreur == "") {
		//connecter l'utilisateur dans BDD

		$db_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
		//$db_handle2= mysqli_connect(DB_SERVER, DB_USER, DB_PASS, $database);
		$db_found= mysqli_select_db($db_handle, $database);
		//si la BDD existe, faire le traitement
		if($db_found){

			$sql = "INSERT INTO Items( nom_item, prix_item, categorie, numero_vendeur, quantite, description_item) VALUES ('$nom_article','$prix_article', '$cat','$id', '$quantite_article', '$description_article')";
			$result = mysqli_query($db_handle, $sql);

			$id_item = $db_handle->insert_id;

			$sql2= "INSERT INTO Sports_Loisirs(id_sportsLoisirs, typeSport, typeLoisirs) VALUES ('$id_item', '$type_sport','$type_loisir')";
			$result = mysqli_query($db_handle, $sql2);

			if ($result) {
				alert_success("Offre créée avec succès !");
			} else {
				echo "L'ajout de l'objet à la base de données a échoué. Avez vous entré les données correctement ?";
			}
		}

		// si la bDD existe pas

		else{
			alert_error("Base de données non trouvée !");
		}
		// fermer la connection
		mysqli_close($db_handle);
	}

	else {
		alert_error("Erreur : $erreur");
	}
}
?>
