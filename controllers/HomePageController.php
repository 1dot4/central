<?php

/**
 * The Home Page Controller class
 * Class HomePageController
 */
class HomePageController extends PageController {

    /**
     * The main process method
     */
    protected function process() {

        $page = $this->param();

        require_once 'libs/Auth.php';
        $id = Auth::userId();

        require_once 'models/User.php';
        $user = new User($id);
        $type = $user->type();

        $this->setVar("userType", $type);
        $this->setVar('username', $user->username());

        switch($type) {
            case 'seeker':
                $this->setPage('SeekerHome.tpl.php');
                break;

            case 'volunteer':

                switch($page) {
                    case 'register':
                        require_once 'libs/Session.php';

                        Session::start();

                        if(Session::existsVar("ERR_MSG")) {
                            $this->setVar('errMsg', Session::getVar("ERR_MSG"));
                        } else {
                            $this->setVar('errMsg', "");
                        }

                        Session::unsetVar("ERR_MSG");

                        $this->setPage('VolunteerHomeRegister.tpl.php');
                        break;

                    case 'index':

                        require_once 'models/Volunteer.php';

                        $volunteer = new Volunteer($id);
                        $registeredSeekers = $volunteer->registeredSeekers();

                        $this->setVar('registeredSeekers', $registeredSeekers);

                        $this->setPage('VolunteerHome.tpl.php');

                }

                break;

            case 'provider':

                require_once 'models/Provider.php';

                $user = new Provider($id);

                $jobs = $user->jobPostings();

                $this->setVar('jobs', $jobs);

                $this->setPage('ProviderHome.tpl.php');
                break;
        }
    }
}