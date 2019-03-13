<?php
session_start();
if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile'])) {
    include("../../../src/User/DB/database.php");
    include("../../../src/User/PaperJournal/PaperJournal.php");
    $obj_pj = new PaperJournal($pdo);
//    echo json_encode($_POST);
//    die();

    if ($_POST['pj_type'] === 'delete_paper'){
//            echo json_encode($_POST);
//            die();
        $obj_pj->deletePaper($_POST);
    }elseif ($_POST['pj_type'] === 'delete_journal'){
//            echo json_encode($_POST);
//            die();
        $obj_pj->deleteJournal($_POST);
    }else{
        header('location:../paper&journal/');
    }

}else{
    header('location:../../../');
}