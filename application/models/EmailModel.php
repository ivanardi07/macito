<?php
class EmailModel extends CI_Model
{

   function sendVerificatinEmail($emailTujuan, $verificationText)
   {
      $this->load->library('email');
      $config = array(
         'protocol'  => 'smtp',
         'smtp_host' => 'mail.fastudios.id',
         'smtp_port' => 587,
         'smtp_user' => 'macito@fastudios.id', // change it to yours
         'smtp_pass' => 'macito123', // change it to yours
         'mailtype'  => 'html',
         'charset'   => 'utf-8',
         'wordwrap'  => TRUE,
         'newline'   => "\r\n"
      );

      $this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from($config['smtp_user'], "Malang City Tour");
      $this->email->to($emailTujuan);
      $this->email->subject("Pendaftaran Akun Macito");
      $this->email->message("Kepada Calon Penumpang Yang Terhormat,\ndimohon untuk mengklik link url dibawah ini untuk memverifikasi alamat Email anda<br><br> " . base_url('Register_Controller/verify/') . $verificationText . "\n" . "<br><br>Terimakasih\nTeam Admin Dishub Kota Malang");
      if ($this->email->send()) {
         return true;
      } else {
         return false;
      }
   }
}
