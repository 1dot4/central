<?php

function printNavBar($page, $username, $level = 1) {

    if($level == 1) {
        $dir = ".";
    } elseif($level == 2) {
        $dir = "..";
    }

    echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="'.$dir.'/">JanRozgar</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="'.$dir.'/home/index">Home</a></li>
                        <li><a href="'.$dir.'/myprofile">'.$username.'</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Help</a></li>
                                <li class="divider"></li>
                                <li><a href="'.$dir.'/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>';
}


function linkedName($id) {
    require_once 'models/User.php';
    $user = new User($id);
    $username = $user->username();
    return "<a href='../profile/" . $username . "'>" . $username . "</a>";
}

function seekerRegistrationDetails($seeker) {
    require_once 'models/User.php';
    require_once 'models/Seeker.php';

    $seeker = new Seeker($seeker);

    $joinDate = $seeker->joinDate();
    $name = $seeker->username();

    $res = "Registered <a href='../profile/". $name ."'>" . $name . "</a> on " . $joinDate . "<hr>";

    return $res;
}

function printJobs($jobs) {
    require_once 'models/TemporaryJob.php';
    foreach($jobs as $job) {

        $skills = explode(" ", $job["skills"]);
        array_pop($skills);
        $jobInstance = new Job($job["id"]);
        echo "<div class='well'>";
        echo "<div class='row'>";
        echo "<div class='col-md-3'>";
        echo "<div class='dp-box'>";
        echo '<div class="dp-container">';
        echo "<img class='dp' src='../public/images/tap_water.png'/>";
        echo "</div></div></div>'";
        echo "<div class='col-md-7'>";
        echo "<b><h4><u>";
        echo $job["title"];
        echo "</u></b><br></h4>";
        echo "Posted by <b>" . linkedName($job["posted_by_id"]) . "</b> on <b>" . $job["post_date"];
        echo "</b>";
        echo "</div>";
        echo "</div><hr>";
        echo $job["description"];
        echo "<br><br>";
        echo "Skills required: ";
        foreach($skills as $skill) {
            echo "<a class='btn btn-default btn-xs' href='#'>" . $skill . "</a>";
        }
        echo "<br><br>";
        echo "Location of job in <a href='#'><b>" . $job["location_name"] . "</b></a>";
        echo ", starts on <b>" . $job["start_time"] . "</b>";
        if($jobInstance->type() == 'temporary') {
            $jobInstance = new TemporaryJob($job["id"]);
            echo ", duration of job is <b>" . $jobInstance->duration() . "</b> days";
        }
        echo " with <b>" . $job["positions"] . "</b> vacancies";
        echo "<br><br>";
        echo '<a href="#" class="btn btn-default btn-xs">status:'.$job['status'].'</a>';
        echo '&nbsp &nbsp';
        echo '<a href="#" class="btn btn-default btn-xs">type:'.$jobInstance->type().'</a>';
        echo '<a href="#" class="btn btn-info btn-xs" id="edit-btn">Edit</a>';
        echo '&nbsp &nbsp';
        echo '<a href="#" class="btn btn-danger btn-xs" id="del-btn">Delete</a>';
        echo '&nbsp &nbsp';
        echo "</div>";
        echo "<hr>";
    }
}

function seekerPrintJobs($jobs) {
    require_once 'models/TemporaryJob.php';
    foreach ($jobs as $job) {
        $skills = explode(" ", $job["skills"]);
        array_pop($skills);

        $jobInstance = new Job($job["id"]);
        echo "<div class='well'>";
        echo "<div class='row'>";
        echo "<div class='col-md-3'>";
        echo "<div class='dp-box'>";
        echo '<div class="dp-container">';
        echo "<img class='dp' src='../public/images/tap_water.png'/>";
        echo "</div></div></div>'";
        echo "<div class='col-md-7'>";
        echo "<b><h4><u>";
        echo $job["title"];
        echo "</u></b><br></h4>";
        echo "Posted by <b>" . linkedName($job["posted_by_id"]) . "</b> on <b>" . $job["post_date"];
        echo "</b>";
        echo "</div>";
        echo "</div><hr>";
        echo $job["description"];
        echo "<br><br>";
        echo "Skills required: ";
        foreach($skills as $skill) {
            echo "<a class='btn btn-default btn-xs' href='#'>" . $skill . "</a>";
        }
        echo "<br><br>";
        echo "Location of job in <a href='#'><b>" . $job["location_name"] . "</b></a>";
        echo ", starts on <b>" . $job["start_time"] . "</b>";
        if($jobInstance->type() == 'temporary') {
            $jobInstance = new TemporaryJob($job["id"]);
            echo ", duration of job is <b>" . $jobInstance->duration() . "</b> days";
        }
        echo " with <b>" . $job["positions"] . "</b> vacancies";
        echo "<br><br>";
        echo '<a href="#" class="btn btn-default btn-xs">status:'.$job['status'].'</a>';
        echo '&nbsp &nbsp';
        echo '<a href="#" class="btn btn-default btn-xs">type:'.$jobInstance->type().'</a>';
        echo '</div>';
        echo '<hr>';
        /*echo "<b><h4>";
        echo $job["title"];
        echo "</b><br></h4>";
        echo $job["description"];
        echo "<br>";
        echo "Posted by " . linkedName($job["posted_by_id"]) . " on " . $job["post_date"];
        echo "<br><br>";
        echo "<hr>";*/
    }
}