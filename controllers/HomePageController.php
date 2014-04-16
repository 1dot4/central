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
        $this->setvar("userId", $id);

        if($page == 'favorites') {
            $seekerFav = Array();
            $providerFav = Array();
            $volunteerFav = Array();
            $favorites = $user->favorites();

            foreach($favorites as $favorite) {
                $favId = $favorite["favorited_id"];
                $favUser = new User($favId);

                switch($favUser->type()) {
                    case 'volunteer':
                        array_push($volunteerFav, $favId);
                        break;
                    case 'seeker':
                        array_push($seekerFav, $favId);
                        break;
                    case 'provider':
                        array_push($providerFav, $favId);
                        break;
                }
            }
            $this->setVar('seekerFav', $seekerFav);
            $this->setVar('providerFav', $providerFav);
            $this->setVar('volunteerFav', $volunteerFav);
            $this->setPage("Favorites.tpl.php");
            return;
        }

        if($page == 'notifications') {
            $this->setVar('notifications', $user->notifications());
            $this->setPage('Notifications.tpl.php');
            return;
        }

        switch($type) {

            case 'seeker':

                require_once 'models/Job.php';

                switch($page)
                {

                    case 'index':
                        require_once 'models/Seeker.php';

                        $seeker = new Seeker($id);

                        $this->setPage('SeekerHome.tpl.php');

                        $jobs = $seeker->relevantJobs();

                        $this->setVar('jobs', $jobs);

                        $this->setVar('profileMeter', $seeker->profileCompleteness());

                        break;

                    case 'search':
                        $from = $this->app()->request->get("from_date");
                        
                        $to = $this->app()->request->get("to_date");

                        $q = $this->app()->request->get("q");

                        $closed = $this->app()->request->get("closed");

                        if($closed == 'on') {
                            $status = 'true';
                        } else {
                            $status = 'false';
                        }

                        $jobs = Job::searchJobs($id, $q, $from, $to, $status);

                        $this->setVar('jobs', $jobs);
                        
                        $this->setPage('SeekerHomeSearch.tpl.php');
                        break;
						
                    case 'advanced-search':
                        $jobs = Job::searchJobs($id, '', '', '', 'false');

                        $this->setVar('jobs', $jobs);
                        
                        $this->setPage('SeekerHomeSearch.tpl.php');
                        break;

                    case 'stats':
                        require_once 'models/Stats.php';

                        $this->setVar("skillString", Stats::skillDemand($id)["skillString"]);
                        $this->setVar("skillDemands", Stats::skillDemand($id)["skillDemands"]);
                        $this->setVar('totalJobs', Stats::totalJobs());
                        $this->setVar('relevantJobs', sizeof(Stats::relevantJobs($id)));

                        $this->setPage('SeekerStats.tpl.php');

                        break;
            }
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
                        require_once 'models/Stats.php';

                        $volunteer = new Volunteer($id);
                        $registeredSeekers = $volunteer->registeredSeekers();

                        $this->setVar('registeredSeekers', $registeredSeekers);
                        $this->setVar('profileMeter', $volunteer->profileCompleteness());
                        $this->setVar('noRegisteredSeekers', sizeof($registeredSeekers));
                        $this->setVar('noInterestedSeekers', sizeof(Stats::interestedSeekers($id)));
                        $this->setVar('noFavoritedSeekers', sizeof(Stats::favoritedSeekers($id)));

                        $this->setPage('VolunteerHome.tpl.php');

                        break;
                }

                break;

            case 'provider':

                require_once 'models/Provider.php';

                require_once 'models/Job.php';

                switch($page) {

                    case 'post':

                        $this->setPage('ProviderHomePost.tpl.php');

                        $user = new Provider($id);
                        $this->setVar('location', $user->location());

                        require_once 'libs/Session.php';

                        Session::start();

                        if(Session::existsVar("ERR_MSG")) {
                            $this->setVar('errMsg', Session::getVar("ERR_MSG"));
                            $this->setVar('jobTitle', Session::getVar("TITLE"));
                            $this->setVar('jobDescription', Session::getVar("DESCRIPTION"));

                        } else {
                            $this->setVar('errMsg', "");
                            $this->setVar('jobTitle', "");
                            $this->setVar('jobDescription', "");
                        }
                        Session::unsetVar("ERR_MSG");
                        Session::unsetVar("TITLE");
                        Session::unsetVar("DESCRIPTION");
                        
                        
                        Session::close();

                        break;

                    case 'index':

                        $user = new Provider($id);

                        $jobs = $user->jobPostings();

                        $this->setVar('jobs', $jobs);
                        $this->setVar('profileMeter', $user->profileCompleteness());

                        $this->setPage('ProviderHome.tpl.php');

                        break;
                     
                    case 'search':

                        $from = $this->app()->request->get("from_date");
                        
                        $to = $this->app()->request->get("to_date");

                        $q = $this->app()->request->get("q");

                        $closed = $this->app()->request->get("closed");

                        if($closed == 'on') {
                            $status = 'true';
                        } else {
                            $status = 'false';
                        }

                        $jobs = Job::searchJobs($id, $q, $from, $to, $status);

                        $this->setVar('jobs', $jobs);
                        
                        $this->setPage('ProviderHome.tpl.php');
                        break;
                }
                
                break;
        }
    }
}
