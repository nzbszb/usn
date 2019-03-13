<?php

/**
 * Created by PhpStorm.
 * User: HP
 * Date: 6/9/2018
 * Time: 12:30 AM
 */
class Chat
{
    public function __construct($pdo){
//        $this->pdo =new PDO('mysql:host=localhost;dbname=id1576551_usn','id1576551_root','nazib123');
//        $this->pdo = new PDO('mysql:host=localhost;dbname=usn','root','nazib123');
        $this->pdo = $pdo;

    }

    public function chatData(){

            $pdo = $this->pdo;
            if(!empty($_POST['send_username']) && !empty($_POST['reci_username'])) {
                $send_username = $_POST['send_username'];
                $reci_username = $_POST['reci_username'];
            }else{
                die();
            }
            $chat_id = $_POST['chat_id'];
        $date = gmdate('Y-m-d\TH:i:s\Z');
        $sql2 = "SELECT * FROM `usn_chat_status` WHERE `chat_from`='$reci_username' AND `chat_to`='$send_username'";
        $stmt = $pdo->prepare($sql2);
        $stmt->execute();
        $read_data = $stmt->fetchAll();
        $read_row = $stmt->rowCount();
        if(($read_row!=0)&&($read_data[0]['unread_count']!=0)){
            $sql2 = "UPDATE `usn_chat_status` SET `unread_count`=:unread_count, `chat_status_utc_time`=:utc_date WHERE chat_from='$reci_username' AND chat_to='$send_username'";
            $stmt = $pdo->prepare($sql2);
            $stmt->execute(
                array(
                    ':unread_count'=>0,
                    'utc_date'=>$date,

                )
            );

        }
            $sql = "SELECT chat_id,chat_to,chat_from,chat_data_type,chat_data_details,chat_utc_time FROM `usn_chat_details` WHERE (`chat_id`>'$chat_id') AND ((chat_from='$send_username' AND chat_to='$reci_username') OR (chat_to='$send_username' AND chat_from='$reci_username')) ORDER BY chat_utc_time ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        $chat_data = $stmt->fetchAll();
        $sqlfull = "SELECT first_name, last_name FROM `usn_users_reg` WHERE username='$reci_username'";
        $stmtfull = $pdo->prepare($sqlfull);
        $stmtfull->execute();
        $chat_fullname = $stmtfull->fetchAll();
        $read_data[0]['fullname'] = ucwords($chat_fullname[0]['first_name']).' '.ucwords($chat_fullname[0]['last_name']);

        foreach ($chat_data as $id => $d){
            if($d['chat_data_type']=='image') {
                $data_name = explode(":", $d['chat_data_details']);
                if (!empty($data_name[1])) {
                    if (file_exists("../../../../messages/image/" . $data_name[1]) != 1) {
                        $chat_data[$id]['chat_data_details'] = "broken_image_link.png";
                        $chat_data[$id][3] = "broken_image_link.png";
                    }
                }else {
                    if (file_exists("../../../../messages/image/" . $data_name[0]) != 1) {
                        $chat_data[$id]['chat_data_details'] = "broken_image_link.png";
                        $chat_data[$id][3] = "broken_image_link.png";
                    }
                }
            }
            elseif($d['chat_data_type']=='file'){
                $data_name = explode(":", $d['chat_data_details']);
                if (!empty($data_name[1])) {
                    if (file_exists("../../../../messages/file/" . $data_name[1]) != 1) {
                        $chat_data[$id]['chat_data_details'] = "broken_image_link.png";
                        $chat_data[$id][3] = "broken_image_link.png";
                    }
                }else{
                    if (file_exists("../../../../messages/file/" . $data_name[0]) != 1) {
                        $chat_data[$id]['chat_data_details'] = "broken_image_link.png";
                        $chat_data[$id][3] = "broken_image_link.png";
                    }
                }
            }
        }
        $data = [
            'read_data' => $read_data,
            'chat_data' => $chat_data,
        ];

            echo json_encode($data);

    }

