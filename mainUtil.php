<html>
<head>
<title>Connection</title>
</head>
<body>
<?php
session_start();
?>
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

</body>
</html>