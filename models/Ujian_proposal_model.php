<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian_proposal_model extends CI_Model
{
    
    public function uploadproposal(){
        
  
        
        $this->db->select('dosen1acc,dosen2acc');
        $this->db->from('Proposal');
        $this->db->where('nim',$this->session->userdata('username'));
        $this->db->where('dosen1acc','Terima');
        $this->db->where('dosen2acc','Terima');
        return $this->db->get()->result();
    }
    
    public function cek_proposal(){
        $this->db->select('ujian_proposal.terima_tolak');
        $this->db->from('ujian_proposal');
        $this->db->join('Proposal','Proposal.nim = ujian_proposal.nim','inner');
        $this->db->where('Proposal.nim',$this->session->userdata('username'));
        $this->db->where('Proposal.dosen1acc','Terima');
        $this->db->where('Proposal.dosen2acc','Terima');
        $this->db->where('ujian_proposal.terima_tolak',"Terima");
        return $this->db->get()->result();
    }
    public function showsiap(){
        $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.dosen1,judul.dosen2');
        $this->db->from('judul');
        $this->db->join('Proposal','Proposal.nim = judul.nim','inner');
        $this->db->join('ujian_proposal','ujian_proposal.nim = Proposal.nim','inner');
        $this->db->where('Proposal.dosen1acc','Terima');
        $this->db->where('Proposal.dosen2acc','Terima');
        $this->db->where('judul.accept','Terima');
        $this->db->where('ujian_proposal.proposal_path IS NOT NULL', NULL, FALSE);
        $this->db->where('ujian_proposal.tanggal_ujian IS NULL',NULL,false);
        $this->db->where('ujian_proposal.terima_tolak','false');
        return $this->db->get()->result();
        
    }
        public function showselesai(){
        $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.dosen1,judul.dosen2');
        $this->db->from('judul');
        $this->db->join('Proposal','Proposal.nim = judul.nim','inner');
        $this->db->join('ujian_proposal','ujian_proposal.nim = Proposal.nim','inner');
        $this->db->where('Proposal.dosen1acc','Terima');
        $this->db->where('Proposal.dosen2acc','Terima');
        $this->db->where('judul.accept','Terima');
        $this->db->where('ujian_proposal.proposal_path IS NOT NULL', NULL, FALSE);
        $this->db->where('ujian_proposal.tanggal_ujian != ',0,FALSE);
        $this->db->where('ujian_proposal.terima_tolak','false');
        return $this->db->get()->result();
        
    }
    
    public function upload_proposal_path($data){
        $this->db->where('nim', $this->session->userdata('username'));
        $this->db->update('ujian_proposal', $data);
    }
    public function insertdatapenguji(){
        
        $this->db->where('nim',$this->input->post('nim'));
        
         $data = array(
            'penguji1' => $this->input->post('penguji1'),
            'penguji2' => $this->input->post('penguji2'),
            'penguji3'  => $this->input->post('penguji3'),
            'tanggal_ujian' => $this->input->post('tanggal')
   
            );
        $this->db->update('ujian_proposal', $data);
        
    }
    
    public function terimatolakcon(){
        $terima = $this->input->post('terima');
        if($terima){
             $data = array(
            'terima_tolak' => 'Terima',
            );
            $this->db->where('nim', $this->input->post('nim'));
            $this->db->update('ujian_proposal',$data);
        }elseif(!$terima){
             $data = array(
            'terima_tolak' => 'Tolak',
            );
            $this->db->where('nim', $this->input->post('nim'));
            $this->db->update('ujian_proposal',$data);
        }
    }
    
    public function showselesaiterima(){
           $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.dosen1,judul.dosen2');
        $this->db->from('judul');
        $this->db->join('Proposal','Proposal.nim = judul.nim','inner');
        $this->db->join('ujian_proposal','ujian_proposal.nim = Proposal.nim','inner');
        $this->db->where('Proposal.dosen1acc','Terima');
        $this->db->where('Proposal.dosen2acc','Terima');
        $this->db->where('judul.accept','Terima');
        $this->db->where('ujian_proposal.proposal_path IS NOT NULL', NULL, FALSE);
        $this->db->where('ujian_proposal.tanggal_ujian != ',0,FALSE);
        $this->db->where('ujian_proposal.terima_tolak','Terima');
        return $this->db->get()->result();
    }
       public function showselesaitolak(){
           $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.dosen1,judul.dosen2');
        $this->db->from('judul');
        $this->db->join('Proposal','Proposal.nim = judul.nim','inner');
        $this->db->join('ujian_proposal','ujian_proposal.nim = Proposal.nim','inner');
        $this->db->where('Proposal.dosen1acc','Terima');
        $this->db->where('Proposal.dosen2acc','Terima');
        $this->db->where('judul.accept','Terima');
        $this->db->where('ujian_proposal.proposal_path IS NOT NULL', NULL, FALSE);
        $this->db->where('ujian_proposal.tanggal_ujian != ',0,FALSE);
        $this->db->where('ujian_proposal.terima_tolak','Tolak');
        return $this->db->get()->result();
    }
}