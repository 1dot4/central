<?php
/**
 * Interface for the Controllers
 * Class Controller
 */
class Controller {

    /**
     * Constructor for Controller
     * @param $app The application instance
     * @param $template The template name (in case of a view controller)
     * @param $redirect The redirect URI (in case of a controller without view)
     */
    public function __construct($app, $template = '', $redirect = '') {
        $this->app = $app;
        $this->template = $template;
        $this->redirect = $redirect;
        $this->data = array();

        // Set all the variables
        $this->setVars();

        // Render the template, if template present
        if($template != '') {
            $this->app->render($this->template, $this->data);
        }

        // Process everything and redirect to the URL. Doesn't have a view associated.
        else if($redirect != '') {
            $this->process();
            $this->app->redirect($this->redirect);
        }

        // None of the above scenarios
        else {
            die("Something wrong with the controller parameters!");
        }
    }

    /**
     * Set all the variables to be passed to the template. To be re-implemented.
     * Usually associated with a template.
     * @return mixed
     */
    protected function setVars() {}

    /**
     * Process everything needed to be done by the controller. To be re-implemented.
     * Usually does not have a view.
     * @return mixed
     */
    protected function process() {}

    /**
     * Set value to a key in page data
     * @param $key The key for the dictionary
     * @param $value The value corresponding to the key
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
     * @return Slim The application instance
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
     * @var The app variable
     */
    private $app;

    /**
     * @var The data array
     */
    private $data;

    /**
     * @var The template
     */
    private $template;

    /**
     * The redirect URI
     * @var string
     */
    private $redirect;
}
