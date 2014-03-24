<?php

/**
 * The Page Controller
 * Class PageController
 */
abstract class PageController extends Controller {

    /**
     * Constructor for the page controller
     * @param \Slim\Slim $app The application instance
     * @param string $page The page template name
     * @param bool $protected Protected or not
     * @param string $param Extra parameter at end of the URL
     */
    public function __construct($app, $page = '', $protected = false, $param = '') {

        $this->data = array();

        if($param != '') {
            $this->setVar('param', $param);
        }

        $this->page = $page;

        parent::__construct($app, $protected, $param);

        $this->app()->render($this->page, $this->data);
    }

    /**
     * Set the value for a template variable
     * @param string $key The key of the variable
     * @param string $val The value of the variable
     */
    protected function setVar($key, $val) {
        $this->data[$key] = $val;
    }

    /**
     * Get the value for a template variable
     * @param string $key The key of the variable
     * @return mixed The value of the variable
     */
    protected function getVar($key) {
        return $this->data[$key];
    }

    /**
     * Set the page template of the controller
     * @param string $page The page template name
     */
    protected function setPage($page) {
        $this->page = $page;
    }

    /**
     * The template variables of the controller
     * @var array
     */
    private $data;

    /**
     * The template name
     * @var string
     */
    private $page;
}