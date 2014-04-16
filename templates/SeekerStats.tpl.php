<!DOCTYPE html>
<html>
<head>
    <title>
        Stats
    </title>
    <?php require_once 'include/CssLevel2.php' ?>
    <style>
        .container {
            margin-top: 90px;
        }
        hr {
            border-top: 1px solid #cccccc;
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
        <?php printSeekerNavigationBar($userId) ?>
        <div class="col-md-10">
            <h4>Crunching latest stats just for you</h4>
            <hr>
            <div class="row">
                <br>
                <div class="col-md-8">
                    <canvas id="skill-demand-chart" style="width: 500px; height: 500px; margin-left: 120px" width="400px" height="400px"></canvas>
                    <h5 style="text-align: center"><b>Skill wise job demand</b></h5>
                    <br>
                    <br>
                    <canvas id="job-relevance-chart" style="margin-left: 150px"></canvas>
                    <h5 style="text-align: center"><b>Percentage of relevant jobs out of all jobs</b></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'include/ScriptsLevel2.php' ?>
<script type="text/javascript" src="../public/chart/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('skill-demand-chart').getContext("2d");
    var data = {
        labels : [<?php echo $skillString ?>],
        datasets : [
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                pointColor : "rgba(151,187,205,1)",
                pointStrokeColor : "#fff",
                data : [<?php echo $skillDemands ?>]
            }
        ]
    };
    new Chart(ctx).Radar(data);

    var noRelevantJobs = <?php echo $relevantJobs ?>;
    var totalJobs = <?php echo $totalJobs ?>;

    var ctx_ = document.getElementById('job-relevance-chart').getContext("2d");
    data = [
        {
            value: noRelevantJobs,
            color:"#2ecc71"
        },
        {
            value : totalJobs - noRelevantJobs,
            color : "#E2EAE9"
        }
    ];

    new Chart(ctx_).Doughnut(data);

</script>
</body>
</html>