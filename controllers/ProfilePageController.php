<?php

/**
 * The Public Profile page controller
 * Class ProfilePageController
 */
class ProfilePageController extends PageController {

    /**
     * The main process method of the controller
     * @return mixed|void
     */
    protected function process() {

        require_once 'models/User.php';
        require_once 'libs/Auth.php';

        $currentUserId = Auth::userId();
        $currentUser = new User($currentUserId);
        $currentUserName = $currentUser->username();

        $this->setVar('currentUserName', $currentUserName);
        $this->setVar('currentUserId', $currentUserId);

        $username = $this->param();

        $userId = User::idFromUserName($username);

        $user = new User($userId);
        $userType = $user->type();

        $this->setVar('title', $user->username());
        $this->setVar('username', $user->username());
        $this->setVar('fullName', $user->fullName());
        $this->setVar('userType', $userType);
        $this->setVar('userId', $userId);
        $this->setVar('favorited', $currentUser->hasFavorited($userId));
        $this->setVar('noFavoritedBy', sizeof($user->favoritedBy()));

        switch($userType) {
            case 'volunteer':

                require_once 'models/Volunteer.php';
                $user = new Volunteer($userId);

                $this->setVar('organization', $user->organization());
                $this->setVar('typeText', 'Volunteer');
                $this->setVar('designation', $user->designation());
                $this->setVar('location', $user->location());
                $this->setVar('email', $user->email());

                break;

            case 'seeker':

                require_once 'models/Seeker.php';
                $user = new Seeker($userId);

                if($currentUser->type() == "provider") {
                    require_once 'models/Notification.php';
                    $message = "<a href='../profile/" . $currentUserName . "'>" . $currentUserName . "</a> has viewed your profile.";
                    Notification::newNotification($userId, $message);
                }

                $this->setVar('prefLocation', $user->preferredLocation());
                $this->setVar('typeText', 'Job Seeker');
                $this->setVar('currLocation', $user->currentLocation());
                $this->setVar('experience', $user->experience());

                break;

            case 'provider':

                require_once 'models/Provider.php';
                $user = new Provider($userId);

                $this->setVar('organization', $user->organization());
                $this->setVar('typeText', 'Job Provider');
                $this->setVar('designation', $user->designation());
                $this->setVar('location', $user->location());
                $this->setVar('email', $user->email());

                break;
        }
    }
}