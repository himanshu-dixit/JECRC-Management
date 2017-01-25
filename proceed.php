<?php
session_start();
ob_start();
error_reporting(E_ALL);
include("database\connect.php");
//var_dump($_POST);
//For edit extra work

/*For user login*/

		//print_r($_POST);//die;
		extract($_POST);
 	 	$sql ="SELECT * FROM `tbluser` WHERE BINARY UserName='$txtUserName' and BINARY Password='$txtPassword'";
  	$sth = $conn->prepare($sql);
		$sth->execute();
	  $result = $sth->fetchAll();
		echo $txtUserName.'ds';
		print_r($result);
		//echo $row=mysql_num_rows($qry);die;

		$result = $result[0]; //We need only 1st Id
		if($result > 0)
		{
			session_start();
			$_SESSION['UserName']=$result['UserName'];
			$_SESSION['FId']=$result['FId'];
			header("Location:dashboard.php");
		}
		else
		{
		header("Location:index.php?value=wrong");
		}


/*For logout*/
?>
