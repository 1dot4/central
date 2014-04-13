<!DOCTYPE html>
<html>
    <head>
        <title>
            Register new Job Seeker
        </title>
        <?php require_once 'include/CssLevel2.php' ?>
        <style>
            .bootstrap-tagsinput {
                width: 100%;
            }
            .bootstrap-tagsinput {

                display: inline-block;
                padding: 4px 6px;
                margin-bottom: 10px;
                color: rgb(85, 85, 85);
                vertical-align: middle;
                border-radius: 4px;
                max-width: 100%;
                line-height: 22px;
            }
            .bootstrap-tagsinput .tag {
                margin-right: 2px;
                color: white;
            }
            .label-info {
                background-color: rgb(91, 192, 222);
            }
            .label {
                display: inline;
                padding: 0.2em 0.6em 0.3em;
                font-size: 75%;
                font-weight: bold;
                line-height: 1;
                color: rgb(255, 255, 255);
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0.25em;
            }
            *, *:before, *:after {
                -moz-box-sizing: border-box;
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:after {
                content: "x";
                padding: 0px 2px;
            }
            .bootstrap-tagsinput .tag [data-role="remove"] {
                margin-left: 8px;
                cursor: pointer;
            }
            *, *:before, *:after {
                -moz-box-sizing: border-box;
            }
            *, *:before, *:after {
                -moz-box-sizing: border-box;
            }
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
                <?php printVolunteerNavigationBar($userId) ?>
                <div class="col-md-5">
                    <h2>Register New Job seeker</h2>
                    <hr>
                    <form class="form-inline" action="../seeker.register" method="post">
                        <?php
                        if($errMsg != "") {
                            echo "<div class='form-error'>$errMsg</div><br>";
                        }
                        ?>
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
                        <div class="form-group">
                            <label>Skills: </label><br>
                            <div class="bootstrap-tagsinput">
                                <input type="text" data-role="tagsinput" value="" name="skills">
                            </div>
                        </div>
                        <br><br>
                        <input class="btn btn-primary" value="Register" type="submit">
                    </form>
                </div>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
        <script src="../public/tagsinput/js/bootstrap-tagsinput.js"></script>
        <script src="../public/tagsinput/js/typeahead.min.js"></script>
    </body>
</html>