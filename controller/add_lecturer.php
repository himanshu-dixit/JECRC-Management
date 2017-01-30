<?php
include '../database/connect.php';
$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];
$dob = $_POST['lecturer_dob'];
$joining_date = $_POST['lecturer_joining_date'];
if(isset($name) && isset($email) && isset($department) && isset($dob) && isset($joining_date)){

  $sql = $conn->prepare("INSERT INTO tblfaculty (FName,FDesignation,Deptid,doj,dob)
  VALUES (:fname,:designation,:department,:doj,:dob)");
  $sql->execute(array(
  'fname'=>$name,
  'designation'=>'Lecturer',
  'department'=>$department,
  'doj'=>$joining_date,
  'dob'=>$dob
  ));


}
else{
  echo 'Error Occuredl';
}
?>
