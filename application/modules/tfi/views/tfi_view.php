 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-dialog.min.css">
   <link href="<?php echo base_url(); ?>assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/omg/bootstrap-dialog.min.css">

   <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap-dialog.min.js"></script>
        <!-- Main content -->
      <style type="text/css">
        .modal-backdrop {
            z-index: -1;
        }
      </style>




 <form id="<?php echo $form; ?>" class="form-horizontal" method="post" 
        action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 


        <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pihak Pertama PK</h3>
                        </div>
                        <div class="panel-body">
                              
                              <div class="form-group">
      <label class="col-sm-2 control-label">NIP Pihak Pertama </label>
      <div class="col-sm-10">
        <input type="text" name="nip_pihak_pertama" id="nip_pihak_pertama" class="form-control input-style" placeholder="NIP Pihak Pertama" 
        value="<?php echo isset($nip_pihak_pertama)?$nip_pihak_pertama:""; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama Pihak Pertama </label>
      <div class="col-sm-10">
        <input type="text" name="nm_pihak_pertama" id="nm_pihak_pertama" class="form-control input-style" placeholder="Nama Pihak Pertama" 
        value="<?php echo isset($nm_pihak_pertama)?$nm_pihak_pertama:""; ?>">
      </div>
    </div>
          <div class="form-group">
      <label class="col-sm-2 control-label">Jabatan Pihak Pertama </label>
      <div class="col-sm-10">
        <textarea class="form-control inout-style" name="jb_pihak_pertama" id="jb_pihak_pertama"><?php echo isset($jb_pihak_pertama)?$jb_pihak_pertama:""; ?></textarea>
      </div>
    </div>
    
       
          


                        </div>
                    </div>
                </div>
            </div>
                

        <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pihak Kedua PK</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                              <label class="col-sm-2 control-label">NIP Pihak Kedua </label>
                                <div class="col-sm-10">
                                  <input type="text" name="nip_pihak_kedua" id="nip_pihak_kedua" class="form-control input-style" placeholder="NIP Pihak Kedua" 
                                  value="<?php echo isset($nip_pihak_kedua)?$nip_pihak_kedua:""; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Pihak Kedua </label>
                                <div class="col-sm-10">
                                  <input type="text" name="nm_pihak_kedua" id="nm_pihak_kedua" class="form-control input-style" placeholder="Nama Pihak Kedua" 
                                  value="<?php echo isset($nm_pihak_kedua)?$nm_pihak_kedua:""; ?>">
                                </div>
                              </div>
                                    <div class="form-group">
                                <label class="col-sm-2 control-label">Jabatan Pihak Kedua </label>
                                <div class="col-sm-10">
                                   <textarea class="form-control inout-style" name="jb_pihak_kedua" id="jb_pihak_kedua"><?php echo isset($jb_pihak_kedua)?$jb_pihak_kedua:""; ?></textarea>
                                </div>
                              </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Waktu Dan Tempat</h3>
                        </div>
                        <div class="panel-body">
                               <div class="form-group">
                                <label class="col-sm-2 control-label">Tempat </label>
                                <div class="col-sm-10">
                                  <input type="text" name="tmpt" id="tmpt" class="form-control input-style" placeholder="Tempat" 
                                  value="<?php echo isset($tmpt)?$tmpt:""; ?>">
                                </div>
                              </div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal </label>
                                <div class="col-sm-10">
                                  <input type="text" name="tgl" id="tgl" class="tanggal form-control input-style" placeholder="Tanggal" 
                                  value="<?php echo isset($tgl)?$tgl:""; ?>" data-date-format="dd-mm-yyyy">
                                </div>
                              </div>  
                        </div>
                    </div>
                </div>
            </div>







  


             <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Perjanjian Kinerja Tahun <?php echo date('Y'); ?></h3>
                            <span class="pull-right">
                              <button type="button" class="btn btn-primary" id="tambah_sasaran"><span class="fa fa-fw fa-plus"></span></button>
                            </span>
                        </div>
                        <div class="panel-body">

                            <table id="tabel_sasaran" class="table table-bordred table-striped">
                                    <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="50%">Sasaran</th>
                                        <th width="30%">Indikator Kinerja</th>
                                        <th width="10%">Target Kinerja (%)</th>
                                        <th width="5%">Delete</th>
                                    </tr>
                                    <tr>
                                        <th width="5%">1</th>
                                        <th width="50%">2</th>
                                        <th width="25%">3</th>
                                        <th width="15%">4</th>
                                        <th width="5%">5</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>

                          </div>
                    </div>
                </div>
            </div>


             <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Kegiatan Dan Anggaran Tahun <?php echo date('Y'); ?> </h3>
                            <span class="pull-right">
                              <button type="button" class="btn btn-primary" id="tambah_kegiatan"><span class="fa fa-fw fa-plus"></span></button>
                            </span>
                        </div>
                        <div class="panel-body">

                            <table id="tabel_kegiatan" class="table table-bordred table-striped">
                                    <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="50%">Kegiatan Utama</th>
                                        <th width="25%">Anggaran</th>
                                        <th width="15%">Sumber</th>
                                        <th width="5%">Delete</th>
                                    </tr>
                                    <tr>
                                        <th width="5%">1</th>
                                        <th width="50%">2</th>
                                        <th width="30%">3</th>
                                        <th width="10%">4</th>
                                        <th width="5%">5</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>

                          </div>
                    </div>
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
$this->load->view($this->controller."_view_js");
?>