     <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-dialog.min.css">
   <link href="<?php echo base_url(); ?>assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/omg/bootstrap-dialog.min.css">
   

   <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap-dialog.min.js"></script>
        <!-- Main content -->
        <script src="<?php echo base_url("assets"); ?>/fileinput/js/fileinput.min.js"></script>
 <link href="<?php echo base_url("assets"); ?>/fileinput/css/fileinput.min.css" rel="stylesheet">
      <style type="text/css">
        .modal-backdrop {
            z-index: -1;
        }
      </style>

        <form id="<?php echo $form; ?>" class="form-horizontal" method="post" 
        action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 


   

    <div class="form-group">
      <label class="col-sm-2 control-label">Kegiatan </label>
      <div class="col-sm-10">
        <?php echo form_dropdown("id_kegiatan",$arr_kegiatan,isset($kegiatan)?$kegiatan:"", 'id="kegiatan" class="form-control" size="1"'); ?>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Deskripsi</label>
      <div class="col-sm-10">
       <input type="hidden" name="id" id="id" value="<?php echo isset($id)?$id:""; ?>">
        <textarea class="form-control input-style" name="deskripsi" id="deskripsi"></textarea>
      </div>
    </div>
       
    <div class="form-group">
      <label class="col-sm-2 control-label">File </label>
      <div class="col-sm-10">
        <input type="file" name="file" id="faktur" class="file" data-show-preview="true" accept="pdf/*"/>
      </div>
    </div> 
    
    
    <div class="form-group pull-center">
        <div class="col-sm-offset-2 col-sm-9">
          <button id="<?php echo $action ?>" style="border-radius: 0;" type="submit" class="btn btn-primary"  >Simpan</button>
          <a href="<?php echo site_url("$this->controller"); ?>"><button style="border-radius: 0;" id="reset" type="button" class="btn btn-danger">Kembali</button></a>
        </div>
      </div>



 
  </form>


      <?php 
$this->load->view($this->controller."_form_view_js");
?>