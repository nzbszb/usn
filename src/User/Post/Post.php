<?php

/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2/25/2018
 * Time: 1:56 AM
 */
class Post
{

    public $post_id="";
    public $username="";
    public $comment_username="";
    public $comment_fullname="";
    public $reci_username="";
    public $reci_fullname="";
    public $post_details="";
    public $comment_details="";
    public $post_photo="";
    public $post_file="";
    public $date="";
    public $access_type="";
    public $pdo="";

    public function postSetData($data = '')
    {

        if(array_key_exists('usn_post_id',$data)){
            $this->post_id= $data['usn_post_id'];
        }
        if(array_key_exists('comment_post_id',$data)){
            $this->post_id= $data['comment_post_id'];
        }
        if(array_key_exists('user',$data)){
            $this->username= $data['user'];
        }
        if(array_key_exists('usn_username',$data)){
            $this->username= $data['usn_username'];
        }
        if(array_key_exists('comment_send_username',$data)){
            $this->comment_username= $data['comment_send_username'];
        }
        if(array_key_exists('comment_reci_username',$data)){
            $this->reci_username= $data['comment_reci_username'];
        }
        if(array_key_exists('comment_send_fullname',$data)){
            $this->comment_fullname= $data['comment_send_fullname'];
        }
        if(array_key_exists('comment_reci_fullname',$data)){
            $this->reci_fullname= $data['comment_reci_fullname'];
        }
        if(array_key_exists('usn_post',$data)){
            $this->post_details = $data['usn_post'];
        }
        if(array_key_exists('usn_comment_message',$data)){
            $this->comment_details = $data['usn_comment_message'];
        }
        if(array_key_exists('usn_post_photo',$data)){
            $this->post_photo = $data['usn_post_photo'];
        }
        if(array_key_exists('usn_post_file',$data)){
            $this->post_file = $data['usn_post_file'];
        }
        if(array_key_exists('usn_date',$data)){
            $this->date = $data['usn_date'];
        }
        if(array_key_exists('usn_access_type',$data)){
            $this->access_type = $data['usn_access_type'];
        }
        return $this;


    }


    public function __construct($pdo){
//        $this->pdo =new PDO('mysql:host=localhost;dbname=id1576551_usn','id1576551_root','nazib123');
//        $this->pdo = new PDO('mysql:host=localhost;dbname=usn','root','nazib123');
        $this->pdo = $pdo;

    }



