<?php

/**
 * The Login execution controller class
 * Class LoginExecController
 */
class LoginExecController extends Controller {
    /**
     * Constructor for the login execution controller class
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name.
     * @param string $redirect The redirect URI
     */
    public function __construct($app, $template = '', $redirect = '') {
        parent::__construct($app, '', $redirect);
    }

    /**
     * Main process method of the controller
     */
    protected function process() {
        $username = $this->app()->request()->post("username");
        $password = $this->app()->request()->post("password");

        require_once 'libs/Session.php';
        require_once 'models/User.php';
        $id = User::authenticateUser($username, md5($password));

        if($id == -1) {
            Session::start();
            Session::setVar("ERR_MSG", "Username or password incorrect");
            Session::close();
            $this->redirect('./');
            return;
        } else {
            Session::start();
            Session::setVar("USER_ID", $id);
            Session::close();
        }
    }
}