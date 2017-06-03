<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php
include("db_connect.inc.php");

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

	$updateuser = "update user_table set username = '$username', password = '$password', work = '$work', experience = '$experience' where email = '$email'";
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