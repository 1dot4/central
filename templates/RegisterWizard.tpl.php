<html>
    <head>
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../public/bootstrap/css/bootstrap-theme.min.css" />
        <style>
            .form-inline {
                max-width: 350px;
                padding: 29px;
                margin: 20px auto 20px;
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

            hr {
                border-top: 1px solid #dddddd;
            }
        </style>
    </head>
    <body>
        <?php echo $formTemplate ?>
        <?php require_once 'include/Scripts.php' ?>
        <script type="text/javascript" src="../public/jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../public/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
