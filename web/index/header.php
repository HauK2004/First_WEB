<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from easetemplate.com/free-website-templates/mobistore/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Nov 2021 09:40:15 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="create ecommerce website template for your online store, responsive mobile templates">
    <meta name="keywords" content="ecommerce website templates, online store,">
    <title>Nhom 21 LT WEB</title>
    <!-- Bootstrapppppp -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- owl-carousel -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

<div class="header-wrapper">
    <div class="container-fulid">
        <div class="row">
            <!-- logo -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
                <div class="logo">
                    <a href="index.php"><img src="picture/logo.png" alt="" style="background-color: #90EE90; margin-left: 49%; padding: 5px; border-radius: 2px;"> </a>
                </div>
            </div>
            <!-- /.logo -->
            <!-- search -->
            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                <div class="search-bg">
                    <input type="text" class="form-control" placeholder="Search Here">
                    <button type="Submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
            
            <!-- /.search -->
            <!-- account -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                <div class="account-section">
                    <ul>
                    <?php
                        if (isset($_SESSION['email'])) {
                            echo '<li><a href="index.php?page=account" class="title hidden-xs">'.$_SESSION['email'].'</a></li>';
                        } else {
                            echo '<li><a href="index.php?page=login" class="title hidden-xs">Đăng nhập</a></li>';
                        }
                        ?>
                        <li><a href="index.php?page=favorite"><i class="fa fa-heart"></i></a></li>


                        <li><a href="index.php?page=cart" class="title"><i class="fa fa-shopping-cart"></i>   <sup class="cart-quantity">
                        <?php 
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];

$sql1 = "SELECT *
FROM giohang
INNER JOIN  khachhang ON giohang.ma_kh = khachhang.ma_kh
WHERE khachhang.email='$email' AND giohang.tinhtrang='' AND giohang.level=''";
$query2 = $db->get_list($sql1);
$count = mysqli_num_rows($query2);}else{
    echo 0;
}
?>
                        </sup></a>
                        </li>
                    </ul>
                </div>
                <!-- /.account -->
            </div>
            <!-- search -->
        </div>
    </div>
    <!-- navigation -->
    <div class="navigation container" style="background-color: #90EE90; max-width: 77%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- navigations-->
                    <div id="navigation">
                        <ul>
                            <li class="active"><a href="index.php">Trang chủ</a></li>
                            <li><a href="index.php?page=allPro">Tất cả sản phẩm</a>
                            </li>
                            <li><a href="#">Thông tin</a>
                            </li>
                        
                            <li><a href="index.php?page=contact">Liên hệ, hỗ trợ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.navigations-->
            </div>
        </div>
    </div>
</div>