<?php
error_reporting(0);
include 'include/Constants.inc.php';

if($apiHandler->IsAuthenticated()==false)
  $apiHandler->redirect(_APPFOLDER ."auth/login");


//echo  $apiHandler->getUserInfo('00909033097969');
require_once _SITE_ROOT.'header.php';
require_once _SITE_ROOT.'views/home/home_view.php';
require_once _SITE_ROOT.'footer.php';
    


?>