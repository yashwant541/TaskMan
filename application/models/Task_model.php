<?php
	class Task_model extends CI_Model{
		public function __construct(){
			$this->load->database(); 
		}

		public function create($sender_id){
			$data=array(
				'sender_id' => $sender_id,
				'receiver_id' => $this->input->post('receiver_id'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'priority' => $this->input->post('priority')
			);

			return $this->db->insert('task', $data);
		}

		public function get_name_for_create(){

		}
	}