<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lihat_bimbingan_skripsi_dosen extends CI_Controller
{
function index(){
    $this->load->view('v_lihat_bimbingan_skripsi_dosen');
}

   function List_bimbingan(){
        
         $this->load->model('Skripsi_model');
        $data = $this->Skripsi_model->Listbimbingan();
        echo json_encode($data);
        
    }
    
    public function List_bimbingan_skripsi_dosen_chat(){
        $this->load->view('v_chat_bimbingan_skripsi_dosen');
        $nim = $this->uri->segment(2);
        echo $nim;
    }
    
 public function add_selesai(){
          $this->load->model('Bimbingan_skripsi_model');
          $nimm = $this->input->post('nim');
         $cek = $this->Bimbingan_skripsi_model->cekdosen(); //table judul
         $cek_skripsi = $this->Bimbingan_skripsi_model->cekujianskripsi();
         
      
             if($cek->dosen1 == $this->session->userdata('username')){
            if(!$this->Bimbingan_skripsi_model->cekskripsi()){
                     
                     $statuss = '1';
                      $data = array(
                         'nim' => $this->input->post('nim'),
                         'nama' => $this->input->post('nama'),
                         'dosen1'  => $this->session->userdata('username'),
                         'dosen1acc' => 'Terima',
                         'tanggal_masuk_d1' => date("Y-m-d"),
                         'dosen2' => '',
                         'dosen2acc' => '',
                         'tanggal_masuk_d2' => ''
                         
            
      
                    );
                        /////////////////////////////////////////////////////////////////////
                  if($cek_skripsi){
                      $status2 = true;
                       $data2 = array(
                
                     
                         'dosen1'  => $this->session->userdata('nama'),
                         'terima_tolak' => "False"
        
                            );
                            $this->Bimbingan_skripsi_model->insertujianskripsi($status2,$data2);
                        
                  }elseif(!$cek_skripsi){
                       $status2 = false;
                       $data2 = array(
                
                         'nim' => $this->input->post('nim'),
                         'nama' => $this->input->post('nama'),
                         'dosen1'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->Bimbingan_skripsi_model->insertujianskripsi($status2,$data2);
                        
                  }
                  ////////////////////////////////////////////////////////////////////
                 }elseif($this->Bimbingan_skripsi_model->cekskripsi()){
                      $statuss = '2';
                      $data = array(
                         
                        'nim' => $this->input->post('nim'),
                         'dosen1'  => $this->session->userdata('username'),
                         'dosen1acc' => 'Terima',
                         'tanggal_masuk_d1' => date("Y-m-d"),
                     
                    
            
      
                    );
                        /////////////////////////////////////////////////////////////////////
                  if($cek_skripsi){
                      $status2 = true;
                       $data2 = array(
                
                     
                         'dosen1'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->Bimbingan_skripsi_model->insertujianskripsi($status2,$data2);
                        
                  }elseif(!$cek_skripsi){
                       $status2 = false;
                       $data2 = array(
                
                         'nim' => $this->input->post('nim'),
                         'nama' => $this->input->post('nama'),
                         'dosen1'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->Bimbingan_skripsi_model->insertujianskripsi($status2,$data2);
                        
                  }
                  ////////////////////////////////////////////////////////////////////
                 }
                
                    $this->Bimbingan_skripsi_model->addselesai($statuss,$data);
                    $data = 'Bimbingan Selesai';
                    echo json_encode($data);
                    
                    //dosen2
             }elseif($cek->dosen2 == $this->session->userdata('username')){
            if(!$this->Bimbingan_skripsi_model->cekskripsi()){
                     
                     $statuss = '1';
                      $data = array(
                         'nim' => $this->input->post('nim'),
                         'nama' => $this->input->post('nama'),
                         'dosen1'  => '',
                         'dosen1acc' => '',
                         'tanggal_masuk_d1' => '',
                         'dosen2' => $this->session->userdata('username'),
                         'dosen2acc' => 'Terima',
                         'tanggal_masuk_d2' => date("Y-m-d"),
                        
            
      
                    );
                        /////////////////////////////////////////////////////////////////////
                  if($cek_skripsi){
                      $status2 = true;
                       $data2 = array(
                
                     
                         'dosen2'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->Bimbingan_skripsi_model->insertujianskripsi($status2,$data2);
                        
                  }elseif(!$cek_skripsi){
                       $status2 = false;
                       $data2 = array(
                
                         'nim' => $this->input->post('nim'),
                         'nama' => $this->input->post('nama'),
                         'dosen2'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->Bimbingan_skripsi_model->insertujianskripsi($status2,$data2);
                        
                  }
                  ////////////////////////////////////////////////////////////////////
                 }elseif($this->Bimbingan_skripsi_model->cekskripsi()){
                      $statuss = '2';
                      $data = array(
                         
                        'nim' => $this->input->post('nim'),
                         'dosen2'  => $this->session->userdata('username'),
                         'dosen2acc' => 'Terima',
                         'tanggal_masuk_d2' => date("Y-m-d")
                         
                        
                    
            
      
                    );
                     /////////////////////////////////////////////////////////////////////
                  if($cek_skripsi){
                      $status2 = true;
                       $data2 = array(
                
                     
                         'dosen2'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->Bimbingan_skripsi_model->insertujianskripsi($status2,$data2);
                        
                  }elseif(!$cek_skripsi){
                       $status2 = false;
                       $data2 = array(
                
                         'nim' => $this->input->post('nim'),
                         'nama' => $this->input->post('nama'),
                         'dosen2'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->Bimbingan_skripsi_model->insertujianskripsi($status2,$data2);
                        
                  }
                  ////////////////////////////////////////////////////////////////////
                     
                 }
                    $this->Bimbingan_skripsi_model->addselesai($statuss,$data);
                    echo json_encode($data);
             }
     
          
       // $this->load->model('Bimbingan_skripsi_model');
       // $data = $this->Bimbingan_skripsi_model->addselesai();
       // echo json_encode($data);
    }
  
  

}