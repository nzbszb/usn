<div class="thumbnail">

    <div class="thumb thumb-rounded" style="height: 140px; width: 140px; object-fit: cover;">
        <?php
        if (!empty($value_user['user_pic'])) {
            ?>
            <img src="../../../img/<?php echo $value_user['user_pic']; ?>"
                 alt="<?php echo $value_user['username']; ?>" style="height: 140px; width: 140px; object-fit: cover;">
            <?php
        }else {
            ?>
            <img src="../../../assets/images/placeholder.jpg"
                 alt="<?php echo $value_user['username']; ?>" width="140" height="140">
            <?php
        }
        ?>
        <div class="caption-overflow">
										<span>
                                            <?php
                                            if (!empty($value_user['user_pic'])) {
                                                ?>
                                                <a href="../../../img/<?php echo $value_user['user_pic']; ?>"
                                                   class="btn bg-teal-300 btn-rounded btn-icon" data-popup="lightbox"><i
                                                        class="icon-zoomin3"></i></a>
                                                <?php
                                            }else {
                                                ?>
                                                <a href="../../../assets/images/placeholder.jpg"
                                                   class="btn bg-teal-300 btn-rounded btn-icon" data-popup="lightbox"><i
                                                        class="icon-zoomin3"></i></a>
                                                <?php
                                            }if($value_user['username']==$_SESSION['usn_username']) {
                                                ?><a href="../account" class="btn bg-teal-300 btn-rounded btn-icon"><i
                                                        class="icon-link"></i></a>
                                                <?php
                                            }else {

                                                ?>

                                                <a href="../account/?user=<?php echo $value_user['username'] ?>"
                                                   class="btn bg-teal-300 btn-rounded btn-icon"><i
                                                        class="icon-link"></i></a>
                                                <?php
                                            }
                                            ?>
										</span>
        </div>
    </div>

    <div class="caption text-center">
        <h6 class="text-semibold no-margin"><?php echo $value_user['first_name'] . ' ' . $value_user['last_name']; ?>
            <small class="display-block"><?php echo $value_user['skills']; ?></small>
        </h6>
        <ul class="icons-list mt-15">
            <li><a href="#" data-popup="tooltip" title="Facebook"><i
                            class="icon-facebook2"></i></a></li>
            <li><a href="#" data-popup="tooltip" title="Linkedin"><i
                            class="icon-linkedin"></i></a></li>
            <li><a href="#" data-popup="tooltip" title="Github"><i
                            class="icon-github"></i></a>
            </li>
            <?php
            if($_SESSION['usn_username']!=$_GET['user']) {
                ?>
                <li><a href="#chat" data-popup="tooltip" title="Chat" data-toggle="modal"
                       class="mychat" data-ref="clearInterval(ajaxFn)" data-status="<?php echo $value_user['is_active'] ?>"
                       data-fullname="<?php echo ucwords($value_user['first_name']) . ' ' . ucwords($value_user['last_name']) ?>"
                       data-send_username="<?php echo $_SESSION['usn_username'] ?>"
                       data-reci_username="<?php echo $_GET['user'] ?>" data-reci_user_pic="<?php echo $value_user['user_pic'] ?>" data-send_user_pic="<?php echo $value['user_pic'] ?>"><i
                            class="icon-comment"></i></a></li>
                <?php
            }
            ?>
        </ul>
    </div>

</div>