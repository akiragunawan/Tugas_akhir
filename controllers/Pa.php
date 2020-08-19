<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pa extends CI_Controller
{
    public function index()
    {

        $this->load->view('v_pa');
    }

    public function show_data_pa()
    {
        $this->load->model('dosen_model');
        $data = $this->dosen_model->showdatapa();
        echo json_encode($data);
    }
}
