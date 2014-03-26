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
                $this->setPage('VolunteerHome.tpl.php');
                break;
            case 'provider':
                $this->setPage('ProviderHome.tpl.php');
                break;
        }
    }
}