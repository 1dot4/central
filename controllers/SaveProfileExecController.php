<?php

/**
 * Profile Saver Exec Class Controller
 * Class SaveProfileExecController
 */
class SaveProfileExecController extends ExecController {

    /**
     * Save the volunteer details
     * @param string $id The user id
     */
    private function saveVolunteerDetails($id) {
        $param = $this->param();

        require_once 'models/Volunteer.php';
        $volunteer = new Volunteer($id);

        switch($param) {

            case 'personal':

                $fullName = $this->app()->request->post("fullname");
                $location = $this->app()->request->post("location");
                $organization = $this->app()->request->post("organization");
                $designation = $this->app()->request->post("designation");

                $volunteer->setFullName($fullName);
                $volunteer->setLocation($location);
                $volunteer->setOrganization($organization);
                $volunteer->setDesignation($designation);

                break;

            case 'contact':

                $phone = $this->app()->request->post("phone");
                $email = $this->app()->request->post("email");

                $volunteer->setPhone($phone);
                $volunteer->setEmail($email);

                break;

            case 'password':

                $password = $this->app()->request->post("password");
                $cpassword = $this->app()->request->post("cpassword");

                if($password == $cpassword) {
                    $volunteer->setPassword($password);
                }

                break;
				
			case 'image':
				
				$allowedExts = array("jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["file"]["name"]);
				$extension = end($temp);
				if (($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png")
				&& ($_FILES["file"]["size"] < 2000000)
				&& in_array($extension, $allowedExts))
				  {
				  $rename = $id;
				  if ($_FILES["file"]["error"] > 0)
					{
					echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
					}
				  else
					{

					if (file_exists("./public/images/upload/volunteer_profile/" . $_FILES["file"]["name"]))
					  {
					  echo $_FILES["file"]["name"] . " already exists. ";
					  }
					else
					  {
					  move_uploaded_file($_FILES["file"]["tmp_name"],
					  "./public/images/upload/volunteer_profile/" .$_FILES["file"]["name"]);
					  }
					}
				  }
				else
				  {
				  echo "Invalid file";
				  }
				break;
				  
				  
        }

        $volunteer->saveToDb();
    }

    /**
     * Save the Seeker details
     * @param string $id The user id
     */
    private function saveSeekerDetails($id) {
        $param = $this->param();

        require_once 'models/Seeker.php';
        $seeker = new Seeker($id);

        switch($param) {
            case 'personal':

                $fullName = $this->app()->request->post("fullname");
                $currLocation = $this->app()->request->post("curr-location");
                $prefLocation = $this->app()->request->post("pref-location");

                $seeker->setFullName($fullName);
                $seeker->setCurrentLocation($currLocation);
                $seeker->setPreferredLocation($prefLocation);

                break;

            case 'contact':

                $phone = $this->app()->request->post("phone");

                $seeker->setPhone($phone);

                break;

            case 'password':
                $password = $this->app()->request->post("password");
                $cpassword = $this->app()->request->post("cpassword");

                if($password == $cpassword) {
                    $seeker->setPassword($password);
                }

                break;

            case 'skills':

                $experience = $this->app()->request->post("experience");

                $skills = $this->app()->request->post("skills");
                $skillSet = explode(',', $skills);

                $seeker->setExperience($experience);
                $seeker->setSkills($skillSet);

                break;
			
			case 'image':
				
				$allowedExts = array("jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["file"]["name"]);
				$extension = end($temp);
				if (($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png")
				&& ($_FILES["file"]["size"] < 2000000)
				&& in_array($extension, $allowedExts))
				  {
				  $rename = $id;
				  if ($_FILES["file"]["error"] > 0)
					{
					echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
					}
				  else
					{

					if (file_exists("./public/images/upload/seeker_profile/" . $_FILES["file"]["name"]))
					  {
					  echo $_FILES["file"]["name"] . " already exists. ";
					  }
					else
					  {
					  move_uploaded_file($_FILES["file"]["tmp_name"],
					  "./public/images/upload/seeker_profile/" .$_FILES["file"]["name"]);
					  }
					}
				  }
				else
				  {
				  echo "Invalid file";
				  }
				break;
        }

        $seeker->saveToDb();
    }

    /**
     * Save the volunteer details
     * @param string $id The user id
     */
    private function saveProviderDetails($id) {
        $param = $this->param();

        require_once 'models/Provider.php';
        $provider = new Provider($id);

        switch($param) {

            case 'personal':

                $fullName = $this->app()->request->post("fullname");
                $location = $this->app()->request->post("location");
                $organization = $this->app()->request->post("organization");
                $designation = $this->app()->request->post("designation");

                $provider->setFullName($fullName);
                $provider->setLocation($location);
                $provider->setOrganization($organization);
                $provider->setDesignation($designation);

                break;

            case 'contact':

                $phone = $this->app()->request->post("phone");
                $email = $this->app()->request->post("email");

                $provider->setPhone($phone);
                $provider->setEmail($email);

                break;

            case 'password':

                $password = $this->app()->request->post("password");
                $cpassword = $this->app()->request->post("cpassword");

                if($password == $cpassword) {
                    $provider->setPassword($password);
                }

                break;
				
			case 'image':
				
				$allowedExts = array("jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["file"]["name"]);
				$extension = end($temp);
				if (($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png")
				&& ($_FILES["file"]["size"] < 2000000)
				&& in_array($extension, $allowedExts))
				  {
				  $rename = $id;
				  if ($_FILES["file"]["error"] > 0)
					{
					echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
					}
				  else
					{

					if (file_exists("./public/images/upload/provider_profile/" . $_FILES["file"]["name"]))
					  {
					  echo $_FILES["file"]["name"] . " already exists. ";
					  }
					else
					  {
					  move_uploaded_file($_FILES["file"]["tmp_name"],
					  "./public/images/upload/provider_profile/" .$_FILES["file"]["name"]);
					  }
					}
				  }
				else
				  {
				  echo "Invalid file";
				  }
				break;
        }

        $provider->saveToDb();
    }

    /**
     * The main process method of the controller
     * @return mixed|void
     */
    protected function process() {

        require_once 'libs/Auth.php';
        $id = Auth::userId();

        require_once 'models/User.php';
        $user = new User($id);
        $userType = $user->type();

        switch($userType) {
            case 'volunteer':
                $this->saveVolunteerDetails($id);
                break;
            case 'seeker':
                $this->saveSeekerDetails($id);
                break;
            case 'provider':
                $this->saveProviderDetails($id);
                break;
        }
    }
}