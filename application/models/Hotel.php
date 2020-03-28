<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Model {


	function list_room(){

	  $this->db->where('lantai', 1);
	  $this->db->order_by("number", "ASC");
	  $query = $this->db->get("room");
	  return $query->result();
	}
	function lantai_list(){
	  $query = $this->db->get("lantai");
	  return $query->result();
	}
	function lantai_array()
	{
		$this->db->order_by('lantai_label', "ASC");
		$result = $this->db->get('lantai')->result_array();
		return $result;
	}
	function list_guest_type(){

	  $this->db->order_by("id", "ASC");
	  $query = $this->db->get("guest_category");
	  return $query->result();
	}
	function list_room2(){

	  $this->db->where('lantai', 1);
	  $this->db->order_by("number", "ASC");
	  $query = $this->db->get("room");
	  return $query->result();
	}
	function ambil_ruang(){
		$query = $this->db->get('room');
		return $query->result_array();
	}

	function info_room($id){
		  $this->db->where('id', $id);
		  $this->db->where('status', TRUE);
		  $this->db->limit(1);
		  $query = $this->db->get('guest')->row();
		  $output = '<tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td>'.$query->name.'</td>
                    </tr><tr>
                      <td>Telpon</td>
                      <td>:</td>
                      <td>'.$query->telpon.'</td>
                    </tr><tr>
                      <td>Nomor Kamar</td>
                      <td>:</td>
                      <td>'.$query->ruangan.'</td>
                    </tr><tr>
                      <td>Jumlah Orang</td>
                      <td>:</td>
                      <td>'.$query->total_people.'</td>
                    </tr><tr>
                      <td>Lama</td>
                      <td>:</td>
                      <td>'.$query->range_day.'  Hari</td>
                    </tr><tr>
                      <td>Check In</td>
                      <td>:</td>
                      <td>'.$query->check_in.'</td>
                    </tr><tr>
                      <td>Check Out</td>
                      <td>:</td>
                      <td>'.$query->check_out.'</td>
                    </tr><tr>
                      <td>Keterangan</td>
                      <td>:</td>
                      <td>'.$query->deskripsi.'</td>
                    </tr>';
		  return $output;
	}
	function list_info_room_name($room){
		  $this->db->where('status', TRUE);
		  $this->db->where('ruangan', $room);
		  $this->db->order_by('id','ASC');
		  $query = $this->db->get('guest');
		  $output = '<option value="">Pilih Nama</option>';
		  foreach($query->result() as $row)
		  {
			   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
		  }
		  return $output;
	}
	function guest_get_id($room){
		  $this->db->where('ruangan', $room);
		  $this->db->where('status', TRUE);
		  $this->db->limit(1);
		  $query = $this->db->get('guest')->row();
		  $output = $query->id;
		  return $output;
	}
	function get_cost($id_guest){
		  $this->db->where('id', $id_guest);
		  $this->db->limit(1);
		  $query = $this->db->get('guest_category')->row();
		  $output = $query->harga;
		  return $output;
	}
	function get_room_status($id){
		$this->db->where('id',$id);
		$query = $this->db->get('room')->row_array();
		return $query['status'];
	}
	function get_room_max($id){
		$this->db->where('id',$id);
		$query = $this->db->get('room')->row_array();
		return $query['max_people'];
	}
	function get_guest_total($id){
		$this->db->where('id',$id);
		$query = $this->db->get('guest')->row_array();
		return $query['total_people'];
	}
	function get_guest_status($id){
		$this->db->where('id',$id);
		$query = $this->db->get('guest')->row_array();
		return $query['status'];
	}
	function get_room_id($number){
		$this->db->where('number',$number);
		$query = $this->db->get('room')->row_array();
		return $query['id'];
	}
	function get_room_list($lantai){
		  $this->db->where('lantai', $lantai);
		  $this->db->order_by('number','ASC');
		  $query = $this->db->get('room');
		  $output = '<option value="">---</option>';
		  foreach($query->result() as $row)
		  {
		  	if ($row->status != $row->max_people) {
			   $output .= '<option value="'.$row->number.'">'.$row->number.'</option>';
		  	}
		  }
		  return $output;
	}
	function get_max_people($ruangan){
		  $this->db->where('number', $ruangan);
		  $this->db->limit(1);
		  $query = $this->db->get('room')->row();
		  $output = '<option value="">---</option>';
		  for ($i=1; $i <= $query->max_people ; $i++) { 
		  	 $output .= '<option value="'.$i.'">'.$i.'</option>';
		  }
		  return $output;
	}

	function save_reserv($post){

		$range_day = $this->input->post('range_day');
		if ($range_day == 0) {
			$ranged = 1;
		}else{
			$ranged = $range_day;
		}

        $data = array(
                'name'  => $this->input->post('nama'), 
                'telpon'  => $this->input->post('telpon'), 
                'type' => $this->input->post('type'), 
                'deskripsi' => $this->input->post('deskripsi'),
                'check_in' => $this->input->post('check_in'), 
                'cost' => $this->input->post('harga'), 
                'check_out' => $this->input->post('check_out'),
                'total_people' => $this->input->post('orang'), 
                'ruangan' => $this->input->post('ruangan2'), 
                'range_day' => $ranged, 
                'status' => 1,
            );

        $this->db->insert('guest',$data);
    }
    function save_checkout($post,$id){

		$range_day = $this->input->post('range_day');
		if ($range_day == 0) {
			$ranged = 1;
		}else{
			$ranged = $range_day;
		}

        $data = array(
                'cost' => $this->input->post('harga'), 
                'check_out' => $this->input->post('check_out'),
                'range_day' => $ranged, 
                'status' => 0,
            );
        $this->db->where('id', $id);
        $this->db->update('guest',$data);
    }
}
