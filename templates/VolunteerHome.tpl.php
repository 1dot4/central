<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
        </title>
        <?php require_once 'include/Css.php' ?>
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
        </style>
    </head>
    <body>
        <div class="container">
            <?php
                require_once 'include/NavBar.php';
                showNavBar('home', $username)
            ?>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="row">
                    <div class="col-md-5">
                        <h2>Register New Job seeker</h2>
                        <hr>
                        <form class="form-inline" action="seeker.register" method="post">
                            <div class="form-group">
                                <input name="username" class="form-control" type="text" placeholder="Job Seeker's username">
                            </div>
                            <br><br>
                            <div class="form-group">
                                <input name="fullname" class="form-control" type="text" placeholder="Job Seeker's full name">
                            </div>
                            <br><br>
                            <div class="form-group">
                                <input name="phone" class="form-control" type="text" placeholder="Job Seeker's mobile number">
                            </div>
                            <br><br>
                            <div class="form-group">
                                <input name="password" class="form-control" type="password" placeholder="Job Seeker's account password">
                            </div>
                            <br><br>
                            <div class="form-group">
                                <input name="cpassword" class="form-control" type="password" placeholder="Confirm Job Seeker's account password">
                            </div>
                            <br><br>
                            <div class="form-group">
                                <input name="curr-location" class="form-control" type="text" placeholder="Current location of Job Seeker">
                            </div>
                            <br><br>
                            <div class="form-group">
                                <input name="pref-location" class="form-control" type="text" placeholder="Preferred job location of Job Seeker">
                            </div>
                            <br><br>
                            <div class="form-group">
                                <input name="experience" class="form-control" type="text" placeholder="Job Seeker's experience">
                            </div>
                            <br><br>
                            <input class="btn btn-primary" value="Register" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>