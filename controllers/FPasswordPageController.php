<?php

/**
 * The Forgot Password page controller
 * Class FPasswordPageController
 */
class FPasswordPageController extends PageController {
    
	/**
     * Set the variables to be rendered in template
     */
	 
    protected function process() {
	
        $this->setVar('title', 'Forgot Password');
		$this->setVar('errMsg','');

       
    }
}
