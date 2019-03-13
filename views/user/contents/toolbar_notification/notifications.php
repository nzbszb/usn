<?php
session_start();
if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile'])) {
    include("../../../../src/User/DB/database.php");
    include("../../../../src/User/Notification/Notification.php");
    $obj_ntf = new Notification($pdo);

    if (!empty($_POST['ntf_type'])) {
        if ($_POST['ntf_type'] == 'ntf_seek_all') {

            $obj_ntf->jsAllNotification();

        }elseif ($_POST['ntf_type'] == 'ntf_seek') {

            $obj_ntf->jsAllUnreadNotification();

        }elseif ($_POST['ntf_type'] == 'ntf_status'){
            $obj_ntf->jsReadNotificationstatus();
        }elseif ($_POST['ntf_type'] == 'ntf_read'){
//            echo json_encode($_POST);
//            die();
            $obj_ntf->jsReadNotification();
        }
        else {
            header('location:../../home/');
        }
    } else {
        header('location:../../home/');
    }
}else{
    header('location:../../../../');
}

