<?php 

class ad_kegiatan_model extends CI_Model {


	function ad_kegiatan_model(){
		parent::__construct();
	}




 function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"id",
							"kegiatan",
							"program"							 
		 	);


				

		$this->db->select('a.*, pg.nama as program')->from("m_kegiatan a");
		 $this->db->join('m_program pg','a.id_program=pg.id', 'left');
		



		 

		 if(!empty($kegiatan)) {
		 	$this->db->like("a.kegiatan",$kegiatan);
		 }

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}

	function arr_dropdown($vTable, $vINDEX, $vVALUE, $vORDERBY){
                
                $this->db->order_by($vORDERBY);
                $res  = $this->db->get($vTable);
        //echo $this->db->last_query(); exit;

                $ret = array();
                $ret = array('' => '- Pilih Satu -', );
                foreach($res->result_array() as $row) : 
                        $ret[$row[$vINDEX]] = $row[$vVALUE];
                endforeach;
                return $ret;

        }

	


}

?>