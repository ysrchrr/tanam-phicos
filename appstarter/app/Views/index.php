<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Enlink - Admin Dashboard Template</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/images/logo/favicon.png">
        <!-- page css -->
        <link href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
        <!-- Core css -->
        <link href="assets/css/app.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="app">
            <div class="layout">
                <!-- Header START -->
                <div class="header">
                    <div class="logo logo-dark">
                        <a href="index.html">
                            <img src="assets/images/logo/logo.png" alt="Logo">
                            <img class="logo-fold" src="assets/images/logo/logo-fold.png" alt="Logo">
                        </a>
                    </div>
                    <div class="logo logo-white">
                        <a href="index.html">
                            <img src="assets/images/logo/logo-white.png" alt="Logo">
                            <img class="logo-fold" src="assets/images/logo/logo-fold-white.png" alt="Logo">
                        </a>
                    </div>
                    <div class="nav-wrap">
                        <ul class="nav-left">
                            <li class="desktop-toggle">
                                <a href="javascript:void(0);">
                                    <i class="anticon"></i>
                                </a>
                            </li>
                            <li class="mobile-toggle">
                                <a href="javascript:void(0);">
                                    <i class="anticon"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                    <i class="anticon anticon-search"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="dropdown dropdown-animated scale-left">
                                <a href="javascript:void(0);" data-toggle="dropdown">
                                    <i class="anticon anticon-bell notification-badge"></i>
                                </a>
                                <div class="dropdown-menu pop-notification">
                                    <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                        <p class="text-dark font-weight-semibold m-b-0">
                                            <i class="anticon anticon-bell"></i>
                                            <span class="m-l-10">Notification</span>
                                        </p>
                                        <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                            <small>View All</small>
                                        </a>
                                    </div>
                                    <div class="relative">
                                        <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-blue avatar-icon">
                                                        <i class="anticon anticon-mail"></i>
                                                    </div>
                                                    <div class="m-l-15">
                                                        <p class="m-b-0 text-dark">You received a new message</p>
                                                        <p class="m-b-0"><small>8 min ago</small></p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-cyan avatar-icon">
                                                        <i class="anticon anticon-user-add"></i>
                                                    </div>
                                                    <div class="m-l-15">
                                                        <p class="m-b-0 text-dark">New user registered</p>
                                                        <p class="m-b-0"><small>7 hours ago</small></p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-red avatar-icon">
                                                        <i class="anticon anticon-user-add"></i>
                                                    </div>
                                                    <div class="m-l-15">
                                                        <p class="m-b-0 text-dark">System Alert</p>
                                                        <p class="m-b-0"><small>8 hours ago</small></p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-gold avatar-icon">
                                                        <i class="anticon anticon-user-add"></i>
                                                    </div>
                                                    <div class="m-l-15">
                                                        <p class="m-b-0 text-dark">You have a new update</p>
                                                        <p class="m-b-0"><small>2 days ago</small></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown dropdown-animated scale-left">
                                <div class="pointer" data-toggle="dropdown">
                                    <div class="avatar avatar-image  m-h-10 m-r-15">
                                        <img src="assets/images/avatars/thumb-3.jpg"  alt="">
                                    </div>
                                </div>
                                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                        <div class="d-flex m-r-50">
                                            <div class="avatar avatar-lg avatar-image">
                                                <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <p class="m-b-0 text-dark font-weight-semibold">Marshall Nichols</p>
                                                <p class="m-b-0 opacity-07">UI/UX Desinger</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                                <span class="m-l-10">Edit Profile</span>
                                            </div>
                                            <i class="anticon font-size-10 anticon-right"></i>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                                <span class="m-l-10">Account Setting</span>
                                            </div>
                                            <i class="anticon font-size-10 anticon-right"></i>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                                <span class="m-l-10">Projects</span>
                                            </div>
                                            <i class="anticon font-size-10 anticon-right"></i>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                                <span class="m-l-10">Logout</span>
                                            </div>
                                            <i class="anticon font-size-10 anticon-right"></i>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                    <i class="anticon anticon-appstore"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>    
                <!-- Header END -->

                <!-- Side Nav START -->
                <div class="side-nav">
                    <div class="side-nav-inner">
                        <ul class="side-nav-menu scrollable">
                            <li class="nav-item dropdown open">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-dashboard"></i>
                                    </span>
                                    <span class="title">Dashboard</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.html">Default</a>
                                    </li>
                                    <li>
                                        <a href="index-crm.html">CRM</a>
                                    </li>
                                    <li class="active">
                                        <a href="index-e-commerce.html">E-commerce</a>
                                    </li>
                                    <li>
                                        <a href="index-projects.html">Projects</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-appstore"></i>
                                    </span>
                                    <span class="title">Apps</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="app-chat.html">Chat</a>
                                    </li>
                                    <li>
                                        <a href="app-file-manager.html">File Manager</a>
                                    </li>
                                    <li>
                                        <a href="app-mail.html">Mail</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="javascript:void(0);">
                                            <span>Projects</span>
                                            <span class="arrow">
                                                <i class="arrow-icon"></i>
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="app-project-list.html">Project List</a>
                                            </li>
                                            <li>
                                                <a href="app-project-details.html">Project Details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="javascript:void(0);">
                                            <span>E-commerce</span>
                                            <span class="arrow">
                                                <i class="arrow-icon"></i>
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="app-e-commerce-order-list.html">Orders List</a>
                                            </li>
                                            <li>
                                                <a href="app-e-commerce-products.html">Products</a>
                                            </li>
                                            <li>
                                                <a href="app-e-commerce-products-list.html">Products List</a>
                                            </li>
                                            <li>
                                                <a href="app-e-commerce-products-edit.html">Products Edit</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-build"></i>
                                    </span>
                                    <span class="title">UI Elements</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="avatar.html">Avatar</a>
                                    </li>
                                    <li>
                                        <a href="alert.html">Alert</a>
                                    </li>
                                    <li>
                                        <a href="badge.html">Badge</a>
                                    </li>
                                    <li>
                                        <a href="buttons.html">Buttons</a>
                                    </li>
                                    <li>
                                        <a href="cards.html">Cards</a>
                                    </li>
                                    <li>
                                        <a href="icons.html">Icons</a>
                                    </li>
                                    <li>
                                        <a href="lists.html">Lists</a>
                                    </li>
                                    <li>
                                        <a href="typography.html">Typography</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-hdd"></i>
                                    </span>
                                    <span class="title">Components</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="accordion.html">Accordion</a>
                                    </li>
                                    <li>
                                        <a href="carousel.html">Carousel</a>
                                    </li>
                                    <li>
                                        <a href="dropdown.html">Dropdown</a>
                                    </li>
                                    <li>
                                        <a href="modals.html">Modals</a>
                                    </li>
                                    <li>
                                        <a href="toasts.html">Toasts</a>
                                    </li>
                                    <li>
                                        <a href="popover.html">Popover</a>
                                    </li>
                                    <li>
                                        <a href="slider-progress.html">Slider & Progress</a>
                                    </li>
                                    <li>
                                        <a href="tabs.html">Tabs</a>
                                    </li>
                                    <li>
                                        <a href="tooltips.html">Tooltips</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-form"></i>
                                    </span>
                                    <span class="title">Forms</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="form-elements.html">Form Elements</a>
                                    </li>
                                    <li>
                                        <a href="form-layouts.html">Form Layouts</a>
                                    </li>
                                    <li>
                                        <a href="form-validation.html">Form Validation</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-table"></i>
                                    </span>
                                    <span class="title">Tables</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="basic-table.html">Basic Table</a>
                                    </li>
                                    <li>
                                        <a href="data-table.html">Data Table</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-pie-chart"></i>
                                    </span>
                                    <span class="title">Charts</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="chartist.html">Chartist</a>
                                    </li>
                                    <li>
                                        <a href="chartjs.html">ChartJs</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-file"></i>
                                    </span>
                                    <span class="title">Pages</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.html">Profile</a>
                                    </li>
                                    <li>
                                        <a href="invoice.html">Invoice</a>
                                    </li>
                                    <li>
                                        <a href="members.html">Members</a>
                                    </li>
                                    <li>
                                        <a href="pricing.html">Pricing</a>
                                    </li>
                                    <li>
                                        <a href="setting.html">Setting</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a href="javascript:void(0);">
                                            <span>Blog</span>
                                            <span class="arrow">
                                                <i class="arrow-icon"></i>
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="blog-grid.html">Blog Grid</a>
                                            </li>
                                            <li>
                                                <a href="blog-list.html">Blog List</a>
                                            </li>
                                            <li>
                                                <a href="blog-post.html">Blog Post</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-lock"></i>
                                    </span>
                                    <span class="title">Authentication</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="login-1.html">Login 1</a>
                                    </li>
                                    <li>
                                        <a href="login-2.html">Login 2</a>
                                    </li>
                                    <li>
                                        <a href="login-3.html">Login 3</a>
                                    </li>
                                    <li>
                                        <a href="sign-up-1.html">Sign Up 1</a>
                                    </li>
                                    <li>
                                        <a href="sign-up-2.html">Sign Up 2</a>
                                    </li>
                                    <li>
                                        <a href="sign-up-3.html">Sign Up 3</a>
                                    </li>
                                    <li>
                                        <a href="error-1.html">Error 1</a>
                                    </li>
                                    <li>
                                        <a href="error-2.html">Error 2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Side Nav END -->

                <!-- Page Container START -->
                <div class="page-container">
                    
                    <!-- Content Wrapper START -->
                    <div class="main-content">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-b-0 text-muted">Sales</p>
                                                        <h2 class="m-b-0">$23,523</h2>
                                                    </div>
                                                    <span class="badge badge-pill badge-cyan font-size-12">
                                                        <i class="anticon anticon-arrow-up"></i>
                                                        <span class="font-weight-semibold m-l-5">6.71%</span>
                                                    </span>
                                                </div>
                                                <div class="m-t-40">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge badge-primary badge-dot m-r-10"></span>
                                                            <span class="text-gray font-weight-semibold font-size-13">Monthly Goal</span>
                                                        </div>
                                                        <span class="text-dark font-weight-semibold font-size-13">70% </span>
                                                    </div>
                                                    <div class="progress progress-sm w-100 m-b-0 m-t-10">
                                                        <div class="progress-bar bg-primary" style="width: 70%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-b-0 text-muted">Margin</p>
                                                        <h2 class="m-b-0">$8,753</h2>
                                                    </div>
                                                    <span class="badge badge-pill badge-red font-size-12">
                                                        <i class="anticon anticon-arrow-down"></i>
                                                        <span class="font-weight-semibold m-l-5">3.26%</span>
                                                    </span>
                                                </div>
                                                <div class="m-t-40">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge badge-success badge-dot m-r-10"></span>
                                                            <span class="text-gray font-weight-semibold font-size-13">Monthly Goal</span>
                                                        </div>
                                                        <span class="text-dark font-weight-semibold font-size-13">60% </span>
                                                    </div>
                                                    <div class="progress progress-sm w-100 m-b-0 m-t-10">
                                                        <div class="progress-bar bg-success" style="width: 60%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-b-0 text-muted">Orders</p>
                                                        <h2 class="m-b-0">1,753</h2>
                                                    </div>
                                                    <span class="badge badge-pill badge-red font-size-12">
                                                        <i class="anticon anticon-arrow-down"></i>
                                                        <span class="font-weight-semibold m-l-5">2.71%</span>
                                                    </span>
                                                </div>
                                                <div class="m-t-40">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge badge-warning badge-dot m-r-10"></span>
                                                            <span class="text-gray font-weight-semibold font-size-13">Monthly Goal</span>
                                                        </div>
                                                        <span class="text-dark font-weight-semibold font-size-13">45% </span>
                                                    </div>
                                                    <div class="progress progress-sm w-100 m-b-0 m-t-10">
                                                        <div class="progress-bar bg-warning" style="width: 45%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-b-0 text-muted">Affiliate</p>
                                                        <h2 class="m-b-0">236</h2>
                                                    </div>
                                                    <span class="badge badge-pill badge-gold font-size-12">
                                                        <i class="anticon anticon-arrow-up"></i>
                                                        <span class="font-weight-semibold m-l-5">N/A</span>
                                                    </span>
                                                </div>
                                                <div class="m-t-40">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <span class="badge badge-secondary badge-dot m-r-10"></span>
                                                            <span class="text-gray font-weight-semibold font-size-13">Monthly Goal</span>
                                                        </div>
                                                        <span class="text-dark font-weight-semibold font-size-13">50% </span>
                                                    </div>
                                                    <div class="progress progress-sm w-100 m-b-0 m-t-10">
                                                        <div class="progress-bar bg-secondary" style="width: 50%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>Sales Statistics</h5>
                                            <div class="dropdown dropdown-animated scale-left">
                                                <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                                    <i class="anticon anticon-ellipsis"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" type="button">
                                                        <i class="anticon anticon-printer"></i>
                                                        <span class="m-l-10">Print</span>
                                                    </button>
                                                    <button class="dropdown-item" type="button">
                                                        <i class="anticon anticon-download"></i>
                                                        <span class="m-l-10">Download</span>
                                                    </button>
                                                    <button class="dropdown-item" type="button">
                                                        <i class="anticon anticon-file-excel"></i>
                                                        <span class="m-l-10">Export</span>
                                                    </button>
                                                    <button class="dropdown-item" type="button">
                                                        <i class="anticon anticon-reload"></i>
                                                        <span class="m-l-10">Refresh</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-30">
                                            <div class="d-inline-block m-r-30">
                                                <p class="m-b-0 d-flex align-items-center">
                                                    <span class="badge badge-primary badge-dot m-r-10"></span>
                                                    <span>Online</span>
                                                </p>
                                            </div>
                                            <div class="d-inline-block">
                                                <p class="m-b-0 d-flex align-items-center">
                                                    <span class="badge badge-blue badge-dot m-r-10"></span>
                                                    <span>Offline</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="m-t-50">
                                            <canvas class="chart" style="height: 205px" id="sales-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>Revenue</h5>
                                            <div>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                                            </div>
                                        </div>
                                        <div class="m-t-30">
                                            <div class="d-md-flex">
                                                <div class="pr-4 m-v-10 border-right border-hide-md">
                                                    <p class="m-b-0">Net Revenue</p>
                                                    <h3 class="m-b-0">
                                                        <span>$58,323</span>
                                                        <span class="text-success m-l-10 font-size-14">+6.71%</span>
                                                    </h3>
                                                </div>
                                                <div class="px-md-4 m-v-10 border-right border-hide-md">
                                                    <p class="m-b-0">Selling</p>
                                                    <h3 class="m-b-0">
                                                        <span>$17,523</span>
                                                        <span class="text-danger m-l-10 font-size-14">+1.82%</span>
                                                    </h3>
                                                </div>
                                                <div class="px-md-4 m-v-10">
                                                    <p class="m-b-0">Cost</p>
                                                    <h3 class="m-b-0">
                                                        <span>$8,217</span>
                                                        <span class="text-success m-l-10 font-size-14">+11.2%</span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-50" style="height: 240px">
                                            <canvas class="chart" id="revenue-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>Top Products</h5>
                                            <div>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                                            </div>
                                        </div>
                                        <div class="m-t-30">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item p-h-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex">
                                                            <div class="avatar avatar-image m-r-15">
                                                                <img src="assets/images/others/thumb-9.jpg" alt="">
                                                            </div>
                                                            <div>
                                                                <h6 class="m-b-0">
                                                                    <a href="javascript:void(0);" class="text-dark"> Gray Sofa</a>
                                                                </h6>
                                                                <span class="text-muted font-size-13">Home Decoration</span>
                                                            </div>
                                                        </div>
                                                        <span class="badge badge-pill badge-cyan font-size-12">
                                                            <span class="font-weight-semibold m-l-5">+18.3%</span>
                                                        </span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item p-h-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex">
                                                            <div class="avatar avatar-image m-r-15">
                                                                <img src="assets/images/others/thumb-10.jpg" alt="">
                                                            </div>
                                                            <div>
                                                                <h6 class="m-b-0">
                                                                    <a href="javascript:void(0);" class="text-dark">Beat Headphone</a>
                                                                </h6>
                                                                <span class="text-muted font-size-13">Eletronic</span>
                                                            </div>
                                                        </div>
                                                        <span class="badge badge-pill badge-cyan font-size-12">
                                                            <span class="font-weight-semibold m-l-5">+12.7%</span>
                                                        </span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item p-h-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex">
                                                            <div class="avatar avatar-image m-r-15">
                                                                <img src="assets/images/others/thumb-11.jpg" alt="">
                                                            </div>
                                                            <div>
                                                                <h6 class="m-b-0">
                                                                    <a href="javascript:void(0);" class="text-dark">Wooden Rhino</a>
                                                                </h6>
                                                                <span class="text-muted font-size-13">Home Decoration</span>
                                                            </div>
                                                        </div>
                                                        <span class="badge badge-pill badge-cyan font-size-12">
                                                            <span class="font-weight-semibold m-l-5">+9.2%</span>
                                                        </span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item p-h-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex">
                                                            <div class="avatar avatar-image m-r-15">
                                                                <img src="assets/images/others/thumb-12.jpg" alt="">
                                                            </div>
                                                            <div>
                                                                <h6 class="m-b-0">
                                                                    <a href="javascript:void(0);" class="text-dark">Red Chair</a>
                                                                </h6>
                                                                <span class="text-muted font-size-13">Home Decoration</span>
                                                            </div>
                                                        </div>
                                                        <span class="badge badge-pill badge-cyan font-size-12">
                                                            <span class="font-weight-semibold m-l-5">+7.7%</span>
                                                        </span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item p-h-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex">
                                                            <div class="avatar avatar-image m-r-15">
                                                                <img src="assets/images/others/thumb-13.jpg" alt="">
                                                            </div>
                                                            <div>
                                                                <h6 class="m-b-0">
                                                                    <a href="javascript:void(0);" class="text-dark">Wristband</a>
                                                                </h6>
                                                                <span class="text-muted font-size-13">Eletronic</span>
                                                            </div>
                                                        </div>
                                                        <span class="badge badge-pill badge-cyan font-size-12">
                                                            <span class="font-weight-semibold m-l-5">+5.8%</span>
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Customers</h5>
                                        <div class="m-v-45 text-center" style="height: 220px">
                                            <canvas class="chart" id="customer-chart"></canvas>
                                        </div>
                                        <div class="row p-t-25">
                                            <div class="col-md-8 m-h-auto">
                                                <div class="d-flex justify-content-between align-items-center m-b-20">
                                                    <p class="m-b-0 d-flex align-items-center">
                                                        <span class="badge badge-warning badge-dot m-r-10"></span>
                                                        <span>Direct</span>
                                                    </p>
                                                    <h5 class="m-b-0">350</h5>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center m-b-20">
                                                    <p class="m-b-0 d-flex align-items-center">
                                                        <span class="badge badge-primary badge-dot m-r-10"></span>
                                                        <span>Referral</span>
                                                    </p>
                                                    <h5 class="m-b-0">450</h5>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center m-b-20">
                                                    <p class="m-b-0 d-flex align-items-center">
                                                        <span class="badge badge-danger badge-dot m-r-10"></span>
                                                        <span>Social Network</span>
                                                    </p>
                                                    <h5 class="m-b-0">100</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>Recent Orders</h5>
                                            <div>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                                            </div>
                                        </div>
                                        <div class="m-t-30">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Customer</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#5331</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                            <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                                                        </div>
                                                                        <h6 class="m-l-10 m-b-0">Erin Gonzales</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>8 May 2019</td>
                                                            <td>$137.00</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="badge badge-success badge-dot m-r-10"></span>
                                                                    <span>Approved</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#5375</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                            <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                                                        </div>
                                                                        <h6 class="m-l-10 m-b-0">Darryl Day</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>6 May 2019</td>
                                                            <td>$322.00</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="badge badge-success badge-dot m-r-10"></span>
                                                                    <span>Approved</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#5762</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                            <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                                                        </div>
                                                                        <h6 class="m-l-10 m-b-0">Marshall Nichols</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>1 May 2019</td>
                                                            <td>$543.00</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="badge badge-success badge-dot m-r-10"></span>
                                                                    <span>Approved</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#5865</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                            <img src="assets/images/avatars/thumb-4.jpg" alt="">
                                                                        </div>
                                                                        <h6 class="m-l-10 m-b-0">Virgil Gonzales</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>28 April 2019</td>
                                                            <td>$876.00</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="badge badge-primary badge-dot m-r-10"></span>
                                                                    <span>Pending</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#5213</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                            <img src="assets/images/avatars/thumb-5.jpg" alt="">
                                                                        </div>
                                                                        <h6 class="m-l-10 m-b-0">Nicole Wyne</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>28 April 2019</td>
                                                            <td>$241.00</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="badge badge-success badge-dot m-r-10"></span>
                                                                    <span>Approved</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#5211</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                            <img src="assets/images/avatars/thumb-6.jpg" alt="">
                                                                        </div>
                                                                        <h6 class="m-l-10 m-b-0">Riley Newman</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>28 April 2019</td>
                                                            <td>$872.00</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="badge badge-danger badge-dot m-r-10"></span>
                                                                    <span>Rejected</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Wrapper END -->

                    <!-- Footer START -->
                    <footer class="footer">
                        <div class="footer-content">
                            <p class="m-b-0">Copyright © 2019 Theme_Nate. All rights reserved.</p>
                            <span>
                                <a href="#" class="text-gray m-r-15">Term &amp; Conditions</a>
                                <a href="#" class="text-gray">Privacy &amp; Policy</a>
                            </span>
                        </div>
                    </footer>
                    <!-- Footer END -->

                </div>
                <!-- Page Container END -->

                <!-- Search Start-->
                <div class="modal modal-left fade search" id="search-drawer">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Search</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <i class="anticon anticon-close"></i>
                                </button>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="input-affix">
                                    <i class="prefix-icon anticon anticon-search"></i>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Files</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-cyan avatar-icon">
                                            <i class="anticon anticon-file-excel"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                            <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-blue avatar-icon">
                                            <i class="anticon anticon-file-word"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                            <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-purple avatar-icon">
                                            <i class="anticon anticon-file-text"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                            <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-red avatar-icon">
                                            <i class="anticon anticon-file-pdf"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                            <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-t-30">
                                    <h5 class="m-b-20">Members</h5>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                            <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                            <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                        </div>
                                    </div>
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                            <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                        </div>
                                    </div>
                                </div>   
                                <div class="m-t-30">
                                    <h5 class="m-b-20">News</h5> 
                                    <div class="d-flex m-b-30">
                                        <div class="avatar avatar-image">
                                            <img src="assets/images/others/img-1.jpg" alt="">
                                        </div>
                                        <div class="m-l-15">
                                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                            <p class="m-b-0 text-muted font-size-13">
                                                <i class="anticon anticon-clock-circle"></i>
                                                <span class="m-l-5">25 Nov 2018</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search End-->

                <!-- Quick View START -->
                <div class="modal modal-right fade quick-view" id="quick-view">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between align-items-center">
                                <h5 class="modal-title">Theme Config</h5>
                            </div>
                            <div class="modal-body scrollable">
                                <div class="m-b-30">
                                    <h5 class="m-b-0">Header Color</h5>
                                    <p>Config header background color</p>
                                    <div class="theme-configurator d-flex m-t-10">
                                        <div class="radio">
                                            <input id="header-default" name="header-theme" type="radio" checked value="default">
                                            <label for="header-default"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-primary" name="header-theme" type="radio" value="primary">
                                            <label for="header-primary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-success" name="header-theme" type="radio" value="success">
                                            <label for="header-success"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                            <label for="header-secondary"></label>
                                        </div>
                                        <div class="radio">
                                            <input id="header-danger" name="header-theme" type="radio" value="danger">
                                            <label for="header-danger"></label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Side Nav Dark</h5>
                                    <p>Change Side Nav to dark</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                        <label for="side-nav-theme-toogle"></label>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5 class="m-b-0">Folded Menu</h5>
                                    <p>Toggle Folded Menu</p>
                                    <div class="switch d-inline">
                                        <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                        <label for="side-nav-fold-toogle"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <!-- Quick View END -->
            </div>
        </div>

        <!-- Core Vendors JS -->
        <script src="assets/js/vendors.min.js"></script>
        <!-- page js -->
        <script src="assets/vendors/chartjs/Chart.min.js"></script>
        <script src="assets/js/pages/dashboard-e-commerce.js"></script>
        <!-- Core JS -->
        <script src="assets/js/app.min.js"></script>
</body>
</html>