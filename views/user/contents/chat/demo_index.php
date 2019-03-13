<?php
session_start();
//if(isset($_SESSION['message'])){
//    unset($_SESSION['message']);
//}


if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile']) ){
    include("../../../../src/User/DB/database.php");
    include("../../../../src/User/Registration/Registration.php");
    include("../../../../src/User/Connection/Connection.php");
    $obj = new Registration($pdo);
    $data = $obj->setData($_SESSION)->profile();
    $user = $obj->user_info();
    foreach ($data as $key => $value) {
        $obj_con = new Connection($pdo);
        $data_con = $obj_con->connectionSetData($_SESSION)->connectionList();
        $data_cony = $obj_con->connectionSetData($_SESSION)->receiveRequest();
        $count_con = $obj_con->connectionSetData($_SESSION)->connectionList();
        $conn_num = 0;
        if(!empty($count_con)) {
            foreach ($count_con as $con_key => $con_value) {
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
            <title>All Messages-USN</title>

            <!--[if lt IE 9]-->
            <script src="../../../../assets/js/html5shiv.min.js"></script>
            <script src="../../../../assets/js/respond.min.js"></script>
            <!--[endif]-->

            <!-- Global stylesheets -->
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
                  type="text/css">
            <link href="../../../../assets/css/fonts/googleapi_css.css" rel="stylesheet" type="text/css">
            <link href="../../../../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
            <link href="../../../../assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="../../../../assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
            <link href="../../../../assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
            <link href="../../../../assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
            <!-- /global stylesheets -->

            <!-- Core JS files -->
            <script type="text/javascript" src="../../../../assets/js/plugins/loaders/pace.min.js"></script>
            <script type="text/javascript" src="../../../../assets/js/core/libraries/jquery.min.js"></script>
            <script type="text/javascript" src="../../../../assets/js/core/libraries/bootstrap.min.js"></script>
            <script type="text/javascript" src="../../../../assets/js/plugins/loaders/blockui.min.js"></script>
            <!-- /core JS files -->

            <!-- Theme JS files -->
            <script type="text/javascript" src="../../../../assets/js/plugins/forms/selects/select2.min.js"></script>
            <script type="text/javascript" src="../../../../assets/js/plugins/forms/styling/uniform.min.js"></script>
            <script type="text/javascript" src="../../../../assets/js/plugins/ui/moment/moment.min.js"></script>
            <script type="text/javascript" src="../../../../assets/js/plugins/media/fancybox.min.js"></script>
            <script type="text/javascript"
                    src="../../../../assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
            <script type="text/javascript" src="../../../../assets/js/plugins/visualization/echarts/echarts.js"></script>
            <script type="text/javascript" src="../../../../assets/js/plugins/uploaders/fileinput.min.js"></script>

            <script type="text/javascript" src="../../../../assets/js/core/app.js"></script>
            <script type="text/javascript" src="../../../../assets/js/pages/user_pages_profile.js"></script>
            <script type="text/javascript" src="../../../../assets/js/pages/components_thumbnails.js"></script>
            <script type="text/javascript" src="../../../../assets/js/pages/uploader_bootstrap.js"></script>
            <script type="text/javascript" src="../../../../assets/js/pages/user_pages_list.js"></script>
            <!-- /theme JS files -->

        </head>

        <body style="padding-top: 40px; padding-bottom: 40px;">

        <!-- Main navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-header">
                <a class="navbar-brand" href="../../../../"><img
                        src="../../../../assets/images/onlinelogomaker-010418-1811-1347.png" alt=""></a>

                <ul class="nav navbar-nav pull-right visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="sidebar-control sidebar-main-toggle hidden-xs">
                            <i class="icon-paragraph-justify3"></i>
                        </a>
                    </li>

                    <!--                    <li class="dropdown">-->
                    <!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
                    <!--                            <i class="icon-git-compare"></i>-->
                    <!--                            <span class="visible-xs-inline-block position-right">Git updates</span>-->
                    <!--                            <span class="badge bg-warning-400">9</span>-->
                    <!--                        </a>-->
                    <!---->
                    <!--                        <div class="dropdown-menu dropdown-content">-->
                    <!--                            <div class="dropdown-content-heading">-->
                    <!--                                Git updates-->
                    <!--                                <ul class="icons-list">-->
                    <!--                                    <li><a href="#"><i class="icon-sync"></i></a></li>-->
                    <!--                                </ul>-->
                    <!--                            </div>-->
                    <!---->
                    <!--                            <ul class="media-list dropdown-content-body width-350">-->
                    <!--                                <li class="media">-->
                    <!--                                    <div class="media-left">-->
                    <!--                                        <a href="#"-->
                    <!--                                           class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i-->
                    <!--                                                    class="icon-git-pull-request"></i></a>-->
                    <!--                                    </div>-->
                    <!---->
                    <!--                                    <div class="media-body">-->
                    <!--                                        Drop the IE <a href="#">specific hacks</a> for temporal inputs-->
                    <!--                                        <div class="media-annotation">4 minutes ago</div>-->
                    <!--                                    </div>-->
                    <!--                                </li>-->
                    <!---->
                    <!--                                <li class="media">-->
                    <!--                                    <div class="media-left">-->
                    <!--                                        <a href="#"-->
                    <!--                                           class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i-->
                    <!--                                                    class="icon-git-commit"></i></a>-->
                    <!--                                    </div>-->
                    <!---->
                    <!--                                    <div class="media-body">-->
                    <!--                                        Add full font overrides for popovers and tooltips-->
                    <!--                                        <div class="media-annotation">36 minutes ago</div>-->
                    <!--                                    </div>-->
                    <!--                                </li>-->
                    <!---->
                    <!--                                <li class="media">-->
                    <!--                                    <div class="media-left">-->
                    <!--                                        <a href="#"-->
                    <!--                                           class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i-->
                    <!--                                                    class="icon-git-branch"></i></a>-->
                    <!--                                    </div>-->
                    <!---->
                    <!--                                    <div class="media-body">-->
                    <!--                                        <a href="#">Chris Arney</a> created a new <span-->
                    <!--                                                class="text-semibold">Design</span>-->
                    <!--                                        branch-->
                    <!--                                        <div class="media-annotation">2 hours ago</div>-->
                    <!--                                    </div>-->
                    <!--                                </li>-->
                    <!---->
                    <!--                                <li class="media">-->
                    <!--                                    <div class="media-left">-->
                    <!--                                        <a href="#"-->
                    <!--                                           class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i-->
                    <!--                                                    class="icon-git-merge"></i></a>-->
                    <!--                                    </div>-->
                    <!---->
                    <!--                                    <div class="media-body">-->
                    <!--                                        <a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span>-->
                    <!--                                        and-->
                    <!--                                        <span class="text-semibold">Dev</span> branches-->
                    <!--                                        <div class="media-annotation">Dec 18, 18:36</div>-->
                    <!--                                    </div>-->
                    <!--                                </li>-->
                    <!---->
                    <!--                                <li class="media">-->
                    <!--                                    <div class="media-left">-->
                    <!--                                        <a href="#"-->
                    <!--                                           class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i-->
                    <!--                                                    class="icon-git-pull-request"></i></a>-->
                    <!--                                    </div>-->
                    <!---->
                    <!--                                    <div class="media-body">-->
                    <!--                                        Have Carousel ignore keyboard events-->
                    <!--                                        <div class="media-annotation">Dec 12, 05:46</div>-->
                    <!--                                    </div>-->
                    <!--                                </li>-->
                    <!--                            </ul>-->
                    <!---->
                    <!--                            <div class="dropdown-content-footer">-->
                    <!--                                <a href="#" data-popup="tooltip" title="All activity"><i-->
                    <!--                                            class="icon-menu display-block"></i></a>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </li>-->
                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-people"></i>
                            <span class="visible-xs-inline-block position-right">Connection Request</span>
                            <span class="badge bg-warning-400"><?php echo $data_cony['row'] ?></span>
                        </a>


                        <div class="dropdown-menu dropdown-content">
                            <div class="dropdown-content-heading">
                                Connection Request
                            </div>


                            <ul class="media-list dropdown-content-body width-300">

                                <?php
                                if(empty($data_cony['message'])){
                                    foreach ($data_cony as $key_req=>$value_req){
                                        $data_frnd=$obj->account($value_req['send_username']);
                                        foreach ($data_frnd as $key_frnd => $value_frnd){
                                            ?>

                                            <li class="media">
                                                <?php
                                                if(isset($data_cony['accept_message'])){
                                                    ?>
                                                    <div class="alert alert-success">
                                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                                                class="sr-only">Close</span></button>
                                                        <?php echo $data_cony['accept_message']; ?>
                                                    </div>
                                                    <?php
                                                }elseif(isset($data_cony['reject_message'])) {
                                                    ?>
                                                    <div class="alert alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                                                class="sr-only">Close</span></button>
                                                        <?php echo $data_cony['reject_message']; ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>

                                                <div class="media-left"><a href="../../account/?user=<?php echo $value_frnd['username'] ?>">
                                                        <?php
                                                        if(!empty($value_frnd['user_pic'])) {
                                                            ?>
                                                            <img src="../../../../img/<?php echo $value_frnd['user_pic'] ?>"
                                                                 class="img-circle img-sm" alt="">
                                                            <?php
                                                        }else {
                                                            ?>
                                                            <img src="../../../../assets/images/placeholder.jpg"
                                                                 class="img-circle img-sm" alt="">
                                                            <?php
                                                        }
                                                        ?>
                                                    </a></div>
                                                <div class="media-body">
                                                    <a href="../../account/?user=<?php echo $value_frnd['username'] ?>" class="media-heading text-semibold"><?php echo $value_frnd['first_name']." ".$value_frnd['last_name'] ?></a>
                                                    <span class="display-block text-muted text-size-small"><?php echo $value_frnd['skills'] ?></span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <a href="../../account/connect.php?usn_accept_username=<?php echo $value_frnd['username'] ?>" >
                                                        <span class="icon-check" style="color:green"></span></a>
                                                </div>
                                                <div class="media-right media-middle ">
                                                    <a href="../../account/connect.php?usn_reject_username=<?php echo $value_frnd['username'] ?>" >
                                                        <span class="icon-cross" style="color:red"></span></a>
                                                </div>
                                            </li>


                                            <?php
                                        }
                                    }
                                }else {
                                    ?>
                                    <div class="timeline-row">
                                        <div class="content-group-sm">
                                            <!-- Basic alert -->
                                            <div class="alert alert-danger">
                                                <?php echo $data_cony['message']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                            </ul>

                            <div class="dropdown-content-footer">
                                <a href="../../request" data-popup="tooltip" title="All requests"><i
                                            class="icon-menu display-block"></i></a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-bubbles4"></i>
                            <span class="visible-xs-inline-block position-right">Messages</span>
                            <span class="badge bg-warning-400">2</span>
                        </a>

                        <div class="dropdown-menu dropdown-content width-350">
                            <div class="dropdown-content-heading">
                                Messages
                                <ul class="icons-list">
                                    <li><a href="#"><i class="icon-compose"></i></a></li>
                                </ul>
                            </div>

                            <ul class="media-list dropdown-content-body">
                                <li class="media">
                                    <div class="media-left">
                                        <img src="../../../../assets/images/placeholder.jpg" class="img-circle img-sm"
                                             alt="">
                                        <span class="badge bg-danger-400 media-badge">5</span>
                                    </div>

                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">James Alexander</span>
                                            <span class="media-annotation pull-right">04:58</span>
                                        </a>

                                        <span
                                            class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left">
                                        <img src="../../../../assets/images/placeholder.jpg" class="img-circle img-sm"
                                             alt="">
                                        <span class="badge bg-danger-400 media-badge">4</span>
                                    </div>

                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Margo Baker</span>
                                            <span class="media-annotation pull-right">12:16</span>
                                        </a>

                                        <span
                                            class="text-muted">That was something he was unable to do because...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left"><img src="../../../../assets/images/placeholder.jpg"
                                                                 class="img-circle img-sm" alt=""></div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Jeremy Victorino</span>
                                            <span class="media-annotation pull-right">22:48</span>
                                        </a>

                                        <span
                                            class="text-muted">But that would be extremely strained and suspicious...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left"><img src="../../../../assets/images/placeholder.jpg"
                                                                 class="img-circle img-sm" alt=""></div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Beatrix Diaz</span>
                                            <span class="media-annotation pull-right">Tue</span>
                                        </a>

                                        <span
                                            class="text-muted">What a strenuous career it is that I've chosen...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left"><img src="../../../../assets/images/placeholder.jpg"
                                                                 class="img-circle img-sm" alt=""></div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Richard Vango</span>
                                            <span class="media-annotation pull-right">Mon</span>
                                        </a>

                                        <span
                                            class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                    </div>
                                </li>
                            </ul>

                            <div class="dropdown-content-footer">
                                <a href="../messages/" data-popup="tooltip" title="All messages"><i
                                        class="icon-menu display-block"></i></a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            if(!empty($value['user_pic'])) {
                                ?>
                                <img src="../../../../img/<?php echo $value['user_pic']; ?>" class="img-xs img-circle"
                                     alt="<?php echo $value['username']; ?>" style="object-fit: cover;">
                                <?php
                            }else {
                                ?>
                                <img src="../../../../assets/images/placeholder.jpg" class="img-xs img-circle"
                                     alt="<?php echo $value['username']; ?>">
                                <?php
                            }
                            ?>
                            <span class="text-semibold"><?php echo ucwords($value['first_name']).' '.ucwords($value['last_name']); ?></span>
                            <i class="caret"></i>
                        </a>


                        <ul class="dropdown-menu dropdown-menu-right">
                            <!--                            <li><a href="#profile" data-toggle="tab"><i class="icon-user-plus"></i> My profile</a></li>-->
                            <!--                            <li><a href="#"><i class="icon-coins"></i> My balance</a></li>-->
                            <!--                            <li><a href="#"><span class="badge badge-warning pull-right">58</span> <i-->
                            <!--                                            class="icon-comment-discussion"></i> Messages</a></li>-->
                            <li class="divider"></li>
                            <li><a href="../../../../actions/logout"><i class="icon-switch2"></i> Logout</a></li>
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
                                    <a href="../../home/" class="media-left">
                                        <?php
                                        if(!empty($value['user_pic'])) {
                                            ?>
                                            <img src="../../../../img/<?php echo $value['user_pic']; ?>"
                                                 class="img-circle img-lg" alt="" style="object-fit: cover;">
                                            <?php
                                        }else {
                                            ?>
                                            <img src="../../../../assets/images/placeholder.jpg"
                                                 class="img-circle img-lg" alt="">
                                            <?php
                                        }
                                        ?>
                                    </a>
                                    <div class="media-body">
                                        <a href="../../home/"><span
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
                                    include ('demo_chat_nav.php');
                                    ?>

                                    <!-- /chat -->

                                </div>
                            </div>
                        </div>
                        <!-- /main navigation -->

                    </div>
                </div>
                <!-- /main sidebar -->




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
                                                class="icon-user position-left"></i>Messages</a></li>
                                </ul>

                                <div class="navbar-right">
                                    <ul class="nav navbar-nav">
                                        <li><a href="../../notice"><i class="icon-stack-text position-left"></i> Notice</a></li>
                                        <li><a href="../../connection/"><i class="icon-collaboration position-left"></i> Connections</a>
                                        </li>
                                        <li><a href="#"><i class="icon-images3 position-left"></i> Photos</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                        class="icon-gear"></i> <span
                                                        class="visible-xs-inline-block position-right"> Options</span>
                                                <span
                                                        class="caret"></span></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="../../paper"><i class="icon-file-text2"></i> Paper</a></li>
                                                <li><a href="../../journal"><i class="icon-magazine"></i> Journal</a></li>
                                                <!--                                                <li><a href="#"><i class="icon-make-group"></i> Manage sections</a></li>-->
                                                <!--                                                <li class="divider"></li>-->
                                                <!--                                                <li><a href="#"><i class="icon-three-bars"></i> Activity log</a></li>-->
                                                <!--                                                <li><a href="#"><i class="icon-cog5"></i> Profile settings</a></li>-->
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
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



                                                <!-- Connection list -->





                                                <!-- /connection list -->



                                            </div>
                                            <!-- /profile -->

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">

                                <!-- User thumbnail -->
                                <div class="thumbnail">

                                    <div class="thumb thumb-rounded" style="height: 140px; width: 140px; object-fit: cover;">
                                        <?php
                                        if (!empty($value['user_pic'])) {
                                            ?>
                                            <img src="../../../../img/<?php echo $value['user_pic']; ?>"
                                                 alt="<?php echo $value['username']; ?>" style="height: 140px; width: 140px; object-fit: cover;">
                                            <?php
                                        }else {
                                            ?>
                                            <img src="../../../../assets/images/placeholder.jpg"
                                                 alt="<?php echo $value['username']; ?>" width="140" height="140">
                                            <?php
                                        }
                                        ?>
                                        <div class="caption-overflow">
										<span>
                                            <?php
                                            if (!empty($value['user_pic'])) {
                                                ?>
                                                <a href="../../../../img/<?php echo $value['user_pic']; ?>"
                                                   class="btn bg-teal-300 btn-rounded btn-icon" data-popup="lightbox"><i
                                                        class="icon-zoomin3"></i></a>
                                                <?php
                                            }else {
                                                ?>
                                                <a href="../../../../assets/images/placeholder.jpg"
                                                   class="btn bg-teal-300 btn-rounded btn-icon" data-popup="lightbox"><i
                                                        class="icon-zoomin3"></i></a>
                                                <?php
                                            }
                                            ?>
                                            <a href="../../account/" class="btn bg-teal-300 btn-rounded btn-icon"><i
                                                    class="icon-link"></i></a>
										</span>
                                        </div>
                                    </div>

                                    <div class="caption text-center">
                                        <h6 class="text-semibold no-margin"><?php echo $value['first_name'] . ' ' . $value['last_name']; ?>
                                            <small class="display-block"><?php echo $value['skills']; ?></small>
                                        </h6>
                                        <ul class="icons-list mt-15">
                                            <li><a href="#" data-popup="tooltip" title="Google Drive"><i
                                                        class="icon-google-drive"></i></a></li>
                                            <li><a href="#" data-popup="tooltip" title="Twitter"><i
                                                        class="icon-twitter"></i></a></li>
                                            <li><a href="#" data-popup="tooltip" title="Github"><i
                                                        class="icon-github"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <!-- /user thumbnail -->


                                <!-- Navigation -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">Navigation</h6>
                                        <!--                                            <div class="heading-elements">-->
                                        <!--                                                <a href="#" class="heading-text">See all &rarr;</a>-->
                                        <!--                                            </div>-->
                                    </div>

                                    <div class="list-group list-group-borderless no-padding-top">
                                        <a href="../../account/" class="list-group-item"><i class="icon-user"></i> My profile</a>
                                        <a href="#" class="list-group-item"><i class="icon-tree7"></i> Connections <span
                                                class="badge bg-danger pull-right"><?php echo $conn_num; ?></span></a>
                                        <div class="list-group-divider"></div>
                                        <!--                                        <a href="#" class="list-group-item"><i class="icon-calendar3"></i> Events <span-->
                                        <!--                                                class="badge bg-teal-400 pull-right">48</span></a>-->
                                        <a href="#" class="list-group-item"><i class="icon-cog3"></i> Account
                                            settings</a>
                                    </div>
                                </div>
                                <!-- /navigation -->


                                <!-- Connections -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">New Users</h6>
                                        <div class="heading-elements">
                                            <span
                                                class="badge badge-success heading-text"><?php echo $user['row'] ?></span>
                                        </div>
                                    </div>

                                    <ul class="media-list media-list-linked pb-5">

                                        <li class="media-header">Students</li>
                                        <?php
                                        foreach ($user as $key4 => $info) {
                                            if ($info['user_status'] == 'Student') {
                                                ?>
                                                <li class="media">
                                                    <a href="../../account/?user=<?php echo $info['username'] ?>" class="media-link">
                                                        <div class="media-left">
                                                            <?php
                                                            if(!empty($info['user_pic'])) {
                                                                ?>
                                                                <img src="../../../../img/<?php echo $info['user_pic'] ?>"
                                                                     class="img-circle" alt="" style="object-fit: cover;">
                                                                <?php
                                                            }else {
                                                                ?>
                                                                <img src="../../../../assets/images/placeholder.jpg"
                                                                     class="img-circle" alt="">
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="media-body">
                                                            <span
                                                                class="media-heading text-semibold"><?php echo $info['first_name'] . ' ' . $info['last_name'] ?></span>
                                                            <span
                                                                class="media-annotation"><?php echo $info['skills'] ?></span>
                                                        </div>
                                                        <div class="media-right media-middle">
                                                            <?php
                                                            if($info['is_active']==1) {
                                                                ?>
                                                                <span class="status-mark bg-success"></span>
                                                                <?php
                                                            }else {
                                                                ?>
                                                                <span class="status-mark bg-warning"></span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </a>
                                                </li>

                                                <?php
                                            }
                                        }
                                        ?>


                                        <li class="media-header">Teachers</li>
                                        <?php
                                        foreach ($user as $key4 => $info) {
                                            if ($info['user_status'] == 'Teacher') {
                                                ?>
                                                <li class="media">
                                                    <a href="../../account/?user=<?php echo $info['username'] ?>" class="media-link">
                                                        <div class="media-left">
                                                            <?php
                                                            if(!empty($info['user_pic'])) {
                                                                ?>
                                                                <img src="../../../../img/<?php echo $info['user_pic'] ?>"
                                                                     class="img-circle" alt="" style="object-fit: cover;">
                                                                <?php
                                                            }else {
                                                                ?>
                                                                <img src="../../../../assets/images/placeholder.jpg"
                                                                     class="img-circle" alt="">
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="media-body">
                                                            <span
                                                                class="media-heading text-semibold"><?php echo $info['first_name'] . ' ' . $info['last_name'] ?></span>
                                                            <span
                                                                class="media-annotation"><?php echo $info['skills'] ?></span>
                                                        </div>
                                                        <div class="media-right media-middle">
                                                            <?php
                                                            if($info['is_active']==1) {
                                                                ?>
                                                                <span class="status-mark bg-success"></span>
                                                                <?php
                                                            }else {
                                                                ?>
                                                                <span class="status-mark bg-warning"></span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>


                                        <li class="media-header">Administration</li>
                                        <?php
                                        foreach ($user as $key4 => $info) {
                                            if ($info['user_status'] == 'Administration') {
                                                ?>
                                                <li class="media">
                                                    <a href="../../account/?user=<?php echo $info['username'] ?>" class="media-link">
                                                        <div class="media-left">
                                                            <?php
                                                            if(!empty($info['user_pic'])) {
                                                                ?>
                                                                <img src="../../../../img/<?php echo $info['user_pic'] ?>"
                                                                     class="img-circle" alt="" style="object-fit: cover;">
                                                                <?php
                                                            }else {
                                                                ?>
                                                                <img src="../../../../assets/images/placeholder.jpg"
                                                                     class="img-circle" alt="">
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="media-body">
                                                            <span
                                                                class="media-heading text-semibold"><?php echo $info['first_name'] . ' ' . $info['last_name'] ?></span>
                                                            <span
                                                                class="media-annotation"><?php echo $info['skills'] ?></span>
                                                        </div>
                                                        <div class="media-right media-middle">
                                                            <?php
                                                            if($info['is_active']==1) {
                                                                ?>
                                                                <span class="status-mark bg-success"></span>
                                                                <?php
                                                            }else {
                                                                ?>
                                                                <span class="status-mark bg-warning"></span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </a>
                                                </li>


                                                <?php
                                            }
                                        }
                                        ?>

                                    </ul>
                                </div>
                                <!-- /connections -->
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
    header('location:../../../../');
}
?>
