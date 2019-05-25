<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('kasModel');
		$this->load->model('pengurusModel');
	}

	/* Besar Kas */

	public function index()
	{
		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'kas/kas';
		$data['title'] 	= 'Besar Kas | Formasi';
		$data['menu'] 	= 2;
		$data['kas'] = $this->kasModel->get();
		$this->load->view('template/template',$data);
	}

	public function addData(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('kas', 'Besar Kas', 'required');
			$this->form_validation->set_rules('tahun', 'Tahun Kepengurusan', 'required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'besar' 			=> $this->input->post('kas'),
					'tahun_pengurus' 	=> $this->input->post('tahun')
				);

				$thn = $this->input->post('tahun');
				$pengurus = $this->pengurusModel->get($thn);

				$sql = $this->kasModel->create($data);
				if($sql){
					foreach ($pengurus as $p) {
						$data2 = array(
							'id_kas' 			=> $sql,
							'id_pengurus'		=> $p->id
						);
						$this->kasModel->createKasPengurus($data2);
					}
					$this->session->set_flashdata('info', 'Add Data Success!');
					redirect('kas/addData','refresh');	
				} else{
					$this->session->set_flashdata('info', 'Add Data Failed!');
					redirect('kas/addData','refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'kas/kas_add';
		$data['title'] 	= 'Add Kas | Formasi';
		$data['menu'] 	= 2;
		$data['tahun_kas'] = $this->pengurusModel->getAllTahun();
		$this->load->view('template/template',$data);
	}

	public function editData($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Edit Data Failed!');
			redirect('kas','refresh');
		}

		if($this->input->post('submit') == true){
			$this->form_validation->set_rules('kas', 'Besar Kas', 'required');
			$this->form_validation->set_rules('tahun', 'Tahun Kepengurusan', 'required');
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'besar' => $this->input->post('kas'),
					'tahun_pengurus' => $this->input->post('tahun')
				);

				$dataKas = $this->kasModel->getById($id);
				if($dataKas->tahun_pengurus != $data['tahun_pengurus']){
					$dataByTahun = $this->kasModel->getByTahun($data['tahun_pengurus']);
					if($dataByTahun > 0){
						$this->session->set_flashdata('info', 'Tahun pengurus yang dipilih telah ada!');
						redirect('kas/editData/'.$id,'refresh');
					}
				}

				$sql = $this->kasModel->update($id,$data);
				if($sql){
					$this->session->set_flashdata('info', 'Update Data Success!');
					redirect('kas/editData/'.$id,'refresh');
				} else{
					$this->session->set_flashdata('info', 'Delete Data Failed!');
					redirect('kas/editData/'.$id,'refresh');
				}
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'kas/kas_edit';
		$data['title'] 	= 'Edit Kas | Formasi';
		$data['menu'] 	= 2;
		$data['tahun_kas'] = $this->pengurusModel->getAllTahun();
		$data['kas']	= $this->kasModel->getById($id);
		$this->load->view('template/template',$data);
	}

	public function deleteData($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Delete Data Failed!');
			redirect('kas','refresh');
		}

		$sql = $this->kasModel->delete($id);
		if($sql){
			$this->kasModel->deleteKasPengurus($id);
			$this->session->set_flashdata('info', 'Delete Data Success!');
			redirect('kas','refresh');
		} else{
			$this->session->set_flashdata('info', 'Delete Data Failed!');
			redirect('kas','refresh');
		}
	}

	/* End Besar Kas */

	/* Kelola Kas */

	public function kelolaKas($kas=null){
		if($kas==null){
			$tahun = date('Y');
			$kas = $this->kasModel->getDataByTahun($tahun);
			if($kas){
				$kas = $kas->id;
			} else{
				$kas = null;
			}
		}

		$data['user'] 	= $this->ion_auth->user()->row();
		$data['group'] 	= $this->ion_auth->get_users_groups()->row()->id;
		$data['main'] 	= 'kas/kasPengurus';
		$data['title'] 	= 'Kelola Kas | Formasi';
		$data['menu'] 	= 3;
		$data['kas'] 	= $this->kasModel->get();
		if($data['kas']!=null){
			$data['count'] 	= $this->kasModel->count($kas);
		}
		$data['kas_aktif'] = $this->kasModel->getById($kas);
		$data['kas_pengurus'] = $this->kasModel->getKasPengurus($kas);
		$this->load->view('template/template',$data);
	}

	public function setor($bln=null, $id_kas=null, $id_pengurus=null){
		if($bln==null || $id_kas==null || $id_pengurus==null){
			header('Content-Type: application/json');
			echo 0;
		} else{
			$kas = $this->kasModel->getKasPengurusById($id_kas, $id_pengurus);
			switch($bln){
				case 1:
					$bln = $kas->bulan1;
					if($bln==0){
						$data = array(
							'bulan1' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan1' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}

					break;

				case 2:
					$bln = $kas->bulan2;
					if($bln==0){
						$data = array(
							'bulan2' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan2' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;

				case 3:
					$bln = $kas->bulan3;
					if($bln==0){
						$data = array(
							'bulan3' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan3' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;

				case 4:
					$bln = $kas->bulan4;
					if($bln==0){
						$data = array(
							'bulan4' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan4' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;

				case 5:
					$bln = $kas->bulan5;
					if($bln==0){
						$data = array(
							'bulan5' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan5' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;

				case 6:
					$bln = $kas->bulan6;
					if($bln==0){
						$data = array(
							'bulan6' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan6' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;

				case 7:
					$bln = $kas->bulan7;
					if($bln==0){
						$data = array(
							'bulan7' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan7' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;

				case 8:
					$bln = $kas->bulan8;
					if($bln==0){
						$data = array(
							'bulan8' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan8' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;

				case 9:
					$bln = $kas->bulan9;
					if($bln==0){
						$data = array(
							'bulan9' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan9' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;

				case 10:
					$bln = $kas->bulan10;
					if($bln==0){
						$data = array(
							'bulan10' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan10' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;

				case 11:
					$bln = $kas->bulan11;
					if($bln==0){
						$data = array(
							'bulan11' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan11' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;

				case 12:
					$bln = $kas->bulan12;
					if($bln==0){
						$data = array(
							'bulan12' => 1
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 1;
						} else{
							header('Content-Type: application/json');
							echo 2;
						}
					} else{
						$data = array(
							'bulan12' => 0
						);
						$sql = $this->kasModel->updateKasPengurus($id_kas,$id_pengurus,$data);
						if($sql){
							header('Content-Type: application/json');
							echo 2;
						} else{
							header('Content-Type: application/json');
							echo 1;
						}
					}
					
					break;
				default:
					header('Content-Type: application/json');
					echo 0;
					break;
			}
		}
	}

	public function printData($kas=null){
		$data['kas_pengurus'] = $this->kasModel->getKasPengurus($kas);
		$data['kas_aktif']	  = $this->kasModel->getById($kas);
		if($kas!=null){
			$data['count'] 			= $this->kasModel->count($kas);
		}
		$this->load->view('kas/print',$data);
	}
	/* End Kelola Kas */

}

/* End of file Kas.php */
/* Location: ./application/controllers/Kas.php */