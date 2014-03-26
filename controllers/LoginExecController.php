<?php

/**
 * The Login execution controller class
 * Class LoginExecController
 */
class LoginExecController extends ExecController {

    /**
     * Main process method of the controller
     */
    protected function process() {
        $username = $this->app()->request()->post("username");
        $password = $this->app()->request()->post("password");

        require_once 'libs/Session.php';
        require_once 'models/User.php';
        $id = User::authenticateUser($username, $password);

        if($id == -1) {
            Session::start();
            Session::setVar("ERR_MSG", "Username or password incorrect");
            Session::close();
            $this->setRedirectUri('./');
            return;
        } else {
            Session::start();
            Session::setVar("USER_ID", $id);
            Session::close();
        }
    }
}