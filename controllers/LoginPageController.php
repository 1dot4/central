<?php

/**
 * The Login page controller
 * Class LoginController
 */
class LoginPageController extends PageController {

    /**
     * Set the variables for rendering in template
     */
    protected function process() {
        $this->setVar('title', 'Login to Central');

        require_once 'libs/Session.php';

        Session::start();

        if(Session::existsVar("ERR_MSG")) {
            $this->setVar('errMsg', Session::getVar("ERR_MSG"));
        } else {
            $this->setVar('errMsg', "");
        }

        Session::end();
    }
}
