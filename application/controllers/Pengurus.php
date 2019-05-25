<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->in_group(2)){
			redirect('auth','refresh');
		}
		$this->load->model('pengurusModel');
		$this->load->library('datatables');
	}

	public function index()
	{
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'pengurus/pengurus';
		$data['title'] 	= 'Kelola Pengurus | Formasi';
		$data['menu'] 	= 2;
		$this->load->view('template/template',$data);
	}

	public function pengurusJson($tahun=null){
		header('Content-Type: application/json');
		echo $this->pengurusModel->getJson($tahun);
	}

	public function addData(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('nim', 'NIM', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('prodi', 'Prodi', 'required');
			$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nim'	=> $this->input->post('nim'),
					'nama'  => ucwords(strtolower($this->input->post('nama'))),
					'prodi' => $this->input->post('prodi'),
					'kelas' => strtoupper($this->input->post('kelas')),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'no_hp'	=> $this->input->post('no_hp'),
					'tahun'	=> $this->input->post('tahun'),
					'jabatan' => ucwords(strtolower($this->input->post('jabatan'))),
					'tempat_lahir' => ucwords(strtolower($this->input->post('tempat_lahir'))),
					'tanggal_lahir' => date('Y-m-d',strtotime($this->input->post('tanggal_lahir'))),
					'alamat' => ucwords(strtolower($this->input->post('alamat')))

				);

				$sql = $this->pengurusModel->create($data);
				if($sql){
					$this->session->set_flashdata('info', 'Add Data Success!');
					redirect('pengurus/addData','refresh');
				} else{
					$this->session->set_flashdata('info', 'Add Data Failed!');
					redirect('pengurus/addData','refresh');
				}
			} 
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'pengurus/pengurus_add';
		$data['title'] 	= 'Add Pengurus | Formasi';
		$data['menu'] 	= 2;
		$this->load->view('template/template',$data);
		
	}

	public function editData($id=null){
		if($id == null){
			$this->session->set_flashdata('info', 'Edit Data Failed!');
			redirect('pengurus','refresh');
		}

		if($this->input->post('submit') == true){
			$this->form_validation->set_rules('nim', 'NIM', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('prodi', 'Prodi', 'required');
			$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nim'	=> $this->input->post('nim'),
					'nama'  => ucwords(strtolower($this->input->post('nama'))),
					'prodi' => $this->input->post('prodi'),
					'kelas' => strtoupper($this->input->post('kelas')),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'no_hp'	=> $this->input->post('no_hp'),
					'tahun'	=> $this->input->post('tahun'),
					'jabatan' => ucwords(strtolower($this->input->post('jabatan'))),
					'tempat_lahir' => ucwords(strtolower($this->input->post('tempat_lahir'))),
					'tanggal_lahir' => date('Y-m-d',strtotime($this->input->post('tanggal_lahir'))),
					'alamat' => ucwords(strtolower($this->input->post('alamat')))
				);

				$sql = $this->pengurusModel->update($id,$data);
				if($sql){
					$this->session->set_flashdata('info', 'Update Data Success!');
					redirect('pengurus/editData/'.$id,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Update Data Failed!');
					redirect('pengurus/editData/'.$id,'refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'pengurus/pengurus_edit';
		$data['title'] 	= 'Edit Pengurus | Formasi';
		$data['menu'] 	= 2;
		$data['pengurus'] = $this->pengurusModel->getById($id);
		$this->load->view('template/template',$data);
	}

	public function deleteData($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Delete Data Failed!');
			redirect('pengurus','refresh');
		}

		$sql = $this->pengurusModel->delete($id);
		if($sql){
			$this->session->set_flashdata('info', 'Delete Data Success!');
			redirect('pengurus','refresh');
		} else{
			$this->session->set_flashdata('info', 'Delete Data Failed!');
			redirect('pengurus','refresh');
		}
	}

	public function printData($tahun=null){
		$data['pengurus'] = $this->pengurusModel->get($tahun);
		$data['tahun']	  = $tahun;
		$this->load->view('pengurus/print',$data);
	}

}

/* End of file Pengurus.php */
/* Location: ./application/controllers/Pengurus.php */