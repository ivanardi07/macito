<?php
class Mod_sptpd extends CI_Model

{
    //private $table = 'USERNAME';
    public function getSPTPD($userid = "")
    {
        $sql = "SELECT 
        S.ID_SPT, S.NOMOR_SPT, PD.NPWPD, S.NAMA_WP, S.ALAMAT_WP, S.PERIODE_AWAL, S.PERIODE_AKHIR, S.JUMLAH_PAJAK, S.TANGGAL_JATUH_TEMPO, S.TANGGAL_JATUH_TEMPO, S.VA_JATIM 
         FROM ESPT_USER EU JOIN ESPT_NPWPD EN ON EU.USER_ID=EN.USER_ID
        JOIN PENDAFTARAN PD ON EN.ID_PENDAFTARAN=PD.ID_PENDAFTARAN
        JOIN SPT S ON S.NPWPD=PD.NPWPD 
        WHERE EU.USER_ID='$userid'
        AND S.TIPE='SA'
        AND USER_LEVEL='1'
        ORDER BY S.PERIODE_AWAL DESC";
        return $this->db->query($sql)->row_array();
    }

    public function getPendaftaran($npwpd)
    {
        if (strpos($npwpd, '.') !== false) {
            //GET NPWPD DENGAN TITIK
            $sql = "SELECT REPLACE(p.NPWPD, '.', '') AS NPWPD_UNDOT, p.*, ju.URAIAN as JENIS_USAHA
                FROM PENDAFTARAN p LEFT JOIN JENIS_USAHA ju 
                ON p.ID_JENIS_USAHA=ju.ID_JENIS_USAHA 
                WHERE NPWPD='$npwpd'
            ";
        } else {
            //GET NPWPD TANPA TITIK
            $sql = "SELECT * 
            FROM 
            (SELECT REPLACE(p.NPWPD, '.', '') AS NPWPD_UNDOT, p.*, ju.URAIAN as JENIS_USAHA
            FROM PENDAFTARAN p LEFT JOIN JENIS_USAHA ju
            ON p.ID_JENIS_USAHA=ju.ID_JENIS_USAHA 
            )
            WHERE NPWPD_UNDOT = '$npwpd'";
        }
        return $this->db->query($sql)->row_array();
    }

    public function generateID_ESPT_NPWPD()
    {
        $sql = "SELECT max(ID_JOIN) FROM ESPT_NPWPD";
        return $this->db->query($sql)->row_array()['MAX'] + 1;
    }

    public function add_espt_npwpd($npwpd, $user_id)
    {
        $id_join = $this->generateID_ESPT_NPWPD();
        $id_pendaftaran = $this->getPendaftaran($npwpd)["ID_PENDAFTARAN"];
        $sql = "INSERT INTO ESPT_NPWPD (ID_JOIN, USER_ID, ID_PENDAFTARAN) VALUES ($id_join, $user_id, $id_pendaftaran)";
        return $this->db->query($sql);
    }
}
