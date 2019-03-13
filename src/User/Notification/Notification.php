<?php

/**
 * Created by PhpStorm.
 * User: HP
 * Date: 7/12/2018
 * Time: 3:35 AM
 */
class Notification
{

    public function __construct($pdo){
//        $this->pdo =new PDO('mysql:host=localhost;dbname=id1576551_usn','id1576551_root','nazib123');
//        $this->pdo = new PDO('mysql:host=localhost;dbname=usn','root','nazib123');
        $this->pdo = $pdo;

    }

    public function jsAllNotification()
    {
        $pdo = $this->pdo;
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            die();
        }
        $sql1 = "SELECT DISTINCT(`notification_url`) FROM `usn_users_notification` WHERE (`to_username`='$username' AND NOT `from_username`='$username') AND (`to_username`='$username' OR `from_username`='$username') ORDER BY `notification_utc_time` DESC";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute();
        $read_data1 = $stmt1->fetchAll();
        $read_row1 = $stmt1->rowCount();

        if (($read_row1 != 0)) {
            $read_data2_merged = array();
            foreach ($read_data1 as $key => $value) {

                $sql2 = "SELECT * FROM `usn_users_notification` WHERE (`notification_url`=:notification_url AND `from_username`!=:username)  ORDER BY `notification_utc_time` DESC LIMIT 1";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute(
                    array(
                        ':notification_url' => $value['notification_url'],
                        ':username' => $username,
                    )
                );
                $read_data2 = $stmt2->fetchAll();
                $read_data2_merged = array_merge($read_data2_merged, $read_data2);
            }
            array_multisort(array_map(function($element) {
                return $element['notification_utc_time'];
            }, $read_data2_merged), SORT_DESC, $read_data2_merged);
            echo json_encode($read_data2_merged);
            die();

        }else{
            $data = array();
            echo json_encode($data);
            die();
        }
    }

    public function jsAllUnreadNotification()
    {
        $pdo = $this->pdo;
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            die();
        }
        $sql1 = "SELECT DISTINCT(`notification_url`) FROM `usn_users_notification` WHERE (`to_username`='$username' AND NOT `from_username`='$username') AND (`to_username`='$username' OR `from_username`='$username') ORDER BY `notification_utc_time` DESC";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute();
        $read_data1 = $stmt1->fetchAll();
        $read_row1 = $stmt1->rowCount();

        if (($read_row1 != 0)) {
            $read_data2_merged = array();
            $sql_count = "SELECT `unread_count` FROM `usn_users_notification_status` WHERE (`to_username`=:username AND `deleted_at`='0000-00-00 00:00:00')";
            $stmt_count = $pdo->prepare($sql_count);
            $stmt_count->execute(
                array(
                    ':username' => $username,
                )
            );
            $read_count = $stmt_count->fetchAll();
            foreach ($read_data1 as $key => $value) {

                $sql2 = "SELECT * FROM `usn_users_notification` WHERE (`notification_url`=:notification_url AND `from_username`!=:username AND `read_status`=:read_status)  ORDER BY `notification_utc_time` DESC LIMIT 1";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute(
                    array(
                        ':notification_url' => $value['notification_url'],
                        ':username' => $username,
                        ':read_status' => 'unread',
                    )
                );
                $read_data2 = $stmt2->fetchAll();
                $read_data2_merged = array_merge($read_data2_merged, $read_data2);
            }
            array_multisort(array_map(function($element) {
                return $element['notification_utc_time'];
            }, $read_data2_merged), SORT_DESC, $read_data2_merged);

            $data = ['ntf' => $read_data2_merged, 'count' => $read_count[0]['unread_count']];
            echo json_encode($data);
            die();

        }else{
            $data = array();
            echo json_encode($data);
            die();
        }
    }

    public function jsReadNotificationstatus()
    {
        $pdo = $this->pdo;
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
        } else {
            die();
        }

        $sql1 = "SELECT `unread_count` FROM `usn_users_notification_status` WHERE `to_username`=:to_username";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute(
            array(
                ':to_username'=>$username,
            )
        );
        $read_row = $stmt1->rowCount();
        if($read_row==0){
            $sql2 = "INSERT INTO `usn_users_notification_status`(`to_username`, `unread_count`, `notification_status_utc_time`) VALUES (:to_username, :unread_count, :notification_status_utc_time)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(
                array(
                    ':to_username'=>$username,
                    ':unread_count'=>0,
                    ':notification_status_utc_time'=> gmdate('Y-m-d\TH:i:s\Z'),
                )
            );
        }else{
        $sql2 = "UPDATE `usn_users_notification_status` SET `unread_count`=:unread_count WHERE (`to_username`=:to_username) AND `unread_count`!=:unread_count";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute(
            array(
                ':unread_count' => 0,
                ':to_username' => $username,
            )
        );
    }
        if($stmt2==true) {
            echo json_encode($stmt2);
            die();
        }
    }


    public function jsReadNotification()
    {
        $pdo = $this->pdo;
        if (!empty($_POST['ntf_url'])) {
            $ntf_url = $_POST['ntf_url'];
        } else {
            die();
        }


            $sql2 = "UPDATE `usn_users_notification` SET `read_status`=:read_status WHERE (`notification_url`=:notification_url) AND `read_status`!=:read_status";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(
                array(
                    ':read_status' => 'read',
                    ':notification_url'=>$ntf_url,
                )
            );

        if($stmt2==true) {
            echo json_encode($stmt2);
            die();
        }
    }



    public function allNotification($data=''){
        try{

            $pdo = $this->pdo;
            $username = $_SESSION['usn_username'];

            $sql1 = "SELECT DISTINCT(`notification_url`) FROM `usn_users_notification` WHERE (`to_username`='$username' AND NOT `from_username`='$username') AND (`to_username`='$username' OR `from_username`='$username') ORDER BY `notification_utc_time` DESC";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->execute();
            $read_data1 = $stmt1->fetchAll();
            $read_row1 = $stmt1->rowCount();

            if (($read_row1 != 0)) {
                $read_data2_merged = array();
                foreach ($read_data1 as $key => $value) {

                    $sql2 = "SELECT * FROM `usn_users_notification` WHERE (`notification_url`=:notification_url AND `from_username`!=:username)  ORDER BY `notification_utc_time` DESC LIMIT 1";
                    $stmt2 = $pdo->prepare($sql2);
                    $stmt2->execute(
                        array(
                            ':notification_url' => $value['notification_url'],
                            ':username' => $username,
                        )
                    );
                    $read_data2 = $stmt2->fetchAll();
                    $read_data2_merged = array_merge($read_data2_merged, $read_data2);
                }
                array_multisort(array_map(function($element) {
                    return $element['notification_utc_time'];
                }, $read_data2_merged), SORT_DESC, $read_data2_merged);
                return $read_data2_merged;


            }else{
                $data = array();
                return $data;
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }




}