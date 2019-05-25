<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengurusModel extends CI_Model {

	public function get($tahun){
		if($tahun!=null){
			$this->db->where('tahun',$tahun);
		}
		$sql = $this->db->get('pengurus')->result();
		return $sql;
	}

	public function getAllTahun(){
		$this->db->select('tahun');
		$this->db->group_by('tahun');
		$this->db->order_by('tahun', 'desc');
		$tahun = $this->db->get('pengurus')->result();
		return $tahun;
	}

	public function getJson($tahun){
		$base = base_url();
        $this->datatables->select('id, nim, nama, prodi, kelas, jenis_kelamin, no_hp, jabatan, concat(concat(tempat_lahir, ", "), date_format(tanggal_lahir, "%d %b %Y")) as ttl, alamat, tahun');
        $this->datatables->from('pengurus');
        if($tahun!=null){
        	$this->datatables->where('tahun',$tahun);
        }
        $this->datatables->add_column('action', 
        	'<a href="'.$base.'pengurus/editData/$1" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a> <a href="#" onclick="functionDelete(\''.$base.'pengurus/deleteData/$1\')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>', 'id');
        return $this->datatables->generate();
	}

	public function getById($id){
		$this->db->where('id',$id);
		$sql = $this->db->get('pengurus')->row();
		return $sql;
	}

	public function create($data){
		$this->db->insert('pengurus',$data);
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true:false;
	}

	public function update($id,$data){
		$this->db->where('id',$id);
		$this->db->update('pengurus',$data);
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('pengurus');
		$sql = $this->db->affected_rows();
		return $sql > 0 ? true : false;
	}

}

/* End of file Pengurus.php */
/* Location: ./application/models/Pengurus.php */