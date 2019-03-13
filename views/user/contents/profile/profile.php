<?php
//echo json_encode($_POST);
//die();
session_start();
if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile'])) {
    include("../../../../src/User/DB/database.php");
    include("../../../../src/User/Registration/Registration.php");
    $obj_update = new Registration($pdo);
//    echo json_encode($_FILES);
//    die();

    if ($_POST['update_type'] == 'usn_profile') {
//        echo json_encode($_POST);
//        die();
        if(!empty($_FILES['usn_user_pic']['name'])) {
            $_POST['usn_user_pic'] = $_FILES['usn_user_pic']['name'];
            $obj_update->setData($_POST);
            $obj_update->updateInfoStore();
        }else{
            $obj_update->setData($_POST);
            $obj_update->updateInfoStore();
        }
    }
    elseif ($_POST['update_type'] == 'usn_account') {
        if(!empty($_POST['usn_visibility'])) {
            $obj_update->setData($_POST);
            $obj_update->updatePassStore();
        }else{
            $message['failure'] = 'Update failed due to code issues, contact help!';
            echo json_encode($message);
            die();
        }
        }

}else{
    header('location:../../../../');
}