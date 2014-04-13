<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="./public/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="./public/bootstrap/css/bootstrap.min.css"> 
        <?php require_once 'include/Css.php' ?>
        <style>
            .social ul li a.twitter:hover {
                background-color: #4099FF;
            }
            .social ul li a.facebook:hover {
                background-color: #3b5998;
            }
            .social ul li a.google:hover {
                background-color: #dd4b39;
            }
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
                    float: right;
                    max-width: 350px;
                    padding: 29px;
                    margin: 130px 480px auto 20px;
                    background-color: rgba(255, 255, 255, 0.75); 
                    border: 1px solid #ffffff;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                    box-shadow: 0 1px 2px rgba(0,0,0,.05);
                }
            .you {
                    float: left;
                    max-width: 600px;
                    padding: 29px;
                    margin: 150px 80px auto 100px;
                    /* background-color: #f2f2f2; */
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
			
			.img-rounded {
				-webkit-border-radius: 6px;
				-moz-border-radius: 6px;
				border-radius: 6px;
			}

			
            #page1 { 
                background-image: url(./public/images/janrozgar.jpg);				
				background-size: cover;
				min-height: 800px;		
            }
			
            #page2 { 
                font-family: 'Century Gothic', sans-serif; font-size: 1.17em;
                /* background: url(templates/purple.jpg) 50% 0 repeat; min-height: 1000px; */
            }

            #page3{ 
				background-color: #ffffff;
                font-family: 'Century Gothic', sans-serif; font-size: 1.17em;
                /*background: url(templates/black.jpg) 50% 0 repeat; min-height: 1000px;  */
            }

            #page4{ 
				background-color: #16a085;
                font-family: 'Century Gothic', sans-serif; font-size: 1.17em;
                /* background: url(templates/purple.jpg) 50% 0 repeat; min-height: 1000px; */
            }

            #page5{ 
				background-color: #bdc3c7;
                font-family: 'Century Gothic', sans-serif; font-size: 1.17em;
                /*background: url(templates/black.jpg) 50% 0 repeat; min-height: 1000px;  */
            }
			
            #main .panel:nth-child(odd) {
            background: white;  /*here color was #2980B9 */
			}
			
			.main-header {
				text-align: center;
			}
			
			#search{
				width:30%;
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
           <li><a href="#page1" class="link">&nbsp;&nbsp;Home&nbsp;&nbsp;</a></li>
           <li><a href="#page2" class="link">&nbsp;&nbsp;Search&nbsp;&nbsp;</a></li>
           <li><a href="#page3" class="link">&nbsp;&nbsp;FAQs&nbsp;&nbsp;</a></li>
           <li><a href="#page4" class="link">&nbsp;&nbsp;About&nbsp;&nbsp;</a></li>
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
        <section id="home" data-type="background" data-speed="10" class="pages">
          <article class="panel" id="page1" style=" color:black; padding-top:1%; height:100%;">
				
          
              <form id="login-form" class="form-inline" method="post" role="form" action="login.do">
                  <h1 class="form-heading"><?php echo $title ?></h1>
                  <hr>
                  <?php
                  if($errMsg != "") {
                      echo "<div class='form-error'>$errMsg</div>";
                  }
                  ?>
                  <br>
                  <div class="form-group">
                      <input type="text" class="form-control" name="username" placeholder="Your username" />
                  </div>
                  <br><br>
                  <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="Your password" />
                  </div>
                  <br>
      			<div class="form-group">
      				<input type="checkbox" class="form-control" name="remember_me" value="remeber_me">&nbsp&nbspRemember me
      			</div>
      			<br><br>
                  <input type="submit" class="btn btn-primary" name="Login" value="Login">
                  <br>
                  <hr>
      			<a href="fpassword">Forgot Password? </a><br>
                  <a href="register">New user? Register here ></a>
              </form>
              <?php require_once 'include/Scripts.php' ?>
          </article>
        </section>

		
		<section id="donate" data-type="background" data-speed="10" class="pages">
          <article class="panel" id="page2" style="height:auto; padding-top:3%; margin-top:-5%">
            <div>
              <h2 style="text-align:center; font-weight:bold; font-size:50px; color:#1aaf5d">Search your JOB</a></h2>
              <hr>
				<div class="banner">
					<header class="main-header" role="banner">
						<img src="./public/images/Jan.jpg" alt="Banner Image"/>
					</header>
					<br>
					<div class="container" align="center">
						<div class="row">
							<div class="input-group" id="search" >	
								<input type="text" class="form-control" placeholder="Search for Jobs">
								<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
							</div>
						</div>
					</div>						
				</div>
            </div>
          </article>
        </section>
       
        <section id="faq" data-type="background" data-speed="10" class="pages">
          <article class="panel" id="page3" style="height:auto; padding-top:3%; margin-top:-2%">
            <div>
              <h2 style="text-align:center; font-weight:bold; font-size:60px; color:#e47911">FAQs</a></h2>
              <p style="font-weight:bold; color:black; padding-left:2%"> Should I register to search jobs? </p>
				
				<p style="font-weight:italic; color:black; padding-left:2%"> No. You can go to the search page and from there you can search all kinds of jobs and specifically related your skills also.
					But to show interest in the job you need to register as a seeker.</p>
			<p style="font-weight:bold; color:black; padding-left:2%"> Does JanRozgar will assure us a job as a seeker? </p>
				
				<p style="font-weight:italic; color:black; padding-left:2%"> No. We just provide you an interface to connect with millions of providers out there with an ease by filling bunch
					of fields in your profile.</p>
			<p style="font-weight:bold; color:black; padding-left:2%"> Does a Volunteer will play a role in getting job? </p>
				
				<p style="font-weight:italic; color:black; padding-left:2%"> No. With our first protocol, the Volunteer has just got to register seekers who are unable to access internet.</p>
			<p style="font-weight:bold; color:black; padding-left:2%"> Do the provider need to contact for seekers? </p>
				
				<p style="font-weight:italic; color:black; padding-left:2%"> Technically No, the provider when he/she posts the job with the required skills
				the corresponding skill matched seekers will be notified with the job details. As the seekers show interest, then the provider will be notified the same with the details of seekers</p>
			<p style="font-weight:bold; color:black; padding-left:2%"> Do the providers need to contact JanRozgar admin people for hiring seekers?</p>
				
				<p style="font-weight:italic; color:black; padding-left:2%"> No, there is nothing to do with the admin the process is totally transparent.</p>
			<p style="font-weight:bold; color:black; padding-left:2%"> Do the volunteers need to endorse the seekers for getting job?</p>
				
				<p style="font-weight:italic; color:black; padding-left:2%"> No, the role of volunteer is pretty clear that he will just register the seekers
				who were not able to register. Neither volunteer endorse nor provider will be interested in knowing about the volunteer.</p>
				<p style="font-weight:bold; color:black; padding-left:2%"> Do the volunteers need to endorse the seekers for getting job?</p>
				
				<p style="font-weight:italic; color:black; padding-left:2%"> No, the role of volunteer is pretty clear that he will just register the seekers
				who were not able to register. Neither volunteer endorse nor provider will be interested in knowing about the volunteer.</p>
			<br/>
			<br/>
            </div>
          </article>
        </section>
       
		<section id="about" data-type="background" data-speed="10" class="pages">
          <article class="panel" id="page4" style="height:auto; padding-top:3%; margin-top:-2%">
            <div>
              <h2 style="color:#ffffff; font-size:60px; font-weight:bold; text-align:center">About Us</a></h2>
              <hr>
              <font>
              <p style="font-size:20px"> 
			  &nbsp;You often heard stories how philanthropists come together to support or work hand in hand for a social cause. 
					Not us. We as a bunch of ICT engineers have tried to use technology as a fruitful component to come forward 
					and to create a platform for those who are in need for a job solely for the unorganized sector.We plan to 
					achieve this by bridging the gap between job providers and the seeker. It has been far too much time since this
					gap has been persistent and we think through this it can be eradicated. This portal not only gives opportunity 
					to those who are looking for a job but also to those people who want to get rid of their sickening problem of 
					hiring people by their own. </p>
					
					<div align="center">
					<img src="./public/images/sen4.jpg" width="600" height="345">
					</div>	
				
				</div>
			  </article>
        </section>

        <section id="contactus" data-type="background" data-speed="10" class="pages">
          <article class="panel" id="page5" style="height:auto; padding-top:3%; margin-top:-2%">
            <div>
              <h2 style="text-align:center; font-weight:bold; font-size:60px; color:#ffffff">Contact Us</a></h2>
              <hr>
              <font>
              <p style="text-align:center; font-size:22px;"> &nbsp;We are always ready to help and open to suggestions and feedback</p>
                <p style="text-align:center; font-size:22px;">&nbsp;You can drop us a mail and we will contact you at <a href="mailto:contactus@janrozgar.in?Subject=Your%20Subject%20Line%20Here" target="_top">contactus@janrozgar.in</a></p>
                <br>
                <br>                  
              <br/>
              <p style="text-align:center; font:14pt Garamond, Georgia, serif; font-style:italic;"><i>&nbsp;<b>"Give a man a fish, and you feed him for a day; show him how to catch fish, and you feed him for a lifetime."</b></i> </p>
              <br/>
              <p style="text-align:center; font-size:22px; font-weight:bold">Thanks for your inputs:
              <br>
              <br>
              <div align="center">
              <img style="margin: 0 5px 0 0"  src="./public/images/sewa.gif" title="SEWA" alt="SEWA">
              <img style="margin: 0 5px 0 0"  src="./public/images/cii.jpg" title="CII" alt="CII" >
              <img style="margin: 0 5px 0 0"  src="./public/images/glpc.png" title="GLPC" alt="GLPC">
              <img style="margin: 0 5px 0 0"  src="./public/images/koffee.jpg" title="Ken's Koffee++" alt="Ken's Koffee++" >
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
            </div>       
        </div>    
            </div>
          </article>
        </section>


    </body>

    <script type="text/javascript">
      $(function(){
        $('a[href*=#]:not([href=#])').click(function(){
            if(location.pathname.replace(/^\//,'')==this.pathname.replace(/^\//,'')&&location.hostname == this.hostname){
                var target = $(this.hash);
                target = target.length ? target: $('[name=' + this.hash.slice(1)+']');
                if(target.length){
                    $('html, body').animate({
                        scrollTop:target.offset().top
                    },500);
                    return false;
                  }
                }
              });
            });
    </script> 
</html>
