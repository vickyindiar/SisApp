<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url() ?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url() ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Sweetalert Css -->
    <link href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- jqwidgets Css -->
    <link href="<?php echo base_url() ?>assets/plugins/jqwidgets/jqx.base.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/plugins/jqwidgets/jqx.bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jqwidgets/jqx.energyblue.css" type="text/css" />
    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url() ?>assets/css/themes/all-themes.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <style>
    .nopadding {
        padding: 0 !important;
        margin: 0 !important;
    }
    </style>    
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
  <?php include "header.php"?>
    <!-- #Top Bar -->
  <?php include "leftmenu.php"?>

    <section class="content">
        <div class="container-fluid">
    <?php echo $contents; ?>
        </div>
    </section>

    <!-- Jquery Core Js -->
 

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/node-waves/waves.js"></script>
    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jqwidgets/jqx-all.js"></script>
    <!-- SweetAlert Plugin Js -->
     <script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url() ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url() ?>assets/js/demo.js"></script>
</body>

</html>