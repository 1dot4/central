<?php
/**
 * Interface for the Controllers
 * Class Controller
 */
abstract class Controller {

    /**
     * Constructor for the controller
     * @param \Slim\Slim $app The application instance
     * @param string $template The template name (for view controllers)
     * @param string $redirect The redirect URI (for controllers without view)
     * @param string $id       The parameter passed after the URL
     */
    public function __construct($app, $template = '', $redirect = '', $id = '') {
        $this->app = $app;
        $this->template = $template;
        $this->redirect = $redirect;
        $this->data = array();

        if($id != '') {
            $this->setVar('id', $id);
        }

        $this->process();

        // Redirect to the URL. Doesn't have a view associated.
        if($this->redirect != '') {
            $this->app->redirect($this->redirect);
        }

        // Render the template, if template present
        if($template != '') {
            $this->app->render($this->template, $this->data);
        }

        // None of the above scenarios
        else {
            die("Something wrong with the controller parameters!");
        }
    }

    /**
     * Process everything needed to be done by the controller. To be re-implemented.
     */
    abstract protected function process();

    /**
     * Set value to a key in page data
     * @param string $key   The key for the dictionary
     * @param string $value The value corresponding to the key
     */
    protected function setVar($key, $value) {
        $this->data[$key] = $value;
    }

    /**
     * Get the page data variable value
     * @param  string $key The variable name
     * @return string      The data corresponding to the key
     */
    protected function getVar($key) {
        return $this->data[$key];
    }

    /**
     * Getter function for application instance
     * @return \Slim\Slim The application instance
     */
    protected function app() {
        return $this->app;
    }

    /**
     * Getter function for template
     * @return string Template name corresponding to the controller
     */
    protected function template() {
        return $this->template;
    }

    /**
     * Setter function for redirect URI
     * @param  string $uri The new redirect URI
     * @return void
     */
    protected function redirect($uri) {
        $this->redirect = $uri;
    }

    /**
     * Getter function for redirect URI
     * @return string Redirect URI corresponding to the controller
     */
    protected function redirectUri() {
        return $this->redirect;
    }

    /**
     * The application instance
     * @var \Slim\Slim
     */
    private $app;

    /**
     * The data array
     * @var array
     */
    private $data;

    /**
     * The template
     * @var string
     */
    private $template;

    /**
     * The redirect URI
     * @var string
     */
    private $redirect;
}
