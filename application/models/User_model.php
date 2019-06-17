<?php
	class User_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function register($enc_password){
			$data = array(
				'name' => $this->input->post('name'),
				'zipcode' => $this->input->post('zipcode'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $enc_password
			);

			return $this->db->insert('users', $data);

		}

		//Login user
		public function login($username, $password, $usertype){
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$this->db->where('usertype', $usertype);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->id;
			}else{
				return false;
			}
		}
		
		//EDIT PROFILE
		public function update_profile($user_id){
			$data=array(
				'name' => $this->input->post('name'),
				'zipcode' => $this->input->post('zipcode'),
				'email' => $this->input->post('email')
			);

			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
		}

		//get_user_data
		public function get_user_data($user_id){
			$data = $this->db->get_where('users', array('users.id'=> $user_id));
			return $data->row();
		}

		//get_all_user_data
		public function get_all_user(){
			$this->db->order_by('name');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		//get sender id and name thereafter
		public function get_sender_id($user_id){
			$data = $this->db->get_where('users', array('users.id'=> $user_id));
			return $data->row();
		}

		//check if username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		} 

		//check if username exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		} 

		public function get_your_tasks($receiver_id){
			$data = $this->db->get_where('task', array('receiver_id'=> $receiver_id));
			return $data->result_array();
		}

		//TO SHOW THE SENDER IN THE VIEW PAGE
		//THIS IS GOOD
		//THIS IS REALLY GOOD'
		//I AM HAVING A PRETTY GREAT TIME
		//THIS IS AWESOME, BABE.
		//I AM AMAZING, BABY.
		public function get_sends($mogg = FALSE){
			if($mogg === FALSE){
				$this->db->order_by('task.sender_id','DESC');
				$this->db->join('users', 'users.id = task.sender_id');
				$query = $this->db->get('task');
				return $query->result_array();
			}
		}
	}