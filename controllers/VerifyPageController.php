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
     * Main action process of controller
     */
    protected function process() {

        $err = false;
        $errMsg = '';

        $username = $this->app()->request->post("username");
        $password = $this->app()->request->post("password");
        $cPassword = $this->app()->request->post("cpassword");
        $phone = $this->app()->request->post("phone");

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

            return;
        }

        $this->setVar('title', 'Verify your mobile number');
    }
}