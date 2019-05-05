<?php
session_start();?>

<!DOCTYPE html>
<html>
<head>
  <title>Création de votre compte vendeur AmazonECE</title>
  <meta charset="utf-8">
        <!--to use reponsive-->
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <!--css-->
        <link rel='stylesheet' href="css/VendeurListe.css">
        <!--js-->
    
    <style>
 /*TOP NAVBAR*/

.top-bar{
    background-color: #DCDCDC;
    min-height:60px;
    padding-top:5px;
    padding-bottom: 0px;
}

.top-bar .contacter {
    display: block;
    color: #333;
    float: right;
    text-align: right;
    font-weight: bold;
}

.navbar-brand {
float:left;
}

/*TOP NAVBAR END*/

/*NAVBAR PRINCIPALE*/
.navbar-inverse {
    background-color: #009688;
    min-height: 90px;
    
}

.navbar-header li{
    list-style-type:none;
    display:inline-block;
}

.navbar-inverse .navbar-nav > li > a {
    color: #fff;
        
}
.nav > li > a {
    position: relative;
    display: block;
    padding: 15px 11px;
    color: #fff;
    list-style-type:none;
}

#ventesflash{
    color:white;
}

#categorie li a{
    color:black;
}

#cart-heart {
font-size:20px; 
}

/*NAVBAR PRINCIPALE END*/


/*endpage*/
#endpage .container-fluid 
{  
    display: inline-flex; 
    width:100%;
    background: #009688; 
    
}
#infos
{   
    background: #009688; 
    width: 50%;
}

#infos ul li 
{
    color:white;
    font-size: 15px;
}
#contact
{ 
  background: #009688; 
  width: 50%;
}

#personalinfo
{
    float:left;
}
#textarea
{
    float:right;
}

#contact .heading h4, #infos .heading h4
{
    color: white;
    font-size:20px;
    text-decoration: underline;
}

#contact .form-line
{
  border-right: 1px solid  #ddd;
}
#contact .form-group
{
  margin-top: 10px;
}
#contact label
{
  font-size: 15px;
  line-height: 20px;
  color: white;
}
#contact .form-control
{
  font-size: 15px;
}
textarea.form-control 
{
    height: 155px; 
}
#message
{
    width:250x;
}

#contact .submit
{
  font-weight: bold;
  text-transform: uppercase;
  float: right;
  width: auto;
  background-color: #009688;
  color:  white;
  border: 1px solid white;
  border-radius: 3px;

}
#contact .submit:hover
{
    background: white;
    color: #31859c;
    text-decoration: none;
}

#contact #textarea_feedback
{
    color:white;
    float:left;   
}


/*endpage END*/

/* FOOTER */
footer
{
    background: #DCDCDC;
    height: 70px;
}
footer .fas
{
    font-size:  25px;
    margin: 5px;
    color: #009688;
    height: 30px;
}
footer .fas:hover
{
    font-size:  27px;
}
footer h4
{
    color: #333;
    font-weight: bold;
    font-size: 20px
}

/* FOOTER END */
/*liste*/

.Livres,.Musique,.Vetements,.Sports_Loisirs
{
    width: 100%;
    height: auto;
    overflow:auto;
  
}
.table 
{   display: block;
    width: 100%;
    height: auto;
    font-size: 15px;
    border: 2px solid #333;
    overflow:auto;
}

.table td
{ width: 20%;
  height: auto;
  
}


    </style>
</head>
<body>
    
 <!--TOP NAVBAR-->
    <section id="navbar">
    <nav class="top-bar">
      <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6  d-none d-sm-block ">
             <a class="navbar-brand" href="#"><img src="photos/1280px-Amazon_logo_plain.svg.png"></a>
        </div>
        <div class="col-sm-6  d-none d-sm-block ">
            <a class="contacter" href="#contact">Nous contacter</a>                       
        </div>
            
        <div class="col-xs-6  d-block d-sm-none ">
             <a class="navbar-brand" href="#"><img src="photos/XS-Amazon_logo_plain.svg%20(1).png"></a>
        </div>
        <div class="col-xs-6  d-block d-sm-none">
            <a class="contacter" href="#">Nous contacter</a>                       
        </div>
        </div>
      </div>
    </nav>   
    <!--TOP NAVBAR END-->
    
    
