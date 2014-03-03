<?php

class VerifyPageController extends Controller {

    public function __construct($app, $template = '') {
        parent::__construct($app, $template);
    }

    protected function process() {
        $this->setVar('title', 'Verify your mobile number');
    }
}