<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php
include("db_connect.inc.php");

$portname = $_GET['newportname'];
$porttime = $_GET['newporttime'];
$portclass = $_GET['newportclass'];
$portintro = $_GET['newportintro'];

// echo $portname;
// echo $porttime;
// echo $portclass;
// echo $portintro;

if ($_SESSION['email'] != null && $portname != null && $porttime != null && $portclass != null && $portintro != null) {
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM user_table where email='$email'";
	$result = mysqli_query($Link, $sql);
	$rowscount = mysqli_num_rows($result);

	for ($i = 0; $i < $rowscount; $i++)
	    $row = mysqli_fetch_row($result);

	$user_id = $row[0];
	// echo $user_id;

	$newport = "insert into portfolio_table (port_id, portname, porttime, portclass, portintro, user_id) values (null, '$portname', '$porttime', '$portclass', '$portintro', '$user_id')";
	if (mysqli_query($Link, $newport)) {
		$message = "新增作品集成功!";
		$url = "portcontent.php";
		// printf("%d", mysqli_insert_id($Link));
		// echo mysqli_insert_id($Link);
		// $_SESSION['newportid'] = mysqli_insert_id($Link);
	} else {
		// echo "1";
		$message = "新增作品集失敗!";
		$url = "userportfolio.php";
	}
} else {
	// echo "2";
	$message = "新增作品集失敗!";
	$url = "userportfolio.php";
}

echo "<script type='text/javascript'>alert('$message');</script>";
echo "<script type='text/javascript'>window.location.href='$url';</script>";

?>