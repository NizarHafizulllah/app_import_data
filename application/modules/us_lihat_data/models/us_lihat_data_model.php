<?php 

class us_lihat_data_model extends CI_Model {


	function us_lihat_data_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);



		 $kolom = array(0=>'TGL_INSERT',
							'NO_RANGKA',
							'TIPE',
							'MERK',
							'THN_BUAT',
							'NAMA_PEMILIK1',
							'ALAMAT_PEMILIK1',
							'FILE_NAME'						 
		 	);

		 // $this->db->where("p.id_user",$id_user);
		 $this->db->where("DEALER_ID = '$DEALER_ID'", null,false);		

		 $this->db->select("p.*,to_char(TGL_INSERT,'DD-MM-YYYY') AS TGL_INSERT2" )->from("T_FAKTUR p");
		

		 $tgl_awal = flipdate($tgl_awal);
			$tgl_akhir = flipdate($tgl_akhir);
		 
		if(!empty($tgl_awal) and !empty($tgl_akhir) ) {
		 	$this->db->where("TGL_INSERT between '$tgl_awal' and '$tgl_akhir'",null,false);	 	
		 }

		 if(!empty($nama_file)) {
		 	$this->db->like("p.FILE_NAME = '$nama_file'",NULL,FALSE);
		 }


		 
		 	
		 

		 if(!empty($no_rangka)) {
		 	$this->db->where("p.NO_RANGKA LIKE '%$no_rangka%'",null,false);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}


	


}

?>