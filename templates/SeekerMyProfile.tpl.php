<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $username ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'include/Css.php' ?>
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
            element {
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
            .form-inline, .dp-box {
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
                height: auto;
            }
			
			#text1{
				width: 290px;
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
                top: 305px
            }

            #form2 {
                margin-left: 650px;
                position: absolute;
                top: 80px;
            }

            #form3 {
                margin-left: 650px;
                position: absolute;
                top: 390px;
            }

            #form4 {
                margin-left: 250px;
                position: absolute;
                top: 780px;
                min-width: 750px;
            }

            .dp-box {
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
        </style>
    </head>
    <?php
        require_once 'include/PrintUtils.php';
        printNavBar('myprofile', $username);
    ?>
    <div class="dp-box">
        <div class="dp-container">
            <img class="dp" src="public/images/default_profile.png">
            <br><br>
            <a href="dp.change"><u>Change Picture</u></a>
        </div>
        <br>
    </div>
    <form class="form-inline" method="post" id="form1" action="profile.save/personal">
        <h2>Personal details</h2>
        <hr>
        <div class="form-group">
            <label>Full Name:</label>
            <input name="fullname" class="form-control" id="text1" type="text" placeholder="Your full name" value="<?php echo $fullName ?>">
        </div>
        <br><br>
        <div class="form-group">
            <label>Current Location:</label>
            <input name="curr-location" class="form-control" id="text1" type="text" placeholder="Your current location" value="<?php echo $currLocation ?>">
        </div>
        <br><br>
        <div class="form-group">
            <label>Preferred Job Location:</label>
            <input name="pref-location" class="form-control" id="text1" type="text" placeholder="Your preferred job location" value="<?php echo $prefLocation ?>">
        </div>
        <br><br>
        <input type="submit" value="Save Changes" class="btn btn-primary">
    </form>
    <form class="form-inline" method="post" id="form2" action="profile.save/contact">
        <h2>Contact details</h2>
        <hr>
        <div class="form-group">
            <label>Mobile:</label>
            <input name="phone" class="form-control" id="text1" type="text" placeholder="Your mobile number" value="<?php echo $phone ?>">
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
    <form class="form-inline" method="post" id="form4" action="profile.save/skills">
        <h2>Skills</h2>
        <hr>
        <div class="form-group">
            <label>Experience in years:</label><br>
            <input name="experience" class="form-control" id="text1" type="text" placeholder="Your experience in years" value="<?php echo $experience ?>">
        </div>
        <br><br>
        <div class="form-group">
            <label>Skills: </label><br>
			<div class="bootstrap-tagsinput">
				<input type="text" data-role="tagsinput" value="<?php echo $skills ?>" name="skills">
			</div>
		</div>
    <br><br>
        <input type="submit" value="Save changes" class="btn btn-primary">
    </form>
    <?php require_once 'include/Scripts.php' ?>
    </body>
    <script src="./public/tagsinput/js/bootstrap-tagsinput.js"></script>
    <script src="./public/tagsinput/js/typeahead.min.js"></script>
</html>
