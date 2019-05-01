<?php
session_start();
//"images" = subdirectory for images in www directory
$arg = $_GET['arg'];

if ($arg == 'profil') {
  $target_dir = "images_profil/";
} else if ($arg == 'fond') {
  $target_dir = "images_fond/";
} else {
  http_response_code(404);
  include('404.html');
  die();
}

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//file extension in lower case
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Vérifier si le fichier image est une image réelle ou une image fausse

$fileToUpload = isset($_FILES['fileToUpload']['name'])?$_FILES['fileToUpload']['name']:"";
if(isset($_POST["button1"])) {
 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
 if($check !== false) {
 //echo "Le fichier est une image - " . $check["mime"] . ".";
 $uploadOk = 1;
 } else {
 echo "Le fichier n'est pas une image.";
 $uploadOk = 0;
 }
}
// Vérifier la taille du fichier
if ($_FILES["fileToUpload"]["size"] > 500000) {
 echo "<br>" . "Désolé, votre fichier est trop volumineux.";
 $uploadOk = 0;
}
// Autoriser certains formats de fichier
if (($imageFileType == "jpg") || ($imageFileType == "png") || ($imageFileType == "jpeg")
 || ($imageFileType == "gif")) {
 echo "<br>" . "Fichier autorisé. Format = JPG | JPEG| PNG | GIF.";
 $uploadOk = 1;
} else {
 echo "<br>" . "Désolé. Seuls les fichiers au format JPG, JPEG, PNG, GIF sont autorisés.";
 $uploadOk = 0;
}
// Vérifiez si $uploadOk est défini comme 0 par une erreur
if ($uploadOk == 0) {
 echo "<br>" . "Désolé, votre fichier n'a pas été téléchargé.";
// si tout est correct, télécharger le fichier
} else {
 $split = explode(".", $fileToUpload);
 $filename = $_SESSION['id_global'].'.'.end($split);

 $target_file = $target_dir . $filename;
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 //echo "<br>" . "Le fichier ". basename( $_FILES["fileToUpload"]["name"]). " a été
//téléchargé.";
header("Location:my_profile.php");
  exit();
 } else {
// echo "<br>" . "Désolé, une erreur s'est produite lors de l'envoi de votre
//fichier.";
  header("Location:my_profile.php");
  exit();
 }
}
?>
