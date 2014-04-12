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

        if(!$user->hasFavorited($favoritedId)) {
            $user->favorite($favoritedId);
            $record = Array(
                'success' => true,
                'message' => 'Favourited'
            );
        } else {
            $user->undoFavorite($favoritedId);
            $record = Array(
                'success' => true,
                'message' => 'Add to Favourites'
            );
        }

        $this->addRecord($record);
    }
}