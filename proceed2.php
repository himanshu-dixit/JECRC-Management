<?php
session_start();
ob_start();
include("database\db.php");
//For edit extra work
if(isset($_POST['submit'])&& $_POST['submit']=="Update Work")
{
	$FId=$_SESSION['FId'];
	//print_r($_POST);//die;
	extract($_POST);
	$extwork=mysql_real_escape_string($txtExtraWork);
	$sql="UPDATE `db_maiet`.tblextrawork ";
	$sql.="SET `Work`='$extwork', `Hour`='$hour' ";
	$sql.="WHERE `tblextrawork`.`Id` = '$eid'";
	mysql_query($sql);
	header("Location:welcome.php?value=home");
}

//For update lab
if(isset($_POST['submit'])&& $_POST['submit']=="Update Lab")
{
	//echo "hi from update lab!!!";die;
	//print_r($_POST);die;
	extract($_POST);
	$extwork=mysql_real_escape_string($txtExtraWork);
	$topic=mysql_real_escape_string($txtTopic);
	$FId=$_SESSION['FId'];
	if($ArrId==0)
	{
		$sql="UPDATE `db_maiet`.`tbldailylab` 
				SET `Fid` = '$FId',
					`LabDate` = '$txtDate',
					`LabId` = '$selLab',
					`BrId` = '$BranchId',
					`stream` = '$txtStream',
					`Year` = '$txtYear',
					`Sem` = '$txtSem',
					`Section` = '$txtSec',
					`Batch` = '$txtBatch',
					`ExpCovered` = '$topic',
					`StuPresent` = '$txtStuPre',
					`RegStudent` = '$txtRegStu',
					`LabHours` = '$selLabHours',
					`ExtraWork` = '$extwork'
				WHERE `tbldailylab`.`LabTakenId` = '$lid';";	
				//echo $sql;die;
			mysql_query($sql);
			header("Location:welcome.php?value=home");
	}
	else
	{
		$sql="DELETE FROM `db_maiet`.`tblarrangelab`
				WHERE ArrId='$ArrId'";
				//echo($sql);die;
		mysql_query($sql);
		$sql="UPDATE `db_maiet`.`tbldailylab` 
				SET `Fid` = '$FId',
					`LabDate` = '$txtDate',
					`LabId` = '$selLab',
					`BrId` = '$BranchId',
					`stream` = '$txtStream',
					`Year` = '$txtYear',
					`Sem` = '$txtSem',
					`Section` = '$txtSec',
					`Batch` = '$txtBatch',
					`ExpCovered` = '$txtTopic',
					`StuPresent` = '$txtStuPre',
					`RegStudent` = '$txtRegStu',
					`LabHours` = '$selLabHours',
					`ExtraWork` = '$extwork',
					`ArrId`='0'
			WHERE `tbldailylab`.`LabTakenId` = '$lid';";			
			//echo($sql);die;
			mysql_query($sql);
			header("Location:welcome.php?value=home");
	}
}

//For update arrange lab
if(isset($_POST['submit'])&& $_POST['submit']=="Update Arrange Lab")
{
	//echo "hi from update arrange lab!!!<br>";die;
	//print_r($_POST);
	extract($_POST);
	$extwork=mysql_real_escape_string($txtExtraWork);
	$topic=mysql_real_escape_string($txtTopic);
	if($ArrId==0)
	{
		//echo "Generate Arrangement id then update";
		
		$FId=$_SESSION['FId'];
		$sqlarr="INSERT INTO `db_maiet`.`tblarrangelab` 
						(`ArrBrId` ,`ArrFid`)
					VALUES
						('$selDept', '$selFaculty')";
		mysql_query($sqlarr);
		$Aid=mysql_insert_id();		
		$sql="UPDATE `db_maiet`.`tbldailylab` 
				SET `Fid` = '$FId',
					`LabDate` = '$txtDate',
					`LabId` = '$selLab',
					`BrId` = '$BranchId',
					`stream` = '$txtStream',
					`Year` = '$txtYear',
					`Sem` = '$txtSem',
					`Section` = '$txtSec',
					`Batch` = '$txtBatch',
					`ExpCovered` = '$topic',
					`StuPresent` = '$txtStuPre',
					`RegStudent` = '$txtRegStu',
					`LabHours` = '$selLabHours',
					`ExtraWork` = '$extwork',
					`ArrId`='$Aid'
				WHERE `tbldailylab`.`LabTakenId` = '$lid';";			
			//echo($sql);die;
			mysql_query($sql);
		header("Location:welcome.php?value=home");
	}
	else
	{
		//echo "update arranged lecture";		
		$sql="UPDATE `db_maiet`.`tblarrangelab` 
			SET `ArrBrId` = '$selDept',
				`ArrFid` = '$selFaculty'
			WHERE `tblarrangelab`.`ArrId` = '$ArrId';";
		//echo $sql;die;
		mysql_query($sql);
		$FId=$_SESSION['FId'];
		$sql="UPDATE `db_maiet`.`tbldailylab` 
			SET `Fid` = '$FId',
				`LabDate` = '$txtDate',
				`LabId` = '$selLab',
				`BrId` = '$BranchId',
				`stream` = '$txtStream',
				`year` = '$txtYear',
				`sem` = '$txtSem',
				`section` = '$txtSec',
				`ExpCovered` = '$topic',
				`StuPresent` = '$txtStuPre',
				`RegStudent` = '$txtRegStu',
				`LabHours` = '$LabHours',
				`ExtraWork` = '$extwork'
			WHERE `tbldailylab`.`LabTakenId` = '$lid';";
			
			//echo($sql);die;
			mysql_query($sql);
		header("Location:welcome.php?value=home");
	}
}



