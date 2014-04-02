<?php

/**
 * The Verify page controller class
 * Class VerifyPageController
 */
class VerifyPageController extends PageController {

    /**
     * Validate the user registration
     * @param $username string The user name
     * @param $phone string The user phone number
     * @param $password string The user password
     * @param $cPassword string The confirmation of user password
     * @return bool Whether the registration is valid or not
     */
    private function validRegistration($username, $phone, $password, $cPassword) {
        $err = false;
        $errMsg = '';

        // Check for username uniqueness
        require_once 'models/User.php';

        if(User::usernameExists($username)) {
            $err = true;
            $errMsg .= "The username is already taken.<br>";
        }

        if($username == '' || $password == '' ||  $phone == '') {
            $err = true;
            $errMsg .= 'All the fields are required.<br>';
        }

        if(strlen($phone) != 10 || !is_numeric($phone)){
            $err = true;
            $errMsg .= 'Invalid Phone Number.<br>';
        }
		
		if(strlen($password)< 6) {
			$err = true;
            $errMsg .= "Password of minimum 6 characters is required.<br>";
        }
			
        if($password != $cPassword) {
            $err = true;
            $errMsg .= 'Passwords do not match.';
        }

        if($err) {
            require_once 'libs/Session.php';

            Session::start();
            Session::setVar('ERR_MSG', $errMsg);
            Session::close();

            $this->setRedirectUri('register');
        }

        return !$err;
    }

    /**
     * Main action process of controller
     */
    protected function process() {

        $username = $this->app()->request->post("username");
        $password = $this->app()->request->post("password");
        $cPassword = $this->app()->request->post("cpassword");
        $phone = $this->app()->request->post("phone");
        $type = $this->app()->request->post("registrant");

        // Validate the user registration
        if(!$this->validRegistration($username, $phone, $password, $cPassword)) {
            return;
        }

        // Add the user to DB
        require_once 'models/User.php';

        switch($type) {
            case 'job-provider':
                require_once 'models/Provider.php';
                $user = Provider::newUser($username, $phone, $password);
                break;

            case 'job-seeker':
                require_once 'models/Seeker.php';
                $user = Seeker::newUser($username, $phone, $password);
                break;

            case 'volunteer':
                require_once 'models/Volunteer.php';
                $user = Volunteer::newUser($username, $phone, $password);
                break;

            default:
                $user = 0;
                break;
        }

        // Generate and send the verification code to the user mobile
        require_once 'libs/Verifier.php';
        Verifier::sendVerificationCode(Verifier::generateVerificationCode($user->id()), $user->phone());

        require_once 'libs/Session.php';

        Session::start();

        Session::setVar('USER_ID', $user->id());

        if(Session::existsVar('ERR_MSG')) {
            $this->setVar('errMsg', Session::getVar('ERR_MSG'));
        } else {
            $this->setVar('errMsg', '');
        }

        Session::close();

        $this->setVar('title', 'Verify your mobile number');
    }
}