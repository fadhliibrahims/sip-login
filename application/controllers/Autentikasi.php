<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/aut_header');
			$this->load->view('autentikasi/login');
			$this->load->view('templates/aut_footer');
		} else {
			$this->login();
		}
	}

	private function login()
	{
		$nim = $this->input->post('nim');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['nim' => $nim])->row_array();
		if ($user) 
		{
			if(password_verify($password, $user['password'])) 
			{
					$data = [
						'nim' => $user['nim'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
			} 
			
			else 
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Password Salah
		  		</div>');
				redirect('autentikasi');
			}
		} 
		
		else 
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			NIM belum terdaftar
		  	</div>');
			redirect('autentikasi');
		}
		die;
	}

	public function logout() 
	{
		$this->session->unset_userdata('nim');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Anda Telah Logout
		</div>');
		redirect('autentikasi');
	}
}
