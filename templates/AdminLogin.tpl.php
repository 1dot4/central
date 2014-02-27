<html>
    <head>
        <title><?php echo $title ?></title>
        <?php require_once 'include/Css.php' ?>
        <link rel="stylesheet" href="public/css/style.css" />
    </head>
    <body>
        <form id="login-form" class="simple-form" method="post" action="admin/login.exec">
            <h1 class="form-heading"><?php echo $title ?></h1>
            <input type="text" class="simple-form-input" name="username" placeholder="Admin username" /><br/>
            <input type="password" class="simple-form-input" name="password" placeholder="Admin password" /><br/>
            <input type="submit" class="simple-form-button" name="Login" value="Login">
        </form>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>
