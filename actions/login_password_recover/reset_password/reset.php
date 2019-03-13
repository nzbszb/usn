<?php
include_once ("../../../src/User/DB/database.php");
include_once ("../../../src/User/Registration/Registration.php");
session_start();
$obj=new Registration($pdo);

if(!empty($_POST['usn_recovery_code']) && !empty($_POST['usn_password']) && !empty($_POST['usn_reppassword']) && ($_POST['usn_password']==$_POST['usn_reppassword']))
{
//    print_r($_POST);
//die();
    $_POST['usn_recovery_code']=filter_var($_POST['usn_recovery_code'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
    $obj->setData($_POST);
    $obj->resetPass();

}else{
    if (isset($_SESSION['message'])) {
        unset($_SESSION['message']);
        $_SESSION['message'] = "Input can not be empty!";
        header('location:../');
    } else {
        $_SESSION['message'] = "Input can not be empty!";
        header('location:../');

    }
}