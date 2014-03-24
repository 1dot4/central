<?php

/**
 * The admin login page controller
 * Class AdminLoginController
 */
class AdminLoginPageController extends PageController {

    /**
     * Set the variables for rendering in the template
     */
    protected function process() {
        $this->setVar('title', 'Login as Admin');
    }
}
