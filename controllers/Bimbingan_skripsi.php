<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bimbingan_skripsi extends CI_Controller
{
   
    public function index()
    {
        $this->load->model('Bimbingan_skripsi_model');
        $nama_dospem = $this->Bimbingan_skripsi_model->cekdospem();
        $this->load->view('v_bimbingan_skripsi');
    }
     public function add_chat()
    {
        $this->load->model('Bimbingan_skripsi_model');
        $data = $this->Bimbingan_skripsi_model->addchat();
        echo json_encode($data);
    }
    
       public function dos_pem()
    {
        $this->load->model('Bimbingan_skripsi_model');
        $data = $this->Bimbingan_skripsi_model->cekdospem();
        echo json_encode($data);
    }
    public function show_chat_mahasiswa(){
        $this->load->model('Bimbingan_skripsi_model');
        $data = $this->Bimbingan_skripsi_model->showchatmahasiswa();
        echo json_encode($data);
    }
  
    
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
            
            
            
               
           // $data = array('upload_data' => $this->upload->data());
         //   $img = $data['upload_data']['raw_name'];
         //   $data = array(
          //      'name' => $this->input->post('name'),
          //      'email' => $this->input->post('email'),
          //      'mobile' => $this->input->post('mobile'),
           //     'img'=> $img
           //         );


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
            
            $this->load->model('Bimbingan_skripsi_model');
            $data = $this->Bimbingan_skripsi_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab V';
            $sender = $this->session->userdata('username');
            $reciever = $data->dosennik1;
            
      
         
            
          $this->load->model('Bimbingan_skripsi_model');
        $this->Bimbingan_skripsi_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

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
            
            $this->load->model('Bimbingan_skripsi_model');
            $data = $this->Bimbingan_skripsi_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab VI';
            $sender = $this->session->userdata('username');
            $reciever = $data->dosennik1;
            
      
         
            
          $this->load->model('Bimbingan_skripsi_model');
        $this->Bimbingan_skripsi_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

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
            
            $this->load->model('Bimbingan_skripsi_model');
            $data = $this->Bimbingan_skripsi_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab V';
            $sender = $this->session->userdata('username');
            $reciever = $data->dosennik2;
            
      
         
            
          $this->load->model('Bimbingan_skripsi_model');
        $this->Bimbingan_skripsi_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

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
            
            $this->load->model('Bimbingan_skripsi_model');
            $data = $this->Bimbingan_skripsi_model->cekdospem();
      
      
              $nim = $this->session->userdata('username');
            $nama = $this->session->userdata('nama');
            $msg  = '';
            $date = date("Y-m-d H:i:s");
            $url = './upload/image_chat/'.$this->upload->data('file_name');
            $type_msg = 'image';
            $bab_proposal = 'Bab VI';
            $sender = $this->session->userdata('username');
            $reciever = $data->dosennik2;
            
      
         
            
          $this->load->model('Bimbingan_skripsi_model');
        $this->Bimbingan_skripsi_model->addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever);
            
               
 

}// fun


}
