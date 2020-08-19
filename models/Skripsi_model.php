<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skripsi_model extends CI_Model
{
    
    function Listbimbingan(){
        
      
      //  $this->db->select('judul.nim');
      //  $this->db->from('judul');
      //  $this->db->join('skripsi','skripsi.nim = judul.nim','inner');
      //  $cek2 = $this->db->get()->result();
        
        $nik = $this->session->userdata('username');
        $this->db->select('nim');
        $this->db->from('ujian_skripsi');
        $this->db->where('nim',$nik);
        $cek = $this->db->get()->result();
   
        if(!$cek){
                $judul = "(judul.dosen1 = $nik OR judul.dosen2 = $nik)";
                $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.tanggal_eks');
                $this->db->from('judul');
                 $this->db->where($judul);
                $this->db->where('judul.accept','Terima');
                return $this->db->get()->result();
     //  if($cek2){
          //  $nik = $this->session->userdata('username');
           // $judul = "(judul.dosen1 = $nik OR judul.dosen2 = $nik) and judul.accept = 'Terima'";
           // $where2 = "(skripsi.dosen1acc = '' or skripsi.dosen2acc = '')";
         
            
          //  $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.tanggal_eks');
           // $this->db->from('judul');
           // $this->db->join('skripsi','skripsi.nim = judul.nim','inner');
          //  $this->db->where($where2);
          //  $this->db->where($judul);
     
         //       return $this->db->get()->result();
       }elseif($cek){
                
                $judul = "(judul.dosen1 = $nik OR judul.dosen2 = $nik)";
                $show = "skripsi.dosen1acc = '' OR skripsi.dosen2acc = '' and judul.accept = 'terima'";
                $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.tanggal_eks');
                $this->db->from('judul');
                $this->db->join('ujian_proposal','ujian_proposal.nim = judul.nim','inner');
                $this->db->join('ujian_skripsi','ujian_skripsi.nim = ujian_proposal.nim','inner');
                $this->db->where('ujian_proposal.terima_tolak','Terima');
                $this->db->where('ujian_skripsi.terima_tolak','False');
                $this->db->where($judul);
                $this->db->where('judul.accept','Terima');
   
                    return $this->db->get()->result();
        }
        
   
        
    }
    
    public function showjudulskripsi(){
    $this->db->select('judul.nim,judul.nama,judul.judul');
    $this->db->from('judul');
    $this->db->join('ujian_proposal','ujian_proposal.nim = judul.nim','inner');
    $this->db->join('skripsi','skripsi.nim = ujian_proposal.nim','inner');
    $this->db->join('ujian_skripsi','ujian_skripsi.nim = skripsi.nim','inner');
    $this->db->where('skripsi.dosen1acc','Terima');
    $this->db->where('skripsi.dosen2acc','Terima');
    $this->db->where('judul.accept','Terima');
    $this->db->where('ujian_proposal.terima_tolak','Terima');
    $this->db->where('ujian_skripsi.tanggal_ujian IS NULL',NULL,false);
    return $this->db->get()->result();
        
    }
    
      public function insertdatapenguji(){
        
        $this->db->where('nim',$this->input->post('nim'));
        
         $data = array(
            'penguji1' => $this->input->post('penguji1'),
            'penguji2' => $this->input->post('penguji2'),
            'penguji3'  => $this->input->post('penguji3'),
            'tanggal_ujian' => $this->input->post('tanggal')
   
            );
        $this->db->update('ujian_skripsi', $data);
        
    }
     public function upload_skripsi_path($data){
        $this->db->where('nim', $this->session->userdata('username'));
        $this->db->update('ujian_skripsi', $data);
    }
     public function uploadskripsi(){
        
  
        
        $this->db->select('dosen1acc,dosen2acc');
        $this->db->from('skripsi');
        $this->db->where('nim',$this->session->userdata('username'));
        $this->db->where('dosen1acc','Terima');
        $this->db->where('dosen2acc','Terima');
        return $this->db->get()->result();
    }
    
    public function cek_skripsi(){
        $this->db->select('ujian_skripsi.terima_tolak');
        $this->db->from('ujian_skripsi');
        $this->db->join('skripsi','skripsi.nim = ujian_skripsi.nim','inner');
        $this->db->where('skripsi.nim',$this->session->userdata('username'));
        $this->db->where('skripsi.dosen1acc','Terima');
        $this->db->where('skripsi.dosen2acc','Terima');
        $this->db->where('ujian_skripsi.terima_tolak',"Terima");
        return $this->db->get()->result();
    }
     public function showselesai(){
        $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.dosen1,judul.dosen2');
        $this->db->from('judul');
        $this->db->join('skripsi','skripsi.nim = judul.nim','inner');
        $this->db->join('ujian_skripsi','ujian_skripsi.nim = skripsi.nim','inner');
        $this->db->where('skripsi.dosen1acc','Terima');
        $this->db->where('skripsi.dosen2acc','Terima');
        $this->db->where('judul.accept','Terima');
        $this->db->where('ujian_skripsi.skripsi_path IS NOT NULL', NULL, FALSE);
        $this->db->where('ujian_skripsi.tanggal_ujian != ',0,FALSE);
        $this->db->where('ujian_skripsi.terima_tolak','False');
        return $this->db->get()->result();
        
    }
    
     public function terimatolakcon(){
        $terima = $this->input->post('terima');
        if($terima){
             $data = array(
            'terima_tolak' => 'Terima',
            );
            $this->db->where('nim', $this->input->post('nim'));
            $this->db->update('ujian_skripsi',$data);
        }elseif(!$terima){
             $data = array(
            'terima_tolak' => 'Tolak',
            );
            $this->db->where('nim', $this->input->post('nim'));
            $this->db->update('ujian_skripsi',$data);
        }
    }
     public function showselesaiterima(){
           $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.dosen1,judul.dosen2');
        $this->db->from('judul');
        $this->db->join('skripsi','skripsi.nim = judul.nim','inner');
        $this->db->join('ujian_skripsi','ujian_skripsi.nim = skripsi.nim','inner');
        $this->db->where('skripsi.dosen1acc','Terima');
        $this->db->where('skripsi.dosen2acc','Terima');
        $this->db->where('judul.accept','Terima');
        $this->db->where('ujian_skripsi.skripsi_path IS NOT NULL', NULL, FALSE);
        $this->db->where('ujian_skripsi.tanggal_ujian != ',0,FALSE);
        $this->db->where('ujian_skripsi.terima_tolak','Terima');
        return $this->db->get()->result();
    }
       public function showselesaitolak(){
           $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.dosen1,judul.dosen2');
        $this->db->from('judul');
        $this->db->join('skripsi','skripsi.nim = judul.nim','inner');
        $this->db->join('ujian_skripsi','ujian_skripsi.nim = skripsi.nim','inner');
        $this->db->where('skripsi.dosen1acc','Terima');
        $this->db->where('skripsi.dosen2acc','Terima');
        $this->db->where('judul.accept','Terima');
        $this->db->where('ujian_skripsi.skripsi_path IS NOT NULL', NULL, FALSE);
        $this->db->where('ujian_skripsi.tanggal_ujian != ',0,FALSE);
        $this->db->where('ujian_skripsi.terima_tolak','Tolak');
        return $this->db->get()->result();
    }
    
  
}