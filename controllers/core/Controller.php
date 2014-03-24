<?php

/**
 * The main controller class
 * Class Controller
 */
abstract class Controller {

    /**
     * Constructor for the main controller class
     * @param \Slim\Slim $app The application instance
     * @param bool $protected Protected or not
     * @param string $param The extra parameter at the end of URL
     */
    public function __construct($app, $protected = false, $param = '') {

        // If protected controller the authorize the user
        if($protected) {
            require_once 'libs/Auth.php';
            if(!Auth::isAuthorized()) {
                $app->redirect('access.denied', 403);
            }
        }

        $this->app = $app;
        $this->param = $param;

        $this->process();
    }

    /**
     * The main process method of the controller
     * @return mixed
     */
    protected abstract function process();

    /**
     * Getter for the application instance
     * @return \Slim\Slim The application instance
     */
    protected function app() {
        return $this->app;
    }

    /**
     * Set the redirect URI of exec controller
     * @param string $uri The redirect URI
     */
    protected function setRedirectUri($uri) {
        $this->app->redirect($uri);
    }

    /**
     * The application instance
     * @var Slim\Slim
     */
    private $app;

    /**
     * Extra param at end of URL
     * @var string
     */
    private $param;
}