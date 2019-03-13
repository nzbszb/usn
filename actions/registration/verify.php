<?php
include_once ("../../src/User/DB/database.php");
include_once ("../../src/User/Registration/Registration.php");
session_start();
$obj=new Registration($pdo);
if(!empty($_POST['usn_var_id']) && !empty($_POST['usn_username']) && !empty( $_POST['usn_password']) && !empty($_POST['usn_email']) && !empty($_POST['usn_mobile']) && !empty($_POST['usn_user_status']))
{
    $_POST['usn_var_id']=filter_var($_POST['usn_var_id'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
    $_POST['usn_username']=filter_var($_POST['usn_username'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
    //$_POST['usn_password']=filter_var($_POST['usn_password'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
    $_POST['usn_email']=filter_var($_POST['usn_email'],FILTER_VALIDATE_EMAIL);
    $_POST['usn_mobile']=filter_var($_POST['usn_mobile'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
    $obj->setData($_POST);
    $obj->demoRegCheck();
//    $obj->regStore();

}else {
    if (isset($_SESSION['message'])) {
        unset($_SESSION['message']);
        $_SESSION['message'] = "Input can not be empty!";
        header('location:../registration');
    } else {
        $_SESSION['message'] = "Input can not be empty!";
        header('location:../registration');
    }
}