<?php

/**
 * Class for controlling login execution for admin
 * Class AdminLoginExecController
 */
class AdminLoginExecController extends ExecController {

    /**
     * Process everything needed to be done by the controller
     * @return void
     */
    protected function process() {
        // Get the post admin username and password
        $username = $this->app()->request->post("username");
        $password = $this->app()->request->post("password");

        require_once 'var/config.php';

        // Check credentials
        if(!($username == ADMIN_USER_NAME && $password == ADMIN_PASSWORD)) {
            // If wrong credentials
            $this->setRedirectUri('../admin');
        }
    }
}
