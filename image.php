<?php
session_start();

$arg = $_GET['arg'];
$profil = false;
$fond = false;

if ($arg == 'profil') {
  $target_dir = "images_profil/";
  $pic_name = "profil";
  $profil = true;
} else if ($arg == 'fond') {
  $target_dir = "images_fond/";
  $pic_name = "fond";
  $fond = true;
} else {
  http_response_code(404);
  include('404.html');
  die();
}

function alert($alert_msg) {
  echo "<script type=\"text/javascript\">";
  echo "alert('". $alert_msg ."');";
  echo "location = \"VendeurMenu.php\";";
  echo "</script>";
}

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

//file extension en minuscule
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérifier si le fichier image est une image réelle ou une image fausse
$fileToUpload = isset($_FILES['fileToUpload']['name'])?$_FILES['fileToUpload']['name']:'';
if(isset($_POST['buttonPic'])) {
  $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}
// Vérifier la taille du fichier
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  alert('Désolé, votre fichier est trop volumineux.');
  $uploadOk = 0;
}
// Autoriser certains formats de fichier
if (($imageFileType == "jpg") || ($imageFileType == "png") || ($imageFileType == "jpeg")
|| ($imageFileType == "gif")) {
  $uploadOk = 1;
} else {
  alert('Désolé, seuls les fichiers au format JPG, JPEG, PNG, GIF sont autorisés.');
  $uploadOk = 0;
}
// Vérifiez si $uploadOk est défini comme 0 par une erreur
if ($uploadOk == 1) {
  $split = explode(".", $fileToUpload);
  $filename = $_SESSION['id_global'].'.'.end($split);

  $target_file = $target_dir . $filename;
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");

    $database = "amazonece3";
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found= mysqli_select_db($db_handle, $database);
    //si la BDD existe, faire le traitement
    if($db_found){
      $id = $_SESSION['id_global'];
      if ($profil) {
        $sql = "UPDATE Vendeur SET photo_vendeur = '$filename' WHERE id_vendeur = '$id'";
      } else {
        $sql = "UPDATE Vendeur SET fond_vendeur = '$filename' WHERE id_vendeur = '$id'";
      }
      $result = mysqli_query($db_handle, $sql);

      alert('Photo de '. $pic_name .' changée avec succès.');
      exit();
    } else {
      alert('Une erreur s\'est produite lors de l\'envoi de votre fichier.');
      exit();
  }
}
}
?>
