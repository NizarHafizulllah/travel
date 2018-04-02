<!DOCTYPE html>
<html>

<head>
    <title>404 | PESbook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- global level css -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- end of global css-->
    <!-- page level styles-->
    <link href="<?php echo base_url(); ?>assets/css/pages/error_pages.css" rel="stylesheet">
    <!-- end of page level styles-->
    <style>

    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
            <div class="error_content">
            <div class="text-center">
                <h2>
                    <img src="<?php echo base_url(); ?>assets/img/logopessbook.png" alt="Logo">
                </h2>
            </div>
            <div class="text-center">
                <div>
                    <div class="error">
                        <span class="folded-corner"></span>
                        <p class="type">404</p>
                        <p class="type-text">Halaman Tidak Ada</p>
                        <p class="message">Periksa url anda untuk memastikan halaman yang anda ketik benar, atau kembali ke <a href="<?php echo site_url('admin'); ?>">beranda</a>.<p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- end of global js -->

</body>

</html>

