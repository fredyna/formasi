<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->is_admin()){
			redirect('auth','refresh');
		}
	}

	public function index(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'member/member';
		$data['title'] 	= 'Kelola Member | Formasi';
		$data['menu'] 	= 2;
		$data['member'] = $this->ion_auth->users()->result();
		$this->load->view('template/template',$data);
	}

	public function addMember(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('role', 'Role', 'required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('r_password', 'Repeat Password', 'required|matches[password]');
			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$additional_data = array(
					'first_name' => $this->input->post('nama')
				);
				$group = array($this->input->post('role'));
				$sql = $this->ion_auth->register($username, $password, null, $additional_data, $group);
				if($sql){
					$this->session->set_flashdata('info', 'Add Data Success!');
					redirect('member/addMember','refresh');
				} else{
					$this->session->set_flashdata('info', 'Add Data Failed!');
					redirect('member/addMember','refresh');
				}
			} 
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'member/member_add';
		$data['title'] 	= 'Add Member | Formasi';
		$data['menu'] 	= 2;
		$data['groups']	= $this->ion_auth->groups()->result();
		$this->load->view('template/template',$data);
	}

	public function editMember($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Edit Data Failed!');
			redirect('member','refresh');
		} else{
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'member/member_edit';
			$data['title'] 	= 'Edit Member | Formasi';
			$data['menu'] 	= 2;
			$data['groups']	= $this->ion_auth->groups()->result();
			$data['member'] = $this->ion_auth->user($id)->row();
			$data['member_group'] = $this->ion_auth->get_users_groups($id)->row()->id;
			$this->load->view('template/template',$data);
		}
	}

	public function updateMember($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Edit Data Failed!');
			redirect('member','refresh');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'username' 	=> $this->input->post('username'),
				'first_name'=> ucwords(strtolower($this->input->post('nama')))
			);

			$sql = $this->ion_auth->update($id,$data);
			if($sql){
				$this->session->set_flashdata('info', 'Edit Data Success!');
				redirect('member/editMember/'.$id,'refresh');
			} else{
				$this->session->set_flashdata('info', 'Edit Data Failed!');
				redirect('member/editMember/'.$id,'refresh');
			}
		} else {
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'member/member_edit';
			$data['title'] 	= 'Edit Member | Formasi';
			$data['menu'] 	= 2;
			$data['groups']	= $this->ion_auth->groups()->result();
			$data['member'] = $this->ion_auth->users($id)->row();
			$data['member_group'] = $this->ion_auth->get_users_groups($id)->row()->id;
			$this->load->view('template/template',$data);
		}
	}

	public function updateRole($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Update Role Failed!');
			redirect('member','refresh');
		}

		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == TRUE) {
			$id_group_lama = $this->ion_auth->get_users_groups($id)->row()->id;
			$id_group_baru = $this->input->post('role');

			$sql = $this->ion_auth->add_to_group($id_group_baru,$id);
			if($sql){
				$sql2 = $this->ion_auth->remove_from_group($id_group_lama,$id);
				if($sql2){
					$this->session->set_flashdata('info-role', 'Update Role Success!');
					redirect('member/editMember/'.$id,'refresh');
				} else{
					$this->session->set_flashdata('info-role', 'Remove From Last Group Failed!');
					redirect('member/editMember/'.$id,'refresh');
				}
				
			} else{
				$this->session->set_flashdata('info-role', 'Update Role Failed!');
				redirect('member/editMember/'.$id,'refresh');
			}
		} else {
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'member/member_edit';
			$data['title'] 	= 'Edit Member | Formasi';
			$data['menu'] 	= 2;
			$data['groups']	= $this->ion_auth->groups()->result();
			$data['member'] = $this->ion_auth->users($id)->row();
			$data['member_group'] = $this->ion_auth->get_users_groups($id)->row()->id;
			$this->load->view('template/template',$data);
		}
	}

	public function updatePassword($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Update Password Failed!');
			redirect('member','refresh');
		}

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('r_password', 'Repeat Password', 'required|matches[password]');

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'password' 	=> $this->input->post('password')
			);

			$sql = $this->ion_auth->update($id,$data);
			if($sql){
				$this->session->set_flashdata('info-password', 'Update Password Success!');
				redirect('member/editMember/'.$id,'refresh');
			} else{
				$this->session->set_flashdata('info-password', 'Update Password Failed!');
				redirect('member/editMember/'.$id,'refresh');
			}
		} else {
			$data['user'] 	= $this->ion_auth->user()->row();
			$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
			$data['main'] 	= 'member/member_edit';
			$data['title'] 	= 'Edit Member | Formasi';
			$data['menu'] 	= 2;
			$data['groups']	= $this->ion_auth->groups()->result();
			$data['member'] = $this->ion_auth->users($id)->row();
			$data['member_group'] = $this->ion_auth->get_users_groups($id)->row()->id;
			$this->load->view('template/template',$data);
		}
	}

	public function deleteMember($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Delete Member Failed!');
			redirect('member','refresh');
		}

		$sql = $this->ion_auth->delete_user($id);
		if($sql){
			$this->session->set_flashdata('info', 'Delete Member Success!');
			redirect('member','refresh');
		} else{
			$this->session->set_flashdata('info', 'Delete Member Failed!');
			redirect('member','refresh');
		}
	}

	public function activate(){
		$this->form_validation->set_rules('id', 'ID', 'required');
		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id');
			$aktif = $this->ion_auth->user($id)->row()->active;
			if($aktif == 0){
				$data = array(
					'active' => 1
				);

				$sql = $this->ion_auth->update($id,$data);
				if($sql){
					header('Content-Type: application/json');
					echo 1;
					return;
				}

				
			} else{
				$data = array(
					'active' => 0
				);

				$sql = $this->ion_auth->update($id,$data);
				if(!$sql){
					header('Content-Type: application/json');
					echo 1;
					return;
				}

			}

			header('Content-Type: application/json');
			echo 0;
		} else {
			header('Content-Type: application/json');
			echo 2;
		}
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */