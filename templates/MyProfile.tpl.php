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
                margin-left: 250px;
                position: absolute;
                top: 400px;
            }

            #form2 {
                margin-left: 650px;
                position: absolute;
                top: 80px;
            }

            #form3 {
                margin-left: 650px;
                position: absolute;
                top: 500px;
            }

            #form4 {
                margin: 80px 250px;
            }

            .dp-container {
                width: 104px;
                height: 104px;
                background-color: #ffffff;
                border: solid 1px #999999;
                border-radius: 5px;
                margin-left: 90px;
            }

            .dp {
                width: 102px;
                height: 102px;
                padding: 2px;
            }
			#file{
				background-color:white;
				width: 100%;
				margin-left:5px;
			}
        </style>
    </head>

    <body>
        <?php
        require_once 'include/PrintUtils.php';
        printNavBar('myprofile', $username)
        ?>
        <form action="profile.save/image" class="form-inline" method="post" id="form4" enctype="multipart/form-data">
            <div class="dp-container">
                <img class="dp" src="public/images/upload/<?php echo "filename"?>.png">
                <br><br>
                <!--<a href="dp.change"><u>Change Picture</u></a> -->
            </div>
			<br>
			<input id="file" type="file" name="file" value="profile_img">
			<br>
			<input type="submit" value="Upload" class="btn btn-primary">
		</form>
        <form class="form-inline" method="post" id="form1" action="profile.save/personal">
            <h2>Personal details</h2>
            <hr>
            <div class="form-group">
                <label>Full Name:</label>
                <input name="fullname" class="form-control" type="text" placeholder="Your full name" value="<?php echo $fullName ?>">
            </div>
            <br><br>
            <div class="form-group">
                <label>Organization:</label>
                <input name="organization" class="form-control" type="text" placeholder="Your organization" value="<?php echo $organization ?>">
            </div>
            <br><br>
            <div class="form-group">
                <label>Designation:</label>
                <input name="designation" class="form-control" type="text" placeholder="Your designation" value="<?php echo $designation ?>">
            </div>
            <br><br>
            <div class="form-group">
                <label>Location:</label>
                <input name="location" class="form-control" type="text" placeholder="Your location" value="<?php echo $location ?>">
            </div>
            <br><br>
            <input type="submit" value="Save Changes" class="btn btn-primary">
        </form>
        <form class="form-inline" method="post" id="form2" action="profile.save/contact">
            <h2>Contact details</h2>
            <hr>
            <div class="form-group">
                <label>Email:</label>
                <input name="email" class="form-control" type="text" placeholder="Your email" value="<?php echo $email ?>">
            </div>
            <br><br>
            <div class="form-group">
                <label>Mobile:</label>
                <input name="phone" class="form-control" type="text" placeholder="Your mobile number" value="<?php echo $phone ?>">
            </div>
            <br><br>
            <input type="submit" value="Save Changes" class="btn btn-primary">
        </form>
        <form class="form-inline" method="post" id="form3" action="profile.save/password">
            <h2>Change Password</h2>
            <hr>
            <div class="form-group">
                <label>New password:</label>
                <input name="password" class="form-control" type="password" placeholder="Your new password">
            </div>
            <br><br>
            <div class="form-group">
                <label>Confirm password:</label>
                <input name="cpassword" class="form-control" type="password" placeholder="Confirm your password">
            </div>
            <br><br>
            <input type="submit" value="Change password" class="btn btn-primary">
        </form>
        <?php require_once 'include/Scripts.php'?>
    </body>
</html>