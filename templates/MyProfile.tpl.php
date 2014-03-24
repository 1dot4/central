<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $username ?></title>
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
    </body>
</html>