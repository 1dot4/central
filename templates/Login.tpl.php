<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    margin: 150px 80px auto 20px;
                    /* background-color: #f2f2f2; */
                    border: 1px solid #e5e5e5;
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

            #page1 { 
                background: url(templates/images.jpg) 50% 0 repeat fixed; min-height: 1000px;
            }
 
            #page2 { 
                /*background-color: #1BA0E1;*/
                font-family: 'Lato', sans-serif; font-size: 1.17em;
                /*background: url(templates/purple.jpg) 50% 0 repeat; min-height: 1000px;  */
            }

            #page3{ 
                font-family: 'Lato', sans-serif; font-size: 1.17em;
                /*background: url(templates/black.jpg) 50% 0 repeat; min-height: 1000px;  */
            }

            #page4{ 
                font-family: 'Lato', sans-serif; font-size: 1.17em;
                /*background: url(templates/black.jpg) 50% 0 repeat; min-height: 1000px;  */
            }

            #page5{ 
                font-family: 'Lato', sans-serif; font-size: 1.17em;
                /*background: url(templates/black.jpg) 50% 0 repeat; min-height: 1000px;  */
            }
            #main .panel:nth-child(odd) {
            background: white;  /*here color was #2980B9 */
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
        <section id="home" data-type="background" data-speed="10" class="pages">
          <article class="panel" id="page1" style=" color:black; padding-top:1%; height:100%;">
            <iframe class="you" width="600" height="380" src="https://s3.amazonaws.com/embed.animoto.com/play.html?w=swf/production/vp1&e=1396031535&f=aiiWm46EZCjCHou12zeTgA&d=0&m=b&r=360p&volume=100&start_res=360p&i=m&asset_domain=s3-p.animoto.com&animoto_domain=animoto.com" frameborder="0" allowfullscreen></iframe>
          
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

        <section id="about" data-type="background" data-speed="10" class="pages">
          <article class="panel" id="page2" style="height:auto; padding-top:3%;">
            <div>
              <h2>About Us</a></h2>
              <hr>
              <font>
              <p class="lead"> &nbsp;Janrozgar.in is an online initiative working for reducing unemployment and increasing livelihood.</p>
                <p>&nbsp;We plan to achieve this by bridging the gap between job providers and seeker for unorganized sector.</p>
              <br/>
                  <p>&nbsp;Seekers face difficulty in finding appropriate jobs according to their skills and providers find difficulty in publicizing their job opportunities to get the best men at work.</p>
              <br/>
              <p class="lead">&nbsp;Janrozgar helps providers to publicize the jobs and seekers can know about the upcoming opportunities for jobs. </p>
              <br/>
              <br>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
            </div>
          </article>
        </section>


        <section id="faq" data-type="background" data-speed="10" class="pages">
          <article class="panel" id="page3" style="height:auto; padding-top:3%;">
            <div>
              <h2>FAQ ( Currently containing kuch bhi... )</a></h2>
              <hr>
              <p> Explore Career Opportunities at Gauri Ltd. Visit my HR blog Parinita.com
              <br />
                  Skills/Roles I hire for : SAP, SAP CRM, Both Technical and Functional Roles, Project Management
              <br />
              <br />
              <p class="lead">Lead - IT/BPO Business Development &amp;   Recruitments</p>
              <br />
              <p class="lead">Mass Hiring for BPO/KPO, Vendor Management, IT Industrial Trainings, business development, Direct Hiring, Collages Hiring</p>
              <br />
              <br />
              <p> Explore Career Opportunities at Gauri Ltd. Visit my HR blog Parinita.com
              <br />
                  Skills/Roles I hire for : SAP, SAP CRM, Both Technical and Functional Roles, Project Management
              <br />
              <br />
              <p class="lead">Lead - IT/BPO Business Development &amp;   Recruitments</p>
              <br />
              <p class="lead">Mass Hiring for BPO/KPO, Vendor Management, IT Industrial Trainings, business development, Direct Hiring, Collages Hiring</p>
              <br />
              <br />
              <p> Explore Career Opportunities at Gauri Ltd. Visit my HR blog Parinita.com
              <br />
                  Skills/Roles I hire for : SAP, SAP CRM, Both Technical and Functional Roles, Project Management
              <br />
              <br />
              <p class="lead">Lead - IT/BPO Business Development &amp;   Recruitments</p>
              <br />
              <p class="lead">Mass Hiring for BPO/KPO, Vendor Management, IT Industrial Trainings, business development, Direct Hiring, Collages Hiring</p>
              <br />
              <br />
              <br />
              </p>
              </font>
            </div>
          </article>
        </section>
        <section id="donate" data-type="background" data-speed="10" class="pages">
          <article class="panel" id="page4" style="height:auto; padding-top:3%;">
            <div>
              <h2>Help Us</a></h2>
              <hr>
              <font>
              <p class="lead"> &nbsp;How can you help us ??</p>
                <p>&nbsp;Unemployment is one of the biggest obstacle blocking progress of India.</p>
              <br/>
                  <p>&nbsp;As most of the unorganized sector's job seekers have less access and knowledge about internet, you can become a volunteer and help us in this venture.</p>                 
              <br/> 
              <p>&nbsp;Help us by registering any job seeker on our site and help them find a job.</p>                 
              <p class="lead">&nbsp;Janrozgar believes "Together We Can !" </p>
              <br/>
              <br>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
              <p> &nbsp;  Please put some more text here...It is looking too blank to be good.</p>
            </div>
          </article>
        </section>

        <section id="contactus" data-type="background" data-speed="10" class="pages">
          <article class="panel" id="page5" style="height:auto; padding-top:3%;">
            <div>
              <h2>Contact Us</a></h2>
              <hr>
              <font>
              <p class="lead"> &nbsp;We are always ready to help and open to suggestions and feedback</p>
                <p>&nbsp;You can drop us a mail and we will contact you at <a href="mailto:contactus@janrozgar.in?Subject=Your%20Subject%20Line%20Here" target="_top">contactus@janrozgar.in</a></p>
                <br>
                <br>                  
              <br/>
              <p class="lead"><i>&nbsp;<b>"Give a man a fish, and you feed him for a day; show him how to catch fish, and you feed him for a lifetime."</b></i> </p>
              <br/>
              <br>&nbsp;We are extremely thankful to :
              <br>
              <br>
              <br>
              <div class="pull-left">
              <img src="./public/images/sewa.gif" title="SEWA" alt="SEWA" style="padding-right:20px;">
              <img src="./public/images/cii.jpg" title="CII" alt="CII" style="padding-right:20px;">
              <img src="./public/images/glpc.png" title="GLPC" alt="GLPC"style="padding-right:20px;">
              <img src="./public/images/koffee.jpg" title="Ken's Koffee++" alt="Ken's Koffee++" style="padding-right:20px;">
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
