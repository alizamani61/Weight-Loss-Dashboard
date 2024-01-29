<!DOCTYPE html>
<html lang="<?= _LANG ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />

        <title><?= _WEBSITE_TITLE ?></title>

        <!-- Bootstrap -->
        <link href="<?= _APPFOLDER ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= _APPFOLDER ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= _APPFOLDER ?>vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?= _APPFOLDER ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="<?= _APPFOLDER ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?= _APPFOLDER ?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="<?= _APPFOLDER ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <link href="<?= _APPFOLDER ?>vendors/pnotify/dist/pnotify.css" rel="stylesheet">
        <link href="<?= _APPFOLDER ?>vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
        <link href="<?= _APPFOLDER ?>vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
        
        <!-- Custom Theme Style --> 
        <link href="<?= _APPFOLDER ?>build/css/custom.min.css?ver=1.004" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span><?= _WEBSITE_TITLE ?></span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="<?= $_SESSION["profilePictureUrl"] ?>" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2><?= $_SESSION["name"] ?></h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br /> 

                        <?php require_once 'sidebar.php'; ?>

                        <!-- top navigation -->
                        <div class="top_nav">
                            <div class="nav_menu">
                                <div class="nav toggle">
                                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                                </div>
                                <nav class="nav navbar-nav">
                                    <ul class=" navbar-right">
                                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                                <img src="<?= $_SESSION["profilePictureUrl"] ?>" alt=""><?= $_SESSION["name"] ?>
                                            </a>
                                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item"  href="javascript:;"> Profile</a>
                                                <a class="dropdown-item"  href="javascript:;">
                                                    <span class="badge bg-red pull-right">50%</span>
                                                    <span>Settings</span>
                                                </a>
                                                <a class="dropdown-item"  href="javascript:;">Help</a>
                                                <form action="<?= _APPFOLDER . "auth/login/" ?>" method="POST">
                                                    <input type="hidden" name="logout" value="1"/>
                                                    <button type="submit" class="dropdown-item"><i class="fa fa-sign-out pull-right"></i> Log Out</button>
                                                </form>
                                                
                                            </div>
                                        </li>

                                        <li role="presentation" class="nav-item dropdown open">
                                            <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-envelope-o"></i>
                                                <span class="badge bg-green">1</span>
                                            </a>
                                            <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                                <li class="nav-item">
                                                    <a class="dropdown-item">
                                                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                        <span>
                                                            <span>Ali Zamani</span>
                                                            <span class="time">3 mins ago</span>
                                                        </span>
                                                        <span class="message">
                                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                                        </span>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- /top navigation -->



