<!DOCTYPE html>
<html>
    <head>
        <title>
            View Job
        </title>
        <?php require_once 'include/CssLevel2.php' ?>
        <style>
            .col-md-8 {
                margin-top: 100px;
                margin-left: 200px;
            }
            hr {
                border-top: 1px solid #dddddd;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
                require_once 'include/PrintUtils.php';
                printNavBar('profile', $username, 2)
            ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <?php
                            printJob($jobArray, $userId);
                        ?>
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