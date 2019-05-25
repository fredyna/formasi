<?php
	switch($group){
		case 1:
			$this->load->view('template/sidebarSuper');
			break;
		case 2:
			$this->load->view('template/sidebarSekretaris');
			break;
		case 3:
			$this->load->view('template/sidebarBendahara');
			break;
		default:
			$this->load->view('template/sidebarSekretaris');
			break;
	}	
?>