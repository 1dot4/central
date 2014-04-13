<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php echo $title ?>
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
            printNavBar('profile', $currentUserName, 2)
            ?>
            <div class="row">
                <div class="col-md-8 well">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dp-box">
                                <div class="dp-container">
                                    <img class="dp" src="../public/images/default_profile.png">
                                </div>
                            </div>
                            <h4 id="type"><b><?php echo $typeText ?></b></h4>
                        </div>
                        <div class="col-md-7">
                            <h1>
                                <?php
                                    echo $username;

                                    if($userId != $currentUserId) {
                                        if(!$favorited) {
                                            echo "<button id='favourite' type='button' class='btn btn-default'>" .
                                                "<span class='glyphicon glyphicon-star-empty'></span> Add to Favourites" .
                                                "</button>";
                                        } else {
                                            echo "<button id='favourite' type='button' class='btn btn-default'>" .
                                                "<span class='glyphicon glyphicon-star-empty'></span> Favourited" .
                                                "</button>";
                                        }
                                    }
                                ?>
                            </h1>
                            <i><span class="glyphicon glyphicon-star"></span>&nbsp&nbspFavourited by <?php echo $noFavoritedBy ?> people</i>
                            <hr>
                            <?php if($fullName != ""): ?>
                            <h5><span class="glyphicon glyphicon-user"></span>&nbsp&nbsp<b><?php echo $fullName ?></b></h5>
                            <?php endif ?>
                            <?php if($userType == 'volunteer' || $userType == 'provider'): ?>
                                <?php if($email != ""): ?>
                                    <h5><span class="glyphicon glyphicon-envelope"></span>&nbsp&nbsp<a><?php echo $email ?></a></h5>
                                <?php endif ?>
                                <?php if($organization != ""): ?>
                                    <h5><span class="glyphicon glyphicon-briefcase"></span>&nbsp&nbspWorks at <a><?php echo $organization ?></a></h5>
                                <?php endif ?>
                                <?php if($designation != ""): ?>
                                    <h5><span class="glyphicon glyphicon-leaf"></span>&nbsp&nbspIs a <a><?php echo $designation ?></a></h5>
                                <?php endif ?>
                                <?php if($location != ""): ?>
                                    <h5><span class="glyphicon glyphicon-map-marker"></span>&nbsp&nbspLocated at <a><?php echo $location ?></a></h5>
                                <?php endif?>
                            <?php endif ?>
                            <?php if($userType == 'seeker'): ?>
                                <?php if($experience != ""): ?>
                                    <h5><span class="glyphicon glyphicon-eye-open"></span>&nbsp&nbspHas an experience of <?php echo $experience ?> years</h5>
                                <?php endif ?>
                                <?php if($currLocation != ""): ?>
                                    <h5><span class="glyphicon glyphicon-map-marker"></span>&nbsp&nbspCurrently located at <a><?php echo $currLocation ?></a></h5>
                                <?php endif ?>
                                <?php if($prefLocation != ""): ?>
                                    <h5><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp&nbspWould prefer <a><?php echo $prefLocation ?></a> as job location</h5>
                                <?php endif ?>
                            <?php endif ?>
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