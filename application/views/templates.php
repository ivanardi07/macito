<?php
//$this->load->view('login');

$this->load->view('layouts/header');

//if(isset($main_content)) { $this->load->view($main_content); }

$this->load->view('layouts/sidebar');
$this->load->view('layouts/blank');
$this->load->view('sptpd/sptpd_insert');
$this->load->view('layouts/footer');
?>