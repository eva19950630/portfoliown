<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php
include("db_connect.inc.php");

$email = $_POST['email'];
$password = $_POST['password'];

// echo $email;
// echo $password;

//search
$sql = "SELECT * FROM user_table where email = '$email'";
$result = mysqli_query($Link, $sql);
$rowsconut = mysqli_num_rows($result);

for ($i = 0; $i < $rowsconut; $i++)
    $row = mysqli_fetch_row($result);

if ($email != null && $password != null) {
	if ($row[2] == $email && $row[3] == $password) {
		$_SESSION['email'] = $email;
		$message = "登入成功!";
		$url = "userportfolio.php";
	} else if ($row[2] == $email && $row[3] != $password) {
		$message = "密碼錯誤!";
		$url = "index.php";
	} else if ($row[2] != $email && $row[3] != $password) {
		$message = "登入失敗!";
		$url = "index.php";
	}
	// echo $_SESSION['email'];
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<script type='text/javascript'>window.location.href='$url';</script>";
}

?>