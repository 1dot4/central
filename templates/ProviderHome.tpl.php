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
            .date {
                max-width: 160px;
            }
            #edit-btn {
                margin-left: 285px;
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
            printNavBar('home', $username, 2);
            ?>
            <div class="row">
                <div class="col-md-2">
                    <a href="index">Job postings by me</a>
                    <hr>
                    <a href="post">New job posting</a>
                </div>
                <div class="col-md-10">
				<form class="form-inline" method="get" action="search">
                    <div class="form-group">
                        <label>From: </label>
                        <input class="form-control date" type="date" name="from_date">
                    </div>
                    <div class="form-group">
                        &nbsp&nbsp
                        <label>To: </label>
                        <input class="form-control date" type="date" name="to_date">
                    </div>
                    <div class="form-group">
                        &nbsp&nbsp
                        <input name="q" class="form-control search" type="text" placeholder="search">
                    </div>
                    <div class="form-group">
                        &nbsp&nbsp
                        <input type="checkbox" name="closed"> Show closed &nbsp&nbsp
                    </div>
                    <input type="submit" class="btn btn-primary" value="Search">
                </form>
                <hr>
                    <div class="row">
                        <br>
                        <div class="col-md-8">
                            <?php
                                require_once 'include/PrintUtils.php';

                                if(sizeof($jobs) != 0) {
                                    printJobs($jobs);
                                }
                                else {
                                    echo "<div class='message'>You have not posted any jobs!</div>";
                                }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
        <script>
            function deleteJob(jobId) {
                var confirmed = confirm("Really delete the job?");
                if(confirmed == true) {
                    $.get('../job.delete/' + jobId).done(function(data) {
                        var jObj = $.parseJSON(data);
                        if(jObj[0].success == true) {
                            var divJob = "job-" + jobId;
                            $("#" + divJob).fadeOut();
                        }
                    });
                }
            }

            function toggleStatus(jobId) {
                $.get('../job.status/' + jobId).done(function(data) {
                    var jObj = $.parseJSON(data);
                    if(jObj[0].success == true) {
                        var divJobStatus = "job-status-" + jobId;
                        $("#" + divJobStatus).html("status:" + jObj[0].status);
                    }
                });
            }
        </script>
    </body>
</html>
