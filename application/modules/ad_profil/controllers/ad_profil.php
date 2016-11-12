<?php 
class ad_profil extends dealer_controller{
	var $controller;
	function ad_profil(){
		parent::__construct();

		$this->controller = get_class($this);
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








function baru(){
        $data_array=array();

        $data_array['action'] = 'simpan';

        $this->session->set_userdata('jenis', array('action'=>'baru'));

        $data_array['arr_dealer'] = $this->cm->arr_dropdown("dealer", "id", "nama", "nama");

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

function simpan(){


    $post = $this->input->post();
    
       


        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama Pengguna','required');
        $this->form_validation->set_rules('id_dealer','Dealer','callback_cek_dealer');
        $this->form_validation->set_rules('nomor_hp','Nomor HP','required');   
        $this->form_validation->set_rules('p1','Password','required'); 
        $this->form_validation->set_rules('email','Email','callback_cek_email');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        $post['password'] = md5($post['p1']);

        $post['level'] = '2';
        unset($post['p1']);
        unset($post['p2']);
        //show_array($data);

if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('pengguna', $post); 
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




    

    function index(){
    	 $get = $this->session->userdata('dealer_login'); 
    	 $id = $get['id'];

    	 $this->db->where('id',$id);
    	 $res = $this->db->get('pengguna');
    	 $data = $res->row_array();

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
		$content = $this->load->view($this->controller."_view",$data,true);

         // $content = $this->load->view($this->controller."_form_view",$data,true);

		$this->set_subtitle("Edit Profil");
		$this->set_title("Edit Profil");
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

        $this->form_validation->set_rules('nama','Nama Pengguna','required');    
        $this->form_validation->set_rules('nomor_hp','Nomor HP','required');   
        $this->form_validation->set_rules('p1','Password','callback_cek_passwd2'); 
        // $this->form_validation->set_rules('email','Email','callback_cek_email');   
        // $this->form_validation->set_rules('email','Email','callback_cek_email');    
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 




        if(!empty($post['p1']) or !empty($post['p2'])) {
            $post['password'] = md5($post['p1']);
        }
        
        unset($post['p1']);
        unset($post['p2']);




        $this->db->where("id",$post['id']);
        $res = $this->db->update('pengguna', $post); 
        if($res){
            $this->db->where('id', $post['id']);
            $member = $this->db->get('pengguna')->row_array();
            $member['login'] = true;
            $this->session->set_userdata('dealer_login', $member);
            $datalogin = $this->session->userdata("dealer_login");
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

    	$res = $this->db->delete('pengguna', $data);
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