<?php

/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2/27/2018
 * Time: 3:04 PM
 */
class Connection
{

    public $connection_id="";
    public $send_username="";
    public $reci_username="";
    public $status="";
    public $message="";
    public $accept_username="";
    public $reject_username="";
    public $username="";
    public $pdo="";

    public function connectionSetData($data = '')
    {

        if(array_key_exists('usn_connection_id',$data)){
            $this->connection_id= $data['usn_post_id'];
        }
        if(array_key_exists('usn_username',$data)){
            $this->send_username= $data['usn_username'];
        }
        if(array_key_exists('user',$data)){
            $this->reci_username= $data['user'];
        }
        if(array_key_exists('usn_reci_username',$data)){
            $this->reci_username = $data['usn_reci_username'];
        }
        if(array_key_exists('usn_status',$data)){
            $this->status = $data['usn_status'];
        }
        if(array_key_exists('usn_accept_username',$data)){
            $this->accept_username = $data['usn_accept_username'];
        }
        if(array_key_exists('usn_reject_username',$data)){
            $this->reject_username = $data['usn_reject_username'];
        }
        return $this;
    }


    public function __construct($pdo){
//        $this->pdo =new PDO('mysql:host=localhost;dbname=id1576551_usn','id1576551_root','nazib123');
//        $this->pdo = new PDO('mysql:host=localhost;dbname=usn','root','nazib123');
        $this->pdo = $pdo;

    }


