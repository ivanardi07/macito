<?php
class Mod_profileuser extends CI_Model
{
    private $table = 'user';

    public function getProfileUser($id)
    {
        # code...
        $user = $this->db->get($this->table)->row_array();
        $this->session->set_userdata([
            'user_logged_2' => array(
                'id_user'   => $user['id_user'],
                'username'  => $user['nama'],
                'privilege' => 2,
                // 'is_verified' => 1,
            )
        ]);
        return $this->db->get_where($this->table, ["id_user" => $id])->row();
    }
}
