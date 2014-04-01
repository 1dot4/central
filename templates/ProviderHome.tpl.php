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
            printNavBar('home', $username, 2);
            ?>
            <div class="row">
                <div class="col-md-2">
                    <a href="index">Job postings by me</a>
                    <hr>
                    <a href="post">New job posting</a>
                </div>
                <div class="col-md-8">
				<form method="get" action="search">
                    <div class="form-inline">
		            <div class="form-group">
                        <label> Job type </label>
                        <select>
                            <option value="temporaryJob">Temporary</option>
                            <option value="permanentJob">Permanent</option>
                        </select>
		            </div>
                    <div class="form-group">
                        <label>From: </label>
                        <input class="form-control date" type="date" name="from_date">
                    </div>
                    <div class="form-group">
                        &nbsp&nbsp
                        <label>To: </label>
                        <input class="form-control date" type="date" name="to_date">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Search">
                    </div>
		        </form>
                    <div class="row">
                        <br>
                        <?php
                            require_once 'include/PrintUtils.php';

                            if(sizeof($searchedJobs) != 0) {
                                printJobs($searchedJobs);
                            } else if(sizeof($jobs) !=0 ) {
                                printJobs($jobs);
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
