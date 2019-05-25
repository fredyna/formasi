<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaDatabase extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('databaseModel');
	}

	public function index()
	{
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'kelolaDatabase/query';
		$data['title'] 	= 'Kelola Database | Formasi';
		$data['menu'] 	= 5;
		$this->load->view('template/template',$data);
	}

	public function sql(){
		$this->form_validation->set_rules('sql', 'SQL', 'required');
		if ($this->form_validation->run() == TRUE) {
			$sql = $this->input->post('sql');
			$proses = $this->databaseModel->sqlProses($sql);
			if($proses==1){
				$this->session->set_flashdata('info-success', 'Sukses!');
				redirect('kelolaDatabase','refresh');
			} else{
				$this->session->set_flashdata('info-fail', 'Gagal! Code Error : '.$proses['code'].', Message : '.$proses['message']);
				redirect('kelolaDatabase','refresh');
			}
		}

		$this->index();
	}

}

/* End of file KelolaDatabase.php */
/* Location: ./application/controllers/KelolaDatabase.php */