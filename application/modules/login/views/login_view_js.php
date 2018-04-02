<script type="text/javascript">
jQuery(document).ready(function() {
    

    $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
        $(this).removeClass('input-error');
    });
    
    

    $('.login-form').on('submit', function(e) {
         
        // alert('test');




        $(this).find('input[type="text"], input[type="password"], textarea').each(function(){
            if( $(this).val() == "" ) {
                e.preventDefault();
                $(this).addClass('input-error');
                 //alert('sukses'); return false;
            }
            else {
                $(this).removeClass('input-error');
            }

            });
                
        
        // begin go . 



        alert('go');

                        $("#mask").val($.md5($("#form-password").val()));
                        $("#form-password").val('');


                            $.ajax({
                                url : '<?php echo site_url("login/ceklogin") ?>',
                                type : 'post',
                                dataType : 'json',
                                beforeSend : function(){
                                    swal({
                                            buttonsStyling: false,
                                            text:'Anyone can use a computer'
                                        }).catch(swal.noop)
                                },
                                data : $(this).serialize(),
                                success : function(hasil){
                                    $('#myPleaseWait').modal('hide');

                                    if(hasil.error == false) {

                                         swal(
                                                {
                                                title: 'Selamat Datang',
                                                text: 'Anda Login Sebagai Admin Kecamatan',
                                                type: 'success',
                                                buttonsStyling: false,
                                                confirmButtonClass: 'btn btn-primary'
                                            }
                                        )        
                  
                                    }
                                    else {
                                         BootstrapDialog.alert({
                                                type: BootstrapDialog.TYPE_DANGER,
                                                title: 'Error',
                                                message: hasil.message
                                                 
                                            }); 
                                        
                                    }
                                }

                            });


        return false;




 

        // end of gone




    });
    
    /*
        Registration form validation
    */
    $('.registration-form input[type="text"], .registration-form textarea').on('focus', function() {
        $(this).removeClass('input-error');
    });
    
    $('.registration-form').on('submit', function(e) {
        
        $(this).find('input[type="text"], textarea').each(function(){
            if( $(this).val() == "" ) {
                e.preventDefault();
                $(this).addClass('input-error');
            }
            else {
                $(this).removeClass('input-error');
            }
        });

        $("#password").val($.md5($("#password").val()));
        $("#password2").val($.md5($("#password2").val()));



        $.ajax({
            url : '<?php echo site_url("login/register") ?>',
            type : 'post',
            dataType : 'json',
            beforeSend : function(){
                $('#myPleaseWait').modal('show');
            },
            data : $(this).serialize(),
            success : function(hasil){
                $('#myPleaseWait').modal('hide');

                if(hasil.error == false) {

                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: hasil.message,
                             
                        });     

                    //alert(hasil.message);
                    $(this).closest('form').find("input[type=text], textarea").val("");
                 
                }
                else {
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: hasil.message,
                             
                        }); 
                    //alert(hasil.message);
                }
            }

        });



        return false;
        
    });
    
    
});
    
   

</script>
