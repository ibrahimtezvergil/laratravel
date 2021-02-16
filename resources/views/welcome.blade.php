<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{asset('panel/assets/img/icon.ico')}}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{asset('panel/assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset('panel/assets/css/fonts.min.css')}}']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('panel/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/assets/css/atlantis.min.css')}}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('panel/assets/css/demo.css')}}">
</head>
<body data-background-color="dark">
<div id="app">
    <div class="wrapper">
        <div class="main-header" id="main-header" style="display: none">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark2">

                <a href="index.html" class="logo">
                    <img src="/assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon-menu"></i>
                        </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ." class="form-control">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                            </a>
                            <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                                <li>
                                    <div class="dropdown-title d-flex justify-content-between align-items-center">
                                        Messages
                                        <a href="#" class="small">Mark all as read</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="/assets/img/jm_denis.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jimmy Denis</span>
                                                    <span class="block">
                                                            How are you ?
                                                        </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="/assets/img/chadengle.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Chad</span>
                                                    <span class="block">
                                                            Ok, Thanks !
                                                        </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="/assets/img/mlane.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jhon Doe</span>
                                                    <span class="block">
                                                            Ready for the meeting today.
                                                        </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="/assets/img/talha.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Talha</span>
                                                    <span class="block">
                                                            Hi, Apa Kabar ?
                                                        </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <router-link to="/logout" class="nav-link " >
                                <i class="fas fa-sign-out-alt"></i>
                                Çıkış Yap
                            </router-link>

                        </li>


                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" id="sidebar" style="display: none" data-background-color="dark2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="/assets/img/profile.jpg" alt="." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        Hizrian
                                        <span class="user-level">Administrator</span>
                                        <span class="caret"></span>
                                    </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="#profile">
                                            <span class="link-collapse">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#edit">
                                            <span class="link-collapse">Edit Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#settings">
                                            <span class="link-collapse">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="dashboard">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/demo1/index.html">
                                            <span class="sub-item">Dashboard 1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/demo2/index.html">
                                            <span class="sub-item">Dashboard 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Base</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="components/avatars.html">
                                            <span class="sub-item">Avatars</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/buttons.html">
                                            <span class="sub-item">Buttons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/gridsystem.html">
                                            <span class="sub-item">Grid System</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/panels.html">
                                            <span class="sub-item">Panels</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/notifications.html">
                                            <span class="sub-item">Notifications</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/sweetalert.html">
                                            <span class="sub-item">Sweet Alert</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/font-awesome-icons.html">
                                            <span class="sub-item">Font Awesome Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/simple-line-icons.html">
                                            <span class="sub-item">Simple Line Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/flaticons.html">
                                            <span class="sub-item">Flaticons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/typography.html">
                                            <span class="sub-item">Typography</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#sidebarLayouts">
                                <i class="fas fa-th-list"></i>
                                <p>Sidebar Layouts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="sidebarLayouts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="sidebar-style-1.html">
                                            <span class="sub-item">Sidebar Style 1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="overlay-sidebar.html">
                                            <span class="sub-item">Overlay Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="compact-sidebar.html">
                                            <span class="sub-item">Compact Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="static-sidebar.html">
                                            <span class="sub-item">Static Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="icon-menu.html">
                                            <span class="sub-item">Icon Menu</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#forms">
                                <i class="fas fa-pen-square"></i>
                                <p>Forms</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="forms">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="forms/forms.html">
                                            <span class="sub-item">Basic Form</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#tables">
                                <i class="fas fa-table"></i>
                                <p>Tables</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="tables">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="tables/tables.html">
                                            <span class="sub-item">Basic Table</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables/datatables.html">
                                            <span class="sub-item">Datatables</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#maps">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>Maps</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="maps">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="maps/jqvmap.html">
                                            <span class="sub-item">JQVMap</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#charts">
                                <i class="far fa-chart-bar"></i>
                                <p>Charts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="charts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="charts/charts.html">
                                            <span class="sub-item">Chart Js</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="charts/sparkline.html">
                                            <span class="sub-item">Sparkline</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Widgets</p>
                                <span class="badge badge-success">4</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#submenu">
                                <i class="fas fa-bars"></i>
                                <p>Menu Levels</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="submenu">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a data-toggle="collapse" href="#subnav1">
                                            <span class="sub-item">Level 1</span>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="subnav1">
                                            <ul class="nav nav-collapse subnav">
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">Level 2</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">Level 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a data-toggle="collapse" href="#subnav2">
                                            <span class="sub-item">Level 1</span>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="subnav2">
                                            <ul class="nav nav-collapse subnav">
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">Level 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">Level 1</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mx-4 mt-2">
                            <a href="http://themekita.com/atlantis-bootstrap-dashboard.html" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-heart"></i> </span>Buy Pro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <router-view></router-view>
                </div>
            </div>
{{--            <footer class="footer">--}}
{{--                <div class="container-fluid">--}}
{{--                    <nav class="pull-left">--}}
{{--                        <ul class="nav">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="https://www.themekita.com">--}}
{{--                                    ThemeKita--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#">--}}
{{--                                    Help--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#">--}}
{{--                                    Licenses--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                    <div class="copyright ml-auto">--}}
{{--                        2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </footer>--}}
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br/>
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="changeTopBarColor" data-color="white"></button>
                            <br/>
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeSideBarColor" data-color="white"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="selected changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                            <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                            <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                            <button type="button" class="selected changeBackgroundColor" data-color="dark"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="flaticon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('panel/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('panel/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('panel/assets/js/core/bootstrap.min.js')}}"></script>

<script type="text/javascript">
    let token=localStorage.getItem('token');
    if(token){
        $('#sidebar').css('display','');
        $('#main-header').css('display','');
    }
</script>
<!-- jQuery UI -->
<script src="{{asset('panel/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('panel/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('panel/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


<!-- Chart JS -->
<script src="{{asset('panel/assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('panel/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('panel/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('panel/assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('panel/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('panel/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('panel/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('panel/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Atlantis JS -->
<script src="{{asset('panel/assets/js/atlantis.min.js')}}"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{asset('panel/assets/js/setting-demo.js')}}"></script>
<script src="{{asset('panel/assets/js/demo.js')}}"></script>
<script>
    $('#lineChart').sparkline([102,109,120,99,110,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#lineChart2').sparkline([99,125,122,105,110,124,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#lineChart3').sparkline([105,103,123,100,95,105,115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });
</script>
</body>
</html>
