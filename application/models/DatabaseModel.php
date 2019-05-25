<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DatabaseModel extends CI_Model {

	public function sqlProses($sql){
		$output = $this->db->query($sql);
		if($output){
			return 1;
		} else{
			$error = $this->db->error();
			return $error;
		}
	}

}

/* End of file DatabaseModel.php */
/* Location: ./application/models/DatabaseModel.php */