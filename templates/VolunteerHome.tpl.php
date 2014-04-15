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
                <div class="col-md-5">
                    <h2>Job seekers you registered</h2>
                    <input type='text' placeholder='Search seeker' />
					<hr>
					<h5>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspstatus&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h5>
					<hr>
                    <?php
                        require_once 'include/PrintUtils.php';
                        foreach($registeredSeekers as $seeker) {
                            echo seekerRegistrationDetails($seeker)."<a><button class='acorditionbutton'>Relevant jobs</button></a><hr>";
							#if(sizeof($jobs) != 0) {
                            #     echo "<div class=Hidden>".printJobs($jobs, $userId)."</div>";
                            #    }
							#else {
                            #        echo "<div class='message'>We can not any fetch jobs which are relevant to you. Why not try our <a href='advanced-search'>advanced job search</a>?</div>";
                            #    }
						}
                    ?>
                </div>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
    </body>
</html>