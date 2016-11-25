<script type="text/javascript">

$(document).ready(function(){


$('#form_data').bootstrapValidator({
                message: 'This value is not valid', 
                feedbackIcons: { 
                    valid: 'glyphicon glyphicon-ok', 
                    invalid: 'glyphicon glyphicon-remove', 
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nama: {
                        validators: {
                            notEmpty: {
                                message : 'Nama tidak boleh kosong' 
                            }
                        }
                    },

                    alamat: {
                        validators: {
                            notEmpty: {
                                message : 'Alamat tidak boleh kosong' 
                            }
                        }
                    },
                    p1: {
                        validators: {
                            notEmpty: {
                                message : 'Password tidak boleh kosong' 
                            },
                            stringLength: {
                                min: 6, 
                                message: 'Panjang minimal 6 karakter'
                            }
                        }
                    },
                    nomor_hp: {
                        validators: {
                            notEmpty: {
                                message : 'No. HP tidak boleh kosong' 
                            },
                            stringLength: {
                                min: 11, 
                                message: 'Panjang minimal 11 karakter'
                            }
                        }
                    },
                    p2: {
                        validators: {
                            notEmpty: {
                                message: 'Tidak boleh kosong'
                            },
                            identical: {
                                field: 'p1',
                                message: 'Passwod yang anda masukkan tidak sesuai'
                            }
                        }
                    },

                    email: {
                        validators: {
                            notEmpty: {
                                message : 'Email tidak boleh kosong'    
                            },
                            emailAddress: {
                                message : 'Email harus valid'
                            },
                            remote: {
                                type: 'POST',
                                url: "<?php echo site_url($this->controller.'/cekEmail'); ?>",
                                message: 'Dealer dengan email ini sudah terdaftar',
                                delay: 200
                            }
                        }
                    } 

                    
                }
                
            });



        $('#reset').click(function() {
            $('#form_data').data('bootstrapValidator').resetForm(true);
        });



$("#simpan").click(function(){
 console.log('tests');
 $('#myPleaseWait').modal('show');

    $.ajax({
        url:'<?php echo site_url("$this->controller/simpan"); ?>',
        data : $('#form_data').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){
            $('#myPleaseWait').modal('hide');

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                            callback: function(result) {
                                                        location.href='<?php echo site_url("sa_add_admin_dealer"); ?>';
                                                }
                             
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



$("#update").click(function(){ 
    $('#myPleaseWait').modal('show');
    $.ajax({
        url:'<?php echo site_url("$this->controller/update"); ?>',
        data : $('#form_data').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){

            $('#myPleaseWait').modal('hide');

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message,
                            callback: function(result) {
                                                        location.href='<?php echo site_url("sa_add_admin_dealer"); ?>';
                                                }
                             
                        });   
                     // $('#form_data').data('bootstrapValidator').resetForm(true);
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







});
</script>