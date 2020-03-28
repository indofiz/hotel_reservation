<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_ruangan extends CI_Controller {

	public $user;

	function __construct(){
		parent::__construct();
		$this->load->model('Hotel','hotel');
		is_logged_in();

		$this->user = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
	}
	public function index()
	{	
			$data['title'] = 'Pesan Ruangan';
			$data['room'] = $this->hotel->list_room2();
			$data['lantai_list'] = $this->hotel->lantai_list();
			$data['guest_type'] = $this->hotel->list_guest_type();
			$data['user'] = $this->user;
			$this->load->view('inc/header', $data);
			$this->load->view('pesan_ruangan',$data);
			$this->load->view('inc/foot');
	}
	function addRoomby($room = null){
		if (!$room) {
			redirect('/dashboard/');
		}
		$id_room = $this->hotel->get_room_id($room);
		$status = $this->hotel->get_room_status($id_room);
		$room_max = $this->hotel->get_room_max($id_room);
		if ($status == $room_max || $status+$this->input->post('orang') > $room_max) {
			$this->session->set_flashdata('message', 
				'<div class="alert alert-danger m-r-10 m-l-10" role="alert">Ruangan '.$room.' Penuh!!!</div>'
			);
			redirect('/dashboard/');
		}
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('telpon', 'Telpon', 'required|numeric');
			$this->form_validation->set_rules('ruangan2', 'Ruang', 'required');
			$this->form_validation->set_rules('orang', 'Jumlah Orang', 'required|numeric');
			$this->form_validation->set_rules('check_in', 'Check In', 'required');

			$this->form_validation->set_message('required','%s tidak boleh kosong.');
			$this->form_validation->set_message('numeric','%s harus angka.');

			if($this->form_validation->run() == FALSE)
			{
				$data['select_room'] = $room;
				$data['title'] = 'Pesan Ruangan '. $room;
				$data['room'] = $this->hotel->list_room2();
				$data['lantai_list'] = $this->hotel->lantai_list();
				$data['guest_type'] = $this->hotel->list_guest_type();
				$data['user'] = $this->user;
				$data['orang'] = $this->db->get_where('room', ['number' => $room])->row_array()['max_people'];
				$data['lantai'] = $this->db->get_where('room', ['number' => $room])->row_array()['lantai'];
				$lantaii =$this->db->get_where('room', ['number' => $room])->row_array()['lantai'];
				$data['lantailabel'] = $this->db->get_where('lantai', ['id' => $lantaii])->row_array()['lantai_label'];
				$this->load->view('inc/header', $data);
				$this->load->view('pesan_ruangan_bynumber',$data);
				$this->load->view('inc/foot');

			}else{
			$data['select_room'] = $room;
			$data['title'] = 'Pesan Ruangan '. $room;
			$data['room'] = $this->hotel->list_room2();
			$data['lantai_list'] = $this->hotel->lantai_list();
			$data['guest_type'] = $this->hotel->list_guest_type();
			$data['user'] = $this->user;
			$data['orang'] = $this->db->get_where('room', ['number' => $room])->row_array()['max_people'];
			$data['lantai'] = $this->db->get_where('room', ['number' => $room])->row_array()['lantai'];
			$lantaii =$this->db->get_where('room', ['number' => $room])->row_array()['lantai'];
			$data['lantailabel'] = $this->db->get_where('lantai', ['id' => $lantaii])->row_array()['lantai_label'];
			$this->load->view('inc/header', $data);
			$this->load->view('pesan_ruangan_bynumber',$data);
			$this->load->view('inc/foot');


				$post= $this->input->post(null,TRUE);
				$this->hotel->save_reserv($post);
				if ($this->db->affected_rows() > 0 ) {
					$this->session->set_flashdata('message', 
					'<div class="alert alert-success" role="alert">Reservasi baru berhasil ditambahkan</div>'
					);

					$this->db->set('status', $status + $this->input->post('orang'), FALSE);
					$this->db->where('number', $this->input->post('ruangan2'));
					$this->db->update('room');
					}
					redirect('/list_reservasi/');
			}


	}



	function addRoom(){
		
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('telpon', 'Telpon', 'required|numeric');
		$this->form_validation->set_rules('ruangan2', 'Ruang', 'required');
		$this->form_validation->set_rules('orang', 'Jumlah Orang', 'required|numeric');
		$this->form_validation->set_rules('check_in', 'Check In', 'required');
		$this->form_validation->set_message('required','%s tidak boleh kosong.');
		$this->form_validation->set_message('numeric','%s harus angka.');

		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Pesan Ruangan';
			$data['room'] = $this->hotel->list_room2();
			$data['lantai_list'] = $this->hotel->lantai_list();
			$data['guest_type'] = $this->hotel->list_guest_type();
			$data['user'] = $this->user;
			$this->load->view('inc/header', $data);
			$this->load->view('pesan_ruangan',$data);
			$this->load->view('inc/foot');
		}else{
			$id_room = $this->hotel->get_room_id($this->input->post('ruangan2'));
			$status = $this->hotel->get_room_status($id_room);
			$room_max = $this->hotel->get_room_max($id_room);
			
			if ($status == $room_max || $status+$this->input->post('orang') > $room_max) {
			$this->session->set_flashdata('message', 
				'<div class="alert alert-danger" role="alert">Maksimal kapasitar Orang!!!</div>'
			);
			redirect('/pesan_ruangan/');
			}
			$post= $this->input->post(null,TRUE);
			$this->hotel->save_reserv($post);
			if ($this->db->affected_rows() > 0 ) {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert">Reservasi baru berhasil ditambahkan</div>'
				);

				$this->db->set('status', $status + $this->input->post('orang'), FALSE);
				$this->db->where('number', $this->input->post('ruangan2'));
				$this->db->update('room');
			}
			redirect('/pesan_ruangan/');
		}
	}

	function load_room(){
	if($this->input->post('lantai'))
	  {
	   echo $this->hotel->get_room_list($this->input->post('lantai'));
	  }
	}
	function load_max_people(){
	if($this->input->post('ruangan'))
	  {
	   echo $this->hotel->get_max_people($this->input->post('ruangan'));
	  }
	}
	function load_cost(){
	if($this->input->post('id_guest'))
	  {
	   echo $this->hotel->get_cost($this->input->post('id_guest'));
	  }
	}

}
