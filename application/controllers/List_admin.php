<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_admin extends CI_Controller {

	public $user;

	function __construct(){
		parent::__construct();
		is_logged_in();
		is_admin();

		$this->user = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
	}

	function index()
	{
		$this->db->order_by('id', 'DESC');
		$data['admins'] = $this->db->get_where('admin', ['username !=' => 'Admin'])->result_array();
		$data['user'] = $this->user;
		$data['title'] = 'List Admin';

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[password]');

		if ($this->form_validation->run() == false) {
			$this->load->view('inc/header', $data);
			$this->load->view('list_admin',$data);
			$this->load->view('inc/foot');
		} else {

			$data = [
				'username' => $this->input->post('username', true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'image' => 'default.jpg',
				'last_login' => time()
			];

			$this->db->insert('admin', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data admin baru berhasil ditambahkan</div>');
			redirect('list_admin');
		}
	}

	function delete($id)
	{
		$this->db->delete('admin', ['id' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data admin berhasil dihapus</div>');
			redirect('list_admin');
	}

	function getDetail()
	{
		$id = $this->input->post('id', true);
		$query = "SELECT username,image,last_login FROM admin WHERE id = '$id'";
		$row = $this->db->query($query)->row_array();

		$data = [
			'username' => $row['username'],
			'image' => $row['image'],
			'last_login' => date('d-M-Y', $row['last_login'])
		];

		echo json_encode($data);
	}

}
