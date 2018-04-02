<script type="text/javascript">
	
	$(document).ready(function(){

    <?php if(!empty($kegiatan)){ 
        $no = 0;
        foreach ($kegiatan as $k) { ?>
        

        BarisBaru();
        $('.id:eq(<?php echo $no; ?>)').val(<?php echo $k['id'] ?>);
        $('.kegiatan_utama:eq(<?php echo $no; ?>)').html('<?php echo $k['kegiatan_utm'] ?>');
        $('.anggaran:eq(<?php echo $no; ?>)').val(<?php echo $k['anggaran'] ?>);
        $('.sumber:eq(<?php echo $no; ?>)').val('<?php echo $k['sumber'] ?>');

        
        
    <?php $no++;    } }else{ ?>
        BarisBaru();

<?php   } ?>



<?php if(!empty($sasaran)){ 
        $no = 0;
        foreach ($sasaran as $k) { ?>
        

        BarisBarusasaran();
        $('.id:eq(<?php echo $no; ?>)').val(<?php echo $k['id'] ?>);
        $('.sasaran:eq(<?php echo $no; ?>)').html('<?php echo $k['sasaran'] ?>');
        $('.indikator:eq(<?php echo $no; ?>)').html("<?php echo $k['indikator'] ?>");
        $('.target:eq(<?php echo $no; ?>)').val('<?php echo $k['target'] ?>');

        
        
    <?php $no++;    } }else{ ?>
        BarisBarusasaran();

<?php   } ?>

   

    $(".rupiah").autoNumeric('init');

    $("#simpan").click(function(){
 // console.log('tests');

    $.ajax({
        url:'<?php echo site_url("$this->controller/simpan"); ?>',
        data : $('#form_simpan').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message
                             
                        });   
                      $('#form_data').data('bootstrapValidator').resetForm(true);
                      
            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        }); 
            }
        }
    });

    return false;
});

    

    $('#tambah_kegiatan').click(function(){
        BarisBaru();
    });


    $('#tambah_sasaran').click(function(){
        BarisBarusasaran();
    });

		$('.tanggal').datepicker().on('changeDate', function(ev){
             $('.tanggal').datepicker('hide');
            });

		$('#nip_pihak_pertama').blur(function(){
			
		$.ajax({
        	url:'<?php echo site_url("$this->controller/get_data_bynip"); ?>',
        	data : {nip : $('#nip_pihak_pertama').val() },
        	type : 'post',
        	dataType : 'json',
        	success : function(res){
        		// console.log(res.error);
        		// console.log(res);
            	$('#nm_pihak_pertama').val(res.nama);
            	$('#jb_pihak_pertama').html(res.jabatan);

        		},
    		});
		});

		$('#nip_pihak_kedua').blur(function(){
			
		$.ajax({
        	url:'<?php echo site_url("$this->controller/get_data_bynip"); ?>',
        	data : {nip : $('#nip_pihak_kedua').val() },
        	type : 'post',
        	dataType : 'json',
        	success : function(res){
        		// console.log(res.error);
        		// console.log(res);
            	$('#nm_pihak_kedua').val(res.nama);
            	$('#jb_pihak_kedua').html(res.jabatan);

        		},
    		});
		});
	});

    function BarisBaru(){
    var Nomor = $('#tabel_kegiatan tbody tr').length + 1;
    var Baris = "<tr>";
        Baris += "<td>"+Nomor+"</td>";
        Baris += "<td>";
            Baris += ""
            Baris += "<textarea class='form-control kegiatan_utama' name='kegiatan_utama[]' id='kegiatan_utama'></textarea>";
            Baris += "<input type='hidden' name='id[]' class='id'>";
        Baris += "</td>";
        Baris += "<td>";
            Baris += "<input type='text' class='rupiah form-control anggaran' name='anggaran[]' id='anggaran' data-a-sign='' data-a-dec=',' data-a-sep='.' placeholder='Anggaran'>";
        Baris += "</td>";
        Baris += "<td>";
            Baris += "<select name='sumber[]' id='sumber' class='form-control sumber'>";
             Baris += "<option value=''>-Pilih Satu-</option>";
             Baris += "<option value='APBD'>APBD</option>";
            Baris += "<option value='APBN'>APBN</option>";
            Baris +="</select>";
        Baris += "</td>";
        Baris += "<p><td><button class='btn btn-danger btn-xs' id='HapusBaris'><span class='fa fa-fw fa-times'></span></i></button></p></td>";
        Baris += "</tr>";

    $('#tabel_kegiatan tbody').append(Baris);

    $(".rupiah").autoNumeric('init');

    $('#tabel_kegiatan tbody tr').each(function(){
        $(this).find('td:nth-child(2) input').focus();
    });
    }


    function BarisBarusasaran(){
    var Nomor = $('#tabel_sasaran tbody tr').length + 1;
    var Baris = "<tr>";
        Baris += "<td>"+Nomor+"</td>";
        Baris += "<td>";
            Baris += "<textarea class='form-control' name='sasaran[]' id='sasaran'></textarea>";
            Baris += "<input type='hidden' name='id_sasaran[]' class='id_sasaran'>";
        Baris += "</td>";
        Baris += "<td>";
            Baris += "<textarea class='form-control' name='indikator[]' id='indikator'></textarea>";
        Baris += "</td>";
        Baris += "<td>";
            Baris += "<input type='text' class='form-control' name='target[]' id='target' placeholder='Target Kinerja'>";
        Baris += "</td>";
        Baris += "<p><td><button class='btn btn-danger btn-xs' id='HapusBarisSasaran'><span class='fa fa-fw fa-times'></span></i></button></p></td>";
        Baris += "</tr>";

    $('#tabel_sasaran tbody').append(Baris);


    $('#tabel_sasaran tbody tr').each(function(){
        $(this).find('td:nth-child(2) input').focus();
    });
    }


$(document).on('click', '#HapusBaris', function(e){
    e.preventDefault();
    $(this).parent().parent().remove();

    var Nomor = 1;
    $('#TabelTransaksi tbody tr').each(function(){
        $(this).find('td:nth-child(1)').html(Nomor);
        Nomor++;
    });

});

$(document).on('click', '#HapusBarisSasaran', function(e){
    e.preventDefault();
    $(this).parent().parent().remove();

    var Nomor = 1;
    $('#tabel_sasaran tbody tr').each(function(){
        $(this).find('td:nth-child(1)').html(Nomor);
        Nomor++;
    });

    HitungTotalBayar();
});


</script>