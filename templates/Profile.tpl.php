<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php echo $title ?>
        </title>
        <?php require_once 'include/Css.php' ?>
    </head>
    <body>
        <?php
            require_once 'include/PrintUtils.php';
            printNavBar('home', $currentUserName)
        ?>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>