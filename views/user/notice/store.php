<?php
session_start();
include ("../../../src/User/DB/database.php");
include ("../../../src/User/Notice/Notice.php");
$obj_ntc = new Notice($pdo);
$_POST['usn_notice_id'] = time() . "_" . sha1($_POST['usn_notice_username']);
//print_r($_POST);
//print_r($_FILES);
//die();

if((!empty($_POST['usn_notice_title']) || !empty($_POST['usn_notice_details']) || !empty($_FILES['usn_notice_photo']['name']) || !empty($_FILES['usn_notice_file']['name'])) && !empty($_POST['usn_notice_username'])) {
//    print_r($_FILES);
//    print_r($_POST);
//    die();
    if (!empty($_FILES['usn_notice_photo']['name'])) {
        $imgvalidextensions = array("jpeg", "jpg", "png", "gif");
        $imgname = time() . "_" . sha1($_POST['usn_notice_username']);
        $imgext = explode('.', basename($_FILES['usn_notice_photo']['name']));
        $img_file_extension = end($imgext);
        $img_name = $_FILES['usn_notice_photo']['name'].":".$imgname . "." . $img_file_extension;
        $up_img_name = $imgname . "." . $img_file_extension;

        if (in_array($img_file_extension, $imgvalidextensions)) {

            if ($_FILES['usn_notice_photo']['error'] == 0) {
                move_uploaded_file($_FILES['usn_notice_photo']['tmp_name'], "../../../notice/image/" . $up_img_name);
                $_POST['usn_notice_photo'] = $img_name;

                $obj_ntc->noticeSetData($_POST);
                $obj_ntc->noticeInfoStore();
            } else {
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = '<h4>Image size is more than 2MB!</h4>';
                    header('location:../notice/');
                } else {

                    $_SESSION['message'] = '<h4>Image size is more than 2MB!</h4>';
                    header('location:../notice/');
                }
            }
        } else {
            if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
                $_SESSION['message'] = '<h4>It is not a image file!</h4>';
                header('location:../notice/');
            } else {
                $_SESSION['message'] = '<h4>It is not a image file!</h4>';
                header('location:../notice/');

            }
        }
    } elseif (!empty($_FILES['usn_notice_file']['name'])) {
        $filevalidextensions = array("doc", "docx", "pdf", "txt", "xls", "xlsx", "ppt", "pptx", "zip", "rar", "sql", "ini", "java", "c", "cpp", "m");
        $filename = time() . "_" . sha1($_POST['usn_notice_username']);
        $fileext = explode('.', basename($_FILES['usn_notice_file']['name']));
        $file_extension = end($fileext);
        $file_name = $_FILES['usn_notice_file']['name'].":".$filename . "." . $file_extension;
        $up_file_name = $filename . "." . $file_extension;

        if (in_array($file_extension, $filevalidextensions)) {

            if ($_FILES['usn_notice_file']['error'] == 0) {
                move_uploaded_file($_FILES['usn_notice_file']['tmp_name'], "../../../notice/file/" . $up_file_name);
                $_POST['usn_notice_file'] = $file_name;

                $obj_ntc->noticeSetData($_POST);
                $obj_ntc->noticeInfoStore();
            } else {
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = '<h4>File size is more than 5MB!</h4>';
                    header('location:../notice/');
                } else {

                    $_SESSION['message'] = '<h4>File size is more than 5MB!</h4>';
                    header('location:../notice/');
                }
            }
        } else {
            if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
                $_SESSION['message'] = '<h4>It is not a valid file!</h4>';
                header('location:../notice/');
            } else {
                $_SESSION['message'] = '<h4>It is not a valid file!</h4>';
                header('location:../notice/');

            }
        }
    }
    elseif (!empty($_POST['usn_notice_details']) && empty($_FILES['usn_notice_photo']['name']) && empty($_FILES['usn_notice_file']['name'])){

        $obj_ntc->noticeSetData($_POST);
        $obj_ntc->noticeInfoStore();
    }
    else{
        header('location:../notice/');
    }
}
else{
    header('location:../notice/');
}
