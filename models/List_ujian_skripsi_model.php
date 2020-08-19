<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_ujian_skripsi_model extends CI_Model
{
    
    public function listujian(){
        $nik = $this->session->userdata('username');
        $where = "(ujian_skripsi.penguji1 = $nik or ujian_skripsi.penguji2 = $nik or ujian_skripsi.penguji3 = $nik) and ujian_skripsi.terima_tolak = 'false'";
        
        $this->db->select('judul.id,judul.nim,judul.nama,judul.judul,judul.dosen1,judul.dosen2,ujian_skripsi.tanggal_ujian,ujian_skripsi.skripsi_path');
        $this->db->from('judul');
        $this->db->join('skripsi','skripsi.nim = judul.nim','inner');
        $this->db->join('ujian_skripsi','ujian_skripsi.nim = skripsi.nim','inner');
        $this->db->where('skripsi.dosen1acc','Terima');
        $this->db->where('skripsi.dosen2acc','Terima');
        $this->db->where('judul.accept','Terima');
        $this->db->where('ujian_skripsi.skripsi_path IS NOT NULL', NULL, FALSE);
        $this->db->where('ujian_skripsi.tanggal_ujian IS NOT NULL',NULL,false);
        $this->db->where($where);
        $this->db->order_by('judul.tanggal', 'DESC');
        return $this->db->get()->result();
    }

}