<!--NAVBAR PRINCIPALE-->
  
<nav class="navbar navbar-expand-md navbar-inverse">
  <div class="container-fluid">
  
    <div class="navbar-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
    <i class="fas fa-bars fa-lg"></i>
    </button>
    </div>
      
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav mr-auto">
         <li class=""><a href="ConnexionVendeur.html">Vente</a></li>
        <li class=""><a href="ConnexionAdmin.html">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
</section>
  <!--NAVBAR PRINCIPALE END-->   
<?php
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

  $sql = "SELECT categorie, id_item, photo_list, video_name FROM Items WHERE numero_vendeur='$id' ";

  $result = mysqli_query($db_handle, $sql);

  while($row = mysqli_fetch_assoc($result)) {
    $cat = $row['categorie'];
    $id_item = $row['id_item'];
    $plist = $row['photo_list'];
    if (is_null($plist)) { $plist = "default.png";}
    $p_array = explode(',', $plist);
    $video = $row['video_name'];
    $video_split = explode('.', $video);
    $video_type = end($video_split);

    //echo print_r($row). "<br>"; pour debugger le row entier
    if($cat==1){
      $sql1 = "SELECT * FROM Items, Livres WHERE id_livre='$id_item' AND numero_vendeur='$id' AND id_item='$id_item'";
      $result1 = mysqli_query($db_handle, $sql1);
      while($data1 = mysqli_fetch_assoc($result1)){
        echo "<td><div class='Livres'><table class='table text-left'> <tr><td>Nom de l'article:" .$data1['nom_item']. '</td>';
        echo "<td>Description:" .$data1['description_item']. '</td>';
        echo "<td>Quantite:" .$data1['quantite']. '</td>';
        echo "<td>Prix:" .$data1['prix_item']. '</td>';
        echo "<td>Auteur du livre:" .$data1['auteur']. '</td>';
        echo "<td>Annee de Parution:" .$data1['annee']. '</td>';
        echo "<td>Edition du livre:" .$data1['edition']. '</td>';
        echo "</div>";
      } // end line
    }

    if($cat==2){
      $sql2 = "SELECT * FROM Items, Musique WHERE id_musique='$id_item' AND numero_vendeur='$id' AND id_item='$id_item' ";
      $result2 = mysqli_query($db_handle, $sql2);
      while($data2 = mysqli_fetch_assoc($result2)){
        echo "<td><div class='Musique'><table class='table text-left'> <tr><td>Nom de l'article:" .$data2['nom_item']. '</td>';
        echo "<td>Description:" .$data2['description_item']. '</td>';
        echo "<td>Quantite:" .$data2['quantite']. '</td>';
        echo "<td>Prix:" .$data2['prix_item']. '</td>';
        echo "<td>Auteur de la musique:" .$data2['auteur']. '</td>';
        echo "<td>Annee de Parution:" .$data2['annee']. '</td>';
        echo "<td>Genre:" .$data2['type'].'</td>';
        echo "</div>";
      } // end line
    }

    if($cat==3){
      $sql3 = "SELECT * FROM Items, Vetements WHERE id_vetement='$id_item' AND numero_vendeur='$id' AND id_item='$id_item' ";
      $result3 = mysqli_query($db_handle, $sql3);
      while($data3 = mysqli_fetch_assoc($result3)){
        echo "<td><div class='Vetements'><table class='table text-left'> <tr><td>Nom de l'article:" .$data3['nom_item']. '</td>';
        echo "<td>Description:" .$data3['description_item']. '</td>';
        echo "<td>Quantite:" .$data3['quantite']. '</td>';
        echo "<td>Prix:" .$data3['prix_item']. '</td>';
        echo "<td>Taille:" .$data3['taille']. '</td>';
        echo "<td>Couleur:" .$data3['couleur']. '</td>';
        echo "<td>Sexe:" .$data3['sexe']. '<br>'.'</td>';
        echo "</div>";
      } // end line
    }

    if($cat==4){
      $sql4 = "SELECT * FROM Items, Sports_Loisirs WHERE id_sportsLoisirs='$id_item' AND numero_vendeur='$id' AND id_item='$id_item'";
      $result4 = mysqli_query($db_handle, $sql4);
      while($data4 = mysqli_fetch_assoc($result4)){
        echo "<td><div class='Sports_Loisirs'><table class='table text-left'> <tr><td>Nom de l'article:" .$data4['nom_item']. '</td>';
        echo "<td>Description:" .$data4['description_item']. '</td>';
        echo "<td>Quantite:" .$data4['quantite']. '</td>';
        echo "<td>Prix:" .$data4['prix_item']. '</td>';

        if($data4['typeSport']==""){
          echo "<td>Type de Loisirs:" .$data4['typeLoisirs']. '</td>';
        } else {
          echo "<td>Type de Sport:" .$data4['typeSport']. '<br>'.'</td>';
        }
        echo "</div>";
      }
    }

    foreach ($p_array as $value) {
      echo "<td><img src=\"images_items/$value\" style=\"width: 160px; height: 160px;\"></td>";
    }

    unset($value);
    if (!is_null($video)) {
      echo '<td><video width = "160" height="160" controls>';
      echo '  <source src="videos_items/' . $video .'" type="video/' . $video_type .'">';
      echo '</video></td>';
    }
    echo '<td><form action="SupprimerItem.php?arg='.$id_item.'& cat='.$cat.'" method="post" enctype="multipart/form-data">' ;
    echo ' <input type="submit" value="Supprimer" />';
    echo '</form></td>';
            echo "</tr></table></div>";

  }
  echo "<BR><form><button class='button' formaction='VendeurMenu.php' type='submit' >Retour au menu</button></form>";

} else{
  echo "Database not found";
}
// fermer la connection
mysqli_close($db_handle);
?>
<!--endpage-->
    <section id="endpage">
        
        <div class="container-fluid">
        
        <div class="col-xs-12" id="infos">
            <div class="heading">
                <h4>Informations:</h4>
                <ul>
                <li>Qui sommes nous?</li>
                <li>Tarifs et délais de livraison</li>
                <li>Retour produits</li>
                <li>Suivie de commande</li>
                </ul>
            </div>    
        </div>
        
        <div class="col-xs-12" id="contact">
                <div class="heading">
                    <h4>Nous contacter</h4>
                </div>
        <form role="form">
                 
          <div id="personalinfo" class="col-sm-6 ">
              <div class="form-group">
                <label for="name" class="control-label">Nom:</label>
                <input type="text" class="form-control" id="nom" placeholder=" Entrez votre nom"  required>
              </div>
                        <div class="form-group">
                <label for="name" class="control-label">Prenom:</label>
                <input type="text" class="form-control" id="prenom" placeholder=" Entrez votre prenom"  required>
              </div>
              <div class="form-group">
                <label for="email" class="control-label">Adresse Email:</label>
                <input type="email" class="form-control" id="email" placeholder=" Entrez votre Email " required>
              </div>  
              
                        
            </div>
            <div id="textarea" class="col-sm-6 ">
              <div class="form-group">
                <label for ="message" class="control-label"> Message:</label>
                <textarea  class="form-control" id="message" placeholder="Entrez votre message" maxlength="200" required></textarea>
                            <div id="textarea_feedback"></div>
              </div>  
                    <button type="submit" class="btn btn-default submit" onclick="sendmessage();"><i class="fa fa-paper-plane" ></i>  Envoyer</button>
            </div>
                 
        </form>
        </div>
        </div>
           
    </section>
    <!--endpage END-->
        
    <!-- FOOTER-->
       <footer class="text-center">
            <a href="#navbar">
                <span class="fas fa-chevron-up"></span>
            </a> 
           <h4>© ECE AMAZON</h4>
        </footer>
    <!-- FOOTER END -->
</body>
</html>