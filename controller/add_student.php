<?php
include '../database/connect.php';
$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];
$roll = $_POST['roll'];
$phone_no = $_POST['phone_no'];
if(isset($name) && isset($email) && isset($department) && isset($roll) && isset($phone_no)){

  $sql = $conn->prepare("INSERT INTO tblstudent (BrId,Sid,Name,Email,Phone_no)
  VALUES (:department,:roll,:name,:email,:phone_no)");
  $sql->execute(array(
  'name'=>$name,
  'roll'=>$roll,
  'department'=>$department,
  'email'=>$email,
  'phone_no'=>$phone_no
  ));
  /*
  if (!$sql->execute()) {
    print_r($sql->errorInfo());
  }
  */
  echo 'Succesfully Entered';
}
else{
  echo 'Error Occured';
}
?>
