<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<?php
include("db_connect.inc.php");

if ($_SESSION['email'] != null) {
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM user_table where email='$email'";
	$result = mysqli_query($Link, $sql);
	$rowscount = mysqli_num_rows($result);

	for ($i = 0; $i < $rowscount; $i++)
	    $row = mysqli_fetch_row($result);

	$user_id = $row[0];
	// echo $user_id;
}

$portname = $_POST['newportname'];
$porttime = $_POST['newporttime'];
$portclass = $_POST['newportclass'];
$portintro = $_POST['newportintro'];

if ($portname != null && $porttime != null && $portclass != null && $portintro != null) {

	$newport = "insert into portfolio_table (port_id, portname, porttime, portclass, portintro, user_id) values (null, '$portname', '$porttime', '$portclass', '$portintro', '$user_id')";
	

	if (mysqli_query($Link, $newport)) {
		$message = "新增作品集成功!";
		$port_id = mysqli_insert_id($Link);
		$url = "portcontent.php?port_id=$port_id";		
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


$isImageSuccess = true;
for ($i = 0; $i < 6; $i++) {
	$portimage_name = $_FILES['newportimage'.$i]['name'];
	$portimage_tmpname = $_FILES['newportimage'.$i]['tmp_name'];
	$portimage_type = $_FILES['newportimage'.$i]['type'];
	$portimage_size = $_FILES['newportimage'.$i]['size'];
	$portimage = null;

	if (isset($_FILES['newportimage'.$i]['error'])) {
		if ($_FILES['newportimage'.$i]['error'] == 0) {
			$instr = fopen($portimage_tmpname, "rb");
			$portimage = addslashes(fread($instr, filesize($portimage_tmpname)));
		}
	}

	$portimageintro = $_POST['newportimageintro'.$i];

	if ($portimage != null && $portimageintro != null) {
		$newimage = sprintf("insert into image_table (image_id, imagedata, imageintro, user_id, port_id) values (null, %s, '$portimageintro', '$user_id', '$port_id')", "'".$portimage."'");
		if (!mysqli_query($Link, $newimage))
			$isImageSuccess = false;
	}
}

if ($isImageSuccess)
	$message.= "\n照片上傳成功!";
else
	$message.= "\n照片上傳失敗!";

echo "<script type='text/javascript'>alert('$message');</script>";
echo "<script type='text/javascript'>window.location.href='$url';</script>";
?>