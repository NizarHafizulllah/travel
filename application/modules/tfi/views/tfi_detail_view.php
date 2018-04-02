        <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">PERJANJIAN KINERJA TAHUN <?php echo date('Y'); ?></h3>
                        </div>
                        <div class="panel-body">
                              
                        	<table width="100%">
                        		<tr>
                        			<td align="center"><img src="<?php echo base_url('assets/img/logo_sumbawa.png'); ?>" width='80' height='100'></td>
                        		</tr>
                        		<tr>
                        			<td>&nbsp;</td>
                        		</tr>
                        		<tr>
                        			<td align="center" style="font-size: 20px; font-family: Sans Serif"><b>PERJANJIAN KINERJA TAHUN <?php echo date('Y'); ?></b></td>
                        		</tr>
                        	</table>
    						<br/>&nbsp;
    						<p style="font-family: San Serif; font-size: 20px; text-align: justify;">Dalam rangka mewujudkan manajemen pemerintahan  yang  efektif, transparan, dan akuntabel serta berorentasi pada hasil, yang bertanda tangan di bawah ini:</p>
    						<br/>&nbsp;
    						<table width="100%" style="font-family: San Serif; font-size: 20px;">
    							<tr>
    								<td width="25%">Nama</td>
    								<td width="2%">:</td>
    								<td width="73%"><b><?php echo $data['nm_pihak_pertama']; ?></b></td>
    							</tr>
    							<tr>
    								<td valign="top">Jabatan</td>
    								<td valign="top">:</td>
    								<td><?php echo $data['jb_pihak_pertama'] ?></td>
    							</tr>
    						</table>
    						<br/>&nbsp;
    						<p style="font-family: San Serif; font-size: 20px">selanjutnya disebut Pihak Pertama</p>
    						<br/>&nbsp;
       						<table width="100%" style="font-family: San Serif; font-size: 20px;">
    							<tr>
    								<td width="25%">Nama</td>
    								<td width="2%">:</td>
    								<td width="73%"><b><?php echo $data['nm_pihak_kedua']; ?></b></td>
    							</tr>
    							<tr>
    								<td valign="top">Jabatan</td>
    								<td valign="top">:</td>
    								<td><?php echo $data['jb_pihak_kedua'] ?></td>
    							</tr>
    						</table>
    						<br/>&nbsp;
    						<p style="font-family: San Serif; font-size: 20px">selanjutnya disebut Pihak Kedua</p>
   							<br/>&nbsp;
   							<p style="font-family: San Serif; font-size: 20px; text-align: justify;">Pihak Pertama pada Tahun 2018 ini berjanji akan mewujudkan target kinerja tahunan sesuai lampiran perjanjian ini, dalam rangka mencapai target kinerja jangka menengah seperti   yang   telah   ditetapkan   dalam   dokumen   perencanaan. Keberhasilan dan kegagalan pencapaian target kinerja tersebut menjadi tanggung jawab Pihak Pertama.</p>
   							<br/>&nbsp;
   							<p style="font-family: San Serif; font-size: 20px; text-align: justify;">Pihak Kedua akan memberikan supervisi yang  diperlukan serta akan melakukan evaluasi akuntabilitas kinerja terhadap capaian kinerja dari   perjanjian ini dan mengambil tindakan yang diperlukan dalam rangka pemberian penghargaan dan sanksi.</p>
   							<br/>&nbsp;

   							<table width="100%">
   								<tr>
   									<td style="font-family: San Serif; font-size: 20px; text-align: center;"><b>LAMPIRAN</b></td>
   								</tr>
   								<tr>
   									<td style="font-family: San Serif; font-size: 20px; text-align: center;"><b>PERJANJIAN KINERJA</b></td>
   								</tr>
   							</table>


   							<br/>&nbsp;
   							<table width="100%" style="font-family: San Serif; font-size: 18px" border="2px;">
   								<tr>
   									<td style="text-align: center;" width="5%"><b>No.</b></td>
   									<td style="text-align: center;" width="30%"><b>Sasaran</b></td>
   									<td style="text-align: center;" width="50%"><b>Indikator Kinerja</b></td>
   									<td style="text-align: center;" width="15%"><b>Target Kinerja</b></td>
   								</tr>
   								<tr>
   									<td style="text-align: center;"><b>1</b></td>
   									<td style="text-align: center;"><b>2</b></td>
   									<td style="text-align: center;"><b>3</b></td>
   									<td style="text-align: center;"><b>4</b></td>
   								</tr>
   								<?php 
   									$no_sasaran = 0;
   									foreach ($data['sasaran'] as $row => $val) { 

   										$no_sasaran++;

   										
   										?>
   										
   								<tr>
   									<td style="text-align: center; vertical-align: top;"><?php echo $no_sasaran ?></td>
   									<td style="text-align: left;"><?php echo $val['sasaran']; ?></td>
   									<td style="text-align: left;"><?php echo $val['indikator']; ?></td>
   									<td style="text-align: center; vertical-align: center;"><?php echo $val['target'].'%'; ?></td>
   								</tr>


   								<?php	}
   								?>

   								
   							</table>


   							<br/>&nbsp;

   							<table width="100%">
   								<tr>
   									<td style="font-family: San Serif; font-size: 20px; text-align: center;"><b>Kegiatan dan Anggaran Tahun <?php echo date('Y'); ?></b></td>
   								</tr>
   							</table>

   							<table width="100%" style="font-family: San Serif; font-size: 18px" border="2px;">
   								<tr>
   									<td style="text-align: center;" width="5%"><b>No.</b></td>
   									<td style="text-align: center;" width="65%"><b>Kegiatan Utama</b></td>
   									<td style="text-align: center;" width="20%"><b>Anggaran</b></td>
   									<td style="text-align: center;" width="10%"><b>Sumber</b></td>
   								</tr>
   								<tr>
   									<td style="text-align: center;"><b>1</b></td>
   									<td style="text-align: center;"><b>2</b></td>
   									<td style="text-align: center;"><b>3</b></td>
   									<td style="text-align: center;"><b>4</b></td>
   								</tr>
   								<?php 
   									$no_sasaran = 0;
   									foreach ($data['kegiatan'] as $row => $val) { 

   										$no_sasaran++;

   										
   										?>
   										
   								<tr>
   									<td style="text-align: center; vertical-align: top;"><?php echo $no_sasaran ?></td>
   									<td style="text-align: left;"><?php echo $val['kegiatan_utm']; ?></td>
   									<td style="text-align: right;"><?php if($val['anggaran']!='0'){echo 'Rp '.rupiah($val['anggaran']).',00';}else{ echo ' - '; } ?>&nbsp;</td>
   									<td style="text-align: center; vertical-align: center;"><?php echo $val['sumber']; ?></td>
   								</tr>


   								<?php	}
   								?>

   								
   							</table>
   							<br/>&nbsp;

   							<table width="100%">
   								<tr>
   									<td width="50%" style="text-align: center; font-family: San Serif; font-size: 20px;">&nbsp;</td>
   									<td width="50%" style="text-align: center; font-family: San Serif; font-size: 20px;"><?php echo $data['tmpt'].', '.tgl_indo(flipdate($data['tgl']));?></td>
   								</tr>
   								<tr>
   									<td width="50%" style="text-align: center; font-family: San Serif; font-size: 20px;">Pihak Kedua,</td>
   									<td width="50%" style="text-align: center; font-family: San Serif; font-size: 20px;">Pihak Pertama,</td>
   								</tr>
   								<tr>
   									<td>&nbsp;</td>
   									<td>&nbsp;</td>
   								</tr>
   								<tr>
   									<td>&nbsp;</td>
   									<td>&nbsp;</td>
   								</tr>
   								<tr>
   									<td>&nbsp;</td>
   									<td>&nbsp;</td>
   								</tr>
   								<tr>
   									<td>&nbsp;</td>
   									<td>&nbsp;</td>
   								</tr>
   								<tr>
   									<td>&nbsp;</td>
   									<td>&nbsp;</td>
   								</tr>

   								<tr>
   									<td width="50%" style="text-align: center; font-family: San Serif; font-size: 20px;"><?php echo $data['nm_pihak_kedua']; ?></td>
   									<td width="50%" style="text-align: center; font-family: San Serif; font-size: 20px;"><?php echo $data['nm_pihak_pertama']; ?></td>
   								</tr>
   								<tr>
   									<td width="50%" style="text-align: center; font-family: San Serif; font-size: 20px;"><?php echo 'NIP. '.$data['nip_pihak_kedua']; ?></td>
   									<td width="50%" style="text-align: center; font-family: San Serif; font-size: 20px;"><?php echo 'NIP. '.$data['nip_pihak_pertama']; ?></td>
   								</tr>
   								<tr>
   									<td>&nbsp;</td>
   									<td>&nbsp;</td>
   								</tr>
								<tr>
   									<td>&nbsp;</td>
   									<td>&nbsp;</td>
   								</tr>

   							</table>
                <br/>&nbsp;
                <br/>&nbsp;
                <div class="col-md-12">
                  <button class="btn btn-primary"><i class="fa fa-print"> </i>Cetak PDF</button>
                  <a href="<?php echo site_url('tfi/editdata?id='.$data['id_tfi']) ?>" class="btn btn-success"><i class="fa fa-edit"> </i>Edit</a>
                </div>
                <br/>&nbsp;
                <br/>&nbsp;
                <br/>&nbsp;


                       </div>
                    </div>
                </div>
            </div>




