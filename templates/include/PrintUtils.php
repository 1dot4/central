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
                    <a class="navbar-brand" href="'.$dir.'/">janrozgaar.in</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="'.$dir.'/home">Home</a></li>
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
    return "<a href='profile/" . $username . "'>" . $username . "</a>";
}