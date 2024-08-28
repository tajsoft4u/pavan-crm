<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="CRM" content="CRM">
    <meta name="CRM" content="CRM">
    <meta name="CRM" content="CRM">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url() ?>assets/admin_assets/logo/logo.png" type="image/x-icon" style="border-radius:30px" />
    <!-- Title -->
    <title>CRM</title>
    <!-- Bootstrap css-->
    <link href="<?php echo base_url() ?>assets/admin_assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Icons css-->
    <link href="<?php echo base_url() ?>assets/admin_assets/css/icons.css" rel="stylesheet" />
    <!-- Style css-->
    <link href="<?php echo base_url() ?>assets/admin_assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin_assets/css/dark-boxed.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin_assets/css/boxed.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin_assets/css/skins.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin_assets/css/dark-style.css" rel="stylesheet">
    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/admin_assets/css/colors/color.css">
    <!-- Select2 css -->
    <link href="<?php echo base_url() ?>assets/admin_assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <!-- Internal DataTables css-->
    <link href="<?php echo base_url() ?>assets/admin_assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/admin_assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/admin_assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet" />
    <!-- Sidemenu css-->
    <link href="<?php echo base_url() ?>assets/admin_assets/css/sidemenu/sidemenu.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/1.2.5/jquery.easy-pie-chart.css" rel="stylesheet">
    <!-- Bootstrap Validations -->
    <script src="<?php echo base_url() ?>assets/admin_assets/validations/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/validations/bootstrap.min.js"></script>
    <link href="<?php echo base_url() ?>assets/admin_assets/plugins/gallery/gallery.css" rel="stylesheet">
    <!-- Internal Sweet-Alert css-->
    <link href="<?php echo base_url() ?>assets/admin_assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">
    <script src="http://rendro.github.io/easy-pie-chart/javascripts/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/sweet-alert/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/sweet-alert/jquery.sweet-alert.js"></script>
    <script src="https://unpkg.com/chart.js@2.8.0/dist/Chart.bundle.js"></script>
    <script src="https://unpkg.com/chartjs-gauge@0.3.0/dist/chartjs-gauge.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/js/progressbar.js"></script>
    <!-- Gallery -->
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/gallery/picturefill.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/gallery/lightgallery.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/gallery/lightgallery-1.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/gallery/lg-pager.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/gallery/lg-autoplay.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/gallery/lg-fullscreen.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/gallery/lg-zoom.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/gallery/lg-hash.js"></script>
    <script src="<?php echo base_url() ?>assets/admin_assets/plugins/gallery/lg-share.js"></script>
    <!-- Gallery -->
    <style type="text/css">
        .canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
        .help-block {
            color: red;
        }
        .has-success .help-block {
            color: green;
        }
        .link:hover {
            color: white;
        }

        ::-webkit-scrollbar {
            height: 10px;
            /* height of horizontal scrollbar ← You're missing this */
            width: 10px;
            /* width of vertical scrollbar */
            border: 1px solid #d5d5d5;
        }
    </style>
    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            left: 100%;
            /* -6px gives dropdown-menu's padding+border */
            top: -6px;
        }

        .dropdown-submenu:hover>.dropdown-menu,
        .dropdown-submenu>a:focus+.dropdown-menu {
            /* :focus support is incomplete - pressing Tab sets focus to submenu, but that immediately hides submenu */
            display: block;
        }
    </style>
</head>

