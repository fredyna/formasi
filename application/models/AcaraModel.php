<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AcaraModel extends CI_Model {

	public function get(){
		$this->db->order_by('tanggal','desc');
		$sql = $this->db->get('acara')->result();
		return $sql;
	}

	public function getAll(){
		$this->db->order_by('tanggal','desc');
		$sql = $this->db->get('acara')->result();
		return $sql;
	}

	public function getById($id){
		$this->db->where('id',$id);
		$sql = $this->db->get('acara')->row();
		return $sql;
	}

	public function create($data){
		$this->db->insert('acara',$data);
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	public function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('acara',$data);
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('acara');
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	/* form */

	public function getForm(){
		$data = $this->db->get('form')->result();
		return $data;
	}

	public function getFormById($id){
		$this->db->where('id',$id);
		$data = $this->db->get('form')->row();
		return $data;
	}

	public function updateForm($id,$data){
		$this->db->where('id',$id);
		$this->db->update('form',$data);
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	public function getCp(){
		$data = $this->db->get('cp')->result();
		return $data;
	}

	/* end form */

}

/* End of file AcaraModel.php */
/* Location: ./application/models/AcaraModel.php */