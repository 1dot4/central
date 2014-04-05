<?php

/**
 * The Job post exec controller
 * Class JobPostExecController
 */
class JobPostExecController extends ExecController {

    private function validPost($jobTitle, $jobDescription, $jobSkills, $jobPositions, $jobLocation, $jobDuration, $jobStart, $jobType){
        $err = false;
        $errMsg = '';

        require_once 'models/Job.php';

        if($jobTitle == '' || $jobDescription == '' || $jobSkills == ''|| $jobLocation == ''|| $jobStart == '') {
            $err = true;
            $errMsg .= 'All the fields are required.<br>';
        }

        if(!is_numeric($jobPositions)) {
            $err = true;
            $errMsg .= 'Enter valid vacancies.<br>';
        }

        if($jobType == 'temporary') {
            if($jobDuration == '') {
                $err = true;
                $errMsg .= 'Duration is required.<br>';
            }
            else { 
                if(!is_numeric($jobDuration)) {
                $err = true;
                $errMsg .= 'Enter valid duration. <br>';
                }
            }
        }

        if($err) {
            require_once 'libs/Session.php';

            Session::start();
            Session::setVar('ERR_MSG', $errMsg);
            Session::setVar('TITLE', $jobTitle);
            Session::setVar('DESCRIPTION', $jobDescription);
            Session::close();
            $this->setRedirectUri('home/post');
        }

        return !$err;
    }
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
        else {
            $jobDuration = '';
        }

        $skills = explode(",", $jobSkills);

        if(!$this->validPost($jobTitle, $jobDescription, $jobSkills, $jobPositions, $jobLocation, $jobDuration, $jobStart, $jobType)) {
            return;
        }
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