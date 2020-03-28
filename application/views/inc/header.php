<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hotel">
    <meta name="keywords" content="Hotel">

    <!-- Title Page-->
    <title><?php echo $title; ?></title>


	<link href="<?php echo base_url("/assets/"); ?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url("/assets/"); ?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>css/jquery-bootstrap-datepicker.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="<?php echo base_url("/assets/"); ?>DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url("/assets/"); ?>DataTables/Buttons-1.5.6/css/buttons.bootstrap4.min.css">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url("/assets/"); ?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url("/assets/"); ?>css/theme.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url("/assets/"); ?>css/style.css" rel="stylesheet" media="all">
</head>
<body>

    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo base_url("/assets/"); ?>images/icon/logo-white.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?php echo base_url("/assets/images/profile/") . $user['image']; ?>">
                    </div>
                    <h4 class="name"><?= $user['username']; ?></h4>
                    <a href="<?php echo base_url("/auth/logout"); ?>">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="<?= link_active($title, 'Dashboard'); ?>">
                            <a href="<?php echo base_url('dashboard'); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                            
                        </li>
                        <li class="<?= link_active($title, 'Pesan Ruangan'); ?>">
                            <a href="<?php echo base_url(); ?>pesan_ruangan">
                                <i class="fa fa-plus"></i>Pesan Ruangan</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-book"></i>List Reservasi
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="<?= link_active($title, 'List Ongoing'); ?>">
                                    <a href="<?php echo base_url(); ?>list_reservasi">
                                        <i class="fas fa-coffee"></i>List Ongoing</a>
                                </li>
                                <li class="<?= link_active($title, 'List Checkout'); ?>">
                                    <a href="<?php echo base_url(); ?>list_reservasi/alreadyCheckout">
                                        <i class="fas fa-check-circle"></i>List Checkout</a>
                                </li>
                                <li class="<?= link_active($title, 'List Semua'); ?>">
                                    <a href="<?php echo base_url(); ?>list_reservasi/all">
                                        <i class="fas fa-clock-o"></i>List Semua</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?= link_active($title, 'Control Room'); ?>">
                            <a href="<?php echo base_url(); ?>room_list">
                                <i class="fas fa-sort"></i>Control Room</a>
                        </li>
                        <?php if ($this->session->userdata('username') === 'admin') : ?>
                            <li class="<?= link_active($title, 'List Admin'); ?>">
                                <a href="<?php echo base_url(); ?>list_admin">
                                    <i class="fas fa-users"></i>List Admin</a>
                            </li>
                        <?php endif; ?>
                        <li class="<?= link_active($title, 'Edit Profil'); ?>">
                            <a href="<?php echo base_url('admin/edit') ?>">
                                 <i class="fas fa-user"></i>Edit Profil</a>
                        </li>
                        <li class="<?= link_active($title, 'Ubah Password'); ?>"> 
                            <a href="<?php echo base_url('admin/change_password') ?>">
                                <i class="fas fa-key"></i>Ubah Password</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="<?php echo base_url('/assets/'); ?>images/icon/logo-white.png" alt="Hotel" />
                                </a>
                            </div>
                            <div class="header-button2">
                                
                                
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo base_url('admin/edit') ?>">
                                                <i class="fas fa-user"></i>Edit Profil</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo base_url('admin/change_password') ?>">
                                                <i class="fas fa-key"></i>Ubah Password</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo base_url('control_floor') ?>">
                                                <i class="fas fa-building"></i>Control Floor</a>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="<?php echo base_url('/assets/'); ?>images/icon/logo-white.png" alt="Hotel" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="<?php echo base_url('/assets/'); ?>images/icon/avatar-big-01.jpg" alt="John Doe" />
                        </div>
                        <h4 class="name">Admin</h4>
                        <a href="<?php echo base_url("/auth/logout"); ?>">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a href="<?php echo base_url('dashboard'); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                            
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>pesan_ruangan">
                                <i class="fa fa-plus"></i>Pesan Ruangan</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-book"></i>List Reservasi
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo base_url(); ?>list_reservasi">
                                        <i class="fas fa-coffee"></i>List Ongoing</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>list_reservasi/alreadyCheckout">
                                        <i class="fas fa-check-circle"></i>List Checkout</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>list_reservasi/all">
                                        <i class="fas fa-clock-o"></i>List Semua</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>room_list">
                                <i class="fas fa-sort"></i>Control Room</a>
                        </li>
                        <?php if ($this->session->userdata('username') === 'admin') : ?>
                            <li>
                                <a href="<?php echo base_url(); ?>list_admin">
                                    <i class="fas fa-users"></i>List Admin</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo base_url('admin/edit') ?>">
                                 <i class="fas fa-user"></i>Edit Profil</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/change_password') ?>">
                                <i class="fas fa-key"></i>Ubah Password</a>
                        </li>
                    </ul>
                    </nav>
                </div>
            </aside>
