<?php
include_once ("../../src/User/DB/database.php");
include_once ("../../src/User/Registration/Registration.php");
session_start();
$obj=new Registration($pdo);
if(!empty($_POST['usn_title']) && !empty( $_POST['usn_log_password']))
{
    $_POST['usn_title']=filter_var($_POST['usn_title'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);

    $obj->setData($_POST);
    $obj->login();
    // print_r($obj);
    // die();
    //$obj->demoRegCheck();
//    $obj->regStore();

}else{
    if(isset($_SESSION['message'])){
        unset($_SESSION['message']);
        $_SESSION['message']="Input can not be empty!";
        header('location:../../');
    }else {
        $_SESSION['message'] = "Input can not be empty!";
        header('location:../../');
    }
}
