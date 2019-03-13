<?php
session_start();
//if(isset($_SESSION['message'])){
//    unset($_SESSION['message']);
//}
if(isset($_SESSION['search_result'])){
    unset($_SESSION['search_result']);
}
if(isset($_SESSION['original_query'])){
    unset($_SESSION['original_query']);
}

if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile']) ){
include("../../../src/User/DB/database.php");
include("../../../src/User/Registration/Registration.php");
include("../../../src/User/Post/Post.php");
include("../../../src/User/Connection/Connection.php");
$obj = new Registration($pdo);
$data = $obj->setData($_SESSION)->profile();
if(!empty($_GET['user'])) {
    $acctinfo = $obj->account($_GET);
}else{
    $_GET['user'] = $_SESSION['usn_username'];
    $acctinfo = $obj->account($_GET);
}
$user = $obj->user_info();
foreach ($data as $key => $value) {
    foreach ($acctinfo as $key1 => $value_user) {
        $post_obj = new Post($pdo);
        $feedpost = $post_obj->postSetData($_SESSION)->viewFeedPost();
        $mypost = $post_obj->postSetData($_GET)->viewMyPost();
        $obj_con = new Connection($pdo);
        $data_cony = $obj_con->connectionSetData($_GET)->connectionSetData($_SESSION)->receiveRequest();
        $data_con = $obj_con->connectionSetData($_SESSION)->connectionList();
        $conn_num = 0;
        if(!empty($data_con)) {
            foreach ($data_con as $con_key => $con_value) {
                if (($con_value['send_username'] != $_SESSION['usn_username']) || $con_value['reci_username'] != $_SESSION['usn_username']) {
                    $conn_num = $conn_num + 1;
                }
            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php echo ucwords($value_user['first_name']).' '.ucwords($value_user['last_name']) ?>-USN</title>
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
            <link href="../../../assets/css/project_contents/usn.css" rel="stylesheet" type="text/css">
            <!-- /global stylesheets -->

            <!-- Core JS files -->
            <script type="text/javascript" src="../../../assets/js/plugins/loaders/pace.min.js"></script>
            <script type="text/javascript" src="../../../assets/js/core/libraries/jquery.min.js"></script>
            <script type="text/javascript" src="../../../assets/js/core/libraries/jquery.form.js"></script>
            <script type="text/javascript" src="../../../assets/js/core/libraries/bootstrap.min.js"></script>
            <script type="text/javascript" src="../../../assets/js/plugins/loaders/blockui.min.js"></script>
            <script type="text/javascript" src="../../../assets/js/project_contents/usn_chat.min.js"></script>
            <script type="text/javascript" src="../../../assets/js/project_contents/usn_post_comment.min.js"></script>
            <script type="text/javascript" src="../../../assets/js/project_contents/usn_notifications.min.js"></script>
            <script type="text/javascript" src="../../../assets/js/project_contents/usn_all_clicks.min.js"></script>
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
                    include ('../contents/toolbar_notification/toolbar_notification.php');
                    ?>
                    <!--                    /toolbar notificfication-->

                    <!--            Search-->
                    <?php
                    include ('../contents/toolbar_search/toolbar_search.php');
                    ?>
                    <!--/search-->

                </ul>

                <ul class="nav navbar-nav navbar-right">


                    <!--                    Account Toolbar Status-->
                    <?php
                    include ('../contents/account_toolbar_status/account_toolbar_status.php');
                    ?>
                    <!--                    /account toolbar status-->

                    <!--                    Toolbar Messages-->
                    <?php
                    include ('../contents/toolbar_messages/toolbar_messages.php');
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
                            }else {
                                ?>
                                <img src="../../../assets/images/placeholder.jpg" class="img-xs img-circle"
                                     alt="<?php echo $value['username']; ?>">
                                <?php
                            }
                            ?>
                            <span class="text-semibold"><?php echo ucwords($value['first_name']).' '.ucwords($value['last_name']); ?></span>
                            <i class="caret"></i>
                        </a>


                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a id="drop-posts"><i
                                            class="icon-pencil6 position-left"></i><?php echo ucwords($value_user['first_name']).' '.ucwords($value_user['last_name']); ?>'s Posts</a></li>

                            <li><a id="drop-profile"><i class="icon-profile position-left"></i>
                                    Profile info</a></li>
                            <li class="divider"></li>
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
                                        }else {
                                            ?>
                                            <img src="../../../assets/images/placeholder.jpg"
                                                 class="img-circle img-lg" alt="">
                                            <?php
                                        }
                                        ?>
                                    </a>
                                    <div class="media-body">
                                        <a href="../home/"><span
                                            class="media-heading text-semibold"><?php echo ucwords($value['first_name']).' '.ucwords($value['last_name']); ?></span></a>
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

                <!--                    Seen Modal-->
                <?php
                include('../contents/seen_modal/seen_modal.php');
                ?>
                <!--                    /seen modal-->

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

                            <div class="navbar-collapse collapse  text-semibold" id="navbar-filter">
                                <ul class="nav navbar-nav element-active-slate-400">
                                    <li class="active"><a href="#posts" id="posts-nav" data-toggle="tab"><i
                                                class="icon-pencil6 position-left"></i><?php echo ucwords($value_user['first_name']).' '.ucwords($value_user['last_name']); ?>'s Posts</a></li>

                                    <li><a href="#profile" id="profile-nav" data-toggle="tab"><i class="icon-profile position-left"></i>
                                            Profile info</a></li>
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
                                        <div class="tab-pane fade in active" id="posts">

                                            <!-- Profile Posts-->
                                            <div class="timeline timeline-left content-group">
                                                <div class="timeline-container">


                                                    <!-- Blog post -->
                                                    <?php

                                                    if (!empty($mypost)) {
                                                        $post_count = 0;
                                                        foreach ($mypost as $key2 => $post_details_f) {
                                                            $con_check = $obj_con->connectedConnection($post_details_f['username']);
                                                            if ($con_check->status == 'true') {
                                                                if(($post_details_f['access_type']=='true_all') || ($post_details_f['access_type']=='true_con')) {
                                                                    $post_user = $post_obj->postUser($post_details_f['username']);
                                                                    $post_count = $post_count + 1;
                                                                    ?>
                                                                    <div class="timeline-row">
                                                                        <div class="timeline-icon">
                                                                            <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                                <?php
                                                                                if (!empty($post_user[0]['user_pic'])) {
                                                                                    ?>
                                                                                    <img src="../../../img/<?php echo $post_user[0]['user_pic'] ?>"
                                                                                         alt="<?php echo $post_user[0]['username'] ?>"
                                                                                         style="object-fit: cover;">
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <img src="../../../assets/images/placeholder.jpg"
                                                                                         alt="<?php echo $post_user[0]['username'] ?>">
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </a>
                                                                        </div>

                                                                        <div class="panel panel-flat timeline-content">
                                                                            <div class="panel-heading">
                                                                            <span class="media-heading text-semibold text-capitalize"><a
                                                                                        href="../account/?user=<?php echo $post_user[0]['username']; ?>"><?php echo $post_user[0]['first_name'] . ' ' . $post_user[0]['last_name']; ?></a></span>
                                                                                <div class="text-size-mini text-muted">
                                                                                    <i class="icon-user text-size-small"></i>
                                                                                    &nbsp;<?php echo $post_user[0]['user_status']; ?>
                                                                                    <span class="heading-text"
                                                                                          id="userlocalDateTime<?php echo $post_count; ?>"></span>
                                                                                </div>
                                                                                <div class="heading-elements">
                                                                                    <!--                                                                <span class="heading-text"><i class="icon-checkmark-circle position-left text-success"></i> 49 minutes ago</span>-->


                                                                                    <script>
                                                                                        var local = "<?php echo $post_details_f['post_utc_time']; ?>";
                                                                                        var localDate = new Date(local);
                                                                                        var today = new Date();
                                                                                        var old_date = localDate.getDate();
                                                                                        var new_date = today.getDate();
                                                                                        var old_month = localDate.getMonth();
                                                                                        var new_month = today.getMonth();
                                                                                        var old_year = localDate.getYear();
                                                                                        var new_year = today.getYear();
                                                                                        var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                                                                                        var day = days[localDate.getDay()];

                                                                                        if ((new_date - old_date) == 0) {
                                                                                            day = 'Today';

                                                                                            var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                                month: 'short',
                                                                                                day: 'numeric'
                                                                                            });

                                                                                            var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                                hour: '2-digit',
                                                                                                minute: '2-digit'
                                                                                            });
                                                                                            $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                            document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                        }
                                                                                        if ((new_date - old_date) == 1) {
                                                                                            day = 'Yesterday';

                                                                                            var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                                month: 'short',
                                                                                                day: 'numeric'
                                                                                            });

                                                                                            var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                                hour: '2-digit',
                                                                                                minute: '2-digit'
                                                                                            });
                                                                                            $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                            document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                        }
                                                                                        if (((new_date - old_date) > 1) || ((new_date - old_date) < 0)) {


                                                                                            var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                                month: 'short',
                                                                                                day: 'numeric'
                                                                                            });


                                                                                            var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                                hour: '2-digit',
                                                                                                minute: '2-digit'
                                                                                            });

                                                                                            $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                            document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                        }

                                                                                    </script>


                                                                                    <ul class="icons-list">
                                                                                        <li class="dropdown">
                                                                                            <a href="#"
                                                                                               class="dropdown-toggle"
                                                                                               data-toggle="dropdown">
                                                                                                <i class="icon-arrow-down12"></i>
                                                                                            </a>

                                                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                                                <li><a href="../account/connect.php?usn_reject_username=<?php echo $post_details_f['username'] ?>"><i
                                                                                                                class="icon-user-minus"></i>
                                                                                                        Delete Connection</a>
                                                                                                </li>
                                                                                                <li class="divider"></li>
                                                                                                <li><a href="../post/?user=<?php echo $post_details_f['username'] ?>&pid=<?php echo $post_details_f['post_id'] ?>"><i
                                                                                                                class="icon-embed"></i>
                                                                                                        Read Post</a></li>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel-heading"
                                                                                 style="margin-left: 5%">
                                                                                <?php
                                                                                //                                                                        print_r($post_details_f['username']);
                                                                                //                                                                        print_r($value_user['username']);
                                                                                //                                                                        die();
                                                                                if (!empty($post_details_f['post_details'])) {
                                                                                    ?>
                                                                                    <h6 class="panel-title"
                                                                                        style="white-space: pre-line"><?php echo $post_details_f['post_details'] ?>
                                                                                        <br><br></h6>
                                                                                    <?php
                                                                                }
                                                                                if (!empty($post_details_f['post_photo'])) {
                                                                                    ?> <a href="../../../img/<?php
                                                                                    if (!empty(explode(":", $post_details_f['post_photo'])[1])) {
                                                                                        echo explode(":", $post_details_f['post_photo'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['post_photo'])[0];
                                                                                    } ?>"
                                                                                          class="display-block content-group"
                                                                                          data-popup="lightbox"
                                                                                          data-popup="tooltip"
                                                                                          title="<?php if (!empty($post_details_f['post_details'])) {
                                                                                              echo $post_details_f['post_details'];
                                                                                          } ?>">
                                                                                        <img src="../../../img/<?php
                                                                                        if (!empty(explode(":", $post_details_f['post_photo'])[1])) {
                                                                                            echo explode(":", $post_details_f['post_photo'])[1];
                                                                                        } else {
                                                                                            echo explode(":", $post_details_f['post_photo'])[0];
                                                                                        } ?>"
                                                                                             class="img-responsive content-group"
                                                                                             alt="">
                                                                                    </a>
                                                                                    <?php
                                                                                } elseif (!empty($post_details_f['post_file'])) {
                                                                                    if($post_details_f['post_file']!='broken_image_link.png'){
                                                                                    ?>
                                                                                    <a href="../../../files/<?php
                                                                                    if (!empty(explode(":", $post_details_f['post_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['post_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['post_file'])[0];
                                                                                    } ?>"
                                                                                       class="display-block content-group"
                                                                                       data-popup="tooltip"
                                                                                       title="<?php if (!empty($post_details_f['post_details'])) {
                                                                                           echo $post_details_f['post_details'];
                                                                                       } else {
                                                                                           echo $post_details_f['post_file'];
                                                                                       } ?>">

                                                                                        <h6 class="panel-title"><?php echo explode(":", $post_details_f['post_file'])[0] ?></h6>
                                                                                    </a>
                                                                                <?php
                                                                                    }
                                                                                    else{
                                                                                        ?>
                                                                                        <img src="../../../img/broken_image_link.png" class="img-responsive content-group" alt="">

                                                                                        <?php
                                                                                    }
                                                                                    }
                                                                                ?>
                                                                            </div>


                                                                            <div class="panel-footer">
                                                                                <ul>
                                                                                    <?php $seen_count_f = $post_obj->seenCount($post_details_f['post_id']); ?>
                                                                                    <li><?php if ($seen_count_f['seen_status'] == 0) { ?>
                                                                                            <a id="seen-count<?php echo $post_details_f['post_id'] ?>"
                                                                                               data-popup="tooltip"
                                                                                               title="Seen"
                                                                                               class="seen-change"
                                                                                               data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                               data-send_username="<?php echo $value['username'] ?>"
                                                                                               data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                               data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']); ?>"
                                                                                               data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?>"><i
                                                                                                        class="icon-eye4 position-left grow hover"></i></a>
                                                                                            <a href="#seen_group"
                                                                                               id="seen-group<?php echo $post_details_f['post_id'] ?>"
                                                                                               class="seen-group"
                                                                                               data-toggle="modal"
                                                                                               data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                               data-username="<?php echo $post_user[0]['username'] ?>"><?php echo $seen_count_f['seen_count']; ?></a>
                                                                                        <?php } else { ?>
                                                                                            <a id="seen-count<?php echo $post_details_f['post_id'] ?>"
                                                                                               data-popup="tooltip"
                                                                                               title="Unseen"
                                                                                               class="seen-change"
                                                                                               data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                               data-send_username="<?php echo $value['username'] ?>"
                                                                                               data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                               data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']); ?>"
                                                                                               data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?>"><i
                                                                                                        class="icon-eye4 text-primary position-left grow hover"></i></a>
                                                                                            <a href="#seen_group"
                                                                                               id="seen-group<?php echo $post_details_f['post_id'] ?>"
                                                                                               class="seen-group"
                                                                                               data-toggle="modal"
                                                                                               data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                               data-username="<?php echo $post_user[0]['username'] ?>"><?php echo $seen_count_f['seen_count']; ?></a>
                                                                                        <?php } ?>
                                                                                    </li>
                                                                                    <?php $comment_count_f = $post_obj->commentCount($post_details_f['post_id']); ?>
                                                                                    <li>
                                                                                        <a id="comment-count<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-popup="tooltip"
                                                                                           title="Comment"
                                                                                           class="opnmycomment"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-send_username="<?php echo $value['username'] ?>"
                                                                                           data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                           data-reci_user_pic="<?php echo $post_user[0]['user_pic'] ?>"
                                                                                           data-send_user_pic="<?php echo $value['user_pic'] ?>"><i
                                                                                                    class="icon-comment-discussion position-left grow hover"></i><?php echo $comment_count_f['comment_count'] ?>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>

                                                                                <ul class="pull-right">
                                                                                    <li>
                                                                                        <a href="../post/?user=<?php echo $post_details_f['username'] ?>&pid=<?php echo $post_details_f['post_id'] ?>">Read
                                                                                            post <i
                                                                                                    class="icon-arrow-right14 position-right"></i></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="comment-box">
                                                                                <ul id="comment-content<?php echo $post_details_f['post_id'] ?>"
                                                                                    class="comment-content media-list post-list content-group">

                                                                                </ul>
                                                                            </div>
                                                                            <div class="comment-post">
                                                                                <form id="comment-form<?php echo $post_details_f['post_id'] ?>"
                                                                                      name="<?php echo $post_details_f['post_id'] ?>"
                                                                                      class="comment-form">
                                                                                <textarea
                                                                                        data-post_id="<?php echo $post_details_f['post_id'] ?>"
                                                                                        data-send_username="<?php echo $value['username'] ?>"
                                                                                        data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                        data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']) ?>"
                                                                                        data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']) ?>"
                                                                                        name="usn_comment_message"
                                                                                        class="form-control content-group comment-text"
                                                                                        rows="1" cols="1"
                                                                                        placeholder="Press Enter to post comment..."></textarea>
                                                                                    <input id="comment_post_id"
                                                                                           name="comment_post_id"
                                                                                           value="<?php echo $post_details_f['post_id'] ?>"
                                                                                           type="hidden">
                                                                                    <input id="comment_send_username"
                                                                                           name="comment_send_username"
                                                                                           value="<?php echo $value['username'] ?>"
                                                                                           type="hidden">
                                                                                    <input id="comment_reci_username"
                                                                                           name="comment_reci_username"
                                                                                           value="<?php echo $post_user[0]['username'] ?>"
                                                                                           type="hidden">
                                                                                    <input id="comment_send_fullname"
                                                                                           name="comment_send_fullname"
                                                                                           value="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']) ?>"
                                                                                           type="hidden">
                                                                                    <input id="comment_reci_fullname"
                                                                                           name="comment_reci_fullname"
                                                                                           value="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']) ?>"
                                                                                           type="hidden">
                                                                                    <input id="comment_type"
                                                                                           name="comment_type"
                                                                                           value="comment_post"
                                                                                           type="hidden">
                                                                                    <input id="usn_comment_date"
                                                                                           name="usn_comment_date"
                                                                                           type="hidden">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12 text-right">
                                                                                            <button type="submit"
                                                                                                    id="<?php echo $post_details_f['post_id'] ?>"
                                                                                                    class="btn bg-teal-400 btn-labeled btn-labeled-right submitCommentform">
                                                                                                <b><i class="icon-circle-right2"></i></b>
                                                                                                Comment
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <?php

                                                                }
                                                                    }elseif($post_details_f['username'] == $_SESSION['usn_username']){
                                                                $post_user = $post_obj->postUser($post_details_f['username']);
                                                                $post_count = $post_count + 1;
                                                                ?>
                                                                <div id="post-message<?php echo $post_details_f['post_id'] ?>" class="timeline-row">
                                                                    <div class="timeline-icon">
                                                                        <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                            <?php
                                                                            if (!empty($post_user[0]['user_pic'])) {
                                                                                ?>
                                                                                <img src="../../../img/<?php echo $post_user[0]['user_pic'] ?>"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"
                                                                                     style="object-fit: cover;">
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <img src="../../../assets/images/placeholder.jpg"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>">
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </a>
                                                                    </div>

                                                                    <div class="panel panel-flat timeline-content">
                                                                        <div class="panel-heading">
                                                                            <span class="media-heading text-semibold text-capitalize"><a
                                                                                        href="../account/?user=<?php echo $post_user[0]['username']; ?>"><?php echo $post_user[0]['first_name'] . ' ' . $post_user[0]['last_name']; ?></a></span>
                                                                            <div class="text-size-mini text-muted">
                                                                                <i class="icon-user text-size-small"></i>
                                                                                &nbsp;<?php echo $post_user[0]['user_status']; ?>
                                                                                <span class="heading-text"
                                                                                      id="userlocalDateTime<?php echo $post_count; ?>"></span>
                                                                            </div>
                                                                            <div class="heading-elements">
                                                                                <!--                                                                <span class="heading-text"><i class="icon-checkmark-circle position-left text-success"></i> 49 minutes ago</span>-->


                                                                                <script>
                                                                                    var local = "<?php echo $post_details_f['post_utc_time']; ?>";
                                                                                    var localDate = new Date(local);
                                                                                    var today = new Date();
                                                                                    var old_date = localDate.getDate();
                                                                                    var new_date = today.getDate();
                                                                                    var old_month = localDate.getMonth();
                                                                                    var new_month = today.getMonth();
                                                                                    var old_year = localDate.getYear();
                                                                                    var new_year = today.getYear();
                                                                                    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                                                                                    var day = days[localDate.getDay()];

                                                                                    if ((new_date - old_date) == 0) {
                                                                                        day = 'Today';

                                                                                        var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                            month: 'short',
                                                                                            day: 'numeric'
                                                                                        });

                                                                                        var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                            hour: '2-digit',
                                                                                            minute: '2-digit'
                                                                                        });
                                                                                        $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }
                                                                                    if ((new_date - old_date) == 1) {
                                                                                        day = 'Yesterday';

                                                                                        var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                            month: 'short',
                                                                                            day: 'numeric'
                                                                                        });

                                                                                        var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                            hour: '2-digit',
                                                                                            minute: '2-digit'
                                                                                        });
                                                                                        $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }
                                                                                    if (((new_date - old_date) > 1) || ((new_date - old_date) < 0)) {


                                                                                        var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                            month: 'short',
                                                                                            day: 'numeric'
                                                                                        });


                                                                                        var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                            hour: '2-digit',
                                                                                            minute: '2-digit'
                                                                                        });

                                                                                        $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }

                                                                                </script>


                                                                                <ul class="icons-list">
                                                                                    <li class="dropdown">
                                                                                        <a href="#"
                                                                                           class="dropdown-toggle"
                                                                                           data-toggle="dropdown">
                                                                                            <i class="icon-arrow-down12"></i>
                                                                                        </a>

                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                            <li><a href="#" class="delete-post" data-del_username="<?php echo $_SESSION['usn_username'] ?>" data-post_id="<?php echo $post_details_f['post_id'] ?>"><i
                                                                                                            class="icon-file-minus"></i>
                                                                                                    Delete Post</a>
                                                                                            </li>
                                                                                            <li class="divider"></li>
                                                                                            <li><a href="../post/?user=<?php echo $post_details_f['username'] ?>&pid=<?php echo $post_details_f['post_id'] ?>"><i
                                                                                                            class="icon-embed"></i>
                                                                                                    Read Post</a></li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-heading"
                                                                             style="margin-left: 5%">
                                                                            <?php
                                                                            //                                                                        print_r($post_details_f['username']);
                                                                            //                                                                        print_r($value_user['username']);
                                                                            //                                                                        die();
                                                                            if (!empty($post_details_f['post_details'])) {
                                                                                ?>
                                                                                <h6 class="panel-title"
                                                                                    style="white-space: pre-line"><?php echo $post_details_f['post_details'] ?>
                                                                                    <br><br></h6>
                                                                                <?php
                                                                            }
                                                                            if (!empty($post_details_f['post_photo'])) {
                                                                                ?>
                                                                                <a href="../../../img/<?php
                                                                                if (!empty(explode(":", $post_details_f['post_photo'])[1])) {
                                                                                    echo explode(":", $post_details_f['post_photo'])[1];
                                                                                } else {
                                                                                    echo explode(":", $post_details_f['post_photo'])[0];
                                                                                } ?>"
                                                                                   class="display-block content-group"
                                                                                   data-popup="lightbox"
                                                                                   data-popup="tooltip"
                                                                                   title="<?php if (!empty($post_details_f['post_details'])) {
                                                                                       echo $post_details_f['post_details'];
                                                                                   } ?>">
                                                                                    <img src="../../../img/<?php
                                                                                    if (!empty(explode(":", $post_details_f['post_photo'])[1])) {
                                                                                        echo explode(":", $post_details_f['post_photo'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['post_photo'])[0];
                                                                                    } ?>"
                                                                                         class="img-responsive content-group"
                                                                                         alt="">
                                                                                </a>
                                                                                <?php
                                                                            } elseif (!empty($post_details_f['post_file'])) {
                                                                                if($post_details_f['post_file']!='broken_image_link.png'){
                                                                                ?>
                                                                                <a href="../../../files/<?php
                                                                                if (!empty(explode(":", $post_details_f['post_file'])[1])) {
                                                                                    echo explode(":", $post_details_f['post_file'])[1];
                                                                                } else {
                                                                                    echo explode(":", $post_details_f['post_file'])[0];
                                                                                } ?>"
                                                                                   class="display-block content-group"
                                                                                   data-popup="tooltip"
                                                                                   title="<?php if (!empty($post_details_f['post_details'])) {
                                                                                       echo $post_details_f['post_details'];
                                                                                   } else {
                                                                                       echo $post_details_f['post_file'];
                                                                                   } ?>">

                                                                                    <h6 class="panel-title"><?php echo explode(":", $post_details_f['post_file'])[0] ?></h6>
                                                                                </a>
                                                                            <?php
                                                                                }
                                                                                else{
                                                                                    ?>
                                                                                    <img src="../../../img/broken_image_link.png" class="img-responsive content-group" alt="">

                                                                                    <?php
                                                                                }
                                                                                }
                                                                            ?>
                                                                        </div>


                                                                        <div class="panel-footer">
                                                                            <ul>
                                                                                <?php $seen_count_f = $post_obj->seenCount($post_details_f['post_id']); ?>
                                                                                <li><?php if ($seen_count_f['seen_status'] == 0) { ?>
                                                                                        <a id="seen-count<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-popup="tooltip"
                                                                                           title="Seen"
                                                                                           class="seen-change"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-send_username="<?php echo $value['username'] ?>"
                                                                                           data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                           data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']); ?>"
                                                                                           data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?>"><i
                                                                                                    class="icon-eye4 position-left grow hover"></i></a>
                                                                                        <a href="#seen_group"
                                                                                           id="seen-group<?php echo $post_details_f['post_id'] ?>"
                                                                                           class="seen-group"
                                                                                           data-toggle="modal"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-username="<?php echo $post_user[0]['username'] ?>"><?php echo $seen_count_f['seen_count']; ?></a>
                                                                                    <?php } else { ?>
                                                                                        <a id="seen-count<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-popup="tooltip"
                                                                                           title="Unseen"
                                                                                           class="seen-change"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-send_username="<?php echo $value['username'] ?>"
                                                                                           data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                           data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']); ?>"
                                                                                           data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?>"><i
                                                                                                    class="icon-eye4 text-primary position-left grow hover"></i></a>
                                                                                        <a href="#seen_group"
                                                                                           id="seen-group<?php echo $post_details_f['post_id'] ?>"
                                                                                           class="seen-group"
                                                                                           data-toggle="modal"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-username="<?php echo $post_user[0]['username'] ?>"><?php echo $seen_count_f['seen_count']; ?></a>
                                                                                    <?php } ?></li>
                                                                                <?php $comment_count_f = $post_obj->commentCount($post_details_f['post_id']); ?>
                                                                                <li>
                                                                                    <a id="comment-count<?php echo $post_details_f['post_id'] ?>"
                                                                                       data-popup="tooltip"
                                                                                       title="Comment"
                                                                                       class="opnmycomment"
                                                                                       data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                       data-send_username="<?php echo $value['username'] ?>"
                                                                                       data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                       data-reci_user_pic="<?php echo $post_user[0]['user_pic'] ?>"
                                                                                       data-send_user_pic="<?php echo $value['user_pic'] ?>"><i
                                                                                                class="icon-comment-discussion position-left grow hover"></i><?php echo $comment_count_f['comment_count'] ?>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>

                                                                            <ul class="pull-right">
                                                                                <li>
                                                                                    <a href="../post/?user=<?php echo $post_details_f['username'] ?>&pid=<?php echo $post_details_f['post_id'] ?>">Read
                                                                                        post <i
                                                                                                class="icon-arrow-right14 position-right"></i></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="comment-box">
                                                                            <ul id="comment-content<?php echo $post_details_f['post_id'] ?>"
                                                                                class="comment-content media-list post-list content-group">

                                                                            </ul>
                                                                        </div>
                                                                        <div class="comment-post">
                                                                            <form id="comment-form<?php echo $post_details_f['post_id'] ?>"
                                                                                  name="<?php echo $post_details_f['post_id'] ?>"
                                                                                  class="comment-form">
                                                                                <textarea
                                                                                        data-post_id="<?php echo $post_details_f['post_id'] ?>"
                                                                                        data-send_username="<?php echo $value['username'] ?>"
                                                                                        data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                        data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']) ?>"
                                                                                        data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']) ?>"
                                                                                        name="usn_comment_message"
                                                                                        class="form-control content-group comment-text"
                                                                                        rows="1" cols="1"
                                                                                        placeholder="Press Enter to post comment..."></textarea>
                                                                                <input id="comment_post_id"
                                                                                       name="comment_post_id"
                                                                                       value="<?php echo $post_details_f['post_id'] ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_send_username"
                                                                                       name="comment_send_username"
                                                                                       value="<?php echo $value['username'] ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_reci_username"
                                                                                       name="comment_reci_username"
                                                                                       value="<?php echo $post_user[0]['username'] ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_send_fullname"
                                                                                       name="comment_send_fullname"
                                                                                       value="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']) ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_reci_fullname"
                                                                                       name="comment_reci_fullname"
                                                                                       value="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']) ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_type"
                                                                                       name="comment_type"
                                                                                       value="comment_post"
                                                                                       type="hidden">
                                                                                <input id="usn_comment_date"
                                                                                       name="usn_comment_date"
                                                                                       type="hidden">
                                                                                <div class="row">
                                                                                    <div class="col-xs-12 text-right">
                                                                                        <button type="submit"
                                                                                                id="<?php echo $post_details_f['post_id'] ?>"
                                                                                                class="btn bg-teal-400 btn-labeled btn-labeled-right submitCommentform">
                                                                                            <b><i class="icon-circle-right2"></i></b>
                                                                                            Comment
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }elseif(($con_check->status == 'send_request') && ($post_details_f['access_type']=='true_all')) {
                                                                $post_user = $post_obj->postUser($post_details_f['username']);
                                                                $post_count = $post_count + 1;
                                                                ?>
                                                                <div class="timeline-row">
                                                                    <div class="timeline-icon">
                                                                        <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                            <?php
                                                                            if (!empty($post_user[0]['user_pic'])) {
                                                                                ?>
                                                                                <img src="../../../img/<?php echo $post_user[0]['user_pic'] ?>"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"
                                                                                     style="object-fit: cover;">
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <img src="../../../assets/images/placeholder.jpg"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>">
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </a>
                                                                    </div>

                                                                    <div class="panel panel-flat timeline-content">
                                                                        <div class="panel-heading">
                                                                            <span class="media-heading text-semibold text-capitalize"><a
                                                                                        href="../account/?user=<?php echo $post_user[0]['username']; ?>"><?php echo $post_user[0]['first_name'] . ' ' . $post_user[0]['last_name']; ?></a></span>
                                                                            <div class="text-size-mini text-muted">
                                                                                <i class="icon-user text-size-small"></i>
                                                                                &nbsp;<?php echo $post_user[0]['user_status']; ?>
                                                                                <span class="heading-text"
                                                                                      id="userlocalDateTime<?php echo $post_count; ?>"></span>
                                                                            </div>
                                                                            <div class="heading-elements">
                                                                                <!--                                                                <span class="heading-text"><i class="icon-checkmark-circle position-left text-success"></i> 49 minutes ago</span>-->


                                                                                <script>
                                                                                    var local = "<?php echo $post_details_f['post_utc_time']; ?>";
                                                                                    var localDate = new Date(local);
                                                                                    var today = new Date();
                                                                                    var old_date = localDate.getDate();
                                                                                    var new_date = today.getDate();
                                                                                    var old_month = localDate.getMonth();
                                                                                    var new_month = today.getMonth();
                                                                                    var old_year = localDate.getYear();
                                                                                    var new_year = today.getYear();
                                                                                    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                                                                                    var day = days[localDate.getDay()];

                                                                                    if ((new_date - old_date) == 0) {
                                                                                        day = 'Today';

                                                                                        var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                            month: 'short',
                                                                                            day: 'numeric'
                                                                                        });

                                                                                        var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                            hour: '2-digit',
                                                                                            minute: '2-digit'
                                                                                        });
                                                                                        $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }
                                                                                    if ((new_date - old_date) == 1) {
                                                                                        day = 'Yesterday';

                                                                                        var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                            month: 'short',
                                                                                            day: 'numeric'
                                                                                        });

                                                                                        var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                            hour: '2-digit',
                                                                                            minute: '2-digit'
                                                                                        });
                                                                                        $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }
                                                                                    if (((new_date - old_date) > 1) || ((new_date - old_date) < 0)) {


                                                                                        var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                            month: 'short',
                                                                                            day: 'numeric'
                                                                                        });


                                                                                        var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                            hour: '2-digit',
                                                                                            minute: '2-digit'
                                                                                        });

                                                                                        $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }

                                                                                </script>


                                                                                <ul class="icons-list">
                                                                                    <li class="dropdown">
                                                                                        <a href="#"
                                                                                           class="dropdown-toggle"
                                                                                           data-toggle="dropdown">
                                                                                            <i class="icon-arrow-down12"></i>
                                                                                        </a>

                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                            <li><a href="../account/connect.php?usn_reci_username=<?php echo $post_details_f['username'] ?>"><i
                                                                                                            class="icon-user-plus"></i>
                                                                                                    Add Connection</a>
                                                                                            </li>
                                                                                            <li class="divider"></li>
                                                                                            <li><a href="../post/?user=<?php echo $post_details_f['username'] ?>&pid=<?php echo $post_details_f['post_id'] ?>"><i
                                                                                                            class="icon-embed"></i>
                                                                                                    Read Post</a></li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-heading"
                                                                             style="margin-left: 5%">
                                                                            <?php
                                                                            //                                                                        print_r($post_details_f['username']);
                                                                            //                                                                        print_r($value_user['username']);
                                                                            //                                                                        die();
                                                                            if (!empty($post_details_f['post_details'])) {
                                                                                ?>
                                                                                <h6 class="panel-title"
                                                                                    style="white-space: pre-line"><?php echo $post_details_f['post_details'] ?>
                                                                                    <br><br></h6>
                                                                                <?php
                                                                            }
                                                                            if (!empty($post_details_f['post_photo'])) {
                                                                                ?> <a href="../../../img/<?php
                                                                                if (!empty(explode(":", $post_details_f['post_photo'])[1])) {
                                                                                    echo explode(":", $post_details_f['post_photo'])[1];
                                                                                } else {
                                                                                    echo explode(":", $post_details_f['post_photo'])[0];
                                                                                } ?>"
                                                                                      class="display-block content-group"
                                                                                      data-popup="lightbox"
                                                                                      data-popup="tooltip"
                                                                                      title="<?php if (!empty($post_details_f['post_details'])) {
                                                                                          echo $post_details_f['post_details'];
                                                                                      } ?>">
                                                                                    <img src="../../../img/<?php
                                                                                    if (!empty(explode(":", $post_details_f['post_photo'])[1])) {
                                                                                        echo explode(":", $post_details_f['post_photo'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['post_photo'])[0];
                                                                                    } ?>"
                                                                                         class="img-responsive content-group"
                                                                                         alt="">
                                                                                </a>
                                                                                <?php
                                                                            } elseif (!empty($post_details_f['post_file'])) {
                                                                                if($post_details_f['post_file']!='broken_image_link.png'){
                                                                                    ?>
                                                                                    <a href="../../../files/<?php
                                                                                    if (!empty(explode(":", $post_details_f['post_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['post_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['post_file'])[0];
                                                                                    } ?>"
                                                                                       class="display-block content-group"
                                                                                       data-popup="tooltip"
                                                                                       title="<?php if (!empty($post_details_f['post_details'])) {
                                                                                           echo $post_details_f['post_details'];
                                                                                       } else {
                                                                                           echo $post_details_f['post_file'];
                                                                                       } ?>">

                                                                                        <h6 class="panel-title"><?php echo explode(":", $post_details_f['post_file'])[0] ?></h6>
                                                                                    </a>
                                                                                    <?php
                                                                                }
                                                                                else{
                                                                                    ?>
                                                                                    <img src="../../../img/broken_image_link.png" class="img-responsive content-group" alt="">

                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </div>


                                                                        <div class="panel-footer">
                                                                            <ul>
                                                                                <?php $seen_count_f = $post_obj->seenCount($post_details_f['post_id']); ?>
                                                                                <li><?php if ($seen_count_f['seen_status'] == 0) { ?>
                                                                                        <a id="seen-count<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-popup="tooltip"
                                                                                           title="Seen"
                                                                                           class="seen-change"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-send_username="<?php echo $value['username'] ?>"
                                                                                           data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                           data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']); ?>"
                                                                                           data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?>"><i
                                                                                                    class="icon-eye4 position-left grow hover"></i></a>
                                                                                        <a href="#seen_group"
                                                                                           id="seen-group<?php echo $post_details_f['post_id'] ?>"
                                                                                           class="seen-group"
                                                                                           data-toggle="modal"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-username="<?php echo $post_user[0]['username'] ?>"><?php echo $seen_count_f['seen_count']; ?></a>
                                                                                    <?php } else { ?>
                                                                                        <a id="seen-count<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-popup="tooltip"
                                                                                           title="Unseen"
                                                                                           class="seen-change"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-send_username="<?php echo $value['username'] ?>"
                                                                                           data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                           data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']); ?>"
                                                                                           data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?>"><i
                                                                                                    class="icon-eye4 text-primary position-left grow hover"></i></a>
                                                                                        <a href="#seen_group"
                                                                                           id="seen-group<?php echo $post_details_f['post_id'] ?>"
                                                                                           class="seen-group"
                                                                                           data-toggle="modal"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-username="<?php echo $post_user[0]['username'] ?>"><?php echo $seen_count_f['seen_count']; ?></a>
                                                                                    <?php } ?>
                                                                                </li>
                                                                                <?php $comment_count_f = $post_obj->commentCount($post_details_f['post_id']); ?>
                                                                                <li>
                                                                                    <a id="comment-count<?php echo $post_details_f['post_id'] ?>"
                                                                                       data-popup="tooltip"
                                                                                       title="Comment"
                                                                                       class="opnmycomment"
                                                                                       data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                       data-send_username="<?php echo $value['username'] ?>"
                                                                                       data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                       data-reci_user_pic="<?php echo $post_user[0]['user_pic'] ?>"
                                                                                       data-send_user_pic="<?php echo $value['user_pic'] ?>"><i
                                                                                                class="icon-comment-discussion position-left grow hover"></i><?php echo $comment_count_f['comment_count'] ?>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>

                                                                            <ul class="pull-right">
                                                                                <li>
                                                                                    <a href="../post/?user=<?php echo $post_details_f['username'] ?>&pid=<?php echo $post_details_f['post_id'] ?>">Read
                                                                                        post <i
                                                                                                class="icon-arrow-right14 position-right"></i></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="comment-box">
                                                                            <ul id="comment-content<?php echo $post_details_f['post_id'] ?>"
                                                                                class="comment-content media-list post-list content-group">

                                                                            </ul>
                                                                        </div>
                                                                        <div class="comment-post">
                                                                            <form id="comment-form<?php echo $post_details_f['post_id'] ?>"
                                                                                  name="<?php echo $post_details_f['post_id'] ?>"
                                                                                  class="comment-form">
                                                                                <textarea
                                                                                        data-post_id="<?php echo $post_details_f['post_id'] ?>"
                                                                                        data-send_username="<?php echo $value['username'] ?>"
                                                                                        data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                        data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']) ?>"
                                                                                        data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']) ?>"
                                                                                        name="usn_comment_message"
                                                                                        class="form-control content-group comment-text"
                                                                                        rows="1" cols="1"
                                                                                        placeholder="Press Enter to post comment..."></textarea>
                                                                                <input id="comment_post_id"
                                                                                       name="comment_post_id"
                                                                                       value="<?php echo $post_details_f['post_id'] ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_send_username"
                                                                                       name="comment_send_username"
                                                                                       value="<?php echo $value['username'] ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_reci_username"
                                                                                       name="comment_reci_username"
                                                                                       value="<?php echo $post_user[0]['username'] ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_send_fullname"
                                                                                       name="comment_send_fullname"
                                                                                       value="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']) ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_reci_fullname"
                                                                                       name="comment_reci_fullname"
                                                                                       value="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']) ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_type"
                                                                                       name="comment_type"
                                                                                       value="comment_post"
                                                                                       type="hidden">
                                                                                <input id="usn_comment_date"
                                                                                       name="usn_comment_date"
                                                                                       type="hidden">
                                                                                <div class="row">
                                                                                    <div class="col-xs-12 text-right">
                                                                                        <button type="submit"
                                                                                                id="<?php echo $post_details_f['post_id'] ?>"
                                                                                                class="btn bg-teal-400 btn-labeled btn-labeled-right submitCommentform">
                                                                                            <b><i class="icon-circle-right2"></i></b>
                                                                                            Comment
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }elseif(($con_check->status == 'false') && ($post_details_f['access_type']=='true_all')) {
                                                                $post_user = $post_obj->postUser($post_details_f['username']);
                                                                $post_count = $post_count + 1;
                                                                ?>
                                                                <div class="timeline-row">
                                                                    <div class="timeline-icon">
                                                                        <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                            <?php
                                                                            if (!empty($post_user[0]['user_pic'])) {
                                                                                ?>
                                                                                <img src="../../../img/<?php echo $post_user[0]['user_pic'] ?>"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"
                                                                                     style="object-fit: cover;">
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <img src="../../../assets/images/placeholder.jpg"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>">
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </a>
                                                                    </div>

                                                                    <div class="panel panel-flat timeline-content">
                                                                        <div class="panel-heading">
                                                                            <span class="media-heading text-semibold text-capitalize"><a
                                                                                        href="../account/?user=<?php echo $post_user[0]['username']; ?>"><?php echo $post_user[0]['first_name'] . ' ' . $post_user[0]['last_name']; ?></a></span>
                                                                            <div class="text-size-mini text-muted">
                                                                                <i class="icon-user text-size-small"></i>
                                                                                &nbsp;<?php echo $post_user[0]['user_status']; ?>
                                                                                <span class="heading-text"
                                                                                      id="userlocalDateTime<?php echo $post_count; ?>"></span>
                                                                            </div>
                                                                            <div class="heading-elements">
                                                                                <!--                                                                <span class="heading-text"><i class="icon-checkmark-circle position-left text-success"></i> 49 minutes ago</span>-->


                                                                                <script>
                                                                                    var local = "<?php echo $post_details_f['post_utc_time']; ?>";
                                                                                    var localDate = new Date(local);
                                                                                    var today = new Date();
                                                                                    var old_date = localDate.getDate();
                                                                                    var new_date = today.getDate();
                                                                                    var old_month = localDate.getMonth();
                                                                                    var new_month = today.getMonth();
                                                                                    var old_year = localDate.getYear();
                                                                                    var new_year = today.getYear();
                                                                                    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                                                                                    var day = days[localDate.getDay()];

                                                                                    if ((new_date - old_date) == 0) {
                                                                                        day = 'Today';

                                                                                        var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                            month: 'short',
                                                                                            day: 'numeric'
                                                                                        });

                                                                                        var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                            hour: '2-digit',
                                                                                            minute: '2-digit'
                                                                                        });
                                                                                        $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }
                                                                                    if ((new_date - old_date) == 1) {
                                                                                        day = 'Yesterday';

                                                                                        var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                            month: 'short',
                                                                                            day: 'numeric'
                                                                                        });

                                                                                        var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                            hour: '2-digit',
                                                                                            minute: '2-digit'
                                                                                        });
                                                                                        $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }
                                                                                    if (((new_date - old_date) > 1) || ((new_date - old_date) < 0)) {


                                                                                        var localDateString = localDate.toLocaleDateString(undefined, {
                                                                                            month: 'short',
                                                                                            day: 'numeric'
                                                                                        });


                                                                                        var localTimeString = localDate.toLocaleTimeString(undefined, {
                                                                                            hour: '2-digit',
                                                                                            minute: '2-digit'
                                                                                        });

                                                                                        $('#userlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("userlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }

                                                                                </script>


                                                                                <ul class="icons-list">
                                                                                    <li class="dropdown">
                                                                                        <a href="#"
                                                                                           class="dropdown-toggle"
                                                                                           data-toggle="dropdown">
                                                                                            <i class="icon-arrow-down12"></i>
                                                                                        </a>

                                                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                                                            <li><a href="../post/?user=<?php echo $post_details_f['username'] ?>&pid=<?php echo $post_details_f['post_id'] ?>"><i
                                                                                                            class="icon-embed"></i>
                                                                                                    Read Post</a></li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-heading"
                                                                             style="margin-left: 5%">
                                                                            <?php
                                                                            //                                                                        print_r($post_details_f['username']);
                                                                            //                                                                        print_r($value_user['username']);
                                                                            //                                                                        die();
                                                                            if (!empty($post_details_f['post_details'])) {
                                                                                ?>
                                                                                <h6 class="panel-title"
                                                                                    style="white-space: pre-line"><?php echo $post_details_f['post_details'] ?>
                                                                                    <br><br></h6>
                                                                                <?php
                                                                            }
                                                                            if (!empty($post_details_f['post_photo'])) {
                                                                                ?> <a href="../../../img/<?php
                                                                                if (!empty(explode(":", $post_details_f['post_photo'])[1])) {
                                                                                    echo explode(":", $post_details_f['post_photo'])[1];
                                                                                } else {
                                                                                    echo explode(":", $post_details_f['post_photo'])[0];
                                                                                } ?>"
                                                                                      class="display-block content-group"
                                                                                      data-popup="lightbox"
                                                                                      data-popup="tooltip"
                                                                                      title="<?php if (!empty($post_details_f['post_details'])) {
                                                                                          echo $post_details_f['post_details'];
                                                                                      } ?>">
                                                                                    <img src="../../../img/<?php
                                                                                    if (!empty(explode(":", $post_details_f['post_photo'])[1])) {
                                                                                        echo explode(":", $post_details_f['post_photo'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['post_photo'])[0];
                                                                                    } ?>"
                                                                                         class="img-responsive content-group"
                                                                                         alt="">
                                                                                </a>
                                                                                <?php
                                                                            } elseif (!empty($post_details_f['post_file'])) {
                                                                                if($post_details_f['post_file']!='broken_image_link.png'){
                                                                                    ?>
                                                                                    <a href="../../../files/<?php
                                                                                    if (!empty(explode(":", $post_details_f['post_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['post_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['post_file'])[0];
                                                                                    } ?>"
                                                                                       class="display-block content-group"
                                                                                       data-popup="tooltip"
                                                                                       title="<?php if (!empty($post_details_f['post_details'])) {
                                                                                           echo $post_details_f['post_details'];
                                                                                       } else {
                                                                                           echo $post_details_f['post_file'];
                                                                                       } ?>">

                                                                                        <h6 class="panel-title"><?php echo explode(":", $post_details_f['post_file'])[0] ?></h6>
                                                                                    </a>
                                                                                    <?php
                                                                                }
                                                                                else{
                                                                                    ?>
                                                                                    <img src="../../../img/broken_image_link.png" class="img-responsive content-group" alt="">

                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </div>


                                                                        <div class="panel-footer">
                                                                            <ul>
                                                                                <?php $seen_count_f = $post_obj->seenCount($post_details_f['post_id']); ?>
                                                                                <li><?php if ($seen_count_f['seen_status'] == 0) { ?>
                                                                                        <a id="seen-count<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-popup="tooltip"
                                                                                           title="Seen"
                                                                                           class="seen-change"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-send_username="<?php echo $value['username'] ?>"
                                                                                           data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                           data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']); ?>"
                                                                                           data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?>"><i
                                                                                                    class="icon-eye4 position-left grow hover"></i></a>
                                                                                        <a href="#seen_group"
                                                                                           id="seen-group<?php echo $post_details_f['post_id'] ?>"
                                                                                           class="seen-group"
                                                                                           data-toggle="modal"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-username="<?php echo $post_user[0]['username'] ?>"><?php echo $seen_count_f['seen_count']; ?></a>
                                                                                    <?php } else { ?>
                                                                                        <a id="seen-count<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-popup="tooltip"
                                                                                           title="Unseen"
                                                                                           class="seen-change"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-send_username="<?php echo $value['username'] ?>"
                                                                                           data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                           data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']); ?>"
                                                                                           data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?>"><i
                                                                                                    class="icon-eye4 text-primary position-left grow hover"></i></a>
                                                                                        <a href="#seen_group"
                                                                                           id="seen-group<?php echo $post_details_f['post_id'] ?>"
                                                                                           class="seen-group"
                                                                                           data-toggle="modal"
                                                                                           data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                           data-username="<?php echo $post_user[0]['username'] ?>"><?php echo $seen_count_f['seen_count']; ?></a>
                                                                                    <?php } ?>
                                                                                </li>
                                                                                <?php $comment_count_f = $post_obj->commentCount($post_details_f['post_id']); ?>
                                                                                <li>
                                                                                    <a id="comment-count<?php echo $post_details_f['post_id'] ?>"
                                                                                       data-popup="tooltip"
                                                                                       title="Comment"
                                                                                       class="opnmycomment"
                                                                                       data-pid="<?php echo $post_details_f['post_id'] ?>"
                                                                                       data-send_username="<?php echo $value['username'] ?>"
                                                                                       data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                       data-reci_user_pic="<?php echo $post_user[0]['user_pic'] ?>"
                                                                                       data-send_user_pic="<?php echo $value['user_pic'] ?>"><i
                                                                                                class="icon-comment-discussion position-left grow hover"></i><?php echo $comment_count_f['comment_count'] ?>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>

                                                                            <ul class="pull-right">
                                                                                <li>
                                                                                    <a href="../post/?user=<?php echo $post_details_f['username'] ?>&pid=<?php echo $post_details_f['post_id'] ?>">Read
                                                                                        post <i
                                                                                                class="icon-arrow-right14 position-right"></i></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="comment-box">
                                                                            <ul id="comment-content<?php echo $post_details_f['post_id'] ?>"
                                                                                class="comment-content media-list post-list content-group">

                                                                            </ul>
                                                                        </div>
                                                                        <div class="comment-post">
                                                                            <form id="comment-form<?php echo $post_details_f['post_id'] ?>"
                                                                                  name="<?php echo $post_details_f['post_id'] ?>"
                                                                                  class="comment-form">
                                                                                <textarea
                                                                                        data-post_id="<?php echo $post_details_f['post_id'] ?>"
                                                                                        data-send_username="<?php echo $value['username'] ?>"
                                                                                        data-reci_username="<?php echo $post_user[0]['username'] ?>"
                                                                                        data-send_fullname="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']) ?>"
                                                                                        data-reci_fullname="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']) ?>"
                                                                                        name="usn_comment_message"
                                                                                        class="form-control content-group comment-text"
                                                                                        rows="1" cols="1"
                                                                                        placeholder="Press Enter to post comment..."></textarea>
                                                                                <input id="comment_post_id"
                                                                                       name="comment_post_id"
                                                                                       value="<?php echo $post_details_f['post_id'] ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_send_username"
                                                                                       name="comment_send_username"
                                                                                       value="<?php echo $value['username'] ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_reci_username"
                                                                                       name="comment_reci_username"
                                                                                       value="<?php echo $post_user[0]['username'] ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_send_fullname"
                                                                                       name="comment_send_fullname"
                                                                                       value="<?php echo ucwords($value['first_name']) . ' ' . ucwords($value['last_name']) ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_reci_fullname"
                                                                                       name="comment_reci_fullname"
                                                                                       value="<?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']) ?>"
                                                                                       type="hidden">
                                                                                <input id="comment_type"
                                                                                       name="comment_type"
                                                                                       value="comment_post"
                                                                                       type="hidden">
                                                                                <input id="usn_comment_date"
                                                                                       name="usn_comment_date"
                                                                                       type="hidden">
                                                                                <div class="row">
                                                                                    <div class="col-xs-12 text-right">
                                                                                        <button type="submit"
                                                                                                id="<?php echo $post_details_f['post_id'] ?>"
                                                                                                class="btn bg-teal-400 btn-labeled btn-labeled-right submitCommentform">
                                                                                            <b><i class="icon-circle-right2"></i></b>
                                                                                            Comment
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                    }if($post_count==0){
                                                            ?>
                                                            <div class="timeline-row">
                                                                <div class="content-group-sm">
                                                                    <!-- Basic alert -->
                                                                    <div class="alert alert-danger alert-styled-left">
                                                                        <button type="button" class="close"
                                                                                data-dismiss="alert">
                                                                            <span>&times;</span><span
                                                                                    class="sr-only">Close</span></button>
                                                                        No post to show
                                                                    </div>
                                                                </div>
                                                            </div>
                                                       <?php
                                                        }
                                                    } else {
                                                        if (isset($_SESSION['post_message'])) {
                                                            ?>
                                                            <div class="timeline-row">
                                                                <div class="content-group-sm">
                                                                    <!-- Basic alert -->
                                                                    <div class="alert alert-danger alert-styled-left">
                                                                        <button type="button" class="close"
                                                                                data-dismiss="alert">
                                                                            <span>&times;</span><span
                                                                                class="sr-only">Close</span></button>
                                                                        <?php echo $_SESSION['post_message']; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            unset($_SESSION['post_message']);
                                                        }

                                                    }
                                                    ?>
                                                    <!-- /blog post -->


                                                </div>
                                            </div>
                                            <!-- /profile posts-->

                                        </div>

                                        <div class="tab-pane fade" id="profile">

                                            <!-- Profile info -->
                                            <?php
                                            $con_check = $obj_con->connectedConnection($_GET['user']);
                                            if ((($con_check->status == 'true') && (($value_user['visibility'] == 'true_all') || ($value_user['visibility'] == 'true_con'))) || (($con_check->status == 'false') && ($value_user['visibility']=='true_all')) || ($value_user['username'] == $_SESSION['usn_username'])) {
                                                ?>
                                            <div class="panel panel-flat">


                                                <div class="panel-body">
                                                    <form id="profile-update" enctype="multipart/form-data">
                                                        <input name="update_type" value="usn_profile" type="hidden">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>University ID</label>
                                                                    <input type="text" name="usn_var_id"
                                                                           value="<?php echo $value_user['var_id'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label>Username</label>
                                                                    <input type="text" name="usn_username"
                                                                           value="<?php echo $value_user['username'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label>Status</label>
                                                                    <input type="text" name="usn_user_status"
                                                                           value="<?php echo $value_user['user_status'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Email</label>
                                                                    <input type="text" name="usn_email"
                                                                           value="<?php echo $value_user['email'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Mobile</label>
                                                                    <input type="text" name="usn_mobile"
                                                                           value="<?php echo $value_user['mobile'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>First Name</label>
                                                                    <input type="text" name="usn_first_name"
                                                                           value="<?php echo $value_user['first_name'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Last Name</label>
                                                                    <input type="text" name="usn_last_name"
                                                                           value="<?php echo $value_user['last_name'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Father Name</label>
                                                                    <input type="text" name="usn_father_name"
                                                                           value="<?php echo $value_user['father_name'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Mother Name</label>
                                                                    <input type="text" name="usn_mother_name"
                                                                           value="<?php echo $value_user['mother_name'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Date of Birth</label>
                                                                    <input type="text" name="usn_birth_date"
                                                                           value="<?php echo $value_user['birth_date'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Sex</label>
                                                                    <input type="text" name="usn_father_name"
                                                                           value="<?php echo $value_user['sex'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Marital Status</label>
                                                                    <input type="text" name="usn_father_name"
                                                                           value="<?php echo $value_user['marital_status'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Department</label>
                                                                    <input type="text" name="usn_father_name"
                                                                           value="<?php echo $value_user['department'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Blood Group</label>
                                                                    <input type="text" name="usn_father_name"
                                                                           value="<?php echo $value_user['blood_type'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Skills</label>
                                                                    <input type="text" name="usn_skills"
                                                                           value="<?php echo $value_user['skills'] ?>"
                                                                           class="form-control" readonly="readonly">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                            <!-- /profile info -->
                                            <?php
                                            }else{
                                                ?>
                                                <div class="alert alert-danger alert-styled-left">
                                                    <button type="button" class="close"
                                                            data-dismiss="alert">
                                                        <span>&times;</span><span
                                                                class="sr-only">Close</span></button>
                                                    Restricted By User!
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">

                                <!-- Account User thumbnail -->
                                <?php
                                include ('../contents/account_user_thumbnail/account_user_thumbnail.php');
                                ?>
                                <!-- /account user thumbnail -->


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
}
}else{
    $_SESSION['message'] = 'You must login first!';
    header('location:../../../');
}
?>
