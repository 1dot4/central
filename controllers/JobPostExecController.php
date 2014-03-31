<?php

/**
 * The Job post exec controller
 * Class JobPostExecController
 */
class JobPostExecController extends ExecController {

    public function process() {

        require_once 'libs/Auth.php';

        $jobPoster = Auth::userId();

        $jobTitle = $this->app()->request->post("title");
        $jobDescription = $this->app()->request->post("description");
        $jobSkills = $this->app()->request->post("skills");

        $jobPositions = $this->app()->request->post("positions");
        $jobLocation = $this->app()->request->post("location");
        $jobType = $this->app()->request->post("type");
        $jobStart = $this->app()->request->post("start");

        if($jobType == 'temporary') {
            $jobDuration = $this->app()->request->post("duration");
        }

        $skills = explode(",", $jobSkills);

        require_once 'models/Job.php';

        switch($jobType) {

            case 'temporary':

                require_once 'models/TemporaryJob.php';

                TemporaryJob::newJob($jobTitle, $jobDescription, $jobPoster, $jobPositions, $jobStart, $jobLocation, $jobDuration, $skills);

                break;

            case 'permanent':

                require_once 'models/PermanentJob.php';

                PermanentJob::newJob($jobTitle, $jobDescription, $jobPoster, $jobPositions, $jobStart, $jobLocation, $skills);

                break;
        }
    }
}