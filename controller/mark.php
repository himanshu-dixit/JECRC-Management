<?php
include '../database/connect.php';
$student_id = $_POST['student_id'];
$batch_id = $_POST['batch_id'];
$date = $_POST['date'];
$type = $_POST['type'];

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($student_id) && isset($batch_id) ){
  if($type=="absent"){
    $sql = $conn->prepare("delete from attendance where batch_id = :batch_id and student_id = :student_id and DATE(date) = CURDATE()");
    $sql->execute(array(
    'batch_id'=>$batch_id,
    'student_id'=>$student_id
    ));
  }
  else{
    $sql = $conn->prepare("INSERT INTO attendance
    VALUES (:batch_id,:teacher_id,:student_id,now())");
    $sql->execute(array(
    'batch_id'=>$batch_id,
    'teacher_id'=>$_SESSION['FId'] ,
    'student_id'=>$student_id
    ));
    $sql = $conn->prepare("INSERT INTO attendance
    VALUES (:batch_id,:teacher_id,:student_id,now())");
    $sql->execute(array(
    'batch_id'=>$batch_id,
    'teacher_id'=>$_SESSION['FId'] ,
    'student_id'=>$student_id
    ));
  }

}
else{
  echo 'error';
}
?>
