<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang quản trị</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css"/>
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php if (isset($_SESSION['admin'])): ?>
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <span class="logo-mini" style="font-size: 15px">Admin</span>
            <span class="logo-lg"><b>Victoria</b>  Coffee</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="hide_menu" onclick="myfunction()"></a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="assets/images/avatar.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">Nguyễn Thanh Tình</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="assets/images/avatar.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Nguyễn Thanh Tình - Web Developer
                                    <small>Thành viên từ năm 2019</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="index.php?controller=admin&action=detail&id=<?php echo $_SESSION['admin']['id'];?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="index.php?controller=admin&action=logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="assets/images/avatar.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Nguyễn Thanh Tình</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">LAOYOUT ADMIN</li>
                <li>
                    <a href="index.php?controller=admin&action=index">
                        <i class="fas fa-user-shield"></i> <span> Quản lý Admin</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li >
                    <a href="index.php?controller=role&action=index">
                        <i class="fas fa-users-cog"></i> <span id="category"> Quản lý quyền</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li id="menu_news">
                    <a>
                        <i class="fas fa-newspaper"></i> <span> Quản lý tin tức</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <ul id="list_news">
                    <li>
                        <a href="index.php?controller=news&action=index">
                            <i class="fas fa-chevron-circle-right"></i> <span> Nội dung tin tức</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?controller=category&action=index">
                            <i class="fas fa-chevron-circle-right"></i> Danh mục tin tức</span>
                            <span class="pull-right-container"></span>
                        </a>
                    </li>
                </ul>

                <li id="menu_sp">
                    <a >
                        <i class="fas fa-cash-register"></i> <span id="category"> Quản lý sản phẩm</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <ul id="list1">
                    <li> <a href="index.php?controller=doansang&action=index"> <i class="fas fa-chevron-circle-right"></i> Đồ ăn sáng</a></li>
                    <li> <a href="index.php?controller=doanchinh&action=index"><i class="fas fa-chevron-circle-right"></i> Đồ ăn chính</a></li>
                    <li> <a href="index.php?controller=drink&action=index"><i class="fas fa-chevron-circle-right"></i> Thức uống</a></li>
                    <li> <a href="index.php?controller=ruou&action=index"><i class="fas fa-chevron-circle-right"></i> Rượu</a></li>
                </ul>
            </ul>

        </section>
    </aside>
    <div style="margin-left: 230px">
        <?php  if(isset($_SESSION['error'])):?>
        <div class="alert alert-danger">
            <?php
            echo $_SESSION['error'] ;
            unset($_SESSION['error'])
            ?>

        </div>
        <?php  endif; ?>
        <?php  if(isset($_SESSION['success'])):?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'] ;
                unset($_SESSION['success'])
                ?>

            </div>
        <?php  endif; ?>

    </div>
    <?php endif;?>