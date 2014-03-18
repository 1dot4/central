<html>
<head>
    <title><?php echo $title ?></title>
    <?php require_once 'include/Css.php' ?>
    <style>
        .form-inline {
            max-width: 400px;
            padding: 29px;
            margin: 80px auto 20px;
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
            width: 340px;
            height: auto;
        }

        hr {
            border-top: 1px solid #dddddd;
        }

        .form-error {
            background-color: rgba(255, 0, 0, 0.3);
            padding: 10px 15px;
            border-radius: 2px;
            border: 1px solid rgba(255, 0, 0, 0.35);
        }
    </style>
</head>
<body>
<form method='post' action='verify.do' class="form-inline" role="form">
    <h1 class="form-heading"><?php echo $title ?></h1>
    <hr>
    <?php
    if($errMsg != '') {
        echo "<div class='form-error'>$errMsg</div>";
    }
    ?>
    <br>
    <div class="form-group">
        <input type="text" name="code" class="form-control" placeholder="Enter verification code sent to your mobile">
    </div>
    <br><br>
    <input type="submit" value="Verify" class="btn btn-primary">
    <br>
    <hr>
    <a href="register">< Back to Registration</a>
</form>
<?php require_once 'include/Scripts.php' ?>
</body>
</html>
