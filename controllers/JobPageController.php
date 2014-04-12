<?php

/**
 * The job viewer page Controller
 * Class JobPageController
 */
class JobPageController extends PageController {

    /**
     * The main process method of the controller
     * @return mixed|void
     */
    public function process() {

        require_once 'libs/Auth.php';
        $username = "";
        $userId = -1;

        if(Auth::isAuthorized()) {
            $userId = Auth::userId();
            require_once 'models/User.php';
            $user = new User($userId);
            $username = $user->username();
        }

        $this->setVar('username', $username);
        $this->setVar('userId', $userId);

        require_once 'models/Job.php';

        $jobId = $this->param();

        $job = new Job($jobId);

        $skills = $job->skills();

        $skillString = "";
        foreach($skills as $skill) {
            $skillString .= $skill . " ";
        }

        $jobArray = Array();

        $jobArray['id'] = $job->id();

        $this->setVar('jobArray', $jobArray);
    }

}