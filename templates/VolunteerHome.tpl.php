<!DOCTYPE html>
<html>
<head>
    <title>
        Home
    </title>
    <?php require_once 'include/CssLevel2.php' ?>
    <style>
        .container {
            margin-top: 90px;
        }
        hr {
            border-top: 1px solid #dddddd;
        }
        .form-inline input[type="email"],
        .form-inline input[type="password"],
        .form-inline input[type="text"]
        {
            font-size: 16px;
            width: 460px;
            height: auto;
        }
        .form-error {
            background-color: rgba(255, 0, 0, 0.3);
            padding: 10px 15px;
            border-radius: 2px;
            border: 1px solid rgba(255, 0, 0, 0.35);
        }
        .col-md-5 {
            margin-left: 70px;
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
            <a href="register">Register New Job Seeker</a>
            <hr>
            <a href="index">Registered by me</a>
        </div>
        <div class="col-md-5">
            <h2>Job seekers you registered</h2>
            <hr>
            <?php
                foreach($registeredSeekers as $seeker) {
                    require_once 'include/PrintUtils.php';
                    echo seekerRegistrationDetails($seeker);
                }
            ?>
        </div>
    </div>
</div>
<?php require_once 'include/ScriptsLevel2.php' ?>
</body>
</html>