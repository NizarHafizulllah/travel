<?php 

class sop_model extends CI_Model {


	function sop_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
							"judul",
							"tahun"							 
		 	);


		// $level = array('1','4');		

		$this->db->select('d.*, k.kegiatan_utm as kegiatan');
		$this->db->from("sop d");
		$this->db->join('kegiatan_tfi k','d.id_kegiatan=k.id');

		$this->db->where('d.tahun', date('Y'));



		 

		 if(!empty($judul)) {
		 	$this->db->like("d.judul",$judul);
		 }

		 if($kegiatan!=='null') {
		 	$this->db->like("k.id",$kegiatan);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}

	function arr_dropdown($vTable, $vINDEX, $vVALUE, $vORDERBY, $vCONDITION, $vWHERE){
                $this->db->where($vCONDITION, $vWHERE);
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
        //echo $this->db->last_query(); exit;

                $ret = array();
                $ret = array('' => '- Pilih '.$vVALUE.' -', );
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }

	


}

?>