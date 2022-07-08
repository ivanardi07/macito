<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sptpd_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_sptpd');
	}

	// public function index()
	// {
	// 	$data["menu_active"] 	= "sptpd";
	// 	$data['sptpd']			= $this->mod_sptpd->getSPTPD(1);
	// 	$this->load->view('home/home_wp/home_index.php', $data);
	// }

	// public function getDataPendaftaran()
	// {
	// 	$npwpd = $this->input->post('npwpd');
	// 	if ($npwpd != "") {
	// 		$data = array(
	// 			"pendaftaran" 	=> $this->mod_sptpd->getPendaftaran($npwpd),
	// 			"status"		=> "success"
	// 		);
	// 		$namaWP = $this->stringToSecret($data["pendaftaran"]["NAME"]);
	// 		$data["pendaftaran"]["NAME"] = $namaWP;
	// 	} else {
	// 		$data = array(
	// 			"pendaftaran" 	=> null,
	// 			"status"		=> "failed"
	// 		);
	// 	}
	// 	$this->load->view("sptpd/sptpd_detail_npwpd", $data);
	// 	//print_r(json_encode($data));
	// }

	// public function stringToSecret($string = NULL)
	// {
	// 	if (!$string) {
	// 		return NULL;
	// 	}
	// 	$length = strlen($string);
	// 	$visibleCount = (int) round($length / 4);
	// 	$hiddenCount = $length - ($visibleCount * 2);
	// 	return substr($string, 0, $visibleCount) . str_repeat('*', $hiddenCount) . substr($string, ($visibleCount * -1), $visibleCount);
	// }

	// public function add_espt_npwpd()
	// {
	// 	$npwpd 			= $this->input->post('npwpd');
	// 	$user_id 		= $this->session->userdata('user_logged')['id_user'];
	// 	if ($npwpd != "") {
	// 		$data = array(
	// 			"espt_npwpd" 	=> $this->mod_sptpd->add_espt_npwpd($npwpd, $user_id),
	// 			"status"		=> "failed"
	// 		);
	// 	} else {
	// 		$data = array(
	// 			"espt_npwpd" 	=> null,
	// 			"status"		=> "failed"
	// 		);
	// 	}
	// }
}
