<html>
    <head>
        <title><?php echo $title ?></title>
        <?php require_once 'include/Css.php' ?>
        <style>
            .form-inline {
                max-width: 370px;
                padding: 29px;
                margin: 180px auto 20px;
                background-color: #f2f2f2;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }

            .form-inline .form-heading {
                margin-bottom: 10px;
            }

            hr {
                border-top: 1px solid #dddddd;
            }
        </style>
    </head>
    <body>
        <form method='post' action='register/1' class="form-inline" role="form">
            <h1 class="form-heading"><?php echo $title ?></h1>
            <hr>
            <br>
            <div class="form-group">
                <label class="checkbox-inline">I am registering as a</label>
                <select name="registrant" class="form-control">
                    <option value="job-provider">Job Provider</option>
                    <option value="job-seeker">Job Seeker</option>
                    <option value="volunteer">Volunteer</option>
                </select>
            </div>
            <br><br>
            <input type="submit" value="Proceed" class="btn btn-primary">
            <br>
            <hr>
            <a href=".">< Back to login</a>
        </form>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>
