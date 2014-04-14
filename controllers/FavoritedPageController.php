<?php

/**
 * The Favorited page controller
 * Class FavoritedPageController
 */
class FavoritedPageController extends PageController {

    /**
     * The main process method of the controller
     * @return mixed|void
     */
    protected function process() {
        require_once 'libs/Auth.php';

        require_once 'models/User.php';

        $userId = Auth::userId();
        $user = new User($userId);
        $this->setVar('username', $user->username());

        $id = $this->param();
        $user = new User($id);
        $this->setVar('favorited', $user->favoritedBy());
        $this->setVar('favoriteName', $user->username());
    }
}