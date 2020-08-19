<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa extends CI_Controller
{
    public function index()
    {
        $this->load->view('v_mahasiswa');
    }

    public function show_data()
    {
        $this->load->model('mahasiswa_model');
        $data = $this->mahasiswa_model->showdata();
        echo json_encode($data);
    }

    public function showps()
    {
        $this->load->model('mahasiswa_model');
        $data = $this->mahasiswa_model->show_ps();
        echo json_encode($data);
    }

    public function showkomp()
    {
        $this->load->model('mahasiswa_model');
        $data = $this->mahasiswa_model->show_komp();
        echo json_encode($data);
    }
    public function showpa()
    {
        $this->load->model('mahasiswa_model');
        $data = $this->mahasiswa_model->show_pa();
        echo json_encode($data);
    }

    public function addmahasiswa()
    {
        $this->load->model('mahasiswa_model');
        $data = $this->mahasiswa_model->add_mahasiswa();
        echo json_encode($data);
    }

    public function updatemahasiswa()
    {
        $this->load->model('mahasiswa_model');
        $data = $this->mahasiswa_model->update_mahasiswa();
        echo json_encode($data);
    }
    public function deletemahasiswa()
    {
        $this->load->model('mahasiswa_model');
        $data = $this->mahasiswa_model->delete_mahasiswa();
        echo json_encode($data);
    }
}
