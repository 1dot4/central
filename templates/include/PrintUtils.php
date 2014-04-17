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
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="'.$dir.'/home/index"><span class="glyphicon glyphicon-home"></span>&nbsp&nbspHome</a></li>
                        <li><a href="'.$dir.'/myprofile"><span class="glyphicon glyphicon-user"></span>&nbsp&nbsp'.$username.'</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-cog"></span>&nbsp&nbsp
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span>&nbsp&nbspHelp</a></li>
                                <li class="divider"></li>
                                <li><a href="'.$dir.'/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp&nbspLogout</a></li>
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

    $res = "Registered <a href='../profile/". $name ."'>" . $name . "</a> on " . $joinDate;

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
    echo "<span class='glyphicon glyphicon-globe'></span>&nbsp&nbspPosted by <b>" . linkedName($jobInstance->postedById()) . "</b> on <b>" . $jobInstance->postDate();
    echo "</b>";
    echo "</div>";
    echo "</div><hr><span class='glyphicon glyphicon-bookmark'></span>&nbsp&nbsp";
    echo $jobInstance->description();
    echo "<br><br>";
    echo "<span class='glyphicon glyphicon-tags'></span>&nbsp&nbspSkills required: ";
    foreach($skills as $skill) {
        echo "<a href='javascript:void(0);' class='btn btn-default btn-xs'>" . $skill . "</a> ";
    }
    echo "<br><br>";
    echo "<span class='glyphicon glyphicon-map-marker'></span>&nbsp&nbspLocation of job in <a href='javascript:void(0);'><b>" . $jobInstance->location() . "</b></a>";
    echo ", starts on <b>" . $jobInstance->startTime() . "</b>";
    if($jobInstance->type() == 'temporary') {
        $jobInstance = new TemporaryJob($jobInstance->id());
        echo ", duration of job is <b>" . $jobInstance->duration() . "</b> days";
    }
    echo " with <b>" . $jobInstance->positions() . "</b> vacancies";
    echo "<br><br>";

    echo "<span class='glyphicon glyphicon-user'></span>&nbsp&nbsp<a href='../job/" . $jobInstance->id() ."'>" . sizeof($jobInstance->interestedSeekers()) ." people</a> have expressed interest in this job.";
    echo "<br><br>";

    if($jobInstance->postedById() == $userId) {
        echo '<a id="job-status-' . $jobInstance->id() . '" href="javascript:void(0);" class="btn btn-default btn-xs" onclick="toggleStatus(' . $jobInstance->id() . ')"><span class="glyphicon glyphicon-flag"></span>&nbsp&nbspstatus:'.$jobInstance->status().'</a>';
    } else {
        echo '<a href="javascript:void(0);" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-flag"></span>&nbsp&nbspstatus:'.$jobInstance->status().'</a>';
    }
    echo '&nbsp &nbsp';
    echo '<a href="javascript:void(0);" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-tag"></span>&nbsp&nbsptype:'.$jobInstance->type().'</a>';
    echo '&nbsp &nbsp';

    if($jobInstance->postedById() == $userId) {
        echo '<a href="../job.edit/' . $jobInstance->id() . '" class="btn btn-info btn-xs" id="edit-btn"><span class="glyphicon glyphicon-edit"></span>&nbsp&nbspEdit</a>';
        echo '&nbsp &nbsp';
        echo '<a href="javascript:void(0);" class="btn btn-danger btn-xs" id="del-btn" onclick="deleteJob('. $jobInstance->id() .')"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbspDelete</a>';
    }

    if($userInstance->type() != "provider" && $userInstance->type() != "volunteer") {
        if($jobInstance->hasUserInterest($userId)) {
            echo '<a id="express-interest-'. $jobInstance->id() .'" href="javascript:void(0);" class="btn btn-warning btn-xs express-interest" onclick="unExpressInterest('. $jobInstance->id() .')"><span class="glyphicon glyphicon-check"></span>&nbsp&nbspInterest expressed !</a>';
        } else {
            echo '<a id="express-interest-' . $jobInstance->id() . '" href="javascript:void(0);" class="btn btn-info btn-xs express-interest" onclick="expressInterest('. $jobInstance->id() .')"><span class="glyphicon glyphicon-send"></span>&nbsp&nbspExpress Interest !</a>';
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

function printProviderNavigationBar($userId) {
    echo '<div class="col-md-2">
            <a href="index"><span class="glyphicon glyphicon-th-list"></span>&nbsp&nbspJob postings by me</a>
            <hr>
            <a href="notifications"><span class="glyphicon glyphicon-bullhorn"></span>&nbsp&nbsp';

    printNotificationsLink($userId);

    echo '</a>
            <hr>
            <a href="post"><span class="glyphicon glyphicon-pencil"></span>&nbsp&nbspNew job posting</a>
            <hr>
            <a href="favorites"><span class="glyphicon glyphicon-star-empty"></span>&nbsp&nbspMy Favourites</a>
            <hr>
            <a href="stats"><span class="glyphicon glyphicon-stats"></span>&nbsp&nbsp Stats</a>
          </div>';
}

function printSeekerNavigationBar($userId) {
    echo '<div class="col-md-2">
            <a href="index"><span class="glyphicon glyphicon-inbox"></span>&nbsp&nbspRelevant Jobs</a>
            <hr>
            <a href="notifications"><span class="glyphicon glyphicon-bullhorn"></span>&nbsp&nbsp';
    printNotificationsLink($userId);
    echo '</a>
            <hr>
            <a href="advanced-search"><span class="glyphicon glyphicon-search"></span>&nbsp&nbspSearch all jobs</a>
            <hr>
            <a href="favorites"><span class="glyphicon glyphicon-star-empty"></span>&nbsp&nbspMy Favourites</a>
            <hr>
            <a href="stats"><span class="glyphicon glyphicon-stats"></span>&nbsp&nbspStats </a>
         </div>';
}

function printVolunteerNavigationBar($userId){
    echo '<div class="col-md-2">
            <a href="index"><span class="glyphicon glyphicon-stats"></span>&nbsp&nbspLatest stats</a>
            <hr>
            <a href="notifications"><span class="glyphicon glyphicon-bullhorn"></span>&nbsp&nbsp';
    printNotificationsLink($userId);
    echo '</a>
            <hr>
            <a href="register"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspRegister Job Seeker</a>
            <hr>
            <a href="favorites"><span class="glyphicon glyphicon-star-empty"></span>&nbsp&nbspMy Favourites</a>
            <hr>
            <a href="history"><span class="glyphicon glyphicon-folder-open"></span>&nbsp&nbspHistory</a>
            <hr>
          </div>';
}

function printUser($userId) {
    require_once 'models/User.php';
    $user = new User($userId);

    require_once 'libs/Auth.php';
    $currentUserId = Auth::userId();
    $currentUser = new User($currentUserId);
    $favorited = $currentUser->hasFavorited($userId);

    $typeText = "";

    if($user->type() == "provider") {
        $typeText = "Job Provider";
    }
    if($user->type() == "seeker") {
        $typeText = "Job Seeker";
    }
    if($user->type() == "volunteer") {
        $typeText = "Volunteer";
    }

    echo "<div class='well'>";
    echo "<div class='row'>";
    echo "<div class='col-md-4'>";
    echo "<div class='dp-box'>";
    echo "<div class='dp-container'>";
    echo "<img class='dp' src='../public/images/default_profile.png'>";
    echo "</div>";
    echo "</div>";
    echo "<h4 id='type'><b>" . $typeText . "</b></h4>";
    echo "</div>";
    echo "<div class='col-md-7'>";
    echo "<h3>";
    echo "<a href='../profile/" . $user->username() . "'>";
    echo $user->username();
    echo "</a>";

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

    echo "</h3>";

    echo "<i><span class='glyphicon glyphicon-star'></span>&nbsp&nbspFavourited by <a href='../favorited/" . $userId . "'>" . sizeof($user->favoritedBy()) . " people</a></i>";
    echo "<hr>";

    if($user->fullName() != "") {
        echo '<h5><span class="glyphicon glyphicon-user"></span>&nbsp&nbsp<b>' . $user->fullName() . '</b></h5>';
    }

    if($user->type() == "volunteer" || $user->type() == "provider") {

        if($user->type() == "volunteer") {
            require_once 'models/Volunteer.php';
            $user = new Volunteer($userId);
        }

        if($user->type() == "provider") {
            require_once 'models/Provider.php';
            $user = new Provider($userId);
        }

        if($user->email() != "") {
            echo '<h5><span class="glyphicon glyphicon-envelope"></span>&nbsp&nbsp<a>' . $user->email() . '</a></h5>';
        }

        if($user->organization() != "") {
            echo '<h5><span class="glyphicon glyphicon-briefcase"></span>&nbsp&nbspWorks at <a>' . $user->organization() . '</a></h5>';
        }

        if($user->designation() != "") {
            echo '<h5><span class="glyphicon glyphicon-leaf"></span>&nbsp&nbspIs a <a>' . $user->designation() . '</a></h5>';
        }

        if($user->location() != "") {
            echo '<h5><span class="glyphicon glyphicon-map-marker"></span>&nbsp&nbspLocated at <a>' . $user->location() . '</a></h5>';
        }
    }

    if($user->type() == "seeker") {
        require_once 'models/Seeker.php';
        $user  = new Seeker($userId);

        if($user->experience() != "") {
            echo '<h5><span class="glyphicon glyphicon-eye-open"></span>&nbsp&nbspHas an experience of ' . $user->experience() . ' years</h5>';
        }

        if($user->currentLocation() != "") {
            echo '<h5><span class="glyphicon glyphicon-map-marker"></span>&nbsp&nbspCurrently located at <a>' . $user->currentLocation() .' </a></h5>';
        }

        if($user->preferredLocation() != "") {
            echo '<h5><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp&nbspWould prefer <a>' . $user->preferredLocation() .'</a> as job location</h5>';
        }

        if($user->phone() != "") {
            echo "<h5><span class='glyphicon glyphicon-phone'></span>&nbsp&nbspMobile Number is " . $user->phone() . "</h5>";
        }
    }

    echo "</div>";
    echo "</div>";
    echo "</div>";
}

function printUsers($userIds) {
    foreach($userIds as $userId) {
        printUser($userId);
        echo "<hr>";
    }
}