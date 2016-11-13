 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


        <!-- Content Header (Page header) -->
        

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Hasil Import</h3>
              <div class="box-tools pull-right">
              
              </div>
            </div>
            <div class="box-body">

            

            <form role="form" action="" id="btn-cari" >
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">Tanggal Awal</label>
                <input name="tanggal_awal" id="tanggal_awal" type="text" class="form-control tanggal" placeholder="Tanggal Awal" data-date-format="dd-mm-yyyy"></input>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">Tanggal Akhir</label>
                <input name="tanggal_akhir" id="tanggal_akhir" type="text" class="form-control tanggal" placeholder="Tanggal Akhir" data-date-format="dd-mm-yyyy"></input>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Tanggal">User Entri</label>
                <?php echo form_dropdown("id_user",$arr_user,isset($id_user)?$id_user:'','id="id_user" class="form-control input-style"'); ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">No. Rangka</label>
                <input id="no_rangka" name="no_rangka" type="text" class="form-control" placeholder="No. Rangka"></input>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-default form-control" id="btn_submit"><i class="fa">Cari</i></button>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="reset" class="btn btn-default form-control" id="btn_reset"><i class="fa">Reset</i></button>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-default form-control" id="btn_submit"><i class="fa">PDF</i></button>
              </div>
            </div>
            </form>
            


<table width="100%" border="0" id="biro_jasa" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr  >


        
       
        <th width="12%" >No. Rangka</th>
        <th width="12%" >No. Mesin</th>
        <th width="9%" >Tipe</th>
        <th width="12%" >Model</th>
        <th width="10%" >Merk</th>
        <th width="14%" >Tahun Buat</th>
        <th width="3%" >Nama Pemilik</th>
        <th width="5%" >Alamat Pemilik</th>
    </tr>
  
</thead>
</table>
            </div>
            </div>



<?php 
$this->load->view($this->controller."_view_js");
?>