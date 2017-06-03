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
    <!-- portcontent css -->
    <link rel="stylesheet" href="css/portcontent.css">
    <!-- upload css -->
    <link rel="stylesheet" href="css/upload.css">

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
                                <img src="images/syuan.jpg" height="35" width="35" id="user-pic">
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

<?php
$sql = "SELECT * FROM portfolio_table";
$result = mysqli_query($Link, $sql);
$rowscount = mysqli_num_rows($result);

for ($i = 0; $i < $rowscount; $i++) {
    $row = mysqli_fetch_row($result);

    $user_id = $row[7];
    if ($user_id != 0) {
        $sql2 = "SELECT * FROM user_table where user_id='$user_id'";
        $result2 = mysqli_query($Link, $sql2);
        $rowscount2 = mysqli_num_rows($result2);
        for ($j = 0; $j < $rowscount2; $j++)
            $row2 = mysqli_fetch_row($result2);
    }
}
?>

    <div class="portcontent-manage">
        <ul id="managetop">
            <li>
                <ul id="albums" style="padding: 0px; margin: 10px 0 0 10px;">
                    <li>
                        <a href="" title="">
                            <img src="http://tinyurl.com/ojco2eh" width="" height="" alt="" />
                            <img src="http://tinyurl.com/ojco2eh" width="" height="" alt="" />
                            <img src="http://tinyurl.com/ojco2eh" width="" height="" alt="" />
                        </a>
                        <h5 style="font-size: 20px; letter-spacing: 2px;"><?php echo $row[1] ?></h5>
                    </li>
                </ul>
            </li>
            <li>
                <div class="portcontent-intro">
                    <div class="subitem-title"><h4>|&ensp;作品集介紹</h4>&emsp;<h5>Introduction</h5><h4>&ensp;|</h4></div>
                    <div class="portintro-content">
                        <h5><b>作者</b>&ensp;|&ensp;<?php echo $row2[1] ?></h5>
                        <h5><b>時間</b>&ensp;|&ensp;<?php echo $row[2] ?></h5>
                        <h5><b>類型</b>&ensp;|&ensp;<?php echo $row[3] ?></h5>
                        <h5><b>描述</b>&ensp;|&ensp;</h5>
                        <div class="port-intro" id="design-scrollbar"><?php echo $row[4] ?></div>
                    </div>
                </div>
            </li>
        </ul>

        <a href="updateportinfo.html" target="_blank"><button type="button" class="btn btn-default updateportinfo-btn">更新作品集資訊</button></a>

        <div class="manageportcontent" id="design-scrollbar">
            <ul id="portcontent-images">
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
            </ul>
            <ul id="portcontent-images">
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
            </ul>
            <ul id="portcontent-images">
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
            </ul>
            <ul id="portcontent-images">
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
            </ul>
            <ul id="portcontent-images">
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
            </ul>
            <ul id="portcontent-images">
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
                <li>
                    <img src="http://tinyurl.com/o4aqvyg">
                    <h5>
                        <font color="#932534"><b>|</b></font>&ensp;
                            Arcade Fire
                        &ensp;<font color="#932534"><b>|</b></font>
                    </h5>
                </li>
            </ul>
        </div>
        <a href="" id="click-addimages" class="center-circle" data-toggle="modal">+</a>
    </div>

    <!-- Add images Modal -->
    <div class="modal fade" id="addimages-modal" role="dialog">
        <div class="modal-dialog">
            <div id="addimages-box">
                <div class="top" style="padding: 15px;">
                    <button type="button" class="close" data-dismiss="modal" style="outline: 0; color: #222B31;"><i class="fa fa-times"></i></button>
                </div>

                <div class="content addimages">
                    <div class="subitem-title"><h4>|&ensp;上傳新照片</h4>&emsp;<h5>Upload new Images</h5><h4>&ensp;|</h4></div>
                    
                    <font color="#222B31" style="font-size: 13px; letter-spacing: 1.5px; margin: 0 0 20px 0">
                        〔 一次最多再上傳 <b>10</b> 張新照片 〕
                    </font>

                    <div class="newimageupload" id="design-scrollbar">
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                        <div class="image-upload addimages">
                            <div class="image-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="image-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);"></div>
                            </div>
                            <div class="image-intro">
                                <input type="text" id="newimageintro-bar" placeholder="輸入照片描述" required>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-default updateimages-btn">確定上傳</button>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end Add images Modal -->


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