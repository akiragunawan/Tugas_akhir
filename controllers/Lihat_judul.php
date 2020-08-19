<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lihat_judul extends CI_Controller
{
    public function index()
    {

        // $this->load->view('v_form_peng_judul');
        //$this->load->model('lihat_');
        // $already = $this->peng_judul_model->cekjudul();
        // if ($this->session->userdata('logged_in')) {
        //     if ($already !== null) {
        //         $data = array('hid' => 'Hidden');
        //         $this->load->view('v_form_peng_judul', $data);
        //     } else {
        //         $data = array('hid' => 'show');
        //         $this->load->view('v_form_peng_judul', $data);
        //     }
        // } else {

        //     redirect('login');
        // }

        $this->load->view('v_lihat_judul');
        //   $html = $this->output->get_output();
        //   $this->load->library('pdf');
        //  $this->pdf->loadHtml($html);
        // $this->pdf->setPaper('A4', 'landscape');
        // $this->pdf->render();
        // $this->pdf->stream("dompdf_out.pdf", array("Attachment" => false));
        //exit(0);
    }
    public function show_judul()
    {
        $this->load->model('judul_model');
        $data = $this->judul_model->showjudul();
        echo json_encode($data);
    }
    public function tolak_judul()
    {
        $this->load->model('judul_model');
        $data = $this->judul_model->tolakjudul();
        echo json_encode($data);
    }

    public function show_judul_tolak()
    {
        $this->load->model('judul_model');
        $data = $this->judul_model->showjudultolak();
        echo json_encode($data);
    }
    public function terima_judul()
    {
        $this->load->model('judul_model');
        $data = $this->judul_model->terimajudul();
        echo json_encode($data);
    }
    public function show_judul_terima()
    {
        $this->load->model('judul_model');
        $data = $this->judul_model->showjudulterima();
        echo json_encode($data);
    }
    public function semua_judul()
    {
        $this->load->model('judul_model');
        $data = $this->judul_model->semuajudul();
        echo json_encode($data);
    }
}
