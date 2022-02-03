<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title><?= $title;  ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/logo/android-icon-192x192.png'); ?>">
    <meta name="viewport" content="width=deviceth, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets1/font-awesome/4.5.0/css/font-awesome.min.css'); ?>">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/animate.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/slider.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/responsive.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets1/css/responsive.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/repair/dataTables.bootstrap4.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/repair/dataTables.bootstrap4.min.css'); ?>">


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets1/js/pdfmake.min.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets1/js/vfs_fonts.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets2/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets2/js/loader.js'); ?>"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">KPU</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('userpage'); ?>">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Info Kandidat
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('useridpm'); ?>">DPM</a>
                            <a class="dropdown-item" href="<?= base_url('useribem'); ?>">BEM</a>
                            <a class="dropdown-item" href="<?= base_url('userihti'); ?>">HiMTI</a>
                            <a class="dropdown-item" href="<?= base_url('userihsi'); ?>">Himsisfo</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pemilihan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('userpdpm'); ?>">DPM</a>
                            <a class="dropdown-item" href="<?= base_url('userpbem'); ?>">BEM</a>
                            <a class="dropdown-item" href="<?= base_url('userphti'); ?>">HiMTI</a>
                            <a class="dropdown-item" href="<?= base_url('userphsi'); ?>">Himsisfo</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('contactuser'); ?>" class="nav-link">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('auth'); ?>" class="nav-link">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>