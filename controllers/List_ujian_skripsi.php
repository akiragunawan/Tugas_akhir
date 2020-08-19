<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_ujian_skripsi extends CI_Controller
{
    function index(){
        $this->load->view('v_list_ujian_skripsi(dosen)');
    }
    
    
    function list_ujian(){
        $this->load->model('List_ujian_skripsi_model');
        $data = $this->List_ujian_skripsi_model->listujian();
        echo json_encode($data);
    }
}