    public function chatPostMessage(){
        $pdo = $this->pdo;
        $send_username = $_POST['chat_send_username'];
        $reci_username = $_POST['chat_reci_username'];
//        $date = $_POST['usn_chat_date'];
        $date = gmdate('Y-m-d\TH:i:s\Z');
        if (!empty($_POST['usn-chat-message'])) {
            $name = $_POST['usn-chat-message'];
            $sql = "INSERT INTO `usn_chat_details`(`chat_from`, `chat_to`, `chat_data_type`, `chat_data_details`, `chat_utc_time`) VALUES ('$send_username','$reci_username', 'text','$name', '$date')";
            $stmt = $pdo->prepare($sql);
            $exc = $stmt->execute();
            $sql2 = "SELECT `unread_count` FROM `usn_chat_status` WHERE `chat_from`='$send_username' AND `chat_to`='$reci_username'";
            $stmt = $pdo->prepare($sql2);
            $stmt->execute();
            $read_data = $stmt->fetchAll();
            $read_row = $stmt->rowCount();
            if($read_row==0){
                $sql2 = "INSERT INTO `usn_chat_status`(`chat_from`, `chat_to`, `unread_count`, `chat_status_utc_time`) VALUES ('$send_username','$reci_username', 1, '$date')";
                $stmt = $pdo->prepare($sql2);
                $stmt->execute();
            }else{
                $unread_count = $read_data[0]['unread_count'];
                $sql2 = "UPDATE `usn_chat_status` SET `unread_count`=:unread_count, `chat_status_utc_time`=:utc_date WHERE chat_from='$send_username' AND chat_to='$reci_username'";
                $stmt = $pdo->prepare($sql2);
                $stmt->execute(
                    array(
                        ':unread_count'=>$unread_count+1,
                        ':utc_date'=>$date,

                    )
                );

            }
        }
        if (!empty($_FILES['usn_chat_photo']['name'])) {
            $imgvalidextensions = array("jpeg", "jpg", "png", "gif");
            $imgname = time() . "_" . sha1($send_username);
            $imgext = explode('.', basename($_FILES['usn_chat_photo']['name']));
            $img_file_extension = end($imgext);
            $name = $_FILES['usn_chat_photo']['name'].":".$imgname . "." . $img_file_extension;
            $up_name = $imgname . "." . $img_file_extension;

            if (in_array($img_file_extension, $imgvalidextensions)) {

                if ($_FILES['usn_chat_photo']['size'] <= 5242880) {
                    move_uploaded_file($_FILES['usn_chat_photo']['tmp_name'], "../../../../messages/image/" . $up_name);

                    $sql = "INSERT INTO `usn_chat_details`(`chat_from`, `chat_to`, `chat_data_type`, `chat_data_details`, `chat_utc_time`) VALUES ('$send_username','$reci_username', 'image','$name', '$date')";
                    $stmt = $pdo->prepare($sql);
                    $exc = $stmt->execute();
                    $sql2 = "SELECT `unread_count` FROM `usn_chat_status` WHERE `chat_from`='$send_username' AND `chat_to`='$reci_username'";
                    $stmt = $pdo->prepare($sql2);
                    $stmt->execute();
                    $read_data = $stmt->fetchAll();
                    $read_row = $stmt->rowCount();
                    if($read_row==0){
                        $sql2 = "INSERT INTO `usn_chat_status`(`chat_from`, `chat_to`, `unread_count`, `chat_status_utc_time`) VALUES ('$send_username','$reci_username', 1, '$date')";
                        $stmt = $pdo->prepare($sql2);
                        $stmt->execute();
                    }else{
                        $unread_count = $read_data[0]['unread_count'];
                        $sql2 = "UPDATE `usn_chat_status` SET `unread_count`=:unread_count, `chat_status_utc_time`=:utc_date WHERE chat_from='$send_username' AND chat_to='$reci_username'";
                        $stmt = $pdo->prepare($sql2);
                        $stmt->execute(
                            array(
                                ':unread_count'=>$unread_count+1,
                                ':utc_date'=>$date,

                            )
                        );

                    }
                }
            }
        }
        if (!empty($_FILES['usn_chat_file']['name'])) {
            $filevalidextensions = array("doc", "docx", "pdf", "txt", "xls", "xlsx", "ppt", "pptx", "zip", "rar", "sql", "ini", "java", "c", "cpp", "m");
            $filename = time() . "_" . sha1($send_username);
            $fileext = explode('.', basename($_FILES['usn_chat_file']['name']));
            $file_extension = end($fileext);
            $name = $_FILES['usn_chat_file']['name'].":".$filename . "." . $file_extension;
            $up_name = $filename . "." . $file_extension;

            if (in_array($file_extension, $filevalidextensions)) {

                if ($_FILES['usn_chat_file']['size'] <= 5242880) {
                    move_uploaded_file($_FILES['usn_chat_file']['tmp_name'], "../../../../messages/file/" . $up_name);

                    $sql = "INSERT INTO `usn_chat_details`(`chat_from`, `chat_to`, `chat_data_type`, `chat_data_details`, `chat_utc_time`) VALUES ('$send_username','$reci_username', 'file','$name', '$date')";
                    $stmt = $pdo->prepare($sql);
                    $exc = $stmt->execute();
                    $sql2 = "SELECT `unread_count` FROM `usn_chat_status` WHERE `chat_from`='$send_username' AND `chat_to`='$reci_username'";
                    $stmt = $pdo->prepare($sql2);
                    $stmt->execute();
                    $read_data = $stmt->fetchAll();
                    $read_row = $stmt->rowCount();
                    if($read_row==0){
                        $sql2 = "INSERT INTO `usn_chat_status`(`chat_from`, `chat_to`, `unread_count`, `chat_status_utc_time`) VALUES ('$send_username','$reci_username', 1, '$date')";
                        $stmt = $pdo->prepare($sql2);
                        $stmt->execute();
                    }else{
                        $unread_count = $read_data[0]['unread_count'];
                        $sql2 = "UPDATE `usn_chat_status` SET `unread_count`=:unread_count, `chat_status_utc_time`=:utc_date WHERE chat_from='$send_username' AND chat_to='$reci_username'";
                        $stmt = $pdo->prepare($sql2);
                        $stmt->execute(
                            array(
                                ':unread_count'=>$unread_count+1,
                                ':utc_date'=>$date,

                            )
                        );

                    }
                }
            }
        }
        if ($exc) {
            $sql2 = "SELECT * FROM `usn_chat_status` WHERE `chat_from`='$reci_username' AND `chat_to`='$send_username'";
            $stmt = $pdo->prepare($sql2);
            $stmt->execute();
            $read_data = $stmt->fetchAll();
            $read_row = $stmt->rowCount();
            if(($read_row!=0)&&($read_data[0]['unread_count']!=0)){
                $sql2 = "UPDATE `usn_chat_status` SET `unread_count`=:unread_count, `chat_status_utc_time`=:utc_date WHERE chat_from='$reci_username' AND chat_to='$send_username'";
                $stmt = $pdo->prepare($sql2);
                $stmt->execute(
                    array(
                        ':unread_count'=>0,
                        ':utc_date'=>$date,

                    )
                );

            }
            $sql = "SELECT chat_to,chat_from,chat_data_type,chat_data_details,chat_utc_time FROM `usn_chat_details` WHERE (chat_from='$send_username' AND chat_to='$reci_username') OR (chat_to='$send_username' AND chat_from='$reci_username') ORDER BY chat_utc_time ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $chat_data = $stmt->fetchAll();
            $sqlfull = "SELECT first_name, last_name FROM `usn_users_reg` WHERE username='$reci_username'";
            $stmtfull = $pdo->prepare($sqlfull);
            $stmtfull->execute();
            $chat_fullname = $stmtfull->fetchAll();
            $read_data[0]['fullname'] = ucwords($chat_fullname[0]['first_name']).' '.ucwords($chat_fullname[0]['last_name']);

            foreach ($chat_data as $id => $d){
                if($d['chat_data_type']=='image') {
                    $data_name = explode(":", $d['chat_data_details']);
                    if (!empty($data_name[1])) {
                        if (file_exists("../../../../messages/image/" . $data_name[1]) != 1) {
                            $chat_data[$id]['chat_data_details'] = "broken_image_link.png";
                        }
                    }else {
                        if (file_exists("../../../../messages/image/" . $data_name[0]) != 1) {
                            $chat_data[$id]['chat_data_details'] = "broken_image_link.png";
                        }
                    }
                }
                elseif($d['chat_data_type']=='file'){
                    $data_name = explode(":", $d['chat_data_details']);
                    if (!empty($data_name[1])) {
                        if (file_exists("../../../../messages/file/" . $data_name[1]) != 1) {
                            $chat_data[$id]['chat_data_details'] = "broken_image_link.png";
                        }
                    }else{
                        if (file_exists("../../../../messages/file/" . $data_name[0]) != 1) {
                            $chat_data[$id]['chat_data_details'] = "broken_image_link.png";
                        }
                    }
                }
            }
            $data = [
                'read_data' => $read_data,
                'chat_data' => $chat_data,
            ];

            echo json_encode($data);
        }
    }

