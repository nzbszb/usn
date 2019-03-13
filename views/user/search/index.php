<?php
session_start();
//if(isset($_SESSION['message'])){
//    unset($_SESSION['message']);
//}


if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile']) && isset($_SESSION['search_result']) && isset($_SESSION['original_query'])){
include("../../../src/User/DB/database.php");
include("../../../src/User/Registration/Registration.php");
include("../../../src/User/Connection/Connection.php");
$obj = new Registration($pdo);
$data = $obj->setData($_SESSION)->profile();
$user = $obj->user_info();
foreach ($data as $key => $value) {
$obj_con = new Connection($pdo);
$data_con = $obj_con->connectionSetData($_SESSION)->connectionList();
$data_cony = $obj_con->connectionSetData($_SESSION)->receiveRequest();
$conn_num = 0;
if (!empty($data_con)) {
    foreach ($data_con as $con_key => $con_value) {
        if (($con_value['send_username'] != $_SESSION['usn_username']) || $con_value['reci_username'] != $_SESSION['usn_username']) {
            $conn_num = $conn_num + 1;
        }
    }
}
$search_result = $_SESSION['search_result'];
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Result-USN</title>
	<link rel="icon" type="image/gif" href="../../../assets/images/ico/animated_favicon1.gif" >

    <!--[if lt IE 9]-->
    <script src="../../../assets/js/html5shiv.min.js"></script>
    <script src="../../../assets/js/respond.min.js"></script>
    <!--[endif]-->

    <!-- Global stylesheets -->
    <!--            <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"-->
    <!--                  type="text/css">-->
    <link href="../../../assets/css/fonts/googleapi_css.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="../../../assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/core/libraries/jquery.form.js"></script>
    <script type="text/javascript" src="../../../assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/project_contents/usn_chat.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/project_contents/usn_notifications.min.js"></script>
    <script src="../../../assets/js/project_contents/usn_validate.min.js"></script>
    <!--            <script type="text/javascript" src="../contents/chat/chat_ntf.min.js"></script>-->
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="../../../assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/plugins/media/fancybox.min.js"></script>
    <script type="text/javascript"
            src="../../../assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="../../../assets/js/plugins/visualization/echarts/echarts.js"></script>
    <script type="text/javascript" src="../../../assets/js/plugins/uploaders/fileinput.min.js"></script>

    <script type="text/javascript" src="../../../assets/js/core/app.js"></script>
    <script type="text/javascript" src="../../../assets/js/pages/user_pages_profile.js"></script>
    <script type="text/javascript" src="../../../assets/js/pages/components_thumbnails.js"></script>
    <script type="text/javascript" src="../../../assets/js/pages/uploader_bootstrap.js"></script>
    <script type="text/javascript" src="../../../assets/js/pages/user_pages_list.js"></script>
    <!-- /theme JS files -->

</head>

<body style="padding-top: 40px;">

<!-- Main navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="../../../"><img
                    src="../../../assets/images/onlinelogomaker-010418-1811-1347.png" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">


            <!--                    Toolbar Notificfication-->
            <?php
            include('../contents/toolbar_notification/toolbar_notification.php');
            ?>
            <!--                    /toolbar notificfication-->

            <!--            Search-->
            <?php
            include('../contents/toolbar_search/toolbar_search.php');
            ?>
            <!--/search-->

        </ul>

        <ul class="nav navbar-nav navbar-right">

            <!--                    Toolbar Requests-->
            <?php
            include('../contents/toolbar_requests/toolbar_requests.php');
            ?>
            <!--                    /toolbar requests-->

            <!--                    Toolbar Messages-->
            <?php
            include('../contents/toolbar_messages/toolbar_messages.php');
            ?>
            <!--                    /toolbar messages-->


            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <?php
                    if (!empty($value['user_pic'])) {
                        ?>
                        <img src="../../../img/<?php echo $value['user_pic']; ?>" class="img-xs img-circle"
                             alt="<?php echo $value['username']; ?>" style="object-fit: cover;">
                        <?php
                    } else {
                        ?>
                        <img src="../../../assets/images/placeholder.jpg" class="img-xs img-circle"
                             alt="<?php echo $value['username']; ?>">
                        <?php
                    }
                    ?>
                    <span class="text-semibold"><?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']); ?></span>
                    <i class="caret"></i>
                </a>


                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="../home"><i
                                    class="icon-home position-left"></i>Home</a></li>
                    <li><a href="../notice"><i class="icon-stack-text position-left"></i> Notice</a></li>
                    <li><a href="../connection/"><i class="icon-collaboration position-left"></i> Connections</a>
                    </li>
                    <li><a href="../paper&journal"><i class="icon-magazine"></i> Paper & Journal</a></li>
                    <!--                            <li><a href="#profile" data-toggle="tab"><i class="icon-user-plus"></i> My profile</a></li>-->
                    <!--                            <li><a href="#"><i class="icon-coins"></i> My balance</a></li>-->
                    <!--                            <li><a href="#"><span class="badge badge-warning pull-right">58</span> <i-->
                    <!--                                            class="icon-comment-discussion"></i> Messages</a></li>-->
                    <li class="divider"></li>
                    <li><a href="../../../actions/logout"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-fixed">
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="category-content">
                        <div class="media">
                            <a href="../home/" class="media-left">
                                <?php
                                if (!empty($value['user_pic'])) {
                                    ?>
                                    <img src="../../../img/<?php echo $value['user_pic']; ?>"
                                         class="img-circle img-lg" alt="" style="object-fit: cover;">
                                    <?php
                                } else {
                                    ?>
                                    <img src="../../../assets/images/placeholder.jpg"
                                         class="img-circle img-lg" alt="">
                                    <?php
                                }
                                ?>
                            </a>
                            <div class="media-body">
                                <a href="../home/"><span
                                            class="media-heading text-semibold"><?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']); ?></span></a>
                                <div class="text-size-mini text-muted">
                                    <i class="icon-user text-size-small"></i>
                                    &nbsp;<?php echo $value['user_status']; ?>
                                </div>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list">
                                    <li>
                                        <a href="#"><i class="icon-cog3"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">

                        <div class="panel panel-flat">

                            <!-- Chat -->
                            <?php
                            include('../contents/chat_navigation/chat_navigation.php');
                            ?>

                            <!-- /chat -->

                        </div>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->
        <!--                    Chat Modal-->
        <?php
        include('../contents/chat_modal/chat_modal.php');
        ?>
        <!--                    /chat modal-->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header">

                <!-- Header content -->
                <!--                        <div class="page-header-content">-->
                <!--                            <div class="page-title">-->
                <!--                                <h4><i class="icon-arrow-left52 position-left"></i> <span-->
                <!--                                            class="text-semibold">User Pages</span> - Profile</h4>-->
                <!---->
                <!--                                <ul class="breadcrumb position-right">-->
                <!--                                    <li><a href="index.html">Home</a></li>-->
                <!--                                    <li><a href="user_pages_profile.html">User pages</a></li>-->
                <!--                                    <li class="active">Profile</li>-->
                <!--                                </ul>-->
                <!--                            </div>-->
                <!---->
                <!--                            <div class="heading-elements">-->
                <!--                                <div class="heading-btn-group">-->
                <!--                                    <a href="#" class="btn btn-link btn-float has-text"><i-->
                <!--                                                class="icon-bars-alt text-primary"></i><span>Statistics</span></a>-->
                <!--                                    <a href="#" class="btn btn-link btn-float has-text"><i-->
                <!--                                                class="icon-calculator text-primary"></i> <span>Invoices</span></a>-->
                <!--                                    <a href="#" class="btn btn-link btn-float has-text"><i-->
                <!--                                                class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!-- /header content -->


                <!-- Toolbar -->
                <div class="navbar navbar-default navbar-xs">
                    <ul class="nav navbar-nav visible-xs-block">
                        <li class="full-width text-center"><a data-toggle="collapse"
                                                              data-target="#navbar-filter"><i
                                        class="icon-menu7"></i></a></li>
                    </ul>

                    <div class="navbar-collapse collapse text-semibold" id="navbar-filter">
                        <ul class="nav navbar-nav element-active-slate-400">
                            <li class="active"><a href="#" data-toggle="tab"><i
                                            class="icon-user position-left"></i>Search Result</a></li>
                        </ul>

                        <!--                                Toolbar Right Navbar-->
                        <?php
                        include ('../contents/toolbar_right_navbar/toolbar_right_navbar.php');
                        ?>
                        <!--                                toolbar right navbar-->

                    </div>
                </div>
                <!-- /toolbar -->

            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- User profile -->
                <div class="row">
                    <div class="col-lg-9">
                        <div class="tabbable">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="connection">

                                    <!-- Profile -->
                                    <div class="content-group">


                                        <!-- Search list -->

    <?php
    if ($search_result!=0) {
    ?>
        <div class="timeline timeline-left content-group">

                    <div class="content-group-lg">
                        <!-- Basic alert -->
                        <div class="alert alert-success alert-styled-left">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                        class="sr-only">Close</span></button>
                            <?php if(sizeof($search_result)==1){?>
                                <b>'<?php echo sizeof($search_result)?>'</b> user found for <b>"<?php echo $_SESSION['original_query'] ?>"</b>
            <?php }else{?>
                                <b>'<?php echo sizeof($search_result)?>'</b> users found for <b>"<?php echo $_SESSION['original_query'] ?>"</b>
        <?php }?>
                        </div>
                    </div>

        </div>
                                        <div class="row row-eq-height">
                                            <div style="display: grid; grid-template-columns: 23.25% 23.25% 23.25% 23.25%; padding-left: 1%; padding-right: 1%; grid-gap: 2%;">
                                                <?php
                                                    foreach ($search_result as $search_keys => $search_values) {
                                                        $con_check = $obj_con->connectedConnection($search_values['username']);
                                                        ?>
                                                        <div class="thumbnail">
                                                            <?php
                                                            if($con_check->send_username!=$con_check->reci_username) {
                                                                if ($con_check->status == 'true') {
                                                                    ?>
                                                                    <div class="btn-group btn-group-justified">
                                                                        <a type="button" class="btn btn-xs bg-warning"
                                                                           href="../account/connect.php?usn_reject_username=<?php echo $search_values['username'] ?>"><i
                                                                                    class="icon-cross bg-warning position-left"></i>
                                                                            Delete Connection</a>
                                                                    </div>
                                                                    <?php
                                                                }elseif (($con_check->status == 'false') && ($con_check->send_username!=$_SESSION['usn_username'])) {
                                                                    ?>
                                                                    <div class="btn-group btn-group-justified">
                                                                        <a type="button" class="btn btn-xs bg-success"
                                                                           href="../account/connect.php?usn_accept_username=<?php echo $search_values['username'] ?>"><i
                                                                                    class="icon-check bg-success position-left"></i>
                                                                            Accept</a>
                                                                        <a type="button" class="btn btn-xs bg-warning"
                                                                           href="../account/connect.php?usn_reject_username=<?php echo $search_values['username'] ?>"><i
                                                                                    class="icon-cross bg-warning position-left"></i>
                                                                            Reject</a>
                                                                    </div>
                                                                    <?php
                                                                }elseif ($con_check->status == 'send_request') {
                                                                    ?>
                                                                    <div class="btn-group btn-group-justified">
                                                                        <a type="button" class="btn btn-xs bg-success"
                                                                           href="../account/connect.php?usn_reci_username=<?php echo $search_values['username'] ?>"><i
                                                                                    class="icon-check bg-success position-left"></i>
                                                                            Add Connection</a>

                                                                    </div>
                                                                    <?php
                                                                }elseif (($con_check->status == 'false') && ($con_check->send_username==$_SESSION['usn_username'])) {
                                                                    ?>
                                                                    <div class="btn-group btn-group-justified">
                                                                        <a type="button" class="btn btn-xs bg-warning"
                                                                           href="../account/connect.php?usn_reject_username=<?php echo $search_values['username'] ?>"><i
                                                                                    class="icon-cross bg-warning position-left"></i>
                                                                            Cancel Request</a>

                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <div class="thumb thumb-rounded"
                                                                 style="height: auto; width: auto; max-width: 140px; max-height: 140px; object-fit: cover;">
                                                                <?php
                                                                if (!empty($search_values['user_pic'])) {
                                                                    ?>
                                                                    <img src="../../../img/<?php echo $search_values['user_pic'] ?>"
                                                                         alt=""
                                                                         style="height: 140px; width: 140px; object-fit: cover;">
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <img src="../../../assets/images/placeholder.jpg"
                                                                         alt="">
                                                                    <?php
                                                                }
                                                                ?>
                                                                <div class="caption-overflow">
										<span>
                                            <?php
                                            if (!empty(($search_values['user_pic']))) {
                                                ?>
                                                <a href="../../../img/<?php echo $search_values['user_pic'] ?>"
                                                   class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i
                                                            class="icon-zoomin3"></i></a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="../../../assets/images/placeholder.jpg"
                                                   class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i
                                                            class="icon-zoomin3"></i></a>
                                                <?php
                                            }
                                            ?>
                                            <a href="../account/?user=<?php echo $search_values['username'] ?>"
                                               class="btn bg-success-400 btn-icon btn-xs"><i
                                                        class="icon-link"></i></a>
										</span>
                                                                </div>
                                                            </div>

                                                            <div class="caption text-center">
                                                                <h6 class="text-semibold no-margin">
                                                                    <a href="../account/?user=<?php echo $search_values['username'] ?>"> <?php echo $search_values['first_name'] . " " . $search_values['last_name'] ?></a>
                                                                    <small
                                                                            class="display-block"><?php echo $search_values['skills'] ?>
                                                                    </small>
                                                                    <small
                                                                            class="display-block"><?php echo $search_values['user_status'] ?>
                                                                    </small>
                                                                </h6>
                                                                <ul class="icons-list mt-15">
                                                                    <li><a href="#" data-popup="tooltip" title="Facebook"><i
                                                                                    class="icon-facebook2"></i></a></li>
                                                                    <li><a href="#" data-popup="tooltip" title="Linkedin"><i
                                                                                    class="icon-linkedin"></i></a></li>
                                                                    <li><a href="#" data-popup="tooltip" title="Github"><i
                                                                                    class="icon-github"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <?php
                                                    }
                                                        ?>
                                            </div>
                                        </div>

                                                    <?php
                                                    }else{
                                                        ?>
                                                <div class="timeline timeline-left content-group">
                                                    <div class="timeline-container">
                                                        <div class="timeline-row">
                                                            <div class="content-group-lg">
                                                                <!-- Basic alert -->
                                                                <div class="alert alert-danger alert-styled-left">
                                                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                                                                class="sr-only">Close</span></button>
                                                                    <b>'0'</b> user found for <b>"<?php echo $_SESSION['original_query'] ?>"</b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        <?php
                                                    }
                                                    ?>


                                                <!-- /Search list -->



                                            </div>
                                            <!-- /profile -->

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">

                                <!-- User thumbnail -->
                                <?php
                                include ('../contents/default_user_thumbnail/default_user_thumbnail.php');
                                ?>
                                <!-- /user thumbnail -->


                                <!-- Right Navigation -->
                                <?php
                                include ('../contents/right_navigation/right_navigation.php');
                                ?>
                                <!-- /right navigation -->


                                <!-- Users List -->
                                <?php
                                include ('../contents/users_list/users_list.php');
                                ?>
                                <!-- /users list -->
                                <br/><br/><br/>

                                <!-- Footer -->
                                <div class="footer text-muted text-center">
                                    Copyright &copy; 2018. <a href="#">University Social Network</a> by <a
                                            href="https://github.com/nazibsazib" target="_blank">Mohammad Nazib -ul- Islam</a>
                                </div>
                                <!-- /footer -->


                            </div>
                        </div>
                        <!-- /user profile -->



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

    }
}else{
    $_SESSION['message'] = 'You must login first!';
    header('location:../../../');
}
?>
