<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ketua_prodi extends CI_Controller
{
    public function index()
    {

        $this->load->view('v_ketua_prodi');
    }

    public function show_data_ketua_prodi()
    {
        $this->load->model('dosen_model');
        $data = $this->dosen_model->showdataketuaprodi();
        echo json_encode($data);
    }
}