    public function postInfoStore()
    {
        try {
//            print_r($this);
//            die();
            $pdo = $this->pdo;
            $query = "INSERT INTO `usn_users_post`(`post_id`, `username`, `post_details`, `post_photo`, `post_file`, `access_type`, `post_utc_time`) VALUES (:post_id, :username, :post_details, :post_photo, :post_file, :access_type, :date)";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array
                (
                    ':post_id' => $this->post_id,
                    ':username' => $this->username,
                    ':post_details' => $this->post_details,
                    ':post_photo' => $this->post_photo,
                    ':post_file' => $this->post_file,
                    ':access_type' => $this->access_type,
                    ':date' => gmdate('Y-m-d\TH:i:s\Z'),

                ));

//            print_r($this);
//            die();

            if($stmt){
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "You have posted successfully";
                    header('location:../home/');
                } else {
                    $_SESSION['message'] = "You have posted successfully";
                    header('location:../home/');
                }
            }
            else{
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../../../');
                } else {
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../../../');
                }
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    public function commentInfoStore()
    {
        try {
//            echo json_encode($this);
//            die();
            $pdo = $this->pdo;

            if($this->comment_username!=$this->reci_username) {

                $query_post = "INSERT INTO `usn_users_post_comment`(`post_id`, `comment_username`, `comment_details`, `comment_utc_time`) VALUES (:post_id, :comment_username, :comment_details, :utc_time)";
                $stmt_post = $pdo->prepare($query_post);
                $stmt_post->execute(
                    array
                    (
                        ':post_id' => $this->post_id,
                        ':comment_username' => $this->comment_username,
                        ':comment_details' => $this->comment_details,
                        ':utc_time' => gmdate('Y-m-d\TH:i:s\Z'),

                    ));
                if($stmt_post==true) {
                    $query_post1 = "INSERT INTO `usn_users_notification`(`to_username`,`from_username`, `notification_type`, `notification_details`, `notification_url`, `read_status`, `notification_utc_time`) VALUES (:to_username, :comment_username, :notification_type, :notification_details, :notification_url, :read_status, :utc_time)";
                    $stmt_post1 = $pdo->prepare($query_post1);
                    $stmt_post1->execute(
                        array
                        (
                            ':comment_username' => $this->comment_username,
                            ':to_username' => $this->reci_username,
                            ':notification_type' => 'comment',
                            ':notification_details' => $this->comment_fullname . ' commented on',
                            ':notification_url' => '../post/?user=' . $this->reci_username . '&pid=' . $this->post_id . '&#comment',
                            ':read_status' => 'unread',
                            ':utc_time' => gmdate('Y-m-d\TH:i:s\Z'),

                        ));
                    if ($stmt_post1 == true) {
                        $sql1 = "SELECT `unread_count` FROM `usn_users_notification_status` WHERE `to_username`=:to_username";
                        $stmt1 = $pdo->prepare($sql1);
                        $stmt1->execute(
                            array(
                                ':to_username' => $this->reci_username,
                            )
                        );
                        $read_data = $stmt1->fetchAll();
                        $read_row = $stmt1->rowCount();

                        if ($read_row == 0) {
                            $sql2 = "INSERT INTO `usn_users_notification_status`(`to_username`, `unread_count`, `notification_status_utc_time`) VALUES (:to_username, :unread_count, :notification_status_utc_time)";
                            $stmt2 = $pdo->prepare($sql2);
                            $stmt2->execute(
                                array(
                                    ':to_username' => $this->reci_username,
                                    ':unread_count' => 1,
                                    ':notification_status_utc_time' => gmdate('Y-m-d\TH:i:s\Z'),
                                )
                            );
                        } else {
                            $unread_count = $read_data[0]['unread_count'];
                            $sql2 = "UPDATE `usn_users_notification_status` SET `unread_count`=:unread_count, `notification_status_utc_time`=:notification_status_utc_time WHERE to_username=:to_username";
                            $stmt2 = $pdo->prepare($sql2);
                            $stmt2->execute(
                                array(
                                    ':to_username' => $this->reci_username,
                                    ':unread_count' => $unread_count + 1,
                                    ':notification_status_utc_time' => gmdate('Y-m-d\TH:i:s\Z'),

                                )
                            );

                        }

                        if ($stmt2) {
                            echo json_encode($stmt2);
                            die();
//                    $_POST['send_username'] = $this->comment_username;
//                    $_POST['reci_username'] = $this->reci_username;
//                    $_POST['post_id'] = $this->post_id;
//                    $this->jsPostDetails($_POST);
//                    die();
                        }
                    }
                }
            }else{
                $query = "INSERT INTO `usn_users_post_comment`(`post_id`, `comment_username`, `comment_details`, `comment_utc_time`) VALUES (:post_id, :comment_username, :comment_details, :utc_time)";
                $stmt = $pdo->prepare($query);
                $stmt->execute(
                    array
                    (
                        ':post_id' => $this->post_id,
                        ':comment_username' => $this->comment_username,
                        ':comment_details' => $this->comment_details,
                        ':utc_time' => gmdate('Y-m-d\TH:i:s\Z'),

                    ));
                if($stmt==true) {
                    $query1 = "INSERT INTO `usn_users_notification`(`to_username`,`from_username`, `notification_type`, `notification_details`, `notification_url`, `read_status`, `notification_utc_time`) VALUES (:to_username, :comment_username, :notification_type, :notification_details, :notification_url, :read_status, :utc_time)";
                    $stmt1 = $pdo->prepare($query1);
                    $stmt1->execute(
                        array
                        (
                            ':comment_username' => $this->comment_username,
                            ':to_username' => $this->reci_username,
                            ':notification_type' => 'reply',
                            ':notification_details' => $this->comment_fullname.' replied to own post',
                            ':notification_url' => '../post/?user='.$this->reci_username.'&pid='.$this->post_id.'&#reply',
                            ':read_status' => 'unread',
                            ':utc_time' => gmdate('Y-m-d\TH:i:s\Z'),

                        ));

                    if ($stmt1 == true) {
                        echo json_encode($stmt1);
                        die();
//                    $_POST['send_username'] = $this->comment_username;
//                    $_POST['reci_username'] = $this->reci_username;
//                    $_POST['post_id'] = $this->post_id;
//                    $this->jsPostDetails($_POST);
//                    die();
                    }
                }
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public function commentCount($data = ''){
        try{
            $pdo = $this->pdo;
            $query = "SELECT COUNT(`post_id`) AS `comment_count` FROM usn_users_post_comment WHERE `post_id`=:post_id AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':post_id'=>$data,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();
            if($row==1){
                return $data[0];
            }else{
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = 'Sorry, there is some technical difficulty!';
                } else {
                    $_SESSION['message'] = 'Sorry, there is some technical difficulty!';
                }
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function seenCount($data = ''){
        try{
            $username = $_SESSION['usn_username'];
            $pdo = $this->pdo;
            $query = "SELECT `seen_username` FROM usn_users_post_seen WHERE `post_id`=:post_id AND `seen_username`=:seen_username AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array
            (
                ':post_id' => $data,
                ':seen_username' => $username,

            ));
            $row = $stmt->rowCount();
            if($row==0){
                $query = "SELECT COUNT(`post_id`) AS `seen_count` FROM usn_users_post_seen WHERE `post_id`=:post_id AND deleted_at='0000-00-00 00:00:00'";
                $stmt = $pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':post_id'=>$data,
                    )
                );
                $seen_info = $stmt->fetchAll();
                $seen_info['seen_count']=$seen_info[0]['seen_count'];
                $seen_info['seen_status'] = 0;
                return $seen_info;
            }else{
                $query = "SELECT COUNT(`post_id`) AS `seen_count` FROM usn_users_post_seen WHERE `post_id`=:post_id AND deleted_at='0000-00-00 00:00:00'";
                $stmt = $pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':post_id'=>$data,
                    )
                );
                $seen_info = $stmt->fetchAll();
                $seen_info['seen_count']=$seen_info[0]['seen_count'];
                $seen_info['seen_status'] = 1;
                return $seen_info;
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function seenInfoStoreOrDelete()
    {
        try {
//            echo json_encode($_POST);
//            die();
            $post_id = $_POST['post_id'];
            $send_username = $_POST['send_username'];
            $reci_username = $_POST['reci_username'];
            $send_fullname = $_POST['send_fullname'];
            $pdo = $this->pdo;
            $query1 = "SELECT `seen_username` FROM usn_users_post_seen WHERE `post_id`=:post_id AND `seen_username`=:seen_username AND deleted_at='0000-00-00 00:00:00'";
            $stmt1 = $pdo->prepare($query1);
            $stmt1->execute(array
            (
                ':post_id' => $post_id,
                ':seen_username' => $send_username,

            ));
            $row = $stmt1->rowCount();

            if($row==0) {

                if($_POST['send_username']!=$_POST['reci_username']){
                    $query2 = "INSERT INTO `usn_users_post_seen`(`post_id`, `seen_username`, `seen_utc_time`) VALUES (:post_id, :seen_username, :date)";
                    $stmt2 = $pdo->prepare($query2);
                    $stmt2->execute(
                        array
                        (
                            ':post_id' => $post_id,
                            ':seen_username' => $send_username,
                            ':date' => gmdate('Y-m-d\TH:i:s\Z'),

                        ));
                    if($stmt2){
                    $query3 = "INSERT INTO `usn_users_notification`(`to_username`, `from_username`, `notification_type`, `notification_details`, `notification_url`, `read_status`, `notification_utc_time`) VALUES (:to_username, :seen_username, :notification_type, :notification_details, :notification_url, :read_status, :date)";
                    $stmt3 = $pdo->prepare($query3);
                    $stmt3->execute(
                        array
                        (
                            ':seen_username' => $send_username,
                            ':to_username' => $reci_username,
                            ':notification_type' => 'seen',
                            ':notification_details' => $send_fullname.' has seen your post',
                            ':notification_url' => '../post/?user='.$reci_username.'&pid='.$post_id.'&#seen',
                            ':read_status' => 'unread',
                            ':date' => gmdate('Y-m-d\TH:i:s\Z'),

                        ));

                        $sql1 = "SELECT `unread_count` FROM `usn_users_notification_status` WHERE `to_username`=:to_username";
                        $stmt1 = $pdo->prepare($sql1);
                        $stmt1->execute(
                            array(
                                ':to_username'=>$reci_username,
                            )
                        );
                        $read_data = $stmt1->fetchAll();
                        $read_row = $stmt1->rowCount();
                        if($read_row==0){
                            $sql2 = "INSERT INTO `usn_users_notification_status`(`to_username`, `unread_count`, `notification_status_utc_time`) VALUES (:to_username, :unread_count, :notification_status_utc_time)";
                            $stmt2 = $pdo->prepare($sql2);
                            $stmt2->execute(
                                array(
                                    ':to_username'=>$reci_username,
                                    ':unread_count'=>1,
                                    ':notification_status_utc_time'=> gmdate('Y-m-d\TH:i:s\Z'),
                                )
                            );
                        }else{
                            $unread_count = $read_data[0]['unread_count'];
                            $sql2 = "UPDATE `usn_users_notification_status` SET `unread_count`=:unread_count, `notification_status_utc_time`=:notification_status_utc_time WHERE to_username=:to_username";
                            $stmt2 = $pdo->prepare($sql2);
                            $stmt2->execute(
                                array(
                                    ':to_username'=>$reci_username,
                                    ':unread_count'=>$unread_count+1,
                                    ':notification_status_utc_time'=> gmdate('Y-m-d\TH:i:s\Z'),

                                )
                            );

                        }


                        if($stmt2) {

                            $query4 = "SELECT COUNT(`post_id`) AS `seen_count` FROM usn_users_post_seen WHERE `post_id`=:post_id AND deleted_at='0000-00-00 00:00:00'";
                            $stmt4 = $pdo->prepare($query4);
                            $stmt4->execute(
                                array(
                                    ':post_id'=>$post_id,
                                ));
                            $data1 = $stmt4->fetchAll();
                            $data1['seen_count']=$data1[0]['seen_count'];
                            $data1['seen_status'] = 1;
                            echo json_encode($data1);
                            die();
                        }
                    }

                }else{
                    $query2 = "INSERT INTO `usn_users_post_seen`(`post_id`, `seen_username`, `seen_utc_time`) VALUES (:post_id, :seen_username, :date)";
                    $stmt2 = $pdo->prepare($query2);
                    $stmt2->execute(
                        array
                        (
                            ':post_id' => $post_id,
                            ':seen_username' => $send_username,
                            ':date' => gmdate('Y-m-d\TH:i:s\Z'),

                        ));
                    if($stmt2){
                        $query4 = "SELECT COUNT(`post_id`) AS `seen_count` FROM usn_users_post_seen WHERE `post_id`=:post_id AND deleted_at='0000-00-00 00:00:00'";
                        $stmt4 = $pdo->prepare($query4);
                        $stmt4->execute(
                            array(
                                ':post_id'=>$post_id,
                            ));
                        $data1 = $stmt4->fetchAll();
                        $data1['seen_count']=$data1[0]['seen_count'];
                        $data1['seen_status'] = 1;
                        echo json_encode($data1);
                        die();
                    }
                }
            }else{
                if($_POST['send_username']!=$_POST['reci_username']) {
                    $query3 = "DELETE FROM `usn_users_post_seen` WHERE  `post_id`=:post_id AND `seen_username`=:seen_username AND deleted_at='0000-00-00 00:00:00'";
                    $stmt3 = $pdo->prepare($query3);
                    $stmt3->execute(
                        array(
                        ':post_id' => $post_id,
                        ':seen_username' => $send_username,
                    ));
                    if($stmt3){
                    $query4 = "DELETE FROM `usn_users_notification` WHERE `to_username`=:to_username AND `notification_type`=:notification_type AND `from_username`=:seen_username AND `notification_url`=:notification_url AND deleted_at='0000-00-00 00:00:00'";
                    $stmt4 = $pdo->prepare($query4);
                    $stmt4->execute(
                        array(
                        ':seen_username' => $send_username,
                        ':to_username' => $reci_username,
                        ':notification_type' => 'seen',
                        ':notification_url' => '../post/?user='.$reci_username.'&pid='.$post_id.'&#seen',
                    ));
                        if($stmt4) {
                            $query5 = "SELECT COUNT(`post_id`) AS `seen_count` FROM usn_users_post_seen WHERE `post_id`=:post_id AND deleted_at='0000-00-00 00:00:00'";
                            $stmt5 = $pdo->prepare($query5);
                            $stmt5->execute(
                                array(
                                    ':post_id'=>$post_id,
                                ));
                            $data0 = $stmt5->fetchAll();
                            $data0['seen_count']=$data0[0]['seen_count'];
                            $data0['seen_status'] = 0;
                            echo json_encode($data0);
                            die();
                        }
                    }
                }else{
                    $query3 = "DELETE FROM `usn_users_post_seen` WHERE  `post_id`=:post_id AND `seen_username`=:seen_username AND deleted_at='0000-00-00 00:00:00'";
                    $stmt3 = $pdo->prepare($query3);
                    $stmt3->execute(array
                    (
                        ':post_id' => $post_id,
                        ':seen_username' => $send_username,

                    ));
                    if($stmt3){
                        $query5 = "SELECT COUNT(`post_id`) AS `seen_count` FROM usn_users_post_seen WHERE `post_id`=:post_id AND deleted_at='0000-00-00 00:00:00'";
                        $stmt5 = $pdo->prepare($query5);
                        $stmt5->execute(
                            array(
                                ':post_id'=>$post_id,
                            ));
                        $data0 = $stmt5->fetchAll();
                        $data0['seen_count']=$data0[0]['seen_count'];
                        $data0['seen_status'] = 0;
                        echo json_encode($data0);
                        die();
                    }
                }
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    public function jsPostDetails($data = ''){
        try{
//            echo json_encode($_POST);
//            die();
            $pdo = $this->pdo;
            $active_username = $_POST['send_username'];
            $post_username = $_POST['reci_username'];
            $post_id = $_POST['post_id'];
//            echo json_encode($post_id);
//
//            die();
            $query1 = "SELECT p.`post_id`, p.`username`, p.`post_details`, p.`post_photo`, p.`post_file`, p.`access_type`, p.`post_utc_time`,r.`user_pic`, r.`first_name`, r.`last_name` FROM `usn_users_post` p, `usn_users_reg` r WHERE p.`username`='$post_username' AND p.`post_id`='$post_id' AND p.`username`=r.`username` AND p.`deleted_at`='0000-00-00 00:00:00'";
            $stmt1 = $pdo->prepare($query1);
            $stmt1->execute();
            $data1 = $stmt1->fetchAll();

            for($i=0;$i<sizeof($data1);$i++){
                $fullname = ucwords($data1[$i]['first_name']).' '.ucwords($data1[$i]['last_name']);
                $data1[$i]['fullname'] = implode("&nbsp;",explode(" ",$fullname));
            }

            $query2 = "SELECT c.`comment_id`, c.`post_id`, c.`comment_username`, c.`comment_details`, c.`comment_utc_time`, r.`username`, r.`user_pic`, r.`first_name`, r.`last_name` FROM `usn_users_post_comment` AS c, `usn_users_reg` AS r WHERE c.`post_id`='$post_id' AND c.`comment_username`=r.`username` AND c.`deleted_at`='0000-00-00 00:00:00' ORDER BY c.`comment_utc_time` DESC";
            $stmt2 = $pdo->prepare($query2);
            $stmt2->execute();
            $data2 = $stmt2->fetchAll();
            $row1 = $stmt2->rowCount();
            for($i=0;$i<sizeof($data2);$i++){
                $fullname = ucwords($data2[$i]['first_name']).' '.ucwords($data2[$i]['last_name']);
                $data2[$i]['fullname'] = implode("&nbsp;",explode(" ",$fullname));
            }


            $query3 = "SELECT `seen_username` FROM usn_users_post_seen WHERE `post_id`=:post_id AND `seen_username`=:seen_username AND deleted_at='0000-00-00 00:00:00'";
            $stmt3 = $pdo->prepare($query3);
            $stmt3->execute(array
            (
                ':post_id' => $post_id,
                ':seen_username' => $active_username,

            ));
            $row_seen = $stmt3->rowCount();
            if($row_seen==0){
                $query = "SELECT COUNT(`post_id`) AS `seen_count` FROM usn_users_post_seen WHERE `post_id`=:post_id AND deleted_at='0000-00-00 00:00:00'";
                $stmt = $pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':post_id'=>$post_id,
                    )
                );
                $seen_info = $stmt->fetchAll();
                $seen_info['seen_count']=$seen_info[0]['seen_count'];
                $seen_info['seen_status'] = 0;
            }else{
                $query = "SELECT COUNT(`post_id`) AS `seen_count` FROM usn_users_post_seen WHERE `post_id`=:post_id AND deleted_at='0000-00-00 00:00:00'";
                $stmt = $pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':post_id'=>$post_id,
                    )
                );
                $seen_info = $stmt->fetchAll();
                $seen_info['seen_count']=$seen_info[0]['seen_count'];
                $seen_info['seen_status'] = 1;
            }
            if($stmt1){
                if($stmt2){
                    if ($stmt3){
                        $data = ['post_info' => $data1, 'comment_info' => $data2, 'comment_count' => $row1, 'seen_info' => $seen_info];
                        echo json_encode($data);
                        die();
                    }else{
                        $this->jsPostDetails();
                    }
                }else{
                    $this->jsPostDetails();
                }
            }else{
                $this->jsPostDetails();
            }


        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }




    public function viewMyPost(){
        try{
            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_users_post WHERE username=:username AND deleted_at='0000-00-00 00:00:00' ORDER BY post_utc_time DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':username'=>$this->username,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();

            foreach ($data as $id => $d){
                if(!empty($d['post_photo'])) {
                    $data_name = explode(":", $d['post_photo']);
                    if (!empty($data_name[1])) {
                        if (file_exists("../../../img/" . $data_name[1]) != 1) {
                            $data[$id]['post_photo'] = "broken_image_link.png";
                        }
                    }else {
                        if (file_exists("../../../img/" . $data_name[0]) != 1) {
                            $data[$id]['post_photo'] = "broken_image_link.png";
                        }
                    }
                }
                elseif(!empty($d['post_file'])){
                    $data_name = explode(":", $d['post_file']);
                    if (!empty($data_name[1])) {
                        if (file_exists("../../../files/" . $data_name[1]) != 1) {
                            $data[$id]['post_file'] = "broken_image_link.png";
                        }
                    }else{
                        if (file_exists("../../../files/" . $data_name[0]) != 1) {
                            $data[$id]['post_file'] = "broken_image_link.png";
                        }
                    }
                }
            }

            if($row!=0){
                return $data;
            }else{
                if (isset($_SESSION['post_message'])) {
                    unset($_SESSION['post_message']);
                    $_SESSION['post_message'] = 'No Post!';
                    return $data;
                } else {
                    $_SESSION['post_message'] = 'No Post!';
                    return $data;
                }
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }

    public function viewFeedPost(){
        try{
            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_users_post WHERE username!=:username AND deleted_at='0000-00-00 00:00:00' ORDER BY post_utc_time DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':username'=>$this->username,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();

            foreach ($data as $id => $d){
                if(!empty($d['post_photo'])) {
                    $data_name = explode(":", $d['post_photo']);
                    if (!empty($data_name[1])) {
                        if (file_exists("../../../img/" . $data_name[1]) != 1) {
                            $data[$id]['post_photo'] = "broken_image_link.png";
                        }
                    }else {
                        if (file_exists("../../../img/" . $data_name[0]) != 1) {
                            $data[$id]['post_photo'] = "broken_image_link.png";
                        }
                    }
                }
                elseif(!empty($d['post_file'])){
                    $data_name = explode(":", $d['post_file']);
                    if (!empty($data_name[1])) {
                        if (file_exists("../../../files/" . $data_name[1]) != 1) {
                            $data[$id]['post_file'] = "broken_image_link.png";
                        }
                    }else{
                        if (file_exists("../../../files/" . $data_name[0]) != 1) {
                            $data[$id]['post_file'] = "broken_image_link.png";
                        }
                    }
                }
            }
//            print_r($data);
//            die();


            if($row!=0){
                return $data;
            }else{
                if (isset($_SESSION['post_message'])) {
                    unset($_SESSION['post_message']);
                    $_SESSION['post_message'] = 'No Post!';
                    return $data;
                } else {
                    $_SESSION['post_message'] = 'No Post!';
                    return $data;
                }
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function postUser($data = ''){
        try{

            $pdo = $this->pdo;
            $query = "SELECT user_pic,user_status,username,first_name,last_name FROM usn_users_reg WHERE username=:username AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':username'=>$data,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();
            if($row==1){
                return $data;
            }else{
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = 'Sorry, there is some technical difficulty!';
                    header('location:../../../');
                } else {
                    $_SESSION['message'] = 'Sorry, there is some technical difficulty!';
                    header('location:../../../');
                }
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function seenListInfo($data = ''){
        try{
//            echo json_encode($_POST);
//            die();
            $post_id = $_POST['post_id'];
            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_users_post_seen WHERE post_id=:post_id AND deleted_at='0000-00-00 00:00:00' ORDER BY seen_utc_time DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':post_id'=>$post_id,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();

            if($row!=0){
                $data_result = array();
                for($i=0;$i<sizeof($data);$i++) {

                    $query1 = "SELECT * FROM usn_users_reg WHERE username=:username AND deleted_at='0000-00-00 00:00:00'";
                    $stmt1 = $pdo->prepare($query1);
                    $stmt1->execute(
                        array(
                            ':username' => $data[$i]['seen_username'],
                        )
                    );
                    $data1 = $stmt1->fetchAll();
                    $data1[0]['seen_utc_time'] = $data[$i]['seen_utc_time'];
                    $data1[0]['fullname'] = ucwords($data1[0]['first_name']).' '.ucwords($data1[0]['last_name']);
                    $data_result = array_merge($data_result, $data1);
                }
                echo json_encode($data_result);
                die();
            }else{
                $data_result = array();
                echo json_encode($data_result);
                die();
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function deleteMyPost($data = ''){
        try{
//            echo json_encode($_POST);
//            die();
            $post_id = $_POST['post_id'];
            $del_username = $_POST['del_username'];

            $pdo = $this->pdo;
            $query = "SELECT * FROM `usn_users_post` WHERE `post_id`=:post_id AND `username`=:username AND `deleted_at`='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':username'=>$del_username,
                    ':post_id'=>$post_id,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();
//            echo json_encode($data);
//            die();
            if($row==1){

                if(!empty($data[0]['post_photo'])){
                    if(!empty(explode(":",$data[0]['post_photo'])[1])){
                        $photo = explode(":",$data[0]['post_photo'])[1];
                    }else{
                        $photo =  explode(":",$data[0]['post_photo'])[0];
                    }
                    if (file_exists('../../../img/' . $photo)) {
                        unlink('../../../img/' . $photo);
                    }
                }
                if(!empty($data[0]['post_file'])){
                    if(!empty(explode(":",$data[0]['post_file'])[1])){
                        $file = explode(":",$data[0]['post_file'])[1];
                    }else{
                        $file =  explode(":",$data[0]['post_file'])[0];
                    }
                    if (file_exists('../../../files/' . $file)) {
                        unlink('../../../files/' . $file);
                    }
                }

                $query1 = "DELETE FROM `usn_users_post` WHERE `post_id`=:post_id AND `username`=:username AND `deleted_at`='0000-00-00 00:00:00'";
                $stmt1 = $pdo->prepare($query1);
                $stmt1->execute(
                    array(
                        ':username'=>$del_username,
                        ':post_id'=>$post_id,
                    )
                );
                if($stmt1==true){
                    echo json_encode($stmt1);
                    die();
                }
            }else{
                die();
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function deleteMyComment($data = ''){
        try{
//            echo json_encode($_POST);
//            die();
            $post_id = $_POST['post_id'];
            $comment_id = $_POST['comment_id'];

            $pdo = $this->pdo;
            $query = "SELECT * FROM `usn_users_post_comment` WHERE `comment_id`=:comment_id AND `post_id`=:post_id AND `deleted_at`='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':comment_id'=>$comment_id,
                    ':post_id'=>$post_id,
                )
            );
            $row = $stmt->rowCount();
//            echo json_encode($data);
//            die();
            if($row==1){
                $query1 = "DELETE FROM `usn_users_post_comment` WHERE `comment_id`=:comment_id AND `post_id`=:post_id AND `deleted_at`='0000-00-00 00:00:00'";
                $stmt1 = $pdo->prepare($query1);
                $stmt1->execute(
                    array(
                        ':comment_id'=>$comment_id,
                        ':post_id'=>$post_id,
                    )
                );
                if($stmt1==true){
                    echo json_encode($stmt1);
                    die();
                }
            }else{
                die();
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


}