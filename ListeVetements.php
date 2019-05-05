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

.Livres
{
    width: 100%;
    height: auto;
    overflow:auto;
  
}
.Livres form
{
   
  
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
        <li class=""><a id="ventesflash" href="#">Ventes flash</a></li>
           <li class="dropdown nav-item ">
          <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Catégories</a>
          <ul id="categorie"  class="dropdown-menu">
            <li><a href="ListeLivre.php">Livres</a></li>
            <li><a href="ListeMusique.php">Musique</a></li>
            <li><a href="ListeVetements.php">Vêtements</a></li>
            <li><a href="ListeSportLoisirs.php">Sports et Loisir</a></li>
          </ul>
        </li>
         <li class=""><a href="ConnexionVendeur.html">Vente</a></li>
        <li class=""><a href="#">Admin</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">     
       <li class="nav-item ">
            <a class="nav-link" href="monCompteAcheteur.php"><i class="fa fa-user"></i>Mon Compte</a>
       </li>
         <li class="nav-item ">
            
            <a class="nav-link" href="deconnexion.php"><i class="fas fa-sign-out-alt"></i>Deconnexion</a>
            
       </li>
       <li class="nav-item ">
            <a  class="nav-link" id="cart-heart" href="#"><i class="fa fa-cart-plus"></i></a>  <!--panier-->
       </li>
     </ul>
    </div>
  </div>
</nav>
</section>
  <!--NAVBAR PRINCIPALE END-->   

<?php

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

      $sql = "SELECT * FROM Items, Vetements WHERE categorie=3 AND id_item=id_vetement";
      $result = mysqli_query($db_handle, $sql);

      while($data = mysqli_fetch_assoc($result)){
        $plist = $data['photo_list'];
        if (is_null($plist)) { $plist = "default.png";}
        $p_array = explode(',', $plist);
        $video = $data['video_name'];
        $video_split = explode('.', $video);
        $video_type = end($video_split);
                $id_item=$data['id_item'];

        /*echo "<div class='Vetements'>Nom de l'article:" .$data['nom_item']. '<br>';
        echo "Description:" .$data['description_item']. '<br>';
        echo "Quantite:" .$data['quantite']. '<br>';
        echo "Prix:" .$data['prix_item']. '<br>';
        echo "Taille:" .$data['taille']. '<br>';
        echo "Couleur:" .$data['couleur']. '<br>';
        echo "Sexe:" .$data['sexe']. '<br>'.'<br>';
        echo "</div>";
       // end line

    foreach ($p_array as $value) {
      echo "<img src=\"images_items/$value\" style=\"width: 160px; height: 160px;\">";
    }*/
          echo "<div class='Vetements'>";
        echo "<table class='table text-left'> <tr><td>Nom de l'article:" .$data['nom_item'].'</td>';
        echo "<td>Description:" .$data['description_item']. '</td>';
        echo "<td>Quantite:" .$data['quantite']. '</td>';
        echo "<td>Prix:" .$data['prix_item']. '</td>';
        echo "<td>Taille:" .$data['taille']. '</td>';
        echo "<td>Couleur:" .$data['couleur']. '</td>';
        echo "<td>Sexe:" .$data['sexe'].'</td>';
        foreach ($p_array as $value) {
            echo "<td><img src=\"images_items/$value\" style=\"width: 160px; height: 160px;\"></td>";
        } 
/*
    unset($value);
    echo '<video width = "160" height="160" controls>';
    echo '  <source src="videos_items/' . $video .'" type="video/' . $video_type .'">';
    echo '</video>';

    echo '<br>Quantité : <br>' ;
    echo '< input type="number" name="quantite" /><br>';


    echo '<form action="ajoutPanier.php?arg='.$id_item.'" method="post" enctype="multipart/form-data">' ;
    echo ' <input type="submit" value="Ajouter au panier" />';
    echo '</form>';*/
          
    unset($value);
        echo '<td><video width = "160" height="160" controls>';
        echo '<source src="videos_items/' . $video .'" type="video/' . $video_type .'"><';
        echo '</video></td>';
        echo '<td><form action="ajoutPanier.php?arg='.$id_item.'" method="post" enctype="multipart/form-data">' ;
        echo '<td>Quantité:<input class="form-control" type="number" style="width: 45px; padding: 1px" value="0" min="0" name="quantite"/><br>';
        echo '<button class="btn btn-success btn-xs" type="submit" ><i class="fas fa-cart-plus"></i></button>';
        echo '</form></td>';
        echo "</tr></table></div>";
  }
  echo "<BR><form><button class='btn btn-primary' formaction='acceuilAcheteur.php' type='submit' >Retour au menu</button></form>";

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
