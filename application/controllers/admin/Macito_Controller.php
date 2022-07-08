<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mod_macito');
    }

    public function index()
    {
        # code...
        $data["menu_active"] = "bus_macito";
        $data['macito_index'] = $this->mod_macito->getIndex();
        $this->load->view('macito/macito_index.php');
    }
}
