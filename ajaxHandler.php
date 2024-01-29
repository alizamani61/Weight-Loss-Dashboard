<?php
/**
 * Description of ajaxHandler
 *
 * @author Zamani
 */
error_reporting(0);
include 'include/Constants.inc.php';

class ajaxHandler {
    public function __construct() {
        session_start();
        
        if(ISSET($_POST["cancel_subscription"]))
            $this->cancelSubscription($_POST["subscriptionToken"],$_POST["phone_number"]);
        
        if(ISSET($_POST["phone_check"]))
            $this->getUserInfo($_POST["phone_number"]);
        
        if(ISSET($_POST["add_notes_form"]))
            $this->loadAddNotesForm($_POST["userToken"],$_POST["phone_number"]);
        
        if(ISSET($_POST["add_notes_check"]))
            $this->addNotes($_POST["userToken"],$_POST["phone_number"],$_POST["type"],$_POST["data"]);
    }
    
    public function addNotes($userToken,$phoneNumber,$type,$data){
        global $apiHandler;
        $this->getUserInfo($phoneNumber);
    }
    
    public function loadAddNotesForm($userToken,$phoneNumber){
        global $apiHandler;
        require_once 'views/home/home_add_notes.php';
    }
    
    public function cancelSubscription($subscriptionToken,$phoneNumber){
        global $apiHandler;
        
        $this->cancelSubscription($subscriptionToken);
        $this->getUserInfo($phoneNumber);
    }
    
    public function getUserInfo($phoneNumber){
        global $apiHandler;
        
        //$user = $apiHandler->getUserInfo($phoneNumber);
        
        $user->data->weights = [["date" => '2024-01-01', 'weight' => 48],["date" => '2024-02-01', 'weight' => 40]];
        $user->data->userToken = "5345dgv4dfghdfhghfgj5645";
        $user->subscriptions->activeSubscription->amount = 10;
        $user->subscriptions->activeSubscription->nextBillingDate = '2024-03-01';
        $user->data->targetWeight = 30;
        $user->data->signUpTime = "10:30";
        $user->data->notes = [
                ["type" => 3, "This is a test note" => "data", "date" => "2024-01-04", "registrarCoach" => "admin"],
                ["type" => 2, "This is a test note" => "data", "date" => "2024-01-06", "registrarCoach" => "User"],
                ["type" => 1, "This is a test note" => "data", "date" => "2024-01-07", "registrarCoach" => "admin"],
                ["type" => 5, "This is a test note" => "data", "date" => "2024-01-08", "registrarCoach" => "User"]
        ];
        
        $user->data->physics->isEmpty = false;
        $user->data->physics->height = 79;
        $user->data->physics->weight = 30;
        $user->data->physics->age = 50;
        $user->data->physics->isMale = 1;
        
        $user->data->payments = [
            ["isCanceled" => true, "isRefunded" => false, "amount" => 1000, "billingDate" => "2024-01-01", "duration" => 5, "source" => "Zarinpal" ],
            ["isCanceled" => false, "isRefunded" => false, "amount" => 2000, "billingDate" => "2024-01-02", "duration" => 6, "source" => "Zarinpal" ],
            ["isCanceled" => false, "isRefunded" => true, "amount" => 1000, "billingDate" => "2024-01-06", "duration" => 1, "source" => "Zarinpal" ],
            ["isCanceled" => false, "isRefunded" => false, "amount" => 2000, "billingDate" => "2024-01-02", "duration" => 6, "source" => "Zarinpal" ],
            ["isCanceled" => false, "isRefunded" => false, "amount" => 3000, "billingDate" => "2024-01-07", "duration" => 6, "source" => "Zarinpal" ],
            ["isCanceled" => false, "isRefunded" => false, "amount" => 5000, "billingDate" => "2024-01-08", "duration" => 6, "source" => "Zarinpal" ],
            ["isCanceled" => false, "isRefunded" => false, "amount" => 6000, "billingDate" => "2024-01-09", "duration" => 6, "source" => "Zarinpal" ],
            ["isCanceled" => false, "isRefunded" => false, "amount" => 8000, "billingDate" => "2024-01-10", "duration" => 6, "source" => "Zarinpal" ],
        ];
        
                
        //populate weight json object for init_weight_chart function in custom.js
        foreach ($user->data->weights as $key =>$row) $weights .= "[".strtotime($row["date"])."000,".$row["weight"]."],";
        
        $weights = "[".rtrim($weights, ",")."]";
        
        if(!$user->error)
            require_once 'views/home/home_view_dashboard.php';
        else
            require_once 'views/home/home_view_dashboard_error.php';
    }
}

$ajax = new ajaxHandler();