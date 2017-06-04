<?php
session_start(); 
include("db_connect.inc.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Portfoliown</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- optimized for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- materialize css -->
    <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/> -->
    <!-- jquery ui css -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Icons Fonts -->
    <link rel="stylesheet" href="icons-fonts/glyphicon-style.css">
    <link rel="stylesheet" href="https://file.myfontastic.com/aR4fpYP5juQuaFcCLbzkFZ/icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="">-->
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- navbar css -->
    <link rel="stylesheet" href="css/navbar.css">
    <!-- indexcontent css -->
    <link rel="stylesheet" href="css/indexcontent.css">
    <!-- userportcontent css -->
    <link rel="stylesheet" href="css/userportcontent.css">

</head>

<body>

<?php
if ($_SESSION['email'] != null) {
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM user_table where email='$email'";
    $result = mysqli_query($Link, $sql);
    $rowscount = mysqli_num_rows($result);

    for ($i = 0; $i < $rowscount; $i++)
        $row = mysqli_fetch_row($result);

    $user_id = $row[0];
}
?>    

    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header portfoliown-navbar">
            <div class="container">
                <!-- Logo -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">PORTFOLIOWN</a>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <form class="search-container">
                      <input type="text" id="search-bar" placeholder="Search Portfoliowns...">
                      <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
                    </form>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li class="afterlogin">
                            <a href="userportfolio.php" id="link-userpic">

<?php
if ($row[6] != null)
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row[6]).'" height="35" width="35" id="user-pic"/>';
else
    echo "<img src=\"images/userpic_default.png\" height=\"35\" width=\"35\" id=\"user-pic\">";
?>
                                <!-- <img src="data:image/jpeg;base64, <?php echo base64_encode($row[6]) ?>" height="35" width="35" id="user-pic"> -->

                                <font class="username" style="margin: 0 0 0 5px;"><?php echo $row[1] ?></font>
                            </a>
                        </li>
                        <!-- <li class="afterlogin">
                            <a href="" id="link-bell"><i class="fa fa-bell"></i></a>
                        </li> -->
                        <li class="afterlogin">
                            <a href="userlogout.php">登出</a><span class="hover"></span>
                        </li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="portfolio-manage">
        <ul id="managetop">
            <li>
                <div class="manage-image">

<?php
if ($row[6] != null)
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row[6]).'" height="160" width="160" id="user-pic"/>';
else
    echo "<img src=\"images/userpic_default.png\" height=\"160\" width=\"160\" id=\"user-pic\">";
?>

                    <!-- <img src="data:image/jpeg;base64, <?php echo base64_encode($row[6]) ?>" height="160" width="160" id="user-pic"> -->
                    <!-- <div class="userpic-upload">
                        <div class="userpic-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="userpic-preview">
                            <div id="imagePreview" style="background-image: url(images/syuan.jpg);"></div>
                        </div>
                    </div> -->
                    <h5 class="manage-username"><?php echo $row[1] ?></h5>
                    <h6 class="manage-userwork">|&ensp;<?php echo $row[4] ?>&ensp;|</h6>
                </div>
            </li>
            <li>
                <div class="manage-experience">
                    <div class="subitem-title"><h4>|&ensp;經歷</h4>&emsp;<h5>Experience</h5><h4>&ensp;|</h4></div>
                    <div class="experi-content" id="design-scrollbar">
                        <ul id="experilist">
                            <li><?php echo nl2br($row[5]) ?></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
        
        <a href="" id="click-updateuserinfo" data-toggle="modal"><button type="button" class="btn btn-default updateprofile-btn">更新個人資料</button></a>

        <!-- Update userinfo Modal -->
        <div class="modal fade" id="updateuserinfo-modal" role="dialog">
            <div class="modal-dialog">
                <div id="updateuserinfo-box">
                    <div class="top" style="padding: 15px;">
                        <button type="button" class="close" data-dismiss="modal" style="outline: 0; color: #222B31;"><i class="fa fa-times"></i></button>
                    </div>

                    <div class="content updateuserinfo">
                        <div class="subitem-title"><h4>|&ensp;更新個人資料</h4>&emsp;<h5>Update User Information</h5><h4>&ensp;|</h4></div>
                        <div class="updateuserinfo-content">
                            <ul id="updateuserinfolist">
                                <form enctype="multipart/form-data" name="form" method="post" action="userupdate_finish.php">
                                    <div class="userpic-upload update">
                                        <div class="userpic-edit">
                                            <input type="file" id="imageUpload" name="upuserpic" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="userpic-preview">
                                            <div id="imagePreview" style="background-image: url(images/userpic_default.png)"></div>   
                                        </div>
                                    </div>
                                    <li>
                                        <font class="uploadtitle">使用者名稱：</font>
                                        <input type="text" id="newusername-bar" name="upusername" value="<?php echo $row[1] ?>" required>
                                    </li>
                                    <li>
                                        <font class="uploadtitle">使用者email：</font>
                                        <?php echo $row[2] ?>
                                    </li>
                                    <li>
                                        <font class="uploadtitle">使用者密碼：</font>
                                        <input type="password" id="newpass-bar" name="upuserpass" value="<?php echo $row[3] ?>" required>
                                    </li>
                                    <li>
                                        <font class="uploadtitle">工作：</font>
                                        <input type="text" id="newuserwork-bar" name="upuserwork" value="<?php echo $row[4] ?>">
                                    </li>
                                    <li>
                                        <font class="uploadtitle">經歷：</font>
                                    </li>
                                        <textarea id="newuserexp-textarea" name="upuserexp"><?php echo $row[5] ?></textarea>
                                    <input type="submit" name="button" value="更新個人資料" class="btn btn-default updateuserinfo-btn"/>
                                </form>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <hr width="70%">

<?php
$sql2 = "SELECT * FROM portfolio_table where user_id='$user_id'";
$result2 = mysqli_query($Link, $sql2);
$rowscount2 = mysqli_num_rows($result2);

// echo $user_id;
?>
        
        <div id="managecontent">
            <div class="subitem-title"><h4>|&ensp;你的作品集</h4>&emsp;<h5>Portfolio</h5><h4>&ensp;|</h4></div>
            <div class="userportfolio-content" id="design-scrollbar">
                <ul id="albums">
                    <?php
                    for ($i = 0; $i < $rowscount2; $i++) {
                        $row2 = mysqli_fetch_row($result2);
                    ?>
                    <li>
                        <a href="portcontent.php" title="">
                            <img src="http://tinyurl.com/ojco2eh" width="" height="" alt="" />
                            <img src="http://tinyurl.com/ojco2eh" width="" height="" alt="" />
                            <img src="http://tinyurl.com/ojco2eh" width="" height="" alt="" />
                        </a>
                        <h5><?php echo $row2[1] ?></h5>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- <div class="port-page">
                <a class="arrow-left" href="#"><i class="glyphicon glyphicon-chevron-left"></i></a>&emsp;
                <h2>01&emsp;/&emsp;10</h2>&emsp;
                <a class="arrow-right" href="#"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div> -->
        </div>
        <a class="center-circle" href="upload.php" target="_blank">+</a>
    </div>


    <!-- ##### JAVASCRIPTS ##### -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap js -->
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- materialize js -->
    <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->

    <!-- index js -->
    <script type="text/javascript" src="js/index.js"></script>
    <!-- navbar js -->
    <script type="text/javascript" src="js/navbar.js"></script>
    <!-- image js -->
    <script type="text/javascript" src="js/image.js"></script>


</body>

</html>