<?php
session_start();
if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile'])) {
    include("../../../../src/User/DB/database.php");
    include("../../../../src/User/Post/Post.php");
    $obj_comment = new Post($pdo);
//    echo json_encode($_POST);
//    die();

        if ($_POST['comment_type'] === 'comment_post') {
//        echo json_encode($_POST);
//        die();
            if(!empty($_POST['usn_comment_message'])) {
//                echo json_encode($_POST);
//                die();
                $obj_comment->postSetData($_POST);
                $obj_comment->commentInfoStore();
            }
        }
        elseif ($_POST['comment_type'] === 'post_info') {
//        echo json_encode($_POST);
//        die();
            $obj_comment->jsPostDetails();
        }elseif ($_POST['comment_type'] === 'delete_comment'){
//            echo json_encode($_POST);
//            die();
            $obj_comment->deleteMyComment($_POST);
        }else{
            header('location:../../home/');
        }

}else{
    header('location:../../../../');
}