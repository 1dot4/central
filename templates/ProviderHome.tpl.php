<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
        </title>
        <?php require_once 'include/Css.php' ?>
    </head>
    <body>
        <?php
            require_once 'include/PrintUtils.php';
            printNavBar('home', $username)
        ?>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>