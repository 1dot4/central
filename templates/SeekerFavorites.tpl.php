<!DOCTYPE html>
<html>
    <head>
        <title>
            My Favourites
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
                <div class="col-md-2">
                    <a href="index">Relevant Jobs</a>
                    <hr>
                    <a href="notifications"><?php printNotificationsLink($userId) ?></a>
                    <hr>
                    <a href="advanced-search">Search all jobs</a>
                    <hr>
                    <a href="favorites">My Favourites</a>
                </div>
                <div class="col-md-10">
                </div>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
    </body>
</html>
