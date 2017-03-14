<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("database/connect.php");
extract($_POST);

			//For edit extra work
			/*For user login*/
			//die;
			if($type){
			if($type=="faculty"){
		 	 	$sql ="SELECT * FROM `tbluser` WHERE BINARY UserName='$txtUserName' and BINARY Password='$txtPassword'";
		 	 	$sth = $conn->prepare($sql);
				$sth->execute();
			    $result = $sth->fetchAll();
				//echo $txtUserName.'ds';
				//print_r($result);
				//echo $row=mysql_num_rows($qry);die;
				$result = $result[0]; //We need only 1st Id
				if($result > 0)
				{
					session_start();
					$_SESSION['UserName']=$result['UserName'];
					$_SESSION['FId']=$result['FId'];
					$_SESSION['Name']=$result['Name'];
					$_SESSION['type']="faculty";
					header("Location:dashboard2.php");
				}
			}
			else{
				if($type=="hod"){
					$hod_list=["hod1","hod2"];
					$password_list=["hod1","hod2"];
					$i = array_search($txtUserName, $hod_list);
					if($password_list[$i]==$txtPassword){
						$_SESSION['UserName']=$hod_list[$i];
						$_SESSION['type']="hod";
						header("Location:dashboard.php");
					}
					else{
						header("Location:index.php?value=wrong");
					}
				}
				else if($type == "admin"){
					$admin_list=["admin","hod2"];
					$password_list=["admin","hod2"];
					$i = array_search($txtUserName, $admin_list);
					if($password_list[$i]==$txtPassword){
						$_SESSION['UserName']=$admin_list[$i];
						$_SESSION['type']="admin";
						header("Location:dashboard.php");
					}
					else{
						header("Location:index.php?value=wrong");
					}
				}
				else{
					header("Location:index.php?value=wrong");
				}
			}
		}
		else{
			header("Location:index.php?value=wrong");
	}
/*For logout*/
?>