<body class="main-body leftmenu light-leftmenu">


    <!-- Page -->
    <div class="page" style="background-image: linear-gradient(#182a4d 50%, white 50%);">

        <!-- Sidemenu -->
        <div class="main-sidebar main-sidebar-sticky side-menu">

            <div class="sidemenu-logo"> <a class="main-logo" href="<?php echo base_url('home') ?>">
                    <img src="<?php echo base_url() ?>assets/admin_assets/logo/logo.png" class="header-brand-img desktop-logo" alt="logo" style="max-width: 120px;">
                    <img src="<?php echo base_url() ?>assets/admin_assets/logo/logo.png" class="header-brand-img icon-logo" alt="logo">
                    <img src="<?php echo base_url() ?>assets/admin_assets/logo/logo.png" class="header-brand-img desktop-logo theme-logo" alt="logo" style="max-width: 120px;">
                    <img src="<?php echo base_url() ?>assets/admin_assets/logo/logo.png" class="header-brand-img icon-logo theme-logo" alt="logo"> </a> </div>

            <div class="main-sidebar-body">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="<?php echo base_url('home') ?>"><i class="fe fe-home text-light-purple sidemenu-icon"></i><span class="sidemenu-label text-light-purple">Home</span></a>
                    </li>

                    <li class="nav-item"> <a class="nav-link with-sub" href="#"><i class="fe fe-shopping-bag  text-dark-red sidemenu-icon"></i><span class="sidemenu-label text-dark">Orders</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item"> <a class="nav-sub-link" href="<?php echo base_url('addneworder') ?>" role="button"><i class="fa fa-plus text-danger" style="margin-right: 5px;"></i> Add New Order</a> </li>
                            <li class="nav-sub-item"> <a class="nav-sub-link" href="<?php echo base_url('pendingorders') ?>" role="button"><i class="fa fa-plus text-danger" style="margin-right: 5px;"></i> Pending Orders</a> </li>
                            <li class="nav-sub-item"> <a class="nav-sub-link" href="<?php echo base_url('completedorders') ?>" role="button"><i class="fa fa-plus text-danger" style="margin-right: 5px;"></i> Completed Orders</a> </li>
                            <li class="nav-sub-item"> <a class="nav-sub-link" href="<?php echo base_url('allorders') ?>" role="button"><i class="fa fa-plus text-danger" style="margin-right: 5px;"></i> All Orders</a> </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="<?php echo base_url('products') ?>"><i class="fe fe-box text-light-purple sidemenu-icon"></i><span class="sidemenu-label text-dark">Products</span></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link with-sub" href="#"><i class="fe fe-file-text text-dark-red sidemenu-icon"></i><span class="sidemenu-label text-dark">Service Providers</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-item"> <a class="nav-sub-link" href="<?php echo base_url('addnewserviceprovider') ?>" role="button"><i class="fa fa-plus text-danger" style="margin-right: 5px;"></i> Add New Provider</a> </li>
                            <li class="nav-sub-item"> <a class="nav-sub-link" href="<?php echo base_url('serviceproviders') ?>" role="button"><i class="fa fa-plus text-danger" style="margin-right: 5px;"></i>Service Providers</a> </li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><i class="fa fa-wrench text-warning sidemenu-icon"></i><span class="sidemenu-label text-dark">Service Due Settings</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#"><i class="fe fe-settings text-dark-red sidemenu-icon"></i><span class="sidemenu-label text-dark">Setting</span></a>
                    </li> -->
                </ul>

            </div>
        </div>
        <!-- End Sidemenu -->

        <!-- Main Header-->
        <div class="main-header side-header sticky sticky-pin bg-blue-theme" style="margin-bottom: -59px;">
            <div class="container-fluid">
                <div class="main-header-left"> <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a> </div>
                <div class="main-header-center">
                    <div class="responsive-logo">
                        <a href="<?php echo base_url() ?>">
                            <img src="<?php echo base_url() ?>assets/admin_assets/logo/logo.png" class="mobile-logo" alt="logo" style="max-width: 120px;"></a>
                        <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/admin_assets/logo/logo.png" class="mobile-logo-dark" alt="logo"></a>
                    </div>
                    <div class="input-group">
                        <div class="mt-0">
                            <form class="form-inline">
                                <div class="search-element"> <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1"> <button class="btn" type="submit"> <i class="fa fa-search"></i> </button> </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="main-header-right">
                    <div class="dropdown main-header-notification">
                        <a class="nav-link " href="">

                            <i class="fe fe-bell text-white" style="font-size: 25px;"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated p-0">
                            <div class="notifications-menu"> <a class="dropdown-item d-flex p-3 border-bottom rounded-top " href="#"> <span class="avatar avatar-md mr-3 fs-20 align-self-center cover-image bg-primary brround">
                                        <i class="fe fe-upload"></i> </span>
                                    <div> <span class="font-weight-bold text-dark"> New file Uploaded </span>
                                        <div class="small text-muted d-flex"> 5 hour ago </div>
                                    </div>
                                </a> <a class="dropdown-item d-flex p-3 border-bottom" href="#"> <span class="avatar avatar-md  fs-20 mr-3 align-self-center cover-image bg-teal brround">
                                        <i class="fe fe-arrow-up-circle"></i> </span>
                                    <div> <span class="font-weight-bold text-dark"> Account Updated</span>
                                        <div class="small text-muted d-flex"> 20 mins ago </div>
                                    </div>
                                </a> <a class="dropdown-item d-flex p-3 border-bottom" href="#"> <span class="avatar avatar-md fs-20 mr-3 align-self-center cover-image bg-info brround">
                                        <i class="fe fe-shopping-bag"></i> </span>
                                    <div> <span class="font-weight-bold text-dark"> Order's Recevied</span>
                                        <div class="small text-muted d-flex"> 1 hour ago </div>
                                    </div>
                                </a> <a class="dropdown-item d-flex p-3 border-bottom" href="#"> <span class="avatar avatar-md mr-3 fs-20 align-self-center cover-image bg-pink brround">
                                        <i class="fe fe-database"></i> </span>
                                    <div> <span class="font-weight-bold text-dark">Server Rebooted</span>
                                        <div class="small text-muted d-flex"> 2 hour ago </div>
                                    </div>
                                </a> </div> <a href="#" class="dropdown-item text-center notifications-menu1">View all
                                Notification</a>
                        </div>
                    </div>

                    <div class="">
                        <i class="fe fe-help-circle text-white" style="font-size: 25px;"></i>
                    </div>
                    <div class="dropdown main-profile-menu"> <a class="d-flex" href=""> <span class="main-img-user"><img alt="avatar" src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/users/2.jpg"></span> </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <h6 class="main-notification-title">Alexandra Churchill</h6>
                                <p class="main-notification-text">Web Designer</p>
                            </div> <a class="dropdown-item border-top" href="#"> <i class="fe fe-user"></i>
                                My Profile </a> <a class="dropdown-item" href="#"> <i class="fe fe-edit"></i>
                                Edit Profile </a> <a class="dropdown-item" href="#"> <i class="fe fe-settings"></i> Account Settings </a>
                            <a class="dropdown-item" href="#"> <i class="fe fe fe-unlock"></i> Lock screen </a> <a class="dropdown-item" href='<?php echo base_url('logout') ?>'> <i class="fe fe-power"></i> Sign Out </a>
                        </div>
                    </div> <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation"> <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i> </button>
                    <!-- Navresponsive closed -->
                </div>
            </div>
        </div>
        <!-- End Main Header-->

        <!-- Mobile-header -->
        <div class="mobile-main-header">
            <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="dropdown header-search"> <a class="nav-link icon header-search"> <i class="header-icons"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                        </path>
                                    </svg></i> </a>
                            <div class="dropdown-menu">
                                <div class="main-form-search p-2">
                                    <div class="">
                                        <div class="mt-0">
                                            <form class="">
                                                <div class="search-element d-flex"> <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1"> <button class="btn" type="submit"> <i class="fa fa-search"></i> </button> </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown main-header-notification"> <a class="nav-link icon" href=""> <i class="header-icons"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z">
                                        </path>
                                    </svg></i> <span class="badge badge-danger nav-link-badge">4</span> </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated p-0">
                                <div class="notifications-menu"> <a class="dropdown-item d-flex p-3 border-bottom rounded-top" href="#"> <span class="avatar avatar-md mr-3 fs-20 align-self-center cover-image bg-primary brround">
                                            <i class="fe fe-upload"></i> </span>
                                        <div> <span class="font-weight-bold text-dark"> New file Uploaded </span>
                                            <div class="small text-muted d-flex"> 5 hour ago </div>
                                        </div>
                                    </a> <a class="dropdown-item d-flex p-3 border-bottom" href="#"> <span class="avatar avatar-md  fs-20 mr-3 align-self-center cover-image bg-teal brround">
                                            <i class="fe fe-arrow-up-circle"></i> </span>
                                        <div> <span class="font-weight-bold text-dark"> Account Updated</span>
                                            <div class="small text-muted d-flex"> 20 mins ago </div>
                                        </div>
                                    </a> <a class="dropdown-item d-flex p-3 border-bottom" href="#"> <span class="avatar avatar-md fs-20 mr-3 align-self-center cover-image bg-info brround">
                                            <i class="fe fe-shopping-bag"></i> </span>
                                        <div> <span class="font-weight-bold text-dark"> Order's Recevied</span>
                                            <div class="small text-muted d-flex"> 1 hour ago </div>
                                        </div>
                                    </a> <a class="dropdown-item d-flex p-3 border-bottom" href="#"> <span class="avatar avatar-md mr-3 fs-20 align-self-center cover-image bg-pink brround">
                                            <i class="fe fe-database"></i> </span>
                                        <div> <span class="font-weight-bold text-dark">Server Rebooted</span>
                                            <div class="small text-muted d-flex"> 2 hour ago </div>
                                        </div>
                                    </a> </div> <a href="#" class="dropdown-item text-center notifications-menu1">View
                                    all Notification</a>
                            </div>
                        </div>
                        <div class="dropdown main-profile-menu">
                            <a class="d-flex" href="#"> <span class="main-img-user"><img alt="avatar" src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/users/2.jpg"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="header-navheading">
                                    <h6 class="main-notification-title">Alexandra Churchill</h6>
                                    <p class="main-notification-text">Web Designer</p>
                                </div> <a class="dropdown-item border-top" href="#"> <i class="fe fe-user"></i> My Profile </a> <a class="dropdown-item" href="#"> <i class="fe fe-edit"></i> Edit Profile </a> <a class="dropdown-item" href="#"> <i class="fe fe-settings"></i> Account
                                    Settings </a> <a class="dropdown-item"> <i class="fe fe fe-unlock"></i> Lock screen </a> <a class="dropdown-item" href='<?php echo base_url('logout') ?>'> <i class="fe fe-power"></i> Sign Out </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- Mobile-header closed -->