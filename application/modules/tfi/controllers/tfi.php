<?php 


class tfi extends admin_controller {
	
	var $controller;
	public function tfi(){
		parent::__construct();
		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
        $this->load->model("coremodel","cm");
         $this->load->helper("tanggal");
	}
	
		function index(){

        $data_array=array();
        $userdata = $this->session->userdata('admin_login');
        

		$tahun_ini = date('Y');
        $this->db->where('year(tgl)', $tahun_ini);
        $tfi = $this->db->get('tfi');

        // echo $this->db->last_query();
        // exit();
        if ($tfi->num_rows()==0) {
            $data_array['action'] = 'simpan';
            $data_array['form'] = 'form_simpan';
            $data_array['curPage'] = '';
            $content = $this->load->view($this->controller."_view",$data_array,true);
        }else{
            $data_array['data'] = $tfi->row_array();
            $this->db->where('id_tfi', $data_array['data']['id_tfi']);
            $data_array['data']['sasaran'] = $this->db->get('sasaran')->result_array();
            $this->db->where('id_tfi', $data_array['data']['id_tfi']);
            $data_array['data']['kegiatan'] = $this->db->get('kegiatan_tfi')->result_array();
            $data_array['curPage'] = '';
            $content = $this->load->view($this->controller."_detail_view",$data_array,true);
        }

		



		

		$this->set_subtitle("PK");
		$this->set_title("PK");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


    function coba(){
        $var = $this->input->get();

        // show_array($var);
        $kalimat = $var['kalimat'];

        $pecah = explode(' ', $kalimat);

        show_array($pecah);
        foreach ($pecah as $key) {
            $this->db->like('sumbawa', $key);
            $res = $this->db->get('test_kamus');

            if (!empty($res->num_rows())) {
            $data = $res->row_array();
              $hasil[] = $data['indo']; 
            }else{
               $hasil[] = $key; 
            }
            
        }
        echo implode(' ', $hasil);
        exit();
    }


    function editdata(){

        $post = $this->input->get();

        $data_array = array();

        $this->db->where('id_tfi', $post['id']);
        $data_array = $this->db->get('tfi')->row_array();
        
        $this->db->where('id_tfi', $data_array['id_tfi']);
        $data_array['sasaran'] = $this->db->get('sasaran')->result_array();
        
        $this->db->where('id_tfi', $data_array['id_tfi']);
        $data_array['kegiatan'] = $this->db->get('kegiatan_tfi')->result_array();

            $data_array['action'] = 'simpan';
            $data_array['form'] = 'form_simpan';
            $data_array['curPage'] = '';
            $content = $this->load->view($this->controller."_view",$data_array,true);

            $data_array['tgl'] = flipdate($data_array['tgl']);
            // show_array($data_array);
            // exit();

        $this->set_subtitle("Edit Data TFI");
        $this->set_title("Edit Data TFI");
        $this->set_content($content);
        $this->cetak();
        

    }

    function get_data_bynip(){

        $post = $this->input->post();

        $this->db->where('nip', $post['nip']);
        $res = $this->db->get('pengguna')->row_array();
        
        // $data = $res;
        echo json_encode($res);

        // show_array($post);
        // exit();
        // return 0;

    }




	function simpan(){
		$post = $this->input->post();
        $userdata = $this->session->userdata('admin_login');

        $jumlah_baris_sasaran =  count($post['sasaran'])-1;
        $jumlah_baris_kegiatan = count($post['kegiatan_utama'])-1;

        for ($i=0; $i <= $jumlah_baris_sasaran; $i++) { 
            $sasaran[$i] = array('sasaran' => $post['sasaran'][$i],
                                'indikator' => $post['indikator'][$i],
                                'target' => $post['target'][$i] );
        }


         for ($i=0; $i <= $jumlah_baris_kegiatan; $i++) { 
            $kegiatan[$i] = array('kegiatan_utm' => $post['kegiatan_utama'][$i],
                                'anggaran' => $post['anggaran'][$i],
                                'sumber' => $post['sumber'][$i] );
        }

        // show_array($sasaran);
        // show_array($kegiatan);



        unset($post['sasaran']);
        unset($post['indikator']);
        unset($post['target']);
        unset($post['kegiatan_utama']);
        unset($post['anggaran']);
        unset($post['sumber']);
        unset($post['id']);



        // show_array($post);
        // exit();
    


        $this->load->library('form_validation');
        $this->form_validation->set_rules('nip_pihak_pertama','NIP Pihak Pertama','required');  
        $this->form_validation->set_rules('nip_pihak_kedua','NIP Pihak Kedua','required');     
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');


        
        
        // show_array($post);
        // exit();
	if($this->form_validation->run() == TRUE ) { 
        $post['tgl'] = flipdate($post['tgl']);
        $post['tgl_input'] = date('Y-m-d h:i:s');
        $post['user_input'] = $userdata['nama'];
        $res = $this->db->insert('tfi', $post); 
        $id_tfi = $this->db->insert_id();
        if($res){
            foreach ($sasaran as $key) {
                $key['id_tfi'] = $id_tfi;
                $res = $this->db->insert('sasaran', $key);

            }

            foreach ($kegiatan as $key) {
                $key['id_tfi'] = $id_tfi;
                $key['tahun'] = date('Y');
                $key['anggaran'] = bersih($key['anggaran']);
                $res = $this->db->insert('kegiatan_tfi', $key);

            }

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








}
?>