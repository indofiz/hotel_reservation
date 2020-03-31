<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_category extends CI_Controller {

	public $user;

	function __construct(){
		parent::__construct();
		is_logged_in();
		$this->user = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
	}

	function index(){
		$data['title'] = 'Kategori Pengunjung';
		$data['user'] = $this->user;
		$data['category'] = $this->db->get('guest_category')->result_array();
		$this->load->view('inc/header',$data);
		$this->load->view('guest_category',$data);
		$this->load->view('inc/foot');
	}

	function delete($id)
	{
		$this->db->delete('guest_category', ['id' => $id]);
		$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert">Kategori pengunjung berhasil dihapus</div>'
		);
		redirect('/guest_category/');
	}

	function addCategory()
	{
		
		// form rules
		$this->form_validation->set_rules('category', 'Kategori', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric|integer');
		$this->form_validation->set_message('integer', '%s harus angka saja!!');
		if ($this->form_validation->run() == false) {
			
			$data['title'] = 'Kategori Pengunjung';
			$data['user'] = $this->user;
			$data['category'] = $this->db->get('guest_category')->result_array();
			$this->load->view('inc/header',$data);
			$this->load->view('guest_category',$data);
			$this->load->view('inc/foot');

		} else {

			$data = [
				'category' => $this->input->post('category', true),
				'harga' => $this->input->post('harga', true)
			];

			$this->db->insert('guest_category', $data);
			$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert">Kategori pengunjung baru berhasil ditambahkan</div>'
			);
			redirect('/guest_category/');
		}
	}

	function editCategory(){
		if (!$this->input->post('id')) {
			redirect('/guest_category/');
		}
		// form rules
		$this->form_validation->set_rules('edit_category', 'Kategori', 'required');
		$this->form_validation->set_rules('edit_harga', 'Harga', 'required|numeric');

		if ($this->form_validation->run() == false) {
			
			$data['title'] = 'Kategori Pengunjung';
			$data['user'] = $this->user;
			$data['category'] = $this->db->get('guest_category')->result_array();
			$this->load->view('inc/header',$data);
			$this->load->view('guest_category',$data);
			$this->load->view('inc/foot');

		} else {

			$data = [
				'category' => $this->input->post('edit_category', true),
				'harga' => $this->input->post('edit_harga', true)
			];
			$this->db->where('id', $this->input->post('id',true));
			$this->db->update('guest_category',$data);
			$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert">Kategori pengunjung berhasil diubah</div>'
			);
			redirect('/guest_category/');
		}
	}

}