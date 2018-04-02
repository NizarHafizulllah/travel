<?php 


class ad_program extends admin_controller {
	
	var $controller;
	public function ad_program(){
		parent::__construct();
		$this->controller = get_class($this);
		$this->load->model($this->controller.'_model','dm');
        $this->load->model("coremodel","cm");
	}


    
	
		function index(){
		



		$data_array=array();

		$userdata = $this->session->userdata('admin_login');


		$data_array['curPage'] = 'program';


		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Program");
		$this->set_title("Program");
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
        
  
        $nama = $_REQUEST['columns'][1]['search']['value'];



      //  order[0][column]
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
				"nama" => $nama,
				
				 
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
                              </ul>
                            </div>";

        
        
        	 
        	$arr_data[] = array(
        		$row['id'],
        		$row['nama'],
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


	function simpan(){
		$post = $this->input->post();
    


        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Program','required');     
        // $this->form_validation->set_rules('pelaksana_nip','NIP','required');         
         
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        
        $this->form_validation->set_error_delimiters('', '<br>');


        
        
        // show_array($post);
        // exit();
	if($this->form_validation->run() == TRUE ) { 

        $post['tahun'] = date('Y');
        $res = $this->db->insert('m_program', $post); 
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
        $data_array['curPage'] = 'program';

        $data_array['action'] = 'simpan';
        $data_array['form'] = 'form_simpan';

        // show_array($data_array);
        // exit();

        $content = $this->load->view($this->controller."_form_view",$data_array,true);

        $this->set_subtitle("Tambah Program");
        $this->set_title("Tambah Program");
        $this->set_content($content);
        $this->cetak();
}




    function editdata(){
         $get = $this->input->get(); 
         $id = $get['id'];

         

         $this->db->where('id',$id);
         $program = $this->db->get('m_program');
         $data = $program->row_array();

        $data['action'] = 'update';
        $data['form'] = 'form_update';
        $data['curPage'] = 'program';
         // show_array($data); exit;
         
        

               $content = $this->load->view($this->controller."_form_view",$data,true);

         // $content = $this->load->view($this->controller."_form_view",$data,true);

        $this->set_subtitle("Edit Program");
        $this->set_title("Edit Program");
        $this->set_content($content);
        $this->cetak();

    }



      function hapusdata(){
        $get = $this->input->post();
        $id = $get['id'];

        $data = array('id' => $id, );

        $res = $this->db->delete('m_program', $data);
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