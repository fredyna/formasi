<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('acaraModel');
	}

	public function index()
	{
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'acara/acara';
		$data['title'] 	= 'Kelola Acara | Formasi';
		$data['menu'] 	= 3;
		$data['acara']	= $this->acaraModel->get();
		$this->load->view('template/template',$data);
	}

	public function addData(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('nama', 'Nama Acara', 'trim|required');
			$this->form_validation->set_rules('date', 'Date', 'required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nama_acara' => ucwords(strtolower($this->input->post('nama'))),
					'kategori'	 => $this->input->post('kategori'),
					'tanggal'	 => date('Y-m-d',strtotime($this->input->post('date')))
				);

				$sql = $this->acaraModel->create($data);
				if($sql){
					$this->session->set_flashdata('info', 'Add Data Success!');
					redirect('acara/addData','refresh');
				} else{
					$this->session->set_flashdata('info', 'Add Data Failed!');
					redirect('acara/addData','refresh');
				}
			} 
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'acara/acara_add';
		$data['title'] 	= 'Add Acara | Formasi';
		$data['menu'] 	= 3;
		$data['acara']	= $this->acaraModel->get();
		$this->load->view('template/template',$data);
	}

	public function editData($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Edit Data Failed!');
			redirect('acara','refresh');
		}

		if($this->input->post('submit') == true){
			$this->form_validation->set_rules('nama', 'Nama Acara', 'trim|required');
			$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
			$this->form_validation->set_rules('date', 'Date', 'required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nama_acara' 	=> ucwords(strtolower($this->input->post('nama'))),
					'kategori'		=> $this->input->post('kategori'),
					'tanggal'	 	=> date('Y-m-d',strtotime($this->input->post('date')))
				);

				$sql = $this->acaraModel->update($id,$data);
				if($sql){
					$this->session->set_flashdata('info', 'Update Data Success!');
					redirect('acara/editData/'.$id,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Update Data Failed!');
					redirect('acara/editData/'.$id,'refresh');
				}
			} 
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'acara/acara_edit';
		$data['title'] 	= 'Add Acara | Formasi';
		$data['menu'] 	= 3;
		$data['acara']	= $this->acaraModel->getById($id);
		$this->load->view('template/template',$data);
	}

	public function deleteData($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Delete Data Failed!');
			redirect('acara','refresh');
		}

		$sql = $this->acaraModel->delete($id);
		if($sql){
			$this->session->set_flashdata('info', 'Delete Data Success!');
			redirect('acara','refresh');
		} else{
			$this->session->set_flashdata('info', 'Delete Data Failed!');
			redirect('acara','refresh');
		}
	}

	public function changeStatus(){
		$id = $this->input->post('id');
		if($id==null){
			header('Content-Type: application/json');
			echo 0;
		} else{
			$acara = $this->acaraModel->getById($id);
			if($acara->status==0){
				$data = array(
					'status' => 1
				);
				$sql = $this->acaraModel->update($id, $data);
				if($sql){
					header('Content-Type: application/json');
					echo 1;
				} else{
					header('Content-Type: application/json');
					echo 2;
				}
			} else{
				$data = array(
					'status' => 0
				);
				$sql = $this->acaraModel->update($id, $data);
				if($sql){
					header('Content-Type: application/json');
					echo 2;
				} else{
					header('Content-Type: application/json');
					echo 1;
				}
			}
		}
	}

	public function changeStatusForm(){
		$id = $this->input->post('id');
		if($id==null){
			header('Content-Type: application/json');
			echo 0;
		} else{
			$form = $this->acaraModel->getFormById($id);
			header('Content-Type: application/json');
			if($form->status==0){
				$data = array(
					'status' => 1
				);
				$sql = $this->acaraModel->updateForm($id, $data);
				if($sql){
					header('Content-Type: application/json');
					echo 1;
				} else{
					header('Content-Type: application/json');
					echo 21;
				}
			} else{
				$data = array(
					'status' => 0
				);
				$sql = $this->acaraModel->updateForm($id, $data);
				if($sql){
					header('Content-Type: application/json');
					echo 2;
				} else{
					header('Content-Type: application/json');
					echo 1;
				}
			}
			
		}
	}

}

/* End of file Acara.php */
/* Location: ./application/controllers/Acara.php */