<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{

		

		if ($this->session->userdata('username')) {
			redirect('admin');
		}

		$data['title'] = 'Login';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('login', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$user = $this->db->get_where('admin', ['username' => $username])->row_array();

		if ($user) {

			if (password_verify($password, $user['password'])) {

				$this->session->set_userdata(['username' => $username]);

				redirect('dashboard');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang anda masukkan salah!</div>');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username yang anda masukkan salah!</div>');
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->db->set('last_login', time());
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->update('admin');

		$this->session->unset_userdata('username');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('error/html/error_404');
	}

}