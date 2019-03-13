<?php

$pdo = new PDO('mysql:host=localhost;dbname=usn', 'root', 'nazib123');

if($_POST['chat_type']=='chat_data') {
    if (isset($_POST['send_username']) && isset($_POST['reci_username'])) {
        $send_username = $_POST['send_username'];
        $reci_username = $_POST['reci_username'];
        $sql = "SELECT chat_to,chat_from,chat_data_type,chat_data_details,chat_utc_time FROM `usn_chat_details` WHERE (chat_from='$send_username' AND chat_to='$reci_username') OR (chat_to='$send_username' AND chat_from='$reci_username') ORDER BY chat_utc_time ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        echo json_encode($data);
    }
}elseif($_POST['chat_type']=='chat_post') {
    $send_username = $_POST['chat_send_username'];
    $reci_username = $_POST['chat_reci_username'];
//        $date = $_POST['usn_chat_date'];
    $date = gmdate('Y-m-d\TH:i:s\Z');
    if (!empty($_POST['usn-chat-message'])) {
        $name = $_POST['usn-chat-message'];
        $sql = "INSERT INTO `usn_chat_details`(`chat_from`, `chat_to`, `chat_data_type`, `chat_data_details`, `chat_utc_time`) VALUES ('$send_username','$reci_username', 'text','$name', '$date')";
        $stmt = $pdo->prepare($sql);
        $exc = $stmt->execute();
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
            }
        }
    }
    if ($exc) {
        $sql = "SELECT chat_to,chat_from,chat_data_type,chat_data_details,chat_utc_time FROM `usn_chat_details` WHERE (chat_from='$send_username' AND chat_to='$reci_username') OR (chat_to='$send_username' AND chat_from='$reci_username') ORDER BY chat_utc_time ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        foreach ($data as $id => $d){
            if($d['chat_data_type']=='image') {
                $data_name = explode(":", $d['chat_data_details']);
                if (!empty($data_name[1])) {
                    if (file_exists("../../../../messages/image/" . $data_name[1]) != 1) {
                        $data[$id]['chat_data_details'] = "broken_image_link.png";
                    }
                }else {
                    if (file_exists("../../../../messages/image/" . $data_name[0]) != 1) {
                        $data[$id]['chat_data_details'] = "broken_image_link.png";
                    }
                }
            }
            elseif($d['chat_data_type']=='file'){
                $data_name = explode(":", $d['chat_data_details']);
                if (!empty($data_name[1])) {
                    if (file_exists("../../../../messages/file/" . $data_name[1]) != 1) {
                        $data[$id]['chat_data_details'] = "broken_image_link.png";
                    }
                }else{
                    if (file_exists("../../../../messages/file/" . $data_name[0]) != 1) {
                        $data[$id]['chat_data_details'] = "broken_image_link.png";
                    }
                }
            }
        }

        echo json_encode($data);
    }
}

