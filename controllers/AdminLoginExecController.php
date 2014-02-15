<?php

/**
 * Class for controlling login execution for admin
 * Class AdminLoginExecController
 */
class AdminLoginExecController extends Controller {

    /**
     * Constructor for admin login execution controller
     * @param Slim   $app      The application instance
     * @param string $template The name of the template (For view controllers)
     * @param string $redirect The redirect URI (For controllers without views)
     */
    public function __construct($app, $template = '', $redirect = '') {
        parent::__construct($app, $template, $redirect);
    }

    /**
     * Process everything needed to be done by the controller
     * @return void
     */
    protected function process() {
        // Get the post admin username and password
        $username = $this->app()->request->post("username");
        $password = $this->app()->request->post("password");

        // Check credentials
        if(! ($username == 'admin' && $password == 'p@ssword')) {
            // If wrong credentials
            $this->redirect('../admin');
        }
    }
}
