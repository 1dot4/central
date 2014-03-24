<?php

/**
 * Access Denied page controller
 * Class ForbiddenPageController
 */
class ForbiddenPageController extends PageController {

    /**
     * The main process method for the controller
     */
    public function process() {
        $this->setVar('title', 'Please login to continue...');
        $this->setVar('errMsg', '');
    }
}