<?php
session_start();
if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile'])) {
    include("../../../src/User/DB/database.php");
    include("../../../src/User/Post/Post.php");
    $obj_post = new Post($pdo);
//    echo json_encode($_POST);
//    die();

    if($_POST['post_type'] === 'delete_post') {
//        echo json_encode($_POST);
//        die();
        $obj_post->deleteMyPost($_POST);
    }else {
        header('location:../home/');
    }

}else{
    header('location:../../../');
}