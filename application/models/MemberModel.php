<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends CI_Model {

	public function getMember(){
		$sql = $this->db->get('siswa');
		return $sql->result();
	}

	public function getMemberById($id){
		$this->db->where('nis',$id);
		$sql = $this->db->get('siswa');
		return $sql->row();
	}

	public function addData($data){
		$sql = $this->db->insert('siswa',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function updateData($id,$data){
		$this->db->where('nis',$id);
		$sql = $this->db->update('siswa',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	public function deleteData($id){
		$this->db->where('nis',$id);
		$sql = $this->db->delete('siswa');
		if($sql){
			return true;
		} else{
			return false;
		}
	}
}

/* End of file MemberModel.php */
/* Location: ./application/models/MemberModel.php */