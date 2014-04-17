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

        require_once 'libs/Auth.php';

        if(Auth::isAuthorized()) {
            $this->setRedirectUri('home/index');
        }

        require_once 'models/Skill.php';

        $this->setVar('jobCategories', Skill::topSkills());

        $this->setVar('title', 'Login');

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
