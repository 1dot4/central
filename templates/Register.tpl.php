<html>
    <head>
        <title><?php echo $title ?></title>
        <?php require_once 'include/Css.php' ?>
    </head>
    <body>
        <h1><?php echo $title ?></h1>
        <form method='post' action='register/1'>
            I am registering as a
            <select name="registrant">
                <option value="volunteer">Volunteer</option>
                <option value="job-seeker">Job Seeker</option>
                <option value="job-provider">Job Provider</option>
            </select>
            <input type="submit" value="Proceed">
        </form>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>
