<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('BE/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset ('BE/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Trang admin
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset ('BE/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset ('BE/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset ('BE/assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="">
    <?php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user(); ?>
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="{{ URL::to('admin/dashboard') }}" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="{{ asset ('BE/assets/img/logo-small.png') }}">
                    </div>
                    <!-- <p>CT</p> -->
                </a>
                <a href="{{ URL::to ('admin/dashboard') }}" class="simple-text logo-normal">
                    Creative Tim
                    <!-- <div class="logo-image-big">
          
          </div> -->
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active ">
                        <a href="{{ URL::to ('admin/dashboard') }}">
                            <i class="nc-icon nc-bank"></i>
                            <p>Trang chủ</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/add_category') }}">
                            <i class="nc-icon nc-app"></i>
                            <p>Thêm danh mục</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/list_category') }}">
                            <i class="nc-icon nc-paper"></i>
                            <p>Danh sách danh mục</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/add_product') }}">
                            <i class="nc-icon nc-box-2"></i>
                            <p>Thêm sản phẩm</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/list_product') }}">
                            <i class="nc-icon nc-calendar-60"></i>
                            <p>Danh sách sản phẩm</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/list_checkout') }}">
                            <i class="nc-icon nc-delivery-fast"></i>
                            <p>Danh sách đơn hàng</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/index_permission') }}">
                            <i class="nc-icon nc-laptop"></i>
                            <p>Thêm quyền</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/list_permission') }}">
                            <i class="nc-icon nc-spaceship"></i>
                            <p>Danh sách quyền</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/index_role') }}">
                            <i class="nc-icon nc-album-2"></i>
                            <p>Thêm vai trò</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/list_role') }}">
                            <i class="nc-icon nc-badge"></i>
                            <p>Danh sách vai trò</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/add_user') }}">
                            <i class="nc-icon nc-user-run"></i>
                            <p>Thêm người dùng</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="{{ URL::to ('admin/list_user') }}">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Quản lí người dùng</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">Trang admin</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form action="{{ URL::to('admin/search_check_out') }}" method="get">
                            <div class="input-group no-border">
                                <input type="date" name="date_delivery" class="form-control"
                                    placeholder="Search order...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <input type="submit" value="Tìm kiếm">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-magnify" href="javascript:;">
                                    <i class="nc-icon nc-layout-11"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-rotate" href="<?= url('admin/log_out'); ?>">
                                    <i class="nc-icon nc-button-power"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    @yield('admin_content')
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
    </script>
</body>

</html>