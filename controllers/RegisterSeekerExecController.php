<?php

/**
 * Register Seeker Execution controller
 * Class RegisterSeekerExecController
 */
class RegisterSeekerExecController extends ExecController {

    private function validateRegistration($username, $phone, $password, $cpassword,$currentLocation,$preferredLocation,$skills,$experience) {
        $error = false;
        $errMsg = "";
		$t=0;
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

        if(strlen($phone) != 10 || !is_numeric($phone)) {
            $error = true;
            $errMsg .= "Invalid PhoneNumber<br>";
        }
		
		if (!preg_match("/^[a-zA-Z ]*$/",$currentLocation))
		{
		$error=true;
		$errMsg .= "In location Only letters are allowed.<br>"; 
		$t=1;
		}
		
		if (!preg_match("/^[a-zA-Z ]*$/",$preferredLocation))
		{
		$error=true;
		if($t==0)
			$errMsg .= "In location Only letters are allowed.<br>"; 
		}
		
		
		
		if(strlen($password)< 6) {
			$error = true;
            $errMsg .= "Password of minimum 6 characters is required.<br>";
        }

        if($password != $cpassword) {
            $error = true;
            $errMsg .= "Passwords do not match.<br>";
        }

		if(!preg_match("/^[0-9]*$/",$experience))
		{
			$error = true;
            $errMsg .= "Experience must be integer.<br>";
    	
		}
		
		if (!preg_match("/^[a-zA-Z ]*$/",$skills))
		{
		$error=true;
		$errMsg .= "In skills Only letters are allowed.<br>"; 
		}
		
        if($error) {
            require_once 'libs/Session.php';
            Session::start();
            Session::setVar('ERR_MSG', $errMsg);
            Session::close();
			$this->setRedirectUri('./home/register');
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
        if(!($this->validateRegistration($username, $phone, $password, $cpassword,$currentLocation,$preferredLocation,$skills,$experience))) {
            $this->setRedirectUri("home");
        }

        require_once 'libs/Auth.php';
        $volunteerId = Auth::userId();

        require_once 'models/Volunteer.php';
        
        $volunteer = new Volunteer($volunteerId);
        $volunteer->registerSeeker($username, $fullName, $phone, $password, $currentLocation, $preferredLocation, $experience, $skillSet);
    }
}