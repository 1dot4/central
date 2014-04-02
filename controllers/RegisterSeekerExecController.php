<?php

/**
 * Register Seeker Execution controller
 * Class RegisterSeekerExecController
 */
class RegisterSeekerExecController extends ExecController {

    private function validateRegistration($username, $phone, $password, $cpassword) {
        $error = false;
        $errMsg = "";

        // Check for username uniqueness
        require_once 'models/User.php';

        if(User::usernameExists($username)) {
            $err = true;
            $errMsg .= "The username is already taken.<br>";
        }


        if($username == "") {
            $error = true;
            $errMsg .= "Username is required<br>";
        }

        if($phone == "") {
            $error = true;
            $errMsg .= "Phone number is required<br>";
        }

        if (!(is_numeric($phone))) {
            $error = true;
            $errMsg .= "Invalid Phone Number<br>";   
        }

        if(strlen($phone) != 10) {
            $error = true;
            $errMsg .= "Invalid Phone Number<br>";
        }

        if($password == "") {
            $error = true;
            $errMsg .= "Minimum length of password must be 6 <br>";
        }


        if(strlen($password) < 7) {
            $error = true;
            $errMsg .= "Minimum length of password must be 6 <br>";
        }

        if($password != $cpassword) {
            $error = true;
            $errMsg .= "Passwords do not match<br>";
        }

        if($error) {
            require_once 'libs/Session.php';
            Session::start();
            Session::setVar("ERR_MSG", $errMsg);
            Session::close();
        }

        return !$error;
    }

    /**
     * Main process method for controller
     * @return mixed|void
     */
    protected function process() {
        $username = $this->app()->request->post("username");
        $fullName = $this->app()->request->post("fullname");
        $phone = $this->app()->request->post("phone");
        $password = $this->app()->request->post("password");
        $cpassword = $this->app()->request->post("cpassword");
        $currentLocation = $this->app()->request->post("curr-location");
        $preferredLocation = $this->app()->request->post("pref-location");
        $experience = $this->app()->request->post("experience");
        $skills = $this->app()->request->post("skills");

        $skillSet = explode(',', $skills);

        // Validation stuff
        if(!($this->validateRegistration($username, $phone, $password, $cpassword))) {
            $this->setRedirectUri("home");
        }

        require_once 'libs/Auth.php';
        $volunteerId = Auth::userId();

        require_once 'models/Volunteer.php';
        
        $volunteer = new Volunteer($volunteerId);
        $volunteer->registerSeeker($username, $fullName, $phone, $password, $currentLocation, $preferredLocation, $experience, $skillSet);
    }
}