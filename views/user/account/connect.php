<?php
session_start();
include("../../../src/User/DB/database.php");
include("../../../src/User/Registration/Registration.php");
include("../../../src/User/Connection/Connection.php");
$obj_reg = new Registration($pdo);
$obj_con = new Connection($pdo);

if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile']) && !empty($_GET['usn_reci_username']) && ($_SESSION['usn_username']!=$_GET['usn_reci_username'])){

    $data_reg = $obj_reg->setData($_SESSION);
    $data_con = $obj_con->connectionSetData($_GET)->connectionSetData($_SESSION)->checkConnection();
    if($data_con->status=='send_request'){
        $obj_con->conStore();
    }

}elseif (!empty($_GET['usn_accept_username'])){
//    print_r($_GET);
//    die();
    $data_con = $obj_con->connectionSetData($_GET)->connectionSetData($_SESSION)->acceptRequest();
}elseif (!empty($_GET['usn_reject_username'])){

    $data_con = $obj_con->connectionSetData($_GET)->connectionSetData($_SESSION)->rejectRequest();
}