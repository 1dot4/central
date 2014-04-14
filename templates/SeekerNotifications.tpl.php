<!DOCTYPE html>
<html>
    <head>
        <title>
            Notifications
        </title>
        <?php require_once 'include/CssLevel2.php' ?>
        <style>
            .container {
                margin-top: 90px;
            }
            hr {
                border-top: 1px solid #cccccc;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
                require_once 'include/PrintUtils.php';
                printNavBar('home', $username, 2);
            ?>
            <div class="row">
                <?php printSeekerNavigationBar($userId) ?>
                <div class="col-md-10">
                    <h4>Notifications</h4>
                    <div class="col-md-8">
                        <?php printNotifications($notifications) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
    </body>
</html>
