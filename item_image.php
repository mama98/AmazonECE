<?php
session_start();

$arg = $_GET['arg'];
$pic = false;
$vid = false;

if ($arg == 'pic') {
  $target_dir = "images_items/";
  $pic = true;
} else if ($arg == 'vid') {
  $target_dir = "videos_items/";
  $vid = true;
} else {
  http_response_code(404);
  include('404.html');
  die();
}

function alert($alert_msg) {
  echo "<script type=\"text/javascript\">";
  echo "alert('". $alert_msg ."');";
  echo "location = \"vendeur_item_photo.php\";";
  echo "</script>";
}

$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$fileToUpload = isset($_FILES['fileToUpload']['name'])?$_FILES['fileToUpload']['name']:'';
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST['buttonPic'])) {
  $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
} //maybe add verification for videos

if ($_FILES['fileToUpload']['size'] > 5000000) { alert("Votre fichier est trop volumineux.");}

if ($pic) {
  if (($imageFileType == "jpg") || ($imageFileType == "png") || ($imageFileType == "jpeg")
 || ($imageFileType == "gif")) {
   $uploadOk = 1;
 } else {
   alert("Désolé. Seuls les fichiers au format JPG, JPEG, PNG, GIF sont autorisés.");
   $uploadOk = 0;
 }
} else if ($vid) {
 if (($imageFileType == "mp4") || ($imageFileType == "mkv") || ($imageFileType == "flv")
 || ($imageFileType == "webm") || ($imageFileType == "gifv")) {
   $uploadOk = 1;
 } else {
   alert("Désolé. Seuls les fichiers au format MP4, MKV, FLV, WEBM, GIFV sont autorisés.");
   $uploadOk = 0;
 }
}

if ($uploadOk == 0) {
  alert("Désolé. Seuls les fichiers au format JPG, JPEG, PNG, GIF sont autorisés.");
} else {
  $split = explode(".", $fileToUpload);
  if ($pic) {
    $filename = $_SESSION['id_item'].'_'.$_SESSION['nb_pic'].'.'.end($split);
    $_SESSION['nb_pic'] += 1;
  } else {
    $filename = $_SESSION['id_item'].'.'.end($split);
  }
  $_SESSION['more_pics'] = true;

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
      $id = $_SESSION['id_item'];
      if ($pic) {
        $sql_get_plist = "SELECT photo_list FROM Items WHERE id_item = '$id'";
        $result_plist = mysqli_query($db_handle, $sql_get_plist);
        $row = $result_plist->fetch_assoc();
        if (is_null($row['photo_list'])) {
          $plist = $filename;
        } else {
          $plist = $row['photo_list'] . ',' . $filename;
        }
        $sql = "UPDATE Items SET photo_list = '$plist' WHERE id_item = '$id'"; 
      } else {
        $sql = "UPDATE Items SET video_name = '$filename' WHERE id_item = '$id'";
      }
      $result = mysqli_query($db_handle, $sql);

      alert("Fichier téléchargé avec succès.");
      exit();
    } else {
      alert("Désolé, une erreur s'est produite lors de l'envoi de votre fichier.");
      exit();
    }
  }
}
?>
