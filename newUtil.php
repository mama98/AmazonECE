<?php
session_start();
?>
<html>
<head>
<title>Créez votre compte</title>
</head>
<body>

    <form action="newUtilTest.php" method="post">
    <table>
        <tr>
            <td>Nom :</td>
            <td><input type="text" name="NomUtil"></td>
        </tr> 
        <tr>
            <td>Prenom :</td>
            <td><input type="text" name="PrenomUtil"></td>
        </tr> 
        <tr>
            <td>Mail :</td>
            <td><input type="text" name="MailUtil"></td>
        </tr> 
        <tr>
            <td>Pseudo :</td>
            <td><input type="text" name="PseudoUtil"></td>
        </tr> 
        <tr>
            <td>Mot de passe :</td>
            <td><input type="text" name="MdpUtil"></td>
        </tr> 
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Créer un compte"></td>
        </tr> 
    </table>
    </form>

</body>
</html>
