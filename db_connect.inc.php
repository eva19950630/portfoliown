<?php

$Link = mysqli_connect('localhost', 'root', '12345678'); //連結伺服器
$db = mysqli_select_db($Link, "portfolio"); //選擇資料庫
mysqli_query($Link, "SET CHARACTER SET utf8");	//送出Big5編碼的MySQL指令
mysqli_query($Link,  "SET collation_connection = 'utf8_unicode_ci'");

if(!@$Link)
    die("connect server failed");

if(!@$db)
    die("connect db failed");

?>