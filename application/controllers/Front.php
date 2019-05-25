<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pesertaModel');
		$this->load->model('acaraModel');
		$this->load->model('kasModel');
	}

	public function index()
	{
		$this->load->view('front');
	}

	public function kasPengurus(){
		$kas = $this->kasModel->getLast()->id;

		$data['title'] 	= 'Publikasi Kas Pengurus';
		$data['kas'] 	= $this->kasModel->get();
		if($data['kas']!=null){
			$data['count'] 	= $this->kasModel->count($kas);
		}
 		$data['kas_aktif'] = $this->kasModel->getById($kas);
		$data['kas_pengurus'] = $this->kasModel->getKasPengurus($kas);
		$this->load->view('kas/kas_publik',$data);
	}

	/* Data Pengurus */

	public function dataPengurus(){
		$this->load->view('form_data_pengurus');
	}

	public function addData(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('nim', 'NIM', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('prodi', 'Prodi', 'required');
			$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			if ($this->form_validation->run() == TRUE) {
				$nim = $this->input->post('nim');
				$nama = ucwords(strtolower($this->input->post('nama')));
				$prodi = $this->input->post('prodi');
				$kelas = strtoupper($this->input->post('kelas'));
				$jenis_kelamin = $this->input->post('jenis_kelamin');
				$no_hp = $this->input->post('no_hp');
				$tahun = 2019;
				$jabatan = ucwords(strtolower($this->input->post('jabatan')));
				$tempat_lahir = ucwords(strtolower($this->input->post('tempat_lahir')));
				$tanggal_lahir = date('Y-m-d',strtotime($this->input->post('tanggal_lahir')));
				$alamat = ucwords(strtolower($this->input->post('alamat')));


				$query = "INSERT INTO `pengurus` (`nim`, `nama`, `prodi`, `kelas`, `jenis_kelamin`, `no_hp`, `tahun`, `jabatan`, `tempat_lahir`, `tanggal_lahir`, `alamat`) VALUES ('$nim', '$nama', '$prodi', '$kelas', '$jenis_kelamin', '$no_hp', '$tahun', '$jabatan', '$tempat_lahir', '$tanggal_lahir', '$alamat');";

				$this->db->query($query);
				$sql = $this->db->affected_rows();

				//$sql = $this->pengurusModel->create($data);
				if($sql){
					$this->session->set_flashdata('info', 'Add Data Success!');
					redirect('front/dataPengurus','refresh');
				} else{
					$this->session->set_flashdata('info', 'Add Data Failed!');
					redirect('front/addData','refresh');
				}
			}

		}

		$this->load->view('form_data_pengurus');
		
	}

	/* End data pengurus */
}

/* End of file Front.php */
/* Location: ./application/controllers/Front.php */