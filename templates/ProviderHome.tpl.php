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
            printNavBar('home', $username, 2)
            ?>
            <div class="row">
                <div class="col-md-2">
                    <a href="index">Job postings by me</a>
                    <hr>
                    <a href="post">New job posting</a>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <?php
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
        <?php require_once 'include/ScriptsLevel2.php' ?>
    </body>
</html>