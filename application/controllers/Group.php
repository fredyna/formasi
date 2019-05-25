<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->is_admin()){
			redirect('auth','refresh');
		}
	}

	public function index(){
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'group/group';
		$data['title'] 	= 'Kelola Group | Formasi';
		$data['menu'] 	= 3;
		$data['data_group'] = $this->ion_auth->groups()->result();
		$this->load->view('template/template',$data);
	}

	public function addGroup(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
			$this->form_validation->set_rules('group_desc', 'Group Description', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$group_name = $this->input->post('group_name');
				$group_desc = $this->input->post('group_desc');
				
				$sql = $this->ion_auth->create_group($group_name, $group_desc);
				if($sql){
					$this->session->set_flashdata('info', 'Create Group Success!');
					redirect('group','refresh');
				} else{
					$this->session->set_flashdata('info', 'Create Group Failed!');
					redirect('group/addGroup','refresh');
				}
			} 
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'group/group_add';
		$data['title'] 	= 'Create Group | Formasi';
		$data['menu'] 	= 3;
		$this->load->view('template/template',$data);
	}

	public function updateGroup($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Update Group Failed!');
			redirect('group','refresh');
		}

		if($this->input->post('submit') == true){
			$this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
			$this->form_validation->set_rules('group_desc', 'Group Description', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$group_name = $this->input->post('group_name');
				$group_desc = $this->input->post('group_desc');
				
				$sql = $this->ion_auth->update_group($id,$group_name, $group_desc);
				if($sql){
					$this->session->set_flashdata('info', 'Update Group Success!');
					redirect('group','refresh');
				} else{
					$this->session->set_flashdata('info', 'Update Group Failed!');
					redirect('group/updateGroup','refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'group/group_edit';
		$data['title'] 	= 'Update Group | Formasi';
		$data['menu'] 	= 3;
		$data['data_group'] = $this->ion_auth->group($id)->row();
		$this->load->view('template/template',$data);	
	}

	public function deleteGroup($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Delete Group Failed!');
			redirect('group','refresh');
		}

		$sql = $this->ion_auth->delete_group($id);
		if($sql){
			$this->session->set_flashdata('info', 'Delete Group Success!');
			redirect('group','refresh');
		} else{
			$this->session->set_flashdata('info', 'Delete Group Failed!');
			redirect('group','refresh');
		}
	}

}

/* End of file Group.php */
/* Location: ./application/controllers/Group.php */