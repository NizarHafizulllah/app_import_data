 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


        <!-- Content Header (Page header) -->
        

          <!-- Default box -->
          

            

            <form role="form" action="" id="btn-cari" >
            <div class="row">
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
                <label for="Tanggal">Nama File</label>
                <input name="nama_file" id="nama_file" type="text" class="form-control" placeholder="Nama File"></input>
              </div>
            </div>

            
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">No. Rangka</label>
                <input id="no_rangka" name="no_rangka" type="text" class="form-control" placeholder="No. Rangka"></input>
              </div>
            </div>
            </div>
             <div class="row">
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
            <div class="col-md-3">
              <div class="form-group">
                <label></label>
                <a href="<?php echo site_url('us_import_data'); ?>" class="btn btn-default form-control" ><i class="fa">Import Data</i></a>
              </div>
            </div>
            </div>
            </form>
            


<table width="100%" border="0" id="biro_jasa" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr  > 
        <th width="12%" >Tgl. Entri</th>
        <th width="12%" >No. Rangka</th>
        <th width="9%" >Tipe</th>
        
        <th width="5%" >Merk</th>
        <th width="3%" >Tahun Buat</th>
        <th width="11%" >Nama Pemilik</th>
        <th width="13%" >Alamat Pemilik</th>
        <th width="12%" >Nama File</th>
    </tr>
  
</thead>
</table>
            



<?php 
$this->load->view($this->controller."_view_js");
?>