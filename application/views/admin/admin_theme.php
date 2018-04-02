<?php 
$userdata = $this->session->userdata('admin_login');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PESBook | <?php echo $title ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-dialog.min.css">

    
    <!-- global css -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
    <link href="<?php echo base_url(); ?>assets/vendors/notific/css/jquery.notific8.min.css" rel="stylesheet" type="text/css">
    
    <link href="<?php echo base_url(); ?>assets/vendors/iCheck/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/vendors/airdatepicker/css/datepicker.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pages/datatables.css">
</head>

<body>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="index.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="<?php echo base_url('assets') ?>/img/logo_blue.png" alt="logo"/>
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="javascript:void(0)" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw fa-bars"></i>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                
                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                    <a href="javascript:void(0)" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets') ?>/img/authors/<?php echo $userdata['foto'] ?>" class="img-circle img-responsive pull-left" alt="User Image">
                        <div class="riot">
                            <div>
                                <i class="caret"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User name-->
                        <li class="user-name text-center">
                            <span><?php echo $userdata['username']; ?></span>
                        </li>
                        <!-- Menu Body -->
                        <li class="p-t-3">
                            <a href="user_profile.html">
                                Profile<i class="fa fa-fw fa-user pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/logout_admin') ?>">
                                Logout <i class="fa fa-fw fa-sign-out pull-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-aside">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
                <div class="nav_profile">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="javascript:void(0)">
                            <img src="<?php echo base_url('assets') ?>/img/authors/<?php echo $userdata['foto'] ?>" class="img-circle" alt="User Image">
                        </a>
                        <div class="content-profile">
                            <h4 class="media-heading">
                                <?php echo $userdata['username'] ?>
                            </h4>
                            <p>Admin</p>
                        </div>
                    </div>
                </div>
                <ul class="navigation">
                    <li class="<?php if($curPage=='beranda'){ echo 'active'; } ?>">
                        <a href="<?php echo site_url('admin'); ?>">
                            <i class="menu-icon fa fa-fw fa-home"></i>
                            <span class="mm-text ">Dashboard </span>
                        </a>
                    </li>
                    <li class="<?php if($curPage=='program'){ echo 'active'; } ?>">
                        <a href="<?php echo site_url('ad_program') ?>">
                            <i class="menu-icon fa fa-fw fa-desktop"></i>
                            <span class="mm-text ">Program </span>
                        </a>
                    </li>
                    <li class="<?php if($curPage=='kegiatan'){ echo 'active'; } ?>">
                        <a href="<?php echo site_url('ad_kegiatan') ?>">
                            <i class="menu-icon fa fa-fw fa-table"></i>
                            <span class="mm-text ">Kegiatan </span>
                        </a>
                    </li>
                    <li class="<?php if($curPage=='user'){ echo 'active'; } ?>">
                        <a href="index.html">
                            <i class="menu-icon fa fa-fw fa-users"></i>
                            <span class="mm-text ">Tambah User </span>
                        </a>
                    </li>
                </ul>
                <!-- / .navigation -->
            </div>
            <!-- menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <aside class="right-aside view-port-height">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?php echo $title; ?></h1>
        </section>
        <!-- Main content -->
        <?php echo $content; ?>
        
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div>
<!-- ./wrapper -->
<!-- global js -->
<script src="<?php echo base_url(); ?>assets/js/app.js" type="text/javascript"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>  
<script src="<?php echo base_url("assets") ?>/vendors/airdatepicker/js/datepicker.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/vendors/airdatepicker/js/datepicker.en.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/notific/js/jquery.notific8.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/iCheck/js/icheck.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-dialog.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/autoNumeric.js"></script>

<script type="text/javascript">

$(".tanggal").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "dd-mm-yyyy"
});
    
    $(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });

    $(".content .row").find('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    $('[type="reset"]').on('click', function () {
        setTimeout(function () {
            $("input").iCheck("update");
        }, 10);
    });
</script> 
<!-- end of page level js -->
</body>

</html>
