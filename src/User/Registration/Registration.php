<?php

/**
 * Created by PhpStorm.
 * User: HP
 * Date: 1/18/2018
 * Time: 5:06 AM
 */
class Registration
{
    public $log_id="";
    public $var_id="";
    public $demo_var_id="";
    public $title="";
    public $demo_title="";
    public $username="";
    public $password="";
    public $log_password="";
    public $new_password="";
    public $email="";
    public $demo_email="";
    public $mobile="";
    public $demo_mobile="";
    public $verification_code="";
    public $verified="";
    public $recovery_code="";
    public $recovery_status="";
    public $visibility="";
    public $is_active="";
    public $fname="";
    public $lname="";
    public $father_name="";
    public $mother_name="";
    public $sex="";
    public $marital_status="";
    public $birth_date="";
    public $user_status="";
    public $department="";
    public $blood_type="";
    public $skills="";
    public $user_pic="";
    public $pdo="";

    public function setData($data = '')
    {
        if(array_key_exists('usn_var_id',$data)){
            $this->var_id = $data['usn_var_id'];
        }
        if(array_key_exists('usn_title',$data)){
            $this->title = $data['usn_title'];
        }
        if(array_key_exists('usn_username',$data)){
            $this->username= $data['usn_username'];
        }
        if(array_key_exists('usn_password',$data)){
            $this->password = password_hash($data['usn_password'], PASSWORD_DEFAULT);
        }
        if(array_key_exists('usn_new_pass',$data)){
            $this->new_password = password_hash($data['usn_new_pass'], PASSWORD_DEFAULT);
        }
        if(array_key_exists('usn_log_password',$data)){
            $this->log_password = $data['usn_log_password'];
        }
        if(array_key_exists('usn_current_pass',$data)){
            $this->password = $data['usn_current_pass'];
        }
        if(array_key_exists('usn_email',$data)){
            $this->email = $data['usn_email'];
        }
        if(array_key_exists('usn_mobile',$data)){
            $this->mobile = substr(preg_replace("/[^0-9]/", "", $data['usn_mobile']), -11);
        }
        if(array_key_exists('usn_code',$data)){
            $this->verification_code = $data['usn_code'];
        }
        if(array_key_exists('usn_recovery_code',$data)){
            $this->recovery_code = $data['usn_recovery_code'];
        }
        if(array_key_exists('usn_fname',$data)){
            $this->fname = $data['usn_fname'];
        }
        if(array_key_exists('usn_lname',$data)){
            $this->lname = $data['usn_lname'];
        }
        if(array_key_exists('usn_first_name',$data)){
            $this->fname = $data['usn_first_name'];
        }
        if(array_key_exists('usn_last_name',$data)){
            $this->lname = $data['usn_last_name'];
        }
        if(array_key_exists('usn_father_name',$data)){
            $this->father_name = $data['usn_father_name'];
        }
        if(array_key_exists('usn_mother_name',$data)){
            $this->mother_name = $data['usn_mother_name'];
        }
        if(array_key_exists('usn_sex',$data)){
            $this->sex = $data['usn_sex'];
        }
        if(array_key_exists('usn_marital_status',$data)){
            $this->marital_status = $data['usn_marital_status'];
        }
        if(array_key_exists('usn_birth_date',$data)){
            $this->birth_date = $data['usn_birth_date'];
        }
        if(array_key_exists('usn_user_status',$data)){
            $this->user_status = $data['usn_user_status'];
        }
        if(array_key_exists('usn_department',$data)){
            $this->department = $data['usn_department'];
        }
        if(array_key_exists('usn_blood_type',$data)){
            $this->blood_type = $data['usn_blood_type'];
        }
        if(array_key_exists('usn_skills',$data)){
            $this->skills = $data['usn_skills'];
        }
        if(array_key_exists('usn_visibility',$data)){
            $this->visibility = $data['usn_visibility'];
        }
        if(array_key_exists('usn_user_pic',$data)) {
            $this->user_pic = $data['usn_user_pic'];
        }
        return $this;


    }


