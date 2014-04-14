<!DOCTYPE html>
<html>
    <head>
        <title>
            My Favourites
        </title>
        <?php require_once 'include/CssLevel2.php' ?>
        <style>
            .container {
                margin-top: 90px;
            }
            hr {
                border-top: 1px solid #dddddd;
            }
            .dp-box {
            }
            .dp-container {
                width: 180px;
                height: 180px;
                background-color: #ffffff;
                border: solid 1px #999999;
                border-radius: 5px;
            }
            .dp {
                width: 178px;
                height: 178px;
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
                printNavBar('home', $username, 2);
            ?>
            <div class="row">
                <?php

                    switch($userType) {
                        case 'volunteer':
                            printVolunteerNavigationBar($userId);
                            break;
                        case 'seeker':
                            printSeekerNavigationBar($userId);
                            break;
                        case 'provider':
                            printProviderNavigationBar($userId);
                            break;
                    }
                ?>
                <div class="col-md-10">
                    <h4>My Favourites</h4>
                    <hr>
                    <div class="row">
                        <br>
                        <div class="col-md-8">
                            <?php
                                switch($userType) {
                                    case 'volunteer':
                                        printUsers($seekerFav);
                                        printUsers($providerFav);
                                        printUsers($volunteerFav);
                                        break;
                                    case 'seeker':
                                        printUsers($providerFav);
                                        printUsers($volunteerFav);
                                        printUsers($seekerFav);
                                        break;
                                    case 'provider':
                                        printUsers($seekerFav);
                                        printUsers($volunteerFav);
                                        printUsers($providerFav);
                                        break;
                                }
                            ?>
                        </div>
                    </div>
                </div>
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
