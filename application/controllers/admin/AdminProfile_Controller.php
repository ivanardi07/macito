<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminProfile_Controller extends CI_Controller
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
        $this->load->model('mod_profile');
    }

    public function index()
    {
        $id = $this->session->userdata('user_logged')['privilege'];

        $data["menu_active"] = "none";
        $data['data_profile'] = $this->mod_profile->getProfile($id);
        $this->load->view('profile/admin_profile', $data);
    }

    public function update()
    {
        # code...
        $this->form_validation->set_rules(
            'txt_email',
            'Email',
            'required|trim|is_unique[user.email]|valid_email',
            array(
                'required'      => '%s Harus Diisi.',
                'is_unique'     => '%s Sudah Ada Dalam Database, Coba Email Lain.',
            )
        );
        $this->form_validation->set_rules(
            'txt_nama',
            'Nama',
            'required|trim|is_unique[user.nama]|max_length[16]',
            array(
                'required'      => '%s Harus Diisi.',
                'is_unique'     => '%s Sudah Ada Dalam Database, Coba Nama Lain.',
            )
        );
        $this->form_validation->set_rules(
            'txt_alamat',
            'Alamat',
            'required|trim|',
            array(
                'required'      => '%s Harus Diisi.',
            )
        );
        $this->form_validation->set_rules(
            'txt_no_hp',
            'No. Hp',
            'required|trim|',
            array(
                'required'      => '%s Harus Diisi.',
            )
        );

        $id = $this->session->userdata('id');
        $data = array(
            'email'                      => $this->input->post('txt_email'),
            'nama'                       => $this->input->post('txt_nama'),
            'alamat'                     => $this->input->post('txt_alamat'),
            'no_hp'                      => $this->input->post('txt_no_hp'),
            'date_modified'              => date('Y-m-d'),
        );
        if ($this->form_validation->run() == TRUE) {
            # code...
            // if (!empty($_FILES['foto_ktp']['name'])) {
            //     $upload = $this->_do_upload();

            //     //delete file
            //     $user = $this->mod_profile->getProfile($this->session->userdata('id'));
            //     if (file_exists('assets/uploads/images/' . $user->foto_ktp) && $user->foto_ktp) {
            //         unlink('assets/uploads/images/' . $user->foto_ktp);
            //     }

            //     $data['foto_ktp'] = $upload;
            // }
            $result = $this->mod_profile->getUpdate($data, $id);

            if ($result > 0) {
                $this->session->set_flashdata('msg', 'Data Profil Berhasil diubah');
                redirect(base_url('admin/adminprofile_controller'));
            } else {
                $this->session->set_flashdata('msg', 'Data Profile Gagal diubah');
                redirect(base_url('admin/adminprofile_controller'));
            }
        } else {
            $this->session->set_flashdata('msg', validation_errors());
            redirect('admin/adminprofile_controller');
        }
    }

    private function _do_upload()
    {
        $config['upload_path']          = 'assets/uploads/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_ktp')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('profile/admin_profile');
        }
        return $this->upload->data('file_name');
    }

    // public function delete()
    // {
    // 	$id = $this->input->post("id");
    // 	if (!isset($id)) show_404();
    // 	$this->mod_profile->get_delete($id);
    // 	$msg['success'] = true;
    // 	$this->session->set_flashdata(
    // 		'message',
    // 		'<div class = "alert alert-success alert-dismissible fade show" role="alert">
    // 			Data User berhasil dihapus
    // 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         	<span aria-hidden="true">&times;</span>
    //       		</button>
    // 		</div>'
    // 	);
    // 	$this->output->set_output(json_encode($msg));
    // }
}
