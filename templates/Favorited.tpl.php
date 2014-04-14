<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php echo "Users who have favorited " . $favoriteName ?>
        </title>
        <?php require_once 'include/CssLevel2.php' ?>
        <style>
            .col-md-8 {
                margin-top: 100px;
                margin-left: 200px;
            }
            hr {
                border-top: 1px solid #dddddd;
            }
            .dp-box {
            }
            .dp-container {
                width: 208px;
                height: 208px;
                background-color: #ffffff;
                border: solid 1px #999999;
                border-radius: 5px;
            }
            .dp {
                width: 206px;
                height: 206px;
                padding: 4px;
            }
            #type {
                text-align: center;
            }
            #favourite{
                float:right;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
                require_once 'include/PrintUtils.php';
                printNavBar('profile', $username, 2)
            ?>
            <div class="col-md-8">
                <h4><?php echo "Users who have favorited <a href='../profile/" . $favoriteName . "'>" . $favoriteName . "</a>" ?></h4>
                <hr>
                <?php printUsers($favorited) ?>
            </div>
        </div>
        <?php require_once 'include/ScriptsLevel2.php' ?>
        <script>
            $("#favourite").click(function() {
                $.get("../favorite/" + <?php echo $userId ?>).done(function(data) {
                    var jsonObj = $.parseJSON(data);
                    if(jsonObj[0].success == true) {
                        $("#favourite").html("<span class='glyphicon glyphicon-star-empty'></span> " + jsonObj[0].message);
                    }
                });
            });
        </script>
    </body>
</html>