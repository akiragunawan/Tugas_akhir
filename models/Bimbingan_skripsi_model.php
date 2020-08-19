<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan_skripsi_model extends CI_Model
{
    
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
            'reciever' => $this->input->post('dospem1')
            
      
            );
        $this->db->insert('chat_proposal', $data);
    }
    
    public function cekdospem(){

        
      $this->db->select('dosen1.nik as dosennik1, dosen1.nama as dosen1nama ,dosen2.nik as dosennik2, dosen2.nama as dosen2nama');
      $this->db->from('judul');
      $this->db->join('dosen as dosen1','dosen1.nik = judul.dosen1','inner');
      $this->db->join('dosen as dosen2','dosen2.nik = judul.dosen2','inner');
      $this->db->where('judul.nim',$this->session->userdata('username'));
      $this->db->where('judul.accept','terima');
      return $this->db->get()->row();
    }
    
    public function showchatmahasiswa(){
        $nim = $this->session->userdata('username');
        $dosen = $this->input->post('dospem');
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
      public function cekskripsi(){
        $this->db->select('nim,dosen1,dosen1acc,dosen2,dosen2acc');
        $this->db->from('skripsi');
        $this->db->where('nim',$this->input->post('nim'));
        return $this->db->get()->result();
    }
 public function cekujianskripsi(){
        $this->db->select('nim');
        $this->db->from('ujian_skripsi');
        $this->db->where('nim',$this->input->post('nim'));
        return $this->db->get()->result();
    }
   
     public function addselesai($statuss,$data){
        if($statuss == '1'){
            $this->db->insert('skripsi', $data);
        }elseif($statuss == '2'){
            $this->db->where('nim', $this->input->post('nim'));
               $this->db->update('skripsi', $data);
        }

    }
      public function insertujianskripsi($status2,$data){
        if($status2){
            $this->db->where('nim', $this->input->post('nim'));
               $this->db->update('ujian_skripsi', $data);
        }elseif(!$status2){
            $this->db->insert('ujian_skripsi', $data);
        }
        
    }
    
   
}
