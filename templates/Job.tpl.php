<!DOCTYPE html>
<html>
<head>
    <title>
        View Job
    </title>
    <?php require_once 'include/CssLevel2.php' ?>
    <style>
        .col-md-10 {
            margin-top: 100px;
        }
        hr {
            border-top: 1px solid #dddddd;
        }
        .dp-box {
        }
        .dp-container {
            width: 208px;
            height: 208px;
            background-color: #ffffff;
            border: solid 1px #999999;
            border-radius: 5px;
        }
        .dp {
            width: 206px;
            height: 206px;
            padding: 4px;
        }
        #type {
            text-align: center;
        }
        #favourite{
            float:right;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    require_once 'include/PrintUtils.php';
    printNavBar('profile', $username, 2)
    ?>
    <div class="row">
        <div class="col-md-10 well">
            <div class="row">
                <?
                    printJob($jobs, $userId);
                ?>
            </div>
        </div>
    </div>
</div>
<?php require_once 'include/ScriptsLevel2.php' ?>
</body>
</html>