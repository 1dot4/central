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
        $this->setVar('title', $this->param());
    }
}