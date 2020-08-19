<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_ujian_proposal_model extends CI_Model
{
    
    public function listujian(){
        $nik = $this->session->userdata('username');
        $where = "(ujian_proposal.penguji1 = $nik or ujian_proposal.penguji2 = $nik or ujian_proposal.penguji3 = $nik) and ujian_proposal.terima_tolak = 'false'";
        
        $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.dosen1,judul.dosen2,ujian_proposal.tanggal_ujian,ujian_proposal.proposal_path');
        $this->db->from('judul');
        $this->db->join('Proposal','Proposal.nim = judul.nim','inner');
        $this->db->join('ujian_proposal','ujian_proposal.nim = Proposal.nim','inner');
        $this->db->where('Proposal.dosen1acc','Terima');
        $this->db->where('Proposal.dosen2acc','Terima');
        $this->db->where('judul.accept','Terima');
        $this->db->where('ujian_proposal.proposal_path IS NOT NULL', NULL, FALSE);
        $this->db->where('ujian_proposal.tanggal_ujian IS NOT NULL',NULL,false);
        $this->db->where($where);
        $this->db->order_by('judul.tanggal', 'DESC');
        return $this->db->get()->result();
    }

}