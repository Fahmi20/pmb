<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrasi STIKES Gunung Sari</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo/ypgs2.png">

    <!-- page css -->


    <!-- page css -->
    <link href="<?php echo base_url();?>assets/vendors/select2/select2.css" rel="stylesheet">


    <!-- Core css -->
    <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet">

</head>

<body>
<div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark pt-2">
                    <a href="<?php echo base_url();?>user">
                        <img src="<?php echo base_url();?>assets/images/logo/ypgs.png" width="230px" alt="Logo">
                        <img class="logo-fold ml-2" src="<?php echo base_url();?>assets/images/logo/ypgs2.png" width="60px" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="<?php echo base_url();?>user">
                        <img src="<?php echo base_url();?>assets/images/logo/logo-white.png" alt="Logo">
                        <img class="logo-fold" src="<?php echo base_url();?>assets/images/logo/logo-fold-white.png" alt="Logo">
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
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                       
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-cyan avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">New user registered</p>
                                                    <p class="m-b-0"><small></small></p>
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
                                    <img src="<?php echo base_url();?>assets/images/logo/no-profile.png"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="<?php echo base_url();?>assets/images/logo/no-profile.png" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold"><?php echo $this->m_user->get_name($this->session->userdata('email'));?></p>
                                            <p class="m-b-0 opacity-07"><?php echo $this->session->userdata('email');?></p>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url();?>user/form" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-form"></i>
                                            <span class="m-l-10">Formulir Saya</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                               

                                <a href="<?php echo base_url();?>user/password" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Ubah Password</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                             
                                <a href="<?php echo base_url();?>login/logout" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Keluar</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </div>    
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable mt-4">

                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url();?>user">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Beranda</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url();?>user/form">
                                <span class="icon-holder">
                                    <i class="anticon anticon-form"></i>
                                </span>
                                <span class="title">Formulir Saya</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url();?>user/invoice">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dollar"></i>
                                </span>
                                <span class="title">Invoice</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="http://stikes.gunungsari.id/hubungi-kami" target=”_blank” >
                                <span class="icon-holder">
                                    <i class="anticon anticon-message"></i>
                                </span>
                                <span class="title">Kontak Kami</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-lock"></i>
                                </span>
                                <span class="title">Akun Saya</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url();?>user/profile">Profil</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>user/password">Ubah Password</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>login/logout">Keluar</a>
                                </li>
                               
                                
                            </ul>
                        </li>
                        
                        
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->