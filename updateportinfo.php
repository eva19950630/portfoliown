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
        <div class="subitem-title"><h4>|&ensp;更新作品集資訊</h4>&emsp;<h5>Update Portfolio Information</h5><h4>&ensp;|</h4></div>
        <div class="uploadport-content">
            <ul id="uploadlist">
                <li>
                    <font class="uploadtitle">作品集名稱：</font>
                    <input type="text" id="newportname-bar" placeholder="輸入作品集名稱" required>
                </li>
                <li>
                    <font class="uploadtitle">作品集時間：</font>
                    <input type="text" id="datepicker" placeholder="請點擊選擇時間" required>
                </li>
                <li>
                    <font class="uploadtitle">作品集類型：</font>
                    <select id="newportclass-select">
                      <option value="painting">繪畫作品</option>
                      <option value="photo">攝影照片</option>
                    </select>
                </li>
                <li>
                    <font class="uploadtitle">作品集描述：</font>
                </li>
                    <textarea id="newportinfo-textarea" placeholder="輸入作品集簡介"></textarea>
            </ul>
            <hr width="70%" style="margin: 50px 0 10px 0;">
            <button type="button" class="btn btn-default uploadportfile-btn">更新作品集資訊</button>
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