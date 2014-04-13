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

function printJob($job, $userId) {

    require_once 'models/Job.php';
    require_once 'models/TemporaryJob.php';
    require_once 'models/PermanentJob.php';
    require_once 'models/User.php';

    $jobInstance = new Job($job["id"]);
    $userInstance = new User($userId);

    $skills = $jobInstance->skills();

    echo "<div class='well' id='job-". $jobInstance->id() ."'>";
    echo "<div class='row'>";
    echo "<div class='col-md-3'>";

    echo "<div class='dp-box'>";
    echo '<div class="dp-container">';
    echo "<img class='dp' src='../public/images/tap_water.png'/>";
    echo "</div></div></div>'";

    echo "<div class='col-md-7'>";
    echo "<a href='../job/" . $jobInstance->id(). "'>";
    echo "<b><h4><u>";
    echo $jobInstance->title();
    echo "</u></b><br></h4>";
    echo "</a>";
    echo "Posted by <b>" . linkedName($jobInstance->postedById()) . "</b> on <b>" . $jobInstance->postDate();
    echo "</b>";
    echo "</div>";
    echo "</div><hr>";
    echo $jobInstance->description();
    echo "<br><br>";
    echo "Skills required: ";
    foreach($skills as $skill) {
        echo "<a href='javascript:void(0);' class='btn btn-default btn-xs'>" . $skill . "</a> ";
    }
    echo "<br><br>";
    echo "Location of job in <a href='javascript:void(0);'><b>" . $jobInstance->location() . "</b></a>";
    echo ", starts on <b>" . $jobInstance->startTime() . "</b>";
    if($jobInstance->type() == 'temporary') {
        $jobInstance = new TemporaryJob($jobInstance->id());
        echo ", duration of job is <b>" . $jobInstance->duration() . "</b> days";
    }
    echo " with <b>" . $jobInstance->positions() . "</b> vacancies";
    echo "<br><br>";

    if($jobInstance->postedById() == $userId) {
        echo '<a id="job-status-' . $jobInstance->id() . '" href="javascript:void(0);" class="btn btn-default btn-xs" onclick="toggleStatus(' . $jobInstance->id() . ')">status:'.$jobInstance->status().'</a>';
    } else {
        echo '<a href="javascript:void(0);" class="btn btn-default btn-xs">status:'.$jobInstance->status().'</a>';
    }
    echo '&nbsp &nbsp';
    echo '<a href="javascript:void(0);" class="btn btn-default btn-xs">type:'.$jobInstance->type().'</a>';
    echo '&nbsp &nbsp';

    if($jobInstance->postedById() == $userId) {
        echo '<a href="../job.edit/' . $jobInstance->id() . '" class="btn btn-info btn-xs" id="edit-btn">Edit</a>';
        echo '&nbsp &nbsp';
        echo '<a href="javascript:void(0);" class="btn btn-danger btn-xs" id="del-btn" onclick="deleteJob('. $jobInstance->id() .')">Delete</a>';
    }

    if($userInstance->type() != "provider" && $userInstance->type() != "volunteer") {
        if($jobInstance->hasUserInterest($userId)) {
            echo '<a href="javascript:void(0);" class="btn btn-warning btn-xs express-interest" onclick="unExpressInterest('. $jobInstance->id() .')">Interest expressed !</a>';
        } else {
            echo '<a href="javascript:void(0);" class="btn btn-info btn-xs express-interest" onclick="expressInterest('. $jobInstance->id() .')">Express Interest !</a>';
        }
    }
    echo '</div>';
}

function printJobs($jobs, $userId) {
    require_once 'models/TemporaryJob.php';
    foreach($jobs as $job) {
        printJob($job, $userId);
        echo '<hr>';
    }
}

function printNotifications($notifications) {

    echo "<table class='table'>";
    foreach($notifications as $notification) {
        if($notification["seen"] == 'false') {
            echo "<tr class='success'><td>" . $notification["description"] . "</td><td style='color:#cccccc'>" . $notification["time"] . "</td></tr>";
            require_once 'models/Notification.php';
            $n = new Notification($notification["id"]);
            $n->setSeen('true');
        } else {
            echo "<tr><td>" . $notification["description"] . "</td><td style='color:#cccccc'>" . $notification["time"] . "</td></tr>";
        }
    }
    echo "</table>";
}

function printNotificationsLink($userId) {
    require_once 'models/User.php';
    $user = new User($userId);

    $unread = 0;

    $notifications = $user->notifications();

    foreach($notifications as $notification) {
        if($notification["seen"] == 'false') {
            $unread += 1;
        }
    }

    if($unread > 0) {
        echo "<b>Notifications(" . $unread .")</b>";
    } else {
        echo "Notifications";
    }
}