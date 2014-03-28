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
                <div class="row">
                    <div class="col-md-8">
                        <form role="form" class="form-inline" action="job.post" method="post">
                            <div class="form-group">
                                <textarea class="form-control" id="post-input" placeholder="Enter new job posting here..."></textarea>
                            </div>
                            <br><br>
                            <input class="btn btn-primary" value="Post" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>