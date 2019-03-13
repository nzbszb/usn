<?php

/**
 * Created by PhpStorm.
 * User: HP
 * Date: 7/19/2018
 * Time: 6:28 AM
 */
class PaperJournal
{

    public $paper_journal_id="";
    public $paper_journal_username="";
    public $paper_journal_fullname="";
    public $paper_journal_title="";
    public $paper_journal_keywords="";
    public $paper_journal_details="";
    public $paper_journal_file="";
    public $paper_journal_access_type="";
    public $paper_journal_type="";
    public $pdo="";

    public function paperJournalSetData($data = '')
    {

        if(array_key_exists('usn_paper_journal_id',$data)){
            $this->paper_journal_id= $data['usn_paper_journal_id'];
        }
        if(array_key_exists('usn_paper_journal_username',$data)){
            $this->paper_journal_username= $data['usn_paper_journal_username'];
        }
        if(array_key_exists('usn_paper_journal_title',$data)){
            $this->paper_journal_title= $data['usn_paper_journal_title'];
        }
        if(array_key_exists('usn_paper_journal_keywords',$data)){
            $this->paper_journal_keywords= $data['usn_paper_journal_keywords'];
        }
        if(array_key_exists('usn_paper_journal_details',$data)){
            $this->paper_journal_details= $data['usn_paper_journal_details'];
        }
        if(array_key_exists('usn_paper_journal_file',$data)){
            $this->paper_journal_file= $data['usn_paper_journal_file'];
        }
        if(array_key_exists('usn_paper_journal_access_type',$data)){
            $this->paper_journal_access_type= $data['usn_paper_journal_access_type'];
        }
        if(array_key_exists('usn_paper_journal_type',$data)){
            $this->paper_journal_type= $data['usn_paper_journal_type'];
        }
        return $this;


    }


    public function __construct($pdo){
//        $this->pdo =new PDO('mysql:host=localhost;dbname=id1576551_usn','id1576551_root','nazib123');
//        $this->pdo = new PDO('mysql:host=localhost;dbname=usn','root','nazib123');
        $this->pdo = $pdo;

    }


