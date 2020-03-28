<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $user;

	function __construct(){
		parent::__construct();
		$this->load->model('Hotel','hotel');
		is_logged_in();

		$this->user = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
	}
	
	function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->user;
		$data['lantai'] = $this->hotel->lantai_list();
		$data['isi_lantai'] = $this->hotel->ambil_ruang();
		$this->load->view('inc/header', $data);
		$this->load->view('dashboard',$data);
		$this->load->view('inc/foot');
	}

	function load_room(){
	if($this->input->post('lantai'))
	  {
	   echo $this->hotel->get_room($this->input->post('lantai'));
	  }
	}
	function list_info_room(){
	if($this->input->post('room'))
	  {
	   echo $this->hotel->list_info_room_name($this->input->post('room'));
	  }
	}
	function info_room(){
	if($this->input->post('id'))
	  {
	   echo $this->hotel->info_room($this->input->post('id'));
	  }
	}
	function guest_get_id(){
	if($this->input->post('room'))
	  {
	   echo $this->hotel->guest_get_id($this->input->post('room'));
	  }
	}

}
