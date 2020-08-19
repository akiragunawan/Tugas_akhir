<?php
defined('BASEPATH') or exit('No direct script access allowed');

class form_peng_judul extends CI_Controller
{
    public function index()
    {

        // $this->load->view('v_form_peng_judul');
        $this->load->model('judul_model');
        $already = $this->judul_model->cekjudul();
    if(!$already){
             $data = array('hid' => '1');
            $this->load->view('v_form_peng_judul', $data);
            var_dump($data);
    }elseif($already->nim == $this->session->userdata('username') and $already->accept == "false"){
            $data = array('hid' => '2');
            $this->load->view('v_form_peng_judul', $data);
            var_dump($data);
        
        
       }elseif($already->nim == $this->session->userdata('username') and $already->accept == "terima"){
            $data = array('hid' => '4');
            $this->load->view('v_form_peng_judul', $data);
            var_dump($data);
       }elseif($already->nim == $this->session->userdata('username') and $already->accept == "tolak"){
            $data = array('hid' => '3');
            $this->load->view('v_form_peng_judul', $data);
            var_dump($data);
        }
        
        
        
        
    //   $cektolak = $this->judul_model->cektolak();   
    //  $cektolakfalse = $this->judul_model->cektolakfalse();
    //   $cektolakterima = $this->judul_model->cektolakterima();
    //   if ($this->session->userdata('logged_in')) {
    //       if ($already == null) {
    //           $data = array('hid' => '1');
    //           $this->load->view('v_form_peng_judul', $data);
    //       } elseif ($already->nim == $this->session->userdata('username') and $already->accept == 'false') {
    //           $data = array('hid' => '2');
    //           $this->load->view('v_form_peng_judul', $data);
    //       } elseif ($already->nim == $this->session->userdata('username') and $already->accept == 'tolak') {
    //           if ($cektolak !== null) {
    //               if ($cektolakfalse !== null) {
    //                   $data = array('hid' => '2');
    //                   $this->load->view('v_form_peng_judul', $data);
    //               } elseif ($cektolakterima !== null) {
    //                   $data = array('hid' => '4');
    //                   $this->load->view('v_form_peng_judul', $data);
    //               } elseif ($cektolak !== null) {
    //                   $data = array('hid' => '3');
    //                   $this->load->view('v_form_peng_judul', $data);
    //               }
   //           }
    //       } elseif ($already->nim == $this->session->userdata('username') and $already->accept = 'terima') {
    //           $data = array('hid' => '4');
    //           $this->load->view('v_form_peng_judul', $data);
    //       } else {
    //           redirect('login');
    //       }
    //   }
    }

    public function tambah_judul()
    {
        $nim = $this->session->userdata('username');
        $nama = $this->session->userdata('nama');
        $ps = $this->input->post('program_studi_pengajuan');
        $ks = $this->input->post('konsentrasii_pengajuan');
        $hp = $this->input->post('no_hp');
        $sks = $this->input->post('jmlh_sks');
        $ipk = $this->input->post('ipk');
        $judul = $this->input->post('judul');
        $accept = 'false';
        $dosen1 = $this->input->post('dosen_pemb');
        $dosen2 = 'none';





        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './upload/dns';
        $config['file_name'] = $this->session->userdata('username');
        $config['overwrite'] = false;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('dns_upload')) {
            $dns_path = './upload/dns/' . $this->upload->data('file_name');
        } else {
            print_r($this->upload->display_errors());
        }

        $config2['allowed_types'] = 'pdf';
        $config2['upload_path'] = './upload/laporan';
        $config2['file_name'] = $this->session->userdata('username');
        $config2['overwrite'] = false;
        $this->upload->initialize($config2);
        $this->load->library('upload', $config2);
        if ($this->upload->do_upload('laporan_upload')) {
            $laporan_path = './upload/laporan/' . $this->upload->data('file_name');
        } else {
            print_r($this->upload->display_errors());
        }

        $this->load->model('judul_model');
        $this->judul_model->tambahjudul($nim, $nama, $ps, $ks, $hp, $sks, $ipk, $judul, $dns_path, $laporan_path, $accept, $dosen1, $dosen2);
    }
}
