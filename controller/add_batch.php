<?php
include '../database/connect.php';
$start = $_POST['start'];
$end = $_POST['end'];
$teacher_id = $_POST['teacher_id'];
$subject_name = $_POST['subject_name'];
$department = $_POST['department'];
$year = $_POST['year'];

if(isset($start) && isset($end) && isset($teacher_id) && isset($year) && isset($subject_name) && isset($department)){

  $sql = $conn->prepare("INSERT INTO tblbatch (BatchName,BrId,year,start,end,teacher_id)
  VALUES (:name,:branch,:year,:start,:end,:teacher_id)");
  $sql->execute(array(
  'name'=>$subject_name,
  'branch'=>$department ,
  'start'=>$start,
  'year'=>$year,
  'end'=>$end,
  'teacher_id'=>$teacher_id
  ));


  echo 'Succesfully Entered';
}
else{
  echo 'Error Occured';
}
?>
