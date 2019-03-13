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
    include("../../../src/User/Connection/Connection.php");
    include("../../../src/User/PaperJournal/PaperJournal.php");
    $obj = new Registration($pdo);
    $obj_pj = new PaperJournal($pdo);
    $all_papers = $obj_pj->viewPapers();
    $all_journals = $obj_pj->viewJournals();
    $data = $obj->setData($_SESSION)->profile();
    $user = $obj->user_info();
    foreach ($data as $key => $value) {
        $obj_con = new Connection($pdo);
        $data_con = $obj_con->connectionSetData($_SESSION)->connectionList();
        $data_cony = $obj_con->connectionSetData($_SESSION)->receiveRequest();
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
            <title>Journal-USN</title>
			<link rel="icon" type="image/gif" href="../../../assets/images/ico/animated_favicon1.gif" >

            <!--[if lt IE 9]-->
            <script src="../../../assets/js/html5shiv.min.js"></script>
            <script src="../../../assets/js/respond.min.js"></script>
            <!--[endif]-->

            <!-- Global stylesheets -->
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
                  type="text/css">
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
            <script type="text/javascript" src="../../../assets/js/project_contents/usn_paper_journal.min.js"></script>
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

                    <!--                    Toolbar Requests-->
                    <?php
                    include ('../contents/toolbar_requests/toolbar_requests.php');
                    ?>
                    <!--                    /toolbar requests-->

                    <!--                    Toolbar Messages-->
                    <?php
                    include ('../contents/toolbar_messages/toolbar_messages.php');
                    ?>
                    <!--                    /toolbar messages-->



                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            if(!empty($value['user_pic'])) {
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
                            <li><a id="drop-papers"><i
                                            class="icon-file-text2 position-left"></i> Papers</a></li>
                            <li><a id="drop-journals"><i
                                            class="icon-magazine position-left"></i> Journals</a></li>
                            <li><a id="drop-post-paper-journal"><i
                                            class="icon-file-plus position-left"></i> Post Paper/Journal</a></li>
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
                                        if(!empty($value['user_pic'])) {
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
                                    <li class="active"><a href="#papers" id="papers-nav" data-toggle="tab"><i
                                                class="icon-file-text2 position-left"></i> Papers</a></li>
                                    <li><a href="#journals" id="journals-nav" data-toggle="tab"><i
                                                class="icon-magazine position-left"></i> Journals</a></li>
                                    <li><a href="#post-paper-journal" id="post-paper-journal-nav" data-toggle="tab"><i
                                                class="icon-file-plus position-left"></i> Post Paper/Journal</a></li>
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
                                        <div class="tab-pane fade in active" id="papers">


<!--                                                Paper-->
                                            <div class="timeline timeline-left content-group">
                                                <div class="timeline-container">

                                                    <?php
                                                    if(sizeof($all_papers)!=0) {
                                                        $post_count=0;
                                                        foreach ($all_papers as $key2 => $post_details_f) {
                                                            $con_check = $obj_con->connectedConnection($post_details_f['username']);

                                                            if($post_details_f['username']==$_SESSION['usn_username']) {
                                                                $post_user = $obj_pj->postUser($post_details_f['username']);
                                                                $post_count = $post_count + 1;
                                                                ?>

                                                                <div id="paper-message<?php echo $post_details_f['paper_journal_id'] ?>" class="timeline-row">
                                                                    <div class="timeline-icon">
                                                                        <?php
                                                                        if (!empty($post_user[0]['user_pic'])) {
                                                                            ?>
                                                                            <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                                <img src="../../../img/<?php echo $post_user[0]['user_pic'] ?>"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"
                                                                                     style="object-fit: cover;"></a>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                                <img src="../../../assets/images/placeholder.jpg"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"></a>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>

                                                                    <div class="panel panel-flat timeline-content">
                                                                        <div class="panel-heading">
                                                                            <span class="media-heading text-semibold"><a
                                                                                        href="../account/?user=<?php echo $post_user[0]['username']; ?>"><?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?></a></span>
                                                                            <div class="text-size-mini text-muted">
                                                                                <i class="icon-user text-size-small"></i>
                                                                                &nbsp;<?php echo $post_user[0]['user_status']; ?>
                                                                                <span id="paperlocalDateTime<?php echo $post_count; ?>"
                                                                                      class="heading-text"></span>
                                                                            </div>
                                                                            <div class="heading-elements">

                                                                                <script>
                                                                                    var local = "<?php echo $post_details_f['paper_journal_utc_time']; ?>";
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
                                                                                        $('#paperlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("paperlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
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
                                                                                        $('#paperlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("paperlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
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

                                                                                        $('#paperlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("paperlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
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
                                                                                            <li><a class="delete-paper" data-del_username="<?php echo $_SESSION['usn_username'] ?>" data-paper_journal_id="<?php echo $post_details_f['paper_journal_id'] ?>"><i
                                                                                                            class="icon-file-minus"></i>
                                                                                                    Delete Paper</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>

                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-heading content-group"
                                                                             style="margin-left: 5%">

                                                                            <?php
                                                                            if (!empty($post_details_f['paper_journal_title'])) {
                                                                                ?>
                                                                                <h6 class="panel-title"
                                                                                    style="white-space: pre-line"><?php echo $post_details_f['paper_journal_title'] ?>
                                                                                    <br><br></h6>
                                                                                <?php
                                                                            }
                                                                            if (!empty($post_details_f['paper_journal_file'])) {
                                                                                if($post_details_f['paper_journal_file']!='broken_image_link.png'){
                                                                                    ?>
                                                                                    <object width="600" height="700" type="application/pdf" data="../../../paper&journal/file/<?php
                                                                                    if (!empty(explode(":", $post_details_f['paper_journal_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[0];
                                                                                    } ?>"></object>
                                                                                    <a href="../../../paper&journal/file/<?php
                                                                                    if (!empty(explode(":", $post_details_f['paper_journal_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[0];
                                                                                    } ?>"
                                                                                       class="display-block content-group"
                                                                                       data-popup="tooltip"
                                                                                       title="<?php if (!empty($post_details_f['paper_journal_title'])) {
                                                                                           echo $post_details_f['paper_journal_title'];
                                                                                       } else {
                                                                                           echo $post_details_f['paper_journal_file'];
                                                                                       } ?>" download>

                                                                                        <h6 class="panel-title"><?php echo explode(":", $post_details_f['paper_journal_file'])[0] ?></h6>
                                                                                    </a>
                                                                                <?php }
                                                                                else{
                                                                                    ?>
                                                                                    <img src="../../../paper&journal/file/broken_image_link.png" class="img-responsive content-group" alt="">

                                                                                    <?php
                                                                                }
                                                                            }
                                                                            if(!empty($post_details_f['paper_journal_details'])){
                                                                                ?>

                                                                                <blockquote>
                                                                                    <p><?php echo $post_details_f['paper_journal_details'] ?></p>
                                                                                </blockquote>

                                                                                <?php
                                                                            }
                                                                            if(!empty($post_details_f['paper_journal_keywords'])){
                                                                                ?>

                                                                                <footer>Keywords: <cite title="Source Title"><?php echo $post_details_f['paper_journal_keywords'] ?></cite></footer>

                                                                                <?php
                                                                            }
                                                                            ?>


                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                            }
                                                            elseif((($post_details_f['access_type']=='true_all') || ($post_details_f['access_type']=='true_con')) && ($post_details_f['username']!=$_SESSION['usn_username'])) {
                                                                $post_user = $obj_pj->postUser($post_details_f['username']);
                                                                $post_count = $post_count + 1;
                                                                ?>

                                                                <div class="timeline-row">
                                                                    <div class="timeline-icon">
                                                                        <?php
                                                                        if (!empty($post_user[0]['user_pic'])) {
                                                                            ?>
                                                                            <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                                <img src="../../../img/<?php echo $post_user[0]['user_pic'] ?>"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"
                                                                                     style="object-fit: cover;"></a>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                                <img src="../../../assets/images/placeholder.jpg"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"></a>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>

                                                                    <div class="panel panel-flat timeline-content">
                                                                        <div class="panel-heading">
                                                                            <span class="media-heading text-semibold"><a
                                                                                        href="../account/?user=<?php echo $post_user[0]['username']; ?>"><?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?></a></span>
                                                                            <div class="text-size-mini text-muted">
                                                                                <i class="icon-user text-size-small"></i>
                                                                                &nbsp;<?php echo $post_user[0]['user_status']; ?>
                                                                                <span id="paperlocalDateTime<?php echo $post_count; ?>"
                                                                                      class="heading-text"></span>
                                                                            </div>
                                                                            <div class="heading-elements">

                                                                                <script>
                                                                                    var local = "<?php echo $post_details_f['paper_journal_utc_time']; ?>";
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
                                                                                        $('#paperlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("paperlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
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
                                                                                        $('#paperlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("paperlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
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

                                                                                        $('#paperlocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("paperlocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }

                                                                                </script>

                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-heading content-group"
                                                                             style="margin-left: 5%">

                                                                            <?php
                                                                            if (!empty($post_details_f['paper_journal_title'])) {
                                                                                ?>
                                                                                <h6 class="panel-title"
                                                                                    style="white-space: pre-line"><?php echo $post_details_f['paper_journal_title'] ?>
                                                                                    <br><br></h6>
                                                                                <?php
                                                                            }
                                                                            if (!empty($post_details_f['paper_journal_file'])) {
                                                                                if($post_details_f['paper_journal_file']!='broken_image_link.png'){
                                                                                    ?>
                                                                                    <object width="600" height="700" type="application/pdf" data="../../../paper&journal/file/<?php
                                                                                    if (!empty(explode(":", $post_details_f['paper_journal_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[0];
                                                                                    } ?>"></object>
                                                                                    <a href="../../../paper&journal/file/<?php
                                                                                    if (!empty(explode(":", $post_details_f['paper_journal_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[0];
                                                                                    } ?>"
                                                                                       class="display-block content-group"
                                                                                       data-popup="tooltip"
                                                                                       title="<?php if (!empty($post_details_f['paper_journal_title'])) {
                                                                                           echo $post_details_f['paper_journal_title'];
                                                                                       } else {
                                                                                           echo $post_details_f['paper_journal_file'];
                                                                                       } ?>" download>

                                                                                        <h6 class="panel-title"><?php echo explode(":", $post_details_f['paper_journal_file'])[0] ?></h6>
                                                                                    </a>
                                                                                <?php }
                                                                                else{
                                                                                    ?>
                                                                                    <img src="../../../paper&journal/file/broken_image_link.png" class="img-responsive content-group" alt="">

                                                                                    <?php
                                                                                }
                                                                            }
                                                                            if(!empty($post_details_f['paper_journal_details'])){
                                                                                ?>

                                                                                <blockquote>
                                                                                    <p><?php echo $post_details_f['paper_journal_details'] ?></p>
                                                                                </blockquote>

                                                                                <?php
                                                                            }
                                                                            if(!empty($post_details_f['paper_journal_keywords'])){
                                                                                ?>

                                                                                <footer>Keywords: <cite title="Source Title"><?php echo $post_details_f['paper_journal_keywords'] ?></cite></footer>

                                                                                <?php
                                                                            }
                                                                            ?>


                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                            }

                                                        }
                                                        if ($post_count==0) {
                                                            ?>
                                                            <div class="timeline-row">
                                                                <div class="content-group-sm">
                                                                    <!-- Basic alert -->
                                                                    <div class="alert alert-danger alert-styled-left">
                                                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                                                                    class="sr-only">Close</span></button>
                                                                        No papers to Show!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <div class="timeline-row">
                                                            <div class="content-group-sm">
                                                                <!-- Basic alert -->
                                                                <div class="alert alert-danger alert-styled-left">
                                                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                                                                class="sr-only">Close</span></button>
                                                                    No papers published yet!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php

                                                    }
                                                    ?>

                                                </div>
                                            </div>

<!--                                                /paper-->


                                        </div>


                                        <div class="tab-pane fade" id="journals">




<!--                                                Journal-->

                                            <div class="timeline timeline-left content-group">
                                                <div class="timeline-container">

                                                    <?php
                                                    if(sizeof($all_journals)!=0) {
                                                        $post_count=0;
                                                        foreach ($all_journals as $key2 => $post_details_f) {
                                                            $con_check = $obj_con->connectedConnection($post_details_f['username']);
                                                            if($post_details_f['username']==$_SESSION['usn_username']){
                                                                $post_user = $obj_pj->postUser($post_details_f['username']);
                                                                $post_count = $post_count + 1;
                                                                ?>

                                                                <div id="journal-message<?php echo $post_details_f['paper_journal_id'] ?>" class="timeline-row">
                                                                    <div class="timeline-icon">
                                                                        <?php
                                                                        if (!empty($post_user[0]['user_pic'])) {
                                                                            ?>
                                                                            <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                                <img src="../../../img/<?php echo $post_user[0]['user_pic'] ?>"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"
                                                                                     style="object-fit: cover;"></a>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                                <img src="../../../assets/images/placeholder.jpg"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"></a>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>

                                                                    <div class="panel panel-flat timeline-content">
                                                                        <div class="panel-heading">
                                                                            <span class="media-heading text-semibold"><a
                                                                                        href="../account/?user=<?php echo $post_user[0]['username']; ?>"><?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?></a></span>
                                                                            <div class="text-size-mini text-muted">
                                                                                <i class="icon-user text-size-small"></i>
                                                                                &nbsp;<?php echo $post_user[0]['user_status']; ?>
                                                                                <span id="journallocalDateTime<?php echo $post_count; ?>"
                                                                                      class="heading-text"></span>
                                                                            </div>
                                                                            <div class="heading-elements">

                                                                                <script>
                                                                                    var local = "<?php echo $post_details_f['paper_journal_utc_time']; ?>";
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
                                                                                        $('#journallocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("journallocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
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
                                                                                        $('#journallocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("journallocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
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

                                                                                        $('#journallocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("journallocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
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
                                                                                            <li><a class="delete-journal" data-del_username="<?php echo $_SESSION['usn_username'] ?>" data-paper_journal_id="<?php echo $post_details_f['paper_journal_id'] ?>"><i
                                                                                                            class="icon-file-minus"></i>
                                                                                                    Delete Journal</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </li>
                                                                                </ul>

                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-heading content-group"
                                                                             style="margin-left: 5%">

                                                                            <?php
                                                                            if (!empty($post_details_f['paper_journal_title'])) {
                                                                                ?>
                                                                                <h6 class="panel-title"
                                                                                    style="white-space: pre-line"><?php echo $post_details_f['paper_journal_title'] ?>
                                                                                    <br><br></h6>
                                                                                <?php
                                                                            }
                                                                            if (!empty($post_details_f['paper_journal_file'])) {
                                                                                if($post_details_f['paper_journal_file']!='broken_image_link.png'){
                                                                                    ?>
                                                                                    <object width="600" height="700" type="application/pdf" data="../../../paper&journal/file/<?php
                                                                                    if (!empty(explode(":", $post_details_f['paper_journal_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[0];
                                                                                    } ?>"></object>
                                                                                    <a href="../../../paper&journal/file/<?php
                                                                                    if (!empty(explode(":", $post_details_f['paper_journal_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[0];
                                                                                    } ?>"
                                                                                       class="display-block content-group"
                                                                                       data-popup="tooltip"
                                                                                       title="<?php if (!empty($post_details_f['paper_journal_title'])) {
                                                                                           echo $post_details_f['paper_journal_title'];
                                                                                       } else {
                                                                                           echo $post_details_f['paper_journal_file'];
                                                                                       } ?>" download>

                                                                                        <h6 class="panel-title"><?php echo explode(":", $post_details_f['paper_journal_file'])[0] ?></h6>
                                                                                    </a>
                                                                                <?php }
                                                                                else{
                                                                                    ?>
                                                                                    <img src="../../../paper&journal/file/broken_image_link.png" class="img-responsive content-group" alt="">

                                                                                    <?php
                                                                                }
                                                                            }
                                                                            if(!empty($post_details_f['paper_journal_details'])){
                                                                                ?>

                                                                                <blockquote>
                                                                                    <p><?php echo $post_details_f['paper_journal_details'] ?></p>
                                                                                </blockquote>

                                                                                <?php
                                                                            }
                                                                            if(!empty($post_details_f['paper_journal_keywords'])){
                                                                                ?>

                                                                                <footer>Keywords: <cite title="Source Title"><?php echo $post_details_f['paper_journal_keywords'] ?></cite></footer>

                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                                }
                                                            elseif((($post_details_f['access_type']=='true_all') || ($post_details_f['access_type']=='true_con')) && ($post_details_f['username']!=$_SESSION['usn_username'])) {
                                                                $post_user = $obj_pj->postUser($post_details_f['username']);
                                                                $post_count = $post_count + 1;
                                                                ?>

                                                                <div class="timeline-row">
                                                                    <div class="timeline-icon">
                                                                        <?php
                                                                        if (!empty($post_user[0]['user_pic'])) {
                                                                            ?>
                                                                            <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                                <img src="../../../img/<?php echo $post_user[0]['user_pic'] ?>"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"
                                                                                     style="object-fit: cover;"></a>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <a href="../account/?user=<?php echo $post_user[0]['username'] ?>">
                                                                                <img src="../../../assets/images/placeholder.jpg"
                                                                                     alt="<?php echo $post_user[0]['username'] ?>"></a>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>

                                                                    <div class="panel panel-flat timeline-content">
                                                                        <div class="panel-heading">
                                                                            <span class="media-heading text-semibold"><a
                                                                                        href="../account/?user=<?php echo $post_user[0]['username']; ?>"><?php echo ucwords($post_user[0]['first_name']) . ' ' . ucwords($post_user[0]['last_name']); ?></a></span>
                                                                            <div class="text-size-mini text-muted">
                                                                                <i class="icon-user text-size-small"></i>
                                                                                &nbsp;<?php echo $post_user[0]['user_status']; ?>
                                                                                <span id="journallocalDateTime<?php echo $post_count; ?>"
                                                                                      class="heading-text"></span>
                                                                            </div>
                                                                            <div class="heading-elements">

                                                                                <script>
                                                                                    var local = "<?php echo $post_details_f['paper_journal_utc_time']; ?>";
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
                                                                                        $('#journallocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("journallocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
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
                                                                                        $('#journallocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("journallocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
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

                                                                                        $('#journallocalDateTime<?php echo $post_count; ?>').empty();
                                                                                        document.getElementById("journallocalDateTime<?php echo $post_count; ?>").innerHTML = ("<i class=" + 'icon-watch2' + "></i>" + day + ', ' + localDateString + ' at ' + localTimeString);
                                                                                    }

                                                                                </script>

                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-heading content-group"
                                                                             style="margin-left: 5%">

                                                                            <?php
                                                                            if (!empty($post_details_f['paper_journal_title'])) {
                                                                                ?>
                                                                                <h6 class="panel-title"
                                                                                    style="white-space: pre-line"><?php echo $post_details_f['paper_journal_title'] ?>
                                                                                    <br><br></h6>
                                                                                <?php
                                                                            }
                                                                            if (!empty($post_details_f['paper_journal_file'])) {
                                                                                if($post_details_f['paper_journal_file']!='broken_image_link.png'){
                                                                                    ?>
                                                                                    <object width="600" height="700" type="application/pdf" data="../../../paper&journal/file/<?php
                                                                                    if (!empty(explode(":", $post_details_f['paper_journal_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[0];
                                                                                    } ?>"></object>
                                                                                    <a href="../../../paper&journal/file/<?php
                                                                                    if (!empty(explode(":", $post_details_f['paper_journal_file'])[1])) {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[1];
                                                                                    } else {
                                                                                        echo explode(":", $post_details_f['paper_journal_file'])[0];
                                                                                    } ?>"
                                                                                       class="display-block content-group"
                                                                                       data-popup="tooltip"
                                                                                       title="<?php if (!empty($post_details_f['paper_journal_title'])) {
                                                                                           echo $post_details_f['paper_journal_title'];
                                                                                       } else {
                                                                                           echo $post_details_f['paper_journal_file'];
                                                                                       } ?>" download>

                                                                                        <h6 class="panel-title"><?php echo explode(":", $post_details_f['paper_journal_file'])[0] ?></h6>
                                                                                    </a>
                                                                                <?php }
                                                                                else{
                                                                                    ?>
                                                                                    <img src="../../../paper&journal/file/broken_image_link.png" class="img-responsive content-group" alt="">

                                                                                    <?php
                                                                                }
                                                                            }
                                                                            if(!empty($post_details_f['paper_journal_details'])){
                                                                                ?>

                                                                                <blockquote>
                                                                                    <p><?php echo $post_details_f['paper_journal_details'] ?></p>
                                                                                </blockquote>

                                                                                <?php
                                                                            }
                                                                            if(!empty($post_details_f['paper_journal_keywords'])){
                                                                                ?>

                                                                                <footer>Keywords: <cite title="Source Title"><?php echo $post_details_f['paper_journal_keywords'] ?></cite></footer>

                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                            }

                                                        }
                                                        if ($post_count==0) {
                                                            ?>
                                                            <div class="timeline-row">
                                                                <div class="content-group-sm">
                                                                    <!-- Basic alert -->
                                                                    <div class="alert alert-danger alert-styled-left">
                                                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                                                                    class="sr-only">Close</span></button>
                                                                        No journals to Show!
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <div class="timeline-row">
                                                            <div class="content-group-sm">
                                                                <!-- Basic alert -->
                                                                <div class="alert alert-danger alert-styled-left">
                                                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                                                                class="sr-only">Close</span></button>
                                                                    No journals published yet!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php

                                                    }
                                                    ?>

                                                </div>
                                            </div>

<!--                                                /journal-->


                                        </div>


                                        <div class="tab-pane fade" id="post-paper-journal">

                                            <!-- Post Paper/Journal -->
                                            <div class="timeline-row">
                                                <div class="panel panel-flat">
                                                    <div class="panel-heading">
                                                        <h6 class="panel-title">Post Paper/Journal</h6>
                                                        <div class="heading-elements">
                                                            <ul class="icons-list">
                                                                <li><a data-action="close"></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="panel-body">
                                                        <form action="store.php" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                    <select class="form-control" name="usn_paper_journal_type">
                                                                        <option value="paper">Paper</option>
                                                                        <option value="journal">Journal</option>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="usn_paper_journal_keywords" class="form-control mb-15" placeholder="Keywords">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="usn_paper_journal_title" class="form-control mb-15" placeholder="Title">
                                                                <input name="usn_paper_journal_username" value="<?php echo $value['username'];?>" type="hidden">
                                                                <input id="usn_paper_journal_access_type" name="usn_paper_journal_access_type" value="true_all" type="hidden">
                                                            </div>
                                                            <div class="form-group">
                                            <textarea name="usn_paper_journal_details" class="form-control mb-15" rows="3" cols="1"
                                                      placeholder="Describe Here..."></textarea>
                                                            </div>

                                                            <!--                                                            <div class="row">-->
<!--                                                                                                                            <div class="form-group">-->
<!--                                                                                                                                <div class="col-sm-4">-->
<!--                                                                                                                                    <select class="form-control" name="usn_access_type">-->
<!--                                                                                                                                        <option value="true_all">Visible to everyone</option>-->
<!--                                                                                                                                        <option value="true_con">Visible to connections</option>-->
<!--                                                                                                                                        <option value="false">Visible to only me</option>-->
<!--                                                                                                                                    </select>-->
<!--                                                                                                                                </div>-->
<!--                                                                                                                            </div>-->
                                                            <!--                                                            </div>-->

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <ul class="icons-list icons-list-extended mt-10">
                                                                        <li>
                                                                            <input type="file" class="file-input" accept=".pdf" data-container="body" data-popup="tooltip" title="Add file" name="usn_paper_journal_file" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-xs icon-file-plus" data-remove-class="btn btn-xs icon-file-plus">
                                                                            <span class="help-block">Only upload .pdf format</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                                <div class="col-sm-6 text-right">
                                                                    <button type="submit"
                                                                            class="btn btn-primary btn-labeled btn-labeled-right">Post
                                                                        <b><i class="icon-circle-right2"></i></b></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /post paper/journal -->

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
