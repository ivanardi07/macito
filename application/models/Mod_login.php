<?php
class Mod_login extends CI_Model

{

    private $table = 'user';

    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan user dan user
        //$this->db->where('IS_VERIFIED', 1);
        // $this->db->where('username', $post["username"]);
        $this->db->where('email', $post["username"]);
        $user = $this->db->get($this->table)->row_array();

        // jika user terdaftar
        if ($user) {
            // print_r($user['PASSWORD']);die('asd');

            //  periksa password-nya
            // $isPasswordTrue = password_verify($post['password'], $user['PASSWORD']);
            $isPasswordTrue = hash('sha256', $user['salt'] . $post['password']) == $user['password'];

            //  periksa role-nya
            $isAdmin        = $user['user_level'] == "1";
            $isVerified     = $user['is_verified'] == "0000-00-00 00:00:00" ? false : true;

            //  jika password benar dan dia admin
            // print_r($isPasswordTrue.'A'.$isAdmin.'B');die();
            if ($isPasswordTrue && $isAdmin && $isVerified) {

                // print_r('expression');die('as');
                // login sukses yay!
                $this->session->set_userdata([
                    'user_logged' => array(
                        'id_user'   => $user['id_user'],
                        'username'  => $user['nama'],
                        'privilege' => 1,
                        // 'is_verified' => 1,
                    )
                ]);
                // $this->_updateLastLogin($user->user_id);
                $data = array(
                    "status"    => true,
                    "info"      => "Berhasil Login",
                    'alertType' => "alert-success",
                );
            } elseif ($isPasswordTrue && $isVerified) {
                $this->session->set_userdata([
                    'user_logged' => array(
                        'id_user'   => $user['id_user'],
                        'username'  => $user['nama'],
                        'privilege' => 2,
                        // 'is_verified' => 1,
                    )
                ]);
                $data = array(
                    "status"    => true,
                    "info"      => "Berhasil Login",
                    'alertType' => "alert-success",
                );
            } elseif (!$isVerified) {
                # code...
                $data = array(
                    "status"    => false,
                    "info"      => "Akun belum terverifikasi.",
                    "alertType" => "alert-warning",
                );
            } else {
                $data = array(
                    "status"    => false,
                    "info"      => "Gagal Login : Username atau Password Salah.",
                    'alertType' => "alert-warning",
                );
            }
        } else {
            $data = array(
                "status"    => false,
                "info"      => "Gagal Login Username Tidak Ditemukan.",
                'alertType' => "alert-warning",
            );
        }
        return $data;
    }

    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    public function cekStatus()
    {
        # code...
        $user = $this->db->get($this->table)->row_array();
        $isVerified = $user['is_verified'] == "1";
        if ($isVerified) {
            return true;
        }
    }

    private function _updateLastLogin($user_id)
    {
        $sql = "UPDATE {$this->table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);    
    }

    public function countUserAktif()
    {
        # code...
        // $this->db->select('ID_USER');
        // $this->db->from('USERNAME');
        // $this->db->where('IS_VERIFIED', 1);
        // echo $this->db->count_all();

        // $this->db->select('ID_USER');
        $this->db->where('is_verified', NULL, FALSE);
        $this->db->where('user_level', 2);
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    public function countUserNonAktif()
    {
        # code...

        $this->db->where('is_verified', "0000-00-00 00:00:00");
        $this->db->where('user_level', 2);
        $query = $this->db->get('user');
        return $query->num_rows();
    }
}
