<?php

class Login_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_login');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["menu_active"] = "dashboard";
        $data['user'] = $this->db->get('user');
        $data['user_aktif'] = $this->mod_login->countUserAktif();
        $data['user_nonaktif'] = $this->mod_login->countUserNonAktif();
        // jika form login disubmit
        // tampilkan halaman login
        if (!$this->session->userdata('user_logged')) {
            if ($this->input->post()) {
                $prosesLogin = $this->mod_login->doLogin();
                if (!$prosesLogin['status']) {
                    $this->session->set_flashdata('pesan', $prosesLogin);
                }
                redirect(base_url());
            }
            //print_r($this->session->flashdata());
            $this->load->view("login/admin/v_login_admin.php");
        } else {
            if ($this->session->userdata("user_logged")['privilege'] == "1") {
                $this->load->view('home/home_admin/admin_home_index.php', $data);
            } else {
                $this->load->view('home/home_wp/home_index.php', $data);
            }
        }
    }

    public function logout()
    {
        // hancurkan semua sesi

        $this->session->sess_destroy();

        redirect($this->load->view("login/admin/v_login_admin.php"));
    }
}
