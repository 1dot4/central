<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $username ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'include/Css.php' ?>
        <style>
            .form-inline {
                max-width: 350px;
                padding: 29px;
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

            .form-error {
                background-color: rgba(255, 0, 0, 0.3);
                padding: 10px 15px;
                border-radius: 2px;
                border: 1px solid rgba(255, 0, 0, 0.35);
            }

            #form1 {
                margin: 40px 100px;
            }

            #form2 {
                margin: 40px 100px;
            }

            #form3 {
                margin: 40px 100px;
            }
        </style>
    </head>

    <body>
        <form class="form-inline" method="post" id="form1">
            <h2>Personal details</h2>
            <hr>
            <div class="form-group">
                <label>Full Name:</label>
                <input class="form-control" type="text" placeholder="Your full name" value="<?php echo $fullName ?>">
            </div>
            <br><br>
            <div class="form-group">
                <label>Organization:</label>
                <input class="form-control" type="text" placeholder="Your organization" value="<?php echo $organization ?>">
            </div>
            <br><br>
            <div class="form-group">
                <label>Designation:</label>
                <input class="form-control" type="text" placeholder="Your designation" value="<?php echo $designation ?>">
            </div>
            <br><br>
            <div class="form-group">
                <label>Location:</label>
                <input class="form-control" type="text" placeholder="Your location" value="<?php echo $location ?>">
            </div>
        </form>
        <form class="form-inline" method="post" id="form2">
            <h2>Contact details</h2>
            <hr>
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" placeholder="Your email" value="<?php echo $email ?>">
            </div>
            <br><br>
            <div class="form-group">
                <label>Mobile:</label>
                <input class="form-control" type="text" placeholder="Your mobile number" value="<?php echo $phone ?>">
            </div>
        </form>
        <form class="form-inline" method="post" id="form3">
            <h2>Change Password</h2>
            <hr>
            <div class="form-group">
                <label>New password:</label>
                <input class="form-control" type="password" placeholder="Your new password">
            </div>
            <br><br>
            <div class="form-group">
                <label>Confirm password:</label>
                <input class="form-control" type="password" placeholder="Confirm your password">
            </div>
        </form>
        <?php require_once 'include/Scripts.php'?>
    </body>
</html>