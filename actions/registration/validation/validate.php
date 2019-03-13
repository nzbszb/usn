<?php
include_once ("../../../src/User/DB/database.php");
include_once ("../../../src/User/Registration/Registration.php");
session_start();
$obj=new Registration($pdo);

if(!empty($_POST['usn_code']))
{
    $_POST['usn_code']=filter_var($_POST['usn_code'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
    $obj->setData($_POST);
    $obj->validate();

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