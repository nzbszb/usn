<?php
session_start();
if(!isset($_SESSION['usn_var_id']) && !isset($_SESSION['usn_username']) && !isset($_SESSION['usn_email']) && !isset($_SESSION['usn_mobile']))
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log in-USN</title>
		<link rel="icon" type="image/gif" href="assets/images/ico/animated_favicon1.gif" >

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
              type="text/css">
        <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
        <!-- /core JS files -->


        <!-- Theme JS files -->
        <script type="text/javascript" src="assets/js/core/app.js"></script>
        <!-- /theme JS files -->

    </head>

    <body style="padding-top: 40px; padding-bottom: 40px;">

    <!-- Main navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://nazib.comeze.com/"><img src="assets/images/onlinelogomaker-010418-1811-1347.png" alt=""></a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../">
                        <i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->

    <!-- Page container -->
    <div class="page-container login-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

                    <!-- Simple login form -->
                    <form action="actions/login/" enctype="application/x-www-form-urlencoded" method="post">
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <img src="assets/images/onlinelogomaker-010418-1811-1347.png" alt="" height="120"
                                     width="240">
                                <!--								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>-->
                                <h5 class="content-group">Log in to your account
                                    <small class="display-block">Enter your credentials below</small>
                                </h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" class="form-control" name="usn_title" placeholder="Username/Email/ID"
                                       required>
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" class="form-control" name="usn_log_password"
                                       placeholder="Password" required>
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>
                            <?php
    if (isset($_SESSION['message'])) {
        ?>
        <div class="content-group-sm">
            <!-- Basic alert -->
            <div class="alert alert-danger alert-styled-left">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                            class="sr-only">Close</span></button>
                <?php echo $_SESSION['message']; ?>
            </div>
        </div>
        <?php
        unset($_SESSION['message']);
    }
                            ?>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Log in <i
                                            class="icon-circle-right2 position-right"></i></button>
                            </div>

                            <div class="text-center">
                                <a href="actions/login_password_recover">Forgot password?</a>
                            </div>

                            <div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
                            <a href="actions/registration" class="btn btn-default btn-block content-group">Sign up</a>
                        </div>
                    </form>
                    <!-- /simple login form -->


                    <!-- Footer -->
                    <div class="footer text-muted">
                        Copyright &copy; 2018. <a href="#">University Social Network</a> by <a
                                href="https://github.com/nzbszb" target="_blank">Mohammad Nazib -ul- Islam</a>
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    </body>
    </html>
<?php
}else{
    header('Location:views/user/home/');
}
    ?>
