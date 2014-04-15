<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
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
			#skills_img{
				display:none;
				height: 40%;
				width: 40%;
			}
			
			#skills_hover {
				:hover img{display:block;}
			}
            .container {
                margin-top: 90px;
            }
            .date {
                max-width: 160px;
            }
            #edit-btn {
                margin-left: 290px;
            }
            .dp-box {
            }
            .dp-container {
                width: 128px;
                height: 128px;
                background-color: #ffffff;
                border: solid 1px #999999;
                border-radius: 5px;
            }
            .dp {
                width: 126px;
                height: 126px;
                padding: 4px;
            }
            hr {
                border-top: 1px solid #cccccc;
            }
            .message {
                background-color: rgba(52, 152, 219, 0.3);
                padding: 10px 15px;
                border-radius: 2px;
                border: 1px solid rgba(52, 152, 219, 0.35);
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
                    <h4>Relevant Jobs</h4>
                    <hr>
                    <div class="row">
                        <br>
                        <div class="col-md-8">
                            <?php
                                require_once 'include/PrintUtils.php';
                                if(sizeof($jobs) != 0) {
                                    printJobs($jobs, $userId);
                                }
                                else {
                                    echo "<div class='message'>We can not any fetch jobs which are relevant to you. Why not try our <a href='advanced-search'>advanced job search</a>?</div>";
                                }
                            ?>
                        </div>
                        <div class="col-md-4">
                            <canvas id="profile-meter"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
        <script src="../public/tagsinput/js/bootstrap-tagsinput.js"></script>
        <script src="../public/tagsinput/js/typeahead.min.js"></script>
        <script src="../public/guage/gauge.min.js"></script>
        <script>
            var opts = {
                lines: 12, // The number of lines to draw
                angle: 0.15, // The length of each line
                lineWidth: 0.44, // The line thickness
                pointer: {
                    length: 0.9, // The radius of the inner circle
                    strokeWidth: 0.035, // The rotation offset
                    color: '#000000' // Fill color
                },
                limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
                colorStart: '#6FADCF',   // Colors
                colorStop: '#8FC0DA',    // just experiment with them
                strokeColor: '#E0E0E0',   // to see which ones work best for you
                generateGradient: true
            };
            var target = document.getElementById('profile-meter'); // your canvas element
            var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
            gauge.maxValue = 3000; // set max gauge value
            gauge.animationSpeed = 39; // set animation speed (32 is default value)
            gauge.set(100); // set actual value

            function expressInterest(jobId) {
                $.get("../job.interested/" + jobId + "?value=true").done(function(data) {
                    //console.log(data);
                    var jObj = $.parseJSON(data);
                    if(jObj[0].success == true) {
                        $(".express-interest").html("<span class='glyphicon glyphicon-check'></span>&nbsp&nbspInterest expressed !");
                        $(".express-interest").attr("class", "btn btn-warning btn-xs express-interest");
                        $(".express-interest").attr("onclick", "unExpressInterest(" + jobId +")");
                    }
                });
            }

            function unExpressInterest(jobId) {
                $.get("../job.interested/" + jobId + "?value=false").done(function(data) {
                    //console.log(data);
                    var jObj = $.parseJSON(data);
                    if(jObj[0].success == true) {
                        $(".express-interest").html("<span class='glyphicon glyphicon-send'></span>&nbsp&nbspExpress Interest !");
                        $(".express-interest").attr("class", "btn btn-info btn-xs express-interest");
                        $(".express-interest").attr("onclick", "expressInterest(" + jobId +")");
                    }
                });
            }
        </script>
    </body>
</html>