<?php

/**
 * The Registration page controller
 * Class RegisterPageController
 */
class RegisterPageController extends PageController {
    /**
     * Set the variables to be rendered in template
     */
    protected function process() {
        $this->setVar('title', 'Join');

        require_once 'libs/Session.php';

        Session::start();

        if(Session::existsVar("ERR_MSG")) {
            $this->setVar('errMsg', Session::getVar("ERR_MSG"));
            $this->setVar('username', Session::getVar("USERNAME"));
            $this->setVar('phone', Session::getVar("PHONE"));
        } else {
            $this->setVar('errMsg', "");
            $this->setVar('username', "");
            $this->setVar('phone', "");
        }
        Session::unsetVar("USERNAME");
        Session::unsetVar("PHONE");
        Session::end();
    }
}
