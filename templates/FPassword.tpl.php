<html>
    <head>
        <title><?php echo $title ?></title>
        <?php require_once 'include/Css.php' ?>
        <style>
            .social ul li a.twitter span {
                   background-position: 0px -122.5px;
            }
            .social ul li a.facebook span {
                   background-position: -23px -122.5px;
            }
            .social ul li a.google span {
                   background-position: -115px -122.5px;
            }
            .social ul li a span {
                background-image: url(./public/images/sprite.svg);
                background-size: 500px 500px;
                display: inline-block;
                zoom: 1;
                width: 23px;
                height: 23px;
                text-align: center;
            }
            .social {
                margin-right: 20px;
            }
            .form-inline {
                
                max-width: 350px;
                padding: 29px;
                margin: 100px auto 20px;
                /*background-color: #f2f2f2;*/
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

            .form-error {
                background-color: rgba(255, 0, 0, 0.3);
                padding: 10px 15px;
                border-radius: 2px;
                border: 1px solid rgba(255, 0, 0, 0.35);
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="./" style="font-size:23px; color:white;">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           JanRozgar
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       </a>

   </div>

   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav" id="abcd">
           <!-- <li><a href="#page1" class="link"></a></li> -->
           <!-- <li><a href="#page1" class="link">&nbsp;&nbsp;Home&nbsp;&nbsp;</a></li> -->
           <li><a href="#page2" class="link">&nbsp;&nbsp;About&nbsp;&nbsp;</a></li>
           <li><a href="#page3" class="link">&nbsp;&nbsp;FAQs&nbsp;&nbsp;</a></li>
           <li><a href="#page4" class="link">&nbsp;&nbsp;Donate&nbsp;&nbsp;</a></li>
           <li><a href="#page5" class="link">&nbsp;&nbsp;Contact Us&nbsp;&nbsp;</a></li>    
       </ul>
       <div class="social">
           <ul class="nav navbar-nav navbar-right">
               <li><a href="https://twitter.com" class="twitter"><span>&nbsp;</span></a></li>
               <li><a href="https://www.facebook.com/" class="facebook"><span>&nbsp;</span></a></li>
               <li><a href="https://plus.google.com/" class="google"><span>&nbsp;</span></a></li>
           </ul>
       </div>
   </div>
</nav>
        <form method='post' action='fpassword.do' class="form-inline" role="form">
            <h1 class="form-heading"><?php echo $title ?></h1>
            <hr>
            <?php
            if($errMsg != "") {
                echo "<div class='form-error'>$errMsg</div>";
            }
            ?>
            <br>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Your username">
            </div>
            <br><br>
            <input type="submit" value="Submit" class="btn btn-primary">
            <br>
            <hr>
            <a href=".">< Back to login</a>
        </form>
        <?php require_once 'include/Scripts.php' ?>
    </body>
</html>
