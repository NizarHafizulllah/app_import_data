<?php 

class sa_add_pj_model extends CI_Model {


	function sa_add_pj_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"ID",
							"BADAN_USAHA",
							"ALAMAT"							 
		 	);


		

		 $this->db->select('p.*',FALSE)->from("M_PENANGGUNGJAWAB p");
		


		 

		 if(!empty($nama)) {
		 	$this->db->like("p.BADAN_USAHA",$nama);
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