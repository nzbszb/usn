<?php

/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2/25/2018
 * Time: 1:57 AM
 */
class Profile
{
    public $search_data="";
    public $pdo="";

    public function profileSetData($data = '')
    {
        if(array_key_exists('usn_find_user',$data)){
            $this->search_data= $data['usn_find_user'];
        }
        return $this;

    }

    public function __construct($pdo){
//        $this->pdo =new PDO('mysql:host=localhost;dbname=id1576551_usn','id1576551_root','nazib123');
//        $this->pdo = new PDO('mysql:host=localhost;dbname=usn','root','nazib123');
        $this->pdo = $pdo;

    }

    public function searchData($data='')
    {
        $pdo = $this->pdo;
        $len = sizeof($data);
        $original_data = $_GET['usn_find_user'];
        $total_found = array();
        for ($i=0;$i<($len+1);$i++){
            $check = $data[$i-1];
            if($i==0) {
                $sql = "SELECT username,user_pic,first_name,last_name,skills,user_status FROM `usn_users_reg` WHERE (username LIKE '%$original_data%' OR first_name LIKE '%$original_data%'  OR last_name LIKE '%$original_data%'  OR var_id LIKE '%$original_data%' )";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }else{
                $sql = "SELECT username,user_pic,first_name,last_name,skills,user_status FROM `usn_users_reg` WHERE (username LIKE '%$check%' OR first_name LIKE '%$check%'  OR last_name LIKE '%$check%'  OR var_id LIKE '%$check%' )";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
            $seach_results = $stmt->fetchAll();
                $total_found = array_merge($total_found, $seach_results);
        }
        $total_found = array_map("unserialize", array_unique(array_map("serialize", $total_found)));
        if(sizeof($total_found)==0){
            $total_found['failed']= 0;
            return $total_found;
        }

        return $total_found;

    }


}