    public function chatNotification(){

        $pdo = $this->pdo;
        $send_username = $_POST['send_username'];
        $reci_username = $_POST['reci_username'];
        $sql1 = "SELECT * FROM `usn_chat_status` WHERE `chat_from`='$reci_username' AND `chat_to`='$send_username'";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute();
        $read_data = $stmt1->fetchAll();
        $sql2 = "SELECT * FROM `usn_chat_status` WHERE `chat_to`='$send_username' AND `unread_count`!=0";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();
        $read_row = $stmt2->rowCount();
        $read_data[0]['rows']= $read_row;

            echo json_encode($read_data);



    }

    public function chatToolbar(){
        $pdo = $this->pdo;
        $send_username = $_POST['send_username'];
//        echo json_encode($send_username);
//        die();
        $sql1 = "SELECT username FROM `usn_users_reg` WHERE `username` IN (SELECT r.username FROM `usn_users_reg` AS r, `usn_chat_status` AS s WHERE ((s.chat_from = '$send_username' AND s.chat_to=r.username) OR (s.chat_from = r.username AND s.chat_to= '$send_username')) AND r.username != '$send_username')";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute();
        $L1_data = $stmt1->fetchAll();
        $L1_row = $stmt1->rowCount();
//        echo json_encode($L1_data);
//        die();

        $L2_total_data = array();
        if($L1_row!=0){


            for($i=0;$i<$L1_row;$i++){

                $msg_sender = $L1_data[$i]['username'];
                $sql = "SELECT unread_count FROM `usn_chat_status` WHERE `chat_from`='$msg_sender' AND `chat_to`='$send_username'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $read_unread = $stmt->fetchAll();
                $sql2 = "SELECT r.username, r.`user_pic`, r.`first_name`, r.`last_name`, r.`is_active`, d.`chat_from`, d.`chat_to`, d.`chat_data_type`, d.`chat_data_details`, d.`chat_utc_time` FROM `usn_users_reg` AS r,`usn_chat_details` AS d WHERE (((d.`chat_from`='$msg_sender' AND d.`chat_to`='$send_username') OR (d.`chat_from`='$send_username' AND d.`chat_to`='$msg_sender')) AND r.`username`='$msg_sender') ORDER BY d.`chat_utc_time` DESC LIMIT 1";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute();
                $L2_data = $stmt2->fetchAll();
                $L2_data[0]['fullname'] = ucwords($L2_data[0]['first_name']).' '.ucwords($L2_data[0]['last_name']);
//                echo json_encode($L2_data);
//                die();
                if(isset($read_unread[0]['unread_count'])) {
//                    echo json_encode($read_unread[0]['unread_count']);
//                    die();
                    if ($read_unread[0]['unread_count'] != 0) {
                        $L2_data[0]['unread_count'] = $read_unread[0]['unread_count'];
//                        echo json_encode($L2_data[0]['unread_count']);
//                        die();
                    } else {
                        $L2_data[0]['unread_count'] = null;
//                        echo json_encode($L2_data[0]['unread_count']);
//                        die();

                    }
                }else{
                    $L2_data[0]['unread_count'] = null;
//                    echo json_encode($L2_data);
//                    die();
                }
                $L2_total_data = array_merge($L2_total_data, $L2_data);
            }
            array_multisort(array_map(function($element) {
                return $element['chat_utc_time'];
            }, $L2_total_data), SORT_DESC, $L2_total_data);

            $sql3 = "SELECT * FROM `usn_chat_status` WHERE `chat_to`='$send_username' AND `unread_count`!=0";
            $stmt3 = $pdo->prepare($sql3);
            $stmt3->execute();
            $read_row = $stmt3->rowCount();
            $L2_total_data[0]['unread_rows']= $read_row;
        }
        echo json_encode($L2_total_data);
    }


}