<?php

class ProfilePageController extends PageController {
    protected function process() {
        $this->setVar('title', $this->param());
    }
}