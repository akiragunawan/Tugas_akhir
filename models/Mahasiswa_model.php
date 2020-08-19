<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{


    public function showdata()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        return $this->db->get()->result();
    }

    public function show_ps()
    {
        $this->db->select('*');
        $this->db->from('program_studi');
        return $this->db->get()->result();
    }

    public function show_komp()
    {
        $this->db->select('*');
        $this->db->from('kompetisi');
        return $this->db->get()->result();
    }

    public function show_pa()
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('status', "Pembimbing Akademik");
        return $this->db->get()->result();
    }
    public function add_mahasiswa()
    {
        $origDate = $this->input->post('tgl');

        $date = str_replace('/', '-', $origDate);
        $newDate = date("Y-m-d", strtotime($date));

        $data = array(
            'nim' => $this->input->post('nim'),
            'nama'  => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jk'),
            'program_studi' => $this->input->post('ps'),
            'kompetisi'  => $this->input->post('kompetisi'),
            'pa' => $this->input->post('pa'),
            'tanggal_masuk' =>  $newDate
        );

        $this->db->insert('mahasiswa', $data);
    }
    public function update_mahasiswa()
    {
        $origDate = $this->input->post('tgl');

        $date = str_replace('/', '-', $origDate);
        $newDate = date("Y-m-d", strtotime($date));

        $data = array(
            'nama'  => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jk'),
            'program_studi' => $this->input->post('ps'),
            'kompetisi'  => $this->input->post('kompetisi'),
            'pa' => $this->input->post('pa'),
            'tanggal_masuk' =>  $newDate
        );

        // $this->db->insert('mahasiswa', $data);
        $this->db->where('nim', $this->input->post('nim'));
        $this->db->update('mahasiswa', $data);
    }

    public function delete_mahasiswa()
    {
        $nim = $this->input->post('nim');

        $this->db->where('nim', $nim);
        $result = $this->db->delete('mahasiswa');
        return $result;
    }
}
