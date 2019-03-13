<?php
if($value['username']!=$value_user['username']) {
    ?>
    <li><?php if (isset($_SESSION['message'])) {
            ?>
                <div class="content-group-sm" style="height: 1px">
                    <!-- Basic alert -->
                    <div class="alert alert-success alert-styled-left">
                        <button type="button" class="close"
                                data-dismiss="alert">
                            <span>&times;</span><span
                                class="sr-only">Close</span></button>
                        <?php echo $_SESSION['message']; ?>
                    </div>
                </div>
            <?php
            unset($_SESSION['message']);
        }
        ?></li>
    <?php
    $count_con = $obj_con->connectionSetData($_GET)->connectionSetData($_SESSION)->checkConnection();
    if(($count_con->status=='true') && ($_GET['user']!=$_SESSION['usn_username'])) {
        ?>
        <li class="dropdown dropdown-user">
        <a class="dropdown-toggle" data-toggle="dropdown">
            <span>Connected</span>
            <i class="caret"></i>
        </a>


        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="connect.php?usn_reject_username=<?php echo $value_user['username'] ?>"><i class="icon-cross"></i> Delete Connection</a></li>
        </ul>
        </li><?php
    }elseif(($count_con->status=='false')  && ($_GET['user']!=$_SESSION['usn_username']) && ($count_con->send_username==$_SESSION['usn_username'])) {
        ?>
        <li class="dropdown dropdown-user">
        <a class="dropdown-toggle" data-toggle="dropdown">
            <span>Requested</span>
            <i class="caret"></i>
        </a>


        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="connect.php?usn_reject_username=<?php echo $value_user['username'] ?>"><i class="icon-cross"></i> Cancel Request</a></li>
        </ul>
        </li><?php
    }elseif(($count_con->status=='false')  && ($_GET['user']!=$_SESSION['usn_username']) && ($count_con->reci_username==$_SESSION['usn_username'])) {
        ?>
        <li class="dropdown dropdown-user">
        <a class="dropdown-toggle" data-toggle="dropdown">
            <span>Requested a Connection</span>
            <i class="caret"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="connect.php?usn_accept_username=<?php echo $value_user['username'] ?>"><i class="icon-check"></i> Accept Request</a></li>
            <li><a href="connect.php?usn_reject_username=<?php echo $value_user['username'] ?>"><i class="icon-cross"></i> Cancel Request</a></li>
        </ul>
        </li><?php
    }else{
        ?>
        <li>
        <div class="btn-toolbar" role="toolbar" style="margin: 5%;">
                        <span>
                                    <a href="connect.php?usn_reci_username=<?php echo $value_user['username'] ?>"
                                       class="btn btn-default btn-xs icon-user-plus"> Add Connection</a>
                            </span>
        </div>
        </li><?php

    }
}
?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-people"></i>
        <span class="visible-xs-inline-block position-right">Connection Request</span>
        <span class="badge bg-warning-400"><?php echo sizeof($data_cony) ?></span>
    </a>


    <div class="dropdown-menu dropdown-content">
        <div class="dropdown-content-heading">
            Connection Request
        </div>


        <ul class="media-list dropdown-content-body width-300">

            <?php
            if(sizeof($data_cony)!=0){

                foreach ($data_cony as $key_req=>$value_req) {
                    if ($value_req['status'] == 'false') {
                        $data_frnd = $obj->accountRqst($value_req['send_username']);
                        foreach ($data_frnd as $key_frnd => $value_frnd) {
                            ?>

                            <li class="media">
                                <?php
                                if (isset($_SESSION['message'])) {
                                    ?>
                                <div class="content-group-sm" style="height: 1px">
                                    <!-- Basic alert -->
                                    <div class="alert alert-success alert-styled-left">
                                        <button type="button" class="close"
                                                data-dismiss="alert">
                                            <span>&times;</span><span
                                                    class="sr-only">Close</span></button>
                                        <?php echo $_SESSION['message']; ?>
                                    </div>
                                    </div>
                                    <?php
                                }
                                    ?>

                                <div class="media-left"><a
                                        href="../account/?user=<?php echo $value_frnd['username'] ?>">
                                        <?php
                                        if (!empty($value_frnd['user_pic'])) {
                                            ?>
                                            <img src="../../../img/<?php echo $value_frnd['user_pic'] ?>"
                                                 class="img-circle img-sm" alt="">
                                            <?php
                                        } else {
                                            ?>
                                            <img src="../../../assets/images/placeholder.jpg"
                                                 class="img-circle img-sm" alt="">
                                            <?php
                                        }
                                        ?>
                                    </a></div>
                                <div class="media-body">
                                    <a href="../account/?user=<?php echo $value_frnd['username'] ?>"
                                       class="media-heading text-semibold"><?php echo $value_frnd['first_name'] . " " . $value_frnd['last_name'] ?></a>
                                    <span class="display-block text-muted text-size-small"><?php echo $value_frnd['skills'] ?></span>
                                </div>
                                <div class="media-right media-middle">
                                    <a href="../account/connect.php?usn_accept_username=<?php echo $value_frnd['username'] ?>">
                                        <span class="icon-check" style="color:green"></span></a>
                                </div>
                                <div class="media-right media-middle ">
                                    <a href="../account/connect.php?usn_reject_username=<?php echo $value_frnd['username'] ?>">
                                        <span class="icon-cross" style="color:red"></span></a>
                                </div>
                            </li>


                            <?php
                        }
                    }
                }
            }else {
                ?>
                <div class="timeline-row">
                    <div class="content-group-sm">
                        <!-- Basic alert -->
                        <div class="alert alert-danger">
                            No New Request
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </ul>

        <div class="dropdown-content-footer">
            <a href="../request" data-popup="tooltip" title="All requests"><i
                    class="icon-menu display-block"></i></a>
        </div>
    </div>
</li>