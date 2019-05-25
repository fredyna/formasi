<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasModel extends CI_Model {

	public function get(){
		$this->db->order_by('tahun_pengurus','desc');
		$sql = $this->db->get('kas')->result();
		return $sql;
	}

	public function getLast(){
		$this->db->order_by('created_at','desc');
		$sql = $this->db->get('kas')->row();
		return $sql;
	}

	public function getById($id){
		$this->db->where('id',$id);
		$sql = $this->db->get('kas')->row();
		return $sql;
	}

	public function getDataByTahun($tahun){
		$this->db->where('tahun_pengurus',$tahun);
		$sql = $this->db->get('kas')->row();
		return $sql;
	}

	public function getByTahun($tahun){
		$this->db->where('tahun_pengurus',$tahun);
		$sql = $this->db->count_all('kas');
		return $sql;
	}

	public function getKasPengurus($kas){
		if($kas!=null){
			$this->db->where('kas_pengurus.id_kas',$kas);
		}
		$this->db->select('kas_pengurus.*, kas.besar, kas.created_at, pengurus.nama');
		$this->db->from('kas_pengurus');
		$this->db->join('kas','kas.id=kas_pengurus.id_kas');
		$this->db->join('pengurus','pengurus.id=kas_pengurus.id_pengurus');
		$this->db->order_by('pengurus.nama','asc');
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function getKasPengurusById($id_kas,$id_pengurus){
		$this->db->select('kas_pengurus.*, kas.besar, kas.created_at, pengurus.nama');
		$this->db->from('kas_pengurus');
		$this->db->join('kas','kas.id=kas_pengurus.id_kas');
		$this->db->join('pengurus','pengurus.id=kas_pengurus.id_pengurus');
		$this->db->where('kas_pengurus.id_kas',$id_kas);
		$this->db->where('kas_pengurus.id_pengurus',$id_pengurus);
		$this->db->order_by('pengurus.nama','asc');
		$sql = $this->db->get()->row();
		return $sql;
	}

	public function create($data){
		$this->db->insert('kas',$data);
		$sql = $this->db->insert_id();
		return $sql;
	}

	public function createKasPengurus($data){
		$this->db->insert('kas_pengurus',$data);
		$sql = $this->db->affected_rows();
		return $sql;
	}

	public function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('kas',$data);
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	public function updateKasPengurus($id_kas,$id_pengurus,$data){
		$this->db->where('id_kas',$id_kas);
		$this->db->where('id_pengurus',$id_pengurus);
		$this->db->update('kas_pengurus',$data);
		$sql = $this->db->affected_rows();
		return $sql;
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('kas');
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	public function deleteKasPengurus($id){
		$this->db->where('id_kas',$id);
		$this->db->delete('kas_pengurus');
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	public function count($id_kas){
		$query = "SELECT COUNT(*) AS jumlah, SUM(bulan1+bulan2+bulan3+bulan4+bulan5+bulan6+bulan7+bulan8+bulan9+bulan10+bulan11+bulan12) AS total FROM kas_pengurus WHERE id_kas=$id_kas";
		$count = $this->db->query($query)->row();
		return $count;
	}

}

/* End of file KasModel.php */
/* Location: ./application/models/KasModel.php */