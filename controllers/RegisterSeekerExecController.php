<?php

/**
 * Register Seeker Execution controller
 * Class RegisterSeekerExecController
 */
class RegisterSeekerExecController extends ExecController {

    /**
     * Main process method for controller
     * @return mixed|void
     */
    protected function process() {
        $username = $this->app()->request->post("username");
        $fullName = $this->app()->request->post("fullname");
        $phone = $this->app()->request->post("phone");
        $password = $this->app()->request->post("password");
        $cpassword = $this->app()->request->post("cpassword");
        $currentLocation = $this->app()->request->post("curr-location");
        $preferredLocation = $this->app()->request->post("pref-location");
        $experience = $this->app()->request->post("experience");

        require_once 'models/User.php';
        require_once 'models/Seeker.php';
        $seeker = Seeker::newUser($username, $phone, $password);

        $seeker->setFullName($fullName);
        $seeker->setCurrentLocation($currentLocation);
        $seeker->setPreferredLocation($preferredLocation);
        $seeker->setExperience($experience);

        $seeker->saveToDb();
    }
}