<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <?php require_once 'include/Css.php' ?>
        <link rel="stylesheet" href="public/css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id="login-form" class="simple-form" method="post" action="login.exec">
            <h1 class="form-heading"><?php echo $title ?></h1>
            <input type="text" class="simple-form-input" name="username" placeholder="Your username" /><br/>
            <input type="password" class="simple-form-input" name="password" placeholder="Your password" /><br/>
            <input type="submit" class="simple-form-button" name="Login" value="Login"><br/>
            <a href="register">New user? Register here</a>
        </form>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>
