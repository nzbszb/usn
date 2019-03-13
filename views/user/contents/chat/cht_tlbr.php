<?php
session_start();
include("../../../../src/User/DB/database.php");
include("../../../../src/User/Chat/Chat.php");
$obj_chat = new Chat($pdo);

if(!empty($_POST['chat_type'])) {

    if($_POST['chat_type']== 'chat_tlbr'){

        $obj_chat->chatToolbar();
    }
}
else{
    header('location:../../../../');
}

