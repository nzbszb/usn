<?php
session_start();
if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile'])) {
    include("../../../../src/User/DB/database.php");
    include("../../../../src/User/Post/Post.php");
    $obj_comment = new Post($pdo);
//    echo json_encode($_POST);
//    die();

    if($_POST['seen_type'] === 'seen_list') {
//        echo json_encode($_POST);
//        die();
        $obj_comment->seenListInfo($_POST);
    }else {
        $message['failure'] = 'Some data missing!';
        echo json_encode($message);
        die();
    }

}else{
    header('location:../../../../');
}