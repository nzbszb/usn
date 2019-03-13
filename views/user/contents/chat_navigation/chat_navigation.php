<!-- Chat -->
<div class="panel-heading"><h6 class="panel-title text-semibold">Chat</h6>
    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a class="reload" data-action="reload"></a></li>
        </ul>
    </div>
</div>

<div  class="panel-body">
    <ul class="media-list">
        <?php
        $active_chat_count = 0;
        $other_chat_count = 0;
        if (!empty($data_con)) {
        foreach ($data_con as $con_key => $con_value) {
            if ($con_value['send_username'] != $_SESSION['usn_username']) {
                $data_details = $obj_con->connectionInfo($con_value['send_username']);
                if ($data_details['is_active'] == 1) {
                    $active_chat_count = $active_chat_count + 1;
                }
            }
        if ($con_value['reci_username'] != $_SESSION['usn_username']) {
            $data_details = $obj_con->connectionInfo($con_value['reci_username']);
            if ($data_details['is_active'] == 1) {
                $active_chat_count = $active_chat_count + 1;
            }
        }
        }
            ?>

            <div><li class="media-header text-semibold"><a>Active Connections(<b style="color: forestgreen"><?php echo $active_chat_count ?></b>)
                <div class="media-header-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div></a>
            </li>

            <?php
            $active_chat_count = 0;
            foreach ($data_con as $con_key => $con_value) {
                if ($con_value['send_username'] != $_SESSION['usn_username']) {
                    $data_details = $obj_con->connectionInfo($con_value['send_username']);
                    if ($data_details['is_active'] == 1) {
                        $active_chat_count = $active_chat_count + 1;
                        ?>
                        <li class="media">
                            <div class="media-left media-middle">
                                <a href="../account/?user=<?php echo $data_details['username'] ?>">
                                    <?php
                                    if (!empty($data_details['user_pic'])) {
                                        ?>
                                        <img src="../../../img/<?php echo $data_details['user_pic'] ?>"
                                             class="img-circle" alt="" style="object-fit: cover;">
                                        <?php
                                    } else {
                                        ?>
                                        <img src="../../../assets/images/placeholder.jpg" class="img-circle" alt="">
                                        <?php
                                    }
                                    ?>
                                </a>
                                <span class="badge bg-blue-400 media-badge chat_ntf" data-send_username="<?php echo $value['username'] ?>" data-reci_username="<?php echo $data_details['username'] ?>"></span>
                            </div>

                            <div class="media-body">
                                <div
                                    class="media-heading text-semibold text-capitalize"><?php echo $data_details['first_name'] . ' ' . $data_details['last_name'] ?></div>
                                <span class="text-highlight"><?php echo $data_details['user_status'] ?></span>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list icons-list-extended text-nowrap">
                                    <li><a href="#chat" data-popup="tooltip" title="Chat" data-toggle="modal"
                                           class="mychat" data-refresh="clearInterval(ajaxFn)" data-status="1"
                                           data-send_username="<?php echo $value['username'] ?>"
                                           data-reci_username="<?php echo $data_details['username'] ?>" data-reci_user_pic="<?php echo $data_details['user_pic'] ?>" data-send_user_pic="<?php echo $value['user_pic'] ?>"><i
                                                class="icon-comment"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                }
                if ($con_value['reci_username'] != $_SESSION['usn_username']) {
                    $data_details = $obj_con->connectionInfo($con_value['reci_username']);
                    if ($data_details['is_active'] == 1) {
                        $active_chat_count = $active_chat_count + 1;
                        ?>
                        <li class="media">
                            <div class="media-left media-middle">
                                <a href="../account/?user=<?php echo $data_details['username'] ?>">
                                    <?php
                                    if (!empty($data_details['user_pic'])) {
                                        ?>
                                        <img src="../../../img/<?php echo $data_details['user_pic'] ?>"
                                             class="img-circle" alt="" style="object-fit: cover;">
                                        <?php
                                    } else {
                                        ?>
                                        <img src="../../../assets/images/placeholder.jpg" class="img-circle" alt="">
                                        <?php
                                    }
                                    ?>
                                </a>
                                <span class="badge bg-blue-400 media-badge chat_ntf" data-send_username="<?php echo $value['username'] ?>" data-reci_username="<?php echo $data_details['username'] ?>"></span>
                            </div>

                            <div class="media-body">
                                <div
                                    class="media-heading text-semibold text-capitalize"><?php echo $data_details['first_name'] . ' ' . $data_details['last_name'] ?></div>
                                <span class="text-highlight"><?php echo $data_details['user_status'] ?></span>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list icons-list-extended text-nowrap">
                                    <li><a href="#chat" data-popup="tooltip" title="Chat" data-toggle="modal"
                                           class="mychat" data-refresh="clearInterval(ajaxFn)" data-status="1"
                                           data-send_username="<?php echo $value['username'] ?>"
                                           data-reci_username="<?php echo $data_details['username'] ?>" data-reci_user_pic="<?php echo $data_details['user_pic'] ?>" data-send_user_pic="<?php echo $value['user_pic'] ?>"><i
                                                class="icon-comment"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                }
            }
            if ($active_chat_count == 0) {

                ?>
                <li class="media-heading text-semibold text-capitalize text-center">No one is online</li>
                <?php
            }
            foreach ($data_con as $con_key => $con_value) {
                if ($con_value['send_username'] != $_SESSION['usn_username']) {
                    $data_details = $obj_con->connectionInfo($con_value['send_username']);
                    if ($data_details['is_active'] == 0) {
                        $other_chat_count = $other_chat_count + 1;
                    }
                }
                if ($con_value['reci_username'] != $_SESSION['usn_username']) {
                    $data_details = $obj_con->connectionInfo($con_value['reci_username']);
                    if ($data_details['is_active'] == 0) {
                        $other_chat_count = $other_chat_count + 1;
                    }
                }
            }
            ?>

            </div><br/>
            <div>
            <li class="media-header text-semibold"><a>Other Connections(<b style="color: red"><?php echo $other_chat_count ?></b>)
                <div class="media-header-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div></a>
            </li>

            <?php
            $other_chat_count = 0;
            foreach ($data_con as $con_key => $con_value) {
                if ($con_value['send_username'] != $_SESSION['usn_username']) {
                    $data_details = $obj_con->connectionInfo($con_value['send_username']);
                    if ($data_details['is_active'] == 0) {
                        $other_chat_count = $other_chat_count + 1;
                        ?>

                        <li class="media">
                            <div class="media-left media-middle">
                                <a href="../account/?user=<?php echo $data_details['username'] ?>">
                                    <?php
                                    if (!empty($data_details['user_pic'])) {
                                        ?>
                                        <img src="../../../img/<?php echo $data_details['user_pic'] ?>"
                                             class="img-circle" alt="" style="object-fit: cover;">
                                        <?php
                                    } else {
                                        ?>
                                        <img src="../../../assets/images/placeholder.jpg" class="img-circle" alt="">
                                        <?php
                                    }
                                    ?>
                                </a>
                                <span class="badge bg-blue-400 media-badge chat_ntf" data-send_username="<?php echo $value['username'] ?>" data-reci_username="<?php echo $data_details['username'] ?>"></span>
                            </div>

                            <div class="media-body">
                                <div
                                    class="media-heading text-semibold text-capitalize"><?php echo $data_details['first_name'] . ' ' . $data_details['last_name'] ?></div>
                                <span class="text-highlight"><?php echo $data_details['user_status'] ?></span>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list icons-list-extended text-nowrap">
                                    <li><a href="#chat" data-popup="tooltip" title="Chat" data-toggle="modal"
                                           class="mychat" data-refresh="clearInterval(ajaxFn)" data-status="0"
                                           data-send_username="<?php echo $value['username'] ?>"
                                           data-reci_username="<?php echo $data_details['username'] ?>" data-reci_user_pic="<?php echo $data_details['user_pic'] ?>" data-send_user_pic="<?php echo $value['user_pic'] ?>"><i
                                                class="icon-comment"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                }
                if ($con_value['reci_username'] != $_SESSION['usn_username']) {
                    $data_details = $obj_con->connectionInfo($con_value['reci_username']);
                    if ($data_details['is_active'] == 0) {
                        $other_chat_count = $other_chat_count + 1;
                        ?>
                        <li class="media">
                            <div class="media-left media-middle">
                                <a href="../account/?user=<?php echo $data_details['username'] ?>">
                                    <?php
                                    if (!empty($data_details['user_pic'])) {
                                        ?>
                                        <img src="../../../img/<?php echo $data_details['user_pic'] ?>"
                                             class="img-circle" alt="" style="object-fit: cover;">
                                        <?php
                                    } else {
                                        ?>
                                        <img src="../../../assets/images/placeholder.jpg" class="img-circle" alt="">
                                        <?php
                                    }
                                    ?>
                                </a>
                                <span class="badge bg-blue-400 media-badge chat_ntf" data-send_username="<?php echo $value['username'] ?>" data-reci_username="<?php echo $data_details['username'] ?>"></span>
                            </div>

                            <div class="media-body">
                                <div
                                    class="media-heading text-semibold text-capitalize"><?php echo $data_details['first_name'] . ' ' . $data_details['last_name'] ?></div>
                                <span class="text-highlight"><?php echo $data_details['user_status'] ?></span>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list icons-list-extended text-nowrap">
                                    <li><a href="#chat" data-popup="tooltip" title="Chat" data-toggle="modal"
                                           class="mychat" data-refresh="clearInterval(ajaxFn)" data-status="0"
                                           data-send_username="<?php echo $value['username'] ?>"
                                           data-reci_username="<?php echo $data_details['username'] ?>" data-reci_user_pic="<?php echo $data_details['user_pic'] ?>" data-send_user_pic="<?php echo $value['user_pic'] ?>"><i
                                                class="icon-comment"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                }
            }
            if ($other_chat_count == 0) {

                ?>
                <li class="media-heading text-semibold text-capitalize text-center">Everyone is online</li>
                </div>
                <?php
            }
        } else {
            ?>
            <span class="badge bg-blue-400 media-badge chat_ntf" data-send_username="<?php echo $value['username'] ?>" data-reci_username="<?php echo $value['username'] ?>" hidden></span>
            <li class="media-header">You have <b>Zero</b> Connection</li>
            <?php
        }
            ?>
</ul>
</div>

<!-- /chat -->




