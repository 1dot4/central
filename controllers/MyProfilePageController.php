<?php

/**
 * The My Profile page controller
 * Class MyProfilePageController
 */
class MyProfilePageController extends PageController {

    /**
     * The main process method of the controller
     */
    protected function process() {

        require_once 'libs/Auth.php';
        $id = Auth::userId();

        require_once 'models/User.php';
        $user = new User($id);
        $type = $user->type();

        $this->setVar("userType", $type);
        $this->setVar('username', $user->username());
        $this->setVar('phone', $user->phone());
        $this->setVar('fullName', $user->fullName());

        switch($type) {

            case 'seeker':

                require_once 'models/Seeker.php';
                $user = new Seeker($id);

                // Set seeker specific variables
                $this->setVar('prefLocation', $user->preferredLocation());
                $this->setVar('currLocation', $user->currentLocation());
                $this->setVar('experience', $user->experience());

                $this->setPage('SeekerMyProfile.tpl.php');

                break;

            case 'provider':

                require_once 'models/Provider.php';
                $user = new Provider($id);

                // Set Provider specific variables
                $this->setVar('email', $user->email());
                $this->setVar('organization', $user->organization());
                $this->setVar('designation', $user->designation());
                $this->setVar('location', $user->location());

                $this->setPage('MyProfile.tpl.php');

                break;

            case 'volunteer':

                require_once 'models/Volunteer.php';
                $user = new Volunteer($id);

                // Set the Volunteer specific variables
                $this->setVar('email',$user->email());
                $this->setVar('organization', $user->organization());
                $this->setVar('designation', $user->designation());
                $this->setVar('location', $user->location());

                $this->setPage('MyProfile.tpl.php');

                break;
        }
    }
}