//For update lecture
if(isset($_POST['submit'])&& $_POST['submit']=="Update Lecture")
{
	//echo "hi from update lecture!!!";//die;
	//print_r($_POST);//die;
	extract($_POST);
	$extwork=mysql_real_escape_string($txtExtraWork);
	$reson=mysql_real_escape_string($txtShortAtt);
	$topic=mysql_real_escape_string($txtTopic);
	$FId=$_SESSION['FId'];
	if($ArrId==0)
	{
		$sql="UPDATE `db_maiet`.`tbldailylecture` 
				SET `Fid` = '$FId',
					`LecDate` = '$txtDate',
					`SubId` = '$selSubject',
					`BrId` = '$BranchId',
					`stream` = '$txtStream',
					`year` = '$txtYear',
					`sem` = '$txtSem',
					`section` = '$txtSec',
					`LecTopic` = '$topic',
					`StuPresent` = '$txtStuPre',
					`RegStudent` = '$txtRegStu',
					`LectNo` = '$sellec',
					`Reason` = '$reson',
					`ExtraWork` = '$extwork'
				WHERE `tbldailylecture`.`LecId` = '$lid';";	
				//echo $sql;die;
			mysql_query($sql);
			header("Location:welcome.php?value=home");
	}
	else
	{
		$sql="DELETE FROM `db_maiet`.`tblarrangelecture`
				WHERE ArrId='$ArrId'";
				//echo($sql);die;
		mysql_query($sql);
		$sql="UPDATE `db_maiet`.`tbldailylecture` 
			SET `Fid` = '$FId',
				`LecDate` = '$txtDate',
				`SubId` = '$selSubject',
				`BrId` = '$BranchId',
				`stream` = '$txtStream',
				`year` = '$txtYear',
				`sem` = '$txtSem',
				`section` = '$txtSec',
				`LecTopic` = '$topic',
				`StuPresent` = '$txtStuPre',
				`RegStudent` = '$txtRegStu',
				`LectNo` = '$sellec',
				`Reason` = '$reson',
				`ExtraWork` = '$extwork',
				`ArrId`='0'
			WHERE `tbldailylecture`.`LecId` = '$lid';";
			
			//echo($sql);die;
			mysql_query($sql);
			header("Location:welcome.php?value=home");
	}
}


