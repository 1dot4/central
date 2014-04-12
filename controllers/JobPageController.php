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

        $jobId = $this->param();

        $job = new Job($jobId);

        $skills = $job->skills();

        $skillString = "";
        foreach($skills as $skill) {
            $skillString .= $skill . " ";
        }
        $jobArray = Array(
            'id' => $job->id(),
            'title' => $job->title(),
            'description' => $job->description(),
            'post_date' => $job->postDate(),
            'posted_by_id' => $job->postedById(),
            'position' => $job->positions(),
            'start_time' => $job->startTime(),
            'location_name' => $job->location(),
            'skills' => $skillString,
            'status' => $job->status()
        );

        $this->setVar('job', $jobArray);
    }

}