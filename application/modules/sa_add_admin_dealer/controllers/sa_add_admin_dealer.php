<?php 
class sa_add_admin_dealer extends admin_controller{
	var $controller;
	function sa_add_admin_dealer(){
		parent::__construct();

		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
        $this->load->model("coremodel","cm");
		
		//$this->load->helper("serviceurl");
		
	}


    function cekEmail(){
        $email = $this->input->post('email');
        $jenis = $this->session->userdata('jenis');
        // show_array($jenis);exit();
        
        // $id = $this->input->post('id');
        $valid = true;

        if ($jenis['action']=='baru') {
            $this->db->where('email', $email);
            $jumlah = $this->db->get("pengguna")->num_rows();    
            if($jumlah == 1) {
                $valid = false;
            }
        }else{

            $id = $jenis['id'];
            $this->db->where('id', $id);
            $res = $this->db->get('pengguna')->row();
            $new_email = $res->email;
            // echo $new_email;exit;
            if ($email!=$new_email) {
                $this->db->where('email', $email);
                $jumlah = $this->db->get("pengguna")->num_rows();    
                if($jumlah == 1) {
                    $valid = false;
                }

            }
            
        }

        

        echo json_encode(array('valid' => $valid));
    
    }






function index(){
		$data_array=array();

        $data_array['arr_level'] = array('' => '- Pilih Satu -', '2' => 'Admin Dealer', '3' => 'User Dealer');
        $data_array['arr_dealer'] = $this->cm->arr_dropdown("M_DEALER", "DEALER_ID", "DEALER_NAMA", "DEALER_NAMA");
		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Admin Dealer");
		$this->set_title("Admin Dealer");
		$this->set_content($content);
		$this->cetak();
}


function baru(){
        $data_array=array();

        $data_array['action'] = 'simpan';

        $this->session->set_userdata('jenis', array('action'=>'baru'));


        $data_array['arr_level'] = array('' => '- Pilih Satu -', '2' => 'Admin Dealer', '3' => 'User Dealer');
        $data_array['arr_dealer'] = $this->cm->arr_dropdown("M_PENANGGUNGJAWAB", "ID", "NAMA", "NAMA");

        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah Admin Dealer");
        $this->set_title("Tambah Admin Dealer");
        $this->set_content($content);
        $this->cetak();
}


function cek_email($email){
    $this->db->where("email",$email);
    if($this->db->get("pengguna")->num_rows() > 0)
    {
         $this->form_validation->set_message('cek_email', ' %s Sudah ada');
         return false;
    }

}

function cek_passwd($p1){
    $p2 = $this->input->post('p2');

    if(empty($p1) or empty($p2)){
         $this->form_validation->set_message('cek_passwd', ' %s harus diisi');
         return false;
    }
    if($p1 <> $p2) {
        $this->form_validation->set_message('cek_passwd', ' %s tidak sama');
         return false;
    }
}

function cek_dealer($id_dealer){
    

    if(empty($id_dealer)){
         $this->form_validation->set_message('cek_dealer', ' %s harus dipilih');
         return false;
    }
}



function cek_userid($ID_USER) {
    $this->db->where("ID_USER = '$ID_USER'",null,false);
    $jumlah = $this->db->get("T_USER")->num_rows();
    if($jumlah > 0 ) {
        $this->form_validation->set_message('cek_userid', ' %s sudah ada');
    }
}

function simpan(){


    $post = $this->input->post();
    
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('ID_USER','User ID','required|callback_cek_userid');
        $this->form_validation->set_rules('NAMA_USER','Nama Pengguna','required');
        $this->form_validation->set_rules('DEALER_ID','Dealer','callback_cek_dealer');
         $this->form_validation->set_rules('p1','Password','required'); 
        // $this->form_validation->set_rules('email','Email','callback_cek_email');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        $post['PASSWORD'] = md5($post['p1']);
        $post['LASTUPDATE'] = date("d-M-y");

        // $post['level'] = '2';
        unset($post['p1']);
        unset($post['p2']);
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('T_USER', $post); 
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
        
  
        $nama = $_REQUEST['columns'][1]['search']['value'];
        $level = $_REQUEST['columns'][2]['search']['value'];
        $dealer = $_REQUEST['columns'][3]['search']['value'];


      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"nama" => $nama,
                "level" => $level,
                "dealer" => $dealer

				
				 
		);     
           
        $row = $this->dm->data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        

       
        $arr_data = array();
        foreach($result as $row) : 
		// $daft_id = $row['daft_id'];
        $id = $row['ID_USER'];
        $hapus = "<a href ='#' onclick=\"hapus('$id')\" class='btn btn-danger btn-xs'><i class='fa fa-trash'></i>Hapus</a>
        <a href ='$this->controller/editdata?id=$id' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i>Edit</a>";
        if ($row['LEVEL_AKSES']==2) {
            $jenis = 'ADMIN DEALER';
        }else{
            $jenis = 'USER DEALER';
        }
        	
        	 
        	$arr_data[] = array(
                $row['ID_USER'],
        		$row['NAMA_USER'],        		 
        		$row['NAMA'],
                $jenis,        		 
        		$hapus
        		
         			 
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

    	 $this->db->where("ID_USER = '$id'",null,false);
    	 $res = $this->db->get('T_USER');
    	 $data = $res->row_array();
         $data['arr_level'] = array('' => '- Pilih Satu -', '2' => 'ADMIN DEALER', '3' => 'USER DEALER');
         $data['arr_dealer'] = $this->cm->arr_dropdown("M_PENANGGUNGJAWAB", "ID", "NAMA", "NAMA");
         $this->session->set_userdata('jenis', array('action'=>'update', 'id'=>$id));

        


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

		$this->set_subtitle("Edit Pengguna");
		$this->set_title("Edit Pengguna");
		$this->set_content($content);
		$this->cetak();

    }



function cek_passwd2($p1){
    $p2 = $this->input->post('p2');
 
    if($p1 <> $p2) {
        $this->form_validation->set_message('cek_passwd', ' %s tidak sama');
         return false;
    }
}




function update(){

    $post = $this->input->post();
   
       


        $this->load->library('form_validation');

        $this->form_validation->set_rules('ID_USER','User ID','required|callback_cek_userid');
        $this->form_validation->set_rules('NAMA_USER','Nama Pengguna','required');
        // $this->form_validation->set_rules('DEALER_ID','Dealer','callback_cek_dealer');
         $this->form_validation->set_rules('p1','Password','callback_cek_passwd2'); 
        // $this->form_validation->set_rules('email','Email','callback_cek_email');   
        // $this->form_validation->set_rules('email','Email','callback_cek_email');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 




        if(!empty($post['p1']) or !empty($post['p2'])) {
            $post['PASSWORD'] = md5($post['p1']);
        }
        
        unset($post['p1']);
        unset($post['p2']);


        $id_user = $post['ID_USER'];

        $this->db->where("ID_USER = '$id_user'",null,false);
        $res = $this->db->update('T_USER', $post); 
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

    	$this->db->where("ID_USER = '$id'",null,false);

    	$res = $this->db->delete('T_USER');
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