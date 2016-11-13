<?php 
class ad_ekspor_data extends dealer_controller{
	var $controller;
	function ad_ekspor_data(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}









function index(){
		$data_array=array();
        $userdata = $this->session->userdata('dealer_login');

        $data_array['arr_user'] = $this->cm->arr_dropdown2("pengguna", "id", "nama", "nama", "id_dealer", $userdata['id_dealer']);
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Data Hasil Import");
		$this->set_title("Data Hasil Import");
		$this->set_content($content);
		$this->cetak();
}


function baru(){
        $data_array=array();

        $data_array['action'] = 'simpan';

        $this->session->set_userdata('jenis', array('action'=>'baru'));

        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah Dealer");
        $this->set_title("Tambah Dealer");
        $this->set_content($content);
        $this->cetak();
}




function simpan(){


    $post = $this->input->post();
    
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama Dealer','required'); 
        $this->form_validation->set_rules('alamat','Alamat Dealer','required');   
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

       

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('dealer', $post); 
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}




    function get_data() {

    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
        $tgl_awal = $_REQUEST['columns'][1]['search']['value'];
        $tgl_akhir = $_REQUEST['columns'][2]['search']['value'];
        $no_rangka = $_REQUEST['columns'][3]['search']['value'];
        $id_user = $_REQUEST['columns'][4]['search']['value'];

        $userdata = $this->session->userdata('dealer_login');

        // show_array($userdata);exit();
      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
                "tgl_awal" => $tgl_awal,
                "tgl_akhir" => $tgl_akhir,
				"no_rangka" => $no_rangka,
                "id_user" => $id_user,
                "id_dealer" => $userdata['id_dealer']
				
				 
		);     
           
        $row = $this->dm->data($req_param)->result_array();
        // echo $this->db->last_query();exit;
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		// $daft_id = $row['daft_id'];
        $id = $row['id'];
        
        	
        	 
        	$arr_data[] = array(
        		$row['no_rangka'],
        		$row['no_mesin'], 
                $row['tipe'],
                $row['model'],
                $row['merk'],
                $row['thn_buat'],
                $row['nama_pemilik'],
                $row['alamat_pemilik']
        		
         			 
        		  				);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
    }

    

    function editdata(){
    	 $get = $this->input->get(); 
    	 $id = $get['id'];

    	 $this->db->where('id',$id);
    	 $res = $this->db->get('dealer');
    	 $data = $res->row_array();

         $this->session->set_userdata('jenis', array('action'=>'update', 'id'=>$id));

        $data['arr_dealer'] = $this->cm->arr_dropdown("dealer", "id", "nama", "nama");


        $data['action'] = 'update';
         // show_array($data); exit;
    	 
		

    	// $data_array=array(
    	// 		'id' => $data->id,
    	// 		'nama' => $data->nama,
    	// 		'no_siup' => $data->no_siup,
    	// 		'no_npwp' => $data->no_npwp,
    	// 		'no_tdp' => $data->no_tdp,
    	// 		'telp' => $data->telp,
    	// 		'alamat' => $data->alamat,
    	// 		'email' => $data->email,
    	// 		'hp' => $data->hp,

    	// 	);
		$content = $this->load->view($this->controller."_form_view",$data,true);

         // $content = $this->load->view($this->controller."_form_view",$data,true);

		$this->set_subtitle("Edit Biro Jasa");
		$this->set_title("Edit Biro Jasa");
		$this->set_content($content);
		$this->cetak();

    }







function update(){

    $post = $this->input->post();
   
       


        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama','Nama Dealer','required');    
        $this->form_validation->set_rules('alamat','Alamat Dealer','required');          
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 


        $this->db->where("id",$post['id']);
        $res = $this->db->update('dealer', $post); 
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DIUPDATE");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DIUPDATE");
        }
}
else {
    $arr = array("error"=>true,'message'=>validation_errors());
}
        echo json_encode($arr);
}



    function hapusdata(){
    	$get = $this->input->post();
    	$id = $get['id'];

    	$data = array('id' => $id, );

    	$res = $this->db->delete('dealer', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
    	//redirect('sa_birojasa_user');
        echo json_encode($arr);
    }



	// function simpan(){
	// 	$post = $this->input->post();
	// 	$password = md5($post['password']);
	// 	$data = array('nama' => $post['nama'],
	// 					'email' => $post['email'],
	// 					'alamat' => $post['alamat'],
	// 					'password' => $password,
	// 					'level' => 2);
	// 	$this->db->insert('sa_birojasa_user', $data); 

	// 	redirect('sa_birojasa_user');
	// }





	

}

?>