<?php

/**
 * The Job edit page controller
 * Class JobEditPageController
 */
class JobEditPageController extends PageController {

    /**
     * The main process method for the controller
     * @return mixed|void
     */
    protected function process() {

        require_once 'libs/Auth.php';

        require_once 'models/User.php';
        $userId = Auth::userId();
        $user = new User($userId);

        $this->setVar('username', $user->username());

        $jobId = $this->param();

        require_once 'models/Job.php';
        $job = new Job($jobId);

        if($job->postedById() != $userId) {
            $this->app()->response->redirect("/permission.denied");
        }

        $skillString = "";

        foreach($job->skills() as $skill) {
            $skillString .= $skill . ",";
        }

        $this->setVar('jobTitle', $job->title());
        $this->setVar('jobDescription', $job->description());
        $this->setVar('skills', $skillString);
        $this->setVar('positions', $job->positions());
        $this->setVar('location', $job->location());
        $this->setVar('type', $job->type());
        $this->setVar('startDate', $job->startTime());

        if($job->type() == 'temporary') {
            require_once 'models/TemporaryJob.php';
            $job = new TemporaryJob($jobId);
            $this->setVar('duration', $job->duration());
        } else {
            $this->setVar('duration', '');
        }

        $this->setVar('errMsg', '');
    }

}