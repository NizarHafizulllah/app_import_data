      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     
        <!-- Main content -->
        <form id="form_data" class="form-horizontal" method="post" 
        action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 

 


              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Tambah data </h3></strong>
    </div>
    <div class="panel-body" id="data_umum">


    

    <div class="form-group">
      <label class="col-sm-3 control-label">Nama Dealer</label>
      <div class="col-sm-9">
       
        <input type="text" name="BADAN_USAHA" id="BADAN_USAHA" class="form-control input-style" placeholder="Nama Dealer" value="<?php echo isset($BADAN_USAHA)?$BADAN_USAHA:""; ?>">
        <input type="hidden" name="ID" ID="ID" class="form-control input-style" placeholder="Nama" value="<?php echo isset($ID)?$ID:""; ?>">
      </div>
    </div>
    

     
    <div class="form-group">
      <label class="col-sm-3 control-label">Alamat Dealer</label>
      <div class="col-sm-9">
      <textarea name="ALAMAT" id="ALAMAT" class="form-control input-style" placeholder="ALAMAT . . ."><?php echo isset($ALAMAT)?$ALAMAT:""; ?></textarea>
      </div>
    </div>
    
    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="<?php echo $action; ?>" style="border-radius: 0;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <a href="<?php echo site_url("$this->controller"); ?>"><button style="border-radius: 0;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>
        </div>
      </div>

  </div>
  </form>


      <?php 
$this->load->view($this->controller."_form_view_js");
?>