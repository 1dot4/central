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
        <?php printProviderNavigationBar($userId) ?>
        <div class="col-md-10">
            <h4>Crunching latest stats just for you</h4>
            <hr>
            <div class="row">
                <br>
                <div class="col-md-8">
                    <canvas id="interested-chart" style="margin-left: 150px"></canvas>
                    <h5 style="text-align: center"><b>People have expressed interest in <?php echo $noInterestedJobPostings ?> jobs out of <?php echo $noJobPostings?> you posted</b></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'include/ScriptsLevel2.php' ?>
<script type="text/javascript" src="../public/chart/Chart.min.js"></script>
<script>
    var ctx = document.getElementById("interested-chart").getContext("2d");
    var noJobPostings = <?php echo $noJobPostings ?>;
    var noInterestedJobPostings = <?php echo $noInterestedJobPostings ?>;
    if(noJobPostings == 0) {
        noJobPostings = 1;
    }
    data = [
        {
            value: noInterestedJobPostings,
            color:"#2ecc71"
        },
        {
            value : noJobPostings - noInterestedJobPostings,
            color : "#E2EAE9"
        }
    ];

    new Chart(ctx).Doughnut(data);

</script>
</body>
</html>