if(isset($_POST['submit'])&& $_POST['submit']=="Update Arrange Lecture")
{
	//echo "hi from update arrange lecture!!!<br>";
	//print_r($_POST);
	extract($_POST);
	$extwork=mysql_real_escape_string($txtExtraWork);
	$topic=mysql_real_escape_string($txtTopic);
	if($ArrId==0)
	{
		//echo "Generate Arrangement id then update";
		
		$FId=$_SESSION['FId'];
		$sqlarr="INSERT INTO `db_maiet`.`tblarrangelecture` 
						(`ArrBrId` ,`ArrFid`)
					VALUES
						('$selDept', '$selFaculty')";
		mysql_query($sqlarr);
		$Aid=mysql_insert_id();
		
		$sql="UPDATE `db_maiet`.`tbldailylecture` 
			SET `Fid` = '$FId',
				`LecDate` = '$txtDate',
				`SubId` = '$selSubject',
				`BrId` = '$BranchId',
				`stream` = '$txtStream',
				`year` = '$txtYear',
				`sem` = '$txtSem',
				`section` = '$txtSec',
				`LecTopic` = '$topic',
				`StuPresent` = '$txtStuPre',
				`RegStudent` = '$txtRegStu',
				`LectNo` = '$sellec',				
				`ExtraWork` = '$extwork',
				`ArrId`='$Aid'
			WHERE `tbldailylecture`.`LecId` = '$lid';";
			
			//echo($sql);die;
			mysql_query($sql);
		header("Location:welcome.php?value=home");
	}
	else
	{
		//echo "update arranged lecture";		
		$sql="UPDATE `db_maiet`.`tblarrangelecture` 
			SET `ArrBrId` = '$selDept',
				`ArrFid` = '$selFaculty'
			WHERE `tblarrangelecture`.`ArrId` = '$ArrId';";
			//echo $sql;die;
		mysql_query($sql);
		$FId=$_SESSION['FId'];
		$sql="UPDATE `db_maiet`.`tbldailylecture` 
			SET `Fid` = '$FId',
				`LecDate` = '$txtDate',
				`SubId` = '$selSubject',
				`BrId` = '$BranchId',
				`stream` = '$txtStream',
				`year` = '$txtYear',
				`sem` = '$txtSem',
				`section` = '$txtSec',
				`LecTopic` = '$topic',
				`StuPresent` = '$txtStuPre',
				`RegStudent` = '$txtRegStu',
				`LectNo` = '$sellec',
				`ExtraWork` = '$extwork'
			WHERE `tbldailylecture`.`LecId` = '$lid';";
			
			//echo($sql);die;
			mysql_query($sql);
		header("Location:welcome.php?value=home");
	}
}

/*For submit lecture report*/
if(isset($_POST['submit'])&& $_POST['submit']=="Submit Lecture")
{
	//echo "from poceed.php";die;
	//print_r($_POST);
	//print_r($_SESSION);
	extract($_POST);
	$extwork=mysql_real_escape_string($txtExtraWork);
	$reson=mysql_real_escape_string($txtShortAtt);
	$topic=mysql_real_escape_string($txtTopic);
	$FId=$_SESSION['FId'];
	$sql="INSERT INTO `db_maiet`.`tbldailylecture` 
				(
				`Fid`, 
				`LecDate`, 
				`SubId`, 
				`BrId`, 
				`stream`, 
				`year`, 
				`sem`, 
				`section`,
				`LecTopic`, 
				`StuPresent`,
				`RegStudent`,
				`LectNo`,
				`Reason`,
				`ExtraWork`) 
			VALUES (
				'$FId', 
				'$txtDate', 
				'$selSubject', 
				'$BranchId',
				'$txtStream', 
				'$txtYear', 
				'$txtSem', 
				'$txtSec',
				'$topic', 
				'$txtStuPre',
				'$txtRegStu',
				'$sellec',
				'$reson',
				'$extwork');";
		mysql_query($sql);
		header("Location:welcome.php?value=home");
}

/*For submit arrange lecture report*/
if(isset($_POST['submit'])&& $_POST['submit']=="Submit Arrange Lecture")
{
	//echo "from poceed.php";die;
	//print_r($_POST);die;
	//print_r($_SESSION);
	extract($_POST);
	$extwork=mysql_real_escape_string($txtExtraWork);	
	$topic=mysql_real_escape_string($txtTopic);
	$FId=$_SESSION['FId'];
	$sqlarr="INSERT INTO `db_maiet`.`tblarrangelecture` 
					(`ArrBrId` ,`ArrFid`)
				VALUES
					('$selDept', '$selFaculty')";
	mysql_query($sqlarr);
	$id=mysql_insert_id();
	$sql="INSERT INTO `db_maiet`.`tbldailylecture` 
				(
				`Fid`, 
				`LecDate`, 
				`SubId`, 
				`BrId`, 
				`stream`,
				`year`, 
				`sem`, 
				`section`,
				`LecTopic`, 
				`StuPresent`,
				`RegStudent`,
				`LectNo`,
				`ExtraWork`,
				`ArrId`) 
			VALUES (
				'$FId', 
				'$txtDate', 
				'$selSubject', 
				'$BranchId', 
				'$txtStream',
				'$txtYear', 
				'$txtSem', 
				'$txtSec',
				'$topic', 
				'$txtStuPre',
				'$txtRegStu',
				'$sellec',
				'$extwork',
				'$id');";
		mysql_query($sql);
		header("Location:welcome.php?value=home");
}