    public function infoSetData($data = '')
    {

        if(array_key_exists('usn_var_id',$data)){
            $this->var_id = $data['usn_var_id'];
        }
        if(array_key_exists('usn_fname',$data)){
            $this->fname = $data['usn_fname'];
        }
        if(array_key_exists('usn_lname',$data)){
            $this->lname = $data['usn_lname'];
        }
        if(array_key_exists('usn_father_name',$data)){
            $this->father_name = $data['usn_father_name'];
        }
        if(array_key_exists('usn_mother_name',$data)){
            $this->mother_name = $data['usn_mother_name'];
        }
        if(array_key_exists('usn_sex',$data)){
            $this->sex = $data['usn_sex'];
        }
        if(array_key_exists('usn_marital_status',$data)){
            $this->marital_status = $data['usn_marital_status'];
        }
        if(array_key_exists('usn_user_status',$data)){
            $this->user_status = $data['usn_user_status'];
        }
        if(array_key_exists('usn_department',$data)){
            $this->department = $data['usn_department'];
        }
        if(array_key_exists('usn_blood_type',$data)){
            $this->blood_type = $data['usn_blood_type'];
        }
        if(array_key_exists('usn_skills',$data)){
            $this->skills = $data['usn_skills'];
        }
        if(array_key_exists('usn_visibility',$data)){
            $this->visibility = $data['usn_visibility'];
        }
        if(array_key_exists('usn_user_pic',$data)) {
            $this->user_pic = $data['usn_user_pic'];
        }
        return $this;

    }

    public function __construct($pdo){
//        $this->pdo =new PDO('mysql:host=localhost;dbname=id1576551_usn','id1576551_root','nazib123');
//        $this->pdo = new PDO('mysql:host=localhost;dbname=usn','root','nazib123');
        $this->pdo = $pdo;

    }

        public function regCheck()
    {
                 $email = $this->email;
                 $var_id = $this->var_id;
                $connection = mysqli_connect("localhost", "root", "nazib123");
                $email = stripslashes($email);
                $var_id = stripslashes($var_id);
                $email = mysqli_real_escape_string($connection, $email);
                $var_id = mysqli_real_escape_string($connection, $var_id);
                mysqli_select_db($connection,"usn");
                $query = mysqli_query($connection, "select * from usn_users_login where email='$email' AND var_id='$var_id'");
                $rows = mysqli_num_rows($query);
                if ($rows == 1) {
                    if (isset($_SESSION['message'])) {
                        unset($_SESSION['message']);
                        $_SESSION['message'] = "This Email and ID is already in use!";
                        header("location: ../../");
                    } else {
                        $_SESSION['message'] = "This Email and ID is already in use!";
                        header("location: ../../");
                    }
                    } else {
                    return $this;
                }
                mysqli_close($connection);


    }


