<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mainmenu extends CI_Controller
{




    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('v_mainmenu');
        } else {
            redirect('login');
        }
    }
}
