<?php 


class index_admin extends admin_controller {
	
	var $controller;
	public function index_admin(){
		parent::__construct();
		$this->controller = get_class($this);
	}
	
		function index(){
		



		$data_array=array();

	 	$data_array['curPage'] = '';

		$content = $this->load->view("admin/index_view",$data_array,true);

		$this->set_subtitle("SIMPATEN ");
		$this->set_title("DASHBOARD");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


}
?>