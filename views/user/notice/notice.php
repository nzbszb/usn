<?php
session_start();
if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile'])) {
    include("../../../src/User/DB/database.php");
    include("../../../src/User/Notice/Notice.php");
    $obj_ntc = new Notice($pdo);
//    echo json_encode($_POST);
//    die();

        if ($_POST['ntc_type'] === 'delete_ntc'){
//            echo json_encode($_POST);
//            die();
        $obj_ntc->deleteNotice($_POST);
    }else{
        header('location:../notice/');
    }

}else{
    header('location:../../../');
}