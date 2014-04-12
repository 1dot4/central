<?php

/**
 * Favorite Stream Controller class
 * Class FavoriteStreamController
 */
class FavoriteStreamController extends StreamController {

    /**
     * The main process method of the controller
     * @return mixed|void
     */
    protected function process() {

        require_once 'libs/Auth.php';

        $userId = Auth::userId();
        $favoritedId = $this->param();

        require_once 'models/User.php';
        $user = new User($userId);
        $user->favorite($favoritedId);

        $record = Array(
            'success' => true
        );

        $this->addRecord($record);
    }
}