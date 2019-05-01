<?php
session_start();
?>
<html>
<head>
<title>Connection</title>
</head>
<body>

    <form action="utilTest.php" method="post">
    <table>
        <tr>
            <td>Pseudo :</td>
            <td><input type="text" name="Pseudo"></td>
        </tr> 
        <tr>
            <td>Mot de passe :</td>
            <td><input type="text" name="Mdp"></td>
        </tr> 
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Connection"></td>
        </tr> 
    </table>
    </form>
    <form action='newUtil.php' method='POST'><input class='button' type='submit' value='Créer un compte'></form>

</body>
</html>