<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
        </title>
        <?php require_once 'include/Css.php' ?>
        <style>
            .container {
                margin-top: 90px;
            }
            #post-input {
                min-width: 600px;
                min-height: 100px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
            require_once 'include/PrintUtils.php';
            printNavBar('home', $username)
            ?>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <form role="form" class="form-inline" action="job.post" method="post">
                            <div class="form-group">
                                <textarea name="job-description" class="form-control" id="post-input" placeholder="Enter new job posting here..."></textarea>
                            </div>
                            <br><br>
                            <input class="btn btn-primary" value="Post" type="submit">
                        </form>
                    </div>
                    <br><br>
                    <div class="row">
                        <?
                            require_once 'include/PrintUtils.php';
                            foreach($jobs as $job) {
                                echo $job["description"];
                                echo "<br>";
                                echo "Posted by " . linkedName($job["posted_by_id"]) . " on " . $job["post_date"];
                                echo "<hr>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>