<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->in_group(2)){
			redirect('auth','refresh');
		}
		$this->load->model('acaraModel');
		$this->load->model('pesertaModel');
		$this->load->library('datatables');
	}

	public function index($acara=null)
	{
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'peserta/peserta';
		$data['title'] 	= 'Kelola Peserta | Formasi';
		$data['menu'] 	= 4;
		$data['acara']	= $this->acaraModel->getAll();
		$data['id_acara'] = $acara;
        if($acara != null){
            $data['peserta']         = $this->pesertaModel->get($acara);
        }
		$this->load->view('template/template',$data);
	}

	public function addData(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('nim', 'NIM', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('acara', 'Acara', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('prodi', 'Prodi', 'required');
			$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nim'	=> $this->input->post('nim'),
					'id_acara' => $this->input->post('acara'),
					'nama_peserta'  => ucwords(strtolower($this->input->post('nama'))),
					'prodi' => $this->input->post('prodi'),
					'kelas' => strtoupper($this->input->post('kelas')),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'no_hp'	=> $this->input->post('no_hp')
				);

				$sql = $this->pesertaModel->create($data);
				if($sql){
					$this->session->set_flashdata('info', 'Add Data Success!');
					redirect('peserta/addData','refresh');
				} else{
					$this->session->set_flashdata('info', 'Add Data Failed!');
					redirect('peserta/addData','refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'peserta/peserta_add';
		$data['title'] 	= 'Add Peserta | Formasi';
		$data['menu'] 	= 4;
		$data['acara']	= $this->acaraModel->get();
		$this->load->view('template/template',$data);
		
	}

	public function editData($id=null){
		if($id == null){
			$this->session->set_flashdata('info', 'Edit Data Failed!');
			redirect('peserta','refresh');
		}

		if($this->input->post('submit') == true){
			$this->form_validation->set_rules('nim', 'NIM', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('acara', 'Acara', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('prodi', 'Prodi', 'required');
			$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nim'	=> $this->input->post('nim'),
					'id_acara' => $this->input->post('acara'),
					'nama_peserta'  => ucwords(strtolower($this->input->post('nama'))),
					'prodi' => $this->input->post('prodi'),
					'kelas' => strtoupper($this->input->post('kelas')),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'no_hp'	=> $this->input->post('no_hp')
				);

				$sql = $this->pesertaModel->update($id,$data);
				if($sql){
					$this->session->set_flashdata('info', 'Update Data Success!');
					redirect('peserta/editData/'.$id,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Update Data Failed!');
					redirect('peserta/addData/'.$id,'refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'peserta/peserta_edit';
		$data['title'] 	= 'Edit Peserta | Formasi';
		$data['menu'] 	= 4;
		$data['peserta'] = $this->pesertaModel->getById($id);
		$data['acara']	= $this->acaraModel->get();
		$this->load->view('template/template',$data);
	}

	public function deleteData($id=null, $acara=null){
		if($id==null || $acara==null){
			$this->session->set_flashdata('info', 'Delete Data Failed!');
			redirect('peserta','refresh');
		}

		$sql = $this->pesertaModel->delete($id);
		if($sql){
			$this->session->set_flashdata('info', 'Delete Data Success!');
			redirect('peserta/index/'.$acara,'refresh');
			
		} else{
			$this->session->set_flashdata('info', 'Delete Data Failed!');
			redirect('peserta/index/'.$acara,'refresh');
		}
	}

	public function printData($acara=null){
		$data['peserta'] = $this->pesertaModel->get($acara);
		$data['acara']	  = $this->acaraModel->getById($acara);
		$this->load->view('peserta/print',$data);
	}

}

/* End of file Peserta.php */
/* Location: ./application/controllers/Peserta.php */