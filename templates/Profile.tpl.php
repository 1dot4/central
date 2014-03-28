<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php echo $title ?>
        </title>
        <?php require_once 'include/CssLevel2.php' ?>
        <style>
            .col-md-10 {
                margin-top: 100px;
            }
            hr {
                border-top: 1px solid #dddddd;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
            require_once 'include/PrintUtils.php';
            printNavBar('profile', $currentUserName, 2)
            ?>
            <div class="row">
                <div class="col-md-10 well">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-7">
                            <h1><?php echo $username ?></h1>
                            <hr>
                            <?php if($fullName != ""): ?>
                            <h4><b><?php echo $fullName ?></b></h4>
                            <?php endif ?>

                            <?php if($userType == 'volunteer'): ?>
                                <?php if($organization != ""): ?>
                                    <h4>Works at <b><?php echo $organization ?></b></h4>
                                <?php endif?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
    </body>
</html>