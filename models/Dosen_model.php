<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dosen_model extends CI_Model
{


    public function showdata()
    {
        $this->db->select('*');
        $this->db->from('dosen');
        return $this->db->get()->result();
    }

    public function show_kons()
    {
        $this->db->select('*');
        $this->db->from('konsentrasi');
        return $this->db->get()->result();
    }

    public function add_dosen()
    {


        $data = array(
            'nik' => $this->input->post('nik'),
            'nama'  => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jk'),
            'konsentrasi' => $this->input->post('ks'),
            'status' => $this->input->post('status')
        );

        $this->db->insert('dosen', $data);
    }
    public function update_dosen()
    {


        $data = array(
            'nama'  => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jk'),
            'konsentrasi' => $this->input->post('ks'),
            'status' => $this->input->post('status')

        );


        $this->db->where('nik', $this->input->post('nik'));
        $this->db->update('dosen', $data);
    }

    public function delete_dosen()
    {
        $nik = $this->input->post('nik');

        $this->db->where('nik', $nik);
        $result = $this->db->delete('dosen');
        return $result;
    }

    public function showdataketuaprodi()
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('status', 'Ketua Prodi');
        return $this->db->get()->result();
    }
    public function showdatapa()
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('status', 'Pembimbing Akademik');
        return $this->db->get()->result();
    }
    public function showdatawhere() {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('nik', $this->input->post('nik'));
        return $this->db->get()->result();
    }
}