/*For submit lab report*/
if(isset($_POST['submit'])&& $_POST['submit']=="Submit Lab")
{
	//echo "from poceed.php";die;
	//print_r($_POST);
	//print_r($_SESSION);//die;
	extract($_POST);
	$topic=mysql_real_escape_string($txtTopic);
	$extwork=mysql_real_escape_string($txtExtraWork);
	$FId=$_SESSION['FId'];
	$sql="INSERT INTO `db_maiet`.`tbldailylab` 
				(
				`Fid`, 
				`LabDate`, 
				`LabId`, 
				`stream`,
				`BrId`, 
				`Year`, 
				`Sem`, 
				`Section`,
				`Batch`, 
				`ExpCovered`,
				`StuPresent`,
				`RegStudent`,
				`LabHours`,
				`ExtraWork`) 
			VALUES (
				'$FId', 
				'$txtDate', 
				'$selLab',
				'$txtStream', 
				'$BranchId', 
				'$txtYear', 
				'$txtSem', 
				'$txtSec',
				'$txtBatch',
				'$topic', 
				'$txtStuPre',
				'$txtRegStu',
				'$selLabHours',
				'$extwork');";//die;
		mysql_query($sql);
		header("Location:welcome.php");
}


/*For submit arrange lab report*/
if(isset($_POST['submit'])&& $_POST['submit']=="Submit Arrange Lab")
{
	//echo "from poceed.php";die;
	//print_r($_POST);die;
	//print_r($_SESSION);
	extract($_POST);
	$topic=mysql_real_escape_string($txtTopic);
	$FId=$_SESSION['FId'];
	$sqlarr="INSERT INTO `db_maiet`.`tblarrangelab` 
					(`ArrBrId` ,`ArrFid`)
				VALUES
					('$selDept', '$selFaculty')";
	mysql_query($sqlarr);
	$id=mysql_insert_id();
	$sql="INSERT INTO `db_maiet`.`tbldailylab` 
				(
				`Fid`, 
				`LabDate`, 
				`LabId`, 
				`stream`,
				`BrId`, 
				`Year`, 
				`Sem`, 
				`Section`,
				`Batch`, 
				`ExpCovered`,
				`StuPresent`,
				`RegStudent`,
				`LabHours`,
				`ArrId`) 
			VALUES (
				'$FId', 
				'$txtDate', 
				'$selLab', 
				'$txtStream',
				'$BranchId', 
				'$txtYear', 
				'$txtSem', 
				'$txtSec',
				'$txtBatch',
				'$topic', 
				'$txtStuPre',
				'$txtRegStu',
				'$selLabHours',
				'$id');";//die;

		mysql_query($sql);
		header("Location:welcome.php?value=home");
}


/*For submit extra work*/
if(isset($_POST['submit'])&& $_POST['submit']=="Submit Work")
{
	//echo "from poceed.php";die;
	//print_r($_POST);
	//print_r($_SESSION);
	//echo "This page is under construction!!!";die;
	
	extract($_POST);
	$extwork=mysql_real_escape_string($txtExtraWork);
	$FId=$_SESSION['FId'];
	$sql="INSERT INTO `db_maiet`.`tblextrawork` 
				(
				`Fid`, 
				`Date`,
				`Work`,
				`Hour`
				) 
			VALUES (
				'$FId', 
				'$txtDate',
				'$extwork', 
				'$hour' 
				);";
				//echo $sql;die;

		mysql_query($sql);
	header("Location:welcome.php?value=home");
}







/*For user login*/
	if(isset($_POST['Login']) && $_POST['Login']=="Login")
	{
		//print_r($_POST);//die;
		extract($_POST);	
			
		$sql="SELECT * FROM `tbluser` WHERE BINARY UserName='$txtUserName' and BINARY Password='$txtPassword'";
		//echo $sql;die;
		$qry=mysql_query($sql);
		$result=mysql_fetch_assoc($qry);
		//print_r($result);die;
		//echo $row=mysql_num_rows($qry);die;
		
		if($result > 0)
		{
			session_start();
			$_SESSION['UserName']=$result['UserName'];
			$_SESSION['FId']=$result['FId'];
			header("Location:welcome.php");
		}
		else
		{
		header("Location:index.php?value=login");
		$_SESSION['flash_msg']="Please enter Username And Password";
		}
	}

/*For logout*/
?>