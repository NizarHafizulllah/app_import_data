<?php 

class sa_add_dealer_model extends CI_Model {


	function sa_add_dealer_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"DEALER_ID",
							"DEALER_NAMA",
							"ALAMAT_LINK"							 
		 	);


		

		 $this->db->select('p.*',FALSE)->from("M_DEALER p");
		


		 

		 if(!empty($nama)) {
		 	$this->db->like("p.DEALER_NAMA",$nama);
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