<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_floor extends CI_Controller {

	public $user;

	function __construct(){
		parent::__construct();
		$this->load->model('Hotel','hotel');
		is_logged_in();
		$this->user = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
	}

	function index(){
		$data['title'] = 'Control Floor';
		$data['user'] = $this->user;
		$data['lantai_list'] = $this->hotel->lantai_list();
		$data['lantai'] = $this->hotel->lantai_array();
		$this->load->view('inc/header',$data);
		$this->load->view('floor_list',$data);
		$this->load->view('inc/foot');
	}

	function delete($id)
	{
		$this->db->delete('lantai', ['id' => $id]);
		$this->session->set_flashdata('message', 
			'<div class="alert alert-success" role="alert">Data lantai berhasil dihapus</div>'
		);
		redirect('/control_floor/');
	}

	function addFloor()
	{
		// form rules
		if ($this->input->post('switch-parent')) {
			
			$this->form_validation->set_rules('lantai', 'Lantai', 'required');
			$this->form_validation->set_rules('lantai-parent', 'Parent', 'required');

			if ($this->form_validation->run() == false) {
				
				$data['title'] = 'Control Floor';
				$data['user'] = $this->user;
				$data['lantai_list'] = $this->hotel->lantai_list();
				$data['lantai'] = $this->hotel->lantai_array();
				$this->load->view('inc/header',$data);
				$this->load->view('floor_list',$data);
				$this->load->view('inc/foot');

			} else {

				$data = [
					'lantai_label' => $this->input->post('lantai', true),
					'parent_id' => $this->input->post('lantai-parent', true)
				];

				$this->db->insert('lantai', $data);

				$data2 = [
					'parent_id' => $this->input->post('lantai-parent', true),
					'sub' => 1
				];
				$this->db->where('id', $this->input->post('lantai-parent',true));
				$this->db->update('lantai',$data2);
				$this->session->set_flashdata('message', 
					'<div class="alert alert-success" role="alert">Data lantai berhasil ditambahkan</div>'
				);
				redirect('/control_floor/');
			}
		}else{
			$this->form_validation->set_rules('lantai', 'Lantai', 'required');

			if ($this->form_validation->run() == false) {
				
				$data['title'] = 'Control Floor';
				$data['user'] = $this->user;
				$data['lantai'] = $this->hotel->lantai_array();
				$data['lantai_list'] = $this->hotel->lantai_list();
				$this->load->view('inc/header',$data);
				$this->load->view('floor_list',$data);
				$this->load->view('inc/foot');

			} else {

				$data = [
					'lantai_label' => $this->input->post('lantai', true)
				];

				$this->db->insert('lantai', $data);
				$this->session->set_flashdata('message', 
					'<div class="alert alert-success" role="alert">Data lantai berhasil ditambahkan</div>'
				);
				redirect('/control_floor/');
			}
		}

		
	}

	function editFloor(){
		if (!$this->input->post('id')) {
			redirect('/control_floor/');
		}
		// form rules
		$this->form_validation->set_rules('edit_floor', 'Lantai', 'required');

		if ($this->form_validation->run() == false) {
			
			$data['title'] = 'Control Floor';
			$data['user'] = $this->user;
			$data['lantai'] = $this->hotel->lantai_array();
			$this->load->view('inc/header',$data);
			$this->load->view('floor_list',$data);
			$this->load->view('inc/foot');

		} else {

			$data = [
				'lantai_label' => $this->input->post('edit_floor', true)
			];
			$this->db->where('id', $this->input->post('id',true));
			$this->db->update('lantai',$data);
			$this->session->set_flashdata('message', 
				'<div class="alert alert-success" role="alert">Data lantai berhasil diubah</div>'
			);
			redirect('/control_floor/');
		}
	}

}