    public function paperJournalInfoStore()
    {
        try {
//            print_r($this);
//            die();
            $pdo = $this->pdo;
            $query = "INSERT INTO `usn_paper_journal_post`(`paper_journal_id`, `username`, `paper_journal_title`, `paper_journal_details`, `paper_journal_file`, `paper_journal_keywords`, `paper_journal_type`, `access_type`, `paper_journal_utc_time`) VALUES (:paper_journal_id, :username, :paper_journal_title, :paper_journal_details, :paper_journal_file, :paper_journal_keywords, :paper_journal_type, :access_type, :paper_journal_utc_time)";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array
                (
                    ':paper_journal_id' => $this->paper_journal_id,
                    ':username' => $this->paper_journal_username,
                    ':paper_journal_title' => $this->paper_journal_title,
                    ':paper_journal_details' => $this->paper_journal_details,
                    ':paper_journal_file' => $this->paper_journal_file,
                    ':paper_journal_keywords' => $this->paper_journal_keywords,
                    ':paper_journal_type' => $this->paper_journal_type,
                    ':access_type' => $this->paper_journal_access_type,
                    ':paper_journal_utc_time' => gmdate('Y-m-d\TH:i:s\Z'),

                ));

//            print_r($this);
//            die();

            if($stmt){
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "You have posted successfully";
                    header('location:../paper&journal/');
                } else {
                    $_SESSION['message'] = "You have posted successfully";
                    header('location:../paper&journal/');
                }
            }
            else{
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../paper&journal/');
                } else {
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../paper&journal/');
                }
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    public function viewPapers(){
        try{
            $pdo = $this->pdo;
            $query = "SELECT * FROM `usn_paper_journal_post` WHERE `paper_journal_type`='paper' AND `deleted_at`='0000-00-00 00:00:00' ORDER BY paper_journal_utc_time DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();

            foreach ($data as $id => $d){
                if(!empty($d['paper_journal_file'])){
                    $data_name = explode(":", $d['paper_journal_file']);
                    if (!empty($data_name[1])) {
                        if (file_exists("../../../paper&journal/file/" . $data_name[1]) != 1) {
                            $data[$id]['paper_journal_file'] = "broken_image_link.png";
                        }
                    }else{
                        if (file_exists("../../../paper&journal/file/" . $data_name[0]) != 1) {
                            $data[$id]['paper_journal_file'] = "broken_image_link.png";
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


    public function viewJournals(){
        try{
            $pdo = $this->pdo;
            $query = "SELECT * FROM `usn_paper_journal_post` WHERE `paper_journal_type`='journal' AND `deleted_at`='0000-00-00 00:00:00' ORDER BY paper_journal_utc_time DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();

            foreach ($data as $id => $d){
                if(!empty($d['paper_journal_file'])){
                    $data_name = explode(":", $d['paper_journal_file']);
                    if (!empty($data_name[1])) {
                        if (file_exists("../../../paper&journal/file/" . $data_name[1]) != 1) {
                            $data[$id]['paper_journal_file'] = "broken_image_link.png";
                        }
                    }else{
                        if (file_exists("../../../paper&journal/file/" . $data_name[0]) != 1) {
                            $data[$id]['paper_journal_file'] = "broken_image_link.png";
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

    public function deletePaper($data = ''){
        try{
//            echo json_encode($_POST);
//            die();
            $paper_journal_id = $_POST['paper_journal_id'];
            $del_username = $_POST['del_username'];

            $pdo = $this->pdo;
            $query = "SELECT * FROM `usn_paper_journal_post` WHERE `paper_journal_id`=:paper_journal_id AND `username`=:username AND `paper_journal_type`=:paper_journal_type AND `deleted_at`='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':username'=>$del_username,
                    ':paper_journal_id'=>$paper_journal_id,
                    ':paper_journal_type'=>'paper',
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();
//            echo json_encode($data);
//            die();
            if($row==1){
                if(!empty($data[0]['paper_journal_file'])){
                    if(!empty(explode(":",$data[0]['paper_journal_file'])[1])){
                        $file = explode(":",$data[0]['paper_journal_file'])[1];
                    }else{
                        $file =  explode(":",$data[0]['paper_journal_file'])[0];
                    }
                    if (file_exists('../../../paper&journal/file/' . $file)) {
                        unlink('../../../paper&journal/file/' . $file);
                    }
                }

                $query1 = "DELETE FROM `usn_paper_journal_post` WHERE `paper_journal_id`=:paper_journal_id AND `username`=:username AND `paper_journal_type`=:paper_journal_type AND `deleted_at`='0000-00-00 00:00:00'";
                $stmt1 = $pdo->prepare($query1);
                $stmt1->execute(
                    array(
                        ':username'=>$del_username,
                        ':paper_journal_id'=>$paper_journal_id,
                        ':paper_journal_type'=>'paper',
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


    public function deleteJournal($data = ''){
        try{
//            echo json_encode($_POST);
//            die();
            $paper_journal_id = $_POST['paper_journal_id'];
            $del_username = $_POST['del_username'];

            $pdo = $this->pdo;
            $query = "SELECT * FROM `usn_paper_journal_post` WHERE `paper_journal_id`=:paper_journal_id AND `username`=:username AND `paper_journal_type`=:paper_journal_type AND `deleted_at`='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':username'=>$del_username,
                    ':paper_journal_id'=>$paper_journal_id,
                    ':paper_journal_type'=>'journal',
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();
//            echo json_encode($data);
//            die();
            if($row==1){
                if(!empty($data[0]['paper_journal_file'])){
                    if(!empty(explode(":",$data[0]['paper_journal_file'])[1])){
                        $file = explode(":",$data[0]['paper_journal_file'])[1];
                    }else{
                        $file =  explode(":",$data[0]['paper_journal_file'])[0];
                    }
                    if (file_exists('../../../paper&journal/file/' . $file)) {
                        unlink('../../../paper&journal/file/' . $file);
                    }
                }

                $query1 = "DELETE FROM `usn_paper_journal_post` WHERE `paper_journal_id`=:paper_journal_id AND `username`=:username AND `paper_journal_type`=:paper_journal_type AND `deleted_at`='0000-00-00 00:00:00'";
                $stmt1 = $pdo->prepare($query1);
                $stmt1->execute(
                    array(
                        ':username'=>$del_username,
                        ':paper_journal_id'=>$paper_journal_id,
                        ':paper_journal_type'=>'journal',
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