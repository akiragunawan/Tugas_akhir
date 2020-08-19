<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lihat_skripsi extends CI_Controller
{
    function index(){
        
         $this->load->model('Skripsi_model');
        $cek = $this->Skripsi_model->uploadskripsi();
        $cek_skripsi = $this->Skripsi_model->cek_skripsi();
        
        if($cek){
           
                 if($cek_skripsi){
                $data['ada'] = true;
                $data['gada'] = false;
                $this->load->view('v_lihat_skripsi',$data); 
            }else{
            
            
            $data['ada'] = false;
            $data['gada'] = false;
            $this->load->view('v_lihat_skripsi',$data); 
            }
        }elseif(!$cek){
              $data['ada'] = true;
              $data['gada'] = true;
           $this->load->view('v_lihat_skripsi',$data); 
        }
       
        
    }
    
     public function upload_skripsi(){
        $path = $this->session->userdata('username');
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = "./upload/proposal/$path/";
        $config['file_name'] = 'skripsi';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('b_upload_proposal')) {
            $dns_path = "./upload/proposal/$path" . $this->upload->data('file_name');
            echo "berhasil";
            
              $this->load->model('Skripsi_model');

         $data = array(
            'skripsi_path' => "./upload/proposal/$path/".$this->upload->data('file_name')
    
            );
              $this->Skripsi_model->upload_skripsi_path($data);
        } else {
            print_r($this->upload->display_errors());
        }
        
    }
     public function show_judul_skripsi()
    {
        $this->load->model('Skripsi_model');
        $data = $this->Skripsi_model->showjudulskripsi();
        echo json_encode($data);
    }
    
      public function insert_data_penguji(){
        
        $this->load->model('Skripsi_model');
        $data = $this->Skripsi_model->insertdatapenguji();
        echo json_encode($data);
    }
        public function show_selesai(){
        $this->load->model('Skripsi_model');
        $data = $this->Skripsi_model->showselesai();
        echo json_encode($data);
        
        
    }
    
      public function terima_tolak_con(){
         $this->load->model('Skripsi_model');
        $data = $this->Skripsi_model->terimatolakcon();
        echo json_encode($data);
    }
    
     public function show_selesai_terima(){
         $this->load->model('Skripsi_model');
        $data = $this->Skripsi_model->showselesaiterima();
        echo json_encode($data);
    }
      public function show_selesai_tolak(){
         $this->load->model('Skripsi_model');
        $data = $this->Skripsi_model->showselesaitolak();
        echo json_encode($data);
    }
}