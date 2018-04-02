<?php 


class sop extends admin_controller {
	
	var $controller;
	public function sop(){
		parent::__construct();
		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
        $this->load->model("coremodel","cm");
	}


    
	
		function index(){
		



		$data_array=array();

		$userdata = $this->session->userdata('admin_login');
        $tahun = date('Y');
        $data_array['arr_kegiatan'] = $this->cm->arr_dropdown3("kegiatan_tfi", "id", "kegiatan_utm", "kegiatan_utm", "tahun", $tahun);
        


		$data_array['curPage'] = '';


		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("SOP");
		$this->set_title("SOP");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


	function get_data() {

    	
    	// show_array($userdata);

    	$draw = $_REQUEST['draw']; // get the requested page 
    	$start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $judul = $_REQUEST['columns'][1]['search']['value'];
        $program = $_REQUEST['columns'][2]['search']['value'];
        $kegiatan = $_REQUEST['columns'][3]['search']['value'];



      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
                "kegiatan" => $kegiatan,
				
				 
		);     

        // show_array($req_param);
           
        $row = $this->dm->data($req_param)->result_array();
		
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        

       // show_array($result);
        $arr_data = array();
        foreach($result as $row) : 
		// $daft_id = $row['daft_id'];
        $id = $row['id'];

        $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-primary'>Action</button>
                              <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href ='#' onclick=\"hapus('$id')\"><i class='fa fa-trash'></i> Hapus</a></li>
                                <li><a href ='$this->controller/editdata?id=$id'><i class='fa fa-edit'></i> Edit</a></li>
                                <li><a href ='$this->controller/lihatdata?id=$id'><i class='fa fa-eye'></i> Lihat</a></li>
                              </ul>
                            </div>";

        
        
        	 
        	$arr_data[] = array(
        		$row['id'],
        		$row['kegiatan'],
                $row['tahun'], 
        		$action
        		
         			 
        		  				);
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
        				  'recordsTotal' => $count, 
        				  'recordsFiltered' => $count,
        				  'data'=>$arr_data
        	);
         
        echo json_encode($responce); 
    }



    function get_kegiatan(){
        $data = $this->input->post();
        

        $program = $data['program'];

        $this->db->where("id_program",$program);
        $this->db->order_by("id");
        $rs = $this->db->get("m_kegiatan");
            echo "<option value=''>- Pilih Satu - </option>";
        foreach($rs->result() as $row ) :
            echo "<option value=$row->id>$row->kegiatan </option>";
        endforeach;
    }



	function simpan(){
		$post = $this->input->post();
    


        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_kegiatan','Kegiatan','required');     
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');


        
        
        // show_array($post);
        // exit();
	if($this->form_validation->run() == TRUE ) { 



       
    $config['upload_path'] = './assets/file_upload/sop';
                $path = $config['upload_path'];
                $config['allowed_types'] = 'pdf';
                $config['encrypt_name'] = 'TRUE';


             $this->load->library('upload', $config);

        $filename_arr = array();
        foreach ($_FILES as $key => $value) {
            if (!empty($value['tmp_name']) && $value['size'] > 0) {
            if (!$this->upload->do_upload($key)) {
               // some errors
            } else {
                // Code After Files Upload Success GOES HERE
                $data_name = $this->upload->data();
                $filename_arr[] = $data_name['file_name'];
            }
        }
    }
     $post['dir'] = $filename_arr[0];


        $post['tahun'] = date('Y');
        $res = $this->db->insert('sop', $post); 
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


    function baru(){
        $data_array=array();
        $data_array['curPage'] = '';

        $data_array['action'] = 'simpan';
        $data_array['form'] = 'form_simpan';
        $tahun = date('Y');
        $data_array['arr_kegiatan'] = $this->cm->arr_dropdown3("kegiatan_tfi", "id", "kegiatan_utm", "kegiatan_utm", "tahun", $tahun);

        // show_array($data_array);
        // exit();

        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah SOP");
        $this->set_title("Tambah SOP");
        $this->set_content($content);
        $this->cetak();
}




    function lihatdata(){
         $get = $this->input->get(); 
         $id = $get['id'];

         
         $this->db->select('d.*, k.kegiatan_utm as kegiatan');
        $this->db->from("sop d");
        $this->db->join('kegiatan_tfi k','d.id_kegiatan=k.id');
         $this->db->where('d.id',$id);
         $sop = $this->db->get();
         $data = $sop->row_array();

        $data['curPage'] = '';
         
        

        $content = $this->load->view($this->controller."_detail_view",$data,true);


        $this->set_subtitle("Lihat Data SOP");
        $this->set_title("Lihat Data SOP");
        $this->set_content($content);
        $this->cetak();

    }



      function hapusdata(){
        $get = $this->input->post();
        $id = $get['id'];

        $data = array('id' => $id, );

        $this->db->where('id', $id);
        $sop = $this->db->get('sop')->row_array();
        $path = 'assets/file_upload/sop/'.$sop['dir'];
        
        // echo $path;
        // if (unlink($path)) {
        //     echo 'berhasil dihapus';
        // }else{
        //     echo 'fuck ';
        // }
        // exit();
        $res = $this->db->delete('sop', $data);
        if($res){
            $arr = array("error"=>false,"message"=>"DATA BERHASIL DIHAPUS");
        }
        else {
            $arr = array("error"=>true,"message"=>"DATA GAGAL DIHAPUS ".mysql_error());
        }
        //redirect('sa_birojasa_user');
        echo json_encode($arr);
    }


    function update(){

        $post = $this->input->post();
   
       // show_array($post);
       // exit();


        $this->load->library('form_validation');  
        $this->form_validation->set_rules('nama','Program','required');   
       
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');

     

        //show_array($data);

if($this->form_validation->run() == TRUE ) { 








        $this->db->where("id",$post['id']);
        $res = $this->db->update('m_program', $post); 
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


}
?>