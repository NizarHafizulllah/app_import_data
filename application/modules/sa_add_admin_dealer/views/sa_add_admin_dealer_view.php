 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


        <!-- Content Header (Page header) -->
        

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Admin Dealer</h3>
              <div class="box-tools pull-right">
              <a href="<?php echo site_url("$this->controller/baru"); ?>"><button type="button" class="btn btn-primary form-control"><i class="fa fa fa-plus-circle "></i> Tambah Admin Dealer</button></a>
              </div>
            </div>
            <div class="box-body">

            

            <form role="form" action="" id="btn-cari" >
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama"></input>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">Dealer</label>
                <?php echo form_dropdown("id_dealer",$arr_dealer,'','id="id_dealer" class="form-control input-style"'); ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">Sebagai</label>
                <?php echo form_dropdown("level",$arr_level,'','id="level" class="form-control"'); ?>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-primary form-control" id="btn_submit"><i class="fa">Cari</i></button>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="reset" class="btn btn-danger form-control" id="btn_reset"><i class="fa">Reset</i></button>
              </div>
            </div>
            </form>
            


<table width="100%" border="0" id="biro_jasa" class="table table-striped 
             table-bordered table-hover dataTable no-footer" role="grid">
<thead>
  <tr  >


        
        <th width="5%">ID</th> 
        <th width="23%">Nama</th>       
        <th width="14%">Dealer</th>
        <th width="14%">Sebagai</th>
        <th width="14%">#</th>
    </tr>
  
</thead>
</table>
            </div>
            </div>



<?php 
$this->load->view($this->controller."_view_js");
?>