<?php 
class us_import_data extends user_controller{
	var $controller;
	function us_import_data(){
		parent::__construct();

		$this->controller = get_class($this);
		// $this->load->model('admin_penduduk_model','dm');
        $this->load->model("coremodel","cm");
		
		$this->load->library("session");
		
	}


    function cekNIK(){
        $nik = $this->input->post('nik');
        $valid = true;
        $this->db->where('nik', $nik);
        $jumlah = $this->db->get("penduduk")->num_rows();    
        if($jumlah == 1) {
            $valid = false;
        }
        
        echo json_encode(array('valid' => $valid));
    
    }






function index(){
		$data_array=array();

		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Data");
		$this->set_title("Data");
		$this->set_content($content);
		$this->cetak();
}



function import(){
	$userdata = $this->session->userdata('user_login');
	$config['upload_path'] = './temp_upload/';
	$this->db->where('id_user', $userdata['id']);
	$this->db->delete('temp_main_table');
	
	if(!is_uploaded_file($_FILES['xlsfile']['tmp_name'])) {
			$ret = array("error"=>true,'pesan'=>"error");
			echo json_encode($ret);
			redirect(site_url('us_import_data'));
		}
	else {
		$full_path = $config['upload_path']. date("dmYhis")."_".$_FILES['xlsfile']['name'];
		copy($_FILES['xlsfile']['tmp_name'],$full_path);
		$this->load->library('excel');

		$objPHPExcel = PHPExcel_IOFactory::load($full_path);
		$arr_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);	

		
		$filename = $_FILES['xlsfile']['name'];
		

		$i=2;


		$hasil = array();

		foreach($arr_data   as  $index =>  $data) : 
			//echo "index $index <br />" ;
			// show_array($data);
		// echo $i.'<br />';
		// echo $data[$i]['A'] . '<br />'; 
		// $i++;
		
		if($index == 1)  continue;

		// $nama_pekerjaan = ;
		// $pekerjaan = ;
		// $id_pekerjaan = $pekerjaan;
		// echo $id_pekerjaan;exit;	

			$hasil = array(
			 
		"no_rangka"					=>$data['A'],
		"no_mesin" 				=>$data['B'],
		"tipe" 					=>$data['C'],
		"model" 				=>$data['D'],
		"jenis" 					=>$data['E'],
		"warna" 					=>$data['F'],
		"silinder" 					=>$data['G'],
		"thn_buat" 			=>$data['H'],
		"thn_rakit" 					=>$data['I'],
		"merk" 	=>$data['J'],
		"nama_pemilik" 			=>$data['K'],
		"alamat_pemilik" 		=>$data['L'],
		"jenis_perubahan" => 'T',
		"id_user" => $userdata['id'],
		"nama_file" => $filename
					);

			$this->db->insert('temp_main_table', $hasil);
			endforeach;
			// show_array($hasil); exit;

				$xdata = $hasil;
				// $this->session->set_userdata('agu', $xdata);
				// $userdata = $this->session->userdata('agu');
				// show_array($userdata);exit;
				// $_SESSION['xdata'] = $xdata;
				$arrdata['title'] = "IMPORT DATA";
				$this->db->where('id_user', $userdata['id']);
		 		$arrdata['data'] = $this->db->get('temp_main_table')->result_array();
		 		$arrdata['controller'] = "us_import_data";
			   	$content = $this->load->view($this->controller."_preview",$arrdata,true);
		}

		// show_array($penduduk);
		// exit();

			$this->set_subtitle("Data Import");
			$this->set_title("Data Import");
			$this->set_content($content);
			$this->cetak();

}