    public function checkConnection(){
        try{
            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_users_connection WHERE ((send_username=:send_username AND reci_username=:reci_username ) OR (send_username=:reci_username AND reci_username=:send_username )) AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':send_username'=>$this->send_username,
                    ':reci_username'=>$this->reci_username,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();
            if($row==0){
                $this->status = 'send_request';
                return $this;
            }elseif($row==1){
                    $this->status = $data[0]['status'];
                    $this->send_username = $data[0]['send_username'];
                    $this->reci_username = $data[0]['reci_username'];
                    return $this;
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function conStore()
    {
        try {
            $pdo = $this->pdo;
            $query = "INSERT INTO `usn_users_connection` (`connection_id`, `send_username`, `reci_username`, `status`) VALUES (:connection_id, :send_username, :reci_username, :status)";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array
                (
                    ':connection_id' => null,
                    ':send_username' => $this->send_username,
                    ':reci_username' => $this->reci_username,
                    ':status' => 'false',

                ));
            if ($stmt) {
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "Connection request sent";
                    header('location:../account/?user='.$this->reci_username);
                } else {
                    $_SESSION['message'] = "Connection request sent";
                    header('location:../account/?user='.$this->reci_username);
                }
            } else {
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../account/?user='.$this->reci_username);
                } else {
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../account/?user='.$this->reci_username);
                }
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    public function receiveRequest(){
        try{

            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_users_connection WHERE reci_username=:reci_username AND status='false' AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':reci_username'=>$this->send_username,
                )
            );
            $data = $stmt->fetchAll();
//            $row = $stmt->rowCount();
            if($stmt){
                    return $data;
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function acceptRequest(){
        try {

            $pdo = $this->pdo;
            $query = "UPDATE usn_users_connection SET status=:status WHERE reci_username=:reci_username AND send_username=:send_username AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':status' => 'true',
                    ':reci_username' => $this->send_username,
                    ':send_username' => $this->accept_username,
                )
            );

            if ($stmt == true) {
                $query1 = "INSERT INTO `usn_users_notification`(`to_username`, `from_username`, `notification_type`, `notification_details`, `notification_url`, `read_status`, `notification_utc_time`) VALUES (:send_username, :reci_username, :notification_type, :notification_details, :notification_url, :read_status, :utc_time)";
                $stmt1 = $pdo->prepare($query1);
                $stmt1->execute(
                    array(
                        ':reci_username' => $this->send_username,
                        ':send_username' => $this->accept_username,
                        ':notification_type' => 'connection',
                        ':notification_details' => $this->send_username . ' accepted your connection request',
                        ':notification_url' => '../account/?user=' . $this->send_username . '&#' . $this->accept_username,
                        ':read_status' => 'unread',
                        ':utc_time' => gmdate('Y-m-d\TH:i:s\Z'),
                    )
                );
                if($stmt1==true) {

                    $sql1 = "SELECT `unread_count` FROM `usn_users_notification_status` WHERE `to_username`=:to_username";
                    $stmt1 = $pdo->prepare($sql1);
                    $stmt1->execute(
                        array(
                            ':to_username' => $this->accept_username,
                        )
                    );
                    $read_data = $stmt1->fetchAll();
                    $read_row = $stmt1->rowCount();
                    if ($read_row == 0) {
                        $sql2 = "INSERT INTO `usn_users_notification_status`(`to_username`, `unread_count`, `notification_status_utc_time`) VALUES (:to_username, :unread_count, :notification_status_utc_time)";
                        $stmt2 = $pdo->prepare($sql2);
                        $stmt2->execute(
                            array(
                                ':to_username' => $this->accept_username,
                                ':unread_count' => 0,
                                ':notification_status_utc_time' => gmdate('Y-m-d\TH:i:s\Z'),
                            )
                        );
                    } else {
                        $unread_count = $read_data[0]['unread_count'];
                        $sql2 = "UPDATE `usn_users_notification_status` SET `unread_count`=:unread_count, `notification_status_utc_time`=:notification_status_utc_time WHERE to_username=:to_username";
                        $stmt2 = $pdo->prepare($sql2);
                        $stmt2->execute(
                            array(
                                ':to_username' => $this->accept_username,
                                ':unread_count' => $unread_count + 1,
                                ':notification_status_utc_time' => gmdate('Y-m-d\TH:i:s\Z'),

                            )
                        );

                    }

                    if ($stmt2 == true) {
                        $_SESSION['message'] = "You are connected to <a href='../account/?user=" . $this->accept_username . "'>" . $this->accept_username . "</a>";
                        header('location:../account/?user=' . $this->accept_username);
                    } else {
                        $_SESSION['message'] = "Something Went Wrong!";
                        header('location:../account/?user=' . $this->accept_username);
                    }
                }
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function rejectRequest(){
        try{
            $pdo = $this->pdo;
            $query = "DELETE FROM usn_users_connection WHERE ((reci_username=:reci_username AND send_username=:send_username) OR (reci_username=:send_username AND send_username=:reci_username)) AND deleted_at='0000-00-00 00:00:00';
                      DELETE FROM `usn_users_notification` WHERE ((`to_username`=:send_username AND `from_username`=:reci_username) OR (`to_username`=:reci_username AND `from_username`=:send_username)) AND `notification_type`=:notification_type AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':reci_username'=>$this->send_username,
                    ':send_username'=>$this->reject_username,
                    ':notification_type'=>'connection',
                )
            );
            if($stmt==true){
                $_SESSION['message'] = "You are not connected to <a href='../account/?user=".$this->reject_username."'>".$this->reject_username."</a>";
                header('location:../account/?user='.$this->reject_username);

            }else{
                $_SESSION['message'] ="Something Went Wrong!";
                header('location:../account/?user='.$this->reject_username);
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function connectedConnection($data = ""){
        try {
            if (!empty($data)) {
                $connection = $data;
                $user = $_SESSION['usn_username'];

                $pdo = $this->pdo;
                $query = "SELECT * FROM usn_users_connection WHERE ((send_username=:send_username AND reci_username=:reci_username ) OR (send_username=:reci_username AND reci_username=:send_username )) AND deleted_at='0000-00-00 00:00:00'";
                $stmt = $pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':send_username' => $user,
                        ':reci_username' => $connection,
                    )
                );
                $data = $stmt->fetchAll();
                $row = $stmt->rowCount();

            if ($row == 0) {
                if(($user==$connection)){
                    $this->send_username = $user;
                    $this->reci_username = $connection;
                    return $this;
                }else{
                    $this->status = 'send_request';
                    $this->send_username = $user;
                    $this->reci_username = $connection;
                }
            } elseif ($row == 1) {
                    $this->status = $data[0]['status'];
                    $this->send_username = $data[0]['send_username'];
                    $this->reci_username = $data[0]['reci_username'];
                    return $this;
            }
        }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
        return $this;
    }


    public function connectionList($data = ""){
        try{
            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_users_connection WHERE ((send_username=:send_username) OR (reci_username=:send_username )) AND status=:status AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':status'=>'true',
                    ':send_username'=>$this->send_username,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();

            if($row==0){
                $_SESSION['con_message'] = "You are not connected to anyone!";
            }else{
                    return $data;
                }
            }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function connectionInfo($data = ''){
        try{
            if(!empty($data)){
                $this->username=$data;
            }

            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_users_reg WHERE username=:username AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':username'=>$this->username,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();

            if($row==1){
                return $data[0];
            }else{
                if (isset($_SESSION['con_message'])) {
                    unset($_SESSION['con_message']);
                    $_SESSION['con_message'] = 'You are not connected to anyone!';
                } else {
                    $_SESSION['con_message'] = 'You are not connected to anyone!';
                }
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }




}