<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian_proposal extends CI_Controller
{
    public function index()
    {
        $this->load->model('Ujian_proposal_model');
        $cek = $this->Ujian_proposal_model->uploadproposal();
        $cek_proposal = $this->Ujian_proposal_model->cek_proposal();
        
        if($cek){
           
                 if($cek_proposal){
                $data['ada'] = true;
                $data['gada'] = false;
                $this->load->view('v_ujian_proposal',$data); 
            }else{
            
            
            $data['ada'] = false;
            $data['gada'] = false;
            $this->load->view('v_ujian_proposal',$data); 
            }
        }elseif(!$cek){
              $data['ada'] = true;
              $data['gada'] = true;
            $this->load->view('v_ujian_proposal',$data); 
        }
       
    
    }
    
    public function upload_proposal(){
        $path = $this->session->userdata('username');
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = "./upload/proposal/$path/";
        $config['file_name'] = 'jadi';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('b_upload_proposal')) {
            $dns_path = "./upload/proposal/$path" . $this->upload->data('file_name');
            
           
            
              $this->load->model('Ujian_proposal_model');

         $data = array(
            'proposal_path' => "./upload/proposal/$path/".$this->upload->data('file_name')
    
            );
              $this->Ujian_proposal_model->upload_proposal_path($data);
              echo json_encode($data);
        } else {
            print_r($this->upload->display_errors());
            
        }
        
    }
   
    
    
    public function show_siap(){
        $this->load->model('Ujian_proposal_model');
        $data = $this->Ujian_proposal_model->showsiap();
        echo json_encode($data);
        
        
    }   
    public function show_selesai(){
        $this->load->model('Ujian_proposal_model');
        $data = $this->Ujian_proposal_model->showselesai();
        echo json_encode($data);
        
        
    }
    
    public function insert_data_penguji(){
        
        $this->load->model('Ujian_proposal_model');
        $data = $this->Ujian_proposal_model->insertdatapenguji();
        echo json_encode($data);
    }
    
    public function terima_tolak_con(){
         $this->load->model('Ujian_proposal_model');
        $data = $this->Ujian_proposal_model->terimatolakcon();
        echo json_encode($data);
    }
     public function show_selesai_terima(){
         $this->load->model('Ujian_proposal_model');
        $data = $this->Ujian_proposal_model->showselesaiterima();
        echo json_encode($data);
    }
      public function show_selesai_tolak(){
         $this->load->model('Ujian_proposal_model');
        $data = $this->Ujian_proposal_model->showselesaitolak();
        echo json_encode($data);
    }
}