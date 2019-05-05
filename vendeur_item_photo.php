<?php
//SET $_SESSION['more_pics'] = false avant d'appeler cette page depuis
//vendeur_item.php !!! TODO
  session_start();
  if ($_SESSION['more_pics'] == false) {
    $_SESSION['nb_pic'] = 0;
  }
?>
<!DOCTYPE html>
<head>
  <title>Ajouter des photos</title>
   <meta charset="utf-8"/>
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
        <link rel='stylesheet' href="css/ConnexionVendeur.css">
        <!--js-->
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
         <li class=""><a href="ConnexionVendeur.html">Vente</a></li>
        <li class=""><a href="ConnexionAdmin.html">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
</section>
  <!--NAVBAR PRINCIPALE END-->   
  <div id="logreg-forms" >
  <form class="form-signin" action="item_image.php?arg=pic" method="post" enctype="multipart/form-data">
     <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"><i class="fas fa-camera"></i>  Ajouter une photo</h1>
    <table>
      <tr>
       <td><input type="file" name="fileToUpload" value=""></td><br>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="buttonPic" value="Télécharger">
        </td>
      </tr>
    </table>
  </form>
     <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"><i class="fas fa-video"></i>  Ajouter une vidéo</h1>
  <form action="item_image.php?arg=vid" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td><input type="file" name="fileToUpload" value=""></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" name="buttonPic" value="Télécharger">
        </td>
      </tr>
    </table>
  </form>
    <br><form><button class="btn btn-success btn-block" formaction='VendeurMenu.php' type='submit' ><i class="fas fa-check-circle"></i>Confirmer la vente</button></form>

</div>

</body>
