<?php
include '../database/database.php';
$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];
$dob = $_POST['lecturer_dob'];
$joining_date = $_POST['lecturer_joining_date'];
if(isset($name) && isset($email) && isset($department) && isset($dob) && isset($joining_date)){
  
  $sql = $conn->prepare("INSERT INTO user (email,name,type,fb_meta_id)
  VALUES (:email,:name,:type,:fb_meta_id)");
  $sql->execute(array(
  'name'=>$fb_user_name,
  'email'=>$fb_user_id.'@facebook.com',
  'type'=>'user',
  'fb_meta_id'=>$fb_user_id
  ));
  $sql = $conn->prepare("Select user_id from user where fb_meta_id= :fb_user_id");
  $sql->execute(array(
  'fb_user_id'=>$fb_user_id));
  $result = $sql->fetch(PDO::FETCH_ASSOC);

}
else{
  echo 'Error Occuredl'
}
?>
