<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		if ($this->session->userdata('logged_in')) {
			redirect('mainmenu');
		} else {

			$this->load->view('v_login');
		}
	}


	public function login_auth()
	{
	    

		$this->load->model('Login_model');
		$data['username'] = $this->input->post('userid');
		$data['password'] = $this->input->post('password');
		$res = $this->Login_model->logindb($data);
		
        
		if ($res !== null) {

			$name_login = $this->Login_model->login_name_mahasiswa($res->username);
			if ($name_login == null) {
				$name_login = $this->Login_model->login_name_dosen($res->username);
			}
			
		

			$login_data = array(
				'username'  => $res->username,
				'nama' => $name_login->nama,
				'status'     => $res->status,
				'logged_in' => TRUE
			);
       

			$this->session->set_userdata($login_data);

			redirect('mainmenu');
		} else {

			$this->session->set_flashdata('msg_error', 'Username Or Password is Wrong or not Exist');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
