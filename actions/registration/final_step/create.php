<?php
session_start();
include ("../../../src/User/DB/database.php");
include ("../../../src/User/Registration/Registration.php");
$obj = new Registration($pdo);
//print_r($_POST);
//die();
if (!empty($_FILES['usn_user_pic']['name'])) {
    $imgvalidextensions = array("jpeg", "jpg", "png", "gif");
    $imgname = time() . "_" . sha1($_POST['usn_username']);
    $imgext = explode('.', basename($_FILES['usn_user_pic']['name']));
    $img_file_extension = end($imgext);
    $img_name = $imgname . "." . $img_file_extension;

    if (in_array($img_file_extension, $imgvalidextensions)) {
        move_uploaded_file($_FILES['usn_user_pic']['tmp_name'], "../../../img/" . $img_name);
        $_POST['usn_user_pic'] = $img_name;

        if ($_FILES['usn_user_pic']['size'] <= 2097152) {

            $obj->setData($_POST);
            $obj->infoStore();
        } else {
            if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
                $_SESSION['message'] = '<h4>Image size is more than 2MB!</h4>';
                header('location:../final_step');
            } else {

                $_SESSION['message'] = '<h4>Image size is more than 2MB!</h4>';
                header('location:../final_step');
            }
        }
    } else {
        if (isset($_SESSION['message'])) {
            unset($_SESSION['message']);
            $_SESSION['message'] = '<h4>It is not a image file!</h4>';
            header('location:../final_step');
        } else {
            $_SESSION['message'] = '<h4>It is not a image file!</h4>';
            header('location:../final_step');

        }
    }
}else {
    $_POST['usn_user_pic'] = 'placeholder.jpg';
    $obj->setData($_POST);
    $obj->infoStore();
}




//print_r($_POST);
//print_r($_FILES);
//die();

//$imgname = mktime(0, 0, 0, date("m")  , date("d"), date("Y"))."_".sha1($_POST['usn_fname'].$_POST['usn_lname']);
//if(isset($_POST['image-url'])){
//    $imgext = explode('.', basename($_POST['image-url']));
//
//   // file_put_contents('../../../img/'.$img_name, file_get_contents($_POST['image-url']));
//}
//else{
//    $imgext = explode('.', basename($_FILES['usn_image_name']['name']));
//}
//$img_file_extension = end($imgext);
//$img_name = $imgname.".".$img_file_extension;
//echo $img_name."<br>";
// if(isset($ab)){
//     echo date("F_j_Y_g_i_a")."<br>";
//     echo date("d/m/Y H:i:s")."<br>";
//     echo date("F j, Y, g:i a")."<br>";
//     echo date('\i\t \i\s \t\h\e jS \d\a\y.')."<br>";
//
// }
