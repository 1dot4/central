<?php

/**
 * Class AdminDashController
 * Controller class for Admin dashboard page
 */
class AdminDashPageController extends PageController {

    /**
     * Set the variables for rendering in the admin dashboard template
     */
    protected function process() {
        $this->setVar('title', 'Admin Dashboard');
    }
}
