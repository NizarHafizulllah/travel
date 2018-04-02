<?php 
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("tanggal");
		$this->load->helper("url");
		$this->load->helper("kirimemail");
		//$this->load->helper("serviceurl");
		
	}
	
	function index(){
		$this->load->view("login_view");
	}
	
	
	function logout_admin(){
		$this->session->unset_userdata("admin_login",true);
		redirect("login");
	}

	function logout_verifikatur(){
		$this->session->unset_userdata("app_login",true);
		redirect("login");
	}

	function logout_operator(){
		$this->session->unset_userdata("op_login",true);
		redirect("login");
	}

	function logout_adminkab(){
		$this->session->unset_userdata("adminkab_login",true);
		redirect("login");
	}

	function logout_super_admin(){
		$this->session->unset_userdata("sa_login",true);
		redirect("login");
	}
	
	


	function ceklogin(){

		 $data = $this->input->post();
		 $username = $data['username'];
		 $password = $data['mask'];




		

		 
		 $this->db->where("username",$username);
		 $this->db->where("password",$password);

		 $res = $this->db->get('pengguna');
		 // echo $this->db->last_query(); exit;





		 if($res->num_rows()==0) {
		 	$ret = array("error"=>true, 'message' => "Kata Sandi Atau Password Salah");

		 }else{
		 	$member = $res->row();
		 	$jj = array (
					'login' => true,
					'id_user' => $member->id,
					'username' => $member->username,
					'nama' => $member->nama,
					'level' => $member->level,
					'foto' => $member->foto,
					'nip' => $member->jabatan,
					);



				if ($jj['level']==1) {
					$this->session->set_userdata('admin_login', $jj);
					$datalogin = $this->session->userdata("admin_login");

					$ret = array("error"=>false, 
								"level"=>$jj['level'], 
								"message" => 'Login Berhasil',
							 	"link" => site_url('admin'));
						
				}else if ($jj['level']==2){
					$this->session->set_userdata('kabid', $jj);
					$datalogin = $this->session->userdata('kabid');
					

				}else if ($jj['level']==3) {
					$this->session->set_userdata('sa_login', $jj);
					$datalogin = $this->session->userdata('sa_login');

				}

		 		

		 		

		 	


		 }
		 


		 echo json_encode($ret);
 
		 
		 
	}
	
		function cekEmail(){
		$email = $this->input->post('email');
		$valid = true;
		$query = $this->db->where('email', $email);
		$jumlah = $this->db->get("members")->num_rows();	
		if($jumlah > 0) {
			$valid = false;
		}
		
		echo json_encode(array('valid' => $valid));
	
	}

	
	


}

?>