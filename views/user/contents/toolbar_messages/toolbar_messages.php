<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="icon-bubbles4"></i>
        <span class="visible-xs-inline-block position-right">Messages</span>
        <span id="unreadmsg" class="badge bg-warning-400"></span>
    </a>

    <div class="dropdown-menu dropdown-content width-350">
        <div class="dropdown-content-heading">
            Messages
<!--            <ul class="icons-list">-->
<!--                <li><a href="#"><i class="icon-compose"></i></a></li>-->
<!--            </ul>-->
        </div>

        <ul class="media-list dropdown-content-body toolbar_chat_users" data-send_username="<?php echo $_SESSION['usn_username'] ?>" data-send_user_pic="<?php echo $value['user_pic'] ?>">
<!--            <li class="media" data-status=""-->
<!--                data-fullname="" data-send_username="" data-reci_username="" data-reci_user_pic="" data-send_user_pic="">-->
<!--                <div class="media-left">-->
<!--                    <img src="../../../assets/images/placeholder.jpg" class="img-circle img-sm toolbar_chat_users_img"-->
<!--                         alt="">-->
<!--                    <span class="badge bg-danger-400 media-badge toolbar_chat_users_status">5</span>-->
<!--                </div>-->
<!---->
<!--                <div class="media-body">-->
<!--                    <a href="#" class="media-heading">-->
<!--                        <span class="text-semibold toolbar_chat_users_full_name">James Alexander</span>-->
<!--                        <span class="media-annotation pull-right toolbar_chat_users_time">04:58</span>-->
<!--                    </a>-->
<!---->
<!--                    <span class="text-muted toolbar_chat_users_msg">who knows, maybe that would be the best thing for me...</span>-->
<!--                </div>-->
<!--            </li>-->

<!--            <li class="media">-->
<!--                <div class="media-left">-->
<!--                    <img src="../../../assets/images/placeholder.jpg" class="img-circle img-sm"-->
<!--                         alt="">-->
<!--                    <span class="badge bg-danger-400 media-badge">4</span>-->
<!--                </div>-->
<!---->
<!--                <div class="media-body">-->
<!--                    <a href="#" class="media-heading">-->
<!--                        <span class="text-semibold">Margo Baker</span>-->
<!--                        <span class="media-annotation pull-right">12:16</span>-->
<!--                    </a>-->
<!---->
<!--                    <span class="text-muted">That was something he was unable to do because...</span>-->
<!--                </div>-->
<!--            </li>-->
<!---->
<!--            <li class="media">-->
<!--                <div class="media-left"><img src="../../../assets/images/placeholder.jpg"-->
<!--                                             class="img-circle img-sm" alt=""></div>-->
<!--                <div class="media-body">-->
<!--                    <a href="#" class="media-heading">-->
<!--                        <span class="text-semibold">Jeremy Victorino</span>-->
<!--                        <span class="media-annotation pull-right">22:48</span>-->
<!--                    </a>-->
<!---->
<!--                    <span class="text-muted">But that would be extremely strained and suspicious...</span>-->
<!--                </div>-->
<!--            </li>-->
<!---->
<!--            <li class="media">-->
<!--                <div class="media-left"><img src="../../../assets/images/placeholder.jpg"-->
<!--                                             class="img-circle img-sm" alt=""></div>-->
<!--                <div class="media-body">-->
<!--                    <a href="#" class="media-heading">-->
<!--                        <span class="text-semibold">Beatrix Diaz</span>-->
<!--                        <span class="media-annotation pull-right">Tue</span>-->
<!--                    </a>-->
<!---->
<!--                    <span class="text-muted">What a strenuous career it is that I've chosen...</span>-->
<!--                </div>-->
<!--            </li>-->
<!---->
<!--            <li class="media">-->
<!--                <div class="media-left"><img src="../../../assets/images/placeholder.jpg"-->
<!--                                             class="img-circle img-sm" alt=""></div>-->
<!--                <div class="media-body">-->
<!--                    <a href="#" class="media-heading">-->
<!--                        <span class="text-semibold">Richard Vango</span>-->
<!--                        <span class="media-annotation pull-right">Mon</span>-->
<!--                    </a>-->
<!---->
<!--                    <span class="text-muted">Other travelling salesmen live a life of luxury...</span>-->
<!--                </div>-->
<!--            </li>-->
        </ul>

        <div class="dropdown-content-footer">
            <a href="#" data-popup="tooltip" title=""><i
                        class="icon-menu display-block"></i></a>
        </div>
<!--        <div class="dropdown-content-footer">-->
<!--            <a href="../messages/" data-popup="tooltip" title="All messages"><i-->
<!--                        class="icon-menu display-block"></i></a>-->
<!--        </div>-->
    </div>
</li>