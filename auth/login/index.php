<?php
error_reporting(0);
include '../../include/Constants.inc.php';

class Login {
    
    public function __construct() {
        global $apiHandler;
        $message = "";
        if (isset($_POST["login_flag"])) {
            $lResult = $apiHandler->login($_POST["username"], $_POST["password"]);
            
            if(!$lResult)
                $message = _LOGIN_FAILED;
            
            if ($apiHandler->IsAuthenticated()) {
                $apiHandler->redirect(_APPFOLDER);
                return;
            } 
        }
        
        if (isset($_POST["logout"])) {
            $apiHandler->logout();
        }
        
        $this->displayLogin($message); 
    }

    private function displayLogin($message="") {
        require_once _SITE_ROOT . 'views/login/login_view.php';
    }

}

$login = new Login();
?>