    public function demoRegCheck()
    {
        try {
            $demo_var_id = 'demo_var_id';
            $demo_title = 'demo_title';
            $demo_email = 'demo_email';
            $demo_mobile = 'demo_mobile';
            $pdo = $this->pdo;
            if($this->user_status == 'Student') {
                $query = "SELECT * FROM `demo_database_student` WHERE $demo_var_id = '$this->var_id'";
            }
            elseif($this->user_status == 'Teacher') {
                $query = "SELECT * FROM `demo_database_teacher` WHERE $demo_var_id = '$this->var_id'";
            }
            elseif($this->user_status == 'Administration') {
                $query = "SELECT * FROM `demo_database_admin` WHERE $demo_var_id = '$this->var_id'";
            }
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $row=$stmt->rowCount();
            if(array_key_exists($demo_var_id,$data[0])){
                $this->demo_var_id = $data[0][$demo_var_id];
            }
            if(array_key_exists($demo_title,$data[0])){
                $this->demo_title = $data[0][$demo_title];
            }
            if(array_key_exists($demo_email,$data[0])){
                $this->demo_email = $data[0][$demo_email];
            }
            if(array_key_exists($demo_mobile,$data[0])){
                $this->demo_mobile =substr(preg_replace("/[^0-9]/", "", $data[0][$demo_mobile]), -11);
            }
            if($row == 0){
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "This ID is not valid!";
                    header("location:../registration");
                } else {
                    $_SESSION['message'] = "This ID is not valid!";
                    header("location:../registration");
                }
            }else{

                if(($this->demo_email==$this->email) || ($this->demo_mobile==$this->mobile)){
                    $query = "SELECT * FROM `usn_users_login` WHERE (var_id = '$this->var_id' OR username = '$this->username') AND deleted_at='0000-00-00 00:00:00'";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    $row = $stmt->rowCount();
                    if ($row != 0) {
                        if (isset($_SESSION['message'])) {
                            unset($_SESSION['message']);
                            $_SESSION['message'] = "This Email or ID or Mobile or Username is already in use!";
                            header("location:../registration");
                        } else {
                            $_SESSION['message'] = "This Email or ID or Mobile or Username is already in use!";
                            header("location:../registration");
                        }
                    } else {
                        $this->genVerification();
                    }
                }else {
                    if (isset($_SESSION['message'])) {
                        unset($_SESSION['message']);
                        $_SESSION['message'] = "This ID does not match valid info!";
                        header("location:../registration");
                    } else {
                        $_SESSION['message'] = "This ID does not match valid info!";
                        header("location:../registration");
                    }
                }
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function genVerification()
    {
//        print_r($this);
//            die();
        $verification_code = rand(100000,999999);
        $to = $this->email;
        $subject = "Your USN Registration Verification Code";

        $header = "From:info.usn \r\n";
//        $header .= "Cc:nazibsazib2@gmail.com \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail ($to,$subject,"<h2>Welcome to USN.</h2><br>Thank you for signing up. Your verification code is - <strong>".$this->username.$verification_code."</strong>",$header);

        if($retval == true)
        {
            $this->verification_code = $this->username.$verification_code;
            $this->verified = 0;
            $this->is_active = 0;

            $this->regStore();
        }
        else{
            if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
                $_SESSION['message'] = "Message could not be sent...<br>Try again";
                header('location:../registration');
            } else {
                $_SESSION['message'] = "Message could not be sent...<br>Try again";
                header('location:../registration');
            }

        }

    }

    public function regStore()
    {
        try {

            $pdo = $this->pdo;
                $query = "INSERT INTO `usn_users_reg` (`usn_id`, `var_id`, `username`, `user_pic`, `email`, `mobile`, `user_status`, `visibility`=:visibility, `is_active`) VALUES (:usn_id, :var_id, :username, :user_pic, :email, :mobile, :user_status, is_active);
                      INSERT INTO `usn_users_login` (`log_id`, `var_id`, `username`, `email`, `password`, `mobile`, `is_active`, `verified`) VALUES (:log_id, :var_id, :username, :email, :password, :mobile, :is_active, :verified);
                      INSERT INTO `usn_reg_verify` (`id`, `var_id`, `username`, `email`, `verification_code`, `verified`) VALUES (:id, :var_id, :username, :email, :verification_code, :verified)";
                $stmt = $pdo->prepare($query);
                $stmt->execute(
                    array
                    (
                        ':id' => null,
                        ':usn_id' => null,
                        ':log_id' => null,
                        ':var_id' => $this->var_id,
                        ':email' => $this->email,
                        ':verification_code' => $this->verification_code,
                        ':verified' => $this->verified,
                        ':username' => $this->username,
                        ':user_pic' => 'placeholder.jpg',
                        ':mobile' => $this->mobile,
                        ':user_status' => $this->user_status,
                        ':is_active' => $this->is_active,
                        ':password' => $this->password,
                        ':visibility' => 'true_all',

                    ));

//            print_r($this);
//            die();

                if ($stmt) {
                    $_SESSION['var_id'] = $this->var_id;
                    $_SESSION['username'] = $this->username;
                    if (isset($_SESSION['message'])) {
                        unset($_SESSION['message']);
                        $_SESSION['message'] = "We have sent you a validation number to your email";
                        header('location:validation');
                    } else {
                        $_SESSION['message'] = "We have sent you a validation number to your email";
                        header('location:validation');
                    }
                } else {
                    if (isset($_SESSION['message'])) {
                        unset($_SESSION['message']);
                        $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                        header('location:../registration');
                    } else {
                        $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                        header('location:../registration');
                    }
                }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }



    public function infoStore()
    {
        try {
//            print_r($this);
//            die();
            $pdo = $this->pdo;
            if(empty($this->user_pic)){
                $this->user_pic = 'placeholder.jpg';
            }
            $query ="UPDATE `usn_users_reg` SET `user_pic`=:user_pic,`first_name`=:first_name,`last_name`=:last_name,`father_name`=:father_name,`mother_name`=:mother_name,`sex`=:sex,`marital_status`=:marital_status,`birth_date`=:birth_date,`department`=:department,`skills`=:skills,`blood_type`=:blood_type,`visibility`=:visibility WHERE `var_id`=:var_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array
                (
                    ':var_id'=>$this->var_id,
                    ':user_pic'=>$this->user_pic,
                    ':first_name'=>$this->fname,
                    ':last_name'=>$this->lname,
                    ':father_name'=>$this->father_name,
                    ':mother_name'=>$this->mother_name,
                    ':sex'=>$this->sex,
                    ':marital_status'=>$this->marital_status,
                    ':birth_date'=>$this->birth_date,
                    ':department'=>$this->department,
                    ':skills'=>$this->skills,
                    ':blood_type'=>$this->blood_type,
                    ':visibility'=>$this->visibility,

                ));
//            $state = $stmt->rowCount();
//            print_r($state);
//            die();

            if($stmt){
                unset($_SESSION['var_id']);
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "You have successfully completed your registration";
                    header('location:../../../');
                } else {
                    $_SESSION['message'] = "You have successfully completed your registration";
                    header('location:../../../');
                }
            }
            else{
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../registration');
                } else {
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../registration');
                }
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    public function validate()
    {
        try{
            $pdo = $this->pdo;
            $query = "SELECT var_id, username, verified FROM usn_reg_verify WHERE verification_code=:verification_code";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':verification_code'=>$this->verification_code,
                )
            );
            $data = $stmt->fetchAll();
//            print_r($data);
//            die();
            if (!empty($data)){
                $this->var_id = $data[0]['var_id'];
                $this->username = $data[0]['username'];
                if($data[0]['verified']==0){
                $query = "UPDATE usn_users_login SET verified=:verified WHERE var_id=:var_id AND username=:username AND verified=0;
                          UPDATE usn_reg_verify SET verified=:verified WHERE var_id=:var_id AND username=:username AND verified=0;";
                $stmt = $pdo->prepare($query);
                $stmt = $stmt->execute(
                    array(
                        ':var_id'=>$this->var_id,
                        ':username'=>$this->username,
                        ':verified'=> 1,
                    )
                );
                    if($stmt==true) {
                        $_SESSION['var_id'] = $this->var_id;
                        $_SESSION['username'] = $this->username;
                        header('location:../final_step');
                    }
                }

                else{
                    if (isset($_SESSION['message'])) {
                        unset($_SESSION['message']);
                        $_SESSION['message'] = 'Your account is already verified.';
                        header('Location:../../../');
                    } else {
                        $_SESSION['message'] = 'Your account is already verified.';
                        header('Location:../../../');
                    }
                }
            }
            else{
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = 'Your verification code is invalid.';
                    header('Location:../validation');
                } else {
                    $_SESSION['message'] = 'Your verification code is invalid.';
                    header('Location:../validation');
                }
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }

    }

