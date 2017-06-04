<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php
include("db_connect.inc.php");

$userpic_name = $_FILES['upuserpic']['name'];
$userpic_tmpname = $_FILES['upuserpic']['tmp_name'];
$userpic_type = $_FILES['upuserpic']['type'];
$userpic_size = $_FILES['upuserpic']['size'];
$userpic = null;

if (isset($_FILES['upuserpic']['error'])) {
	if ($_FILES['upuserpic']['error'] == 0) {
		$instr = fopen($userpic_tmpname, "rb");
		$userpic = addslashes(fread($instr, filesize($userpic_tmpname)));
	}
}

// echo $userpic;

$username = $_POST['upusername'];
$password = $_POST['upuserpass'];
$work = $_POST['upuserwork'];
$experience = $_POST['upuserexp'];

// echo $username;
// echo $password;
// echo $work;
// echo $experience;

if ($_SESSION['email'] != null && $username != null && $password != null) {
	$email = $_SESSION['email'];

	$updateuser = sprintf("update user_table set username = '$username', password = '$password', work = '$work', experience = '$experience', userpic = %s where email = '$email'", "'".$userpic."'");

	if (mysqli_query($Link, $updateuser)) {
		$message = "修改會員資料成功!";
		$url = "userportfolio.php";
	} else {
		$message = "修改會員資料失敗!";
		$url = "userportfolio.php";
	}

	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script type='text/javascript'>window.location.href='$url';</script>";
}

?>