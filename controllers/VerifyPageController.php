<?php

/**
 * The Verify page controller class
 * Class VerifyPageController
 */
class VerifyPageController extends Controller {

    /**
     * Constructor for the verify page controller
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name
     */
    public function __construct($app, $template = '') {
        parent::__construct($app, $template);
    }

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
        require_once 'libs/DB.php';

        $conn = DB::connect();

        $res = $conn->query("SELECT COUNT(*) FROM user WHERE username='$username'");

        if($res->fetchColumn() != 0) {
            $err = true;
            $errMsg .= "The username is already taken.<br>";
        }

        DB::disconnect($conn);

        if($username == '' || $password == '' || $phone == '') {
            $err = true;
            $errMsg .= 'All the fields are required.<br>';
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

            $this->redirect('register');
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
                $user = Provider::newProvider($username, $phone, $password);
                break;

            case 'job-seeker':
                require_once 'models/Seeker.php';
                $user = Seeker::newSeeker($username, $phone, $password);
                break;

            case 'volunteer':
                require_once 'models/Volunteer.php';
                $user = Volunteer::newVolunteer($username, $phone, $password);
                break;

            default:
                $user = 0;
                break;
        }

        // Generate and send the verification code to the user mobile
        require_once 'libs/Verifier.php';
        Verifier::sendVerificationCode(Verifier::generateVerificationCode($user->id()), $user->phone());

        $this->setVar('title', 'Verify your mobile number');
    }
}