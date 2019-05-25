<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesertaModel extends CI_Model {

	public function get($acara){
		if($acara!=null){
			$this->db->where('id_acara',$acara);
		}
		$this->db->select('peserta.*, acara.nama_acara');
		$this->db->from('peserta');
		$this->db->join('acara','acara.id=peserta.id_acara');
		$this->db->order_by('nama_peserta','asc');
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function getById($nim){
		$this->db->where('nim',$nim);
		$sql = $this->db->get('peserta')->row();
		return $sql;
	}

	public function create($data){
		$this->db->insert('peserta',$data);
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true:false;
	}

	public function update($nim,$data){
		$this->db->where('nim',$nim);
		$this->db->update('peserta',$data);
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	public function delete($nim){
		$this->db->where('nim',$nim);
		$this->db->delete('peserta');
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	public function count($id_acara){
		$this->db->where('id_acara', $id_acara);
		$count = $this->db->count_all_results('peserta');
		return $count;
	}

}

/* End of file PesertaModel.php */
/* Location: ./application/models/PesertaModel.php */