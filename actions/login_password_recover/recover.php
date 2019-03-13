<?php
include_once ("../../src/User/DB/database.php");
include_once ("../../src/User/Registration/Registration.php");
session_start();
$obj=new Registration($pdo);

if(!empty($_POST['usn_var_id']) && !empty($_POST['usn_email']))
{
    $_POST['usn_var_id']=filter_var($_POST['usn_var_id'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
    $_POST['usn_email']=filter_var($_POST['usn_email'],FILTER_VALIDATE_EMAIL);
    $obj->setData($_POST);
//    print_r($obj);
//    die();
    $obj->recoveryRegCheck();

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