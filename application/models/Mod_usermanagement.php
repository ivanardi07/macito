<?php
class Mod_usermanagement extends CI_Model
{

    private $table = 'user';

    public function get_daftarAkun()
    {
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('user_level=2');
        $query = $this->db->get();
        return $query->result_array();
        // return $this->db->get('USERNAME');
    }

    public function get_delete($id)
    {
        # code...
        return $this->db->delete($this->table, array("id_user" => $id));
    }

    public function get_byId($id)
    {
        # code...
        return $this->db->get_where($this->table, ["id_user" => $id])->row();
    }
}
