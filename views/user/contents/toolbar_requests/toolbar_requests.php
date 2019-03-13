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
            if (sizeof($data_cony)!=0) {
                foreach ($data_cony as $key_req => $value_req) {
                    $data_frnd = $obj->accountRqst($value_req['send_username']);
                    if (is_array($data_frnd) || is_object($data_frnd)) {
                        foreach ($data_frnd as $key_frnd => $value_frnd) {
                            ?>

                            <li class="media">
                                <?php
                                if (isset($_SESSION['message'])) {
                                    ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span>&times;</span><span
                                                    class="sr-only">Close</span></button>
                                        <?php echo $_SESSION['message']; ?>
                                    </div>
                                    <?php
                                } elseif (isset($_SESSION['message'])) {
                                    ?>
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span>&times;</span><span
                                                    class="sr-only">Close</span></button>
                                        <?php echo $_SESSION['message']; ?>
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
                                       class="media-heading text-semibold text-capitalize"><?php echo $value_frnd['first_name'] . " " . $value_frnd['last_name'] ?></a>
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
            } else {
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