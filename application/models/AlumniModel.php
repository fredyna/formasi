<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlumniModel extends CI_Model {

	public function get($tahun){
		if($tahun!=null){
			$this->db->where('tahun',$tahun);
		}
		$this->db->where('status', 1);
		$data = $this->db->get('alumni')->result();
		return $data;
	}

	public function getDataBaru(){
		$this->db->where('status', 0);
		$this->db->order_by('date', 'desc');
		$data = $this->db->get('alumni')->result();
		return $data;
	}

	public function getAllTahun(){
		$this->db->select('tahun');
		$this->db->where('status', 1);
		$this->db->group_by('tahun');
		$this->db->order_by('tahun', 'desc');
		$tahun = $this->db->get('alumni')->result();
		return $tahun;
	}

	public function getById($id){
		$this->db->where('id',$id);
		$sql = $this->db->get('alumni')->row();
		return $sql;
	}

	public function create($data){
		$this->db->insert('alumni',$data);
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true:false;
	}

	public function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('alumni',$data);
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('alumni');
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

}

/* End of file Pengurus.php */
/* Location: ./application/models/Pengurus.php */