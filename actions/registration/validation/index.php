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
    <title>Validation-USN</title>
	<link rel="icon" type="image/gif" href="../../../assets/images/ico/animated_favicon1.gif" >

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="../../../assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="../../../assets/js/core/app.js"></script>
    <!-- /theme JS files -->

</head>

<body style="padding-top: 40px; padding-bottom: 40px;">

<!-- Main navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="../../../"><img src="../../../assets/images/onlinelogomaker-010418-1811-1347.png" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="../../../../">
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

                <!-- Account Verification -->
                <form action="validate.php" method="post">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <img src="../../../assets/images/onlinelogomaker-010418-1811-1347.png" alt="" height="120" width="240">
                            <!--								<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>-->
                            <h5 class="content-group">Verification <small class="display-block">Enter the verification code sent to your email</small></h5>
                        </div>

                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="usn_code" placeholder="Your verification code" required>
                            <div class="form-control-feedback">
                                <i class="icon-key text-muted"></i>
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
                                    <small> <?php echo $_SESSION['message']; ?></small>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['message']);
                        }
                        ?>

                        <button type="submit" class="btn bg-blue btn-block">Proceed <i class="icon-arrow-right14 position-right"></i></button>
                        <a href="../" class="btn btn-link btn-block"><i class="icon-arrow-left13 position-left"></i> Back to Sign up</a>
                        <div class="text"><span>NB: If you anyhow missed validation code go to <a href="../../login_password_recover/"><u>Password recovery page</u></a> to validate account</span></div>
                    </div>
                </form>
                <!-- /password recovery -->


                <!-- Footer -->
                <div class="footer text-muted">
                    Copyright &copy; 2018. <a href="#">University Social Network</a> by <a href="https://github.com/nazibsazib" target="_blank">Mohammad Nazib -ul- Islam</a>
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
    header('Location:../../../views/user/home');
}
?>