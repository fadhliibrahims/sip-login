<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['title'] = "Jadwal";
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebarp', $data);
		$this->load->view('templates/topbarp', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function tugas()
	{
		$data['title'] = "Tugas";
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebarp', $data);
		$this->load->view('templates/topbarp', $data);
		$this->load->view('user/tugas', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = "Pengaturan Akun";
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebarp', $data);
		$this->load->view('templates/topbarp', $data);
		$this->load->view('user/editakun', $data);
		$this->load->view('templates/footer');
	}
}
