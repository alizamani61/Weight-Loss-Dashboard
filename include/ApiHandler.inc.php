<?php

/**
 * Description of ApiHandler
 *
 * @author Zamani
 */
class ApiHandler {

    public function __construct() {
        session_start();
    }

    public function redirect($referral) {
        
        echo "<script type='text/javascript'>document.location.href='{$referral}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $referral . '">';
    }

    

    public function IsAuthenticated(){
        return isset($_SESSION["coachToken"]) && trim($_SESSION["coachToken"])!="";
    }
    
    public function logout() {
        $_SESSION["coachToken"] = $_SESSION["username"] = $_SESSION["name"] = $_SESSION["profilePictureUrl"] = "";
    }
    
    
    public function cancelSubscription($subscriptionToken){
        return json_decode($this->post(_API_URL . "cancel-subscription.php", '{"coachToken":"'.$_SESSION["coachToken"].'","subscriptionToken":"'.$subscriptionToken.'"}'));
    }
    
    public function getUserInfo($userNumber){
        //echo $this->post(_API_URL . "user-info.php", '{"coachToken":"'.$_SESSION["coachToken"].'","userNumber":"'.$userNumber.'"}');
        return json_decode($this->post(_API_URL . "user-info.php", '{"coachToken":"'.$_SESSION["coachToken"].'","userNumber":"'.$userNumber.'"}'));
    }
    
    public function login($username, $password) {
        //$result = $this->post(_API_URL . "login.php", '{"number":"'.$username.'","password":"'.$password.'"}'); 

        //$usr_json = json_decode($result);
        
        $usr_json->isSuccessful = false;
        
        if ($username == "admin" && $password == "12345"){
            $usr_json->isSuccessful = true;
            
            $usr_json->coachToken = "5345dgv4dfghdfhghfgj5645";
            
            $usr_json->coachDetails->name = "Ali Zamani";
            
            $usr_json->coachDetails->profilePictureUrl = "https://avatars.githubusercontent.com/u/8344121?v=4";
        }
            
        if($usr_json->isSuccessful){
            $_SESSION["coachToken"] = $usr_json->coachToken;
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $usr_json->coachDetails->name;
            $_SESSION["profilePictureUrl"] = $usr_json->coachDetails->profilePictureUrl;
            
            return true;
        }else{
            $_SESSION["coachToken"] = $_SESSION["username"] = $_SESSION["name"] = $_SESSION["profilePictureUrl"] = "";
        }
        
        return false;
    }

    private function post($url,$fields) {
        try {
            $ch = curl_init();
            $header = array();
            $header[] = "Cache-Control: no-cache";
            $header[] = 'Content-type: application/json';
            $header[] = 'API-KEY:' . _APIKEY;

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        } catch (Exception $e) {
            return "[{\"status\":-1}]";
        }
    }

    

}

$apiHandler = new ApiHandler();
