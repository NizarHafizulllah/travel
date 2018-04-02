<?php 
$userdata = $this->session->userdata('app_login');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title><?php echo $title ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico"/>
   
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>


     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-dialog.min.css">

    
    <!-- global css -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css"/>
    <link href="<?php echo base_url(); ?>assets/vendors/notific/css/jquery.notific8.min.css" rel="stylesheet" type="text/css"/>


    
    <link href="<?php echo base_url(); ?>assets/vendors/iCheck/css/all.css" rel="stylesheet" type="text/css"/>
    
    



    
   


    <!-- end of global css -->
</head>

<body>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="<?php echo site_url('admin'); ?>" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo"/>
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
                <li class="dropdown user user-menu">
                    <a href="javascript:void(0)" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/images/user.png') ?>" class="img-circle img-responsive pull-left" alt="User Image">
                        <div class="riot">
                            <div>
                                <i class="caret"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User name-->
                        <li class="user-name text-center">
                            <span><?php echo $userdata['nama']; ?></span>
                        </li>
                        <!-- Menu Body -->
                        <li class="p-t-3">
                            <a href="<?php echo site_url('profil_kecamatan'); ?>">
                                Profile<i class="fa fa-fw fa-user pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/logout_admin'); ?>">
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


                        <div class="content-profile">
                            <h4 class="media-heading">
                                <?php echo $userdata['nama']; ?>
                            </h4>
                            <p>Petugas Verifikasi Kecamatan <?php echo $userdata['kecamatan'] ?></p>
                        </div>
                    </div>
                </div>


 <ul class="navigation">
 <li class="menu-dropdown <?php if($curPage=='imb_satu'||$curPage=='situ'||$curPage=='toko_obat'||$curPage=='mikro'||$curPage=='siu'){ echo 'active'; } ?>"> 
        <a href="#">
            <i class="menu-icon fa fa-desktop"></i>
            <span>PERIJINAN</span>
            <span class="fa arrow"></span>
        </a>
                        <ul class="sub-menu">
                            <li class="<?php if($curPage=='toko_obat'){ echo 'active'; } ?>">

                        <a href="<?php echo site_url('app_toko_obat'); ?>">
                            <i class="fa fa-fw fa-file-text-o"></i>
                            <span class="mm-text ">1. Izin Apotik &amp; Toko Obat </span>

                        </a>
                    <li class="<?php if($curPage=='mikro'){ echo 'active'; } ?>">
                        <a href="<?php echo site_url('app_mikro'); ?>">
                            <i class="fa fa-fw fa-file-text-o"></i>
                            <span class="mm-text ">2. TDI Industri Mikro</span>
                        </a>
                    </li>
                    <li class="<?php if($curPage=='situ'){ echo 'active'; } ?>">
                        <a href="<?php echo site_url('app_situ'); ?>">
                            <i class="fa fa-fw fa-file-text-o"></i>
                            <span class="mm-text ">3. SITU </span>
                        </a>
                    </li>
                    <li class="<?php if($curPage=='imb_satu'){ echo 'active'; } ?>">
                        <a href="<?php echo site_url('app_imb'); ?>">
                            <i class="fa fa-fw fa-file-text-o"></i>
                            <span class="mm-text ">4. IMB Dibawah 250 </span>
                        </a>
                    </li>
                    <li class="<?php if($curPage=='siu'){ echo 'active'; } ?>">
                        <a href="<?php echo site_url('app_siu'); ?>">
                            <i class="fa fa-fw fa-file-text-o"></i>
                            <span class="mm-text ">5. Surat izin usaha</span>
                        </a>
                    </li>
                    
                    </li>
                        </ul>
                    </li>
 <li class="menu-dropdown <?php if($curPage=='p3a'||$curPage=='koperasi'||$curPage=='menara'){ echo 'active'; } ?>"> 

        <a href="#">
            <i class="menu-icon fa fa-files-o"></i>
            <span>NON PERIJINAN</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">

             <li class="<?php if($curPage=='p3a'){ echo 'active'; } ?>">
            <a href="<?php echo site_url('kec_kelembagaan'); ?>">
                <i class="fa fa-fw fa-file-text-o"></i>
                <span class="mm-text ">4. Rek. Pembentukan P3A </span>
            </a>

            </li>

              <li class="<?php if($curPage=='koperasi'){ echo 'active'; } ?>">
            <a href="<?php echo site_url('kec_koperasi'); ?>">
                <i class="fa fa-fw fa-file-text-o"></i>
                <span class="mm-text ">8. Ijin Pendirian Koperasi</span>
            </a>

            </li>

               <li class="<?php if($curPage=='menara'){ echo 'active'; } ?>">
            <a href="<?php echo site_url('kec_menara'); ?>">
                <i class="fa fa-fw fa-file-text-o"></i>
                <span class="mm-text ">11. Rek. Menara Seluler</span>
            </a>

            </li>


        </ul>
</li>

</ul>


               
            </div>
            <!-- menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <aside class="right-aside view-port-height">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1><?php echo $subtitle ?></h1>

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">

                <?php echo $content ?>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div>
<!-- ./wrapper -->




<!-- global js -->
<script src="<?php echo base_url(); ?>assets/js/app.js" type="text/javascript"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>  

<script src="<?php echo base_url(); ?>assets/vendors/notific/js/jquery.notific8.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/vendors/iCheck/js/icheck.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-dialog.min.js" type="text/javascript"></script>

<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrapValidator.min.css">
<script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pages/datatables.css">
<script type="text/javascript">


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
