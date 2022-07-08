<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_Controller extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		// if (!empty($this->session->userdata('is_login') == FALSE)) {
		// 	// alert peringatan bahwa harus login
		// 	$this->session->set_flashdata('failed', 'Anda Belum login, silahkan login terlebih dahulu !');
		// 	redirect(base_url('login'));
		// }
		$this->load->model('mod_login');
		$this->load->library('form_validation');
	}

	public function index()
	{

		//data untuk header
		$this->data = [
			'title_web' => 'Dashboard',
			'userx'     => $this->db->get_where('login', ['id' => $this->session->userdata('id')])->row(),
			'user_aktif' => $this->model->countUserAktif(),
		];

		$user = $this->model->countUserAktif();

		//view home 
		if ($this->session->userdata("user_logged")['user_level'] == "1") {
			$this->load->view('home/home_admin/admin_home_index.php', $this->data, $user);
		} else {
			$this->load->view('home/home_wp/home_index.php', $this->data, $user);
		}
	}
}
