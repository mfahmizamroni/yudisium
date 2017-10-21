<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIM Yudisium</title>

  <!-- BEGIN META -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="your,keywords">
  <meta name="description" content="Short explanation about this website">
  <!-- END META -->

  <!-- BEGIN STYLESHEETS -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/bootstrap.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/materialadmin.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/font-awesome.min.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/material-design-iconic-font.min.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/libs/rickshaw/rickshaw.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/libs/morris/morris.core.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/libs/DataTables/jquery.dataTables.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/libs/toastr/toastr.css?1425466569" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme-default/libs/dropzone/dropzone-theme.css?1424887864" />
  <!-- END STYLESHEETS -->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
      <![endif]-->
    </head>

    <body class="menubar-hoverable header-fixed ">

      <!-- BEGIN HEADER-->
      <header id="header" >
        <div class="headerbar">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
              <li class="header-nav-brand" >
                <div class="brand-holder">
                  <a href="<?php echo base_url();?>form/daftarMahasiswa">
                    <span class="text-lg text-bold text-primary">SIM Yudisium</span>
                  </a>
                </div>
              </li>
              <li class="hidden-lg">
                <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                  <i class="fa fa-bars"></i>
                </a>
              </li>
            </ul>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="headerbar-right">

            <ul class="header-nav header-nav-options">

            </ul>
            <!--end .header-nav-options -->

            <ul class="header-nav header-nav-options">
              <li class="hidden-xs">
                <a href="<?php echo base_url();?>form/daftarMahasiswa" class="btn btn-flat ink-reaction btn-primary ">
                  Daftar Mahasiswa
                </a>
              </li>
              <li class="dropdown hidden-xs">
                <a href="javascript:void(0);" class="btn btn-flat ink-reaction btn-primary" data-toggle="dropdown">
                  Syarat Yudisium
                </a>
                <ul class="dropdown-menu animation-expand">
                  <li>
                    <a class="" href="<?php echo base_url();?>syarat/daftarSyaratYudisium">
                      <span class="title">Daftar Syarat</span>
                    </a>
                  </li>
                  <li>
                    <a class="" href="<?php echo base_url();?>syarat/addSyaratYudisium">
                      <span class="title">Tambah Syarat</span>
                    </a>
                  </li>
                </ul><!--end .dropdown-menu -->
              </li><!--end .dropdown -->
            </ul>

            <!-- header nav profile -->
            <ul class="header-nav header-nav-profile">
              <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                  <i class="fa fa-circle text-primary text-lg"></i>
                  <span class="profile-info">
                    <?= $this->session->userdata('username') ?>
                    <small><?= $this->session->userdata('civitas_nama') ?></small>
                  </span>
                </a>
                <ul class="dropdown-menu animation-dock">
                  <li class="dropdown-header">Config</li>
                  <li><a href=""><i class="fa fa-fw fa-user"></i>My profile</a></li>
                  <hr>
                  <li><a href="<?= base_url()."user/logout" ?>"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
                </ul><!--end .dropdown-menu -->
              </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->




          </div><!--end #header-navbar-collapse -->
        </div>
      </header>
      <!-- END HEADER-->

      <!-- BEGIN BASE-->
      <div id="base">

        <!-- BEGIN OFFCANVAS LEFT -->
        <div class="offcanvas">
        </div><!--end .offcanvas-->
      <!-- END OFFCANVAS LEFT -->