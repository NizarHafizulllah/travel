<?php 


class admin extends admin_controller {
	
	var $controller;
	public function admin(){
		parent::__construct();
		$this->controller = get_class($this);
	}
	
		function index(){
		



		$data_array=array();

		$userdata = $this->session->userdata('admin_login');

		


		

		$data_array['curPage'] = 'beranda';


		$content = $this->load->view("admin/admin_view",$data_array,true);

		$this->set_subtitle("Beranda");
		$this->set_title("Beranda");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


}
?>