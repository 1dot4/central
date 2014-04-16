<!DOCTYPE html>
<html>
<head>
    <title>
        Registered Seekers
    </title>
    <?php require_once 'include/CssLevel2.php' ?>
    <style>
        .container {
            margin-top: 90px;
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
    printNavBar('home', $username, 2);
    ?>
    <div class="row">
        <?php printVolunteerNavigationBar($userId) ?>
        <div class="col-md-10">
            <h4>Registered Job Seekers</h4>
            <hr>
            <div class="row">
                <br>
                <div class="col-md-8">
                    <?php
                        foreach($registeredSeekers as $seeker) {
                            echo seekerRegistrationDetails($seeker);
                            echo "<hr>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'include/ScriptsLevel2.php' ?>
</body>
</html>