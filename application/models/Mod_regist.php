<?php
class Mod_regist extends CI_Model

{

    private $table = 'user';

    public function checkEmail($email)
    {
        $this->db->where('email', $email);
        $data = $this->db->get($this->table)->row_array();
        return $data;
    }

    public function checkNik($nik)
    {
        $this->db->where('nik', $nik);
        $data = $this->db->get($this->table)->row_array();
        return $data;
    }

    // public function generateNewID()
    // {
    //     $sql = "SELECT max(ID_USER) FROM USERNAME";
    //     return $this->db->query($sql)->row_array()['MAX'] + 1;
    // }

    public function doRegister()
    {
        $this->load->helper('string');
        $SALT                   = strtotime(date('Y-m-d'));
        $emailVerificationCode  = random_string('alnum', 20);
        $emailVerificationCodeAndEmail64 = base64_encode($this->input->post('txt_email')) . $emailVerificationCode;
        $data = array(
            'nik'                       => $this->input->post('txt_nik'),
            'alamat'                    => $this->input->post('txt_alamat'),
            'no_hp'                     => $this->input->post('txt_no_hp'),
            'email'                     => $this->input->post('txt_email'),
            'nama'                      => $this->input->post('txt_nama'),
            'password'                  => hash('sha256', $SALT . $this->input->post('txt_password')),
            'SALT'                      => $SALT,
            'user_level'                => 2,
            'is_verified'               => 0,
            'date_created'              => date('Y-m-d'),
            'email_verification_code'   => $emailVerificationCode
        );
        $this->db->insert('user', $data);
        $final = $this->EmailModel->sendVerificatinEmail($this->input->post('txt_email'), $emailVerificationCodeAndEmail64);
        return $final;
        // $send_email = $this->EmailModel->sendVerificatinEmail($this->input->post('txt_email'), $emailVerificationCodeAndEmail64);
        // if ($send_email) {
        //     return $this->db->insert('user', $data);
        // } else {
        //     show_error($this->email->print_debugger());
        // }
    }

    public function checkVerification($verificationCode)
    {
        $vc = explode("=", $verificationCode);
        $email = base64_decode($vc[0] . "==");
        $this->db->where('email_verification_code', $vc[1]);
        $this->db->where('email', $email);
        $data = $this->db->get($this->table)->row_array();
        return $data;
    }

    public function updateAccountStatus($email, $verificationCode)
    {
        $data = array(
            'IS_VERIFIED' => 1,
        );

        $this->db->where('email_verification_code', $verificationCode);
        $this->db->where('email', $email);
        return $this->db->update('user', $data);
    }
}
