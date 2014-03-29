<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
        </title>
        <?php require_once 'include/CssLevel2.php' ?>
    </head>
    <body>
        <?php
            require_once 'include/PrintUtils.php';
            printNavBar('home', $username, 2)
        ?>
        <?php require_once 'include/ScriptsLevel2.php' ?>
    </body>
</html>