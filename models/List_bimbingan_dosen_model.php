<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_bimbingan_dosen_model extends CI_Model
{
    
    function Listbimbingan(){
        
      
       // $this->db->select('judul.nim');
       // $this->db->from('judul');
       // $this->db->join('Proposal','Proposal.nim = judul.nim','inner');
       // $cek2 = $this->db->get()->result();
        
        $nik = $this->session->userdata('username');
        
       $this->db->select('nim');
       $this->db->from('ujian_proposal');
       $this->db->where('nim',$nik);
       $cek = $this->db->get()->result();
   if(!$cek){
       
   
        $judul = "(judul.dosen1 = $nik OR judul.dosen2 = $nik) and judul.accept = 'terima'";
         $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.tanggal_eks');
         $this->db->from('judul');
         $this->db->where($judul);
        return $this->db->get()->result();
        
   
           
       }elseif($cek){
                 $nik = $this->session->userdata('username');
                $judul = "(judul.dosen1 = $nik OR judul.dosen2 = $nik) and judul.accept = 'terima'";
                //$show = "Proposal.dosen1acc = '' OR Proposal.dosen2acc = '' and judul.accept = 'terima'";
                $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.tanggal_eks');
                $this->db->from('judul');
                $this->db->join('ujian_proposal','ujian_proposal.nim = judul.nim');
                $this->db->where('ujian_proposal.terima_tolak','False');
                $this->db->where($judul);
   
                    return $this->db->get()->result();
        }
        
   
        
    }
    
      public function addchatimage($nim,$nama,$msg,$date,$url,$type_msg,$bab_proposal,$sender,$reciever)
    {
        
        
          $data = array(
              'nim' => $nim,
            'nama' => $nama,
            'msg'  => $msg,
            'date' => $date,
            'url' => $url,
            'type_msg' => $type_msg,
            'bab_proposal' => $bab_proposal,
            'sender' => $sender,
            'reciever' =>$reciever
            
      
            );
        $this->db->insert('chat_proposal', $data);
    }
    
     public function addchat()
    {
        
        
          $data = array(
              'nim' => $this->session->userdata('username'),
            'nama' => $this->session->userdata('nama'),
            'msg'  => $this->input->post('msg'),
            'date' => date("Y-m-d H:i:s"),
            'url' => '',
            'type_msg' => 'text',
            'bab_proposal' => $this->input->post('bab'),
            'sender' => $this->session->userdata('username'),
            'reciever' => $this->input->post('nim')
            
      
            );
        $this->db->insert('chat_proposal', $data);
    }
    

    
  
     public function showchatdosen(){
        $dosen = $this->session->userdata('username');
        $nim = $this->input->post('nim');
        $juduldosen = "((chat_proposal.sender = $nim AND chat_proposal.reciever = $dosen) OR (chat_proposal.sender = $dosen AND chat_proposal.reciever = $nim))";
        $this->db->distinct();
        $this->db->select('chat_proposal.nama, chat_proposal.msg , chat_proposal.date, chat_proposal.url');
        $this->db->from('chat_proposal');
 
        $this->db->where($juduldosen);

        $this->db->where('chat_proposal.bab_proposal ',$this->input->post('bab'));
        $this->db->order_by('date', 'ASC');
        return $this->db->get()->result();
        
    }
    
    public function cekdosen(){
        $nimm = $this->input->post('nim');
        $this->db->select('nim,nama,dosen1,dosen2');
        $this->db->from('judul');
        $this->db->where('accept','terima');
        $this->db->where('nim', $nimm);
        
        return $this->db->get()->row();
    }
    public function cekproposal(){
        $this->db->select('nim,dosen1,dosen1acc,dosen2,dosen2acc');
        $this->db->from('Proposal');
        $this->db->where('nim',$this->input->post('nim'));
        return $this->db->get()->result();
    }
      public function cekproposalrow(){
        $this->db->select('nim,dosen1,dosen1acc,dosen2,dosen2acc');
        $this->db->from('Proposal');
        $this->db->where('nim',$this->input->post('nim'));
        return $this->db->get()->row();
    }
    public function addselesai($statuss,$data){
        if($statuss == '1'){
            $this->db->insert('Proposal', $data);
        }elseif($statuss == '2'){
            $this->db->where('nim', $this->input->post('nim'));
               $this->db->update('Proposal', $data);
        }

    }
    public function cekujianproposal(){
        $this->db->select('nim');
        $this->db->from('ujian_proposal');
        $this->db->where('nim',$this->input->post('nim'));
        return $this->db->get()->result();
    }
    
    public function insertujianproposal($status2,$data){
        if($status2){
            $this->db->where('nim', $this->input->post('nim'));
               $this->db->update('ujian_proposal', $data);
        }elseif(!$status2){
            $this->db->insert('ujian_proposal', $data);
        }
        
    }
}