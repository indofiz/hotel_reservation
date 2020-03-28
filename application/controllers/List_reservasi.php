<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_reservasi extends CI_Controller {

	public $user;

	 function __construct(){
		parent::__construct();
		$this->load->model('Hotel','hotel');
		is_logged_in();

		$this->user = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
	}
	
	function index()
	{
		$this->db->where('status', TRUE);
		$this->db->order_by('id', 'DESC');
		$data['guest'] = $this->db->get('guest')->result_array();
		$data['user'] = $this->user;
		$data['title'] = 'List Ongoing';	

		$this->load->view('inc/header', $data);
		$this->load->view('list_reservasi',$data);
		$this->load->view('inc/foot');
	}

	function alreadyCheckout()
	{
		$this->db->where('status', FALSE);
		$this->db->order_by('id', 'DESC');
		$data['guest'] = $this->db->get('guest')->result_array();
		$data['user'] = $this->user;
		$data['title'] = 'List Checkout';	

		$this->load->view('inc/header', $data);
		$this->load->view('list_reservasi',$data);
		$this->load->view('inc/foot');
	}
	function all()
	{
		$this->db->order_by('id', 'DESC');
		$data['guest'] = $this->db->get('guest')->result_array();
		$data['user'] = $this->user;
		$data['title'] = 'List Semua';	

		$this->load->view('inc/header', $data);
		$this->load->view('list_reservasi',$data);
		$this->load->view('inc/foot');
	}

	function delete($id)
	{
		$data = $this->db->get_where('guest', ['id' => $id])->row();
		$id_room = $this->hotel->get_room_id($data->ruangan);
		$status = $this->hotel->get_room_status($id_room);
		$status_guest = $this->hotel->get_guest_status($id);
		$total_people = $this->hotel->get_guest_total($id);
		if ($status_guest == TRUE) {
			if ($status > 0) {
				$this->db->set('status', $status - $total_people, FALSE);
				$this->db->where('id', $id_room);
				$this->db->update('room');
			}
		}
		$this->db->delete('guest', ['id' => $id]);
		$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert">Data pengunjung berhasil dihapus</div>'
		);
		redirect('/list_reservasi/');
	}

	function editGuest($id = null)
	{
		if (!$id){
			redirect('/list_reservasi/');
		}

		$data['title'] = 'Edit Reservasi';
		$data['guest_category'] = $this->db->get('guest_category')->result_array();
		$data['room'] = $this->db->get('room')->result_array();
		$data['guest'] = $this->db->get_where('guest', ['id' => $id])->row_array();
		$data['guest_status'] = $this->db->get_where('guest', ['id' => $id])->row_array()['status'];
		$type_guest = $this->db->get_where('guest', ['id' => $id])->row_array()['type'];
		$data['guest_category_cost'] = $this->db->get_where('guest_category',['id' => $type_guest])->row_array()['harga'];
		$data['lantai'] = $this->db->get_where('room', ['number' => $data['guest']['ruangan']])->row_array()['lantai'];
		$ruang_tes = $this->db->get_where('room', ['number' => $data['guest']['ruangan']])->row_array()['status'];
		$data['user'] = $this->user;
		$checkout_2 = $this->db->get_where('guest', ['id' => $id])->row()->check_out;
		
		

		// form rules
        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('telpon', 'Contact', 'required|numeric');
		$this->form_validation->set_rules('type', 'Category', 'required');
		$this->form_validation->set_rules('ruangan', 'Room', 'required');
		$this->form_validation->set_rules('orang', 'Total People', 'required|numeric');
		$this->form_validation->set_rules('check_in', 'Period', 'required');
		$this->form_validation->set_rules('harga', 'Cost', 'numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('inc/header', $data);
			$this->load->view('edit_list', $data);
			$this->load->view('inc/foot');
		} else {

			$id = $this->input->post('id');
			$status_guest = $this->hotel->get_guest_status($id);

			$id_room = $this->hotel->get_room_id($this->input->post('ruangan'),true);
			$id_room_before = $this->hotel->get_room_id($this->input->post('ruangan-before'),true);
			$status_now = $this->hotel->get_room_status($id_room);
			$status_before = $this->hotel->get_room_status($id_room_before);
			$room_max = $this->hotel->get_room_max($id_room);
			$room_max_before = $this->hotel->get_room_max($id_room_before);
			$guest_total_before = $this->input->post('total-before',true);

			$ruangan_now = $this->input->post('ruangan',true);
			$ruangan_before = $this->input->post('ruangan-before',true);
			$guest_total_now = $this->input->post('orang',true);
			if ($status_now == $room_max || $status_now+$this->input->post('orang') > $room_max) {
				$this->session->set_flashdata('message', 
					'<div class="alert alert-danger m-r-10 m-l-10" role="alert">Ruangan '.$room.' Maksimal kapasitar Orang!!!</div>'
				);
				redirect('/list_reservasi/');
			}

			if ($checkout_2 == '') {
				$cost = $this->input->post('harga',true)*$this->input->post('range_day',true);
			}else{
				$cost = $this->input->post('harga',true);
			}

			$check_in = new DateTime($this->input->post('check_in',true));
			$check_out = new DateTime($this->input->post('check_out',true));
			$range_day = $check_out->diff($check_in);

			$data = [
				'name'  => $this->input->post('nama',true), 
                'telpon'  => $this->input->post('telpon',true), 
                'type' => $this->input->post('type',true), 
                'deskripsi' => $this->input->post('deskripsi',true),
                'check_in' => $this->input->post('check_in',true), 
                'cost' => $cost, 
                'check_out' => $this->input->post('check_out',true),
                'total_people' => $this->input->post('orang',true), 
                'ruangan' => $this->input->post('ruangan',true), 
                'range_day' => $range_day->d
			];

			$this->db->where('id', $id);
			$this->db->update('guest', $data);
			$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert">Data pengunjung berhasil diubah</div>'
			);
			
			if ($status_guest == TRUE) {

				if ($ruangan_now != $ruangan_before) {
					if ($guest_total_before != $guest_total_now) {
						$data2 = array(
						   array(
						      'number' =>  $this->input->post('ruangan-before',true) ,
						      'status' => $status_before - $guest_total_before
						   ),
						   array(
						      'number' =>  $this->input->post('ruangan',true) ,
						      'status' => $status_now + $guest_total_now
						   )
						);
						$this->db->update_batch('room', $data2, 'number');
					}else{
						$data2 = array(
						   array(
						      'number' =>  $this->input->post('ruangan-before',true) ,
						      'status' => $status_before - $guest_total_now
						   ),
						   array(
						      'number' =>  $this->input->post('ruangan',true) ,
						      'status' => $status_now + $guest_total_now
						   )
						);
						$this->db->update_batch('room', $data2, 'number');
					}
				}else{
					if ($guest_total_before != $guest_total_now) {
						if ($guest_total_now > $guest_total_before) {
							$guest_tot = $guest_total_now - $guest_total_before;
							$this->db->set('status', $status_now + $guest_tot, FALSE);
							$this->db->where('number', $ruangan_now);
							$this->db->update('room');
						}else{
							$guest_tot2 = $guest_total_before - $guest_total_now;
							$this->db->set('status', $status_now - $guest_tot2, FALSE);
							$this->db->where('number', $ruangan_now);
							$this->db->update('room');
						}
					}
				}
			}
			

			redirect('/list_reservasi/');
		}
	}

	function checkout($id = null){
		if (!$id){
			redirect('/list_reservasi/');
		}
		$status_guest = $this->hotel->get_guest_status($id);

		if ($status_guest == FALSE) {
			$this->session->set_flashdata('message', 
			'<div class="alert alert-warning" role="alert">Reservasi sudah kondisi Checkout</div>'
			);
			redirect('/list_reservasi/');
		}
		$data['user'] = $this->user;
		$type_guest = $this->db->get_where('guest', ['id' => $id])->row_array()['type'];
		$data['guest_category_cost'] = $this->db->get_where('guest_category',['id' => $type_guest])->row_array()['harga'];
		$data['guest'] = $this->db->get_where('guest', ['id' => $id])->row_array();
		$data['ruang'] = $this->db->get_where('room', ['number' => $data['guest']['ruangan']])->row_array();
		$data['title'] = 'Check out Ruang '.$data['guest']['ruangan'];	
		$total_people = $this->hotel->get_guest_total($id);
		$id_room = $this->hotel->get_room_id($data['guest']['ruangan']);
		$status = $this->hotel->get_room_status($id_room);


		$this->form_validation->set_rules('check_out', 'Check Out', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_message('required','%s tidak boleh kosong.');
		$this->form_validation->set_message('numeric','%s harus angka.');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('inc/header', $data);
			$this->load->view('checkout_list',$data);
			$this->load->view('inc/foot');
		}else{
			$post= $this->input->post(null,TRUE);
			$this->hotel->save_checkout($post,$id);
			if ($this->db->affected_rows() > 0 ) {
				$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert">Checkout Reservasi Berhasil</div>'
				);

				if ($status > 0) {
					$this->db->set('status', $status - $total_people, FALSE);
					$this->db->where('id', $id_room);
					$this->db->update('room');
				}
			}
			redirect('/list_reservasi/');
		}

	}

	function printPage($id = null){
		if (!$id){
			redirect('/list_reservasi/');
		}
		$data['guest'] = $this->db->get_where('guest', ['id' => $id])->row_array();
		$data['user'] = $this->user;
		$this->load->view('inc/print',$data);
	}
}
