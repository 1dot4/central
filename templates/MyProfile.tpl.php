<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $username ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'include/Css.php' ?>
    </head>
    <body>
        <?php
            switch($userType) {
                case 'volunteer':
                    echo file_get_contents('templates/VolunteerMyProfile.tpl.php');
                    break;
                case 'seeker':
                    echo file_get_contents('templates/SeekerMyProfile.tpl.php');
                    break;
                case 'provider':
                    echo file_get_contents('templates/ProviderMyProfile.tpl.php');
                    break;
            }
        ?>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>