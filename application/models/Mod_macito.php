<?php
class Mod_macito extends CI_Model
{
    private $table = 'macito';

    public function getIndex()
    {
        # code...
        $this->db->select("*");
        $this->db->from('macito');

        $query = $this->db->get();
        return $query->result();
    }

    public function getTambah()
    {
        # code...
        $data = array(
            'deskripsi' => $this->input->post('txt_deskripsi'),
            'kuota'     => $this->input->post('txt_kuota'),
            'jam_operasional' => $this->input->post('txt_jam'),
            'date_created'  => date('Y-m-d')

        );
        return $this->db->insert('macito', $data);
    }
}