function save(){

		
		$userdata = $this->session->userdata("user_login");
		// $tes = $this->session->userdata("hello");
		// show_array($hasil_data); exit;

		// session_start();
		// show_array($_POST['data']);exit();
		$post = $this->input->post();
		// $xdata = $datalogin['xdata']; 
		
		$true = 0;
		$false = 0; 

		$arr_berhasil = array();
		$arr_gagal = array();

		if (!empty($post['data'])) {
			foreach($post['data'] as $index) : 
			
			$this->db->where('id', $index);
			$res = $this->db->get('temp_main_table')->row_array();
			$id = $res['id'];
			unset($res['id']);

			// unset($res['id_dealer']);
			$res['id_dealer'] = $userdata['id_dealer'];
			unset($res['jenis_perubahan']);
			$id_user = $res['id_user'];
			// unset($res['id_user']);


			$data_update = array();
			$this->db->where('no_rangka', $res['no_rangka']);
			$this->db->where('id_dealer', $userdata['id_dealer']);
			$res2 = $this->db->get('stck_non_provite');
			if ($res2->num_rows()>0) {
				$update = $res2->row_array();
				// show_array($update);exit;
				// echo $update['id'];
				$res['id_user'] = $userdata['id'];
				$res['tgl_entri'] = date('Y-m-d');
				$this->db->where('id', $update['id']);
				$this->db->set('tgl_entri', 'NOW()', FALSE);
				$this->db->update('stck_non_provite', $res);
				$data_update = array('jenis_perubahan' => 'U' );
				$this->db->where('id', $id);
				$this->db->update('temp_main_table', $data_update);
			}else{
				// $insert = $res2->row_array();
				// show_array($res);
				// echo $update['id'];
				$insert['id_user'] = $userdata['id'];
				$this->db->set('tgl_entri', 'NOW()', FALSE);
				$this->db->insert('stck_non_provite', $res);

				$data_update = array('jenis_perubahan' => 'S' );
				$this->db->where('id', $id);
				$this->db->update('temp_main_table', $data_update);
			}


			// show_array($xdata[$index]);
			
					// $res = $this->db->insert("penduduk",$xdata[$index]);
					// // echo $this->db->last_query()."<br />"; 

					// if($res) { 
					// 	$true++;
					// 	$arr_berhasil[] = $xdata[$index]['nik']. " ". $xdata[$index]['nama'];
					// }
					// else {
					// //	echo "error ".$xdata[$index]['nik']. " ". $xdata[$index]['nama']. mysql_error()."<br />";
					// 	$false++;
					// 	$arr_gagal[] = $xdata[$index]['nik']. " ". $xdata[$index]['nama'];
					// }
			
		endforeach;
		}

		

		// exit;
				$this->db->where('jenis_perubahan', 'U');
				$this->db->where('id_user', $userdata['id']);
				$update = $this->db->get('temp_main_table')->num_rows();

				$this->db->where('jenis_perubahan', 'S');
				$this->db->where('id_user', $userdata['id']);
				$simpan = $this->db->get('temp_main_table')->num_rows();

				$this->db->where('jenis_perubahan', 'T');
				$this->db->where('id_user', $userdata['id']);
				$tidak_dipilih = $this->db->get('temp_main_table')->num_rows();
		
		 		$arrdata['update'] = $update;
		 		$arrdata['simpan'] = $simpan;
		 		$arrdata['tidak_dipilih'] = $tidak_dipilih;
		 		$arrdata['arr_berhasil'] = $arr_berhasil;
		 		$arrdata['arr_gagal'] = $arr_gagal;
		 		$arrdata['controller'] = "penduduk_import";
			   	$content = $this->load->view("us_import_data_result",$arrdata,true);
			   	$now = date('Y-m-d');
				$this->set_subtitle("Hasil Import Data Tanggal ".flipdate($now));
				$this->set_title("Hasil Import Data ");
				$this->set_content($content);
				$this->cetak();
	}



    function coba() {
    	$data1 = array(
    			'1' => '1234',
    			'2' => '1234',
    			'3' => '1234',
    			'4' => '1234',
    		);

    	$data = array(
    			'satu' => $data1,
    			'dua' => 'kambing',
    			'tiga' => 'kambing',
    			'empat' => 'kambing',
    			'df' => $data1,
    			'ssfatsu' => $data1,
    			'safdtu' => $data1,
    			'safdftu' => $data1,
    			'safdfdsertu' => $data1,
    			'satdfdfu' => $data1,

    		);
    	$this->session->set_userdata('coba', $data);


    }

    function tes() {

$tes = $this->session->userdata("hello");
		show_array($tes);
    }

    function tes2() {

    	$this->session->unset_userdata('coba');

    }



}

?>
