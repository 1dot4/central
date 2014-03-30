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
        .form-inline input[type="email"],
        .form-inline input[type="password"],
        .form-inline input[type="text"]
        {
            font-size: 16px;
            width: 350px;
            height: auto;
        }
        textarea {
            font-size: 16px;
            min-width: 350px;
            min-height: 150px;
        }
        input[type="submit"] {
            margin-left: 170px;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    require_once 'include/PrintUtils.php';
    printNavBar('home', $username, 2)
    ?>
    <div class="row">
        <div class="col-md-2">
            <a href="index">Job postings by me</a>
            <hr>
            <a href="post">New job posting</a>
        </div>
        <div class="col-md-8">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Job title">
                </div>
                <br><br>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Job description"></textarea>
                </div>
                <br><br>
                <div class="form-group">

                </div>
                <br><br>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Number of vacancies">
                </div>
                <br><br>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Location of job" value="<?php echo $location ?>">
                </div>
                <br><br>
                <div class="form-group">
                    <label>Type of job:</label>&nbsp&nbsp
                    <input id="temporary" type="radio" name="type" value="temporary" checked>&nbspTemporary&nbsp&nbsp
                    <input id="permanent" type="radio" name="type" value="permanent">&nbspPermanent
                </div>
                <br><br>
                <div class="form-group">
                    <label>Start date: </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input class="form-control" type="date">
                </div>
                <br><br>
                <div class="form-group" id="durationInput">
                    <input class="form-control" type="text" placeholder="Duration of job(in days)">
                </div>
                <br><br>
                <input type="submit" class="btn btn-primary" value="Post Job">
            </form>
        </div>
    </div>
</div>
<?php require_once 'include/ScriptsLevel2.php' ?>
<script>
    var permanent = false;
    $("#temporary, #permanent").change(function() {
        if(permanent) {
            $("#durationInput").fadeIn();
        } else {
            $("#durationInput").fadeOut();
        }
        permanent = !permanent;
    });
</script>
</body>
</html>