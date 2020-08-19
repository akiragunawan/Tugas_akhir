<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{


    public function Logindb($data)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);
        return $this->db->get()->row();
    }

    function Login_name_mahasiswa($username)
    {
        $this->db->select('nama');
        $this->db->from('mahasiswa');
        $this->db->where('nim', $username);
        return $this->db->get()->row();
    }
    function Login_name_dosen($username)
    {
        $this->db->select('nik, nama');
        $this->db->from('dosen');
        $this->db->where('nik', $username);
        return $this->db->get()->row();
    }
}
