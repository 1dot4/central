<html>
    <head>
        <title><?php echo $title ?></title>
        <?php require_once 'include/Css.php' ?>
        <style>
            .form-inline {
                max-width: 350px;
                padding: 29px;
                margin: 80px auto 20px;
                background-color: #f2f2f2;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }

            .form-inline .form-heading {
                margin-bottom: 10px;
            }

            .form-inline input[type="email"],
            .form-inline input[type="password"],
            .form-inline input[type="text"]
            {
                font-size: 16px;
                width: 290px;
                height: auto;
            }

            hr {
                border-top: 1px solid #dddddd;
            }
        </style>
    </head>
    <body>
        <form method='post' action='verify' class="form-inline" role="form">
            <h1 class="form-heading"><?php echo $title ?></h1>
            <hr>
            <br>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Your username">
            </div>
            <br><br>
            <div class="form-group">
                <input type="text" name="phone" class="form-control" placeholder="Your mobile number">
            </div>
            <br><br>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Your password">
            </div>
            <br><br>
            <div class="form-group">
                <input type="password" name="cpassword" class="form-control" placeholder="Confirm your password">
            </div>
            <br><br>
            <div class="form-group">
                <label class="checkbox-inline">I am a</label>&nbsp&nbsp
                <select name="registrant" class="form-control">
                    <option value="job-provider">Job Provider</option>
                    <option value="job-seeker">Job Seeker</option>
                    <option value="volunteer">Volunteer</option>
                </select>
            </div>
            <br><br>
            <input type="submit" value="Proceed" class="btn btn-primary">
            <br>
            <hr>
            <a href=".">< Back to login</a>
        </form>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>
