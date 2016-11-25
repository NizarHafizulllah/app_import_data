<?php 

class sa_add_admin_dealer_model extends CI_Model {


	function sa_add_admin_dealer_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"ID_USER",
							"NAMA_USER",							 
							"DEALER_NAMA",
							"LEVEL_AKSES"							 
		 	);


		

		 $this->db->select('p.*, d.DEALER_NAMA',FALSE)->from("T_USER p");
		 $this->db->join('M_DEALER d','d.DEALER_ID = p.DEALER_ID','left');
		 // $this->db->where("p.level >",1);

		 if (!empty($level)) {
		 	$this->db->where("to_number(p.LEVEL_AKSES,9) = '$level'", null,false);
		 }else{
		 	$this->db->where("to_number(p.LEVEL_AKSES,9) > 1 ",null, false);
		 }

		 if (!empty($dealer)) {
		 	$this->db->where("p.DEALER_ID='$dealer'", null,false);
		 }

		 

		 if(!empty($nama)) {
		 	$this->db->like("p.NAMA_USER",$nama);
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