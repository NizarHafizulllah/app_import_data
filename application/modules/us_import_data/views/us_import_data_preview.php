
<form class="form-inline" id="gembreng" enctype="multipart/form-data" method="post" action="<?php echo site_url($this->controller."/save"); ?>">
<button type="submit" class="btn btn-primary">Import Data</button>
<table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                         <th width="3%"><input type="checkbox" id="selall" name="selall" value="1" /></th>
                        <th width="4%" >NO.</th>
                        <th width="12%" >NO. Rangka</th>
                        <th width="12%" >NO. Mesin</th>
                        <th width="9%" >Tipe</th>
                        <th width="12%" >Model</th>
                        <th width="10%" >Merk</th>
                        <th width="14%" >Tahun Buat</th>
                        <th width="3%" >Nama Pemilik</th>
                        <th width="5%" >Alamat Pemilik</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
        $i = 0;
        //show_array($data);  
        foreach($data as $index => $row) : 
        $i++;
        ?>   
           <tr>
             <td><input class="ck_data" type="checkbox" name="data[<?php echo $row['id']; ?>]" value="<?php echo isset($row['id'])?$row['id']:""; ?>" /></td>
             <td><?php echo $i; ?></td>
             <td><?php echo $row['no_rangka']; ?></td>
             <td><?php echo $row['no_mesin']; ?></td>
             <td><?php echo $row['tipe']; ?></td>
             <td><?php echo $row['model']; ?></td>
             <td><?php echo $row['merk']; ?></td>
             <td><?php echo $row['thn_buat']; ?></td>
             <td><?php echo $row['nama_pemilik']; ?></td>
             <td><?php echo $row['alamat_pemilik']; ?></td>
       </tr>
           <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th width="3%">&nbsp;</th>
                        <th width="4%" >NO.</th>
                        <th width="12%" >NO. Rangka</th>
                        <th width="12%" >NO. Mesin</th>
                        <th width="9%" >Tipe</th>
                        <th width="12%" >Model</th>
                        <th width="10%" >Merk</th>
                        <th width="14%" >Tahun Buat</th>
                        <th width="3%" >Nama Pemilik</th>
                        <th width="5%" >Alamat Pemilik</th>
                      </tr>
                    </tfoot>
                  </table>

                  </form>






<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.css">
<script src="<?php echo base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $('#example2').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

<script>
 $(document).ready(function(){
 
$("#selall").click(function(){
    
    if(this.checked) { // check select status
            $('.ck_data').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.ck_data').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }

    
}
);
});              
</script>