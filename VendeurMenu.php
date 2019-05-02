<?php
 session_start();
 $_SESSION['more_pics'] = false;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu de Vente</title>
	<meta charset="utf-8">
</head>
<body>
	<h3>Bonjour "Pseudo à afficher ici Marine"</h3>

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
