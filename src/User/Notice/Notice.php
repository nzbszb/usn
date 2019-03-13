<?php

/**
 * Created by PhpStorm.
 * User: HP
 * Date: 7/19/2018
 * Time: 6:37 AM
 */
class Notice
{
    public $notice_id="";
    public $notice_username="";
    public $notice_fullname="";
    public $notice_title="";
    public $notice_details="";
    public $notice_photo="";
    public $notice_file="";
    public $notice_access_type="";
    public $pdo="";

    public function noticeSetData($data = '')
    {

        if(array_key_exists('usn_notice_id',$data)){
            $this->notice_id= $data['usn_notice_id'];
        }
        if(array_key_exists('usn_notice_username',$data)){
            $this->notice_username= $data['usn_notice_username'];
        }
        if(array_key_exists('usn_notice_title',$data)){
            $this->notice_title= $data['usn_notice_title'];
        }
        if(array_key_exists('usn_notice_details',$data)){
            $this->notice_details= $data['usn_notice_details'];
        }
        if(array_key_exists('usn_notice_photo',$data)){
            $this->notice_photo= $data['usn_notice_photo'];
        }
        if(array_key_exists('usn_notice_file',$data)){
            $this->notice_file= $data['usn_notice_file'];
        }
        if(array_key_exists('usn_access_type',$data)){
            $this->notice_access_type= $data['usn_access_type'];
        }
        return $this;


    }


    public function __construct($pdo){
//        $this->pdo =new PDO('mysql:host=localhost;dbname=id1576551_usn','id1576551_root','nazib123');
//        $this->pdo = new PDO('mysql:host=localhost;dbname=usn','root','nazib123');
        $this->pdo = $pdo;

    }


    public function noticeInfoStore()
    {
        try {
//            print_r($this);
//            die();
            $pdo = $this->pdo;
            $query = "INSERT INTO `usn_notice_post`(`notice_id`, `username`, `notice_title`, `notice_details`, `notice_photo`, `notice_file`, `access_type`, `notice_utc_time`) VALUES (:notice_id, :username, :notice_title, :notice_details, :notice_photo, :notice_file, :access_type, :notice_utc_time)";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array
                (
                    ':notice_id' => $this->notice_id,
                    ':username' => $this->notice_username,
                    ':notice_title' => $this->notice_title,
                    ':notice_details' => $this->notice_details,
                    ':notice_photo' => $this->notice_photo,
                    ':notice_file' => $this->notice_file,
                    ':access_type' => $this->notice_access_type,
                    ':notice_utc_time' => gmdate('Y-m-d\TH:i:s\Z'),

                ));

//            print_r($this);
//            die();

            if($stmt){
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "You have posted successfully";
                    header('location:../notice/');
                } else {
                    $_SESSION['message'] = "You have posted successfully";
                    header('location:../notice/');
                }
            }
            else{
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../notice/');
                } else {
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../notice/');
                }
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    public function viewNotice(){
        try{
            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_notice_post WHERE deleted_at='0000-00-00 00:00:00' ORDER BY notice_utc_time DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();

            foreach ($data as $id => $d){
                if(!empty($d['notice_photo'])) {
                    $data_name = explode(":", $d['notice_photo']);
                    if (!empty($data_name[1])) {
                        if (file_exists("../../../notice/image/" . $data_name[1]) != 1) {
                            $data[$id]['notice_photo'] = "broken_image_link.png";
                        }
                    }else {
                        if (file_exists("../../../notice/image/" . $data_name[0]) != 1) {
                            $data[$id]['notice_photo'] = "broken_image_link.png";
                        }
                    }
                }
                elseif(!empty($d['notice_file'])){
                    $data_name = explode(":", $d['notice_file']);
                    if (!empty($data_name[1])) {
                        if (file_exists("../../../notice/file/" . $data_name[1]) != 1) {
                            $data[$id]['notice_file'] = "broken_image_link.png";
                        }
                    }else{
                        if (file_exists("../../../notice/file/" . $data_name[0]) != 1) {
                            $data[$id]['notice_file'] = "broken_image_link.png";
                        }
                    }
                }
            }

            if($row!=0){
                return $data;
            }else{
                    return $data;
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
                    header('location:../notice/');
                } else {
                    $_SESSION['message'] = 'Sorry, there is some technical difficulty!';
                    header('location:../notice/');
                }
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }

    public function deleteNotice($data = ''){
        try{
//            echo json_encode($_POST);
//            die();
            $notice_id = $_POST['notice_id'];
            $del_username = $_POST['del_username'];

            $pdo = $this->pdo;
            $query = "SELECT * FROM `usn_notice_post` WHERE `notice_id`=:notice_id AND `username`=:username AND `deleted_at`='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':username'=>$del_username,
                    ':notice_id'=>$notice_id,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();
//            echo json_encode($data);
//            die();
            if($row==1){

                if(!empty($data[0]['notice_photo'])){
                    if(!empty(explode(":",$data[0]['notice_photo'])[1])){
                        $photo = explode(":",$data[0]['notice_photo'])[1];
                    }else{
                        $photo =  explode(":",$data[0]['notice_photo'])[0];
                    }
                    if (file_exists('../../../notice/image/' . $photo)) {
                        unlink('../../../notice/image/' . $photo);
                    }
                }
                if(!empty($data[0]['notice_file'])){
                    if(!empty(explode(":",$data[0]['notice_file'])[1])){
                        $file = explode(":",$data[0]['notice_file'])[1];
                    }else{
                        $file =  explode(":",$data[0]['notice_file'])[0];
                    }
                    if (file_exists('../../../notice/file/' . $file)) {
                        unlink('../../../notice/file/' . $file);
                    }
                }

                $query1 = "DELETE FROM `usn_notice_post` WHERE `notice_id`=:notice_id AND `username`=:username AND `deleted_at`='0000-00-00 00:00:00'";
                $stmt1 = $pdo->prepare($query1);
                $stmt1->execute(
                    array(
                        ':username'=>$del_username,
                        ':notice_id'=>$notice_id,
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