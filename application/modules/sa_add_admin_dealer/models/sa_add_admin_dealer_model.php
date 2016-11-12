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

		 $kolom = array(0=>"id",
							"nama",
							"email",
							"nomor_hp",
							"dealer",
							"level"							 
		 	);


		

		 $this->db->select('p.*, bj.nama as dealer')->from("pengguna p");
		 $this->db->join('dealer bj','p.id_dealer=bj.id');
		 $this->db->where("p.level >",1);

		 if (!empty($level)) {
		 	$this->db->where('p.level', $level);
		 }else{
		 	$this->db->where("p.level >",1);
		 }

		 if (!empty($dealer)) {
		 	$this->db->where('p.id_dealer', $dealer);
		 }

		 

		 if(!empty($nama)) {
		 	$this->db->like("p.nama",$nama);
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