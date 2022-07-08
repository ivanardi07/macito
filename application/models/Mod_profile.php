<?php
class Mod_profile extends CI_Model
{
    private $table = 'user';

    public function getProfile($id)
    {
        # code...
        $user = $this->db->get($this->table)->row_array();
        $this->session->set_userdata([
            'user_logged' => array(
                'id_user'   => $user['id_user'],
                'username'  => $user['nama'],
                'privilege' => 1,
                // 'is_verified' => 1,
            )
        ]);
        return $this->db->get_where($this->table, ["id_user" => $id])->row();
    }


    public function getUpdate($data, $id)
    {
        # code...
        $this->db->where($this->id, $id);

        // $data = array(
        //     'email'                      => $this->input->post('txt_email'),
        //     'nama'                       => $this->input->post('txt_nama'),
        //     'alamat'                     => $this->input->post('txt_alamat'),
        //     'no_hp'                      => $this->input->post('txt_no_hp'),
        //     'date_modified'              => date('Y-m-d'),
        // );
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
}
