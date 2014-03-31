<?php

/**
 * The Home Page Controller class
 * Class HomePageController
 */
class HomePageController extends PageController {

    /**
     * The main process method
     */
    protected function process() {

        $page = $this->param();

        require_once 'libs/Auth.php';
        $id = Auth::userId();

        require_once 'models/User.php';
        $user = new User($id);
        $type = $user->type();

        $this->setVar("userType", $type);
        $this->setVar('username', $user->username());

        switch($type) {
            case 'seeker':
                $this->setPage('SeekerHome.tpl.php');
                break;

            case 'volunteer':

                switch($page) {

                    case 'register':
                        require_once 'libs/Session.php';

                        Session::start();

                        if(Session::existsVar("ERR_MSG")) {
                            $this->setVar('errMsg', Session::getVar("ERR_MSG"));
                        } else {
                            $this->setVar('errMsg', "");
                        }

                        Session::unsetVar("ERR_MSG");

                        $this->setPage('VolunteerHomeRegister.tpl.php');

                        break;

                    case 'index':

                        require_once 'models/Volunteer.php';

                        $volunteer = new Volunteer($id);
                        $registeredSeekers = $volunteer->registeredSeekers();

                        $this->setVar('registeredSeekers', $registeredSeekers);

                        $this->setPage('VolunteerHome.tpl.php');

                        break;
                }

                break;

            case 'provider':

                require_once 'models/Provider.php';

                switch($page) {

                    case 'post':

                        $this->setPage('ProviderHomePost.tpl.php');

                        $user = new Provider($id);
                        $this->setVar('location', $user->location());

                        break;

                    case 'index':

                        $user = new Provider($id);

                        $jobs = $user->jobPostings();
                        
                        //$j = new Job($id);
                        
                        //$jobIds = j->getAllJobIds();
                        
                        $jobIds = Array();

                        $this->setVar('jobs', $jobs);
                        
                        $this->setVar('jobIds',$jobIds);
                        
                        //die($jobIds);

                        $this->setPage('ProviderHome.tpl.php');

                        break;
                     
                     case 'search':
                        
                        $j = new Job($id);

                        $from = $_POST["from_date"];
                        
                        $to = $_POST["to_date"];
                        
                        $jobIds = array();
                        
                        $jobIds = $j->postedInDuration($from, $to);
                        
                        //die($jobIds);
                        
                        $jobs = Array();
                        
                        $this->setVar('jobIds',$jobIds);
                        
                        $this->setVar('jobs', $jobs);
                        
                        $this->setPage('ProviderHome.tpl.php');
                        break;
                }
                
                break;
        }
    }
}
