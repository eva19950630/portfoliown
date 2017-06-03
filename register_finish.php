<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php
include("db_connect.inc.php");

$username = $_POST['newusername'];
$email = $_POST['newemail'];
$password = $_POST['newpassword'];
$password2 = $_POST['newpassword2'];

// echo $username;
// echo $email;
// echo $password;
// echo $password2;

if ($username != null && $email != null && $password != null && $password2 != null && ($password == $password2)) {
	$default_exp = "Your Experience";
	$newuser = "insert into user_table (user_id, username, email, password, experience) values (null, '$username', '$email', '$password', '$default_exp')";
	if (mysqli_query($Link, $newuser)) {
		// echo "註冊成功!";
		// echo "<meta http-equiv=REFRESH CONTENT=2;url=userportfolio.php>";
		$message = "註冊成功!";
		$url = "userportfolio.php";
		$_SESSION['email'] = $email;
	} else {
		$message = "註冊失敗!";
		$url = "index.php";
	}
} else {
	// echo "註冊失敗!";
	// echo "<meta http-equiv=REFRESH CONTENT=2;url=index.php>";
	$message = "註冊失敗!";
	$url = "index.php";
}

echo "<script type='text/javascript'>alert('$message');</script>";
echo "<script type='text/javascript'>window.location.href='$url';</script>";

?>