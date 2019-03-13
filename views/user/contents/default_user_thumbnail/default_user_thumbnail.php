<div class="thumbnail">

    <div class="thumb thumb-rounded" style="height: 140px; width: 140px; object-fit: cover;">
        <?php
        if($value['user_pic']) {
            ?>
            <img src="../../../img/<?php echo $value['user_pic']; ?>"
                 alt="<?php echo $value['username']; ?>" style="height: 140px; width: 140px; object-fit: cover;">
            <?php
        }else {
            ?>
            <img src="../../../assets/images/placeholder.jpg"
                 alt="<?php echo $value['username']; ?>" width="550" height="550">
            <?php
        }
        ?>
        <div class="caption-overflow">
										<span>
                                            <?php
                                            if (!empty($value['user_pic'])) {
                                                ?>
                                                <a href="../../../img/<?php echo $value['user_pic']; ?>"
                                                   class="btn bg-teal-300 btn-rounded btn-icon" data-popup="lightbox"><i
                                                        class="icon-zoomin3"></i></a>
                                                <?php
                                            }else {
                                                ?>
                                                <a href="../../../assets/images/placeholder.jpg"
                                                   class="btn bg-teal-300 btn-rounded btn-icon" data-popup="lightbox"><i
                                                        class="icon-zoomin3"></i></a>
                                                <?php
                                            }
                                            ?>
                                            <a href="../account/" class="btn bg-teal-300 btn-rounded btn-icon"><i class="icon-link"></i></a>
										</span>
        </div>
    </div>

    <div class="caption text-center">
        <h6 class="text-semibold no-margin text-capitalize"><?php echo $value['first_name'].' '.$value['last_name'];?>
            <small class="display-block"><?php echo $value['skills'];?></small>
        </h6>
        <ul class="icons-list mt-15">
            <li><a href="#" data-popup="tooltip" title="Facebook"><i
                        class="icon-facebook2"></i></a></li>
            <li><a href="#" data-popup="tooltip" title="Linkedin"><i
                        class="icon-linkedin"></i></a></li>
            <li><a href="#" data-popup="tooltip" title="Github"><i
                        class="icon-github"></i></a>
            </li>
        </ul>
    </div>
</div>