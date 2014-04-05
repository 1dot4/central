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
                    <a href="index">Relevant Jobs</a>
                    <hr>
                    <a href="advSearch">Search all jobs</a>  
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
                                    seekerPrintJobs($jobs);
                                }
                                else {
                                    echo "No jobs!";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
    </body>
    <script src="./public/tagsinput/js/bootstrap-tagsinput.js"></script>
    <script src="./public/tagsinput/js/typeahead.min.js"></script>
</html>