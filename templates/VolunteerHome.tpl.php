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
                            <canvas id="interested-seekers-chart" style="margin-left: 70px"></canvas>
                            <h5><b><?php echo $noInterestedSeekers . " seekers have expressed interest in jobs out of " . $noRegisteredSeekers . " you registered"?></b></h5>
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
        <script src="../public/chart/Chart.min.js"></script>
        <script>
            drawProfileMeter(<?php echo $profileMeter ?>);

            var ctx = document.getElementById("interested-seekers-chart").getContext("2d");

            var noRegisteredSeekers = <?php echo $noRegisteredSeekers ?>;
            var interestedSeekers = <?php echo $noInterestedSeekers ?>;
            if(noRegisteredSeekers == 0) {
                noRegisteredSeekers = 1;
            }
            data = [
                {
                    value: interestedSeekers,
                    color:"#2ecc71"
                },
                {
                    value : noRegisteredSeekers - interestedSeekers,
                    color : "#E2EAE9"
                }
            ];

            new Chart(ctx).Doughnut(data);
        </script>
    </body>
</html>