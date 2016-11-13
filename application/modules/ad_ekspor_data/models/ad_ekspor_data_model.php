<?php 

class ad_ekspor_data_model extends CI_Model {


	function ad_ekspor_data_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
							"no_rangka",
							"dealer", 
							'tgl_entri'							 
		 	);


		$this->db->where('id_dealer', $id_dealer);		
		
		 $this->db->select('p.*,')->from("stck_non_provite p");
		

		 $tgl_awal = flipdate($tgl_awal);
			$tgl_akhir = flipdate($tgl_akhir);
		 
		if(!empty($tgl_awal) and !empty($tgl_akhir) ) {
		 	$this->db->where("tgl_entri between '$tgl_awal' and '$tgl_akhir'",null,false);	 	
		 }

		 if(!empty($id_user)) {
		 	$this->db->like("p.id_user",$id_user);
		 }

		 if(!empty($no_rangka)) {
		 	$this->db->like("p.no_rangka",$no_rangka);
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