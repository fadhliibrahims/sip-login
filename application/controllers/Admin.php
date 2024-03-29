<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->model('Crud_model');
	}

	public function index()
	{
        $data['praktikans'] = $this->Crud_model->read();
		$data['title'] = "Admin";
		$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function regist()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[user.nim]', [
			'is_unique' => 'NIM sudah terdaftar'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama',
			'min_length' => 'Password terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['title'] = "Register Praktikan";
			$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/regist');
			$this->load->view('templates/footer');
		}
		else {
			$this->Crud_model->insert();
			$this->Crud_model->insertAkun();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akun Telah Dibuat
		  	</div>');
			redirect('autentikasi');
		}
		
	}

	public function ubah($id=NULL)
    {
        $data['praktikan'] = $this->Crud_model->fetch($id);
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE)
        {
			$data['title'] = "Ubah Data Praktikan";
			$data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
            $this->load->view('admin/ubah', $data);
            $this->load->view('templates/footer');
        }
        else
        {
			$this->Crud_model->update($id);
			$this->Crud_model->updateAkun($id);
            $this->session->set_flashdata('fd', 'Ubah');
            redirect('admin');
        }
	}
	
	public function hapus($id = NULL)
    {
        $this->Crud_model->delete($id);
        $this->session->set_flashdata('fd', 'Hapus');
        redirect('admin');
    }

}
