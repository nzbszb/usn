<?php
session_start();
include("../../src/User/DB/database.php");
$var_id = $_SESSION['usn_var_id'];
//$pdo = new PDO('mysql:host=localhost;dbname=usn','root','nazib123');
$query = "UPDATE usn_users_login SET is_active=0 WHERE var_id='$var_id';
 UPDATE usn_users_reg SET is_active=0 WHERE var_id='$var_id'";
$stmt = $pdo->prepare($query);
$stmt->execute();
if(session_destroy())
{
    header("Location:../../");
}
