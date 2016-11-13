
<script type="text/javascript">

$(document).ready(function(){
  $(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });


	 var dt = $("#biro_jasa").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("$this->controller/get_data") ?>'
		 	});

		 
		 $("#biro_jasa_filter").css("display","none");  
	
	 
		 $("#btn_submit").click(function(){
		 	  // alert('hello');
		 	  

		 	  dt.column(1).search($("#tanggal_awal").val())
          .column(2).search($("#tanggal_akhir").val())
          .column(3).search($("#no_rangka").val())
          .column(4).search($("#id_user").val())
          .column(5).search($("#nama_file").val())
          .draw();

				 return false;
		 });


		 $("#btn_reset").click(function(){
			$("#tanggal_awal").val('');
      $("#tanggal_akhir").val('');
      $("#no_rangka").val('');
      $("#id_user").val('');
      $("#nama_file").val('');

			$("#btn_submit").click();
		 });


$("#excel_print").click(function() {
  

  var nama;
  var kecamatan;
  var desa;

  id_user = $("#id_user").val();
  tanggal_akhir = $("#tanggal_akhir").val();
  tanggal_awal = $("#tanggal_awal").val();
  nama_file = $("#nama_file").val();
  
  // window.alert(tanggal_awal);
  
  open('<?php echo site_url("$this->controller/excel?"); ?>'+'tanggal_awal='+ tanggal_awal +'&tanggal_akhir='+tanggal_akhir+'&id_user='+id_user+'&nama_file='+nama_file);

});




});
	




function hapus(id){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA DEALER. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA DEALER',
            draggable: true,
            buttons : [
              {
                label : 'YA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                  	url : '<?php echo site_url("$this->controller/hapusdata") ?>',
                  	type : 'post',
                  	data : {id : id},
                  	dataType : 'json',
                  	success : function(obj) {
                  		$('#myPleaseWait').modal('hide'); 
                  		if(obj.error==false) {
                  				BootstrapDialog.alert({
				                      type: BootstrapDialog.TYPE_PRIMARY,
				                      title: 'Informasi',
				                      message: obj.message,
				                       
				                  });   

                  			$('#biro_jasa').DataTable().ajax.reload();		
                  		}
                  		else {
                  			BootstrapDialog.alert({
			                      type: BootstrapDialog.TYPE_DANGER,
			                      title: 'Error',
			                      message: obj.message,
			                       
			                  }); 
                  		}
                  	}
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });

}
 		 




</script>