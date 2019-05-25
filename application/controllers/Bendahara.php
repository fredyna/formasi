<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bendahara extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->in_group(3)){
			redirect('auth','refresh');
		}
	}

	public function index()
	{
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'home';
		$data['title'] 	= 'Home | Formasi';
		$data['menu'] 	= 1;
		$this->load->view('template/template',$data);
	}

}

/* End of file Bendahara.php */
/* Location: ./application/controllers/Bendahara.php */