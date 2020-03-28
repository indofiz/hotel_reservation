<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $user;

	function __construct(){
		parent::__construct();
		is_logged_in();

		$this->user = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
	}

	function edit()
	{
		$data['user'] = $this->user;
		$data['title'] = 'Edit Profil';

		$this->form_validation->set_rules('username', 'username', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('inc/header', $data);
			$this->load->view('edit_profil', $data);
			$this->load->view('inc/foot');
		} else {

			$username = $this->input->post('username', true);

			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {

				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/images/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink( FCPATH . '/assets/images/profile/'. $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);

					$this->db->where('username', $username);
					$this->db->update('admin');

				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert">Profil berhasil di update</div>'
			);
			redirect('admin/edit');
		}
	}

	function change_password()
	{
		$data['user'] = $this->user;
		$data['title'] = 'Ubah Password';

		$this->form_validation->set_rules('password', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[6]|matches[konfirmasi_password_baru]');
		$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|trim|min_length[6]|matches[password_baru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('inc/header', $data);
			$this->load->view('ubah_password', $data);
			$this->load->view('inc/foot');
		} else {
			$user = $this->user;
			$user_password = $user['password'];
			$password_lama = $this->input->post('password', true);
			$password_baru = $this->input->post('password_baru', true);

			if (!password_verify($password_lama, $user_password)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Password yang anda masukkan salah!</div>');
				redirect('admin/change_password');
			} else {

				if ($password_lama === $password_baru) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Password baru tidak boleh sama!</div>');
					redirect('admin/change_password');
				} else {

					$this->db->set('password', password_hash($password_baru, PASSWORD_DEFAULT));
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('admin');

					$this->session->set_flashdata('message', '<div class="alert alert-success">Password berhasil diubah!</div>');
					redirect('admin/change_password');

				}

			}
		}
	}

}
