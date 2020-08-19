<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_bimbingan_dosen extends CI_Controller
{
    public function index()
    {


        $this->load->view('v_lihat_bimbingan_dosen');
    
    }
    
    function List_bimbingan(){
        
         $this->load->model('List_bimbingan_dosen_model');
        $data = $this->List_bimbingan_dosen_model->Listbimbingan();
        echo json_encode($data);
        
    }
    
    function List_bimbingan_dosen_chat(){
        $this->load->view('v_chat_bimbingan_dosen');
        $nim = $this->uri->segment(2);
        echo $nim;
    }
    
     public function add_chat()
    {
        $this->load->model('List_bimbingan_dosen_model');
        $data = $this->List_bimbingan_dosen_model->addchat();
        echo json_encode($data);
    }
    
       public function dos_pem()
    {
        $this->load->model('Bimbingan_proposal_model');
        $data = $this->Bimbingan_proposal_model->cekdospem();
        echo json_encode($data);
    }
    public function show_chat_dosen(){
        $this->load->model('List_bimbingan_dosen_model');
        $data = $this->List_bimbingan_dosen_model->showchatdosen();
        echo json_encode($data);
    }
    
    
      public function add_selesai(){
          $this->load->model('List_bimbingan_dosen_model');
          $nimm = $this->input->post('nim');
         $cek = $this->List_bimbingan_dosen_model->cekdosen(); //table judul
         $cek_proposal = $this->List_bimbingan_dosen_model->cekujianproposal();
         
      
             if($cek->dosen1 == $this->session->userdata('username')){
                     if(!$this->List_bimbingan_dosen_model->cekproposal()){
                     
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
                                              if($cek_proposal){
                                                  $status2 = true;
                                                      $data2 = array(
                
                     
                                                         'dosen1'  => $this->session->userdata('nama'),
                                                         'terima_tolak' => "False"
        
                                                         );
                                                $this->List_bimbingan_dosen_model->insertujianproposal($status2,$data2);
                        
                                                 }elseif(!$cek_proposal){
                                                    $status2 = false;
                                                          $data2 = array(
                
                                                             'nim' => $this->input->post('nim'),
                                                             'nama' => $this->input->post('nama'),
                                                             'dosen1'  => $this->session->userdata('username'),
                                                             'terima_tolak' => "False"
        
                                                         );
                                                $this->List_bimbingan_dosen_model->insertujianproposal($status2,$data2);
                        
                  }
                        ////////////////////////////////////////////////////////////////////
                     }elseif($this->List_bimbingan_dosen_model->cekproposal()){
                      $statuss = '2';
                      $data = array(
                         
                        'nim' => $this->input->post('nim'),
                         'dosen1'  => $this->session->userdata('username'),
                         'dosen1acc' => 'Terima',
                         'tanggal_masuk_d1' => date("Y-m-d")
                         
                    
            
      
                    );
                                                     /////////////////////////////////////////////////////////////////////
                                                 if($cek_proposal){
                                                     $status2 = true;
                                                      $data2 = array(
                
                     
                                                         'dosen1'  => $this->session->userdata('username'),
                                                         'terima_tolak' => "False"
        
                                                         );
                                                         $this->List_bimbingan_dosen_model->insertujianproposal($status2,$data2);
                        
                                                 }elseif(!$cek_proposal){
                                                     $status2 = false;
                                                    $data2 = array(
                
                                                        'nim' => $this->input->post('nim'),
                                                         'nama' => $this->input->post('nama'),
                                                         'dosen1'  => $this->session->userdata('username'),
                                                         'terima_tolak' => "False"
        
                                                          );
                                                          $this->List_bimbingan_dosen_model->insertujianproposal($status2,$data2);
                        
                                                }
                  ////////////////////////////////////////////////////////////////////
                 }
                
                    $this->List_bimbingan_dosen_model->addselesai($statuss,$data);
                    $data = 'Bimbingan Selesai';
                    echo json_encode($data);
                    
                    
             }elseif($cek->dosen2 == $this->session->userdata('username')){
            if(!$this->List_bimbingan_dosen_model->cekproposal()){
                     
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
                  if($cek_proposal){
                      $status2 = true;
                       $data2 = array(
                
                     
                         'dosen2'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->List_bimbingan_dosen_model->insertujianproposal($status2,$data2);
                        
                  }elseif(!$cek_proposal){
                       $status2 = false;
                       $data2 = array(
                
                         'nim' => $this->input->post('nim'),
                         'nama' => $this->input->post('nama'),
                         'dosen2'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->List_bimbingan_dosen_model->insertujianproposal($status2,$data2);
                        
                  }
                  ////////////////////////////////////////////////////////////////////
                 }elseif($this->List_bimbingan_dosen_model->cekproposal()){
                      $statuss = '2';
                      $data = array(
                         
                        'nim' => $this->input->post('nim'),
                         'dosen2'  => $this->session->userdata('username'),
                         'dosen2acc' => 'Terima',
                         'tanggal_masuk_d2' => date("Y-m-d")
                         
                    
            
      
                    );
                     /////////////////////////////////////////////////////////////////////
                  if($cek_proposal){
                      $status2 = true;
                       $data2 = array(
                
                     
                         'dosen2'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->List_bimbingan_dosen_model->insertujianproposal($status2,$data2);
                        
                  }elseif(!$cek_proposal){
                       $status2 = false;
                       $data2 = array(
                
                         'nim' => $this->input->post('nim'),
                         'nama' => $this->input->post('nama'),
                         'dosen2'  => $this->session->userdata('username'),
                         'terima_tolak' => "False"
        
                            );
                            $this->List_bimbingan_dosen_model->insertujianproposal($status2,$data2);
                        
                  }
                  ////////////////////////////////////////////////////////////////////
                     
                 }
                    $this->List_bimbingan_dosen_model->addselesai($statuss,$data);
                    echo json_encode($data);
             }
     
          
       // $this->load->model('List_bimbingan_dosen_model');
       // $data = $this->List_bimbingan_dosen_model->addselesai();
       // echo json_encode($data);
    }
  
  
    
    public function f_upload_b1()
        {
            
               if (!is_dir('./upload/proposal/'.$this->session->userdata('username')))
            {
                 mkdir('./upload/proposal/'.$this->session->userdata('username'), 0777, true);
              
                 
            }
            $config['upload_path']          = './upload/proposal/'.$this->session->userdata('username').'/'; // create folder in site root uploads
            $config['allowed_types']        = 'pdf';
            $config['overwrite'] = true;
            $config['file_name'] = 'Bab_I';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/proposal/'.$this->session->userdata('username');'/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            
            
               
    


}// fun

  public function f_upload_b2()
        {
            
               if (!is_dir('./upload/proposal/'.$this->session->userdata('username')))
            {
                 mkdir('./upload/proposal/'.$this->session->userdata('username'), 0777, true);
              
                 
            }
            $config['upload_path']          = './upload/proposal/'.$this->session->userdata('username').'/'; // create folder in site root uploads
            $config['allowed_types']        = 'pdf';
            $config['overwrite'] = true;
            $config['file_name'] = 'Bab_II';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/proposal/'.$this->session->userdata('username');'/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            
            
               
           // $data = array('upload_data' => $this->upload->data());
         //   $img = $data['upload_data']['raw_name'];
         //   $data = array(
          //      'name' => $this->input->post('name'),
          //      'email' => $this->input->post('email'),
          //      'mobile' => $this->input->post('mobile'),
           //     'img'=> $img
           //         );


}// fun

  public function f_upload_b3()
        {
            
               if (!is_dir('./upload/proposal/'.$this->session->userdata('username')))
            {
                 mkdir('./upload/proposal/'.$this->session->userdata('username'), 0777, true);
              
                 
            }
            $config['upload_path']          = './upload/proposal/'.$this->session->userdata('username').'/'; // create folder in site root uploads
            $config['allowed_types']        = 'pdf';
            $config['overwrite'] = true;
            $config['file_name'] = 'Bab_III';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/proposal/'.$this->session->userdata('username');'/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            
            
               

}// fun
  public function f_upload_b4()
        {
            
               if (!is_dir('./upload/proposal/'.$this->session->userdata('username')))
            {
                 mkdir('./upload/proposal/'.$this->session->userdata('username'), 0777, true);
              
                 
            }
            $config['upload_path']          = './upload/proposal/'.$this->session->userdata('username').'/'; // create folder in site root uploads
            $config['allowed_types']        = 'pdf';
            $config['overwrite'] = true;
            $config['file_name'] = 'Bab_IV';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/proposal/'.$this->session->userdata('username');'/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            
            
               

}// fun
  public function f_upload_b5()
        {
            
               if (!is_dir('./upload/proposal/'.$this->session->userdata('username')))
            {
                 mkdir('./upload/proposal/'.$this->session->userdata('username'), 0777, true);
              
                 
            }
            $config['upload_path']          = './upload/proposal/'.$this->session->userdata('username').'/'; // create folder in site root uploads
            $config['allowed_types']        = 'pdf';
            $config['overwrite'] = true;
            $config['file_name'] = 'Bab_V';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/proposal/'.$this->session->userdata('username');'/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            
            
               

}// fun
  public function f_upload_b6()
        {
            
               if (!is_dir('./upload/proposal/'.$this->session->userdata('username')))
            {
                 mkdir('./upload/proposal/'.$this->session->userdata('username'), 0777, true);
              
                 
            }
            $config['upload_path']          = './upload/proposal/'.$this->session->userdata('username').'/'; // create folder in site root uploads
            $config['allowed_types']        = 'pdf';
            $config['overwrite'] = true;
            $config['file_name'] = 'Bab_VI';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/proposal/'.$this->session->userdata('username');'/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            
            
               

}// fun




  public function f_upload_d1_b1_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                       // echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            

      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab I';
            $sender = $this->session->userdata('username');
            $reciever = $this->uri->segment(3);
            
      
         
            
          $this->load->model('List_bimbingan_dosen_model');
        $this->List_bimbingan_dosen_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun
 public function f_upload_d1_b2_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab II';
            $sender = $this->session->userdata('username');
            $reciever = $this->uri->segment(3);
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun

 public function f_upload_d1_b3_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab III';
            $sender = $this->session->userdata('username');
            $reciever = $this->uri->segment(3);
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun
 public function f_upload_d1_b4_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab IV';
            $sender = $this->session->userdata('username');
            $reciever = $this->uri->segment(3);
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun

 public function f_upload_d1_b5_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab V';
            $sender = $this->session->userdata('username');
            $reciever = $this->uri->segment(3);
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun
 public function f_upload_d1_b6_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab VI';
            $sender = $this->session->userdata('username');
            $reciever = $this->uri->segment(3);
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun



  public function f_upload_d2_b1_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab I';
            $sender = $this->session->userdata('username');
            $reciever = $data->dosennik2;
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun
 public function f_upload_d2_b2_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab II';
            $sender = $this->session->userdata('username');
            $reciever = $data->dosennik2;
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun

 public function f_upload_d2_b3_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab III';
            $sender = $this->session->userdata('username');
            $reciever = $data->dosennik2;
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun

 public function f_upload_d2_b4_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab IV';
            $sender = $this->session->userdata('username');
            $reciever = $data->dosennik1;
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun

 public function f_upload_d2_b5_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab V';
            $sender = $this->session->userdata('username');
            $reciever = $data->dosennik2;
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun

 public function f_upload_d2_b6_image()
        {
            
       
            $config['upload_path']          = './upload/image_chat/'; // create folder in site root uploads
            $config['allowed_types']        = 'gif|jpg|png';
            $config['overwrite'] = false;
            $config['file_name'] = 'image';
            $this->load->library('upload', $config);
            
            
         
            
            
             if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : upload/image_chat/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo './upload/image_chat/'.$this->upload->data('file_name');
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
            
            $this->load->model('Bimbingan_proposal_model');
            $data = $this->Bimbingan_proposal_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab VI';
            $sender = $this->session->userdata('username');
            $reciever = $data->dosennik1;
            
      
         
            
          $this->load->model('Bimbingan_proposal_model');
        $this->Bimbingan_proposal_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun
  
  
}
