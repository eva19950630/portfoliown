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

<?php
if ($_SESSION['email'] != null) {
    echo "<li class=\"afterlogin\">";
    echo "<a href=\"userportfolio.php\" id=\"link-userpic\">";

    if ($row[6] != null)
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row[6]).'" height="35" width="35" id="user-pic"/>';
    else
        echo "<img src=\"images/userpic_default.png\" height=\"35\" width=\"35\" id=\"user-pic\">";

    echo "<font class=\"username\" style=\"margin: 0 0 0 10px;\">$row[1]</font>";
    echo "</a>";
    echo "</li>";
    echo "<li class=\"afterlogin\">";
    echo "<a href=\"userlogout.php\">登出</a><span class=\"hover\"></span>";
    echo "</li>";
} else {
    echo "<li class=\"beforelogin\">";
    echo "<a href=\"\" id=\"click-signup\" data-toggle=\"modal\">註冊</a><span class=\"hover\"></span>";
    echo "</li>";
    echo "<li class=\"beforelogin\">";
    echo "<a href=\"\" id=\"click-login\" data-toggle=\"modal\">登入</a><span class=\"hover\"></span>";
    echo "</li>";
}
?>

                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sign up Modal -->
    <div class="modal fade" id="signup-modal" role="dialog">
        <div class="modal-dialog">
            <div id="signup-box">
                <div class="top" style="padding: 15px;">
                    <button type="button" class="close" data-dismiss="modal" style="outline: 0; color: #222B31;"><i class="fa fa-times"></i></button>
                </div>
                <div class="content">
                    <div class="title">
                        <div class="chtitle">建立新帳號</div>
                        <div class="engtitle">Create new account</div>
                    </div>
                    <form name="form" method="post" action="register_finish.php">
                        <input type="text" id="newaccount-bar" name="newusername" placeholder="使用者帳號" required><i class="fa fa-user-o input-icon"></i>
                        <input type="text" id="newemail-bar" name="newemail" placeholder="EMAIL" required><i class="fa fa-envelope-o input-icon"></i>
                        <input type="password" id="newpass-bar" name="newpassword" placeholder="建立密碼" required><i class="fa fa-key input-icon"></i>
                        <input type="password" id="newretypepass-bar" name="newpassword2" placeholder="再次輸入密碼" required><i class="fa fa-key input-icon"></i>
                        <input type="submit" name="button" value="註冊" class="btn btn-default"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Sign up Modal -->

    <!-- Log in Modal -->
    <div class="modal fade" id="login-modal" role="dialog">
        <div class="modal-dialog">
            <div id="login-box">
                <div class="top" style="padding: 15px;">
                    <button type="button" class="close" data-dismiss="modal" style="outline: 0; color: #222B31;"><i class="fa fa-times"></i></button>
                </div>
                <div class="content">
                    <div class="title">
                        <div class="chtitle">登入</div>
                        <div class="engtitle">Login</div>
                    </div>
                    <form name="form" method="post" action="userlogin_connect.php">
                        <input type="text" id="email-bar" name="email" placeholder="輸入EMAIL" required><i class="fa fa-envelope-o input-icon"></i>
                        <input type="password" id="pass-bar" name="password" placeholder="輸入密碼" required><i class="fa fa-key input-icon"></i>
                        <input type="submit" name="button" value="登入" class="btn btn-default"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Log in Modal -->

    <!-- mainsection -->
    <div class="mainsection">
        <!-- section: introduction -->
        <section class="section active" id="index-section" data-section="1">
            <div class="index-intro">
                <div class="intro-slogan">
                    Introduction
                </div>
                <div class="intro-btn">
                    <button type="button" class="btn btn-default">開始製作你的作品集吧</button>
                </div>
                <div class="intro-arrow">
                    <div class="mouse_scroll">
                        <a href="#browse-section" data-smooth-scroll>
                            <div>
                                <span class="m_scroll_arrows unu"></span>
                                <span class="m_scroll_arrows doi"></span>
                                <span class="m_scroll_arrows trei"></span>
                            </div>
                        </a>
                    </div>
                </div>   
            </div>
        </section>

<?php
$sql = "SELECT * FROM portfolio_table";
$result = mysqli_query($Link, $sql);
$rowscount = mysqli_num_rows($result);
?>

        <!-- section: browse portfolios -->
        <section class="section" id="browse-section" data-section="2">
            <div class="index-browse">
                <div class="browse-title">
                    <h2><span>popular portfolio</span></h2>
                </div>
                <div class="browse-rowalbums">
                    <ul id="albums" class="indexalbums">
                        <?php 
                        for ($i = 0; $i < 8; $i++) {
                            $row = mysqli_fetch_row($result);

                            $user_id = $row[7];
                            if ($user_id != 0) {
                                $sql2 = "SELECT * FROM user_table where user_id='$user_id'";
                                $result2 = mysqli_query($Link, $sql2);
                                $rowscount2 = mysqli_num_rows($result2);
                                for ($j = 0; $j < $rowscount2; $j++)
                                    $row2 = mysqli_fetch_row($result2);
                            }
                        ?>
                        <li>
                            <a href="" title="">
                                <img src="http://tinyurl.com/ojco2eh" width="" height="" alt="" />
                                <img src="http://tinyurl.com/ojco2eh" width="" height="" alt="" />
                                <img src="http://tinyurl.com/ojco2eh" width="" height="" alt="" />
                            </a>
                            <h5><?php echo $row[1] ?></h5>
                            <h6>|&ensp;<?php echo $row2[1] ?>&ensp;|</h6>&emsp;
                            <h6>|&ensp;<?php echo $row[6] ?> ★&ensp;|</h6>
                        </li>
                        <?php } ?>
                    </ul><!-- end albums -->
                </div>
            </div>
        </section>
    </div>

    <!-- footer -->
    <div class="index-footer">
        <div class="footer-content">
            <h3>Copyright by <span class="footer-name">Syuan Shih</span></a> , 2017 ©</h3>
            <h3>
                <a class="footer-link" href="mailto:fun910347@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a>&ensp;
                <a class="footer-link" href="https://www.facebook.com/eva19950630" target="_blank"><i class="fa fa-facebook"></i></a>&ensp;
                <a class="footer-link" href="https://github.com/eva19950630" target="_blank"><i class="fa fa-github" style="font-size: 17px;"></i></a>
            </h3>
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
    <!-- scrollarrow js -->
    <script type="text/javascript" src="js/scrollarrow.js"></script>
    


</body>

</html>