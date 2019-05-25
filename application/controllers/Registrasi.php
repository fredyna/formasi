<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('pesertaModel');
		$this->load->model('acaraModel');
	}

	public function index()
	{
		$this->load->view('error_pages/404');
	}

	public function acara($id=null){
		if($id==null){
			$this->load->view('error_pages/404');
			return;
		}

		if($this->input->post('submit') == true){
			$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
			$kategori = $this->input->post('kategori');
			if($kategori==2){
				$this->form_validation->set_rules('nim', 'NIM', 'trim|required');
				$this->form_validation->set_rules('prodi', 'Program Studi', 'trim|required');
				$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
			}
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'id_acara' => $id,
					'nama_peserta' => ucwords(strtolower($this->input->post('nama'))),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'no_hp'		=> $this->input->post('no_hp'),
					'alamat' => $this->input->post('alamat')
				);

				if($kategori==1){
					$data['nim'] = mt_rand(50000000,80000000);
					$data['kategori'] = 'Umum';
				} else{
					$data['nim'] = $this->input->post('nim');
					$data['prodi'] = $this->input->post('prodi');
					$data['kelas'] = $this->input->post('kelas');
					$data['kategori'] = 'Mahasiswa';
				}

				$sql = $this->pesertaModel->create($data);
				if($sql){
					$this->session->set_flashdata('info', 'Sukses! Jazakumullahu khairan. Semoga dapat mempererat ukhuwah islamiyah');
					redirect('registrasi/acara/'.$id,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Afwan, Tambah Data Gagal! silahkan cek kembali form di bawah. Jika tidak ada kesalahan, silahkan tanyakan ke CP!');
					redirect('registrasi/acara/'.$id,'refresh');
				}

			}
		}

		$acara = $this->acaraModel->getById($id);
		if(sizeof($acara) <= 0){
			$this->load->view('error_pages/404');
			return;
		}
		if($acara->status == 0){
			$this->load->view('error_pages/404');
			return;
		}

		$view = 'daftar/form_umum_mahasiswa';
		if($acara->kategori == 1){
			$view = 'daftar/form_umum';
		} else if($acara->kategori == 2){
			$view = 'daftar/form_mahasiswa';
		} else{
			$view = 'daftar/form_umum_mahasiswa';
		}

		$data['acara']	= $acara;
		$this->load->view($view, $data);
	}

	public function alumni(){
		$this->load->view('alumni/form_alumni');
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */