<div class="panel panel-flat">
    <div class="panel-heading">
        <h6 class="panel-title">New Users</h6>
        <div class="heading-elements">
            <span class="badge badge-success heading-text"><?php echo sizeof($user) ?></span>
        </div>
    </div>

    <ul class="media-list media-list-linked pb-5">


        <?php
        if(sizeof($user)!=0) {
            $condition = 0;
            foreach ($user as $key4 => $info) {
                if ($info['user_status'] == 'Student') {
                    $condition = 1;
                }
            }
            if ($condition == 1) {
                ?>
                <li class="media-header">Students</li>
                <?php
            }
            foreach ($user as $key4 => $info) {
                if ($info['user_status'] == 'Student') {
                    ?>
                    <li class="media">
                        <a href="../account/?user=<?php echo $info['username'] ?>" class="media-link">
                            <div class="media-left">
                                <?php
                                if (!empty($info['user_pic'])) {
                                    ?>
                                    <img src="../../../img/<?php echo $info['user_pic'] ?>"
                                         class="img-circle" alt="" style="object-fit: cover;">
                                    <?php
                                } else {
                                    ?>
                                    <img src="../../../assets/images/placeholder.jpg"
                                         class="img-circle" alt="">
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="media-body">
                                                            <span
                                                                    class="media-heading text-semibold text-capitalize"><?php echo $info['first_name'] . ' ' . $info['last_name'] ?></span>
                                <span
                                        class="media-annotation"><?php echo $info['skills'] ?></span>
                            </div>
                            <div class="media-right media-middle">
                                <?php
                                if ($info['is_active'] == 1) {
                                    ?>
                                    <span class="status-mark bg-success"></span>
                                    <?php
                                } else {
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

            <?php
            $condition = 0;
            foreach ($user as $key4 => $info) {
                if ($info['user_status'] == 'Teacher') {
                    $condition = 1;
                }
            }
            if ($condition == 1) {
                ?>
                <li class="media-header">Teachers</li>
                <?php
            }
            foreach ($user as $key4 => $info) {
                if ($info['user_status'] == 'Teacher') {
                    ?>
                    <li class="media">
                        <a href="../account/?user=<?php echo $info['username'] ?>" class="media-link">
                            <div class="media-left">
                                <?php
                                if (!empty($info['user_pic'])) {
                                    ?>
                                    <img src="../../../img/<?php echo $info['user_pic'] ?>"
                                         class="img-circle" alt="" style="object-fit: cover;">
                                    <?php
                                } else {
                                    ?>
                                    <img src="../../../assets/images/placeholder.jpg"
                                         class="img-circle" alt="">
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="media-body">
                                                            <span
                                                                    class="media-heading text-semibold text-capitalize"><?php echo $info['first_name'] . ' ' . $info['last_name'] ?></span>
                                <span
                                        class="media-annotation"><?php echo $info['skills'] ?></span>
                            </div>
                            <div class="media-right media-middle">
                                <?php
                                if ($info['is_active'] == 1) {
                                    ?>
                                    <span class="status-mark bg-success"></span>
                                    <?php
                                } else {
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


            <?php
            $condition = 0;
            foreach ($user as $key4 => $info) {
                if ($info['user_status'] == 'Administration') {
                    $condition = 1;
                }
            }
            if ($condition == 1) {
                ?>
                <li class="media-header">Administration</li>
                <?php
            }
            foreach ($user as $key4 => $info) {
                if ($info['user_status'] == 'Administration') {
                    ?>
                    <li class="media">
                        <a href="../account/?user=<?php echo $info['username'] ?>" class="media-link">
                            <div class="media-left">
                                <?php
                                if (!empty($info['user_pic'])) {
                                    ?>
                                    <img src="../../../img/<?php echo $info['user_pic'] ?>"
                                         class="img-circle" alt="" style="object-fit: cover;">
                                    <?php
                                } else {
                                    ?>
                                    <img src="../../../assets/images/placeholder.jpg"
                                         class="img-circle" alt="">
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="media-body">
                                                            <span
                                                                    class="media-heading text-semibold text-capitalize"><?php echo $info['first_name'] . ' ' . $info['last_name'] ?></span>
                                <span
                                        class="media-annotation"><?php echo $info['skills'] ?></span>
                            </div>
                            <div class="media-right media-middle">
                                <?php
                                if ($info['is_active'] == 1) {
                                    ?>
                                    <span class="status-mark bg-success"></span>
                                    <?php
                                } else {
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
        }else {
            ?>
            <center><h5 style="color: royalblue">You are Connected to everyone!</h5></center>
            <?php
        }
        ?>
    </ul>

</div>