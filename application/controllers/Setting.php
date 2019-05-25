<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'setting';
		$data['title'] 	= 'Setting | Formasi';
		if($data['group'] == 1){
			$data['menu'] 	= 4;
		} else if($data['group'] == 2){
			$data['menu'] 	= 5;
		} else{
			$data['menu'] 	= 4;
		}
		$this->load->view('template/template',$data);
	}

	public function changePassword(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$id 			= $data['user']->id;
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('r_password', 'Password', 'required|matches[password]');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'password' => $this->input->post('password')
			);
			$sql = $this->ion_auth->update($id,$data);
			if($sql){
				$this->session->set_flashdata('info-password', 'Change Password Success!');
				redirect('setting','refresh');
			} else{
				$this->session->set_flashdata('info-password', 'Change Password Failed!');
				redirect('setting','refresh');
			}
		} else {
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'setting';
			$data['title'] 	= 'Setting | Formasi';
			if($data['group'] == 1){
				$data['menu'] 	= 4;
			} else if($data['group'] == 2){
				$data['menu'] 	= 5;
			} else{
				$data['menu'] 	= 4;
			}
			$this->load->view('template/template',$data);
		}
	}

	public function updateData(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$id 			= $data['user']->id;
		$this->form_validation->set_rules('username', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'username' => $this->input->post('username'),
				'first_name' => $this->input->post('nama')
			);
			$sql = $this->ion_auth->update($id,$data);
			if($sql){
				$this->session->set_flashdata('info-data', 'Change Data Success!');
				redirect('setting','refresh');
			} else{
				$this->session->set_flashdata('info-data', 'Change Data Failed!');
				redirect('setting','refresh');
			}
		} else {
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'setting';
			$data['title'] 	= 'Setting | Formasi';
			if($data['group'] == 1){
				$data['menu'] 	= 4;
			} else if($data['group'] == 2){
				$data['menu'] 	= 5;
			} else{
				$data['menu'] 	= 4;
			}
			$this->load->view('template/template',$data);
		}
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */