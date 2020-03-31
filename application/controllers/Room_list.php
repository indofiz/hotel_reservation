<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_list extends CI_Controller {

	public $user;

	function __construct(){
		parent::__construct();
		$this->load->model('Hotel','hotel');
		is_logged_in();
		$this->user = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
	}

	function index(){
		$data['title'] = 'Control Room';
		$data['user'] = $this->user;
		$this->db->order_by('number', 'ASC');
		$data['room'] =$this->db->get('room')->result_array();
		$data['lantai'] = $this->hotel->lantai_list();
		$this->load->view('inc/header',$data);
		$this->load->view('room_list',$data);
		$this->load->view('inc/foot',$data);
	}

	function delete($id)
	{
		$this->db->delete('room', ['id' => $id]);
		$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert">Data ruangan berhasil dihapus</div>'
		);
		redirect('/room_list/');
	}

	function addRoom()
	{
		// form rules
		$this->form_validation->set_rules('add_room', 'Nomor Ruangan', 'required');
		$this->form_validation->set_rules('max_people', 'Max Orang', 'required|numeric');
		$this->form_validation->set_message('required','%s tidak boleh kosong.');
		$this->form_validation->set_message('numeric','%s harus angka.');

		if ($this->form_validation->run() == false) {
			
			$this->db->order_by('number', 'ASC');
			$data['room'] =$this->db->get('room')->result_array();
			$data['lantai'] = $this->hotel->lantai_list();
			$data['title'] = 'Control Room';
			$data['user'] = $this->user;
			$this->load->view('inc/header',$data);
			$this->load->view('room_list',$data);
			$this->load->view('inc/foot');

		} else {
			$this->db->where('number',$this->input->post('add_room', true));
			$query = $this->db->get('room');
			if ($query->num_rows() > 0) {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-danger" role="alert">Nomor Ruang tidak boleh sama walaupun beda lantai!!</div>'
			);
				redirect('/room_list/');
			}
			$data = [
				'number' => $this->input->post('add_room', true),
				'status' => 0,
				'lantai' => $this->input->post('lantai_add', true),
				'max_people' => $this->input->post('max_people', true),
			];

			$this->db->insert('room', $data);
			$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert">Data ruangan berhasil ditambahkan</div>'
			);
			redirect('/room_list/');
		}
	}

	function editRoom(){
		if (!$this->input->post('id')) {
			redirect('/room_list/');
		}
		// form rules
		$this->form_validation->set_rules('add_room', 'Nomor Ruangan', 'required');
		$this->form_validation->set_rules('max_people', 'Max Orang', 'required|numeric');
		$this->form_validation->set_message('required','%s tidak boleh kosong.');
		$this->form_validation->set_message('numeric','%s harus angka.');

		if ($this->form_validation->run() == false) {
			
			$this->db->order_by('number', 'ASC');
			$data['room'] =$this->db->get('room')->result_array();
			$data['lantai'] = $this->hotel->lantai_list();
			$data['title'] = 'Control Room';
			$data['user'] = $this->user;
			$this->load->view('inc/header',$data);
			$this->load->view('room_list',$data);
			$this->load->view('inc/foot');

		} else {

			$data = [
				'number' => $this->input->post('add_room', true),
				'max_people' => $this->input->post('max_people', true),
			];
			$this->db->where('id', $this->input->post('id',true));
			$this->db->update('room',$data);
			$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert">Data ruangan berhasil diubah</div>'
			);
			redirect('/room_list/');
		}
	}
}