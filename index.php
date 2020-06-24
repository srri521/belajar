<?php
require 'function/function.php';

$page = isset($_GET["page"]) ? $_GET["page"] : false;
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/bizadmin/demo/main/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:06:57 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Lembaga Bimbingan Belajar</title>
    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Biz Admin is a Multipurpose bootstrap 4 Based Dashboard & Admin Site Responsive Template by uxliner." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Biz Admin, Biz Adminadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="uxliner" />
    <!-- v4.1.3 -->
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="dist/img/favicon-16x16.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
    <link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="dist/css/simple-lineicon/simple-line-icons.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="skin-blue sidebar-mini">
    <div class="wrapper boxed-wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo blue-bg">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="dist/img/small-fkc.png" alt=""></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="dist/img/big-fkc1.png" alt=""></span> </a>
            <!-- Header Navbar -->
            <nav class="navbar blue-bg navbar-static-top">
                <!-- Sidebar toggle button-->
                <ul class="nav navbar-nav pull-left">
                    <li><a class="sidebar-toggle" data-toggle="push-menu" href="#"></a> </li>
                </ul>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account  -->
                        <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="dist/img/u2.png" class="user-image" alt="User Image"> <span class="hidden-xs">Admin</span> </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <div class="pull-left user-img"><img src="dist/img/u2.png" class="img-responsive img-circle" alt="User"></div>
                                    <p class="text-left">Admin <small>alexander@gmail.com</small> </p>
                                </li>
                                <li><a href="index.php?page=userEdit"><i class="icon-profile-male"></i> My Profile</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?page=userKelola"><i class="icon-gears"></i> Account Setting</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li> <a href="#" data-toggle="control-sidebar"><i class="fa fa-gear animated "></i></a> </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="image text-center"><img src="dist/img/u2.png" class="img-circle" alt="User Image"> </div>
                    <div class="info">
                        <p>Admin</p>
                        <a href="#"><i class="fa fa-gear"></i></a> <a href="#"><i class="fa fa-power-off"></i></a>
                    </div>
                </div>

                <!-- sidebar menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">PERSONAL</li>

                    <li > <a href="index.php?page=formDashboard"> <i class="icon-home"></i> <span>Dashboard</span> <span class="pull-right-container"></i> </span> </a>
                    </li>
                    <li > <a href="index.php?page=formMurid"> <i class="icon-people icons"></i> <span>Pengelolaan Murid</span> <span class="pull-right-container"> </span> </a>
                    </li>
                    <li > <a href="index.php?page=formPembayaran"> <i class="icon-book-open icons"></i> <span>Data Pembayaran</span> <span class="pull-right-container"> </i> </span> </a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header sty-one">
                <h1>Blank page</h1>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Pages</a></li>
                    <li><i class="fa fa-angle-right"></i> Blank page</li>
                </ol>
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $file = "page/$page.php";
                                if (file_exists("$file")) {
                                    include_once($file);
                                } else {
                                    echo "<h3>Halaman Belum dibuat</h3>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">Version 1.0</div>
            Copyright © 2020 fawwaz kiddy club. All rights reserved.
        </footer>


        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="dist/js/jquery.min.js"></script>
    <script src="dist/bootstrap/js/bootstrap.min.js"></script>

    <!-- template -->
    <script src="dist/js/bizadmin.js"></script>

    <!-- for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

<!-- Mirrored from uxliner.com/bizadmin/demo/main/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:06:57 GMT -->

</html>