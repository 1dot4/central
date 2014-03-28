<?php

/**
 * The Job post exec controller
 * Class JobPostExecController
 */
class JobPostExecController extends ExecController {

    public function process() {
        $jobDescription = $this->app()->request->post("job-description");

        require_once 'libs/Auth.php';

        $jobPoster = Auth::userId();

        require_once 'models/Job.php';

        Job::newJob($jobDescription, $jobPoster);
    }
}