<?php
class HomeModel extends CI_Model
{

    function HomeModel()
    {
        parent::Model();
    }

    function verifyEmailAddress($verificationcode)
    {
        $sql = "update trn_user set active_status='A' WHERE email_verification_code=?";
        $this->db->query($sql, array($verificationcode));
        return $this->db->affected_rows();
    }

    public function countUserAktif()
    {
        # code...
        // $this->db->select('ID_USER');
        // $this->db->from('USERNAME');
        // $this->db->where('IS_VERIFIED', 1);
        // $hasil = $this->db->count_all_result();
        // return $hasil;

        $this->db->where('is_verified', 1);
        $query = $this->db->get('user');
        echo $query->num_rows();
    }
}
