<?php
defined('BASEPATH') or exit('No direct script access allowed');

class judul_model extends CI_Model
{




    public function tambahjudul($nim, $nama, $ps, $ks, $hp, $sks, $ipk, $judul, $dns_path, $laporan_path, $accept, $dosen1, $dosen2)
    {

        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'ps'  => $ps,
            'konsentrasi' => $ks,
            'hp' => $hp,
            'sks'  => $sks,
            'ipk' => $ipk,
            'judul' =>  $judul,
            'dns_path' =>  $dns_path,
            'laporan_path' =>  $laporan_path,
            'tanggal' => date("Y-m-d"),
            'accept' => $accept,
            'dosen1' => $dosen1,
            'dosen2' => $dosen2,
            'tanggal_eks' => date("Y-m-d")

        );

        $this->db->insert('judul', $data);
        redirect('form_peng_judul');
    }

    public function cekjudul()
    {
        $this->db->select('nim,accept');
        $this->db->from('judul');
        $this->db->where('nim', $this->session->userdata('username'));
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->row();
    }
    public function cekjudulTT()
    {
        $this->db->select('accept');
        $this->db->from('judul');
        $this->db->where('nim', $this->session->userdata('username'));
        return $this->db->get()->row();
    }

    public function cektolak()
    {
        $this->db->select('*');
        $this->db->from('judul');
        $this->db->where('nim', $this->session->userdata('username'));
        $this->db->where('accept', 'tolak');
        return $this->db->get()->row();
    }
    public function cektolakfalse()
    {
        $this->db->select('*');
        $this->db->from('judul');
        $this->db->where('nim', $this->session->userdata('username'));
        $this->db->where('accept', 'false');
        return $this->db->get()->row();
    }
    public function cektolakterima()
    {
        $this->db->select('*');
        $this->db->from('judul');
        $this->db->where('nim', $this->session->userdata('username'));
        $this->db->where('accept', 'terima');
        return $this->db->get()->row();
    }
    public function showjudul()
    {
        $this->db->select(' 
        `judul`.`id`,
        `judul`.`nim`,
    `judul`.`nama`,
    `judul`.`ps`,
    `judul`.`konsentrasi`,
    `judul`.`hp`,
    `judul`.`sks`,
    `judul`.`ipk`,
    `judul`.`judul`,
    `judul`.`dns_path`,
    `judul`.`laporan_path`,
    `judul`.`tanggal`,
    `judul`.`accept`,
    `judul`.`dosen1`,
    `dosen`.`nama` AS nama_dosen');
        $this->db->from('judul');
        $this->db->join('dosen', 'dosen.nik = judul.dosen1','inner');
        $this->db->where('accept', 'false');
        
        return $this->db->get()->result();
    }

    public function tolakjudul()
    {

        $data = array(
            'accept' => 'tolak',
            'tanggal_eks' => date('Y-m-d')

        );

        $this->db->where('nim', $this->input->post('nim'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('judul', $data);
    }
    public function terimajudul()
    {
        $data = array(
            'accept' => 'terima',
            'dosen2' => $this->input->post('dospem'),
            'tanggal_eks' => date('Y-m-d')

        );

        $this->db->where('nim', $this->input->post('nim'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('judul', $data);
    }
    public function showjudultolak()
    {
        $this->db->select(' 
        `judul`.`nim`,
         `judul`.`nama`,
         `judul`.`judul`,
        `judul`.`tanggal_eks`,
             ');
        $this->db->from('judul');
        $this->db->where('accept', 'tolak');
        return $this->db->get()->result();
    }
    public function showjudulterima()
    {
        $this->db->select(' 
        `judul`.`nim`,
         `judul`.`nama`,
         `judul`.`judul`,
        `judul`.`tanggal_eks`,
             ');
        $this->db->from('judul');
        $this->db->where('accept', 'terima');
        return $this->db->get()->result();
    }

    public function semuajudul()
    {
        $this->db->select('*');
        $this->db->from('judul');
        $this->db->where('accept !=', 'false');

        return $this->db->get()->result();
    }
}
