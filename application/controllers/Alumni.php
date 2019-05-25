<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('alumniModel');
		$this->load->library('datatables');
    }

    public function index($tahun=null){
        if(!$this->ion_auth->in_group(2)){
			redirect('auth','refresh');
		}

        $data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'alumni/alumni';
		$data['title'] 	= 'Kelola Alumni | Formasi';
        $data['menu'] 	= 6;
        $data['submenu']    = 2;
        $data['tahun']  = $this->alumniModel->getAllTahun();
        $data['tahun_aktif']    = $tahun;
        if($tahun != null){
            $data['alumni']         = $this->alumniModel->get($tahun);
        }
        $this->load->view('template/template',$data);
    }

    public function dataBaru(){
        if(!$this->ion_auth->in_group(2)){
			redirect('auth','refresh');
		}

        $data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'alumni/alumni_baru';
		$data['title'] 	= 'Kelola Alumni | Formasi';
        $data['menu'] 	= 6;
        $data['submenu']    = 1;
        $data['alumni']     = $this->alumniModel->getDataBaru();
        $this->load->view('template/template',$data);
	}
	
	public function confirmData($id=null){
        if(!$this->ion_auth->in_group(2)){
			redirect('auth','refresh');
		}

		if($id==null){
			$this->session->set_flashdata('info', 'konfirmasi Gagal!');
			redirect('alumni/dataBaru','refresh');
		}

		$data = array(
			'status' => 1
		);
		$confirm = $this->alumniModel->update($id, $data);
		if($confirm){
			$this->session->set_flashdata('info', 'Konfirmasi Berhasil!');
			redirect('alumni/dataBaru','refresh');
		} else{
			$this->session->set_flashdata('info', 'Konfirmasi Gagal!');
			redirect('alumni/dataBaru','refresh');
		}
	}

    public function addData(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('nama', 'NAMA', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'required');
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nama'  => ucwords(strtolower($this->input->post('nama'))),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'no_hp'	=> $this->input->post('no_hp'),
					'tahun'	=> $this->input->post('tahun'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'alamat' => ucwords(strtolower($this->input->post('alamat')))
				);

				$status = $this->input->post('status');
				if($status != null){
					$data['status'] = $status;
				}

				$sql = $this->alumniModel->create($data);

				if($status == null){
					if($sql){
						$this->session->set_flashdata('info', 'Add Data Success!');
						redirect('registrasi/alumni','refresh');
					} else{
						$this->session->set_flashdata('info', 'Add Data Failed!');
						redirect('registrasi/alumni','refresh');
					}
				}

				if($sql){
					$this->session->set_flashdata('info', 'Add Data Success!');
					redirect('alumni/addData','refresh');
				} else{
					$this->session->set_flashdata('info', 'Add Data Failed!');
					redirect('alumni/addData','refresh');
				}
			} 
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'alumni/alumni_add';
		$data['title'] 	= 'Add Alumni | Formasi';
		$data['menu'] 	= 6;
		$data['submenu'] 	= 2;
		$this->load->view('template/template',$data);
    }

    public function editData($id=null, $tahun=null, $status=0){
        if(!$this->ion_auth->in_group(2)){
			redirect('auth','refresh');
		}

		if($id == null){
			$this->session->set_flashdata('info', 'Edit Data Failed!');
			redirect('alumni','refresh');
		}

		if($this->input->post('submit') == true){
			$this->form_validation->set_rules('nama', 'NAMA', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');
			$this->form_validation->set_rules('tahun', 'Tahun', 'required');
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'nama'  => ucwords(strtolower($this->input->post('nama'))),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'no_hp'	=> $this->input->post('no_hp'),
					'tahun'	=> $this->input->post('tahun'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'alamat' => ucwords(strtolower($this->input->post('alamat')))
				);

				$sql = $this->alumniModel->update($id,$data);

				if($status == 0){
					if($sql){
						$this->session->set_flashdata('info', 'Update Data Success!');
						redirect('alumni/dataBaru/','refresh');
					} else{
						$this->session->set_flashdata('info', 'Update Data Failed!');
						redirect('alumni/dataBaru/','refresh');
					}
				} else {
					if($sql){
						$this->session->set_flashdata('info', 'Update Data Success!');
						redirect('alumni/index/'.$tahun,'refresh');
					} else{
						$this->session->set_flashdata('info', 'Update Data Failed!');
						redirect('alumni/index/'.$tahun,'refresh');
					}
				}

				if($sql){
					$this->session->set_flashdata('info', 'Update Data Success!');
					redirect('alumni/editData/'.$id,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Update Data Failed!');
					redirect('alumni/editData/'.$id,'refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'alumni/alumni_edit';
		$data['title'] 	= 'Edit Alumni | Formasi';
		$data['menu'] 	= 6;
		$data['submenu'] 	= 2;
		$data['status']	= $status;
        $data['alumni'] = $this->alumniModel->getById($id);
        $data['tahun_aktif']    = $tahun;
		$this->load->view('template/template',$data);
	}
    
    public function deleteData($id=null, $tahun=null, $status=0){
        if(!$this->ion_auth->in_group(2)){
			redirect('auth','refresh');
		}

		if($id==null){
			$this->session->set_flashdata('info', 'Delete Data Failed!');
			redirect('alumni','refresh');
		}

		$sql = $this->alumniModel->delete($id);
		
		if($status == 0){
			if($sql){
				$this->session->set_flashdata('info', 'Delete Data Success!');
				redirect('alumni/dataBaru','refresh');
			} else{
				$this->session->set_flashdata('info', 'Delete Data Failed!');
				redirect('alumni/dataBaru/','refresh');
			}
		}

		if($sql){
			$this->session->set_flashdata('info', 'Delete Data Success!');
			redirect('alumni/index/'.$tahun,'refresh');
		} else{
			$this->session->set_flashdata('info', 'Delete Data Failed!');
			redirect('alumni/index/'.$tahun,'refresh');
		}
	}

    public function printData($tahun=null){
        if(!$this->ion_auth->in_group(2)){
			redirect('auth','refresh');
		}
		
		$data['alumni'] = $this->alumniModel->get($tahun);
		$data['tahun']	  = $tahun;
		$this->load->view('alumni/print',$data);
	}
}