<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Controller extends CI_Controller
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
		$this->load->library('form_validation');
		$this->load->model('mod_usermanagement');
	}

	public function index()
	{
		$data["menu_active"] = "user-management";
		$data['data_user'] = $this->mod_usermanagement->get_daftarAkun();
		$this->load->view('user/user_index', $data);
	}

	public function listUser()
	{
		# code...
		$listUser = $this->mod_usermanagement->get_daftarAkun();
		$data = array(
			"data"      => $listUser,
            "response"  => "success"
		);
		print_r(json_encode($data));
	}

	public function delete()
	{
		$id = $this->input->post("id");
		if (!isset($id)) show_404();
		$this->mod_usermanagement->get_delete($id);
		$msg['success'] = true;
		$this->session->set_flashdata(
			'message',
			'<div class = "alert alert-success alert-dismissible fade show" role="alert">
				Data User berhasil dihapus
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            	<span aria-hidden="true">&times;</span>
          		</button>
			</div>'
		);
		$this->output->set_output(json_encode($msg));
	}
}
