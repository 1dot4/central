<!DOCTYPE html>
<html>
<head>
    <title>
        Home
    </title>
    <?php require_once 'include/CssLevel2.php' ?>
    <style>
			.container {
				margin-top: 90px;
			}
			.form-inline input[type="email"],
			.form-inline input[type="password"],
			.form-inline input[type="text"]
			{
				font-size: 16px;
				height: auto;
			}
			#text1{
				width: 350px;
			}

			textarea {
				font-size: 16px;
				min-width: 350px;
				min-height: 150px;
			}
			.bootstrap-tagsinput {
					width: 70%;
			}
            .bootstrap-tagsinput {

                display: inline-block;
                margin-bottom: 10px;
                color: rgb(85, 85, 85);
                vertical-align: middle;
                border-radius: 4px;
                max-width: 100%;
                line-height: 22px;
            }
            .bootstrap-tagsinput .tag {
                margin-right: 2px;
                color: white;
            }
            .label-info {
                background-color: rgb(91, 192, 222);
            }
            .label {
                display: inline;
                padding: 0.2em 0.6em 0.3em;
                font-size: 75%;
                font-weight: bold;
                line-height: 1;
                color: rgb(255, 255, 255);
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0.25em;
            }
            *, *:before, *:after {
                -moz-box-sizing: border-box;
            }
            .bootstrap-tagsinput .tag [data-role="remove"]:after {
                content: "x";
                padding: 0px 2px;
            }
            .bootstrap-tagsinput .tag [data-role="remove"] {
                margin-left: 8px;
                cursor: pointer;
            }
            *, *:before, *:after {
                -moz-box-sizing: border-box;
            }
            *, *:before, *:after {
                -moz-box-sizing: border-box;
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
<div class="container">
    <?php
    require_once 'include/PrintUtils.php';
    printNavBar('home', $username, 2)
    ?>
    <div class="row">
        <div class="col-md-2">
            <a href="index">Job postings by me</a>
            <hr>
            <a href="notifications">Notifications</a>
            <hr>
            <a href="post">New job posting</a>
        </div>
        <div class="col-md-8">
            <h1>Post a new job</h1>
            <hr>
            <form class="form-inline" action="../job.post" method="post">
            <?php
            if($errMsg != "") {
                echo "<div class='form-error'>$errMsg</div>";
            }
            ?>
            <br>
                <div class="form-group">
                    <input name="title" id="text1" type="text" class="form-control" placeholder="Job title" value="<?php echo $jobTitle; ?>">
                </div>
                <br><br>
                <div class="form-group">
                    <textarea name="description" class="form-control" placeholder="Job description"><?php echo $jobDescription; ?></textarea>
                </div>
                <br><br>
                <div class="form-group">
					<label>Skills required:</label>
					<br>
					<div class="bootstrap-tagsinput">
						<input name="skills" id="text2" type="text" data-role="tagsinput" value="">
					</div>
				</div>
                <br>
                <div class="form-group">
                    <input name="positions" class="form-control" id="text1" type="text" placeholder="Number of vacancies">
                </div>
                <br><br>
                <div class="form-group">
                    <input type="text" name="location" class="form-control" id="text1" placeholder="Location of job" value="<?php echo $location ?>">
                </div>
                <br><br>
                <div class="form-group">
                    <label>Type of job:</label>&nbsp&nbsp
                    <input id="temporary" type="radio" name="type" value="temporary" checked >&nbspTemporary&nbsp&nbsp
                    <input id="permanent" type="radio" name="type" value="permanent">&nbspPermanent
                </div>
                <br><br>
                <div class="form-group">
                    <label>Start date: </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input name="start" id="start-date" class="form-control" type="date">
                </div>
            <!--     <br><br> -->                           
                <div id="durationInput">                
                </div>                

                <div id="postjob">
                </div>
             <script type="text/javascript">   document.getElementById('durationInput').innerHTML = "<br><div class='form-group'><input name='duration' class='form-control' type='text' placeholder='Duration of job(in days)'></div>";                      
             document.getElementById('postjob').innerHTML = "<div class='form-group'><br><input id='postjob' type='submit' class='btn btn-primary' value='Post Job'></div>";
             </script>               
            </form>
        </div>
    </div>
</div>
<?php require_once 'include/ScriptsLevel2.php' ?>
<script type="text/javascript">
function myFunction()
{document.getElementById('durationInput').innerHTML = "<br><div class='form-group'><input name='duration' class='form-control' type='text' placeholder='Duration of job(in days)'></div>";                      
 document.getElementById('postjob').innerHTML = "<div class='form-group'><br><input id='postjob' type='submit' class='btn btn-primary' value='Post Job'></div>";
}
</script>

<script>
    var permanent = false;
    $("#temporary, #permanent").change(function() {
        if(!permanent) {
            $("#durationInput").fadeOut();
            document.getElementById('postjob').innerHTML = "<div class='form-group'><br><input id='postjob' type='submit' class='btn btn-primary' value='Post Job'>";          
        } else {
            $("#durationInput").fadeIn();
            myFunction(); 
        }
        permanent = !permanent;
        var now = new Date();
        $("#start-date").change(function() {
            if ($("#start-date").val() < now) {
                // selected date is in the past
                alert("Start cannot start in past");
            }
        })
        
    });
</script>
</body>
<script src="../public/tagsinput/js/bootstrap-tagsinput.js"></script>
<script src="../public/tagsinput/js/typeahead.min.js"></script>
</html>