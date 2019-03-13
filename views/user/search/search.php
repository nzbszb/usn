<?php

include("../../../src/User/DB/database.php");
include("../../../src/User/Profile/Profile.php");
$obj_pro = new Profile($pdo);
$trimmed_name = ltrim($_GET['usn_find_user']);
if(!empty($trimmed_name[0])){
//    print_r($_GET['usn_find_user']);
    $query = explode(' ', basename($trimmed_name));
    $trimmed_name = $query;
    $data = $obj_pro->searchData($trimmed_name);
    if(!isset($data['failed'])) {
        session_start();
        $_SESSION['search_result']= $data;
        $_SESSION['original_query']= $_GET['usn_find_user'];
        header('location:../search/');
    }else{
        session_start();

        $_SESSION['search_result']= $data['failed'];
        $_SESSION['original_query']= $_GET['usn_find_user'];
        header('location:../search/');

    }


//    print_r($_GET['usn_find_user']);
//    print_r(count($_GET['usn_find_user']));

}else{
    header('location:../search/');
}