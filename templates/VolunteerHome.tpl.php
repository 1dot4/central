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
    <script src="jquery-1.11.0.min.js"></script>
	<script type='text/javascipt'>
	(function($) {
    
		var allPanels = $('.Hidden').hide();
    
			$('.acorditionbutton').click(function() {
			allPanels.hide();
			$(this).parent().next().toggle();
			return false;
			});

		})(jQuery);
	</script>
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
                    <h4>Crunching latest stats just for you</h4>
                    <hr>
                    <div class="row">
                        <br>
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-4">
                            <canvas id="profile-meter"></canvas>
                            <h5 style="margin-left: 50px"><b><a href='../profile/<?php echo $username ?>'>Your profile</a> is <?php echo $profileMeter ?>% complete</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
        <script src="../public/guage/gauge.min.js"></script>
        <script src="../public/js/profile-meter.js"></script>
        <script>
            drawProfileMeter(<?php echo $profileMeter ?>);
        </script>
    </body>
</html>