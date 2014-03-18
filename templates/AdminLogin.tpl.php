<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'include/Css.php' ?>
        <style>
            .form-inline {
                max-width: 350px;
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

            .form-inline input[type="email"],
            .form-inline input[type="password"],
            .form-inline input[type="text"]
            {
                font-size: 16px;
                width: 290px;
                height: auto;
            }

        </style>
    </head>
    <body>
        <form id="login-form" class="form-inline" method="post" role="form" action="admin/login.exec">
            <h1 class="form-heading"><?php echo $title ?></h1>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Admin username" />
            </div>
            <br><br>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Admin password" />
            </div>
            <br><br>
            <input type="submit" class="btn btn-primary" name="Login" value="Login">
        </form>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>
