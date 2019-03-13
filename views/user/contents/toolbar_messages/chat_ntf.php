<?php
session_start();
if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile'])) {
    include("../../../../src/User/DB/database.php");
    include("../../../../src/User/Chat/Chat.php");
    $obj_chat = new Chat($pdo);

    if (!empty($_POST['chat_type'])) {
        if ($_POST['chat_type'] == 'chat_data') {
            $obj_chat->chatNotification();

        }
        if ($_POST['chat_type'] == 'chat_tlbr') {
//        echo json_encode($_POST['chat_type']);
//        die();
            $obj_chat->chatToolbar();
        }
    } else {
        header('location:../../home/');
    }
}else{
    header('location:../../../../');
}

