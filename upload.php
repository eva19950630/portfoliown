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
    <!-- upload css -->
    <link rel="stylesheet" href="css/upload.css">

    <!-- jquery ui: datepicker no calendar -->
    <style type="text/css">
        .ui-datepicker-calendar {
            display: none;
        }
    </style>

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

    <div class="uploadport">
        <div class="subitem-title"><h4>|&ensp;上傳新作品集</h4>&emsp;<h5>Upload new Portfolio</h5><h4>&ensp;|</h4></div>
        <div class="uploadport-content">
            <ul id="uploadlist">
                <form enctype="multipart/form-data" name="form" method="post" action="uploadport_finish.php">
                    <li>
                        <font class="uploadtitle">作品集名稱：</font>
                        <input type="text" id="newportname-bar" name="newportname" placeholder="輸入作品集名稱" required>
                    </li>
                    <li>
                        <font class="uploadtitle">作品集時間：</font>
                        <input type="text" id="datepicker" name="newporttime" placeholder="請點擊選擇時間" required>
                    </li>
                    <li>
                        <font class="uploadtitle">作品集類型：</font>
                        <select id="newportclass-select" name="newportclass">
                          <option value="繪畫作品">繪畫作品</option>
                          <option value="攝影照片">攝影照片</option>
                        </select>
                    </li>
                    <li>
                        <font class="uploadtitle">作品集描述：</font>
                    </li>
                        <textarea id="newportinfo-textarea" name="newportintro" placeholder="輸入作品集簡介" required></textarea>
                    <li>
                        <font class="uploadtitle">上傳照片：</font>&ensp;
                        <font color="#932534" style="font-size: 12px; letter-spacing: 1.5px;">〔 請點選想要的照片做為作品集封面 〕</font>
                        <div class="uploadimage-form">
                            <div id="image-row">
                                <div class="image-upload">
                                    <div class="image-choose">
                                        <input type="radio" name="portcover" value="pimage1">
                                    </div>
                                    <div class="image-edit">
                                        
                                        <label data-id="0"><input type="file" id="imageUpload" name="newportimage0" accept=".png, .jpg, .jpeg" data-id="0" /></label>
                                    </div>
                                    <div class="image-preview">
                                        <div id="imagePreview" class="imgUpload" style="background-image: url(images/uploadimagepic_default.png);" data-id="0"></div>
                                    </div>
                                    <div class="image-intro">
                                        <input type="text" id="newimageintro-bar" name="newportimageintro0" placeholder="輸入照片描述" required>
                                    </div>
                                </div>
                                <div class="image-upload">
                                    <div class="image-choose">
                                        <input type="radio" name="portcover" value="pimage2">
                                    </div>
                                    <div class="image-edit">
                                        
                                        <label data-id="1"><input type="file" id="imageUpload" name="newportimage1" accept=".png, .jpg, .jpeg" data-id="1"/></label>
                                    </div>
                                    <div class="image-preview">
                                        <div id="imagePreview" class="imgUpload" style="background-image: url(images/uploadimagepic_default.png);" data-id="1"></div>
                                    </div>
                                    <div class="image-intro">
                                        <input type="text" id="newimageintro-bar" name="newportimageintro1" placeholder="輸入照片描述">
                                    </div>
                                </div>
                                <div class="image-upload">
                                    <div class="image-choose">
                                        <input type="radio" name="portcover" value="pimage3">
                                    </div>
                                    <div class="image-edit">
                                        
                                        <label data-id="2"><input type="file" id="imageUpload" name="newportimage2" accept=".png, .jpg, .jpeg" data-id="2"/></label>
                                    </div>
                                    <div class="image-preview">
                                        <div id="imagePreview" class="imgUpload" style="background-image: url(images/uploadimagepic_default.png);" data-id="2"></div>
                                    </div>
                                    <div class="image-intro">
                                        <input type="text" id="newimageintro-bar" name="newportimageintro2" placeholder="輸入照片描述">
                                    </div>
                                </div>
                            </div>
                            <div id="image-row">
                                <div class="image-upload">
                                    <div class="image-choose">
                                        <input type="radio" name="portcover" value="pimage4">
                                    </div>
                                    <div class="image-edit">
                                        
                                        <label data-id="3"><input type="file" id="imageUpload" name="newportimage3" accept=".png, .jpg, .jpeg" data-id="3"/></label>
                                    </div>
                                    <div class="image-preview">
                                        <div id="imagePreview" class="imgUpload" style="background-image: url(images/uploadimagepic_default.png);" data-id="3"></div>
                                    </div>
                                    <div class="image-intro">
                                        <input type="text" id="newimageintro-bar" name="newportimageintro3" placeholder="輸入照片描述">
                                    </div>
                                </div>
                                <div class="image-upload">
                                    <div class="image-choose">
                                        <input type="radio" name="portcover" value="pimage5">
                                    </div>
                                    <div class="image-edit">
                                        
                                        <label data-id="4"><input type="file" id="imageUpload" name="newportimage4" accept=".png, .jpg, .jpeg" data-id="4"/></label>
                                    </div>
                                    <div class="image-preview">
                                        <div id="imagePreview" class="imgUpload" style="background-image: url(images/uploadimagepic_default.png);" data-id="4"></div>
                                    </div>
                                    <div class="image-intro">
                                        <input type="text" id="newimageintro-bar" name="newportimageintro4" placeholder="輸入照片描述">
                                    </div>
                                </div>
                                <div class="image-upload">
                                    <div class="image-choose">
                                        <input type="radio" name="portcover" value="pimage6">
                                    </div>
                                    <div class="image-edit">
                                        
                                        <label data-id="5"><input type="file" id="imageUpload" name="newportimage5" accept=".png, .jpg, .jpeg" data-id="5"/></label>
                                    </div>
                                    <div class="image-preview">
                                        <div id="imagePreview" class="imgUpload" style="background-image: url(images/uploadimagepic_default.png);" data-id="5"></div>
                                    </div>
                                    <div class="image-intro">
                                        <input type="text" id="newimageintro-bar" name="newportimageintro5" placeholder="輸入照片描述">
                                    </div>
                                </div>
                            </div>
                            <div class="introplus">〔 按 + 可再新增 3 張照片 〕</div>
                            <a href="#" class="center-circle imageupload" id="imageupload-link">+</a>
                        </div>
                    </li>
                    <hr width="70%" style="margin: 30px 0 10px 0;">
                    <input type="submit" name="button" value="上傳作品集" class="btn btn-default uploadportfile-btn"/>
                </form>
            </ul> 
        </div>
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

    <!-- jquery ui: datepicker -->
    <script>
        $(function() {
            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'MM yy',
                onClose: function(dateText, inst) { 
                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                }
            });
        });
    </script>


</body>

</html>