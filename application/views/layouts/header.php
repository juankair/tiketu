<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>
            Tiketu | <?php echo $judul ?>
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--begin::Web font -->
        <script src="<?php echo base_url('assets/') ?>webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        
        <!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
        <link href="<?php echo base_url('assets/') ?>vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors -->
        <link href="<?php echo base_url('assets/') ?>vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/') ?>demo/demo6/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Base Styles -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo.png') ?>" />
            <!-- Data table CSS -->
    <link href="<?php echo base_url('assets/') ?>DataTables-1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

      <!--alerts CSS -->
  <link href="<?php echo base_url('assets/') ?>sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <!-- select2 CSS -->
        <link href="<?php echo base_url('assets/') ?>select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/selectize.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-select.min.css') ?>">
    </head>
    <!-- end::Head -->