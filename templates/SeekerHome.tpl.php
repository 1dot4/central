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
        </style>
    </head>
    <body>
        <div class="container">
        <?php
            require_once 'include/PrintUtils.php';
            printNavBar('home', $username, 2)
        ?>
        <div class="row">
                <div class="col-md-2">>
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
                        <?php
                            require_once 'include/PrintUtils.php';

                            if(sizeof($jobs) != 0) {
                                seekerPrintJobs($jobs);
                            }
                            else {
                                echo "You have not posted any jobs!";
                            }
                            
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
    </body>
</html>