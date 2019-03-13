<?php
session_start();
include ("../../../src/User/DB/database.php");
include ("../../../src/User/Post/Post.php");
$obj = new Post($pdo);
$_POST['usn_post_id'] = time() . "_" . sha1($_POST['usn_username']);
//print_r($_POST);
//die();
if((!empty($_POST['usn_post']) || !empty($_FILES['usn_post_photo']['name']) || !empty($_FILES['usn_post_file']['name'])) && !empty($_POST['usn_username']) && !empty($_POST['usn_date'])) {
//    print_r($_FILES);
//    print_r($_POST);
//    die();
    if (!empty($_FILES['usn_post_photo']['name'])) {
        $imgvalidextensions = array("jpeg", "jpg", "png", "gif");
        $imgname = time() . "_" . sha1($_POST['usn_username']);
        $imgext = explode('.', basename($_FILES['usn_post_photo']['name']));
        $img_file_extension = end($imgext);
        $img_name = $_FILES['usn_post_photo']['name'].":".$imgname . "." . $img_file_extension;
        $up_img_name = $imgname . "." . $img_file_extension;

        if (in_array($img_file_extension, $imgvalidextensions)) {

            if ($_FILES['usn_post_photo']['size'] <= 2097152) {
                move_uploaded_file($_FILES['usn_post_photo']['tmp_name'], "../../../img/" . $up_img_name);
                $_POST['usn_post_photo'] = $img_name;

                $obj->postSetData($_POST);
                $obj->postInfoStore();
            } else {
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = '<h4>Image size is more than 2MB!</h4>';
                    header('location:../../../');
                } else {

                    $_SESSION['message'] = '<h4>Image size is more than 2MB!</h4>';
                    header('location:../../../');
                }
            }
        } else {
            if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
                $_SESSION['message'] = '<h4>It is not a image file!</h4>';
                header('location:../../../');
            } else {
                $_SESSION['message'] = '<h4>It is not a image file!</h4>';
                header('location:../../../');

            }
        }
    } elseif (!empty($_FILES['usn_post_file']['name'])) {
        $filevalidextensions = array("doc", "docx", "pdf", "txt", "xls", "xlsx", "ppt", "pptx", "zip", "rar", "sql", "ini", "java", "c", "cpp", "m");
        $filename = time() . "_" . sha1($_POST['usn_username']);
        $fileext = explode('.', basename($_FILES['usn_post_file']['name']));
        $file_extension = end($fileext);
        $file_name = $_FILES['usn_post_file']['name'].":".$filename . "." . $file_extension;
        $up_file_name = $filename . "." . $file_extension;

        if (in_array($file_extension, $filevalidextensions)) {

            if ($_FILES['usn_post_file']['size'] <= 5242880) {
                move_uploaded_file($_FILES['usn_post_file']['tmp_name'], "../../../files/" . $up_file_name);
                $_POST['usn_post_file'] = $file_name;

                $obj->postSetData($_POST);
                $obj->postInfoStore();
            } else {
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = '<h4>File size is more than 5MB!</h4>';
                    header('location:../../../');
                } else {

                    $_SESSION['message'] = '<h4>File size is more than 5MB!</h4>';
                    header('location:../../../');
                }
            }
        } else {
            if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
                $_SESSION['message'] = '<h4>It is not a valid file!</h4>';
                header('location:../../../');
            } else {
                $_SESSION['message'] = '<h4>It is not a valid file!</h4>';
                header('location:../../../');

            }
        }
    }
    elseif (!empty($_POST['usn_post']) && empty($_FILES['usn_post_photo']['name']) && empty($_FILES['usn_post_file']['name'])){

        $obj->postSetData($_POST);
        $obj->postInfoStore();
    }
    else{
        header('location:../../../');
    }
}
else{
    header('location:../../../');
}
