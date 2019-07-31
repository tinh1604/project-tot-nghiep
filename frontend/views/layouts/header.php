<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
    <meta charset="UTF-8">
    <title>Cách nhận biết cà phê ngon và cà phê nguyên chất</title>
    <meta name="viewport" content="width=device-width,
     initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/news.css"/>
    <link rel="stylesheet" href="assets/css/all.min.css"/>
</head>
<body>
<?php require_once 'views/layouts/slide.php'?>
<div id="block1">
    <div id="header" style="background: none">
<!--    <div id="header">-->
        <ul id="menu1">
            <li><a href="DangNhap.html" class="hvr-shrink">Đăng nhập</a></li>
            <li><a href="DangKi.html" class="hvr-shrink">Đăng kí</a></li>
            <li><a href="DonHang.html" class="hvr-shrink">Đơn hàng</a></li>
            <li><a target="_blank"
                   href="https://www.google.com/maps/place/C%C3%A0+ph%C3%AA+Victoria/@10.8228413,106.4580601,17z/data=!3m1!4b1!4m5!3m4!1s0x310ad41594229c33:0x7ac7ea49fbb02db7!8m2!3d10.8228413!4d106.4602488?hl=vi"
                   class="hvr-shrink">Bản đồ</a></li>
        </ul>

        <img id="img1" src="assets/imgs/logo3.jpg"/>
        <ul id="menu2">
            <li><a href="<?php echo 'index.php'?>" class="hvr-float-shadow">Trang chủ</a></li>
            <li><a href="<?php echo 'index.php?controller=home&action=intro'?>" class="hvr-float-shadow">Giới thiệu</a></li>
            <li id="menu5" onclick="myfunction()"><a class="hvr-float-shadow">Thực đơn <i class="fas fa-sort-down"> </i></a>
                <ul id="submenu">
                    <li><a href="DoAnSang.html">Điểm tâm sáng</a></li>
                    <li><a href="DoAnChinh.html">Món chính</a></li>
                    <li><a href="ThucUong.html">Thức uống</a></li>
                    <li><a href="Ruou.html">Rượu</a></li>
                </ul>
            </li>
            <li><a href="DichVu.html" class="hvr-float-shadow">Dịch vụ</a></li>
            <li><a href="LienHe.html" class="hvr-float-shadow">Liên hệ</a></li>
        </ul>
        <div id="menu4" class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                </div>
                <div class="col-md-4 col-12">
                    <p id="content1">Have A Sweet Time!</p>
                    <p id="content2">GOOD coffee</p>
                </div>
                <div id="menu3" class="col-md-2 col-4">
                    <p id="content3">Thực đơn chính</p>
                    <a href="DoAnSang.html" class="hvr-forward"><i class="fas fa-hamburger"></i> Điểm tâm sáng</a> <br/>
                    <a href="DoAnChinh.html" class="hvr-forward"><i class="fas fa-utensils"></i> Cơm trưa</a> <br/>
                    <a href="ThucUong.html" class="hvr-forward"><i class="fas fa-coffee"></i> Thức uống</a>
                </div>

            </div>
        </div>
    </div>