    public function login(){
        try{
            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_users_login WHERE (var_id=:var_id OR username=:username OR email=:email) AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':var_id'=>$this->title,
                    ':username'=>$this->title,
                    ':email'=>$this->title,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();

            if($row==1){
                if(password_verify($this->log_password,$data[0]['password'])) {
                    if ($data[0]['verified'] == 1) {
                        $var_id = $data[0]['var_id'];
                        $pdo = $this->pdo;
                        $query = "UPDATE usn_users_login SET is_active=1 WHERE var_id='$var_id';
                                  UPDATE usn_users_reg SET is_active=1 WHERE var_id='$var_id'";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute();
//                        $_SESSION['login_log_id'] = $data[0]['log_id'];
                        $_SESSION['usn_var_id'] = $data[0]['var_id'];
                        $_SESSION['usn_username'] = $data[0]['username'];
                        $_SESSION['usn_email'] = $data[0]['email'];
                        $_SESSION['usn_mobile'] = $data[0]['mobile'];
                        header('location:../../views/user/home');
                    } else {
                        if (isset($_SESSION['message'])) {
                            unset($_SESSION['message']);
                            $_SESSION['message'] = 'Your account is not verified yet!';
                            header('location:../../');
                        } else {
                            $_SESSION['message'] = 'Your account is not verified yet!';
                            header('location:../../');
                        }
                    }
                }else {
                    if (isset($_SESSION['message'])) {
                        unset($_SESSION['message']);
                        $_SESSION['message'] = 'Username/Email/ID or Password is incorrect!';
                        header('location:../../');
                    } else {
                        $_SESSION['message'] = 'Username/Email/ID or Password is incorrect!';
                        header('location:../../');
                    }
                }


            }else{
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = 'Username/Email/ID or Password is incorrect!';
                    header('location:../../');
                } else {
                    $_SESSION['message'] = 'Username/Email/ID or Password is incorrect!';
                    header('location:../../');
                }
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }

    public function profile(){
        try{
            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_users_reg WHERE var_id=:var_id AND username=:username AND email=:email AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':var_id'=>$this->var_id,
                    ':username'=>$this->username,
                    ':email'=>$this->email,
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

    public function account($data = ''){
        try{

            if(!empty($_GET['user'])){
                $this->username=$_GET['user'];
            }
            elseif(!empty($data['user'])){
                $this->username=$data['user'];
            }else{
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
//            $row = $stmt->rowCount();
            if($stmt){
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



    public function accountRqst($data = ''){
        try{
//            print_r($data);
//            die();

            if(!empty($data)) {
                $this->username = $data;


                $pdo = $this->pdo;
                $query = "SELECT * FROM usn_users_reg WHERE username=:username AND deleted_at='0000-00-00 00:00:00'";
                $stmt = $pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':username' => $this->username,
                    )
                );
                $data = $stmt->fetchAll();
//            $row = $stmt->rowCount();
                if ($stmt) {
                    return $data;
                } else {
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
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }


    public function user_info(){
        try{
//            print_r($_SESSION['usn_username']);
//            die();
            $username =$_SESSION['usn_username'];
            $pdo = $this->pdo;
            $query = "SELECT user_pic,username,first_name,last_name, user_status,skills,is_active FROM usn_users_reg WHERE `username` NOT IN (SELECT r.username FROM `usn_users_reg` AS r, `usn_users_connection` AS c WHERE (c.send_username = '$username' AND c.reci_username=r.username AND c.status='true') OR (c.send_username = r.username AND c.reci_username= '$username' AND c.status='true') OR r.username = '$username') ORDER BY usn_id DESC LIMIT 10";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
//            $row = $stmt->rowCount();
            if($stmt){
//                print_r($data);
//                die();
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



    public function userNotConInfo(){
        try{
//            print_r($_SESSION['usn_username']);
//            die();
            $username =$_SESSION['usn_username'];
            $pdo = $this->pdo;
            $query = "SELECT user_pic,username,first_name,last_name, user_status,skills,is_active FROM usn_users_reg WHERE `username` NOT IN (SELECT r.username FROM `usn_users_reg` AS r, `usn_users_connection` AS c WHERE (c.send_username = '$username' AND c.reci_username=r.username) OR (c.send_username = r.username AND c.reci_username= '$username') OR r.username = '$username') ORDER BY RAND() LIMIT 10";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();
//            $data['row'] = $row;
//            print_r($data);
//            die();
            if($stmt){
//                $_SESSION['not_con_row'] = $row;
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



    public function session()
    {
        $connection = mysqli_connect("localhost", "root", "nazib123");
        $db = mysqli_select_db($connection, "usn");
        $user_check=$_SESSION['login_user'];
        $ses_sql=mysqli_query($connection, "select var_id,username,email from usn_users_login where var_id='$user_check' OR username='$user_check' OR email='$user_check' OR is_active=1");
        $row = mysqli_fetch_assoc($ses_sql);
        $login_session =$row['email'];
        if(!isset($login_session)){
            mysqli_close($connection);
            header('Location: ../../../views/user/home/');
        }
        return $login_session;
    }



    public function recoveryRegCheck()
    {
        try {
            $pdo = $this->pdo;
            $query = "SELECT * FROM `usn_users_login` WHERE var_id = '$this->var_id' AND email = '$this->email' AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $row=$stmt->rowCount();
            if($row == 0){
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "This ID has not signed up yet!";
                    header("location:../login_password_recover");
                } else {
                    $_SESSION['message'] = "This ID has not signed up yet!";
                    header("location:../login_password_recover");
                }
            }else{
                $this->username=$data[0]['username'];
//                print_r($this);
//                die();
                $this->genRecoveryCode();
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function genRecoveryCode()
    {
//        print_r($this);
//            die();
        $verification_code = rand(100000,999999);
        $to = $this->email;
        $subject = "Your USN Registration Verification Code";

        $header = "From:info.usn \r\n";
//        $header .= "Cc:nazibsazib2@gmail.com \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail ($to,$subject,"<h2>Welcome to USN.</h2><br>Your Recovery Code is - <strong>".$this->username.$verification_code."</strong>",$header);

        if($retval == true)
        {
            $this->recovery_code = $this->username.$verification_code;
            $this->recovery_status = 0;

            $this->recoveryCodeStore();
        }
        else{
            if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
                $_SESSION['message'] = "Message could not be sent...<br>Try again";
                header('location:../login_password_recover');
            } else {
                $_SESSION['message'] = "Message could not be sent...<br>Try again";
                header('location:../login_password_recover');
            }

        }

    }

    public function recoveryCodeStore()
    {
        try {

            $pdo = $this->pdo;
            $query = "INSERT INTO `usn_password_recovery`(`id`, `var_id`, `username`, `email`, `recovery_code`, `recovery_status`) VALUES (:id, :var_id, :username, :email, :recovery_code, :recovery_status)";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array
                (
                    ':id' => null,
                    ':var_id' => $this->var_id,
                    ':username' => $this->username,
                    ':email' => $this->email,
                    ':recovery_code' => $this->recovery_code,
                    ':recovery_status' => $this->recovery_status,

                ));

//            print_r($this);
//            die();

            if ($stmt) {
                $_SESSION['var_id'] = $this->var_id;
                $_SESSION['username'] = $this->username;
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "We have sent you a recovery code to your email";
                    header('location:reset_password');
                } else {
                    $_SESSION['message'] = "We have sent you a recovery code to your email";
                    header('location:reset_password');
                }
            } else {
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../login_password_recover');
                } else {
                    $_SESSION['message'] = "Oh no! Something went wrong<br>Try Again.";
                    header('location:../login_password_recover');
                }
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    public function resetPass()
    {
        try{
            $pdo = $this->pdo;
            $query = "SELECT var_id, username, recovery_status FROM usn_password_recovery WHERE recovery_code=:recovery_code";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':recovery_code'=>$this->recovery_code,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();

            if (!empty($data) && $row==1){
                $this->var_id = $data[0]['var_id'];
                $this->username = $data[0]['username'];
                $this->recovery_status = $data[0]['recovery_status'];
//                print_r($this);
//                die();
                if($this->recovery_status==0){
//                    print_r($this);
//                die();
                    $query = "UPDATE usn_users_login SET password=:password AND verified=:verified WHERE var_id=:var_id AND username=:username AND deleted_at='0000-00-00 00:00:00';
                          UPDATE usn_password_recovery SET recovery_status=:recovery_status WHERE var_id=:var_id AND username=:username AND recovery_status=0 AND recovery_code=:recovery_code AND deleted_at='0000-00-00 00:00:00';";
                    $stmt = $pdo->prepare($query);
                    $stmt = $stmt->execute(
                        array(
                            ':var_id'=>$this->var_id,
                            ':username'=>$this->username,
                            ':password'=>$this->password,
                            ':verified'=>1,
                            ':recovery_status'=> 1,
                            ':recovery_code'=>$this->recovery_code,
                        )
                    );
                    if($stmt==true) {
                        if (isset($_SESSION['message'])) {
                            unset($_SESSION['message']);
                            $_SESSION['message'] = 'Your password is successfully changed.';
                            header('Location:../reset_password');
                        } else {
                            $_SESSION['message'] = 'Your password is successfully changed.';
                            header('Location:../reset_password');
                        }
                    }
                }

                else{
                    if (isset($_SESSION['message'])) {
                        unset($_SESSION['message']);
                        $_SESSION['message'] = 'This recovery code is already used.';
                        header('Location:../reset_password');
                    } else {
                        $_SESSION['message'] = 'This recovery code is already used.';
                        header('Location:../reset_password');
                    }
                }
            }
            else{
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = 'Your recovery code is invalid.';
                    header('Location:../reset_password');
                } else {
                    $_SESSION['message'] = 'Your recovery code is invalid.';
                    header('Location:../reset_password');
                }
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }

    }

    public function updateInfoStore($data='')
    {
        try{
            $pdo = $this->pdo;
//            echo json_encode($_FILES['usn_user_pic']);
//            die();
            if(!empty($this->user_pic)){
                $imgvalidextensions = array("jpeg", "jpg", "png", "gif");
                $imgname = time() . "_" . sha1($_POST['usn_username']);
                $imgext = explode('.', basename($_FILES['usn_user_pic']['name']));
                $img_file_extension = end($imgext);
                $img_name = $imgname . "." . $img_file_extension;

                if ($_FILES['usn_user_pic']['error'] == 0) {
                    if ($_FILES['usn_user_pic']['size'] <= 2097152) {
                        if (in_array($img_file_extension, $imgvalidextensions)) {

                            $query1 = "SELECT user_pic FROM usn_users_reg WHERE `var_id`=:var_id AND `username`=:username";
                            $stmt1 = $pdo->prepare($query1);
                            $stmt1->execute(
                                array(
                                    ':var_id' => $this->var_id,
                                    ':username' => $this->username,
                                )
                            );
                            $data1 = $stmt1->fetchAll();
//                    echo json_encode($data1[0]['user_pic']);
//                    die();
                            if ($data1[0]['user_pic'] == 'placeholder.jpg') {
                                move_uploaded_file($_FILES['usn_user_pic']['tmp_name'], "../../../../img/" . $img_name);
                                $this->user_pic = $img_name;
                                $query2 = "UPDATE `usn_users_reg` SET `user_pic`=:user_pic,`first_name`=:first_name,`last_name`=:last_name,`father_name`=:father_name,`mother_name`=:mother_name,`sex`=:sex,`marital_status`=:marital_status,`birth_date`=:birth_date,`department`=:department,`skills`=:skills,`blood_type`=:blood_type WHERE `var_id`=:var_id AND `username`=:username";
                                $stmt2 = $pdo->prepare($query2);
                                $stmt2->execute(
                                    array
                                    (
                                        ':var_id' => $this->var_id,
                                        ':username' => $this->username,
                                        ':user_pic' => $this->user_pic,
                                        ':first_name' => $this->fname,
                                        ':last_name' => $this->lname,
                                        ':father_name' => $this->father_name,
                                        ':mother_name' => $this->mother_name,
                                        ':sex' => $this->sex,
                                        ':marital_status' => $this->marital_status,
                                        ':birth_date' => $this->birth_date,
                                        ':department' => $this->department,
                                        ':skills' => $this->skills,
                                        ':blood_type' => $this->blood_type,

                                    ));
                                if ($stmt2) {
                                    $message['success'] = 'Profile Updated Successfully';
                                } else {
                                    $message['failure'] = 'Something went wrong!';
                                }

                            } else {
//                        echo json_encode($_FILES);
//                        die();
                                if (file_exists('../../../../img/' . $data1[0]['user_pic'])) {
                                    unlink('../../../../img/' . $data1[0]['user_pic']);
                                }
                                move_uploaded_file($_FILES['usn_user_pic']['tmp_name'], "../../../../img/" . $img_name);
                                $this->user_pic = $img_name;
                                $query2 = "UPDATE `usn_users_reg` SET `user_pic`=:user_pic,`first_name`=:first_name,`last_name`=:last_name,`father_name`=:father_name,`mother_name`=:mother_name,`sex`=:sex,`marital_status`=:marital_status,`birth_date`=:birth_date,`department`=:department,`skills`=:skills,`blood_type`=:blood_type WHERE `var_id`=:var_id AND `username`=:username";
                                $stmt2 = $pdo->prepare($query2);
                                $stmt2->execute(
                                    array
                                    (
                                        ':var_id' => $this->var_id,
                                        ':username' => $this->username,
                                        ':user_pic' => $this->user_pic,
                                        ':first_name' => $this->fname,
                                        ':last_name' => $this->lname,
                                        ':father_name' => $this->father_name,
                                        ':mother_name' => $this->mother_name,
                                        ':sex' => $this->sex,
                                        ':marital_status' => $this->marital_status,
                                        ':birth_date' => $this->birth_date,
                                        ':department' => $this->department,
                                        ':skills' => $this->skills,
                                        ':blood_type' => $this->blood_type,

                                    ));
                                if ($stmt2) {
                                    $message['success'] = 'Profile Updated Successfully';
                                    echo json_encode($message);
                                    die();
                                } else {
                                    $message['failure'] = 'Something went wrong!';
                                    echo json_encode($message);
                                    die();
                                }
                            }

                        } else {
                            $message['failure'] = 'It is not a image file!';
                            echo json_encode($message);
                            die();
                        }
                    } else {
                        $message['failure'] = 'File size is more than 2MB!';
                        echo json_encode($message);
                        die();
                    }
                }else {
                    $message['failure'] = 'Something is wrong with the file size!';
                    echo json_encode($message);
                    die();
                }
            }else{
                $query2 ="UPDATE `usn_users_reg` SET `first_name`=:first_name,`last_name`=:last_name,`father_name`=:father_name,`mother_name`=:mother_name,`sex`=:sex,`marital_status`=:marital_status,`birth_date`=:birth_date,`department`=:department,`skills`=:skills,`blood_type`=:blood_type WHERE `var_id`=:var_id AND `username`=:username";
                $stmt2 = $pdo->prepare($query2);
                $stmt2->execute(
                    array
                    (
                        ':var_id'=>$this->var_id,
                        ':username'=>$this->username,
                        ':first_name'=>$this->fname,
                        ':last_name'=>$this->lname,
                        ':father_name'=>$this->father_name,
                        ':mother_name'=>$this->mother_name,
                        ':sex'=>$this->sex,
                        ':marital_status'=>$this->marital_status,
                        ':birth_date'=>$this->birth_date,
                        ':department'=>$this->department,
                        ':skills'=>$this->skills,
                        ':blood_type'=>$this->blood_type,

                    ));
                if($stmt2){
                        $message['success'] = 'Profile Updated Successfully';
                    echo json_encode($message);
                    die();
                }else{
                    $message['failure'] = 'Something went wrong!';
                    echo json_encode($message);
                    die();
                }

            }

        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }

    }


    public function updatePassStore(){
        try{
//            echo json_encode($this);
//            die();
            $pdo = $this->pdo;
            $query = "SELECT * FROM usn_users_login WHERE (var_id=:var_id AND username=:username) AND deleted_at='0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute(
                array(
                    ':var_id'=>$this->var_id,
                    ':username'=>$this->username,
                )
            );
            $data = $stmt->fetchAll();
            $row = $stmt->rowCount();
            if($row!=0) {
                if ((!empty($_POST['usn_current_pass']) && !empty($_POST['usn_new_pass'])) || (!empty($_POST['usn_current_pass'])  && !empty($_POST['usn_rep_new_pass']))) {
                    if ((strlen($_POST['usn_new_pass'])>7) && (strlen($_POST['usn_rep_new_pass'])>7)) {
                        if ($_POST['usn_new_pass'] == $_POST['usn_rep_new_pass']) {
                            if ($_POST['usn_current_pass'] != $_POST['usn_new_pass']) {
                if (password_verify($this->password, $data[0]['password'])) {
                    $query1 = "UPDATE `usn_users_login` SET `password`=:password WHERE (var_id=:var_id AND username=:username);
                               UPDATE `usn_users_reg` SET `visibility`=:visibility WHERE (var_id=:var_id AND username=:username)";
                    $stmt1 = $pdo->prepare($query1);
                    $stmt1->execute(
                        array(
                            ':var_id' => $this->var_id,
                            ':username' => $this->username,
                            ':password' => $this->new_password,
                            ':visibility' => $this->visibility,
                        )
                    );
                    if ($stmt1 == true) {
                        $message['success'] = 'Account updated successfully';
                        echo json_encode($message);
                        die();
                    } else {
                        $message['failure'] = 'Update failed due to server issues!';
                        echo json_encode($message);
                        die();
                    }
                } else {
                    $message['failure'] = 'Enter correct password';
                    echo json_encode($message);
                    die();
                }
                            } else {
                                $message['failure'] = 'Do not use old password again!';
                                echo json_encode($message);
                                die();
                            }
                        } else {
                            $message['failure'] = 'Password is not equal';
                            echo json_encode($message);
                            die();
                        }
                    }else{
                        $message['failure'] = 'Password must be minimum 8 digits in length';
                        echo json_encode($message);
                        die();
                    }
                } else {
                    $query1 = "UPDATE `usn_users_reg` SET `visibility`=:visibility WHERE (var_id=:var_id AND username=:username)";
                    $stmt1 = $pdo->prepare($query1);
                    $stmt1->execute(
                        array(
                            ':var_id' => $this->var_id,
                            ':username' => $this->username,
                            ':visibility' => $this->visibility,
                        )
                    );
                    if ($stmt1 == true) {
                        $message['success'] = 'Account updated successfully';
                        echo json_encode($message);
                        die();
                    } else {
                        $message['failure'] = 'Update failed due to server issues!';
                        echo json_encode($message);
                        die();
                    }

                }
            }else{
                $message['failure'] = 'Server issues, contact help!';
                echo json_encode($message);
                die();
            }
        }
        catch (PDOException $e){
            echo 'Error:'.$e->getMessage();
        }
    }






}
