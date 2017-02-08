<?php
include '../database/connect.php';
$student_id = $_POST['student_id'];
session_start();
$batch_id = $_GET['id'];
$teacher_id = $_SESSION['FId'];

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($teacher_id) && isset($batch_id) ){


    $sql = $conn->prepare("INSERT INTO attendance_complete
    VALUES (:batch_id,:teacher_id,now())");
    $sql->execute(array(
    'batch_id'=>$batch_id,
    'teacher_id'=>$_SESSION['FId']
    ));

}
else{
  echo 'error';
}
?>
