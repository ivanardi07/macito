<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_Controller extends CI_Controller
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
		$this->load->model('mod_regist');
		//$this->load->model('HomeModel');
		$this->load->model('EmailModel');

		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('register/v_register');
	}

	public function register()
	{
		$data 			= $this->input->post();
		$nik 			= isset($data["txt_nik"]) ? $data["txt_nik"] : '';
		$alamat 		= isset($data["txt_alamat"]) ? $data["txt_alamat"] : '';
		$no_hp 			= isset($data["txt_no_hp"]) ? $data["txt_no_hp"] : '';
		$email 			= isset($data["txt_email"]) ? $data["txt_email"] : '';
		$username 		= isset($data["txt_nama"]) ? $data["txt_nama"] : '';
		$pass 			= isset($data["txt_password"]) ? $data["txt_password"] : '';
		$passConfirm 	= isset($data["txt_password-confirm"]) ? $data["txt_password-confirm"] : '';

		// ('fieldNameIntTheForm', 'fieldNameInDatabase', 'rules')

		$this->form_validation->set_rules(
			'txt_nik',
			'NIK',
			'required|trim|is_unique[user.nik]|max_length[16]',
			array(
				'required'      => '%s Harus Diisi.',
				'is_unique'     => '%s Sudah Ada Dalam Database, Coba NIK Lain.',
			)
		);
		// $this->form_validation->set_rules(
		// 	'txt_alamat',
		// 	'Alamat',
		// 	'required|trim|',
		// 	array(
		// 		'required'      => '%s Harus Diisi.',
		// 	)
		// );
		// $this->form_validation->set_rules(
		// 	'txt_no_hp',
		// 	'No. Hp',
		// 	'required|trim|',
		// 	array(
		// 		'required'      => '%s Harus Diisi.',
		// 	)
		// );
		$this->form_validation->set_rules(
			'txt_email',
			'E-mail',
			'required|trim|is_unique[user.email]|valid_email',
			array(
				'required'      => '%s Harus Diisi.',
				'is_unique'     => '%s Sudah Ada Dalam Database, Coba Email Lain.',
				'valid_email'   => '%s Email tidak valid.',
			)
		);
		$this->form_validation->set_rules(
			'txt_nama',
			'Nama',
			'required|trim|is_unique[user.nama]',
			array(
				'required'      		=> '%s Harus Diisi.',
				'is_unique'     		=> '%s Sudah Ada Dalam Database, Coba Nama Lain.',				
			)
		);
		$this->form_validation->set_rules(
			'txt_password',
			'Password',
			'required|trim|min_length[5]',
			array(
				'required'      		=> '%s Harus Diisi.',
				'min_length'			=> '%s Minimal 5 Karakter',
				//'alpha_numeric_spaces'	=> '%s Harus Mengandung Angka dan Huruf'
			)
		);
		$this->form_validation->set_rules(
			'txt_password-confirm',
			'Password Konfirmasi',
			'required|trim|min_length[5]|matches[txt_password]',
			array(
				'required'      		=> '%s Harus Diisi.',
				'min_length'			=> '%s Minimal 5 Karakter',
				'matches'				=> '%s Konfirmasi Harus Sesuai',
				//'alpha_numeric_spaces'	=> '%s Harus Mengandung Angka dan Huruf'
			)
		);

		if ($this->form_validation->run() == false) {
			$data['info'] = validation_errors();
			$data['alertType'] = "alert-warning";
		} else {
			$cekEmail = $this->mod_regist->checkEmail($email);
			$cekNik = $this->mod_regist->checkNik($nik);

			if ($cekEmail != NULL) {
				$this->session->set_flashdata('pesan', 'Email sudah terdaftar');
				$data['info'] = "Email Sudah Ada, Coba Email Lainnya.";
				$data['alertType'] = "alert-warning";
			} elseif ($cekNik != NULL) {
				# code...
				$this->session->set_flashdata('pesan', 'Nik sudah terdaftar');
				$data['info'] = "Nik Sudah Ada, Coba Nik Lainnya.";
				$data['alertType'] = "alert-warning";
			} else {
				if ($pass != $passConfirm) {
					$data['info'] = "Periksa Password Konfirmasi";
					$data['alertType'] = "alert-warning";
				} else {
					if ($this->mod_regist->doRegister()) {
						$data['info'] = "Register berhasil";
						$data['alertType'] = "alert-success";
						$this->session->set_flashdata('pesan', 'Register Berhasil');
						$this->session->unset_userdata("register_success");
						$this->session->set_userdata("register_success", array("username" => $username, "email" => $email));
						redirect(base_url('Register_Controller/verifyEmail'));
					} else {
						$data['info'] = "Kesalahan sistem : Register user gagal query gagal dieksekusi";
						$data['alertType'] = "alert-warning";
					}
				}
			}
		}

		$this->session->set_flashdata('pesan', $data);
		redirect(base_url('Register_Controller'));
		// print_r($data['info']);
	}

	public function verifyEmail()
	{
		if ($this->session->userdata('register_success')) {
			$data = $this->session->userdata('register_success');
			$this->load->view("register/v_verifyEmail", $data);
		} else {
			echo "<center><h1>OOPS Cari Apa?</h1><a href='" . base_url('Register_Controller') . "'>Klik Disini Untuk Kembali</a></center>";
		}
	}

	public function verify($verificationCode)
	{
		$verify = $this->mod_regist->checkVerification($verificationCode);
		if ($verify != null) {
			$vc 				= explode("=", $verificationCode);
			$email 				= base64_decode($vc[0] . "==");
			$verificationCode 	= $vc[1];
			$this->mod_regist->updateAccountStatus($email, $verificationCode);
			$this->session->set_userdata("register_success", array("email" => $email));
			redirect(base_url('Register_Controller/successful'));
		} else {
			redirect(base_url('Register_Controller/verifyFailed'));
		}
	}

	public function successful()
	{
		if ($this->session->userdata('register_success')) {
			$data = $this->session->userdata('register_success');
			$this->load->view("register/v_registerSuccessful", $data);
		} else {
			echo "<center><h1>OOPS Cari Apa?</h1><a href='" . base_url('Register_Controller') . "'>Klik Disini Untuk Kembali</a></center>";
		}
	}

	public function verifyFailed()
	{
		$this->load->view("register/v_verifyFailed");
	}

	public function dummmyTester()
	{
		$this->load->view("register/v_verifyFailed");
	}
}
