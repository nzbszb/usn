<li class="dropdown">
    <a href="#" id="ntf_stat" class="dropdown-toggle" data-toggle="dropdown" data-username="<?php echo $_SESSION['usn_username'] ?>">
        <i class="icon-git-compare"></i>
        <span class="visible-xs-inline-block position-right">Notifications</span>
        <span class="badge bg-warning-400 ntf_count">0</span>
    </a>

    <div class="dropdown-menu dropdown-content">
        <div class="dropdown-content-heading">
            Notifications
<!--            <ul class="icons-list">-->
<!--                <li><a href="" class="reload_ntf"><i class="icon-sync"></i></a></li>-->
<!--            </ul>-->
        </div>

        <ul class="media-list dropdown-content-body width-350 toolbar_ntf" data-username="<?php echo $_SESSION['usn_username'] ?>">
<!--                    <li class="media">-->
<!--                        <div class="media-left">-->
<!--                            <a href="#"-->
<!--                               class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i-->
<!--                                        class="icon-git-pull-request"></i></a>-->
<!--                        </div>-->
<!---->
<!--                        <div class="media-body">-->
<!--                            Drop the IE <a href="#">specific hacks</a> for temporal inputs-->
<!--                            <div class="media-annotation">4 minutes ago</div>-->
<!--                        </div>-->
<!--                    </li>-->

<!---->
<!--            <li class="media">-->
<!--                <div class="media-left">-->
<!--                    <a href="#"-->
<!--                       class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i-->
<!--                                class="icon-git-commit"></i></a>-->
<!--                </div>-->
<!---->
<!--                <div class="media-body">-->
<!--                    Add full font overrides for popovers and tooltips-->
<!--                    <div class="media-annotation">36 minutes ago</div>-->
<!--                </div>-->
<!--            </li>-->
<!---->
<!--            <li class="media">-->
<!--                <div class="media-left">-->
<!--                    <a href="#"-->
<!--                       class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i-->
<!--                                class="icon-git-branch"></i></a>-->
<!--                </div>-->
<!---->
<!--                <div class="media-body">-->
<!--                    <a href="#">Chris Arney</a> created a new <span-->
<!--                            class="text-semibold">Design</span>-->
<!--                    branch-->
<!--                    <div class="media-annotation">2 hours ago</div>-->
<!--                </div>-->
<!--            </li>-->
<!---->
<!--            <li class="media">-->
<!--                <div class="media-left">-->
<!--                    <a href="#"-->
<!--                       class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i-->
<!--                                class="icon-git-merge"></i></a>-->
<!--                </div>-->
<!---->
<!--                <div class="media-body">-->
<!--                    <a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span>-->
<!--                    and-->
<!--                    <span class="text-semibold">Dev</span> branches-->
<!--                    <div class="media-annotation">Dec 18, 18:36</div>-->
<!--                </div>-->
<!--            </li>-->
<!---->
<!--            <li class="media">-->
<!--                <div class="media-left">-->
<!--                    <a href="#"-->
<!--                       class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i-->
<!--                                class="icon-git-pull-request"></i></a>-->
<!--                </div>-->
<!---->
<!--                <div class="media-body">-->
<!--                    Have Carousel ignore keyboard events-->
<!--                    <div class="media-annotation">Dec 12, 05:46</div>-->
<!--                </div>-->
<!--            </li>-->
        </ul>

        <div class="dropdown-content-footer">
            <a href="../notifications/" data-popup="tooltip" title="All notifications"><i
                        class="icon-menu display-block"></i></a>
        </div>
    </div>
</li>