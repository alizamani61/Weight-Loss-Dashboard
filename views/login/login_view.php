<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= _WEBSITE_TITLE . " - " . _LOGIN_TITLE ?></title>

        <!-- Bootstrap -->
        <link href="<?= _APPFOLDER ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= _APPFOLDER ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= _APPFOLDER ?>vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="<?= _APPFOLDER ?>vendors/animate.css/animate.min.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?= _APPFOLDER ?>build/css/custom.min.css" rel="stylesheet">

        <link href="<?= _APPFOLDER ?>vendors/pnotify/dist/pnotify.css" rel="stylesheet">
        <link href="<?= _APPFOLDER ?>vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
        <link href="<?= _APPFOLDER ?>vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form action="<?= _APPFOLDER . "auth/login/" ?>" method="POST">
                            <h1>Login Form</h1>
                            <input type="hidden" name="login_flag" value="1"/>
                            <div>
                                <input name="username" type="text" class="form-control" placeholder="Username" required="" />
                            </div>
                            <div>
                                <input name="password" type="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-block">Log in</button>
                                <a class="reset_pass" href="#">Lost your password?</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">New to site?
                                    <a href="#signup" class="to_register"> Create Account </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class="fa fa-paw"></i><?= _WEBSITE_TITLE ?></h1>
                                    <p><?= _COPY_RIGHT ?></p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>


            </div>
        </div>
        
        <script src="<?= _APPFOLDER ?>vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= _APPFOLDER ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <!-- PNotify -->
        <script src="<?= _APPFOLDER ?>vendors/pnotify/dist/pnotify.js"></script>
        <script src="<?= _APPFOLDER ?>vendors/pnotify/dist/pnotify.buttons.js"></script>
        <script src="<?= _APPFOLDER ?>vendors/pnotify/dist/pnotify.nonblock.js"></script>
        <?php if ($message != ""): ?>
            <script>
                $(document).ready(function () {
                    new PNotify({title: 'Oh No!', text: '<?= $message ?>', type: 'error', styling: 'bootstrap3'});
                })
            </script>
            <?php ENDIF; ?>
    </body>
</html>
