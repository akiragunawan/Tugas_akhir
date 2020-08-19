<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dosen extends CI_Controller
{
    public function index()
    {

        $this->load->view('v_dosen');
    }

    public function show_data()
    {
        $this->load->model('dosen_model');
        $data = $this->dosen_model->showdata();
        echo json_encode($data);
    }

    public function showkons()
    {
        $this->load->model('dosen_model');
        $data = $this->dosen_model->show_kons();
        echo json_encode($data);
    }


    public function adddosen()
    {
        $this->load->model('dosen_model');
        $data = $this->dosen_model->add_dosen();
        echo json_encode($data);
    }

    public function updatedosen()
    {
        $this->load->model('dosen_model');
        $data = $this->dosen_model->update_dosen();
        echo json_encode($data);
    }
    public function deletedosen()
    {
        $this->load->model('dosen_model');
        $data = $this->dosen_model->delete_dosen();
        echo json_encode($data);
    }
    public function show_data_where(){
        $this->load->model('dosen_model');
        $data = $this->dosen_model->showdatawhere();
        echo json_encode($data);
    }
  
}
