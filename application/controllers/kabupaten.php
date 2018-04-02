<?php 


class kabupaten extends adminkab_controller {
	
	var $controller;
	public function kabupaten(){
		parent::__construct();
		$this->controller = get_class($this);
	}
	
		function index(){
		



		$data_array=array();

		$data_array['curPage'] = '';

		$content = $this->load->view("adminkab/index_view",$data_array,true);

		$this->set_subtitle("DASHBOARD");
		$this->set_title("DASHBOARD");
		$this->set_content($content);
		$this->cetak();


				
			
		
	}


}
?>