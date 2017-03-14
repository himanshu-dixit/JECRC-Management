<?php
include '../database/connect.php';
$student_id = $_POST['student_id'];
$batch_id = $_POST['batch_id'];
$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];

session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($start) && isset($batch_id) ){

  foreach($_POST['attendance'] as $roll){
    $sql = $conn->prepare("INSERT INTO attendance
    VALUES (:batch_id,:teacher_id,:student_id,now())");
    $sql->execute(array(
    'batch_id'=>$batch_id,
    'teacher_id'=>$_SESSION['FId'] ,
    'student_id'=>$roll
    ));
  }

  $sql = $conn->prepare("INSERT INTO attendance_complete
   VALUES (:batch_id,:teacher_id,now())");
   $sql->execute(array(
   'batch_id'=>$batch_id,
   'teacher_id'=>$_SESSION['FId']
   ));


  echo 'The attendance has been marked sending you to the homepage';
}

?>

<meta http-equiv="refresh" content="0; url=../index.php" />
